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

*************************************************************************************************************************
