                                                        pointer in c++
*************************************************************************************************************************

1/ Introduction aux pointeurs en C++:
-------------------------------------

En C++, un pointeur est une variable qui contient l’adresse mémoire d’un autre objet ou d’une instance 
d’une classe. Les pointeurs sont particulièrement utiles en POO pour :

Gérer la mémoire dynamique.
Créer des structures de données flexibles (listes, arbres, etc.).
Permettre le polymorphisme via des pointeurs vers des classes de base.

2/ Déclaration et utilisation de pointeurs sur instances :
----------------------------------------------------------

Un pointeur sur instance est un pointeur qui pointe vers une instance (un objet) d’une classe. 
En d'autres termes, il permet d'accéder à un objet spécifique.
Pour déclarer un pointeur vers une instance d’une classe, on utilise la syntaxe suivante :

NomClasse* pointeur;

Par exemple, pour une classe Personne :

class Warrior 
{
public:
    std::string name;
    int age;

    void print_name() {std::cout << name << std::endl;}
};

int main() {
    Warrior* w = new Warrior;  // Déclaration d'un pointeur vers une instance de Warrior
    w->name = "Conan";          // Accès à l'attribut name via le pointeur
    w->age = 35;                // Accès à l'attribut age via le pointeur
    w->print_name();            // Appel de la méthode print_name() via le pointeur

    delete w;                   // Libération de la mémoire allouée
    w = nullptr;                // Mise à nullptr pour éviter un pointeur pendu

    return 0;
}

Explication :
-------------

Warrior* w = new Warrior; : Le pointeur w est déclaré et pointe vers une nouvelle instance dynamique 
de la classe Warrior.

w->name et w->age : Accès aux membres de la classe via le pointeur, en utilisant l'opérateur -> 
(opérateur de déférencement pour les pointeurs sur objets).

delete w; : La mémoire allouée pour l'objet est libérée à l'aide de delete, ce qui évite les fuites de mémoire.

3/  Pointeur sur membre :
-------------------------

Un pointeur sur membre est un pointeur qui pointe vers un membre spécifique d’une classe 
(qu’il soit un attribut ou une méthode). Ce pointeur est lié à un type de membre précis (attribut ou fonction) 
et nécessite une instance de l'objet pour être utilisé.

Syntaxe de déclaration :
------------------------

type NomClasse::*pointeur;

Exemple pour un pointeur sur un attribut :
------------------------------------------

#include <iostream>

class Sample {
public:
    int value;
};

int main() 
{
    // Déclaration d'un pointeur vers un membre de type int de la classe Sample
    int Sample::*p = nullptr;

    Sample obj;   // Création d'une instance de Sample
    obj.value = 42; // Initialisation du membre value

    // Affectation du pointeur sur membre au membre value
    p = &Sample::value;

    // Accès au membre value via le pointeur sur membre
    std::cout << "Valeur de obj.value : " << obj.*p << std::endl;

    return 0;
}

Exemple pour un pointeur sur une méthode :
------------------------------------------

class Sample 
{
public:
    void print() {
        std::cout << "Hello from Sample!" << std::endl;
    }
};

int main() 
{
    // Déclaration d'un pointeur sur une méthode de type void de la classe Sample
    void (Sample::*ptr)() = &Sample::print;

    Sample obj;
    (obj.*ptr)();  // Appel de la méthode print via le pointeur sur membre

    return 0;
}

Explication :
-------------

int Sample::*p = nullptr; : Le pointeur p est un pointeur sur membre de type int, 
                 et il pointe spécifiquement vers le membre value de la classe Sample.

p = &Sample::value; : Le pointeur est assigné à l'adresse du membre value de la classe Sample.


obj.*p : Accès au membre value de l'objet obj via le pointeur sur membre.
         De même, dans le cas d'une méthode, un pointeur sur membre de méthode est utilisé pour référencer 
         une fonction membre spécifique et doit être utilisé avec une instance pour l'exécuter.

4/ Différence entre pointeur sur instance et pointeur sur menbres :
-------------------------------------------------------------------

---------------------------------------------------------------------------------------------------------------
| **Critère**              | **Pointeur sur Instance**                | **Pointeur sur Membre**               |
|--------------------------|-------------------------------------     |-----------------------------          |
| **Définition**           | Pointeur vers une instance d'une classe. | Pointeur vers un membre d'une classe. |
| **Type de cible**        | L'objet entier (instance).               | Un attribut ou une méthode.           |
| **Accès aux membres**    | Utilise `->`.                            | Utilise `.*`.                         |
| **Besoin d'une instance**| Oui, pour l'objet entier.                | Oui, pour accéder au membre.          |
| **Exemple d'utilisation**| Manipuler l'objet complet.               | Accéder ou manipuler un membre précis.|
---------------------------------------------------------------------------------------------------------------

*************************************************************************************************************************
