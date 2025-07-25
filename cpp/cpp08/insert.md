# `insert` en C++

## La méthode `insert` :

La méthode `insert` permet d’**ajouter des éléments à une position donnée** dans un conteneur (vector, deque, list, etc.), sans écraser les éléments existants.  
Elle est **très flexible** et prend plusieurs formes.

---

## 1/ Insérer un seul élément à une position donnée :
```cpp
container.insert(position, value);

    position : un itérateur indiquant où l'élément doit être inséré.

    value : l'élément à insérer.
```

### Exemple :

```cpp
#include <vector>
#include <iostream>

int main() 
{
    std::vector<int> v = {1, 2, 3};

    // Insérer '0' au début
    v.insert(v.begin(), 0);

    for (auto it = v.begin(); it != v.end(); ++it)
        std::cout << *it << " ";  // Résultat : 0 1 2 3
}
```

### 2/ Insérer plusieurs éléments à une position donnée :

container.insert(position, n, value);

n : le nombre d'éléments à insérer.

value : la valeur de chaque élément inséré.

### Exemple :

```cpp
#include <vector>
#include <iostream>

int main() 
{
    std::vector<int> v = {1, 2, 3};

    // Insérer deux éléments '5' à la fin du vecteur
    v.insert(v.end(), 2, 5);

    for (auto it = v.begin(); it != v.end(); ++it)
        std::cout << *it << " ";  // Résultat : 1 2 3 5 5
}
```

### 3/ Insérer une plage d'éléments (range d'itérateurs) :

container.insert(position, begin, end);

begin, end : itérateurs représentant la plage d’éléments à insérer.

### Exemple :

```cpp
#include <vector>
#include <iostream>

int main() {
    std::vector<int> v1 = {1, 2, 3};
    std::vector<int> v2 = {4, 5, 6};

    // Insérer les éléments de v2 à la fin de v1
    v1.insert(v1.end(), v2.begin(), v2.end());

    for (auto it = v1.begin(); it != v1.end(); ++it)
        std::cout << *it << " ";  // Résultat : 1 2 3 4 5 6
}
```

### Explication :

Insérer un seul élément : Ajoute un élément sans écraser les autres, en décalant les éléments après la position d’insertion.

Insérer plusieurs éléments : Ajoute plusieurs copies du même élément.

Insérer une plage d’éléments : Ajoute tous les éléments d’une autre collection (via ses itérateurs).

### Notes importantes :

#### Sur std::vector :

L’insertion peut entraîner un réallouement si la capacité doit être augmentée → coût en performance (copie/déplacement des éléments).

#### Sur std::list :

L’insertion est généralement rapide (O(1)) car elle ne déplace pas les éléments (les éléments sont reliés par des pointeurs).

### En résumé :

insert est une méthode puissante et flexible :

Ajout d’un seul élément.

Ajout de plusieurs copies du même élément.

Ajout d’une plage d’éléments d’un autre conteneur.

Elle fonctionne sur vector, deque et list, mais son coût dépend du type de conteneur utilisé.
