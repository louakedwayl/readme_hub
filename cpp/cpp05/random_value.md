# Génération de nombres aléatoires en C++ (C++98)

---

## 1 À quoi servent `rand()` et `srand()` ? :

- **`rand()`** : génère un **nombre pseudo-aléatoire**.  
- **`srand(unsigned int seed)`** : initialise le générateur aléatoire avec une **graine** (*seed*).  
  > Sans `srand()`, `rand()` produit **toujours la même séquence** à chaque exécution.

---

## 2 Initialisation correcte :

Utiliser l’**heure du système** pour rendre les résultats imprévisibles :

```cpp
#include <cstdlib> // rand(), srand()
#include <ctime>   // time()

srand(time(NULL)); // à placer UNE SEULE FOIS, dans le main()
```

## 3 Exemples d'utilisation :
```cpp
#include <iostream>
#include <cstdlib>
#include <ctime>

int main() 
{
    srand(time(NULL)); // initialisation
    int nombre = rand(); // valeur pseudo-aléatoire
    std::cout << "Nombre aléatoire : " << nombre << std::endl;
    return 0;
}
```

## 4 Générer des valeurs spécifiques :

| Objectif                   | Code                                   |
|----------------------------|---------------------------------------|
| 0 ou 1 (*pile ou face*)    | `rand() % 2`                          |
| 1 à 6 (*dé à 6 faces*)     | `rand() % 6 + 1`                      |
| 0 à 99                     | `rand() % 100`                        |
| min à max (ex : 5 à 15)    | `rand() % (max - min + 1) + min`      |

