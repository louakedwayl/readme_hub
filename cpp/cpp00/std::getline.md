                                                std::getline
******************************************************************************************************************

1/ Introduction :
-----------------

    En C++, la fonction std::getline est une fonction de la bibliothèque standard (définie dans <iostream> ou <string>)
qui permet de lire une ligne complète depuis un flux d'entrée (comme std::cin ou un flux de fichier) et de la stocker 
dans une variable de type std::string. Cette fonction est particulièrement utile pour lire des chaînes de caractères 
qui contiennent des espaces, contrairement à l'opérateur d’extraction (>>) qui s’arrête au premier espace.

2/ Syntaxe de base :
--------------------

La forme la plus courante de std::getline est la suivante :

#include <iostream>
#include <string>

int main() {
    std::string ligne;
    std::getline(std::cin, ligne);
    std::cout << "Vous avez saisi : " << ligne << std::endl;
    return 0;
}

Explications :
--------------

std::getline(std::cin, ligne);
Cette ligne lit une ligne complète depuis l’entrée standard (std::cin) et stocke le contenu dans la variable ligne.
La lecture se fait jusqu’à la rencontre d’un caractère de fin de ligne (le caractère '\n').

3/ Utilisation avec un délimiteur personnalisé :
------------------------------------------------

    Par défaut, std::getline lit jusqu’au caractère de saut de ligne ('\n'). Cependant, il est possible de spécifier 
un autre délimiteur en ajoutant un troisième argument :

#include <iostream>
#include <string>

int main() {
    std::string donnees;
    // On lit jusqu'au caractère ';'
    std::getline(std::cin, donnees, ';');
    std::cout << "Données lues : " << donnees << std::endl;
    return 0;
}

Explications :
--------------

Le troisième argument ';' indique que la lecture s'arrêtera dès que ce caractère sera rencontré.

4/ Gestion des erreurs et du flux :
-----------------------------------

std::getline renvoie une référence au flux d’entrée. Cela permet de vérifier si la lecture a réussi :

#include <iostream>
#include <string>

int main() {
    std::string ligne;
    std::cout << "Entrez une ligne : ";
    if (std::getline(std::cin, ligne)) {
        std::cout << "Lecture réussie : " << ligne << std::endl;
    } else {
        std::cerr << "Erreur lors de la lecture." << std::endl;
    }
    return 0;
}

Points clés :
-------------

    En cas d'erreur (fin de fichier ou problème de flux), le flux se met dans un état d’erreur, 
et la condition du if renverra false.
Il est possible d’utiliser des boucles pour lire plusieurs lignes tant que la lecture est valide.

***********************************************************************************************************************
