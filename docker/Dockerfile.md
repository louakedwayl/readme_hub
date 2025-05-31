			Dockerfile
******************************************************************************************************

	Qu’est-ce qu’un Dockerfile ?
	----------------------------

Un Dockerfile est un fichier texte qui contient une série d’instructions pour automatiser la création d’une image Docker.

    C’est comme une recette de cuisine pour construire une image.

	Objectif :
	----------

Créer une image personnalisée qui contiendra :

    ton code (ex : fichier C++, Python…),

    ton environnement (ex : Ubuntu, Apache, MySQL…),

    les commandes à exécuter à la construction de l’image.

	Structure de base d’un Dockerfile :
	-----------------------------------

Voici un exemple simple :

# 1. Image de base
FROM ubuntu:20.04

# 2. Auteur
LABEL maintainer="wayl@example.com"

# 3. Mettre à jour les paquets et installer un programme
RUN apt-get update && apt-get install -y \
    g++ \
    make

# 4. Copier les fichiers dans le conteneur
COPY . /app

# 5. Définir le dossier de travail
WORKDIR /app

# 6. Compiler un programme (exemple pour un projet C++)
RUN make

# 7. Définir la commande de lancement
CMD ["./mon_programme"]

	Liste des instructions les plus utilisées :
	-------------------------------------------

Instruction	Description
FROM	Spécifie l’image de base (ex : ubuntu, alpine, node, etc.)
LABEL	Donne des infos comme l’auteur
RUN	Exécute une commande à la construction de l’image
COPY	Copie des fichiers depuis ta machine vers le conteneur
WORKDIR	Change le dossier courant dans le conteneur
CMD	Définit la commande par défaut au lancement du conteneur
ENTRYPOINT	Comme CMD, mais plus rigide (on peut l’utiliser ensemble)
EXPOSE	Documente un port utilisé par le conteneur (ne le publie pas !)
ENV	Définit une variable d’environnement

	Comment construire une image à partir d’un Dockerfile :
	-------------------------------------------------------

    Place-toi dans le dossier contenant le Dockerfile :

cd mon_projet

    Construis l’image :

docker build -t mon_image .

    -t : nom de l’image, . : indique que le Dockerfile est dans le dossier courant.

    Lance un conteneur :

docker run mon_image

    Exemple concret (C++ simple)

Imaginons un fichier main.cpp :

#include <iostream>

int main() 
{
    std::cout << "Hello Docker !" << std::endl;
    return 0;
}

Et un Makefile :

all:
	g++ main.cpp -o hello

Dockerfile associé :

FROM ubuntu:20.04

RUN apt-get update && apt-get install -y g++

COPY . /app
WORKDIR /app

RUN g++ main.cpp -o hello

CMD ["./hello"]

	Bonnes pratiques :
	------------------

    Utilise des images légères si possible (alpine).

    Combine plusieurs commandes RUN pour éviter de créer trop de couches.

    Utilise .dockerignore pour éviter de copier des fichiers inutiles (comme .git, node_modules, etc.).

    Gère les permissions correctement (évite root si possible).

	Conclusion :
	------------

Un Dockerfile est la base de toute image Docker personnalisée. Il te permet de reproduire un environnement 
exactement de la même manière sur n'importe quelle machine.

	Différence entre ENTRYPOINT et CMD dans un Dockerfile :
	--------------------------------------------------------

Les deux instructions ENTRYPOINT et CMD sont utilisées pour définir ce qui s’exécute lorsque le conteneur démarre,
mais elles ont des rôles différents et complémentaires :

	ENTRYPOINT :
	------------

    But : Définit le programme principal du conteneur, qui ne changera pas, peu importe les arguments passés à docker run.

    Exécution : Toujours exécuté.

    Remplacé uniquement avec --entrypoint dans docker run.

Dans ton Dockerfile :

ENTRYPOINT ["/entrypoint.sh"]

Cela signifie que quand tu fais :

docker run mon_image

c’est /entrypoint.sh qui est obligatoirement exécuté.

	CMD :
	-----

    But : Fournit les arguments par défaut à ENTRYPOINT, ou le programme à exécuter s’il n’y a pas de ENTRYPOINT.

    Remplaçable : Si tu passes des arguments à docker run, ils écrasent CMD.

	Résumé :
	--------
 
	ENTRYPOINT :
	------------

    Rôle : Définit le programme principal qui sera toujours exécuté quand le conteneur démarre.

    Remplaçable ? : Non, sauf si on utilise l’option --entrypoint lors de l’exécution du conteneur (docker run).

    Peut être combiné avec CMD ? : ✅ Oui

    Exemple :

ENTRYPOINT ["/entrypoint.sh"]

	Exemple pour bien comprendre :
	------------------------------

ENTRYPOINT ["/entrypoint.sh"]
CMD ["--default-arg"]

    docker run mon_image
    -> lance /entrypoint.sh --default-arg

    docker run mon_image --custom-arg
    -> lance /entrypoint.sh --custom-arg

	CMD :
	-----

    Rôle : Fournit des valeurs par défaut (arguments) au programme défini par ENTRYPOINT,
ou bien une commande à exécuter si ENTRYPOINT est absent.

    Remplaçable ? : Oui, il est automatiquement remplacé si des arguments sont fournis à docker run.

    Peut être combiné avec ENTRYPOINT ? : ✅ Oui

    Exemple :

CMD ["arg1", "arg2"]

	Pour résumer simplement :
	-------------------------

    ENTRYPOINT → c’est le programme principal à exécuter quand le conteneur démarre.

    CMD → ce sont les arguments par défaut qu’on passe à ce programme.

Si tu ne définis pas de ENTRYPOINT, Docker utilise le CMD comme commande complète.

	Qu’est-ce que la directive EXPOSE ?
	-----------------------------------

    EXPOSE est une instruction que l’on met dans un Dockerfile.

    Elle sert à documenter quel(s) port(s) le conteneur utilise en interne.

    Exemple dans un Dockerfile :

    EXPOSE 80

    Cela signifie que le service dans le conteneur écoute sur le port 80.

    EXPOSE n’ouvre pas ce port vers l’extérieur, il sert juste à indiquer ce port dans l’image.

	2/ Comment ouvrir un port vers l’extérieur ?
	--------------------------------------------

Pour que le port du conteneur soit accessible depuis ta machine ou ton réseau, il faut faire du port mapping.

    Avec la commande docker run, on utilise -p ou --publish :

docker run -p 8080:80 nom_de_l_image

Ici, le port 8080 de ta machine sera redirigé vers le port 80 dans le conteneur.

Avec un fichier docker-compose.yml, on écrit :

    services:
      mon_service:
        image: mon_image
        ports:
          - "8080:80"

	3/ Pourquoi cette séparation ?
	------------------------------

    EXPOSE est un moyen de documenter l’image pour savoir quel port elle utilise.

    Le mapping de port (-p ou ports:) est ce qui permet réellement d’ouvrir la communication entre la machine hôte et le conteneur.

	4/ Exemple concret :
	--------------------

Imaginons un conteneur avec un serveur web qui écoute sur le port 80.

    Dockerfile :

FROM nginx
EXPOSE 80

Pour exécuter et rendre ce serveur accessible sur ta machine via le port 8080 :

    docker run -p 8080:80 nginx

    Tu peux alors accéder à http://localhost:8080 depuis ton navigateur.

Résumé rapide
Directive	Rôle
EXPOSE 80	Documente que le conteneur écoute sur le port 80 (interne)
-p 8080:80	Ouvre le port 80 du conteneur vers le port 8080 de la machine hôte

*************************************************************************************************************
