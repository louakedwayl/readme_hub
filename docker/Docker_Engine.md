# Docker Engine
---

## 1/ Qu’est-ce que Docker Engine ?

Docker Engine est le moteur principal qui permet de créer, gérer et exécuter des conteneurs Docker.  
C’est une application client-serveur qui contient :

Docker Engine est composé de plusieurs parties :

- **Docker Daemon (le serveur)** : C’est le service principal qui tourne en arrière-plan sur ta machine. Il crée, exécute, et gère les conteneurs Docker.
- **Docker CLI (le client)** : C’est l’interface en ligne de commande que tu utilises pour envoyer des commandes au daemon.
- **API REST** : Le client (CLI) communique avec le daemon via une API.

👉 Donc **Docker Engine = client + serveur**.

---

## 2/ Concepts clés :

- **Conteneur** : un environnement isolé léger qui contient tout ce dont une application a besoin pour tourner (code, dépendances, configuration).
- **Image Docker** : un modèle immuable qui sert à créer des conteneurs. Une image est une sorte de *snapshot* d’un système de fichiers.
- **Dockerfile** : fichier texte qui décrit comment construire une image Docker.
- **Registry** : dépôt en ligne (ex : Docker Hub) où on stocke et partage les images Docker.

---

## 3/ Architecture de Docker Engine :

- Le **Docker client** (ligne de commande `docker`) envoie des commandes au **Docker daemon** (`dockerd`).
- Le **daemon** gère les objets Docker : images, conteneurs, réseaux, volumes.
- Le **daemon** communique avec le système d’exploitation Linux via des fonctionnalités comme les **cgroups** et les **namespaces** pour isoler les conteneurs.
- Les **images** peuvent être récupérées ou envoyées à un **registry**.

---

## 4/ Installation de Docker Engine :

Sur une distribution Linux (exemple Ubuntu) :

```bash
sudo apt update
sudo apt install docker.io
sudo systemctl start docker
sudo systemctl enable docker
```

### Vérification :

```bash
docker --version
sudo docker run hello-world
```

## 5/ Commandes Docker Engine de base :

### Lister les images :

```bash
docker images
```

### Lister les conteneurs actifs :

```bash
docker ps
```

### Lister tous les conteneurs (même arrêtés) :

```bash
docker ps -a
```

### Créer et lancer un conteneur :

```bash
docker run -it ubuntu /bin/bash
```

### Arrêter un conteneur :

```bash
docker stop <container_id>
```

### Supprimer un conteneur :

```bash
docker rm <container_id>
```

### Supprimer une image :
```bash
docker rmi <image_id>
```

## 6/ Fonctionnement interne :

Docker Engine utilise des mécanismes du noyau Linux :

Namespaces : pour isoler l’espace de processus, réseau, système de fichiers, etc.

Cgroups (control groups) : pour limiter et gérer les ressources (CPU, mémoire, I/O) utilisées par les conteneurs.

Union filesystem (comme OverlayFS) : pour empiler les couches d’images et optimiser l’espace disque.

## 7/ Avantages de Docker Engine :

Isolation légère et rapide comparée aux machines virtuelles.

Portabilité des applications (fonctionne partout où Docker Engine est installé).

Facilité de gestion des dépendances et des environnements.

Automatisation et scalabilité grâce aux images Docker et aux orchestrateurs.

## 8/ Limites :

Docker Engine nécessite un noyau Linux récent (sur Windows/Mac, Docker utilise une VM Linux).

La sécurité dépend beaucoup des configurations, car un conteneur a parfois accès à l’hôte.

Ne remplace pas toujours une VM quand une isolation complète est nécessaire.

## 9/ Conclusion :

Docker Engine est la base technique qui permet de gérer les conteneurs Docker. Comprendre son architecture et ses commandes permet de tirer parti de la conteneurisation pour simplifier le déploiement, le développement et la maintenance des applications.

