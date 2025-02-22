						Visibiliy
*************************************************************************************************

1/ Introduction :
-----------------

	En C++, la visibilité des membres d'une classe définit leur accessibilité depuis d'autres
parties du programme. Elle repose sur trois spécificateurs d'accès : public, private et protected.


2/ Spécificateurs d'Accès :
---------------------------

2.1 public :
------------

	Les membres déclarés public sont accessibles depuis n'importe quelle partie du programme, 
y compris l'extérieur de la classe.

class Exemple 
{
public:
    int x;  // Accessible de partout
};

int main() 
{
    Exemple obj;
    obj.x = 10;  // Autorisé
    return 0;
}

2.2 private :
-------------

Les membres private ne sont accessibles que depuis l'intérieur de la classe.

class Exemple 
{
private:
    int x;
public:
    void setX(int val) { x = val; } // Méthode publique pour modifier x
};

int main() {
    Exemple obj;
    // obj.x = 10;  // Erreur : x est privé
    obj.setX(10);   // Correct
    return 0;
}

2.3 protected :
---------------

	Les membres protected fonctionnent comme private, sauf qu'ils restent accessibles 
dans les classes dérivées.

class Base 
{
protected:
    int x;
};

class Derivee : public Base 
{
public:
    void setX(int val) { x = val; } // Possible car x est protected
};

**************************************************************************************************
