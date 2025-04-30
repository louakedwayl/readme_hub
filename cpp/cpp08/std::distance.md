					std::distance
************************************************************************************************

std::distance est un algorithme de la bibliothèque standard C++ défini dans l'en-tête <iterator>.
Il permet de calculer la distance (ou le nombre d'éléments) entre deux itérateurs d’un conteneur.
Cet algorithme est très utilisé pour obtenir le nombre d'éléments entre deux positions dans une collection,
que ce soit dans un tableau, un vecteur, une liste, etc.

1/ Prototype de la fonction :
-----------------------------

template <typename InputIterator>
typename std::iterator_traits<InputIterator>::difference_type
distance(InputIterator first, InputIterator last);

3/ Paramètres :
----------------

    first : l'itérateur de départ (inclus dans le calcul).

    last : l'itérateur de fin (exclu du calcul).

4/ Retour :
------------

La fonction retourne un entier signé de type difference_type, qui représente le nombre d'éléments entre les itérateurs.
Ce type est défini par le conteneur et peut être un ptrdiff_t ou tout autre type compatible avec le calcul de la différence 
entre deux itérateurs.

5/ Comportement :
-----------------

    std::distance calcule la distance entre les deux itérateurs, c'est-à-dire le nombre d'éléments que l'on traverse 
pour aller de first à last.

    Cette fonction peut être utilisée avec tous les types d'itérateurs : InputIterator, BidirectionalIterator, RandomAccessIterator, etc.

        Pour des itérateurs à accès aléatoire (comme ceux de std::vector), la distance est calculée en temps constant O(1).

        Pour des itérateurs bidirectionnels (comme ceux de std::list), la distance est calculée en temps linéaire O(n).

6/ Exemples d’utilisation :
---------------------------

Exemple 1 : Calcul de la distance entre deux itérateurs d’un std::vector

#include <iostream>
#include <vector>
#include <iterator> // pour std::distance

int main() 
{
    std::vector<int> v = {10, 20, 30, 40, 50};
    
    auto begin = v.begin();  // itérateur sur le premier élément
    auto end = v.end();      // itérateur sur la position après le dernier élément

    // Calculer la distance entre les itérateurs
    std::cout << "La distance entre begin et end est : "
              << std::distance(begin, end) << std::endl;  // Affiche 5
    return 0;
}

*************************************************************************************************************
