					Comparison
*************************************************************************************************

1/ Introduction :
-----------------

	En C++, la comparaison d'objets est un concept essentiel lorsque vous souhaitez comparer 
deux instances de la même classe. Par défaut, les objets sont comparés par leur adresse mémoire, 
ce qui signifie que deux objets sont considérés égaux uniquement si ce sont exactement les mêmes
objets en mémoire.

	Cependant, dans la plupart des cas, vous voulez comparer les valeurs ou les attributs 
de ces objets, et non pas leur adresse mémoire. Pour cela, C++ fournit des mécanismes pour 
surcharger les opérateurs de comparaison et comparer les objets en fonction de leurs membres.

2/ Surcharge de l'opérateur == :
--------------------------------

	Pour surcharger l'opérateur == (égal à), vous devez définir une méthode membre ou une 
fonction non membre qui compare les attributs des objets.

	Pour surcharger un opérateur en C++, il faut définir l'opérateur dans la définition 
de la méthode (dans la classe) ou dans une fonction non membre (en dehors de la classe). 
La surcharge permet de spécifier comment un opérateur standard (comme +, ==, <, etc.) 
se comporte lorsqu'il est appliqué à des objets de votre propre classe.

Exemple de surcharge de == :
----------------------------

#include <iostream>

class Point 
{
private:
    int x, y;

public:
    // Constructeur
    Point(int _x, int _y) : x(_x), y(_y) {}

    // Surcharge de l'opérateur == pour comparer deux objets Point
    bool operator==(const Point& other) const {
        return (x == other.x && y == other.y);
    }

    // Méthode pour afficher un point
    void afficher() const {
        std::cout << "(" << x << ", " << y << ")";
    }
};

int main() 
{
    Point p1(3, 4);
    Point p2(3, 4);
    Point p3(5, 6);

    if (p1 == p2) 
{
        std::cout << "p1 et p2 sont égaux." << std::endl;
    } 
else 
{
        std::cout << "p1 et p2 ne sont pas égaux." << std::endl;
    }

    if (p1 == p3) 
{
        std::cout << "p1 et p3 sont égaux." << std::endl;
    } else 
{
        std::cout << "p1 et p3 ne sont pas égaux." << std::endl;
    }

    return 0;
}

***************************************************************************************************
