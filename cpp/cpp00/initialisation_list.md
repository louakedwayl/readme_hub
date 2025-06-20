# Initialization List en C++

---

## 1. Introduction

En C++, une **liste d'initialisation** dans un constructeur permet d'initialiser directement les membres d'une classe **avant** l'exécution du corps du constructeur.  
Cette méthode est plus efficace que l'affectation dans le corps, surtout pour les **constantes**, les **références** et les objets complexes.

---

## 2. Syntaxe des listes d'initialisation

La liste d'initialisation se place **après la signature du constructeur**, séparée par `:`.

```cpp
class Exemple 
{
private:
    int a;
    double b;
public:
    Exemple(int x, double y) : a{x}, b{y} {
        std::cout << "Constructeur appelé !" << std::endl;
    }
};
```

Ici, a est initialisé avec x et b avec y avant l'exécution du corps du constructeur.
## 3. Pourquoi utiliser une liste d'initialisation ?
### a) Amélioration des performances

Sans liste d'initialisation, les membres sont initialisés par défaut puis réaffectés, ce qui fait un double travail inutile.
Exemple mauvais
```cpp
class MauvaisExemple 
{
private:
    int a;
public:
    MauvaisExemple(int x) {
        a = x;  // Affectation après initialisation par défaut
    }
};
```
Exemple bon
```cpp
class BonExemple 
{
private:
    int a;
public:
    BonExemple(int x) : a{x} {}
};
```
### b) Initialisation des constantes et références

Les membres const et les références doivent être initialisés dans la liste, car ils ne peuvent pas être modifiés après déclaration.
```cpp
class ExempleConstRef 
{
private:
    const int c;
    int& ref;
public:
    ExempleConstRef(int x, int& y) : c{x}, ref{y} {}
};
```