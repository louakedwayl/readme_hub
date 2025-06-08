		Docker Network
******************************************************************************

	1/ Pourquoi Docker a besoin de réseau ?
	---------------------------------------

Chaque conteneur Docker est isolé : il tourne dans son propre espace.
Mais très souvent, les conteneurs doivent communiquer entre eux 
(ex : un conteneur WordPress qui parle à un conteneur MariaDB). 

	Docker Network permet :
	-----------------------

    D'assurer cette communication.

    De nommer les conteneurs (DNS interne).

    De contrôler l’isolation réseau entre les conteneurs.

    D’exposer (ou pas) les conteneurs à l’extérieur (vers l’hôte).

	2/ Types de réseaux Docker :
	----------------------------

Docker propose plusieurs types de réseaux :

2.1 bridge (le défaut en local)

    Réseau privé créé automatiquement par Docker.

    Les conteneurs peuvent s’y connecter et communiquer entre eux via leurs noms de service.

    Par défaut, Docker compose utilise un réseau bridge custom nommé comme ton projet (<folder>_default).

    Exemple :
    ---------

    docker network create my_bridge_network --driver bridge

	2.2 host :
	----------

    Le conteneur utilise directement le réseau de la machine hôte.

    Pas d'isolation réseau → plus rapide, mais moins sécurisé.

    Pas disponible sur Mac/Windows, uniquement sur Linux.

   Utilisé si tu veux que le conteneur écoute sur une IP publique sans translation de port.

	2.3 none :
	----------

    Pas de réseau du tout.

    Conteneur totalement isolé.

    🧪 Utilisé pour des tests ou des containers ultra-sécurisés.

	2.4 overlay :
	-------------

    Pour les architectures multi-hôtes (Swarm).

    Permet de connecter des conteneurs entre plusieurs machines physiques.

    Nécessite Docker Swarm.

	3/ Réseaux dans Docker Compose :
	--------------------------------

Dans un docker-compose.yml, tu déclares les réseaux dans la section networks: puis tu les assignes à chaque service.

Exemple simple :

services:
  db:
    image: mariadb
    networks:
      - mynet

  wp:
    image: wordpress
    networks:
      - mynet

networks:
  mynet:
    driver: bridge

    🔧 Ici, wp peut parler à db avec db:3306.

	4/ Communication entre conteneurs :
	-----------------------------------

Quand deux services sont sur le même réseau Docker, ils peuvent se ping et communiquer par leur nom de conteneur :

	Depuis le conteneur WordPress :
	-------------------------------

ping mariadb

Pas besoin d’utiliser l’IP. Docker gère un DNS interne pour chaque réseau.
	
	5/ Docker inspect & debug :
	---------------------------

Voir les réseaux existants :

	docker network ls

Inspecter un réseau :

	docker network inspect nom_du_reseau

Se connecter manuellement à un réseau :

	docker network connect mon_reseau mon_conteneur

Se déconnecter :

	docker network disconnect mon_reseau mon_conteneur

	6/ Ports & exposition :
	-----------------------

Si tu veux exposer un conteneur à l’extérieur (vers le navigateur), tu dois mapper un port hôte → conteneur :

ports:
  - "8080:80"

    ⚠️ Les conteneurs dans le même réseau peuvent se parler sans port exposé.

	Récap :
	-------

+---------+------------+---------------------+-------------------------+
| Type    | Hôte ↔ CTN | CTN ↔ CTN (même net)| Cas d'usage            |
+---------+------------+---------------------+-------------------------+
| bridge  | Oui (ports)| Oui (DNS Docker)    | Par défaut, local       |
| host    | Oui (direct)| Non (même IP)       | Perf, pas d'isolation   |
| none    | Non        | Non                 | Iso complète            |
| overlay | Oui        | Oui (multi hôte)    | Swarm, distribué        |
+---------+------------+---------------------+-------------------------+

    Légende :

    CTN = Conteneur

    Hôte ↔ CTN = Communication entre ta machine et le conteneur

    CTN ↔ CTN = Communication entre conteneurs

********************************************************************************************
