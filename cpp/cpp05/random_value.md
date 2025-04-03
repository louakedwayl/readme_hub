Generation de nombres aleatoires en C++ (C++98)
-----------------------------------------------------------------------------------------------------------------

 1/ A quoi servent rand() et srand() ? :
----------------------------------------

- rand() : genere un nombre pseudo-aleatoire.

- srand(unsigned int seed) : initialise le generateur aleatoire avec une "graine".
 Sans srand(), rand() produit toujours la meme sequence a chaque execution.

 2/ Initialisation correcte :
-----------------------------

Utiliser lheure du systeme pour rendre les resultats imprevisibles :

#include <cstdlib> // rand(), srand()
#include <ctime> // time()
srand(time(NULL)); // a placer UNE FOIS, dans le main()

 3/ Exemples d'utilisation :
----------------------------

#include <iostream>
#include <cstdlib>
#include <ctime>
int main() 
{
 srand(time(NULL)); // initialisation
 int nombre = rand(); // valeur pseudo-aleatoire
 std::cout << "Nombre aleatoire : " << nombre << std::endl;
 return 0;
}

4/ Generer des valeurs specifiques :
-----------------------------------


Objectif                        |      Code
--------------------------------|-------------------------------
0 ou 1 (pile ou face)           |      rand() % 2
1 a 6 (de a 6 faces)            |      rand() % 6 + 1
0 a 99                          |      rand() % 100
min a max (ex : 5 a 15)         | rand() % (max - min + 1) + min
-----------------------------------------------------------------

*******************************************************************************************
