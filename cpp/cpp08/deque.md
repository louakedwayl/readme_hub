					std::deque en C++
************************************************************************************************************************************

1/ Qu'est-ce que std::deque ? :
-------------------------------

std::deque (Double-Ended QUEue) est un conteneur de la STL qui permet l'insertion et la suppression d’éléments aussi bien en 
début qu’en fin du conteneur, en temps constant.

Caractéristiques principales :
------------------------------

Caractéristique	Présence
Accès direct (operator[], at)		✅
Insertion/suppression à l'avant		✅
Insertion/suppression à l’arrière	✅
Itérable (begin, end, etc.)		✅
Mémoire contiguë comme vector		❌ (pas garanti)

Syntaxe de base :
-----------------

#include <deque>

std::deque<int> d;                  // Déclaration
d.push_back(10);                    // Ajoute à la fin
d.push_front(5);                    // Ajoute au début
int val = d.front();               // Accès au 1er élément
int last = d.back();               // Accès au dernier
d.pop_back();                      // Retire le dernier
d.pop_front();                     // Retire le premier

Exemple complet :
-----------------

#include <iostream>
#include <deque>

int main() 
{
    std::deque<int> d;

    d.push_back(3);   // [3]
    d.push_front(1);  // [1, 3]
    d.push_back(4);   // [1, 3, 4]

    for (int x : d)
        std::cout << x << " ";  // Affiche : 1 3 4

    d.pop_front();  // [3, 4]
    d.pop_back();   // [3]

    std::cout << "\nFront: " << d.front() << "\n";  // 3
    return 0;
}

Méthodes utiles :
-----------------

Méthode		Description
push_back(x)	Ajoute x à la fin
push_front(x)	Ajoute x au début
pop_back()	Supprime l'élément en fin
pop_front()	Supprime l'élément en début
front()		Renvoie le 1er élément
back()		Renvoie le dernier élément
at(i)		Accès sécurisé à l’élément i
operator[i]	Accès direct (non sécurisé)
clear()		Vide le conteneur
size()		Nombre d’éléments
empty()		Renvoie true si vide
insert(it, x)	Insère x à la position it
erase(it)	Supprime l’élément à la position it

Quand utiliser std::deque ? :
-----------------------------

Utilise deque quand :

    Tu veux ajouter/supprimer rapidement au début et à la fin.

    Tu veux une alternative plus flexible que std::vector.

    Tu n’as pas besoin d’un accès rapide à la mémoire contiguë (ce que vector offre).

Attention :
-----------

    L'accès au milieu est moins rapide qu’avec vector.

    Il n’est pas garanti que les données soient en mémoire contiguë (contrairement à vector),
donc pas utilisable avec certaines fonctions bas-niveau (comme des appels C).

*************************************************************************************************************************************
