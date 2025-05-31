            Cours : Utilisation de la commande wget
*******************************************************************************************

    1/ Qu’est-ce que wget ?
    -----------------------

wget est un outil en ligne de commande Unix/Linux qui permet de télécharger des fichiers depuis Internet. Il fonctionne avec plusieurs protocoles comme HTTP, HTTPS, et FTP.

C’est un utilitaire puissant, simple à utiliser, et très utile pour automatiser des téléchargements dans des scripts.

wget ne demande pas de validations interactives par défaut. C’est un outil non interactif, conçu pour fonctionner dans des scripts ou en ligne de commande sans intervention humaine.

    2/ Syntaxe de base :
    --------------------

wget [options] URL

4/ Commandes et options principales

    Télécharger un fichier :

wget http://exemple.com/fichier.zip

    Changer le nom du fichier téléchargé :

wget -O nouveau_nom.zip http://exemple.com/fichier.zip

    Télécharger en arrière-plan :

wget -b http://exemple.com/fichier.zip

Le téléchargement continue en tâche de fond et écrit un fichier wget-log.

    Reprendre un téléchargement interrompu :

wget -c http://exemple.com/fichier.zip

    Téléchargement récursif (pour un site entier) :

wget -r http://exemple.com/dossier/

    Limiter la vitesse de téléchargement :

wget --limit-rate=200k http://exemple.com/fichier.zip

    Télécharger plusieurs fichiers listés dans un fichier texte :
    Supposons que liste.txt contient plusieurs URLs, une par ligne.

wget -i liste.txt

    Ne pas télécharger certains fichiers ou dossiers :
    Avec des options de filtre comme --reject ou --accept.

    3/ Exemple de script avec wget :
    --------------------------------

#!/bin/bash

url="http://exemple.com/backup.tar.gz"
wget -c $url -O backup.tar.gz

if [ $? -eq 0 ]; then
  echo "Téléchargement terminé avec succès !"
else
  echo "Erreur lors du téléchargement."
fi

    6/ Cas d’utilisation courants :
    -------------------------------

    Télécharger un fichier rapidement depuis le terminal.

    Automatiser des sauvegardes ou récupérations régulières.

    Récupérer des sites entiers pour une consultation hors-ligne.

    Tester l’accessibilité d’un serveur ou d’une URL.

    7/ Alternatives :
    -----------------

    curl : autre outil de téléchargement en ligne de commande, plus polyvalent mais souvent un peu plus complexe.

********************************************************************************************************************
