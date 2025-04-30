							std::stack
************************************************************************************************************************
Introduction

std::stack est un adaptateur de conteneur dans la bibliothèque standard C++ qui permet de manipuler une structure de données de type pile 
(LIFO : Last In, First Out). La pile permet d'ajouter des éléments au sommet et d'en retirer du sommet. 
C'est un conteneur de type wrapper qui utilise un autre conteneur comme std::deque ou std::vector pour stocker les données 
sous-jacentes, mais les éléments ne sont accessibles qu'au sommet de la pile.

Fonctionnalités principales de std::stack

    Push : Ajoute un élément au sommet de la pile.

    Pop : Retire l'élément au sommet de la pile.

    Top : Accède à l'élément au sommet de la pile sans le retirer.

    Empty : Vérifie si la pile est vide.

    Size : Retourne le nombre d'éléments dans la pile.

1/ Déclaration et inclusion :
-----------------------------

Pour utiliser std::stack, il faut inclure l'en-tête <stack>.

#include <stack>

2/ Syntaxe de base :
--------------------

std::stack<T> stack_name;  // Crée une pile vide de type T

    T est le type des éléments contenus dans la pile.

    Par défaut, std::stack utilise std::deque comme conteneur sous-jacent.

std::stack existe uniquement en tant que template dans la bibliothèque standard C++.
Cela signifie que vous devez spécifier un type d'élément pour la pile lorsque vous la déclarez.

Le type d'élément peut être n'importe quel type valide, comme int, std::string, double, ou même un type personnalisé.

Syntaxe de déclaration :
------------------------

std::stack<T> stack_name;

Où T est le type des éléments à stocker dans la pile.

3/ Opérations de base :
-----------------------

a : push(value) :
-----------------

Ajoute un élément au sommet de la pile.

std::stack<int> stack;
stack.push(5);   // Ajoute 5 au sommet de la pile
stack.push(10);  // Ajoute 10 au sommet de la pile

b : pop() :
-----------

Retire l'élément au sommet de la pile. Cette opération ne renvoie rien, mais modifie l'état de la pile.

stack.pop();  // Retire l'élément au sommet (10 dans ce cas)

c : top() :
------------

Accède à l'élément au sommet de la pile sans le retirer. Cette opération retourne une référence à l'élément du sommet.

int topValue = stack.top();  // Accède au sommet de la pile sans le retirer
std::cout << "Top element: " << topValue << std::endl; // Affiche 5

d : empty() :
-------------

Vérifie si la pile est vide. Retourne true si la pile est vide, sinon false.

if (stack.empty()) {
    std::cout << "La pile est vide." << std::endl;
} else {
    std::cout << "La pile n'est pas vide." << std::endl;
}

e : size() :
------------

Retourne le nombre d'éléments dans la pile.

std::cout << "La pile contient " << stack.size() << " éléments." << std::endl;

4/ Exemple complet :
--------------------

Voici un exemple complet d'utilisation de std::stack :

#include <iostream>
#include <stack>

int main() {
    std::stack<int> pile;

    // Ajouter des éléments
    pile.push(10);
    pile.push(20);
    pile.push(30);

    // Accéder au sommet
    std::cout << "Élément au sommet : " << pile.top() << std::endl;  // 30

    // Retirer l'élément au sommet
    pile.pop();
    std::cout << "Après pop, élément au sommet : " << pile.top() << std::endl;  // 20

    // Vérifier si la pile est vide
    if (pile.empty()) {
        std::cout << "La pile est vide." << std::endl;
    } else {
        std::cout << "La pile n'est pas vide." << std::endl;
    }

    // Taille de la pile
    std::cout << "La pile contient " << pile.size() << " éléments." << std::endl;

    return 0;
}

5/ Remarques importantes :
--------------------------

    Conteneur sous-jacent :

        Par défaut, std::stack utilise un std::deque pour stocker les éléments.
Toutefois, vous pouvez spécifier un autre conteneur en argument template, comme std::vector, en définissant un type personnalisé :

    std::stack<int, std::vector<int>> stack_with_vector;

    Pas d'accès aux éléments intermédiaires :

        Contrairement à d'autres conteneurs comme std::vector ou std::list, vous ne pouvez pas accéder aux éléments autres que le sommet 
de la pile. Cela fait de std::stack une structure de données adaptée aux scénarios où l'accès séquentiel au dernier élément inséré 
est nécessaire (par exemple, les algorithmes de parcours en profondeur, le retour de fonctions récursives, etc.).

    Usage courant :

        std::stack est utilisé dans des contextes où vous avez besoin de suivre un ordre d'insertion dans un programme. Par exemple, dans les algorithmes de parcours en profondeur (DFS), analyse syntaxique, et autres tâches nécessitant une gestion LIFO des éléments.

6/ Exemple d'utilisation dans un algorithme de parcours en profondeur (DFS) :
-----------------------------------------------------------------------------

Voici un exemple d'utilisation de std::stack dans un algorithme de parcours en profondeur dans un graphe :

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
        {1, 2},    // voisins de 0
        {0, 3},    // voisins de 1
        {0, 3},    // voisins de 2
        {1, 2, 4}, // voisins de 3
        {3}        // voisins de 4
    };

    dfs(0, adj);  // Lancer DFS à partir du noeud 0

    return 0;
}

Dans cet exemple, std::stack est utilisé pour implémenter le parcours en profondeur d'un graphe.
Conclusion

std::stack est un conteneur très pratique pour les applications nécessitant une structure de données LIFO, comme les parcours de graphes ou les algorithmes où l'ordre d'insertion est essentiel.

*******************************************************************************************************************************************
