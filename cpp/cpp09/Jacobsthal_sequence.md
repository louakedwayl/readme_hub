                    La suite de Jacobsthal
*******************************************************************************************

C'est quoi la suite de Jacobsthal ?
-----------------------------------

La suite de Jacobsthal est une série de nombres qui suivent une règle simple pour se créer.
Chaque nombre dans la suite est basé sur les deux précédents.

Jn = J(n-1) + 2 x J(n-2)


La règle pour créer la suite :
------------------------------

    Premier nombre (le départ) : J0 = 0
    Le premier nombre est 0.

    Deuxième nombre : J1 = 1
    Le deuxième nombre est 1.

    Ensuite : 

Chaque nombre suivant se fait en additionnant le nombre juste avant et en doublant le nombre encore avant.

    Par exemple :

        Le troisième nombre : on fait 1 (le nombre précédent) + 2 fois 0 (l’avant-dernier nombre) 
        
        →   1 + 2 × 0 = 1

        Le quatrième nombre : on fait 1 (le précédent) + 2 fois 1 (l’avant-dernier) 
        
        →   1 + 2 × 1 = 3

    Et ainsi de suite…


Voici les premiers nombres de la suite :
----------------------------------------

            J0=0
            J1=1
            J2=1
            J3=3
            J4=5
            J5=11
            J6=21
            J7=43

Chaque nombre est créé à partir des deux nombres précédents !

Une autre façon de calculer ? :
-------------------------------

Il existe une formule mathématique plus rapide pour trouver le nombre sans avoir besoin de tout calculer un par un.
Mais pour simplifier, on va s’en tenir à la règle de l'addition et du double.
Exemple simple avec une règle en C++

Voici un exemple de programme simple qui calcule les nombres de cette suite:
----------------------------------------------------------------------------

#include <iostream>

int jacobsthal(int n) 
{
    if (n == 0) return 0;   // Si c'est le premier nombre, c'est 0
    if (n == 1) return 1;   // Si c'est le deuxième nombre, c'est 1
    return jacobsthal(n - 1) + 2 * jacobsthal(n - 2);   // Sinon, on fait la règle !
}

int main() 
{
    for (int i = 0; i <= 10; ++i)   // On affiche les 10 premiers nombres
        std::cout << "J_" << i << " = " << jacobsthal(i) << std::endl;
    return 0;
}

Le programme fait simplement ce qu’on vient de voir avec la règle : 
additionner et doubler les nombres pour chaque nouveau nombre de la suite.

À quoi ça sert ? :
------------------

La suite de Jacobsthal sert dans des domaines comme les algorithmes informatiques,
les théories de graphes et même pour des calculs de sécurité informatique.

Résumé simple :
---------------

    On commence par 0 et 1.

    Chaque nombre suivant se fait en ajoutant le nombre précédent et en doublant l’avant-dernier nombre.

    Cela donne une suite de nombres comme 0, 1, 1, 3, 5, 11, 21, 43…

********************************************************************************************************************

