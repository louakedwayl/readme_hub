                                    destructor
*****************************************************************************

1/ Definition d'un destructeur :
--------------------------------

    Un destructeur est une méthode spéciale d'une classe qui est 
automatiquement appelée lorsqu'un objet de cette classe est détruit.
Son rôle principal est de libérer les ressources allouées dynamiquement 
par l'objet avant sa destruction.

2/ Définition d'un Destructeur :
--------------------------------

Un destructeur : 1 / A le même nom que la classe, précédé d'un tilde ~.
                 2 / Ne prend aucun paramètre.
                 3 / Ne retourne aucune valeur.

Syntaxe Générale :
------------------

class NomClasse {
public:
    ~NomClasse(); // Déclaration du destructeur
};

3/ Fonctionnement du Destructeur :
----------------------------------

    Lorsqu'un objet sort de son contexte (fin de la portée d'un bloc, suppression
explicite avec delete), le destructeur est automatiquement appelé.

Exemple d'utilisation d'un destructeur :
----------------------------------------

#include <iostream>
using namespace std;

class Warrior {
public:
    Warrior() {
        cout << "Constructeur appelé" << endl;
    }
    
    ~Warrior() {
        cout << "Destructeur appelé" << endl;
    }
};

int main() 
{
    Warrior Maya; // Création d'un objet
    return 0; // À la fin du programme, le destructeur est appelé
}

5/ Utilité des Destructeurs :
-----------------------------

Le destructeur est utilisé principalement pour :

Libérer la mémoire allouée dynamiquement (delete sur des pointeurs).

Fermer des fichiers ouverts.

Libérer des ressources système (sockets, connexions réseau, etc.).
