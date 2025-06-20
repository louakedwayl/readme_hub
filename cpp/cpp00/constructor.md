# Constructor en C++

---

## 1. Introduction

En C++, les **constructeurs** sont des fonctions membres spéciales qui gèrent la création des objets d'une classe.  
Ils sont **appelés automatiquement** lors de l'instanciation d'un objet.  
Leur rôle principal : **initialiser les attributs** de l'objet.

---

### Caractéristiques des constructeurs

- **Nom identique à la classe** : le constructeur porte le même nom que la classe.
- **Pas de type de retour** : contrairement aux fonctions classiques, il ne retourne rien, même pas `void`.
- **Appel automatique** : appelé dès la création d’un objet.
- **Surcharge possible** : une classe peut avoir plusieurs constructeurs avec différents paramètres.

---

## 2. Constructeur non défini

Si aucun constructeur n’est défini, le compilateur génère un **constructeur par défaut** automatiquement.

Ce constructeur :

- Ne fait rien de spécial.
- Initialise les membres avec des valeurs par défaut (`0` pour les numériques, constructeur par défaut pour les objets).

### Exemple sans constructeur défini

```cpp
class Warrior 
{
private:
    std::string name;
    int pv;
    int mana;
};
```
Le compilateur crée automatiquement :
```cpp
Warrior() : name(""), pv(0), mana(0) {}
```
Donc :
```cpp
Warrior w1;  // w1.name == "", w1.pv == 0, w1.mana == 0
```
## 3. Constructeur par défaut

Dès qu’un constructeur est défini explicitement dans la classe, le compilateur ne génère plus de constructeur par défaut automatique.

Un constructeur par défaut est un constructeur qui prend zéro argument ou dont tous les arguments ont des valeurs par défaut.
Utilité

Permet d'initialiser un objet avec des valeurs par défaut sans fournir d’arguments.
Exemple
```cpp
class Warrior 
{
private:
    std::string name;
    int pv;
    int mana;

public:
    // Constructeur par défaut
    Warrior() : name("Unknown"), pv(100), mana(50) {
        std::cout << "Constructeur par défaut de Warrior appelé" << std::endl;
    }
};
```
## 4. Constructeur paramétré

Permet d'initialiser un objet avec des valeurs spécifiques au moment de la création.
Exemple
```cpp
class Point {
public:
    int x, y;

    // Constructeur paramétré
    Point(int x_val, int y_val) : x(x_val), y(y_val) { }
};

int main() {
    Point p(10, 20);  // p.x == 10, p.y == 20
}
``