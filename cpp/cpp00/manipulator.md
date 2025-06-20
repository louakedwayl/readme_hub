# Manipulateurs en C++

---

## Introduction

Les **manipulateurs** sont des fonctions qui contrôlent la mise en forme des flux d'entrée/sortie (`std::cin`, `std::cout`).  
Ils améliorent la lisibilité des données affichées ou lues.

---

## Manipulateurs courants (sans arguments)

- **`endl`** :  
Insère un retour à la ligne **et vide** le tampon de sortie.

  ```cpp
std::cout << "Bonjour" << std::endl;
  ```
    flush
Vide immédiatement le tampon de sortie (sans saut de ligne).
```cpp
std::cout << "Texte affiché immédiatement" << std::flush;
```
    ws
Ignore les espaces blancs au début de l’entrée (utile avec std::cin).
```cpp
std::string nom;
std::cin >> std::ws >> nom;
```
