# Comparison en C++

---

## 1. Introduction

En C++, la comparaison d'objets est essentielle quand on veut comparer deux instances d'une même classe.  
Par défaut, les objets sont comparés par leur **adresse mémoire**, donc deux objets sont égaux uniquement s’ils sont le même objet en mémoire.

Mais la plupart du temps, on veut comparer les **valeurs ou attributs** des objets, pas leur adresse mémoire.

C++ permet de **surcharger les opérateurs de comparaison** pour comparer les objets selon leurs membres.

---

## 2. Surcharge de l'opérateur `==`

Pour surcharger l'opérateur `==`, on définit une méthode membre ou une fonction non membre qui compare les attributs.

- Cette surcharge peut se faire dans la classe (méthode membre) ou en dehors (fonction amie ou libre).
- La surcharge définit comment l’opérateur standard `==` agit sur les objets de ta classe.

---

### Exemple

```cpp
#include <iostream>

class Point 
{
private:
    int x, y;

public:
    // Constructeur
    Point(int _x, int _y) : x(_x), y(_y) {}

    // Surcharge de l'opérateur ==
    bool operator==(const Point& other) const {
        return (x == other.x && y == other.y);
    }

    // Affichage
    void afficher() const {
        std::cout << "(" << x << ", " << y << ")";
    }
};

int main() 
{
    Point p1(3, 4);
    Point p2(3, 4);
    Point p3(5, 6);

    if (p1 == p2) {
        std::cout << "p1 et p2 sont égaux." << std::endl;
    } else {
        std::cout << "p1 et p2 ne sont pas égaux." << std::endl;
    }

    if (p1 == p3) {
        std::cout << "p1 et p3 sont égaux." << std::endl;
    } else {
        std::cout << "p1 et p3 ne sont pas égaux." << std::endl;
    }

    return 0;
}
