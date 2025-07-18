 # `this`

## 1/ Introduction à `this` :
-----------------------

En C++, `this` est un **pointeur implicite** disponible dans toutes les **méthodes non statiques** d'une classe.  
Il pointe vers l'**instance courante** de l'objet qui appelle la méthode en cours d'exécution.

### Utilités principales :

- Éviter toute confusion entre **variables membres** et **paramètres** de méthode.  
- Permettre l'**enchaînement des appels de méthodes** (*method chaining*).  

---

## 2/ Utilisation de `this` :
-----------------------

Le pointeur `this` est accessible uniquement dans les **méthodes non statiques** d'une classe.

### Exemple :
```cpp
#include <iostream>

class Warrior {
private:
    int pv;

public:
    Warrior(int value) {
        this->pv = value; // Utilisation de `this` pour distinguer la variable membre du paramètre
    }

    void printpv() {
        std::cout << "pv : " << this->pv << std::endl;
    }
};

int main() {
    Warrior Maya(42);
    Maya.printpv();
    return 0;
}
```

#### Dans cet exemple :

this->pv fait référence à l'attribut pv de l'objet courant.

Cela permet d’éviter toute ambiguïté entre l’attribut pv et le paramètre value du constructeur.