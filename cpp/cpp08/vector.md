# `std::vector`

## 1/ Qu'est-ce qu'un `std::vector` ?

Un **`std::vector`** est un **tableau dynamique** de la **STL** :  
- Sa taille **peut changer automatiquement** (agrandir ou réduire).  
- Les données sont **stockées en mémoire contiguë** (comme un tableau classique).  
- Il combine la **simplicité** d'un tableau et la **flexibilité** d'une liste.  

> **En-tête nécessaire :** `#include <vector>`

---

## 2/ Syntaxe de base :
```cpp
#include <vector>
#include <iostream>

int main() {
    std::vector<int> numbers; // Vector vide

    numbers.push_back(5);
    numbers.push_back(10);
    numbers.push_back(15);

    for (size_t i = 0; i < numbers.size(); ++i)
        std::cout << numbers[i] << " ";
}
```

### Sortie :

```bash
5 10 15
```

## 3/ Principales méthodes de std::vector :

| Méthode                  | Description                                  |
|--------------------------|----------------------------------------------|
| `push_back(x)`           | Ajoute `x` à la fin                          |
| `pop_back()`             | Supprime le dernier élément                  |
| `size()`                 | Retourne le nombre d'éléments                |
| `empty()`                | Vérifie si le vector est vide                |
| `clear()`                | Supprime tous les éléments                   |
| `at(index)`              | Accès sécurisé avec vérification des bornes  |
| `front()`                | Retourne le premier élément                  |
| `back()`                 | Retourne le dernier élément                  |
| `insert(position, value)`| Insère un élément à une position donnée      |
| `erase(position)`        | Supprime un élément à une position donnée    |
| `resize(n)`              | Change la taille du vector                   |
| `reserve(n)`             | Réserve un espace mémoire (optimisation)     |


## 4/ Accès aux éléments :

| Type d'accès      | Exemple      | Remarque                                     |
|-------------------|-------------|---------------------------------------------|
| **Indice direct** | `vec[i]`    | Pas de vérification de dépassement          |
| **Accès sécurisé**| `vec.at(i)` | Lève `std::out_of_range` si l’indice invalide |

## 5/ Parcourir un vector :

### Boucle classique :

```cpp
for (size_t i = 0; i < vec.size(); ++i)
    std::cout << vec[i];
```

### Avec itérateur :

```cpp
for (std::vector<int>::iterator it = vec.begin(); it != vec.end(); ++it)
    std::cout << *it;

// Boucle range-based (C++11+) :

for (int n : vec)
    std::cout << n;
```

## 6/ Fonctionnement interne :

std::vector utilise un tableau dynamique.

Lorsque sa capacité (capacity) est dépassée, il réalloue (généralement en doublant la taille).

Cela implique de copier les anciens éléments → coût en performance.

Astuce : utiliser reserve() si on connaît à l’avance le nombre d’éléments.

## 7/ Exemples pratiques :

### Trier un vector :

```cpp
#include <vector>
#include <algorithm>
std::vector<int> v = {4, 1, 8, 3};
std::sort(v.begin(), v.end()); // 1 3 4 8
```

### Fusionner deux vectors :

```cpp

std::vector<int> a = {1, 2, 3};
std::vector<int> b = {4, 5};
a.insert(a.end(), b.begin(), b.end()); // {1, 2, 3, 4, 5}
```

### Retirer les éléments pairs :

```cpp
std::vector<int> v = {1, 2, 3, 4, 5};
v.erase(std::remove_if(v.begin(), v.end(), [](int x){ return x % 2 == 0; }), v.end());
// v = {1, 3, 5}
```

## 8/ Avantages et inconvénients :

| Avantages                    | Inconvénients                                  |
|-----------------------------|-----------------------------------------------|
| Accès rapide **O(1)**       | Insertion/suppression au milieu **O(n)**      |
| Redimensionnement automatique | Réallocations coûteuses si `capacity` dépasse |
| Facile à utiliser           | Peut réserver plus de mémoire que nécessaire  |

## 9/ Résumé :

std::vector = tableau dynamique flexible et performant pour les accès aléatoires.

Idéal quand on a besoin de croissance dynamique et d’un accès rapide.

⚠️ Éviter les insertions/suppressions au milieu (coûteuses).