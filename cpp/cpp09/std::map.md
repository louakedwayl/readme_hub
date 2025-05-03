						std::map
*************************************************************************************************************************

Qu’est-ce que std::map ? :
--------------------------

std::map est un conteneur associatif qui stocke des paires clé/valeur triées selon la clé. Chaque clé est unique.
Il utilise un arbre binaire équilibré (Red-Black Tree) pour organiser les données.

Syntaxe :
---------

std::map<Clé, Valeur> monMap;

Opérations de base :
--------------------

Insertion :
-----------

std::map<std::string, int> ageMap;
ageMap["Alice"] = 25;
ageMap.insert(std::make_pair("Bob", 30));

Accès :
-------

int age = ageMap["Alice"]; // insère "Alice" si elle n'existe pas

Recherche :
-----------

std::map<std::string, int>::iterator it = ageMap.find("Bob");
if (it != ageMap.end()) 
{
    std::cout << "Bob a " << it->second << " ans." << std::endl;
}

Suppression :
-------------

ageMap.erase("Bob");

Parcours :
----------

std::map<std::string, int>::iterator it;
for (it = ageMap.begin(); it != ageMap.end(); ++it) 
{
    std::cout << it->first << " : " << it->second << std::endl;
}

Exemple :
---------

#include <iostream>
#include <map>
#include <string>

int main() 
{
    std::map<std::string, int> ageMap;

    // Insertion
    ageMap["Alice"] = 25;
    ageMap.insert(std::make_pair("Bob", 30));
    ageMap.insert(std::make_pair("Charlie", 35));

    // Accès
    std::cout << "L'âge de Bob est " << ageMap["Bob"] << std::endl;

    // Recherche
    std::map<std::string, int>::iterator it = ageMap.find("Alice");
    if (it != ageMap.end())
        std::cout << "Alice est présente avec " << it->second << " ans." << std::endl;

    // Parcours
    for (it = ageMap.begin(); it != ageMap.end(); ++it)
        std::cout << it->first << " a " << it->second << " ans." << std::endl;

    // Suppression
    ageMap.erase("Charlie");

    return 0;
}

Comparateur personnalisé (tri différent) :
------------------------------------------

struct CompareLongueur 
{
    bool operator()(const std::string& a, const std::string& b) const {
        return a.length() < b.length();
    }
};

int main() {
    std::map<std::string, int, CompareLongueur> myMap;
    myMap["Un"] = 1;
    myMap["Trois"] = 3;
    myMap["Deux"] = 2;

    std::map<std::string, int, CompareLongueur>::iterator it;
    for (it = myMap.begin(); it != myMap.end(); ++it)
        std::cout << it->first << " : " << it->second << std::endl;

    return 0;
}

Résumé des fonctions utiles :
-----------------------------

Méthode			Description
insert(pair)		Insère une paire clé/valeur
find(clé)		Renvoie un itérateur vers la clé
erase(clé ou it)	Supprime une entrée
begin() / end()		Accès aux extrémités pour le parcours
empty()			Vérifie si la map est vide
size()			Retourne le nombre d'éléments
clear()			Vide la map

*************************************************************************************************************************************
