# Pointeurs en C++

## 1/ Introduction aux pointeurs en C++ :
-------------------------------------

En C++, un pointeur est une variable qui contient l’adresse mémoire d’un autre objet ou d’une instance 
d’une classe. Les pointeurs sont particulièrement utiles en POO pour :

- Gérer la mémoire dynamique.  
- Créer des structures de données flexibles (listes, arbres, etc.).  
- Permettre le polymorphisme via des pointeurs vers des classes de base.

---

## 2/ Déclaration et utilisation de pointeurs sur instances :
----------------------------------------------------------

Un pointeur sur instance est un pointeur qui pointe vers une instance (un objet) d’une classe.  
En d'autres termes, il permet d'accéder à un objet spécifique.

### Déclaration :

```cpp
NomClasse* pointeur;
```

#### Exemple :

```cpp
class Warrior 
{
public:
    std::string name;
    int age;

    void print_name() { std::cout << name << std::endl; }
};

int main() {
    Warrior* w = new Warrior;  // Déclaration d'un pointeur vers une instance de Warrior
    w->name = "Conan";         // Accès à l'attribut name via le pointeur
    w->age = 35;               // Accès à l'attribut age via le pointeur
    w->print_name();           // Appel de la méthode print_name() via le pointeur

    delete w;                  // Libération de la mémoire allouée
    w = nullptr;               // Mise à nullptr pour éviter un pointeur pendu

    return 0;
}
```

### Explication :

```cpp
Warrior* w = new Warrior; : Déclaration et allocation dynamique d'une instance de Warrior.

w->name, w->age : Accès aux membres via ->.

delete w; : Libération de la mémoire.
```

## 3/ Pointeur sur membre :

Un pointeur sur membre est un pointeur qui pointe vers un membre spécifique d’une classe
(qu’il soit un attribut ou une méthode). Il nécessite une instance pour être utilisé.

##### Syntaxe :

```cpp
type NomClasse::*pointeur;
```

#### Exemple : pointeur sur un attribut

```cpp
#include <iostream>

class Sample {
public:
    int value;
};

int main() 
{
    int Sample::*p = nullptr;

    Sample obj;
    obj.value = 42;

    p = &Sample::value;

    std::cout << "Valeur de obj.value : " << obj.*p << std::endl;

    return 0;
}
```

#### Exemple : pointeur sur une méthode
```cpp
class Sample 
{
public:
    void print() {
        std::cout << "Hello from Sample!" << std::endl;
    }
};

int main() 
{
    void (Sample::*ptr)() = &Sample::print;

    Sample obj;
    (obj.*ptr)();  // Appel de la méthode via le pointeur

    return 0;
}
```

### 4/ Différence entre pointeur sur instance et pointeur sur membre :

| **Critère**               | **Pointeur sur Instance**                 | **Pointeur sur Membre**                |
|---------------------------|-------------------------------------------|----------------------------------------|
| **Définition**            | Pointeur vers une instance d'une classe.  | Pointeur vers un membre d'une classe.  |
| **Type de cible**         | L'objet entier (instance).                | Un attribut ou une méthode.            |
| **Accès aux membres**     | Utilise `->`.                             | Utilise `.*`.                          |
| **Besoin d'une instance** | Oui, pour l'objet entier.                 | Oui, pour accéder au membre.           |
| **Exemple d'utilisation** | Manipuler l'objet complet.                | Accéder ou manipuler un membre précis. |

