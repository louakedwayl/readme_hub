					Insert
************************************************************************************************************************

La méthode insert :
-------------------

1/ Insérer un seul élément à une position donnée :
--------------------------------------------------

container.insert(position, value);

    position : un itérateur indiquant où l'élément doit être inséré.

    value : l'élément à insérer.

Exemple :

#include <vector>
#include <iostream>

int main() 
{
    std::vector<int> v;
    v.push_back(1);
    v.push_back(2);
    v.push_back(3);

    // Positionner l'itérateur sur le début du vecteur
    std::vector<int>::iterator it = v.begin();

    // Insérer '0' au début
    v.insert(it, 0);

    // Afficher le vecteur
    for (std::vector<int>::iterator it = v.begin(); it != v.end(); ++it) {
        std::cout << *it << " ";
    }
    // Résultat : 0 1 2 3
    return 0;
}

2/ Insérer plusieurs éléments à une position donnée :
-----------------------------------------------------

container.insert(position, n, value);

    position : l'itérateur indiquant où commencer l'insertion.

    n : le nombre d'éléments à insérer.

    value : la valeur de chaque élément inséré.

Exemple :

#include <vector>
#include <iostream>

int main() 
{
    std::vector<int> v;
    v.push_back(1);
    v.push_back(2);
    v.push_back(3);

    // Insérer deux éléments '5' à la fin du vecteur
    v.insert(v.end(), 2, 5);

    // Afficher le vecteur
    for (std::vector<int>::iterator it = v.begin(); it != v.end(); ++it) {
        std::cout << *it << " ";
    }
    // Résultat : 1 2 3 5 5
    return 0;
}

3/ Insérer une plage d'éléments (un range d'itérateurs) :
---------------------------------------------------------

container.insert(position, begin, end);

    position : l'itérateur où commencer l'insertion.

    begin et end : les itérateurs représentant la plage des éléments à insérer.

Exemple avec des itérateurs :
-----------------------------

#include <vector>
#include <iostream>

int main() {
    std::vector<int> v1;
    v1.push_back(1);
    v1.push_back(2);
    v1.push_back(3);

    std::vector<int> v2;
    v2.push_back(4);
    v2.push_back(5);
    v2.push_back(6);

    // Insérer les éléments de v2 à la fin de v1
    v1.insert(v1.end(), v2.begin(), v2.end());

    // Afficher le vecteur
    for (std::vector<int>::iterator it = v1.begin(); it != v1.end(); ++it) {
        std::cout << *it << " ";
    }
    // Résultat : 1 2 3 4 5 6
    return 0;
}

Explication :
-------------

    Insérer un seul élément : La méthode insert permet d'ajouter un élément à une position donnée sans supprimer aucun élément existant.
Elle déplace les éléments après l'endroit d'insertion.

    Insérer plusieurs éléments : Il est possible d'ajouter plusieurs copies du même élément en spécifiant le nombre n à insérer.

    Insérer une plage d'éléments : On peut insérer plusieurs éléments à partir d'une autre collection,
définie par une plage d'itérateurs, entre begin et end.

En résumé :
-----------

La méthode insert permet d'ajouter des éléments dans un conteneur à une position donnée (comme au début, au milieu ou à la fin).
Elle est flexible et permet d'ajouter une ou plusieurs copies du même élément ou une plage d'éléments d'un autre conteneur.

Notes supplémentaires :
-----------------------

    Sur std::vector : L'insertion d'éléments peut entraîner le déplacement de données si la capacité du vecteur doit être augmentée pour 
accueillir de nouveaux éléments. Cela peut être coûteux en termes de performance, surtout si de nombreuses insertions sont effectuées 
dans un grand vecteur.

    Sur std::list : L'insertion est généralement plus rapide (O(1)) car elle ne nécessite pas de déplacer les éléments,
mais l'itérateur spécifié doit indiquer une position valide dans la liste.

****************************************************************************************************************************************
