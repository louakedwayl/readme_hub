# Les Algorithmes de la Bibliothèque `<algorithm>` en C++

La bibliothèque **`<algorithm>`** en C++ fournit un ensemble d'**algorithmes génériques** qui peuvent être appliqués 
à une grande variété de structures de données (**vecteurs**, **listes**, **tableaux**, etc.).  

Ces algorithmes permettent d’écrire un **code concis, efficace et facilement maintenable**.

---

## 1/ Introduction à la Bibliothèque `<algorithm>` :

La bibliothèque `<algorithm>` fournit des fonctions de haut niveau pour effectuer des opérations comme :
- **Recherche**
- **Tri**
- **Modification**
- **Transformation**  

Les algorithmes fonctionnent principalement avec des **paires d'itérateurs** (begin, end) pour définir la plage d’action.

---

## 2/ Algorithmes de Recherche :

### `std::find` :
Recherche un élément dans une collection.  
Retourne un **itérateur** vers l’élément ou `container.end()` si non trouvé.

```cpp
#include <iostream>
#include <vector>
#include <algorithm>

int main() {
    std::vector<int> v = {1, 2, 3, 4, 5};
    auto it = std::find(v.begin(), v.end(), 3);
    if (it != v.end())
        std::cout << "Trouvé à l'indice : " << std::distance(v.begin(), it) << std::endl;
    else
        std::cout << "Non trouvé" << std::endl;
}

std::count :
```
Compte le nombre d’occurrences d’un élément dans une collection.

```cpp
#include <iostream>
#include <vector>
#include <algorithm>

int main() {
    std::vector<int> v = {1, 2, 3, 2, 4, 2, 5};
    int count = std::count(v.begin(), v.end(), 2);
    std::cout << "La valeur 2 apparaît " << count << " fois." << std::endl;
}
```
## 3/ Algorithmes de Tri :

```cpp
std::sort :
```

Trie les éléments d’un conteneur (QuickSort). Complexité : O(n log n).

```cpp
#include <iostream>
#include <vector>
#include <algorithm>

int main() {
    std::vector<int> v = {5, 2, 9, 1, 5, 6};
    std::sort(v.begin(), v.end());
    for (int num : v) std::cout << num << " ";
}

std::reverse :
```

Inverse l’ordre des éléments.

```cpp
#include <iostream>
#include <vector>
#include <algorithm>

int main() {
    std::vector<int> v = {1, 2, 3, 4, 5};
    std::reverse(v.begin(), v.end());
    for (int num : v) std::cout << num << " ";
}
```

## 4/ Algorithmes de Transformation :

```cpp
std::transform :
```

Applique une fonction à chaque élément d'une collection.

```cpp
#include <iostream>
#include <vector>
#include <algorithm>

int main() {
    std::vector<int> v = {1, 2, 3, 4, 5};
    std::transform(v.begin(), v.end(), v.begin(), [](int x) { return x * x; });
    for (int num : v) std::cout << num << " ";
}

std::accumulate (dans <numeric>) :
```

Calcule la somme (ou une autre opération binaire).

```cpp
#include <iostream>
#include <vector>
#include <numeric>

int main() {
    std::vector<int> v = {1, 2, 3, 4, 5};
    int sum = std::accumulate(v.begin(), v.end(), 0);
    std::cout << "Somme : " << sum << std::endl;
}
```
## 5/ Algorithmes sur les Collections :

```cpp
std::unique :
```
Supprime les éléments consécutifs égaux (ne réduit pas la taille du conteneur, il faut utiliser erase ensuite).

```cpp
#include <iostream>
#include <vector>
#include <algorithm>

int main() {
    std::vector<int> v = {1, 2, 2, 3, 3, 3, 4};
    v.erase(std::unique(v.begin(), v.end()), v.end());
    for (int num : v) std::cout << num << " ";
}

std::min_element et std::max_element :
```

Retourne un itérateur vers l’élément minimal ou maximal.

```cpp
#include <iostream>
#include <vector>
#include <algorithm>

int main() {
    std::vector<int> v = {1, 2, 3, 4, 5};
    auto min_it = std::min_element(v.begin(), v.end());
    auto max_it = std::max_element(v.begin(), v.end());
    std::cout << "Min : " << *min_it << ", Max : " << *max_it << std::endl;
}
```

## 6/ Algorithmes de Manipulation de Collections :

```cpp
std::copy :
```
Copie une plage d’éléments d’un conteneur à un autre.

```cpp
#include <iostream>
#include <vector>
#include <algorithm>

int main() {
    std::vector<int> v = {1, 2, 3, 4, 5};
    std::vector<int> v_copy(5);
    std::copy(v.begin(), v.end(), v_copy.begin());
    for (int num : v_copy) std::cout << num << " ";
}
```

## 7/ std::min_element & std::max_element :

### Description :

Permettent de trouver l’élément minimal ou maximal dans une plage d’éléments.

### Syntaxe :

```cpp
auto min_it = std::min_element(begin, end);
auto max_it = std::max_element(begin, end);

// Avec comparateur personnalisé
auto min_it = std::min_element(begin, end, comp);
auto max_it = std::max_element(begin, end, comp);
```

### Paramètres :

begin, end : plage d’itérateurs.

comp : (optionnel) fonction ou lambda de comparaison.

### Retour :

Un itérateur vers l’élément min ou max (ou end si vide).

### Exemple :

```cpp
#include <iostream>
#include <vector>
#include <algorithm>

int main() {
    std::vector<int> v = {4, 2, 9, 1, 5};
    auto min_it = std::min_element(v.begin(), v.end());
    auto max_it = std::max_element(v.begin(), v.end());
    std::cout << "Min: " << *min_it << "\nMax: " << *max_it << std::endl;
}
```

### 8/ Conclusion :

Les algorithmes de <algorithm> sont des outils puissants pour manipuler et transformer des données efficacement.
En utilisant des fonctions comme std::find, std::sort, std::accumulate, tu peux résoudre une grande variété de problèmes avec peu de code et sans réinventer la roue.

Ces algorithmes sont optimisés et fonctionnent avec toute structure exposant des itérateurs.

