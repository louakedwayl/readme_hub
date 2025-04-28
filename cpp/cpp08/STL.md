					Standard Template Library) en C++
************************************************************************************************************************************

1/ Introduction :
-----------------

La Standard Template Library (STL) est une bibliothèque C++ standardisée qui fournit :

    des conteneurs (structures de données),

    des algorithmes (recherche, tri, manipulation),

    des itérateurs (pour parcourir les conteneurs),

    des foncteurs (objets fonctions).

Elle est générique : basée sur des templates (template<typename T>), ce qui la rend très flexible et performante.

2/ Les Conteneurs (Containers) :
--------------------------------

Les conteneurs stockent des données. 

    vector : tableau dynamique.

    list : liste chaînée double.

    deque : double-ended queue .

    set : ensemble de valeurs uniques.

    map : table de hachage clé-valeur.


3/ Les Algorithmes :
--------------------

La STL propose de nombreux algorithmes génériques :

    Recherche : find, binary_search, count

    Tri : sort, stable_sort

    Modification : copy, swap, reverse

    Test : all_of, any_of, none_of

    Autres : accumulate (somme), transform, fill

Ils sont souvent utilisés avec des itérateurs.

4/ Les Itérateurs :
-------------------

Les itérateurs permettent de parcourir les conteneurs.

Types d'itérateurs :

    InputIterator : lecture (ex : istream_iterator)

    OutputIterator : écriture (ex : ostream_iterator)

    ForwardIterator : avance seulement

    BidirectionalIterator : avance et recule (ex : list)

    RandomAccessIterator : accès direct (ex : vector)

Exemple :
---------

std::vector<int> v = {1, 2, 3, 4};
for (std::vector<int>::iterator it = v.begin(); it != v.end(); ++it)
    std::cout << *it << std::endl;

5/ Les Foncteurs (Function Objects) :
-------------------------------------

Un foncteur est un objet qui se comporte comme une fonction.

Exemple simple :
----------------

struct MultiplyByTwo 
{
    int operator()(int x) const { return x * 2; }
};

MultiplyByTwo m;
std::cout << m(10); // affiche 20

Utilisés souvent dans les algorithmes pour personnaliser les opérations (ex : sort avec un comparateur).

3/ Avantages de la STL :
------------------------

 Gain de temps : pas besoin de réécrire des structures de données.

 Efficacité : les implémentations sont très optimisées.

 Sécurité : réduit les erreurs de gestion mémoire.
 
 Flexibilité : grâce aux templates.

****************************************************************************************************************************************
