# delete

## 1. Introduction

En C++, la gestion dynamique de la mémoire est essentielle pour optimiser l'utilisation des ressources. L'opérateur `delete` est utilisé pour libérer la mémoire allouée dynamiquement avec `new`, évitant ainsi les fuites de mémoire.

## 2. Utilisation de `delete`

L'opérateur `delete` permet de désallouer la mémoire allouée à un objet unique, tandis que `delete[]` est utilisé pour désallouer un tableau d'objets alloué dynamiquement.

### a. Suppression d'un objet unique

Lorsqu'un objet est alloué avec `new`, il doit être libéré avec `delete` :

```cpp
#include <iostream>

class Exemple {
public:
    Exemple() { std::cout << "Constructeur appelé" << std::endl; }
    ~Exemple() { std::cout << "Destructeur appelé" << std::endl; }
};

int main() {
    Exemple* ptr = new Exemple();
    delete ptr; // Libère la mémoire
    return 0;
}
```

### b. Suppression d'un tableau d'objets

Si un tableau est alloué dynamiquement avec new[], il doit être libéré avec delete[] :
```cpp
#include <iostream>

int main() {
    int* tableau = new int[5]; // Allocation d'un tableau de 5 entiers
    delete[] tableau; // Désallocation correcte
    return 0;
}
```
## 3. Erreurs courantes
### a. Oublier d'utiliser delete

Ne pas libérer la mémoire allouée dynamiquement peut entraîner des fuites de mémoire.
### b. Double suppression

Essayer de libérer la mémoire deux fois entraîne un comportement indéfini :
```cpp
int* ptr = new int(10);
delete ptr;
delete ptr; // Erreur : suppression double
```
### c Supprimer un pointeur non valide

Si un pointeur a déjà été supprimé ou pointe vers une adresse invalide, son utilisation après delete peut provoquer des erreurs.
Toujours affecter nullptr à un pointeur après delete pour éviter les accès indéfinis :
```cpp
int* ptr = new int(10);
delete ptr;
ptr = nullptr; // Évite les accès indéfinis
```
## 4. Bonnes pratiques

Utiliser std::unique_ptr ou std::shared_ptr de la bibliothèque standard C++ pour une gestion automatique de la mémoire.

## 5. Conclusion

L'opérateur delete est essentiel pour la gestion de la mémoire en C++. Il doit être utilisé correctement pour éviter les fuites et autres erreurs. L'utilisation de pointeurs intelligents (std::unique_ptr, std::shared_ptr) est recommandée pour simplifier la gestion mémoire et réduire les erreurs potentielles.
