					static attributes
*************************************************************************************************

1/ Définition des attributs statiques :
---------------------------------------

	Les attributs statiques sont des membres de classe qui appartiennent à la classe 
elle-même et non à une instance particulière. Cela signifie que :

    Ils sont partagés par toutes les instances de la classe.
    Ils existent indépendamment de la création d’objets.
    Leur durée de vie est celle du programme.

En d’autres termes, une variable statique dans une classe est unique pour la classe, 
même si plusieurs objets de cette classe sont créés.

2/ Accès sans instanciation :
-----------------------------

	Il est possible d’accéder à un attribut statique sans créer d’instance de la classe 
en utilisant l’opérateur de résolution de portée ::.

3/ Durée de vie :
-----------------

	Les attributs statiques sont initialisés avant l’exécution du programme 
(pour les variables globales ou statiques de classe) et détruits à la fin de l’exécution. 
Cela permet d’assurer leur disponibilité pendant toute la durée du programme.

4/ Syntaxe et exemples :
------------------------

4.1 Déclaration dans la classe :
--------------------------------

	On déclare un attribut statique à l’intérieur de la classe à l’aide du mot-clé static :

Exemple :
---------

class Compteur 
{
public:
    static int count; // Déclaration d'un attribut statique

    Compteur() {
        count++; // Incrémente le compteur à chaque création d'objet
    }
};


4.2 Définition en dehors de la classe :
---------------------------------------

	La déclaration dans la classe ne réserve pas l’espace mémoire pour l’attribut statique.
Il faut le définir en dehors de la classe (dans un fichier source, généralement un .cpp) :

Exemple :
---------

// Définition de l'attribut statique
int Compteur::count = 0;

5/ Utilisation dans le programme :
----------------------------------

	On peut ensuite utiliser l’attribut statique directement via la classe :

#include <iostream>

int main() 
{
    std::cout << "Nombre d'objets créés : " << Compteur::count << std::endl; // Affiche 0

    Compteur obj1;
    Compteur obj2;

    std::cout << "Nombre d'objets créés : " << Compteur::count << std::endl; // Affiche 2

    return 0;
}

	Dans cet exemple, la variable count est commune à tous les objets de la classe Compteur. 
Chaque fois qu’un nouvel objet est créé, le constructeur incrémente count.


6/ Accès aux attributs statiques :
----------------------------------

6.1. Accès via le nom de la classe :
------------------------------------

	La manière recommandée d’accéder à un attribut statique est d’utiliser le nom de 
la classe suivi de l’opérateur de résolution de portée :: :

Exemple :
---------

std::cout << Compteur::count << std::endl;

6.2 Accès via un objet :
------------------------

	Même s’il est possible d’accéder à un attribut statique via un objet (exemple : obj1.count), 
cette pratique n’est pas recommandée car elle peut prêter à confusion en laissant penser 
que l’attribut appartient à l’instance.

*************************************************************************************************
