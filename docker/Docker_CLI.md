# Docker CLI

---

## 1. Qu’est-ce que Docker CLI ?

**Docker CLI** est l’interface en ligne de commande qui permet d’interagir avec **Docker Engine**.  
C’est par elle que tu peux **créer, gérer et superviser** les conteneurs, images, volumes, réseaux, etc.

---

## 2. Installation

- **Docker CLI** s’installe automatiquement avec **Docker Engine**.  
- Sur **Linux**, tu peux vérifier la version avec :  
```bash
docker --version
```
Sur Windows/Mac, Docker Desktop inclut Docker CLI.

## 3. Commandes de base
### a. docker run

Créer et lancer un conteneur à partir d’une image.
```bash
docker run [OPTIONS] IMAGE [COMMAND] [ARG...]
```

### Exemple :
```bash
docker run -it ubuntu /bin/bash
```

-it : mode interactif + terminal

ubuntu : image officielle Ubuntu

/bin/bash : commande à lancer dans le conteneur

### b. docker ps

Liste les conteneurs en cours d’exécution :
```bash
docker ps
```
Avec -a pour voir tous les conteneurs (arrêtés ou pas) :
```bash
docker ps -a
```
### c. docker images

Liste les images Docker locales :
```bash
docker images
```
### d. docker stop et docker kill

Arrêter un conteneur proprement :
```bash
docker stop <container_id|name>
```
Forcer l’arrêt immédiat :
```bash
docker kill <container_id|name>
```
### e. docker rm

Supprimer un ou plusieurs conteneurs (doivent être arrêtés) :
```bash
docker rm <container_id|name>
```

### f. docker rmi

Supprimer une ou plusieurs images locales :
```bash
docker rmi <image_id|name>
```
### g. docker exec

Exécuter une commande dans un conteneur en cours d’exécution :
```bash
docker exec -it <container_id|name> /bin/bash
```
## 4. Gestion des volumes
## a. Créer un volume

```bash
docker volume create mon_volume
```

### b. Lister les volumes

```bash
docker volume ls
```

### c. Utiliser un volume dans un conteneur

```bash
docker run -v mon_volume:/data ubuntu
```

## 5. Gestion des réseaux
### a. Lister les réseaux

```bash
docker network ls
```
### b. Créer un réseau
```bash
docker network create mon_reseau
```

### c. Connecter un conteneur à un réseau

```bash
docker network connect mon_reseau mon_conteneur
```

## 6. Autres commandes utiles

docker logs <container> : voir les logs d’un conteneur

docker inspect <container|image> : infos détaillées (JSON)

docker build -t mon_image . : construire une image depuis un Dockerfile

docker pull <image> : télécharger une image depuis Docker Hub

docker push <image> : envoyer une image vers un registre

## 7. Exemple complet

Lancer un conteneur nginx en mode détaché avec un port exposé :
```bash
docker run -d -p 8080:80 --name mon_nginx nginx
```
-d : mode détaché (background)

-p 8080:80 : mappe le port 8080 de la machine hôte au port 80 du conteneur

--name : nom du conteneur

### Tu peux ensuite vérifier :

docker ps
curl http://localhost:8080

## 8. Astuces

Utilise docker-compose pour gérer plusieurs conteneurs plus facilement (avec un fichier YAML).

Utilise docker system prune pour nettoyer les conteneurs/images inutilisés.

Pense à vérifier régulièrement la taille de tes images.