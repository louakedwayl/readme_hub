Docker CLI ?
************************************************************************************************

Docker CLI est l’interface en ligne de commande qui permet d’interagir avec Docker Engine.
C’est par elle que tu peux créer, gérer, et superviser les conteneurs, images, volumes, réseaux, etc.

	2/ Installation :
	-----------------

    Docker CLI s’installe automatiquement avec Docker Engine.

    Sur Linux, tu peux vérifier la version avec :

    docker --version

    Sur Windows/Mac, Docker Desktop inclut Docker CLI.

	3/ Commandes de base
	--------------------

	a) docker run

Créer et lancer un conteneur à partir d’une image.

docker run [OPTIONS] IMAGE [COMMAND] [ARG...]

	Exemple :
	---------

docker run -it ubuntu /bin/bash

    -it : interactive + tty (terminal)

    ubuntu : image officielle Ubuntu

    /bin/bash : commande à lancer dans le conteneur

	b) docker ps
	
Liste les conteneurs en cours d’exécution.

	docker ps

Avec -a pour voir tous les conteneurs (arrêtés ou pas) :

	docker ps -a

	c) docker images

Liste les images Docker locales.

	docker images

d) docker stop et docker kill

Arrêter un conteneur proprement :

	docker stop <container_id|name>

Forcer l’arrêt immédiat :

	docker kill <container_id|name>

e) docker rm

	Supprimer un ou plusieurs conteneurs (doivent être arrêtés) :

docker rm <container_id|name>

f) docker rmi

	Supprimer une ou plusieurs images locales :

docker rmi <image_id|name>

g) docker exec

	Exécuter une commande dans un conteneur en cours d’exécution.

docker exec -it <container_id|name> /bin/bash

	4/ Gestion des volumes :
	------------------------

a) Créer un volume

	docker volume create mon_volume

b) Lister les volumes

	docker volume ls

c) Utiliser un volume dans un conteneur

	docker run -v mon_volume:/data ubuntu

	5/ Gestion des réseaux :
	------------------------

a) Lister les réseaux

docker network ls

b) Créer un réseau

docker network create mon_reseau

c) Connecter un conteneur à un réseau

docker network connect mon_reseau mon_conteneur

	6/ Autres commandes utiles :
	----------------------------

    docker logs <container> : voir les logs d’un conteneur

    docker inspect <container|image> : infos détaillées JSON

    docker build -t mon_image . : construire une image depuis un Dockerfile

    docker pull <image> : télécharger une image depuis Docker Hub

    docker push <image> : envoyer une image vers un registre

	7/ Exemple complet :
	--------------------

Lancer un conteneur nginx en mode détaché avec un port exposé :

docker run -d -p 8080:80 --name mon_nginx nginx

    -d : mode détaché (background)

    -p 8080:80 : mappe le port 8080 de la machine hôte au port 80 du conteneur

    --name : nom du conteneur

Tu peux ensuite vérifier :

docker ps
curl http://localhost:8080

	8/ Astuces :
	------------

    Utilise docker-compose pour gérer plusieurs conteneurs plus facilement (avec un fichier YAML).

    Utilise docker system prune pour nettoyer les conteneurs/images inutilisés.

    Pense à vérifier régulièrement la taille de tes images.

	Conclusion :
	------------

Docker CLI est un outil puissant qui te permet de tout faire avec Docker, de la création 
à la gestion avancée des conteneurs et ressources.

************************************************************************************************
