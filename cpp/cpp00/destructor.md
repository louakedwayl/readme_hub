# Destructeur en C++

---

## 1. Définition d'un destructeur

Un destructeur est une méthode spéciale d'une classe, appelée **automatiquement** lorsque l'objet est détruit.  
Son rôle principal est de **libérer les ressources allouées dynamiquement** avant la destruction.

---

## 2. Définition d'un destructeur

- A le même nom que la classe, précédé d’un tilde `~`.
- Ne prend aucun paramètre.
- Ne retourne aucune valeur.

### Syntaxe générale

```cpp
class NomClasse {
public:
    ~NomClasse(); // déclaration du destructeur
};
```
## 3. Fonctionnement

Le destructeur est appelé automatiquement lorsque :

    L'objet sort de sa portée (fin d’un bloc).

    L'objet est supprimé explicitement avec delete.

## 4. Exemple
```cpp
#include <iostream>
using namespace std;

class Warrior {
public:
    Warrior() {
        cout << "Constructeur appelé" << endl;
    }
    
    ~Warrior() {
        cout << "Destructeur appelé" << endl;
    }
};

int main() 
{
    Warrior Maya;  // création de l’objet
    return 0;      // destructeur appelé à la fin du programme
}
```
## 5. Utilité des destructeurs

Le destructeur sert principalement à :

    Libérer la mémoire dynamique (delete sur des pointeurs).

    Fermer des fichiers ouverts.

    Libérer des ressources système (sockets, connexions réseau, etc.).