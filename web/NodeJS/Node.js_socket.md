# Connexions TCP et Sockets en JavaScript (Node.js)

> **Objectif :** Comprendre les principes des sockets TCP, savoir créer un client TCP en Node.js, gérer les messages, les erreurs, la reconnection et connaître les alternatives (TLS, WebSocket). Ce cours est conçu pour un usage pédagogique et en environnement contrôlé.

---

## 1. Introduction rapide

Un **socket** est une abstraction qui permet à deux programmes (local ou distants) d'échanger des données via le réseau. En pratique :

* **TCP** (Transmission Control Protocol) fournit une connexion fiable, ordonnée et orientée flux entre deux hôtes.
* Les navigateurs web n'exposent pas de sockets TCP brutes ; ils proposent des **WebSockets** pour la communication full‑duplex depuis le navigateur.
* **Node.js** permet d'ouvrir des sockets TCP brutes via le module natif `net` et des connexions TLS via `tls`.

## 2. Concepts essentiels

* **Adresse** = combinaison d'IP ou hostname + port (ex : `192.0.2.10:1337`).
* **Client** : initie la connexion TCP.
* **Serveur** : écoute un port et accepte des connexions entrantes.
* **Buffer vs string** : les données sont envoyées sous forme d'octets (`Buffer`). On peut choisir d'utiliser du texte (`utf8`) ou du binaire.
* **End / Destroy** : `socket.end()` ferme proprement après envoi; `socket.destroy()` force la fermeture immédiate.
* **Backoff** : stratégie de reconnexion progressive (exponentielle) pour éviter de flooder le serveur.

## 3. Le module `net` — client TCP minimal

```js
// client-tcp.js
const net = require('net');

const HOST = '127.0.0.1';
const PORT = 1337;

const socket = net.createConnection({ host: HOST, port: PORT }, () => {
  console.log('Connecté à', `${HOST}:${PORT}`);
  socket.write('Salut serveur\n');
});

socket.setEncoding('utf8');

socket.on('data', (data) => {
  console.log('Reçu:', data);
});

socket.on('end', () => console.log('Le serveur a fermé la connexion'));
socket.on('error', (err) => console.error('Erreur socket:', err.message));
socket.on('close', (hadError) => console.log('Connexion fermée', hadError ? '(erreur)' : ''));
```

**Exécution :** `node client-tcp.js`

## 4. Client interactif (stdin ↔ socket)

Utile pour tester un service qui attend des lignes de texte.

```js
// client-interactif.js
const net = require('net');
const socket = net.createConnection({ host: '127.0.0.1', port: 1337 }, () => {
  console.log('Connected');
  process.stdin.resume();
  process.stdin.pipe(socket);
  socket.pipe(process.stdout);
});

socket.on('close', () => process.exit(0));
socket.on('error', (e) => { console.error('Erreur:', e.message); process.exit(1); });
```

## 5. Connexion avec timeout (Promise)

Gérer proprement un timeout lors de la tentative de connexion :

```js
// client-promise.js
const net = require('net');

function connectTCP(host, port, timeout = 5000) {
  return new Promise((resolve, reject) => {
    const sock = net.createConnection({ host, port });
    const onError = (err) => { cleanup(); reject(err); };
    const onTimeout = () => { cleanup(); reject(new Error('Timeout')); };
    const onConnect = () => { cleanup(); resolve(sock); };

    function cleanup() {
      sock.removeListener('error', onError);
      sock.removeListener('connect', onConnect);
      clearTimeout(tout);
    }

    sock.once('error', onError);
    sock.once('connect', onConnect);
    const tout = setTimeout(onTimeout, timeout);
  });
}

(async () => {
  try {
    const s = await connectTCP('127.0.0.1', 9000, 3000);
    console.log('connecté !');
    s.write('hello\n');
    s.on('data', d => console.log('->', d.toString()));
  } catch (err) {
    console.error('Impossible de se connecter:', err.message);
  }
})();
```

