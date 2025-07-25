# Upcast and Downcast 

En C++, les conversions entre types dans une hiérarchie de classes se font via deux concepts clés : **l'upcast** et le **downcast**.  
Ces conversions sont fréquemment utilisées lorsqu’on manipule des classes de base et dérivées dans un contexte **polymorphique**.

---

## 1. Définitions :
- **Upcast** : Conversion **d’un type dérivé vers un type de base**.  
  Un objet dérivé est toujours un objet de sa classe de base. **L'upcast est donc sûr**, automatique et ne nécessite **aucune vérification à l'exécution**.  

- **Downcast** : Conversion **d’un type de base vers un type dérivé**.  
  C’est **risqué**, car un objet de type base peut **ne pas être** un objet du type dérivé.  
  Cela nécessite souvent une **vérification dynamique** à l’aide de `dynamic_cast`.

---

## 2. Upcast :
L'**upcast** se produit lorsque vous convertissez un objet d'une **classe dérivée** en un **pointeur ou une référence à la classe de base**.  
C’est toujours **valide** car chaque objet dérivé est aussi un objet de la classe de base.  

### Exemple d'Upcast :

```cpp
#include <iostream>
class Animal 
{
public:
    virtual void parler() { std::cout << "L'animal fait un bruit." << std::endl; }
    virtual ~Animal() {}
};

class Chien : public Animal 
{
public:
    void parler() override { std::cout << "Le chien aboie." << std::endl; }
};

int main() 
{
    Chien chien;                // Un objet Chien
    Animal* animal = &chien;    // Upcast automatique vers Animal*
    animal->parler();           // Affiche "Le chien aboie."
    return 0;
}
```

### Explication :

L’objet chien (de type Chien) est automatiquement upcasté en pointeur vers Animal.
Cette conversion est sûre et automatique.

## 3 Qu'est-ce qu'un Downcast ?

Un downcast est la conversion d’un type de base vers un type dérivé.
Cette opération est potentiellement dangereuse, car le type de base peut ne pas être celui du dérivé ciblé.
Caractéristiques du Downcast :

Peut échouer : Si l’objet de base n’est pas réellement du type dérivé.

Nécessite une vérification dynamique : L’utilisation de dynamic_cast est fortement conseillée (pour pointeurs et références).

Souvent utilisé dans des hiérarchies polymorphiques pour accéder aux fonctionnalités spécifiques d’une classe dérivée.

### Exemple de Downcast avec dynamic_cast :

```cpp
#include <iostream>

class Animal 
{
public:
    virtual void parler() { std::cout << "L'animal fait un bruit." << std::endl; }
    virtual ~Animal() {}
};

class Chien : public Animal 
{
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
    Animal* animal = new Chien();  // Animal pointe vers un objet Chien

    // Downcast valide
    Chien* chien = dynamic_cast<Chien*>(animal);
    if (chien) {
        chien->parler();  // Affiche "Le chien aboie."
    } else {
        std::cout << "Le cast vers Chien a échoué." << std::endl;
    }

    // Downcast invalide
    Chat* chat = dynamic_cast<Chat*>(animal);
    if (chat) {
        chat->parler();
    } else {
        std::cout << "Le cast vers Chat a échoué." << std::endl;  // Affiche ceci
    }

    delete animal;
    return 0;
}
```

### Explication :

Le premier downcast réussit car animal pointe bien vers un Chien.

Le second downcast échoue car animal ne pointe pas vers un Chat.
Dans ce cas, dynamic_cast<Chat*> renvoie nullptr.

### Conclusion :

Upcast : Automatique et sûr. Conversion dérivé → base.

Downcast : Potentiellement dangereux, utiliser dynamic_cast pour éviter les erreurs.

