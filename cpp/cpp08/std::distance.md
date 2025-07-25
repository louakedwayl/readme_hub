# `std::distance`

`std::distance` est un **algorithme de la bibliothèque standard C++** défini dans l'en-tête `<iterator>`.  
Il permet de **calculer la distance (nombre d'éléments)** entre deux itérateurs d’un conteneur.  

Cet algorithme est très utilisé pour **obtenir le nombre d'éléments** entre deux positions dans une collection  
(`vector`, `list`, `array`, etc.).

---

## 1/ Prototype de la fonction :
```cpp
template <typename InputIterator>
typename std::iterator_traits<InputIterator>::difference_type
distance(InputIterator first, InputIterator last);
```

## 2/ Paramètres :

first : itérateur de départ (inclus dans le calcul).

last : itérateur de fin (exclu du calcul).

## 3/ Retour :

Retourne un entier signé de type difference_type, représentant le nombre d'éléments entre les deux itérateurs.

Ce type est défini par le conteneur (souvent ptrdiff_t).

## 4/ Comportement :

std::distance compte le nombre d'éléments parcourus de first à last.

Compatible avec tous les types d'itérateurs :

RandomAccessIterator (ex: std::vector) → O(1) (calcul direct).

BidirectionalIterator (ex: std::list) ou InputIterator → O(n) (parcours complet).

## 5/ Exemple d’utilisation :

### Exemple 1 : Calcul de la distance entre deux itérateurs d’un std::vector

```cpp
#include <iostream>
#include <vector>
#include <iterator> // pour std::distance

int main() 
{
    std::vector<int> v = {10, 20, 30, 40, 50};
    
    auto begin = v.begin();  // itérateur sur le premier élément
    auto end = v.end();      // itérateur sur la position après le dernier élément

    std::cout << "La distance entre begin et end est : "
              << std::distance(begin, end) << std::endl;  // Affiche 5
    return 0;
}
```

## 6/ Points clés :

Temps constant avec les itérateurs à accès aléatoire (vector, deque).

Temps linéaire avec les listes ou conteneurs chaînés (list).

Indispensable pour calculer le nombre d'éléments entre deux positions sans écrire de boucle.

