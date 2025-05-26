docker run et la gestion des ports

	1/ Introduction à docker run :
	------------------------------

La commande docker run sert à lancer un conteneur à partir d’une image Docker.

Syntaxe générale :

docker run [OPTIONS] IMAGE [COMMAND] [ARG...]

    IMAGE : nom de l’image Docker à lancer (ex: nginx, debian, ou ton image custom)

    OPTIONS : paramètres pour configurer le conteneur (ports, volumes, environnement, etc.)

    COMMAND : commande à exécuter à l’intérieur du conteneur (optionnel)

	2/ Notions importantes dans docker run :
	----------------------------------------

a) Mode détaché vs mode interactif

    -d : mode détaché (le conteneur tourne en arrière-plan)

    -it : mode interactif avec un terminal (utile pour entrer dans un conteneur)

b) Gestion des ports : EXPOSE vs -p

EXPOSE (dans Dockerfile)

    Déclare quels ports le conteneur écoute.

    Ne fait que documenter (utile pour Docker et l’utilisateur).

    Exemple dans Dockerfile :

    EXPOSE 80 443

    Ne publie pas automatiquement les ports vers l’extérieur.

-p (dans docker run)

    Mappe un port de la machine hôte vers un port du conteneur.

    Rend le service accessible depuis l’extérieur.

    Exemple :

    docker run -p 8080:80 -p 8443:443 my-nginx

    Ici :

        Le port 8080 de la machine hôte est relié au port 80 du conteneur.

        Le port 8443 de la machine hôte est relié au port 443 du conteneur.

c) Autres options utiles
Option	Description	Exemple
--name	Donne un nom au conteneur	--name mon-nginx
-v / --volume	Monte un dossier local dans le conteneur	-v /home/user/site:/usr/share/nginx/html
-e / --env	Définit une variable d’environnement	-e ENV=production
--rm	Supprime le conteneur automatiquement à l’arrêt	--rm

	3/ Exemple complet :
	--------------------

Supposons que tu as une image my-nginx qui écoute sur les ports 80 et 443.

Pour lancer ce conteneur en arrière-plan, avec un mapping de ports, tu feras :

docker run -d -p 8080:80 -p 8443:443 --name nginx-test my-nginx

    -d → lance en détaché

    -p 8080:80 → redirige le port 8080 de ta machine vers le port 80 du conteneur (HTTP)

    -p 8443:443 → redirige le port 8443 de ta machine vers le port 443 du conteneur (HTTPS)

    --name nginx-test → donne un nom au conteneur pour le gérer plus facilement

	4/ Tester la connexion :
	------------------------

    Ouvre ton navigateur et tape :
    http://localhost:8080 pour HTTP
    https://localhost:8443 pour HTTPS

    Ou avec curl :

    curl http://localhost:8080
    curl -k https://localhost:8443   # -k pour ignorer le certificat auto-signé

	5/ Résumé clé :
	---------------

Concept	Fonction
docker run	Lance un conteneur à partir d’une image
EXPOSE	Indique quels ports le conteneur écoute (doc)
-p host:container	Mappe un port de la machine hôte vers le conteneur (rend accessible)
-d	Mode détaché (arrière-plan)
--name	Donne un nom au conteneur

*****************************************************************************************
