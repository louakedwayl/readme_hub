						std::list
************************************************************************************************************************************

std::list fait partie de la bibliothèque standard C++ et est une implémentation de la liste doublement chaînée.
Contrairement à std::vector, qui est basé sur un tableau dynamique, std::list permet une insertion et une suppression rapides 
d'éléments à n'importe quel endroit de la liste, mais la recherche d'éléments est plus lente car elle nécessite un parcours séquentiel.

Déclaration et initialisation :
-------------------------------

Pour utiliser std::list, vous devez inclure l'en-tête <list> et l'utiliser dans l'espace de noms std.

#include <list>

Vous pouvez déclarer une std::list de la manière suivante :

std::list<int> maListe;  // Liste vide de entiers
std::list<int> maListe2 = {1, 2, 3, 4};  // Liste initialisée avec des éléments

Opérations de base sur std::list

1/ Insertion d'éléments :
-------------------------

   Insertion à la fin :

	Utilisez push_back() pour insérer un élément à la fin de la liste.

	maListe.push_back(5);  // Ajoute 5 à la fin de la liste

    Insertion au début :

	Utilisez push_front() pour insérer un élément au début de la liste.

    maListe.push_front(0);  // Ajoute 0 au début de la liste

2/ Suppression d'éléments :
---------------------------

    Suppression à la fin :
    Utilisez pop_back() pour supprimer l'élément à la fin de la liste.

	maListe.pop_back();  // Supprime le dernier élément de la liste

    Suppression au début :
    Utilisez pop_front() pour supprimer l'élément au début de la liste.

    maListe.pop_front();  // Supprime le premier élément de la liste

	Suppression d'un élément spécifique :
	Vous pouvez supprimer un élément spécifique avec remove().

    maListe.remove(3);  // Supprime toutes les occurrences de 3 dans la liste

3/ Accès aux éléments :
-----------------------

Contrairement aux conteneurs comme std::vector ou std::array, std::list n'a pas d'opérateur de sous-script ([]) 
pour accéder aux éléments par index. Vous devez parcourir la liste avec un itérateur.

std::list<int>::iterator it = maListe.begin();
std::cout << *it << std::endl;  // Affiche le premier élément

4/ Itérateurs :
---------------

    Itérateurs de début et de fin :
    Vous pouvez obtenir un itérateur vers le début et la fin de la liste avec begin() et end().

    for (std::list<int>::iterator it = maListe.begin(); it != maListe.end(); ++it) {
        std::cout << *it << " ";  // Affiche les éléments de la liste
    }

    Accès aux éléments via at() :
    std::list ne dispose pas de la fonction at() car les éléments ne sont pas indexés de manière contiguë.

5/ Vider la liste :
-------------------

    Effacer tous les éléments :
    Utilisez clear() pour supprimer tous les éléments de la liste.

    maListe.clear();  // Vide la liste

Performances et caractéristiques de std::list

    Insertion et suppression :
    L'insertion et la suppression d'éléments à n'importe quel endroit de la liste sont très rapides (complexité O(1)), car il suffit de modifier les pointeurs des éléments voisins.

    Accès direct :
    std::list ne permet pas un accès rapide aux éléments par indice (complexité O(n) pour accéder à un élément). Si un accès rapide par indice est essentiel, std::vector ou std::deque pourraient être plus appropriés.

    Mémoire :
    Chaque élément d'une std::list nécessite un peu plus de mémoire que dans un tableau dynamique (std::vector), car chaque élément doit contenir des pointeurs vers l'élément précédent et suivant.

Exemple complet :
-----------------

Voici un exemple complet d'utilisation de std::list :

#include <iostream>
#include <list>

int main() {
    std::list<int> maListe = {1, 2, 3, 4};

    // Affichage des éléments de la liste
    std::cout << "Liste avant modification: ";
    for (int elem : maListe) {
        std::cout << elem << " ";
    }
    std::cout << std::endl;

    // Insertion au début et à la fin
    maListe.push_front(0);  // Ajoute 0 au début
    maListe.push_back(5);   // Ajoute 5 à la fin

    // Suppression d'un élément
    maListe.remove(3);  // Supprime toutes les occurrences de 3

    // Affichage après modification
    std::cout << "Liste après modification: ";
    for (int elem : maListe) {
        std::cout << elem << " ";
    }
    std::cout << std::endl;

    return 0;
}

Résumé :
--------

    std::list est une liste doublement chaînée.

    Elle permet des insertions et des suppressions rapides, mais un accès séquentiel plus lent.

    Elle est idéale lorsque vous devez insérer ou supprimer des éléments fréquemment sans avoir besoin d'un accès rapide par index.

    L'accès direct aux éléments se fait avec des itérateurs, et non par index.

************************************************************************************************************************************
