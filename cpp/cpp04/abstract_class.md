# Classe abstraite

## Définition :

Une **classe abstraite** est une classe qui **ne peut pas être instanciée directement**.  
Elle sert à **modéliser un comportement commun** pour d'autres classes, mais elle laisse certains détails à définir 
dans les sous-classes.

En C++, une classe devient **abstraite** dès qu’elle contient **au moins une méthode virtuelle pure**.

---

## Elle peut contenir :
- Des **méthodes abstraites** (sans implémentation)  
- Des **méthodes concrètes** (avec du code)  
- Des **attributs**, comme une classe normale  

⚠️ Elle est utilisée pour définir un **comportement générique**, que ses sous-classes devront **compléter ou spécialiser**.

---

## Exemple de méthode virtuelle pure :
```cpp
virtual void makeSound() = 0;

En C++, une méthode virtuelle pure (pure virtual function) est une méthode déclarée dans une classe mais sans implémentation,
et qui est égale à 0 (= 0).
Cela indique au compilateur que les classes dérivées devront obligatoirement l’implémenter.
Exemple de classe abstraite :

class Animal 
{
public:
    virtual void makeSound() = 0; // Méthode virtuelle pure
};
```