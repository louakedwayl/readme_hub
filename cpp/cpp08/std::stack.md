# `std::stack`

## Introduction
`std::stack` est un **adaptateur de conteneur** de la bibliothèque standard C++ qui implémente une **pile**  
(**LIFO : Last In, First Out**).  
Seul l’élément **au sommet** est accessible, ce qui rend `std::stack` idéal pour les scénarios où l’on doit  
gérer les données dans l’ordre inverse de leur insertion (ex : algorithmes DFS, backtracking, analyse syntaxique).

---

## Fonctionnalités principales
- **`push`** : Ajoute un élément au sommet.  
- **`pop`** : Retire l’élément au sommet.  
- **`top`** : Accède à l’élément au sommet (sans le retirer).  
- **`empty`** : Vérifie si la pile est vide.  
- **`size`** : Retourne le nombre d’éléments dans la pile.

---

## 1/ Déclaration et inclusion
Pour utiliser `std::stack` :  

```cpp
#include <stack>
std::stack<T> stack_name;  // Crée une pile vide de type T

    T = type des éléments (int, string, classe personnalisée, etc.).

    Par défaut, std::stack utilise std::deque comme conteneur sous-jacent (modifiable : ex std::vector).
```

## 2/ Opérations de base

### a. push(value) :

Ajoute un élément au sommet.

std::stack<int> stack;
stack.push(5);
stack.push(10);  // Pile = [5, 10]

### b. pop() :

Retire l’élément au sommet (ne retourne rien).

stack.pop();  // Retire 10

### c. top() :

Accède à l’élément au sommet sans le retirer.

int topValue = stack.top();
std::cout << "Sommet : " << topValue << std::endl;

### d. empty() :

Vérifie si la pile est vide.

if (stack.empty()) std::cout << "Pile vide\n";

### e. size() :

Retourne le nombre d’éléments.

```cpp
std::cout << "Nombre d'éléments : " << stack.size() << std::endl;
```

## 3/ Exemple complet

```cpp
#include <iostream>
#include <stack>

int main() {
    std::stack<int> pile;

    pile.push(10);
    pile.push(20);
    pile.push(30);

    std::cout << "Sommet : " << pile.top() << std::endl;  // 30

    pile.pop();
    std::cout << "Après pop, sommet : " << pile.top() << std::endl;  // 20

    std::cout << "La pile contient " << pile.size() << " éléments.\n";

    return 0;
}
```

## 4/ Remarques importantes

Conteneur sous-jacent :
Par défaut : std::deque. Peut être remplacé par std::vector :

std::stack<int, std::vector<int>> stack_with_vector;

Pas d’accès aux éléments intermédiaires :
Seul le sommet est accessible (pas de [] ou d’itérateurs).

### Usage typique :

Idéal pour les scénarios nécessitant une gestion LIFO :

Parcours en profondeur (DFS).

Retour arrière (backtracking).

Analyse syntaxique.

## 5/ Exemple pratique : DFS avec std::stack

```cpp
#include <iostream>
#include <stack>
#include <vector>

void dfs(int start, const std::vector<std::vector<int>>& adj) {
    std::stack<int> s;
    std::vector<bool> visited(adj.size(), false);
    
    s.push(start);
    visited[start] = true;

    while (!s.empty()) {
        int node = s.top();
        s.pop();
        std::cout << "Visité : " << node << std::endl;

        for (int neighbor : adj[node]) {
            if (!visited[neighbor]) {
                visited[neighbor] = true;
                s.push(neighbor);
            }
        }
    }
}

int main() {
    std::vector<std::vector<int>> adj = {
        {1, 2}, {0, 3}, {0, 3}, {1, 2, 4}, {3}
    };

    dfs(0, adj);
}
```

### Conclusion

std::stack = pile LIFO simple et efficace.

Insertions/Suppressions rapides au sommet.

Pas d’accès aléatoire : uniquement le sommet.

Parfait pour les algorithmes nécessitant une structure LIFO (DFS, backtracking, undo/redo).

