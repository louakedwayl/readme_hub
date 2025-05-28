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

	6/ Mode Détaché (-d) = Arrière-plan :
	-------------------------------------

		Quand l’utiliser :
		------------------

    Tu veux que le conteneur tourne en continu, comme un serveur (ex. : Nginx, PostgreSQL…).

    Tu n’as pas besoin d’interagir avec lui directement via le terminal.

    Tu veux continuer à utiliser ton terminal pendant que le conteneur tourne.

	Exemple :
	---------

sudo docker run -d -p 8080:80 nginx

    ➜ Tu lances Nginx comme un vrai serveur, en fond, et tu peux l'utiliser via le navigateur.

	7/ Mode Interactif (-it) = Premier plan :
	-----------------------------------------

	Quand l’utiliser :
	------------------

    Tu veux interagir directement avec le conteneur, comme dans un terminal Linux.

    Exemple : entrer des commandes dans un conteneur Debian, Ubuntu, etc.

	Exemple :
	---------

sudo docker run -it debian bash

    ➜ Tu entres dans une Debian et tu peux taper des commandes (ls, apt, etc.).

	8/ Pas de -d ni -it → parfois problématique :
	---------------------------------------------

    Si tu oublies -d, ton terminal reste bloqué.

    Si tu oublies -it pour un conteneur interactif, tu ne vois rien ou ne peux rien faire.

	En résumé :
	-----------

Ton but	Option Docker	Exemple
Lancer un serveur en fond	-d	docker run -d -p 8080:80 nginx
Interagir avec un conteneur (comme un shell)	-it	docker run -it debian bash
Tester sans rester bloqué (ex. script rapide)	aucun ou --rm	docker run --rm alpine echo Hello

	Interagir avec un conteneur lancé en arrière-plan (-d) :
	--------------------------------------------------------

Quand tu lances un conteneur avec -d, il tourne en arrière-plan.
Mais tu peux toujours interagir avec lui !
Voici comment faire :

	Voir les logs :
	---------------

docker logs -f <nom_ou_id>

    Affiche les messages du conteneur en temps réel (comme un serveur web qui démarre).

	Ouvrir un terminal dans le conteneur :
	--------------------------------------

docker exec -it <nom_ou_id> bash

    Te permet d’entrer dans le conteneur comme si tu étais en SSH.
    Si bash ne fonctionne pas (image trop légère), utilise sh :

docker exec -it <nom_ou_id> sh

	Se "raccrocher" à un conteneur :
	--------------------------------

docker attach <nom_ou_id>

    Tu verras ce que le conteneur affiche, comme si tu ne l'avais jamais lancé avec -d.

	Attention :
	-----------

    Si tu tapes Ctrl+C, tu arrêtes le conteneur.

    Pour quitter sans le stopper : Ctrl + P, puis Ctrl + Q

*****************************************************************************************
