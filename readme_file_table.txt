				File_table
***********************************************************************************

	Dans les systèmes de fichiers de type Unix, il existe deux niveaux principaux
de file table pour gérer les fichiers ouverts :

    File Table Globale (ou System-Wide File Table) :
    ------------------------------------------------

        Elle stocke des informations globales sur chaque fichier ouvert dans le système,
telles que la position actuelle dans le fichier, les permissions d'accès, et d'autres métadonnées.
     Cette table est partagée entre tous les processus qui accèdent à un même fichier. 
Par exemple, si plusieurs processus accèdent au même fichier, ils pointent tous vers 
la même entrée (file structure) dans la file table globale.
        L'entrée contient également un compteur de référence, indiquant combien de 
descripteurs de fichiers (pointeurs) se réfèrent à ce fichier ouvert.



    File Table Utilisateur (ou User File Descriptor Table) :
    --------------------------------------------------------

        Chaque processus possède sa propre table de descripteurs de fichiers (file table utilisateur).
Elle établit le lien entre les descripteurs de fichiers utilisés par le processus 
(comme 0 pour stdin, 1 pour stdout, etc.) et les entrées dans la file table globale.
        Cela permet à chaque processus d'avoir ses propres descripteurs et de manipuler
 les fichiers indépendamment des autres processus.

En combinant ces deux tables, Unix permet une gestion efficace des fichiers,
 avec un accès contrôlé et structuré entre les processus et le système de fichiers sous-jacent.

***************************************************************************************
