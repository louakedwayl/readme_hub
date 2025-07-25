# `clock()`, `clock_t` et `CLOCKS_PER_SEC` (C++)

## Objectif :
Mesurer le **temps d'exécution d’un bloc de code** (**CPU time**) en **microsecondes** ou **secondes**.

---

## 1/ Les éléments à connaître :

### `clock_t`
- Type défini dans `<ctime>`.
- Sert à stocker le nombre de **ticks CPU** (unités de temps processeur).

### `clock()`
- Fonction qui retourne le nombre de **ticks CPU** écoulés depuis le début du programme.
- Prototype :  
```cpp
  clock_t clock();
```

Retourne un entier représentant des ticks.

### CLOCKS_PER_SEC

Constante définie dans <ctime>.

Indique le nombre de ticks par seconde.

Utilisée pour convertir des ticks en secondes.

### 2/ Formule de conversion :

Pour obtenir la durée en secondes :

double seconds = (double)(end - start) / CLOCKS_PER_SEC;

Pour obtenir la durée en microsecondes :

double microseconds = (double)(end - start) / CLOCKS_PER_SEC * 1e6;

## 3/ Exemple complet :

```cpp
#include <iostream>
#include <ctime>
#include <vector>
#include <algorithm>

int main() 
{
    std::vector<int> vec = {5, 2, 9, 1, 3};

    clock_t start = clock();  // début de mesure

    std::sort(vec.begin(), vec.end());  // opération à mesurer

    clock_t end = clock();  // fin de mesure

    double durationMicro = (double)(end - start) / CLOCKS_PER_SEC * 1e6;

    std::cout << "Tri effectué en : " << durationMicro << " microsecondes" << std::endl;

    return 0;
}
```

### Résumé :

| Élément           | Description                                          |
|-------------------|------------------------------------------------------|
| `clock()`         | Donne le temps CPU actuel en **ticks**               |
| `clock_t`         | Type pour stocker la valeur de `clock`               |
| `CLOCKS_PER_SEC`  | Nombre de ticks par seconde (souvent **1 000 000** sur Linux) |
| **Important**     | Ne donne pas l'heure réelle, mais le **temps CPU utilisé** |
