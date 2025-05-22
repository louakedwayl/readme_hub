		Commandes Docker essentielles
************************************************************************************************

	Gestion des images :
	-------------------- 

    docker pull <image>
    Télécharge une image depuis un registre (ex: Docker Hub).

    docker images
    Liste toutes les images Docker locales.

    docker rmi <image>
    Supprime une ou plusieurs images locales.

	Gestion des conteneurs :
	------------------------

    docker run <image>
    Crée et lance un conteneur à partir d’une image.

    docker ps
    Liste les conteneurs en cours d’exécution.

    docker ps -a
    Liste tous les conteneurs, même arrêtés.

    docker stop <container_id|name>
    Arrête un conteneur en cours d’exécution.

    docker start <container_id|name>
    Démarre un conteneur arrêté.

    docker restart <container_id|name>
    Redémarre un conteneur.

    docker rm <container_id|name>
    Supprime un conteneur arrêté.

	Construction d’images :
	-----------------------

    docker build -t <nom_image> <chemin>
    Construit une image à partir d’un Dockerfile.

	Interaction avec un conteneur :
	-------------------------------

    docker exec -it <container_id|name> bash
    Ouvre un terminal interactif dans un conteneur en cours d’exécution.

    docker logs <container_id|name>
    Affiche les logs d’un conteneur.

	Nettoyage :
	-----------

    docker system prune
    Supprime tous les conteneurs arrêtés, images non utilisées, réseaux inutilisés, etc.

	Autres commandes utiles :
	-------------------------

    docker info
    Affiche des informations sur l’installation Docker.

    docker version
    Affiche la version de Docker installée.

    docker inspect <container_id|image_id>
    Donne des détails techniques sur un conteneur ou une image.

***********************************************************************************************************************
