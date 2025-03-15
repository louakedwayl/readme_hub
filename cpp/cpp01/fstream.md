                                            fstream
************************************************************************************************

1/ Introduction aux flux de fichiers en C++ :
---------------------------------------------

En C++, la bibliothèque <fstream> fournit trois classes principales pour manipuler les fichiers :

1/ std::ifstream : pour la lecture (input file stream).

2/ std::ofstream : pour l’écriture (output file stream).

3/ std::fstream : pour la lecture et l’écriture (file stream), combinant les fonctionnalités
                  des deux classes précédentes.

Ces classes héritent de la classe de base std::ios et possèdent des méthodes communes pour vérifier 
l’état du flux (comme good(), fail(), eof(), etc.) et pour ouvrir/fermer des fichiers.

2/std::ifstream – Lecture à partir d’un fichier :
-------------------------------------------------

std::ifstream est utilisé pour ouvrir un fichier en mode lecture.

On peux ouvrir un fichier directement lors de la construction de l’objet ou en appelant la méthode open() :
-----------------------------------------------------------------------------------------------------------

std::ifstream fichier("monFichier.txt");  // ouverture lors de la construction

// ou
std::ifstream fichier;
fichier.open("monFichier.txt");

Vérification de l’ouverture :
-----------------------------

Il est conseillé de vérifier si le fichier a bien été ouvert avant de procéder à la lecture.

if (!fichier.is_open()) 
{
    std::cerr << "Erreur lors de l'ouverture du fichier en lecture." << std::endl;
    return;
}

Lecture :
----------

On peux utiliser l’opérateur d’extraction >> ou la fonction std::getline() pour lire le contenu.

std::string ligne;

while (std::getline(fichier, ligne)) 
{
    std::cout << ligne << std::endl;
}

Fermeture :
-----------

La méthode close() permet de fermer le fichier

3/ std::ofstream – Écriture dans un fichier :
---------------------------------------------

std::ofstream est utilisé pour ouvrir un fichier en mode écriture.
Points importants :

Ouverture du fichier :
Comme pour std::ifstream, on peut ouvrir le fichier lors de la construction ou avec open().

std::ofstream fichier("monFichier.txt");  // ouverture directe
// ou
std::ofstream fichier;
fichier.open("monFichier.txt", std::ios::out);

Modes d’ouverture :
-------------------

Par défaut, std::ofstream ouvre le fichier en mode écriture (std::ios::out), 
ce qui crée le fichier s’il n’existe pas et écrase son contenu s’il existe déjà.
Pour ajouter à la fin d’un fichier existant, utilisez le mode std::ios::app.

std::ofstream fichier("monFichier.txt", std::ios::app);

Écriture :
----------

Utilisez l’opérateur d’insertion << pour écrire dans le fichier.

fichier << "Bonjour, monde!" << std::endl;

Fermeture :
-----------

Comme précédemment, fermez le fichier une fois l’écriture terminée.

fichier.close();

4/std::fstream – Lecture et écriture dans un fichier :
-----------------------------------------------------

std::fstream est une classe polyvalente qui permet à la fois la lecture et l’écriture dans un fichier.

Ouverture du fichier :
----------------------

Pour utiliser std::fstream, vous devez préciser les modes désirés 
(par exemple, std::ios::in pour la lecture, std::ios::out pour l’écriture).

std::fstream fichier("monFichier.txt", std::ios::in | std::ios::out);

Modes complémentaires :
-----------------------

std::ios::trunc : vide le fichier lors de l’ouverture.
std::ios::binary : ouvre le fichier en mode binaire.

Exemple avec plusieurs modes :
-------------------------------

std::fstream fichier("monFichier.txt", std::ios::in | std::ios::out | std::ios::trunc);

Utilisation :
-------------

On peux lire et écrire avec les mêmes opérateurs utilisés pour std::ifstream et std::ofstream.
Parfois, il est nécessaire de repositionner le curseur avec seekg() (pour la lecture) ou seekp() (pour l’écriture).

// Écriture dans le fichier
fichier << "Première ligne" << std::endl;

// Repositionner le curseur pour lire depuis le début
fichier.seekg(0);

std::string ligne;
std::getline(fichier, ligne);
std::cout << "Lecture : " << ligne << std::endl;

Fermeture :
-----------

Comme toujours, fermez le flux à la fin.

fichier.close();

*****************************************************************************************
