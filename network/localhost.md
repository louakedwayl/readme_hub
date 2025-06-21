# localhost et l'interface loopback

---

## 1/ Qu’est-ce que localhost ?

- **localhost** est un nom de domaine spécial pointant vers l’adresse IP **127.0.0.1**.  
- Cette IP est réservée à la boucle locale (loopback), c’est-à-dire une communication interne à ta machine.  
- Taper localhost ou envoyer une requête à 127.0.0.1, c’est rester sur ta machine, sans sortir sur le réseau.

---

## 2/ Pourquoi utiliser localhost ?

- Tester des applications réseau localement sans Internet.  
- Communiquer entre processus/services sur la même machine.  
- Sécuriser les échanges internes (pas de sortie réseau).  
- Obtenir une communication ultra rapide (pas de latence réseau).

---

## 3/ L’interface réseau loopback (virtuelle)

- **localhost ne fonctionne pas sans interface réseau**.  
- Il existe une interface spéciale, virtuelle, appelée **loopback** (souvent `lo`).  
- Elle ne correspond pas à une carte physique, mais à un périphérique logiciel.  
- Elle gère tout le trafic interne sur 127.x.x.x.  
- Commande Linux pour voir cette interface :  
```bash
ip addr show lo
```
## 4/ Fonctionnement de la boucle locale

Quand tu envoies un paquet à 127.0.0.1, le système redirige en interne via l’interface loopback.
Le paquet ne passe jamais par ta carte réseau, box ou routeur.
Communication ultra rapide, “circuit fermé” interne.

## 5/ Configuration dans /etc/hosts

Ce fichier fait la correspondance noms de domaine → IP.
Ligne clé souvent présente :
127.0.0.1    localhost
Permet de résoudre localhost localement sans DNS externe.
Tu peux ajouter d’autres noms pointant vers 127.0.0.1 pour des tests (exemple : wlouaked.42.fr).

## 6/ Pourquoi ne pas utiliser directement 127.0.0.1 ?

localhost est une convention standard, plus lisible et pratique.
Certaines applis s’attendent au nom localhost.
Résolution locale rapide via /etc/hosts sans interroger DNS.

## 7/ Différence entre localhost et autres IP

| Adresse IP   | Description                        |
|--------------|----------------------------------|
| 127.0.0.1    | Boucle locale, communication interne |
| 192.168.x.x  | Adresse privée sur réseau local (LAN) |
| IP publique  | Adresse accessible depuis Internet |

## 8/ Cas pratique : localhost dans Docker

Dans un container Docker, localhost désigne le container lui-même, pas l’hôte.
Pour accéder à un autre container (ex: base de données), il faut utiliser le nom du service Docker (ex: mariadb), pas localhost.

Exemple : dans wp-config.php tu mets DB_HOST=mariadb et pas localhost.

### Conclusion

localhost est une adresse IP spéciale qui permet à ta machine de communiquer avec elle-même via une interface réseau virtuelle (loopback).
C’est fondamental pour développer et tester localement.
Grâce à la configuration simple dans /etc/hosts, la résolution se fait en local sans passer par DNS.
