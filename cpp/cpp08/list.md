# `std::list` en C++

## 1/ Définition :

`std::list` fait partie de la bibliothèque standard C++ et est une **implémentation de la liste doublement chaînée**.  
Contrairement à `std::vector` (basé sur un tableau dynamique), `std::list` permet des **insertions et suppressions rapides**  
d'éléments **à n'importe quel endroit** de la liste, mais **l'accès aux éléments est plus lent** car il nécessite un parcours séquentiel.

---

## 2/ Déclaration et initialisation :
Pour utiliser `std::list` :
```cpp
#include <list>
std::list<int> maListe;                  // Liste vide d'entiers
std::list<int> maListe2 = {1, 2, 3, 4};  // Liste initialisée avec des éléments
```

## 3/ Opérations de base :

### a. Insertion d'éléments :

À la fin :

maListe.push_back(5);   // Ajoute 5 à la fin

Au début :

maListe.push_front(0);  // Ajoute 0 au début

### b. Suppression d'éléments :

À la fin :

maListe.pop_back();  // Supprime le dernier élément

Au début :

maListe.pop_front(); // Supprime le premier élément

D'un élément spécifique :

maListe.remove(3);   // Supprime toutes les occurrences de 3

### c. Accès aux éléments :

std::list n’a pas d’opérateur [] (pas d’accès par index).
Il faut utiliser un itérateur :

std::list<int>::iterator it = maListe.begin();
std::cout << *it << std::endl;  // Affiche le premier élément

## d. Itérateurs :

Début et fin :

```cpp
for (std::list<int>::iterator it = maListe.begin(); it != maListe.end(); ++it)
std::cout << *it << " ";
```

Pas de at() : car les éléments ne sont pas indexés de manière contiguë.

## e. Vider la liste :

```cpp
maListe.clear();  // Supprime tous les éléments
```

## 4/ Performances et caractéristiques :

Insertion / suppression : Très rapides O(1) (modification des pointeurs).

Accès direct : Lent (O(n)). Si besoin d’accès rapide → préférer std::vector ou std::deque.

Mémoire : Chaque élément stocke 2 pointeurs (précédent et suivant) → plus coûteux qu’un std::vector.

## 5/ Exemple complet :

```cpp
#include <iostream>
#include <list>

int main()
{
    std::list<int> maListe = {1, 2, 3, 4};

    std::cout << "Liste avant modification: ";
    for (int elem : maListe) std::cout << elem << " ";
    std::cout << std::endl;

    maListe.push_front(0);  // Ajoute 0 au début
    maListe.push_back(5);   // Ajoute 5 à la fin
    maListe.remove(3);      // Supprime toutes les occurrences de 3

    std::cout << "Liste après modification: ";
    for (int elem : maListe) std::cout << elem << " ";
    std::cout << std::endl;

    return 0;
}
```

## 6/ Résumé :

std::list = liste doublement chaînée.

Insertions / suppressions rapides, mais accès séquentiel (pas d’accès direct par index).

Idéale si : nombreuses insertions/suppressions sans besoin d'accès rapide par index.

Utilisation via itérateurs pour accéder et manipuler les éléments.