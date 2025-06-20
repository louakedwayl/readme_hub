# const en C++

---

## 1. Introduction

Le mot-clé `const` permet de déclarer des éléments dont la valeur **ne peut pas être modifiée après initialisation**.  
Cela protège les données et rend le code plus sûr et lisible.

---

## 2. Variables constantes

Déclarer une variable avec `const` signifie qu’elle **ne pourra jamais changer de valeur**.

### Exemple

```cpp
#include <iostream>

int main() 
{
    const int nombre = 10;  // 'nombre' est constant
    std::cout << "Nombre : " << nombre << std::endl;

    // nombre = 20;  // Erreur : modification interdite
    return 0;
}
```

## 3. const et les pointeurs

On distingue deux niveaux de constance :

    Constance de haut niveau (top-level const) : s'applique à la variable elle-même.

    Constance de bas niveau (low-level const) : s'applique à la valeur pointée ou référencée.

## 3.1 Pointeur vers une valeur constante

Le pointeur peut changer d’adresse, mais la valeur pointée ne peut pas être modifiée via ce pointeur.
```cpp
int x = 5, y = 10;
const int* ptr = &x;  // 'ptr' pointe vers un int constant
```
```cpp
// *ptr = 7;         // Erreur : modification interdite via ptr
ptr = &y;             // OK : ptr peut pointer ailleurs
```
## 3.2 Pointeur constant

L’adresse stockée dans le pointeur est fixe, mais la valeur pointée peut être modifiée.
```cpp
int x = 5, y = 10;
int* const ptr = &x;  // 'ptr' est constant, toujours sur x
*ptr = 7;             // OK : modification de la valeur pointée

// ptr = &y;         // Erreur : impossible de changer l'adresse
```
## 3.3 Pointeur constant vers une valeur constante

Ni la valeur pointée ni l’adresse ne peuvent être modifiées.
```cpp
int x = 5;
const int* const ptr = &x;  // ptr constant vers valeur constante

// *ptr = 7;                // Erreur : modification interdite
// ptr = &y;                // Erreur : changement d'adresse interdit
```
## 4. const dans les fonctions
## 4.1 Paramètres constants

Déclarer un paramètre const garantit que la fonction ne modifie pas la valeur passée.
Utile surtout pour les objets ou pour éviter la copie de grosses structures.
```cpp
void afficher(const int valeur) 
{
    // valeur = 5;  // Erreur : valeur constante
    std::cout << "Valeur : " << valeur << std::endl;
}
```
## 4.2 Méthodes constantes dans une classe

Déclarer une méthode membre avec le suffixe const garantit qu’elle n’altère pas l’état de l’objet.
Le compilateur vérifie qu’aucun membre non mutable n’est modifié.
```cpp
class Point 
{
private:
    int x, y;
public:
    Point(int x_val, int y_val) : x(x_val), y(y_val) {}

    // Méthode constante : ne modifie pas l'objet
    void afficher() const {
        std::cout << "Point(" << x << ", " << y << ")" << std::endl;
    }

    // Méthode non constante : modifie l'objet
    void deplacer(int dx, int dy) {
        x += dx;
        y += dy;
    }
};

int main() {
    Point p(1, 2);
    p.afficher();
    // p.deplacer(3, 4); // Modifie p
    return 0;
}
```