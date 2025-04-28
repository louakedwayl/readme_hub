					std::vector
************************************************************************************************

1/ Qu'est-ce qu'un std::vector ?
--------------------------------

Un vector en C++ est un tableau dynamique :

    Sa taille peut changer automatiquement (agrandir ou réduire).

    Il est stocké en mémoire contiguë (comme un tableau classique).

    Il appartient à la STL (#include <vector>).

✅ Il combine la simplicité d'un tableau avec la flexibilité d'une liste.

2/ Syntaxe de base :
--------------------

#include <vector>
#include <iostream>

int main() 
{
    std::vector<int> numbers; // Déclaration d'un vector vide

    numbers.push_back(5); // Ajouter un élément à la fin
    numbers.push_back(10);
    numbers.push_back(15);

    for (size_t i = 0; i < numbers.size(); ++i)
        std::cout << numbers[i] << " ";
}

Sortie :

5 10 15

3/ Principales méthodes de std::vector :
----------------------------------------

Méthode				Description
------------------------------------------------------------------------------------------------------
push_back(x)			Ajoute x à la fin.
pop_back()			Supprime le dernier élément.
size()				Retourne le nombre d'éléments.
empty()				Vérifie si le vector est vide (true ou false).
clear()				Supprime tous les éléments.
at(index)			Accès sécurisé avec vérification des bornes.
front()				Retourne la première valeur.
back()				Retourne la dernière valeur.
insert(position, value)		Insère un élément à une position donnée.
erase(position)			Supprime un élément à une position donnée.
resize(n)			Change la taille du vector à n.
reserve(n)			Réserve au moins n éléments pour éviter plusieurs reallocations.

4/ Accès aux éléments :
-----------------------

Deux façons :

Type d'accès		Exemple		Remarque
Indice direct		vec[i]		Pas de vérification de dépassement de borne.
Accès sécurisé		vec.at(i)	Lève une exception std::out_of_range si mauvais indice.

5/ Parcourir un vector :
------------------------

Avec une boucle classique :

for (size_t i = 0; i < vec.size(); ++i)
    std::cout << vec[i];

Avec un itérateur :

for (std::vector<int>::iterator it = vec.begin(); it != vec.end(); ++it)
    std::cout << *it;

6/ Fonctionnement interne :
---------------------------

    Un vector utilise un tableau alloué dynamiquement.

    Lorsqu'il dépasse sa capacité (capacity), il double (généralement) sa taille automatiquement.

    Cela implique des reallocations (copier tout vers un nouvel espace mémoire).

    Réserver de l’espace avec reserve() peut optimiser si tu sais combien d'éléments tu auras !

7/ Exemples pratiques :
-----------------------

Ajouter et trier

#include <vector>
#include <algorithm>

std::vector<int> v = {4, 1, 8, 3};
std::sort(v.begin(), v.end()); // Trie croissant : 1 3 4 8

Fusionner deux vectors

std::vector<int> a = {1, 2, 3};
std::vector<int> b = {4, 5};

a.insert(a.end(), b.begin(), b.end()); // a = {1, 2, 3, 4, 5}

Retirer tous les éléments pairs

std::vector<int> v = {1, 2, 3, 4, 5};
v.erase(std::remove_if(v.begin(), v.end(), [](int x){ return x % 2 == 0; }), v.end());
// v = {1, 3, 5}

8/ Avantages et inconvénients :
-------------------------------

Avantages			Inconvénients
-----------------------------------------------------------------------------------
Accès rapide (O(1))		Insertion/suppression lente au milieu (O(n))
Redimensionnement automatique	Reallocation coûteuse quand capacity est dépassée
Facile à utiliser		Peut gaspiller un peu de mémoire (capacity > size)


9/ Résumé :
-----------

    vector = tableau dynamique flexible et rapide pour les accès.

    Utilisé quand on a besoin de croissance dynamique et accès rapide.

    Attention à ne pas abuser des insertions/suppressions au milieu.

****************************************************************************************************
