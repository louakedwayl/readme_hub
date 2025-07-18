# Méthodes statiques

## 1/ Définition :
---------------

Les méthodes statiques sont des fonctions déclarées au sein d'une classe 
avec le mot-clé `static`. Contrairement aux méthodes non statiques, elles :

1. Appartiennent à la classe elle-même et non à une instance particulière.  
2. Ne disposent pas de pointeur `this` puisqu'elles ne traitent pas d'un objet en particulier.  
3. Ne peuvent accéder directement qu'aux membres **statiques** (attributs ou méthodes) de la classe.

---

## 2/ Absence du pointeur `this` :
-----------------------------

### 2.1/ Limitation d'accès :
-----------------------

Puisqu'une méthode statique ne possède pas de `this`, elle ne peut pas accéder  
aux membres **non statiques** de la classe (données propres à une instance).

### 2.2/ Utilisation pour des opérations globales :
---------------------------------------------

Elle est idéale pour des fonctions utilitaires ou pour opérer sur des attributs statiques  
qui représentent l'état global ou commun à toutes les instances.

---

## 3/ Syntaxe et exemples :
------------------------

### 3.1 Déclaration dans la classe :
--------------------------------

Pour déclarer une méthode statique, on utilise le mot-clé `static` :

```cpp
class Utilitaire 
{
public:
    static void afficherMessage() {
        std::cout << "Ceci est une méthode statique !" << std::endl;
    }
};
```

### 3.2 Appel de la méthode statique :

Comme elle appartient à la classe, on l'appelle en utilisant l'opérateur :: :
```cpp
#include <iostream>

int main() 
{
    // Appel sans instanciation
    Utilitaire::afficherMessage();
    return 0;
}
```
## 3.3 Exemple avec accès à un attribut statique :

Les méthodes statiques sont souvent utilisées pour manipuler des données statiques
partagées par toutes les instances.
```cpp
#include <iostream>

class Compteur 
{
public:
    static int nbInstances;

    Compteur() {
        nbInstances++; // Chaque création d'objet incrémente le compteur
    }

    // Méthode statique pour afficher le nombre d'instances
    static void afficherNbInstances() {
        std::cout << "Nombre d'instances créées : " << nbInstances << std::endl;
    }
};

// Définition de l'attribut statique en dehors de la classe
int Compteur::nbInstances = 0;

int main() 
{
    Compteur::afficherNbInstances(); // Affiche 0
    Compteur obj1;
    Compteur obj2;
    Compteur::afficherNbInstances(); // Affiche 2
    return 0;
}
```

Dans cet exemple, la méthode afficherNbInstances() est statique et peut accéder
à l'attribut statique nbInstances pour afficher le nombre d'instances créées.