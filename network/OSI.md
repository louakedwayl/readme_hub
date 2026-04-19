# Modèle OSI (Open Systems Interconnection)

## Définition

Modèle théorique normalisé par l'**ISO** en 1984. Il décompose la communication réseau en **7 couches** indépendantes, chacune ayant un rôle précis.

**Objectif** : standardiser les échanges entre systèmes et faciliter le diagnostic réseau.

---

## Les 7 couches

### 1. Physique

**Rôle** : transmission des bits (0/1) sur le support physique.
**Unité** : bit.
**Équipements** : câbles, fibre optique, hub, répéteur.
**Standards** : Ethernet (câblage), Wi-Fi (radio), Bluetooth, USB, DSL.

---

### 2. Liaison de données

**Rôle** : communication entre deux machines sur un même réseau local. Détection d'erreurs.
**Unité** : trame.
**Adressage** : adresse MAC.
**Équipements** : switch, carte réseau, point d'accès Wi-Fi.
**Protocoles principaux** :
- **Ethernet** (IEEE 802.3)
- **Wi-Fi** (IEEE 802.11)
- **ARP** (résolution IP ↔ MAC)
- **PPP**
- **VLAN** (802.1Q)

---

### 3. Réseau

**Rôle** : acheminement des paquets entre réseaux distincts (routage).
**Unité** : paquet.
**Adressage** : adresse IP.
**Équipements** : routeur.
**Protocoles principaux** :
- **IPv4** / **IPv6**
- **ICMP** (ping, traceroute)
- **OSPF**, **BGP**, **RIP** (routage)
- **IPsec** (chiffrement)
- **NAT**

---

### 4. Transport

**Rôle** : communication de bout en bout entre processus. Fiabilité, segmentation, contrôle de flux.
**Unité** : segment (TCP) / datagramme (UDP).
**Adressage** : numéro de port.
**Protocoles principaux** :
- **TCP** — fiable, connecté (HTTP, SSH, FTP…)
- **UDP** — rapide, non fiable (DNS, DHCP, VoIP, streaming)
- **QUIC** — moderne, au-dessus d'UDP (HTTP/3)

---

### 5. Session

**Rôle** : ouverture, gestion et fermeture des sessions de communication.
**Protocoles principaux** :
- **NetBIOS**
- **RPC** (Remote Procedure Call)
- **PPTP** (VPN)
- **SOCKS** (proxy)

---

### 6. Présentation

**Rôle** : format des données — encodage, compression, chiffrement.
**Standards principaux** :
- **TLS / SSL** (chiffrement)
- **ASCII**, **UTF-8** (encodage)
- **JPEG**, **PNG**, **MP3**, **MPEG** (média)
- **MIME**

---

### 7. Application

**Rôle** : interface directe avec l'utilisateur et les applications.
**Protocoles principaux** :
- **HTTP / HTTPS** — Web
- **DNS** — résolution de noms
- **DHCP** — attribution IP
- **FTP / SFTP** — transfert de fichiers
- **SSH** — shell distant
- **SMTP / POP3 / IMAP** — email
- **SNMP** — supervision
- **LDAP** — annuaires
- **NTP** — synchronisation horaire
- **RDP** — bureau distant

---

## Fonctionnement global

**Encapsulation** :
- Côté émetteur, les données **descendent** les couches (7 → 1). Chaque couche ajoute un en-tête.
- Les données sont transmises sur le réseau.
- Côté récepteur, elles **remontent** les couches (1 → 7). Chaque couche lit et retire son en-tête.

```
Émetteur              Récepteur
7. Application   →    7. Application
6. Présentation  →    6. Présentation
5. Session       →    5. Session
4. Transport     →    4. Transport
3. Réseau        →    3. Réseau
2. Liaison       →    2. Liaison
1. Physique      →    1. Physique
        ↓ Support physique ↑
```

---

## OSI vs TCP/IP

| OSI (7 couches)   | TCP/IP (4 couches) |
|-------------------|--------------------|
| 7. Application    | Application        |
| 6. Présentation   | Application        |
| 5. Session        | Application        |
| 4. Transport      | Transport          |
| 3. Réseau         | Internet           |
| 2. Liaison        | Accès réseau       |
| 1. Physique       | Accès réseau       |

OSI = modèle **théorique** (référence pédagogique).
TCP/IP = modèle **réellement utilisé** sur Internet.

---

## Ports standards (L4)

| Port | Protocole |
|------|-----------|
| 22   | SSH       |
| 25   | SMTP      |
| 53   | DNS       |
| 67/68| DHCP      |
| 80   | HTTP      |
| 110  | POP3      |
| 143  | IMAP      |
| 443  | HTTPS     |
| 3389 | RDP       |

---

## À retenir

- **7 couches**, chacune avec un rôle spécifique.
- **Encapsulation** : ajout d'en-têtes en descente, retrait en montée.
- OSI sert à **comprendre, diagnostiquer et organiser** les communications réseau.
- Maîtriser OSI = savoir **où intervenir** lors d'une attaque ou d'un débogage.

---

## Mnémotechnique

**PLRTSPA** → **P**hysique, **L**iaison, **R**éseau, **T**ransport, **S**ession, **P**résentation, **A**pplication.
