# La suite de Jacobsthal

## C'est quoi la suite de Jacobsthal ?
La suite de Jacobsthal est une série de nombres qui suivent une règle simple :  
Chaque nombre dans la suite est basé sur les deux précédents.

\[
J_n = J_{n-1} + 2 \times J_{n-2}
\]

---

## La règle pour créer la suite :
- **Premier nombre** : \( J_0 = 0 \)  
- **Deuxième nombre** : \( J_1 = 1 \)  
- **Ensuite** : Chaque nombre suivant se fait en additionnant le nombre juste avant et en doublant le nombre encore avant.  

**Exemple :**
- \( J_2 = 1 + 2 \times 0 = 1 \)  
- \( J_3 = 1 + 2 \times 1 = 3 \)  

Et ainsi de suite…

---

## Voici les premiers nombres de la suite :

J0 = 0
J1 = 1
J2 = 1
J3 = 3
J4 = 5
J5 = 11
J6 = 21
J7 = 43


Chaque nombre est créé à partir des deux nombres précédents !

---

## Une autre façon de calculer ?
Il existe une formule mathématique plus rapide pour trouver directement \( J_n \) sans calculer toute la suite,  
mais pour simplifier, on reste sur la règle récursive (addition et double).

---

## Exemple simple avec un programme C++ :
Voici un programme qui calcule les premiers nombres de la suite :

```cpp
#include <iostream>

int jacobsthal(int n) 
{
    if (n == 0) return 0;   // Premier nombre
    if (n == 1) return 1;   // Deuxième nombre
    return jacobsthal(n - 1) + 2 * jacobsthal(n - 2);   // Règle de calcul
}

int main() 
{
    for (int i = 0; i <= 10; ++i)   // Affiche les 10 premiers nombres
        std::cout << "J_" << i << " = " << jacobsthal(i) << std::endl;
    return 0;
}
```

### À quoi ça sert ?

La suite de Jacobsthal est utilisée dans :

Les algorithmes informatiques

Les théories de graphes

La sécurité informatique

### Résumé simple :

On commence par 0 et 1.

Chaque nouveau nombre est la somme du précédent et du double de l’avant-dernier.

Exemple : 0, 1, 1, 3, 5, 11, 21, 43…