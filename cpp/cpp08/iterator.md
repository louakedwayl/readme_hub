		Cours sur les itérateurs en C++
******************************************************************************************************

1/ Définition :
---------------

Un itérateur en C++ est un objet qui sert à parcourir les éléments d'une collection (comme un vector, list, map, etc.),
un peu comme un pointeur. Il permet de naviguer dans une structure de données, de lire, voire de modifier ses éléments.

2/ Syntaxe générale :
---------------------

std::vector<int> vec = {1, 2, 3, 4};

for (std::vector<int>::iterator it = vec.begin(); it != vec.end(); ++it) 
{
    std::cout << *it << " ";
}

Ici, it est un itérateur qui pointe sur chaque élément du vector, et *it permet d'accéder à la valeur.

3/ Types d’itérateurs :
-----------------------

| Type d'itérateur         | Description                                                         |
|--------------------------|---------------------------------------------------------------------|
| InputIterator            | Lecture seulement, séquentielle, une fois (ex: `istream_iterator`)  |
| OutputIterator           | Écriture seulement, séquentielle                                    |
| ForwardIterator          | Lecture/écriture, séquentielle, plusieurs passages autorisés        |
| BidirectionalIterator    | Navigation avant/arrière                                            |
| RandomAccessIterator     | Accès direct (ex: `vector`, `deque`)                                |


Exemple :
---------

std::vector<int>::iterator it;         // Itérateur modifiable
std::vector<int>::const_iterator cit;  // Itérateur en lecture seule

4/ Fonctions associées :
------------------------

    begin() : Retourne un itérateur vers le premier élément.

    end() : Retourne un itérateur vers l'élément suivant le dernier.

    rbegin() / rend() : Itérateurs en ordre inverse.

    cbegin() / cend() : Itérateurs const (lecture uniquement).

5/ Exemple avec list :
----------------------

std::list<std::string> names = {"Alice", "Bob", "Charlie"};

for (std::list<std::string>::iterator it = names.begin(); it != names.end(); ++it) 
{
    std::cout << *it << std::endl;
}

6/ auto et simplification :
---------------------------

C++11 a introduit auto pour éviter d'écrire le type complet :

for (auto it = vec.begin(); it != vec.end(); ++it) 
{
    std::cout << *it << " ";
}

7/ Itérateurs et const :
------------------------

    const_iterator : On ne peut pas modifier l’élément pointé.

    iterator : L’élément peut être modifié.

std::vector<int>::const_iterator it = vec.begin();

*it = 10; // ❌ Erreur : it est un const_iterator

8/ Boucle range-based for (C++11+) :
------------------------------------

Simplifie les boucles avec itérateurs :

for (int val : vec) 
{
    std::cout << val << " ";
}

9/ Utilisation avec des algorithmes STL :
-----------------------------------------

Les algorithmes comme std::find, std::sort, etc., prennent des itérateurs :

std::vector<int> v = {5, 2, 8};

std::sort(v.begin(), v.end()); // Trie v

auto it = std::find(v.begin(), v.end(), 2);
if (it != v.end()) std::cout << "Found: " << *it;

10/ Cas pratique : modification des éléments :
----------------------------------------------

for (auto it = vec.begin(); it != vec.end(); ++it) 
{
    *it *= 2; // Double chaque élément
}

Résumé :
--------

    Les itérateurs sont essentiels pour naviguer dans les conteneurs.

    Ils fonctionnent comme des pointeurs.

    Il existe plusieurs types adaptés à différentes structures.

    Utilisables avec la STL pour les algorithmes (sort, find, transform...).

    C++ moderne facilite leur usage avec auto et range-based for.

****************************************************************************************************
