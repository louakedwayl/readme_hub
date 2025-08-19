# INODE TABLE

Dans les systèmes de fichiers de type Unix :

La table d'inodes, ou node index, est une structure de données 
qui contient des informations générales sur tous les fichiers dans 
le système. Par exemple, s'il y a 10 000 fichiers sur le système, 
il y aura 10 000 entrées dans la table des inodes.

Chaque inode contient des métadonnées sur le fichier, notamment :

- La taille du fichier
- Les permissions et le propriétaire
- Les dates de création, de modification et d'accès
- Des pointeurs vers les blocs de données où le contenu du fichier est stocké sur le disque

## 1. La table des inodes sur le disque :
- Sur le disque dur, la table des inodes contient les inodes de tous les fichiers 
  et répertoires présents sur le système de fichiers. Cela inclut tous les fichiers, 
  même ceux qui ne sont pas ouverts.
- Cette table est une structure de données qui ne contient que des métadonnées 
  sur les fichiers et répertoires (pas leur contenu réel, qui est dans les blocs de données).

## 2. Chargement en RAM :
- Le noyau charge une partie de la table des inodes en mémoire 
  (stockée dans une partie partagée de la RAM appelée *inode cache*) 
  pour accélérer l'accès aux métadonnées des fichiers et répertoires fréquemment utilisés.
- Seuls les fichiers ouverts sont présents dans l'inode cache.    

