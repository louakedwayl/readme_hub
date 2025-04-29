Les Algorithmes de la Bibliothèque <algorithm> en C++
************************************************************************

La bibliothèque <algorithm> en C++ fournit un ensemble d'algorithmes génériques qui peuvent être appliqués 
à une large variété de structures de données, telles que les vecteurs, les listes, les tableaux, etc.

Ces algorithmes facilitent l'écriture de code concis, efficace et facilement maintenable.

1/ Introduction à la Bibliothèque <algorithm> :
-----------------------------------------------

Avant d'aborder les algorithmes, il est important de noter que la bibliothèque <algorithm> fournit 
des fonctions de haut niveau pour effectuer des opérations comme la recherche, le tri, la modification 
ou la transformation de collections de données.

La plupart des algorithmes de <algorithm> suivent un principe de généricité,
ce qui signifie qu'ils fonctionnent sur n'importe quelle structure de données supportant des itérateurs.

Les algorithmes de cette bibliothèque fonctionnent principalement avec des paires d'itérateurs,
définissant une plage d'éléments sur lesquels l'algorithme peut opérer.

2/ Algorithmes de Recherche :
-----------------------------

std::find

std::find permet de rechercher un élément spécifique dans une collection. 
Il retourne un itérateur pointant sur l'élément recherché ou container.end() si l'élément n’est pas trouvé.

Exemple :
---------

#include <iostream>
#include <vector>
#include <algorithm>

int main() {
    std::vector<int> v = {1, 2, 3, 4, 5};
    auto it = std::find(v.begin(), v.end(), 3);  // Recherche 3 dans le vecteur
    if (it != v.end()) {
        std::cout << "Trouvé à l'indice : " << std::distance(v.begin(), it) << std::endl;
    } else {
        std::cout << "Non trouvé" << std::endl;
    }
}

std::count

std::count permet de compter le nombre d’occurrences d’un élément spécifique dans une collection.

Exemple :
---------

#include <iostream>
#include <vector>
#include <algorithm>

int main() 
{
    std::vector<int> v = {1, 2, 3, 2, 4, 2, 5};
    int count = std::count(v.begin(), v.end(), 2);
    std::cout << "La valeur 2 apparaît " << count << " fois." << std::endl;
}

3/ Algorithmes de Tri :
-----------------------

std::sort

std::sort trie les éléments d'un conteneur en utilisant l'algorithme de tri rapide (QuickSort).
La complexité est de O(n log n) dans le meilleur des cas. Ce tri est in-place,
c'est-à-dire qu'il modifie directement le conteneur.

Exemple :
---------

#include <iostream>
#include <vector>
#include <algorithm>

int main() 
{
    std::vector<int> v = {5, 2, 9, 1, 5, 6};
    std::sort(v.begin(), v.end());  // Tri croissant
    for (int num : v) {
        std::cout << num << " ";
    }
    std::cout << std::endl;
}

std::reverse

std::reverse inverse l'ordre des éléments dans un conteneur. Cela peut être utile lorsque tu veux afficher des éléments dans l'ordre inverse, par exemple.

Exemple :

#include <iostream>
#include <vector>
#include <algorithm>

int main() {
    std::vector<int> v = {1, 2, 3, 4, 5};
    std::reverse(v.begin(), v.end());  // Inverse l'ordre des éléments
    for (int num : v) {
        std::cout << num << " ";
    }
    std::cout << std::endl;
}

4= Algorithmes de Transformation :
----------------------------------

std::transform

std::transform applique une fonction donnée à chaque élément d'une collection et peut enregistrer le résultat dans un autre conteneur ou dans le même conteneur.

Exemple :

#include <iostream>
#include <vector>
#include <algorithm>

int main() {
    std::vector<int> v = {1, 2, 3, 4, 5};
    std::transform(v.begin(), v.end(), v.begin(), [](int x) { return x * x; });  // Élève chaque élément au carré
    for (int num : v) {
        std::cout << num << " ";
    }
    std::cout << std::endl;
}

std::accumulate

std::accumulate, disponible dans la bibliothèque <numeric>, permet de calculer la somme (ou toute autre opération binaire) des éléments d'une collection.

Exemple :

#include <iostream>
#include <vector>
#include <numeric>  // Pour std::accumulate

int main() {
    std::vector<int> v = {1, 2, 3, 4, 5};
    int sum = std::accumulate(v.begin(), v.end(), 0);  // Somme des éléments
    std::cout << "Somme : " << sum << std::endl;
}

5/ Algorithmes sur les Collections :
------------------------------------

std::unique

std::unique supprime les éléments consécutifs égaux dans une collection. Il ne modifie pas la taille du conteneur,mais retourne un itérateur pointant à la fin des éléments uniques.

Exemple :
---------

#include <iostream>
#include <vector>
#include <algorithm>

int main() 
{
    std::vector<int> v = {1, 2, 2, 3, 3, 3, 4};
    v.erase(std::unique(v.begin(), v.end()), v.end());  // Supprime les doublons
    for (int num : v) {
        std::cout << num << " ";
    }
    std::cout << std::endl;
}

std::min_element et std::max_element

std::min_element et std::max_element retournent respectivement les itérateurs pointant vers l'élément minimal ou maximal d'une collection.

Exemple :
---------

#include <iostream>
#include <vector>
#include <algorithm>

int main() {
    std::vector<int> v = {1, 2, 3, 4, 5};
    auto min_it = std::min_element(v.begin(), v.end());
    auto max_it = std::max_element(v.begin(), v.end());
    std::cout << "Min : " << *min_it << ", Max : " << *max_it << std::endl;
}

6/ Algorithmes de Manipulation de Collections :
-----------------------------------------------

std::copy

std::copy copie une plage d'éléments d'un conteneur vers un autre. Cela peut être utile lorsque tu veux dupliquer des données ou transférer des éléments.

Exemple :
---------

#include <iostream>
#include <vector>
#include <algorithm>

int main() 
{
    std::vector<int> v = {1, 2, 3, 4, 5};
    std::vector<int> v_copy(5);
    std::copy(v.begin(), v.end(), v_copy.begin());  // Copie les éléments de v dans v_copy
    for (int num : v_copy) {
        std::cout << num << " ";
    }
    std::cout << std::endl;
}

7/ Conclusion :
---------------

Les algorithmes de la bibliothèque <algorithm> en C++ sont des outils puissants pour manipuler 
et transformer des données de manière efficace. En utilisant des algorithmes génériques comme std::find, 
std::sort, std::accumulate, et d'autres, tu peux résoudre une grande variété de problèmes avec peu de 
code et sans avoir à réinventer la roue.

Ces algorithmes sont optimisés pour des performances élevées et peuvent être appliqués à n'importe quelle 
structure de données qui expose des itérateurs.

**************************************************************************************************************
