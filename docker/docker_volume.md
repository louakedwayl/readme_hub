		Les volumes Docker
******************************************************************************

1/ Qu'est-ce qu'un volume Docker ? :
------------------------------------

Un volume est un mécanisme de stockage persistant utilisé par Docker pour sauvegarder les données,
indépendamment du cycle de vie des conteneurs.C'est une unité de stockage persistante qui résiste à l'arrêt, au redémarrage ou à la suppression d'un conteneur.

Quand on dit qu’un volume Docker est persistant, ça veut dire :

   Les données qu’il contient sont conservées même si tu arrêtes, redémarres ou supprimes le conteneur.

	Pourquoi les utiliser ?
	-----------------------

    Les données ne sont pas supprimées même si le conteneur est détruit.

    Permet de partager des fichiers entre plusieurs conteneurs.

    Offre de meilleures performances qu’un montage direct depuis l’hôte (bind mount).

    Sécurité et isolation : les données sont gérées uniquement par Docker.

	02/ Comment créer et utiliser un volume ?
	-----------------------------------------

	Créer un volume :
	-----------------

docker volume create mon_volume

	b) Utiliser un volume dans un conteneur :
	-----------------------------------------

docker run -d -v mon_volume:/chemin/dans/le/conteneur image_name

Exemple :

docker run -d -v wordpress_data:/var/www/html wordpress

Ici, les fichiers WordPress seront stockés dans wordpress_data.

	c) Lister les volumes :
	-----------------------

docker volume ls

	d) Inspecter un volume :
	------------------------

docker volume inspect mon_volume

	3/ Où sont stockés les volumes ?
	--------------------------------

Par défaut, Docker stocke les volumes dans :

/var/lib/docker/volumes/

    ⚠️ Ce chemin peut varier selon ton système, mais il ne faut pas modifier manuellement les fichiers dans ce répertoire.

	4/ Supprimer un volume :
	------------------------
	Supprimer un volume inutilisé :

docker volume rm mon_volume

	Supprimer tous les volumes non utilisés :

docker volume prune

    ⚠️ Cette commande est destructive, elle supprime tous les volumes non associés à un conteneur actif.

	5/ Utilisation dans docker-compose :
	------------------------------------

Voici un exemple dans un fichier docker-compose.yml :

version: '3.8'

services:
  wordpress:
    image: wordpress
    volumes:
      - wordpress_files:/var/www/html

  mariadb:
    image: mariadb
    volumes:
      - db_data:/var/lib/mysql

volumes:
  wordpress_files:
  db_data:

	Qu'est-ce qu'un Bind Mount dans Docker ?
	----------------------------------------

Un bind mount est un type de montage où tu connectes directement un dossier de ton système d'exploitation (l'hôte) à un répertoire dans un conteneur Docker.

    ⚠️ Contrairement à un volume Docker, le bind mount n’est pas géré par Docker, mais directement par ton système de fichiers.


	6/ Différences : Volume vs Bind Mount
	-------------------------------------

Critère	Volume (-v nom:/chemin)	Bind Mount (-v /chemin/host:/chemin)
Géré par Docker	✅	❌ (géré par l'utilisateur)
Sécurisé	✅	⚠️ accès complet à l'hôte
Portabilité	✅	❌ dépend du chemin de l’hôte
Usage recommandé	Oui (en prod)	Oui (en dev, pour recompiler du code)

	7/ Bonnes pratiques :
	---------------------

    Utilise des volumes pour les données persistantes : bases de données, fichiers utilisateurs.

    Évite de manipuler les données directement dans /var/lib/docker/....

    Utilise docker-compose pour mieux organiser les volumes et services.

    Donne des noms explicites à tes volumes (db_data, site_files, etc.).

🏁 Résumé

    ✅ Volume = stockage persistant contrôlé par Docker.

    🔁 Les données survivent à l’arrêt ou à la suppression des conteneurs.

    🔐 Plus sécurisé et performant qu’un simple dossier de l’hôte.

    📦 Essentiel pour les applications avec des données (ex : WordPress, PostgreSQL…).
