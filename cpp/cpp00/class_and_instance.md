# Classes et Instances en C++

---

## 1. Introduction aux classes et instances

En C++, une **classe** est un modèle qui définit les **attributs** et **méthodes** d'un objet.  
Une **instance** est un objet **créé à partir de cette classe**.

On peut l'assimiler à un **plan de construction** qui spécifie :

- 🔹 **Les attributs** (*ou données membres*) : variables qui décrivent l'état de l'objet.
- 🔹 **Les méthodes** (*ou fonctions membres*) : fonctions qui définissent les comportements ou opérations réalisables sur l'objet.

---

## Modificateurs d'accès

- `public` : membres accessibles depuis n'importe où.
- `private` : membres accessibles uniquement depuis l'intérieur de la classe.
- `protected` : accessibles dans la classe et ses classes dérivées.

> ℹ️ Par défaut :
> - Dans une `class` : les membres sont `private`.
> - Dans une `struct` : les membres sont `public`.

---

## 2. Définition d'une classe

Une classe se définit à l’aide du mot-clé `class`, suivi de son nom et d’un bloc de définition `{}`.  
Elle peut être définie dans un **fichier header** (`.hpp`) ou directement dans un **fichier source** (`.cpp`).

### Exemple : définition d'une classe `Warrior`

```cpp
class Warrior 
{
private:
    std::string name;
    int pv;
    int mana;
};
```
## 3. Création d’une instance

Pour créer une instance, on utilise le nom de la classe comme type :
```cpp
NomDeLaClasse monObjet;           // Appelle le constructeur par défaut
NomDeLaClasse autreObjet(arg1);   // Si un constructeur avec paramètres est défini
```
Chaque objet possède ses propres copies des attributs définis dans la classe, ce qui permet de manipuler des données indépendantes pour chaque instance.
Exemple : création d'une instance Warrior
```cpp
Warrior w0;
```
