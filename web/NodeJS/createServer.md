# Node.js : La méthode `http.createServer`

## 1. Introduction
Node.js permet de créer des serveurs web grâce à son module natif [`http`](https://nodejs.org/api/http.html).  
La méthode `http.createServer` est la fonction principale pour créer un serveur HTTP.  

> Remarque : le module `http` est natif, donc aucun package externe n’est nécessaire.

---

## 2. Importer le module `http`
```js
const http = require('http');
```
Le module http est un module natif de Node.js. Il contient plusieurs fonctionnalités pour créer un serveur et faire des requêtes HTTP.
## 3. Création d’un serveur avec createServer
```js
const server = http.createServer((req, res) => {
  // req = objet représentant la requête entrante
  // res = objet permettant d’envoyer une réponse
  res.statusCode = 200;
  res.setHeader('Content-Type', 'text/plain');
  res.end('Bonjour, monde !');
});
```
## Explication des paramètres

req (request) : contient les informations sur la requête du client (method, url, headers, etc.)

res (response) : permet de renvoyer une réponse au client (write, end, setHeader, etc.)

## 4. Lancer le serveur
```js
const PORT = 3000;
server.listen(PORT, () => {
  console.log(`Serveur démarré sur le port ${PORT}`);
});
```

listen(port, hostname, backlog, callback) : met le serveur en écoute sur le port spécifié.
Le serveur ne démarre pas tant que listen n’est pas appelé.

## 5. Les méthodes et événements de l’objet server

L’objet retourné par createServer est une instance de http.Server.

## Voici les principales méthodes et événements :

| Méthode                       | Description                                           |
|--------------------------------|------------------------------------------------------|
| `listen(port, hostname, callback)` | Met le serveur en écoute sur un port.             |
| `close([callback])`            | Arrête le serveur.                                   |
| `address()`                    | Retourne l’adresse et le port du serveur.           |
| `on(event, listener)`          | Écoute les événements (`request`, `connection`, `close`, etc.). |

## Événements utiles

request → déclenché à chaque requête entrante

connection → déclenché à chaque nouvelle connexion

close → déclenché lorsque le serveur est arrêté

## 6. Exemple complet
```js
const http = require('http');

const server = http.createServer((req, res) => {
  if (req.url === '/') {
    res.statusCode = 200;
    res.setHeader('Content-Type', 'text/html');
    res.end('<h1>Bienvenue sur mon serveur Node.js !</h1>');
  } else {
    res.statusCode = 404;
    res.end('Page non trouvée');
  }
});

server.listen(3000, () => {
  console.log('Serveur en écoute sur http://localhost:3000');
});
```

## 7. Fonctionnalités supplémentaires

Faire des requêtes HTTP sortantes avec http.request ou http.get.

Gérer facilement les headers et le streaming des données.

Supporte tous les verbes HTTP (GET, POST, PUT, DELETE…).

## 8. Résumé

http.createServer permet de créer un serveur HTTP.

Il retourne un objet serveur (http.Server) avec des méthodes pour écouter, fermer et gérer des événements.

La gestion des requêtes se fait via les objets req et res.

Pour des projets plus complexes, il est recommandé d’utiliser des frameworks comme Express pour simplifier le routage et la gestion des requêtes.
