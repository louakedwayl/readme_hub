                                        Ostream
************************************************************************************************

1/ Introduction à ostream :
--------------------------

En C++, ostream (output stream) est une classe de la bibliothèque standard qui permet d'écrire 
des données vers une sortie, généralement la console (via std::cout) ou un fichier. Elle fait partie 
du module <ostream> et est définie dans le namespace std.
<iostream> inclut <ostream>.

Définition de ostream :
-----------------------

La classe ostream est dérivée de basic_ostream<char> et permet la gestion de flux de sortie de données.

2/ Utilisation de ostream :
---------------------------

2/1 Affichage à l'écran avec std::cout :
----------------------------------------

L'un des usages les plus courants de ostream est l'affichage à l'écran via std::cout.

#include <iostream>

int main() {
    std::cout << "Hello, World!" << std::endl;
    return 0;
}

std::cout est une instance de std::ostream utilisée pour afficher des données sur la console.

std::cout est un objet global pré-défini dans la bibliothèque standard de C++ (déclaré dans <iostream>). 
Cela signifie qu'il est déjà instancié et prêt à être utilisé dès que l'on inclut ce header, 
ce qui évite de devoir créer manuellement un objet de type ostream.

En résumé :
-----------

Objet global : std::cout est déclaré et défini par la bibliothèque standard, 
et il est initialisé automatiquement.

Prêt à l'emploi : Grâce à son existence globale, tu peux l'utiliser directement dans ton code 
pour afficher des messages à l'écran sans devoir le créer toi-même.

Ainsi, l'usage de std::cout simplifie l'affichage et permet de se concentrer sur la logique 
de l'application plutôt que sur la gestion de la création d'objets de sortie.

3/ La classe std::ostringstream :
---------------------------------

std::ostringstream est une classe issue de <sstream> qui dérive de std::ostream. 
Elle est conçue pour écrire des données dans un tampon mémoire, qui sera ensuite converti 
en une chaîne de caractères (std::string). Elle se révèle particulièrement utile pour :

Formater des données avant de les utiliser.
Construire des messages dynamiques.
Convertir des types numériques en leur représentation textuelle.

4/ Le mécanisme de conversion avec l'opérateur << :
---------------------------------------------------

Lorsque l'on utilise l'opérateur << avec un objet std::ostringstream, plusieurs opérations se déroulent :

L'opérateur << convertit la valeur passée (ici un entier) en sa représentation textuelle.
Cette représentation est ensuite stockée dans le tampon interne de l'objet std::ostringstream.

Par exemple :
-------------

#include <sstream>
#include <string>
#include <iostream>

int main() 
{
    int i = 0;                     // Déclaration et initialisation d'un entier
    std::ostringstream stream;     // Création d'un flux de sortie vers une chaîne
    stream << i;                   // Conversion de l'entier en texte et écriture dans le flux

    // Récupération de la chaîne formée
    std::string chaine = stream.str();
    std::cout << "La chaîne obtenue est : " << chaine << std::endl;
    std::cout << "La chaîne obtenue est : " << stream.str() << std::endl;
    return 0;
}

Explications :
--------------

1/ int i = 0; : On initialise l'entier i à zéro.

2/ std::ostringstream stream; : On crée un objet flux destiné à écrire dans une chaîne.

3/ stream << i; : L'opérateur << formate l'entier 0 en chaîne "0" et l'insère dans le flux.

4/ stream.str() : La méthode str() permet d'extraire le contenu du tampon du flux sous forme d'une std::string.

*******************************************************************************************************
