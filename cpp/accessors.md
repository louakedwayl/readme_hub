				  	Accesors
*******************************************************************************************

1/ Introduction :
-----------------

	En C++, les accessors (ou accesseurs) sont des méthodes d'une classe utilisées pour
obtenir (getter) ou modifier (setter) la valeur d'un attribut privé ou protégé. 
Ils permettent d'encapsuler les données et de contrôler leur accès, conformément au principe 
de l'encapsulation en programmation orientée objet (POO).


2/ Pourquoi utiliser des accessors ? :
--------------------------------------

	L'encapsulation protège les données d'une classe en limitant leur accès direct. 
Les accessors offrent plusieurs avantages :

Protection des données : Empêche l'accès direct aux attributs.

Validation des valeurs : Vérifie les données avant modification.

Maintenance facilitée : Permet de modifier l'implémentation sans impacter le code utilisateur.

Contrôle d'accès : Autorise uniquement la lecture ou restreint certaines modifications.

3/ Déclaration et implémentation des Accessors :
-----------------------------------------------

	3.1 Getters (Accesseurs en lecture) :
	------------------------------------

Un getter permet d'accéder à la valeur d'un attribut privé.

Exemple d'utilisation d'un getter :
-----------------------------------

#include <iostream>
using namespace std;

class Personne {
private:
    string nom;
public:
    Personne(string n) : nom(n) {}
    string getNom() const { return nom; }
};

int main() {
    Personne p("Alice");
    cout << "Nom : " << p.getNom() << endl;
    return 0;
}

	3.2 Setters (Accesseurs en écriture) :
	-------------------------------------

Un setter modifie la valeur d'un attribut privé avec validation.

Exemple d'utilisation d'un setter :
-----------------------------------

class Personne 
{
private:
    string nom;
public:
    Personne(string n) : nom(n) {}
    string getNom() const { return nom; }
    void setNom(string n) {
        if (!n.empty()) nom = n;
        else cout << "Nom invalide !" << endl;
    }
};

int main() 
{
    Personne p("Alice");
    p.setNom("Bob");
    cout << "Nom : " << p.getNom() << endl;
    p.setNom("");
    return 0;
}

*************************************************************************************************