## 6. TLS (chiffrer la connexion)

Pour sécuriser la connexion (ex : service TLS/HTTPS) :

```js
// client-tls.js
const tls = require('tls');

const socket = tls.connect(443, 'example.com', { rejectUnauthorized: true }, () => {
  console.log('TLS connecté — certificat vérifié');
  socket.write('GET / HTTP/1.1\r\nHost: example.com\r\nConnection: close\r\n\r\n');
});

socket.setEncoding('utf8');
socket.on('data', d => console.log(d));
socket.on('error', e => console.error('TLS error', e.message));
```

## 7. Serveur TCP simple (pour tests locaux)

```js
// server-tcp.js
const net = require('net');

const server = net.createServer((sock) => {
  console.log('Client connecté', sock.remoteAddress + ':' + sock.remotePort);
  sock.on('data', (data) => sock.write('Echo: ' + data));
  sock.on('end', () => console.log('Client déconnecté'));
});

server.listen(1337, () => console.log('Serveur en écoute sur 1337'));
```

**Tester avec netcat (sur ta machine) :**

```bash
# côté serveur
node server-tcp.js

# côté client
nc 127.0.0.1 1337
# tape des lignes, tu verras le echo
```

## 8. WebSocket (pour navigateurs)

Si tu dois communiquer depuis un navigateur vers un service, utilise un **serveur WebSocket** (par ex : `ws` en Node.js) ou un proxy qui traduit WebSocket ↔ TCP côté serveur.

```js
// client navigateur
const ws = new WebSocket('ws://localhost:8080');
ws.addEventListener('open', () => ws.send('bonjour'));
ws.addEventListener('message', e => console.log('msg', e.data));
```

## 9. Bonnes pratiques & sécurité

* **Ne pas exposer** un serveur d'exécution de commandes ouvert sur Internet.
* Toujours **authentifier** les clients si le service accepte des actions sensibles.
* Pour le texte, spécifie un encodage ou travaille en `Buffer` pour le binaire.
* Gérer proprement : `error`, `close`, `timeout` et les cas de partial data (découpage de paquets).
* Utilise TLS pour chiffrer les données en transit.
* Loggue avec prudence (évite d'écrire des secrets en clair dans les logs).

## 10. Debugging et outils utiles

* `nc` (netcat) pour tester des connexions TCP simples.
* `openssl s_client -connect host:port` pour tester TLS.
* `tcpdump` / `wireshark` pour inspecter le trafic réseau (sur un lab contrôlé).
* `ss -tulpn` ou `netstat -tulpn` pour lister ports ouverts.

## 11. Exercice conseillé (safe)

1. Lance `server-tcp.js` sur ta machine locale.
2. Ouvre `client-interactif.js` dans une autre console et échange quelques messages.
3. Remplace la logique `echo` par un petit protocole :

   * `PING` → `PONG` ;
   * `TIME` → renvoie l'heure serveur ;
   * `QUIT` → ferme la connexion.

Cet exercice permet de comprendre le parsing, les states et la gestion du flux.

## 12. Bibliothèques utiles

* `ws` : WebSocket pour Node.js.
* `socket.io` : abstraction WebSocket + fallback, gestion de rooms, reconnections automatiques (browser + node).
* `net` / `tls` : modules natifs pour TCP et TLS.

---

### Remarque finale

Ce cours montre **comment** créer et utiliser des sockets TCP avec Node.js pour des usages légitimes et pédagogiques. N'utilise jamais ces techniques pour accéder à des systèmes sans autorisation explicite.

---

Si tu veux, je peux :

* ajouter un **exercice corrigé**,
* fournir un **exemple adapté** (avec une IP/port que tu possèdes),
* ou convertir ce cours en un fichier `README.md` téléchargeable.

Dis‑moi ce que tu veux que j'ajoute.
