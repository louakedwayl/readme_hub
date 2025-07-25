# `static_cast`

Le **`static_cast`** est l'un des types de conversions explicites en C++.  
Il permet de convertir un type vers un autre **de manière sécurisée à la compilation**, en vérifiant la validité de la conversion.

---

## 1. Qu'est-ce qu'un `static_cast` ? :
Le **`static_cast`** est un **opérateur de conversion de types** qui permet de réaliser une conversion entre **types compatibles** de manière sûre, vérifiée **à la compilation**.  
Ce type de conversion est dit **"statique"** car elle est déterminée lors de la **compilation** (et non à l'exécution).

---

## 2. Syntaxe du `static_cast` :
```cpp
static_cast<type_cible>(expression)

    type_cible : le type vers lequel on souhaite convertir.

    expression : l'expression ou la valeur à convertir.
```

## 3. Utilisation du static_cast :

Le static_cast peut être utilisé pour :

Convertir des types numériques (ex : float → int).

Convertir entre types dérivés et de base dans une hiérarchie de classes.

Effectuer des conversions implicites surchargées.

## 4. Exemples d'utilisation :

a. Conversion de types numériques :

```cpp
#include <iostream>
using namespace std;

int main() 
{
    double pi = 3.14159;
    int pi_int = static_cast<int>(pi);  // Conversion de double vers int
    cout << "Pi en entier: " << pi_int << endl;  // Affiche 3
    return 0;
}
```

### Explication :

static_cast<int>(pi) convertit le double en int en éliminant la partie décimale.

### b. Conversion entre types dérivés et de base :

```cpp
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
    animal_ptr->speak();  // Appelle la méthode de la classe Chien
    return 0;
}
```

### Explication :

static_cast convertit un Chien* en Animal*. Conversion valide car Chien hérite de Animal.

### c. Conversion entre types de pointeurs :

```cpp
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
```

## 5. Limites du static_cast :

❌ Pas de conversion entre types incompatibles.
Exemple : impossible de convertir directement void* en int* (utiliser reinterpret_cast pour ça).

❌ Pas de vérification d'erreur à l'exécution.
Contrairement à dynamic_cast, le static_cast ne détecte pas les erreurs de conversion à l'exécution.

## 6. Comparaison avec d'autres casts :

dynamic_cast : Pour les conversions dans une hiérarchie polymorphique (avec fonctions virtuelles). Vérifié à l'exécution.

const_cast : Pour ajouter ou retirer le qualificatif const.

reinterpret_cast : Pour les conversions brutes (pointeurs totalement différents). Aucune vérification.