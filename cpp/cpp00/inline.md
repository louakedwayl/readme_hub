# inline en C++

---

## 1. Introduction

Le mot-clé `inline` suggère au compilateur d’insérer directement le code de la fonction à l’endroit de son appel, au lieu de faire un appel classique.  
Cela réduit le **coût d’appel** (push/pop pile, saut d’instruction), utile surtout pour des fonctions courtes et très appelées.

---

## 2. Objectifs et fonctionnement

- **Optimisation** : réduire l’overhead des appels de fonction.  
- **Suggestion au compilateur** : le compilateur décide finalement lui-même d’inliner ou pas, même sans le mot-clé.  
- **Définition dans les headers** : permet de définir des fonctions dans des fichiers `.h` sans provoquer d’erreurs de redéfinition au linkage.

---

## 3. Syntaxe et exemple

```cpp
#include <iostream>

using namespace std;

// Fonction inline qui calcule le carré d’un nombre
inline int carre(int x) {
    return x * x;
}

int main() {
    int nombre = 5;
    cout << "Le carré de " << nombre << " est : " << carre(nombre) << endl;
    return 0;
}
```
Ici, l’appel carre(nombre) peut être remplacé directement par nombre * nombre par le compilateur.

    Note : pas besoin d’inline pour les fonctions membres définies dans une classe dans un header, elles sont inline automatiquement.

## 4. Conclusion

    Une fonction définie dans un header en dehors d’une classe doit être précédée de inline pour éviter les erreurs de linkage.

    Une fonction définie dans une classe est automatiquement inline, pas besoin de le préciser.

