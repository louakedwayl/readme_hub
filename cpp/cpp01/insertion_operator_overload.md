						La surcharge d'operateur d'insertion
******************************************************************************************************************

La surcharge de l'opérateur << :
--------------------------------

Pourquoi surcharger << ? :
--------------------------

L'opérateur << est utilisé principalement avec std::cout pour afficher des informations.
Par défaut, il ne sait pas comment afficher vos propres classes.
Donc, on peut le surcharger pour personnaliser l'affichage d'un objet.

Syntaxe générale :
------------------

La surcharge de << se fait sous forme de fonction amie (friend) ou fonction globale.


Le type du flux :
-----------------

L'opérateur << fonctionne avec un flux de sortie.
En C++, un flux de sortie est représenté par un objet de type std::ostream.

Exemples d'objets flux de sortie :
---------------------------------

--------------------------------------------------------
|Objet		| Description                          |
|--------------------------------------------------------
|std::cout	| Flux standard d'affichage (console)  |
|std::ofstream	| Flux vers un fichier                 |
--------------------------------------------------------

On passe un std::ostream& en argument car on souhaite écrire sur un flux donné (console, fichier, etc.).
On retourne un std::ostream& pour permettre d'enchaîner les affichages :


Exemple simple :
----------------

#include <iostream>
#include <string>

class Person 
{
private:
    std::string name;
    int age;

public:
    Person(std::string n, int a) : name(n), age(a) {}

    // Déclaration en friend pour accéder aux attributs privés
    friend std::ostream& operator<<(std::ostream& os, const Person& p);
};

// Définition de la surcharge
std::ostream& operator<<(std::ostream& os, const Person& p) 
{
    os << "Name: " << p.name << ", Age: " << p.age;
    return os;
}

int main() {
    Person p("Alice", 25);
    std::cout << p << std::endl;
    return 0;
}


Pourquoi std::ostream& ?
------------------------
Pour pouvoir enchaîner les affichages :

Explications détaillées :
-------------------------

----------------------------------------------------------------------------------------------------
|Élément			|			Raison					   |
---------------------------------------------------------------------------------------------------
|Argument std::ostream& os	| Pour spécifier sur quel flux on écrit (console, fichier, etc.)   |
|Argument const Person& p	| Pour passer l'objet sans le copier inutilement                   |
|Retour std::ostream&		| Pour permettre le chaînage des affichages (std::cout << a << b)  |
|Mot-clé friend			| Permet d'accéder aux membres privés de la classe                 |
----------------------------------------------------------------------------------------------------


********************************************************************************************************************
