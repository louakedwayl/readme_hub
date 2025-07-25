# Dynamic Cast

## Cours sur `dynamic_cast` en C++ :

En C++, **`dynamic_cast`** est un opérateur utilisé pour effectuer un **cast dynamique**, principalement dans les situations où vous travaillez avec des **hiérarchies de classes polymorphiques** (c’est-à-dire, des classes qui contiennent au moins une fonction virtuelle).

Il permet de faire une **conversion sécurisée** entre types dérivés et types de base.  
Cela évite les erreurs lors de la conversion et garantit que le type cible est bien celui attendu.

---

## 1 Contexte et but de `dynamic_cast` :

Le polymorphisme permet à une fonction ou à un objet de se comporter différemment selon le type réel de l'objet.  
Cependant, lors de l’utilisation de **pointeurs ou références vers un type de base**, il peut être nécessaire de vérifier dynamiquement si un objet est bien du type dérivé attendu.

**`dynamic_cast`** permet de **vérifier dynamiquement** (à l’exécution) si la conversion est valide.

---

## 2 Syntaxe de `dynamic_cast` :

```cpp
dynamic_cast<new_type>(expression)
```

new_type : le type vers lequel on souhaite convertir.

expression : un pointeur ou une référence vers un objet.

### Deux utilisations principales :

Avec des pointeurs : dynamic_cast<Type*>(ptr)

Avec des références : dynamic_cast<Type&>(ref)

## 3 Fonctionnement :

### Cas 1 : Cast entre pointeurs

Si la conversion réussit → retourne un pointeur vers le type demandé.

Si la conversion échoue → retourne nullptr.

### Cas 2 : Cast entre références

Si la conversion échoue → lance une exception std::bad_cast.

## 4 Conditions pour utiliser dynamic_cast :

Polymorphisme : La classe de base doit contenir au moins une méthode virtuelle (ex : destructeur virtuel).

Sécurité d’exécution : Contrairement à static_cast, dynamic_cast vérifie le type réel à l'exécution avant de faire la conversion.

## 5 Exemple de dynamic_cast :

```cpp
#include <iostream>

class Animal 
{
public:
    virtual void parler() { std::cout << "L'animal fait un bruit." << std::endl; }
    virtual ~Animal() {}  // Destructeur virtuel
};

class Chien : public Animal {
public:
    void parler() override { std::cout << "Le chien aboie." << std::endl; }
};

class Chat : public Animal 
{
public:
    void parler() override { std::cout << "Le chat miaule." << std::endl; }
};

int main() 
{
    Animal* animal = new Chien();  // Un objet de type Chien

    Chien* chien = dynamic_cast<Chien*>(animal);  // Cast valide
    if (chien) 
    {
        chien->parler();  // Affiche "Le chien aboie."
    } 
    else 
    {
        std::cout << "Le cast a échoué." << std::endl;
    }

    Chat* chat = dynamic_cast<Chat*>(animal);  // Cast invalide
    if (chat) 
    {
        chat->parler();
    } 
    else 
    {
        std::cout << "Le cast a échoué." << std::endl;  // Affiche "Le cast a échoué."
    }

    delete animal;
    return 0;
}
```

### En résumé :

dynamic_cast permet de vérifier dynamiquement les conversions entre types dans une hiérarchie polymorphique.

Avec pointeurs → retourne nullptr si le cast échoue.

Avec références → lance une exception std::bad_cast si le cast échoue.