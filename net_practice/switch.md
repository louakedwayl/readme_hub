					Switch / Hub
**********************************************************************************************

	Un hub (ou concentrateur) est un dispositif réseau utilisé pour connecter plusieurs 
périphériques (ordinateurs, imprimantes, etc.) dans un réseau local (LAN). C’est un appareil 
simple et ancien, souvent comparé au switch ou au routeur, mais avec des fonctionnalités beaucoup
 plus limitées.

	Un switch (ou commutateur réseau) est un dispositif réseau qui permet de relier 
plusieurs périphériques (ordinateurs, imprimantes, serveurs, etc.) au sein d'un réseau local (LAN).
Contrairement à un hub, qui transmet les données à tous les périphériques connectés, un switch 
fonctionne de manière plus intelligente en dirigeant les données uniquement vers le périphérique 
destiné, en fonction de son adresse MAC.


Fonctionnement du Hub:
----------------------

	Un hub fonctionne de manière très basique : lorsqu'il reçoit un signal de données 
d'un périphérique connecté à l’un de ses ports, il réémet ce signal à tous les autres périphériques
 connectés. Cela signifie que tous les périphériques du réseau reçoivent les données, qu'elles 
leur soient destinées ou non.

Fonctionnement du Switch:
--------------------------

	1. Apprentissage des adresses MAC : Lorsqu'un périphérique envoie un paquet de données, 
le switch apprend l'adresse MAC du périphérique source et la mémorise dans une table appelée 
table d'adresses MAC.

	2. Commutation des données : Lorsqu'un périphérique envoie des données vers un autre 
périphérique, le switch consulte sa table d'adresses MAC pour déterminer quel port doit recevoir
les données. Il envoie donc les paquets directement vers le port associé à l'adresse MAC de destination.

3. Optimisation du réseau : Le switch permet de réduire le trafic inutile dans le réseau, car les données ne sont envoyées que là où elles sont nécessaires.

 Avantages d'un Switch par rapport a un hub:
---------------------------------------------

1/ Efficacité : Il réduit les collisions et améliore la performance du réseau par rapport à un hub.

2/ Sécurité : Le switch ne transmet pas les données à tous les périphériques, ce qui limite les risques d'interception.

3/ Scalabilité : Il permet de connecter un grand nombre de périphériques, tout en maintenant une gestionefficace du trafic.

	En résumé, un switch est un composant fondamental dans les réseaux modernes, permettant de gérerles flux de données de manière optimisée et sécurisée.

**************************************************************************************************
