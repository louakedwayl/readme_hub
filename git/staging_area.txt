					      Staging Area
*******************************************************************************************************

L'index de Git:
---------------

	L'index de Git, parfois appelé la zone de staging ou la zone d'indexation, est un composant
clé de Git. Il joue un rôle intermédiaire entre l'arborescence de travail (les fichiers sur 
votre disque) et l'historique des commits dans le dépôt Git.

Commandes liées à l'index:
--------------------------

	Voici les commandes principales qui interagissent avec l'index :

1 / git add : 
-------------

	Ajoute un fichier ou un ensemble de fichiers modifiés à l'index.

Exemple :

git add fichier.txt
git add . # Ajoute tous les fichiers modifiés dans le répertoire actuel

Les fichiers ajoutés à l'index seront inclus dans le prochain commit.

2/ git status :
---------------

	Permet de voir l'état des fichiers dans la zone de travail et dans l'index.

Exemple de sortie :

Changes to be committed:
  (use "git restore --staged <file>..." to unstage)
  modified:   fichier.txt

3/ git restore --staged <fichier>
----------------------------------

	Permet de voir l'état des fichiers dans la zone de travail et dans l'index.

Exemple :

git restore --staged fichier.txt

4/ git commit :
---------------

Valide toutes les modifications présentes dans l'index et les ajoute à l'historique du dépôt.

Exemple :

git commit -m "Message du commit"

*****************************************************************************************************
