# Switch / Hub

---

Un **hub** (ou concentrateur) est un dispositif réseau utilisé pour connecter plusieurs périphériques (ordinateurs, imprimantes, etc.) dans un réseau local (LAN).  
C’est un appareil simple et ancien, avec des fonctionnalités limitées, souvent comparé au switch ou au routeur.

Un **switch** (ou commutateur réseau) est un dispositif réseau qui permet de relier plusieurs périphériques (ordinateurs, imprimantes, serveurs, etc.) au sein d'un LAN.  
Contrairement à un hub, qui transmet les données à tous les périphériques connectés, un switch dirige les données uniquement vers le périphérique destinataire, en fonction de son adresse MAC.

## Fonctionnement du Hub

- Lorsqu'il reçoit un signal de données d'un périphérique connecté à l’un de ses ports, il réémet ce signal à tous les autres périphériques connectés.  
- Tous les périphériques du réseau reçoivent les données, qu'elles leur soient destinées ou non.

## Fonctionnement du Switch

1. **Apprentissage des adresses MAC** : Lorsqu'un périphérique envoie un paquet, le switch apprend l'adresse MAC du périphérique source et la mémorise dans une table appelée **table d'adresses MAC**.  
2. **Commutation des données** : Lorsqu'un périphérique envoie des données vers un autre périphérique, le switch consulte sa table pour déterminer quel port doit recevoir les données. Les paquets sont envoyés directement vers le port associé à l'adresse MAC de destination.  
3. **Optimisation du réseau** : Le switch réduit le trafic inutile, car les données ne sont envoyées que là où elles sont nécessaires.

## Avantages d'un Switch par rapport à un Hub

1. **Efficacité** : Réduit les collisions et améliore la performance du réseau.  
2. **Sécurité** : Ne transmet pas les données à tous les périphériques, limitant les risques d'interception.  
3. **Scalabilité** : Permet de connecter un grand nombre de périphériques tout en maintenant une gestion efficace du trafic.

> En résumé, un switch est un composant fondamental dans les réseaux modernes, permettant de gérer les flux de données de manière optimisée et sécurisée.
