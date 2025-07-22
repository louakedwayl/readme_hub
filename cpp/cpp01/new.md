# Le mot-clé `new` en C++

---

En C++, `new` est un opérateur qui permet d'allouer dynamiquement de la mémoire sur le tas (*heap*).  
Il est souvent utilisé pour créer des objets ou des tableaux dont la taille n'est pas connue à la compilation.

---

## 1. Allocation dynamique d’une variable

### Syntaxe de base

```cpp
#include <iostream>

int main()
{
    int* p = new int; // Alloue un entier sur le tas
    *p = 42; // Assigne une valeur

    std::cout << "Valeur de p : " << *p << std::endl;

    delete p; // Libère la mémoire
    return 0;
}
```
### Explication

new int alloue un espace mémoire pour un int.

p est un pointeur qui stocke l'adresse de cet entier.

delete p libère la mémoire pour éviter une fuite de mémoire.

## 2. Allocation dynamique avec initialisation

Il est possible d'initialiser la mémoire allouée directement :
```cpp
int* p = new int(100); // Alloue et initialise à 100
std::cout << *p << std::endl; // Affiche 100
delete p;
```
## 3. Allocation dynamique d’un tableau

Pour allouer un tableau dynamiquement, on utilise :
```cpp
type* ptr = new type[taille];
```
Exemple : allocation d'un tableau de 5 entiers

```cpp
#include <iostream>

int main() 
{
    int* tab = new int[5]; // Alloue un tableau de 5 entiers

    for (int i = 0; i < 5; i++) {
        tab[i] = i * 10; // Initialisation
    }

    for (int i = 0; i < 5; i++) {
        std::cout << "tab[" << i << "] = " << tab[i] << std::endl;
    }

    delete[] tab; // Libère la mémoire
    return 0;
}
```cpp

⚠️ Attention : Pour libérer un tableau, il faut utiliser delete[] au lieu de delete.

