						static_cast
**************************************************************************************************************************

Le static_cast est l'un des types de conversions explicites en C++.
Il permet de convertir un type vers un autre de manière sécurisée à la compilation, en vérifiant la validité de la conversion.

1. Qu'est-ce qu'un static_cast ? :
----------------------------------

Le static_cast est un opérateur de conversion de types qui permet de réaliser une conversion entre types compatibles de manière sûre,
vérifiée à la compilation. 
Ce type de conversion est appelé "conversion statique" car elle est déterminée lors de la compilation (et non à l'exécution).

2. Syntaxe du static_cast :
---------------------------

static_cast<type_cible>(expression)

    type_cible : le type vers lequel tu souhaites convertir.

    expression : l'expression ou la valeur à convertir.

3. Utilisation du static_cast :
-------------------------------

Le static_cast peut être utilisé dans de nombreuses situations, notamment pour :

    Convertir des types numériques entre eux (par exemple, d'un float vers un int).

    Convertir des types dérivés entre eux dans une hiérarchie de classes (c'est-à-dire entre des classes de base et des classes dérivées).

    Effectuer des conversions implicites surchargées.


4. Exemples d'utilisation :
---------------------------

a. Conversion de types numériques :
-----------------------------------

Supposons que nous ayons une valeur de type double et que nous souhaitions la convertir en int :

#include <iostream>

using namespace std;

int main() 
{
    double pi = 3.14159;
    int pi_int = static_cast<int>(pi);  // Conversion de double vers int

    cout << "Pi en entier: " << pi_int << endl;  // Affiche 3
    return 0;
}

Ici, static_cast<int>(pi) convertit le double pi en un int en éliminant la partie décimale.

b. Conversion entre types dérivés et de base :
----------------------------------------------

Dans une hiérarchie de classes, tu peux utiliser static_cast pour convertir un pointeur ou une référence d'une classe dérivée 
vers une classe de base, ou l'inverse.

#include <iostream>

using namespace std;

class Animal 
{
public:
    virtual void speak() { cout << "L'animal fait un bruit." << endl; }
};

class Chien : public Animal 
{
public:
    void speak() override { cout << "Le chien aboie." << endl; }
};

int main() 
{
    Chien chien;
    Animal* animal_ptr = static_cast<Animal*>(&chien);  // Conversion de Chien* en Animal*
    
    animal_ptr->speak();  // Appelle la méthode de la classe Chien, pas Animal

    return 0;
}

Ici, nous avons utilisé static_cast pour convertir un pointeur Chien* en Animal*.
Comme Chien est dérivé de Animal, cette conversion est valide.

c. Conversion entre types de pointeurs :
----------------------------------------

Le static_cast peut aussi être utilisé pour convertir entre des types de pointeurs, à condition que la conversion soit valide 
(par exemple, entre des classes liées par héritage).

#include <iostream>

using namespace std;

class A {};
class B : public A {};

int main() 
{
    B b;
    A* a = static_cast<A*>(&b);  // Conversion de B* en A*

    return 0;
}

5. Limites du static_cast :
---------------------------

    Pas de conversion entre types incompatibles : Le static_cast ne permet pas de convertir des types incompatibles.
Par exemple, il ne permet pas de convertir directement un type void* en int* sans une conversion explicite via un autre mécanisme 
(comme reinterpret_cast).

    Pas de vérification d'erreur à l'exécution : Contrairement à dynamic_cast, qui vérifie à l'exécution que la conversion est valide, 
le static_cast est vérifié uniquement à la compilation. Si la conversion est incorrecte mais que le compilateur ne le détecte pas 
(par exemple, une conversion entre types non liés dans une hiérarchie de classes), il pourrait y avoir des erreurs d'exécution.

6. Comparaison avec d'autres cast :
-----------------------------------

    dynamic_cast : Le dynamic_cast est utilisé pour les conversions entre types de classes dans une hiérarchie polymorphique 
(avec héritage et virtual). Il vérifie la validité de la conversion à l'exécution.

    const_cast : Le const_cast est utilisé pour ajouter ou enlever le qualificatif const d'un type. Il est généralement utilisé 
lorsqu'une fonction ou un objet nécessite de manipuler un type non constant alors que le type d'origine est constant.

    reinterpret_cast : Le reinterpret_cast est utilisé pour convertir des types de manière plus brute, comme entre des pointeurs de 
types complètement différents. Il n'y a aucune vérification à la compilation ni à l'exécution pour garantir que cette 
conversion est valide.

**********************************************************************************************************************************
