     Docker Network
***********************************************************************************
📌 Objectif

Comprendre comment fonctionnent les réseaux Docker pour permettre la communication entre conteneurs,
 l’isolation, et le contrôle du trafic réseau.

    1. Qu’est-ce qu’un Docker Network ?
    -----------------------------------

Un Docker network est un réseau virtuel interne géré par Docker.
Il permet à des conteneurs :

    de communiquer entre eux (via DNS interne)

    d’être isolés du reste du système

    de sécuriser et organiser les flux réseaux

    2/ Types de réseaux Docker:
    ---------------------------

Docker propose plusieurs types de réseaux :
Type	Description
bridge	Réseau virtuel par défaut pour conteneurs sur un même hôte
host	Conteneur utilise le réseau de l’hôte (pas d’isolation réseau)
none	Aucune interface réseau pour le conteneur (totalement isolé)
overlay	Réseau distribué entre plusieurs hôtes (utilisé avec Docker Swarm)
macvlan	Donne une adresse MAC au conteneur (comme une vraie machine physique)

    3/ Le réseau bridge (le plus utilisé) :
    ---------------------------------------

C’est le réseau par défaut sur un hôte local.
Création :

docker network create mon_reseau

Ajout d’un conteneur à ce réseau :

docker run -d --name back --network mon_reseau backend-image
docker run -d --name front --network mon_reseau frontend-image

    Les conteneurs peuvent maintenant se parler via :

curl http://back:5000

(pas besoin d’IP : Docker gère un DNS interne)

    4. Lister et inspecter les réseaux :
    ------------------------------------


    Lister les réseaux Docker :

docker network ls

    Inspecter un réseau :

docker network inspect mon_reseau

Tu y verras les IP des conteneurs, leur nom, le type de réseau, etc.

5/ Supprimer un réseau :
------------------------

docker network rm mon_reseau

Tu dois d’abord arrêter ou détacher les conteneurs du réseau.

6/ Utilisation avec docker-compose :
------------------------------------

version: '3'
services:
  web:
    image: nginx
    networks:
      - app-network
  api:
    image: my-api
    networks:
      - app-network

networks:
  app-network:
    driver: bridge

➡️ Tous les services peuvent se parler avec leurs noms de service (web, api, etc.).

🔐 7. Bonnes pratiques
------------------------

✅ Crée un réseau personnalisé pour chaque groupe de services
✅ Utilise les noms de conteneur comme noms DNS
✅ Évite le réseau host sauf si tu sais ce que tu fais
✅ Utilise docker-compose pour gérer proprement les réseaux et services

*****************************************************************
