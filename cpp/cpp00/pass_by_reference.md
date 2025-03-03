					passage par reference
******************************************************************************************

1/ Introduction :
-----------------

En C++, pour transmettre des données à une fonction sans en faire une copie complète, 
on utilise principalement deux techniques :

    1/ Le passage par référence
    2/ Le passage par adresse

Ces deux méthodes permettent de manipuler directement la variable originale, 
mais elles présentent des différences en termes de syntaxe, de sécurité et de flexibilité.

2 Passage par référence :
-------------------------

Syntaxe et fonctionnement :
---------------------------

    Déclaration : On utilise le symbole & dans la déclaration du paramètre pour indiquer 
		  qu’il s’agit d’une référence.

    Accès direct : Une fois passée, la référence agit comme un alias de la variable originale.

    Garantie de validité : Une référence doit obligatoirement faire référence à une variable 
			   existante et ne peut pas être nulle.

Exemple :
---------

#include <iostream>

using namespace std;

void incrementer(int& valeur) 
{
    valeur++; // Modification directe de la variable originale
}

int main() 
{
    int nombre = 5;
    cout << "Avant (par référence) : " << nombre << endl;
    incrementer(nombre);
    cout << "Après (par référence) : " << nombre << endl;  // Affiche 6
    return 0;
}

Avantages :
-----------

    Simplicité syntaxique : Utilisation directe sans nécessité de déréférencement.
    Sécurité : On ne peut pas avoir de référence nulle.


3/ Passage par adresse :
------------------------

Syntaxe et fonctionnement :
---------------------------

    Déclaration : On passe l’adresse de la variable en utilisant un pointeur (type *).

    Accès via déréférencement : Il faut utiliser l’opérateur * pour accéder ou modifier 
				la valeur pointée.
    Gestion de la nullité : Un pointeur peut être nul, d’où l’importance de vérifier sa 
		            validité avant utilisation.

Exemple :
---------

#include <iostream>

using namespace std;

void incrementer(int *valeur) 
{
    if (valeur != nullptr) { // Vérification de la validité du pointeur
        (*valeur)++;       // Déréférencement pour modifier la valeur
    }
}

int main() 
{
    int nombre = 5;
    cout << "Avant (par adresse) : " << nombre << endl;
    incrementer(&nombre);   // Passage de l'adresse de la variable
    cout << "Après (par adresse) : " << nombre << endl;   // Affiche 6
    return 0;
}

Avantages :
-----------

    Flexibilité : Un pointeur peut être réassigné pour pointer vers une autre variable.
    Utilisation indispensable : Utile pour travailler avec des tableaux, la gestion dynamique 
				de la mémoire ou pour représenter l'absence de valeur (pointeur nul).

Pour bien clarifier :
---------------------

1/ Passage par adresse (int* ptr) :
------------------------------------

On passe une copie de l'adresse de la variable. La fonction peut modifier la valeur pointée mais 
ne peut pas modifier l'adresse contenue dans le pointeur puisque c'est une copie.

2/ Passage par référence (int& ref) :
-------------------------------------

On passe directement la variable elle-même. La fonction agit sur la variable 
d'origine sans passer par un pointeur.

3/Qu’est-ce qu’une référence ? :
--------------------------------

Une référence est un alias d’une variable existante. Elle permet d’accéder à la variable sans utiliser 
son adresse explicitement.

Différence entre Référence et Pointeur :
-----------------------------------------
Aspect	Référence (&)	Pointeur (*)

Syntaxe	int& ref = x;	int* ptr = &x;

Doit être initialisée ?	Oui, immédiatement	Non (peut être nullptr)

Peut changer de cible ?	Non, une fois assignée elle est fixe	Oui, un pointeur peut être réassigné à une autre adresse

Accès à la valeur	Directement (ref = 10;)	Indirection (*ptr = 10;)

Nullabilité	Impossible d’avoir une référence null	Possible (nullptr)

Allocation mémoire	Pas de mémoire supplémentaire	Occupe de la mémoire (stocke une adresse)

*******************************************************************************************************
