# Wireshark

## 📌 1. Introduction à Wireshark

Wireshark est un **outil d'analyse de paquets réseau**.

Il permet :

- d'observer le trafic réseau en temps réel
- d'ouvrir des fichiers `.pcap` ou `.pcapng`
- d'analyser les protocoles (TCP, UDP, HTTP, DNS, TELNET, etc.)
- de diagnostiquer des problèmes réseau
- d'identifier des failles de sécurité
- de comprendre comment fonctionne un réseau

C'est un outil indispensable pour :

- les administrateurs réseaux
- les pentesters / analystes sécurité
- les étudiants en réseau / informatique

---

## 📌 2. Interface de Wireshark : les 3 zones importantes

### 1. Liste des paquets (en haut)

Chaque ligne représente un paquet réseau.

**Colonnes importantes :**

- **No.** : numéro du paquet
- **Time** : temps depuis le début de la capture
- **Source** : IP source
- **Destination** : IP destination
- **Protocol** : le protocole utilisé (TCP, ARP, HTTP...)
- **Length** : taille du paquet
- **Info** : résumé du contenu

### 2. Détails du paquet (au milieu)

Découpage du paquet en couches :

- Frame
- Ethernet
- IP
- TCP/UDP
- Application (ex : TELNET, HTTP)

### 3. Vue hexadécimale (en bas)

Contenu brut : hexadécimal + ASCII.

---

## 📌 3. Capturer du trafic

**Démarrer une capture :**

1. Choisir une interface réseau (Wi-Fi, Ethernet, etc.)
2. Cliquer sur **Start Capture** (icône requin bleu)

**Arrêter la capture :**

- Cliquer sur l'icône rouge **Stop**

---

## 📌 4. Filtres Wireshark (très important !)

Wireshark possède un système de filtres très puissant.

### 🔎 Filtres par protocole

```
http
telnet
dns
tcp
udp
arp
icmp
```

### 🔎 Filtres par IP

```
ip.addr == 192.168.0.1
ip.src == 10.0.0.5
ip.dst == 8.8.8.8
```

### 🔎 Filtres par ports

```
tcp.port == 80
udp.port == 53
```

### 🔎 Combinaisons

```
ip.src == 192.168.1.10 && tcp.port == 443
http || https
```

---

## 📌 5. Lire une conversation : Follow Stream

La fonction **Follow Stream** permet de reconstruire une conversation complète.

**Comment l'utiliser ?**

1. Clique sur un paquet d'une connexion TCP ou HTTP ou TELNET
2. Clic droit → **Follow** → **TCP Stream**

Wireshark reconstruit alors tout le dialogue :

- **rouge** = ce que la machine client envoie
- **bleu** = ce que le serveur renvoie

**Très utile pour :**

- Telnet/FTP → mots de passe en clair
- HTTP → requêtes GET/POST
- SMTP → email complet
- etc.

---

## 📌 6. Analyse des protocoles courants

### 🔥 TELNET

- Non chiffré → identifiants visibles en clair
- Très facile à analyser via Follow TCP Stream

### 🔥 HTTP

Permet de voir :

- requêtes GET / POST
- cookies
- User Agents
- fichiers téléchargés

### 🔥 DNS

Voir les résolutions de noms :

- `www.google.com` → `142.250.x.x`

### 🔥 TCP

Éléments utiles :

- 3-Way Handshake (SYN → SYN/ACK → ACK)
- Retransmissions
- ACK / Seq
- Keep-alive

---

## 📌 7. Extraire des fichiers avec Wireshark

**Menu :**

```
File → Export Objects → HTTP / SMB / FTP
```

Allows d'extraire :

- images
- exécutables
- pages HTML
- fichiers téléchargés

---

## 📌 8. Points de sécurité importants

Wireshark révèle :

- mots de passe TELNET/FTP/HTTP en clair
- cookies d'authentification
- trames malveillantes
- scans de ports
- ARP spoofing
- injections

⚠️ **Sur un réseau non chiffré (WiFi ouvert), tu peux tout voir.**

---

## 📌 9. Utilisation avancée

### Statistiques utiles :

**Menu Statistics →**

- **Protocol Hierarchy** : voir quels protocoles dominent
- **Conversations** : pairs IP/PORT en communication
- **Endpoints** : toutes les IP présentes
- **IO Graphs** : graphes de trafic

### Coloration des paquets

Permet :

- colorer les paquets TCP retransmis
- visualiser plus rapidement les erreurs

---

## 📌 10. Exporter et partager une capture

Utilise :

```
File → Save As (.pcap)
```

Permet d'envoyer la capture pour analyse.

---

## 📌 11. Conseils pour bien apprendre Wireshark

- Fais de petites captures de ton propre trafic
- Analyse des sessions simples : ping, HTTP, DNS
- Reconstitue des conversations TCP
- Observe les handshakes TCP
- Filtre un protocole à la fois
- Ouvre des fichiers `.pcap` d'exercices pour t'entraîner

---

## 🎯 Conclusion

Wireshark est un outil extrêmement puissant, capable de :

- diagnostiquer le réseau
- analyser la sécurité
- comprendre des protocoles
- capturer des mots de passe en clair
- reconstruire des conversations entières
