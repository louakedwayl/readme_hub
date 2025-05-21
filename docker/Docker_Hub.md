				Cours : Docker Hub
******************************************************************************************
	
	1/ Qu’est-ce que Docker Hub ?
	-----------------------------

Docker Hub est un service en ligne proposé par Docker qui permet de :

    Stocker des images Docker (des snapshots d'environnements prêts à être exécutés).

    Partager ces images avec d’autres utilisateurs.

    Découvrir et utiliser des images Docker créées par la communauté.

C’est en quelque sorte le “GitHub des images Docker”.

	2/ Pourquoi utiliser Docker Hub ?
	----------------------------------

    Centraliser tes images Docker pour y accéder facilement de n’importe où.

    Partager tes images avec ta team ou la communauté.

    Automatiser la construction et le déploiement d’images (avec les Docker Hub Automated Builds).

    Trouver des images officielles (ex : nginx, mysql, node) déjà prêtes à l’emploi.

	3/ Concepts clés de Docker Hub :
	--------------------------------

Terme	Description
Repository	Un dossier contenant une ou plusieurs images Docker. Ex: wayl/myapp.
Image	Un snapshot d’un environnement Docker, versionné par des tags.
Tag	Une version spécifique d’une image (ex: latest, v1.0).
Namespace	Le nom d’utilisateur ou organisation Docker qui possède les repos.

	4/ Comment utiliser Docker Hub ?
	--------------------------------

	a) Se connecter 

		Dans le terminal, connecte-toi à ton compte Docker Hub :

	docker login

	Tu dois fournir ton nom d’utilisateur et ton mot de passe Docker Hub.
	
b) Pousser une image sur Docker Hub (push)

    Construis ton image localement :

docker build -t wayl/myapp:1.0 .

    Pousse l’image sur Docker Hub :

docker push wayl/myapp:1.0

	c) Récupérer une image depuis Docker Hub (pull)

docker pull wayl/myapp:1.0

	d) Utiliser une image Docker Hub

docker run wayl/myapp:1.0

	5/ Docker Hub : repository public vs privé :
	--------------------------------------------

    Public : tout le monde peut voir et télécharger l’image.

    Privé : seul toi (et les utilisateurs que tu autorises) peuvent y accéder.

	6/ Fonctionnalités avancées :
	-----------------------------

    Automated Builds : Docker Hub peut construire automatiquement des images à partir d’un dépôt GitHub ou Bitbucket.

    Webhooks : Docker Hub peut notifier un service quand une nouvelle image est publiée.

    Teams & Organisations : gestion des droits d’accès à plusieurs utilisateurs.

	7/ Ressources utiles :
	----------------------

    Site officiel Docker Hub : https://hub.docker.com

    Documentation Docker Hub : https://docs.docker.com/docker-hub/

	8/ Résumé :
	-----------

Points clés	Description
Docker Hub	Plateforme de partage et stockage d’images Docker
Repository	Collection d’images versionnées
Push	Envoyer une image locale vers Docker Hub
Pull	Télécharger une image depuis Docker Hub
Public vs Privé	Contrôle de la visibilité des images

****************************************************************************************************
