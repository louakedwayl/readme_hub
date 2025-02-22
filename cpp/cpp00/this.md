                                            this
*****************************************************************************************************************

1/Introduction à this :
-----------------------

    En C++, this est un pointeur implicite qui existe dans toutes les méthodes d'une classe. Il pointe vers 
l'instance de l'objet qui appelle la méthode en cours d'exécution. Son utilité principale est d'éviter toute 
confusion entre les variables membres et les paramètres de la méthode, ainsi que de permettre l'enchaînement 
des appels de méthodes (method chaining).

2/Utilisation de this :
-----------------------

Le pointeur this est accessible uniquement dans les méthodes non statiques d'une classe. 

Exemple d'utilisation :
-----------------------

#include <iostream>

class Warrior {
private:
    int pv;

public:
    Warrior(int value) {
        this->pv = value; // Utilisation de `this` pour distinguer la variable membre du paramètre
    }

    void printpv() {
        std::cout << "pv : " << this->pv << std::endl;
    }
};

int main() {
    Warrior Maya(42);
    Maya.printpv();
    return 0;
}

******************************************************************************************************************
