# `std::string`

## 1/ Introduction à `std::string` :
-------------------------------

`std::string` est une classe de la bibliothèque standard C++ qui encapsule un tableau dynamique 
de caractères (`char*` en interne). Elle offre une gestion automatique de la mémoire et fournit diverses 
fonctionnalités pour manipuler des chaînes de caractères plus facilement qu'avec des `char*`.

### Avantages :
1. **Gestion automatique de la mémoire** : La taille de la chaîne s’ajuste dynamiquement selon le contenu.  
2. **Fonctions membres riches** : Méthodes pour modification, recherche, comparaison, conversion, etc.  
3. **Sécurité et simplicité** : Moins de risques d’erreurs comme les dépassements de tampon.

---

## 2/ Déclaration, Construction et Initialisation :
------------------------------------------------

#### 2.1 Inclusion et Déclaration :
```cpp
#include <iostream>
#include <string>

int main() {
    std::string str = "Hello while";
    std::cout << str << std::endl;
    return 0;
}
```
#### 2.2 Constructeurs :
```cpp
// 1. Constructeur par défaut : chaîne vide
std::string s1;

// 2. À partir d’un littéral C
std::string s2("Hello While"); 
std::string s2_alt = "Hello While";

// 3. Constructeur de copie
std::string s3(s2);

// 4. Répétition d’un caractère
std::string s4(10, '*');  // "**********"
```

#### 2.3 Opérations et Fonctions Membres :

| **Fonction**         | **Description**                                                   |
|----------------------|--------------------------------------------------------------------|
| `size()` / `length()`| Renvoie le nombre de caractères.                                  |
| `empty()`            | Vérifie si la chaîne est vide.                                    |
| `operator[]` / `at()`| Accès à un caractère par indice (`at()` vérifie les bornes).       |
| `append()` / `+=`    | Ajoute du contenu à la fin de la chaîne.                          |
| `insert()`           | Insère une sous-chaîne à une position donnée.                     |
| `erase()`            | Supprime une partie de la chaîne.                                 |
| `replace()`          | Remplace une portion par une autre chaîne.                        |
| `clear()`            | Vide complètement la chaîne.                                      |
| `find()`             | Recherche la position d'une sous-chaîne ou d’un caractère.        |
| `rfind()`            | Recherche la dernière occurrence.                                 |
| `substr()`           | Extrait une sous-chaîne.                                          |
| `compare()`          | Compare deux chaînes.                                             |

#### Exemples :
```cpp
std::string s = "Chaine de caractères";

// Taille
std::cout << "Taille : " << s.size() << std::endl;

// Vide ?
if (s.empty()) std::cout << "La chaîne est vide" << std::endl;

// Accès par indice
char c1 = s[0];
char c2 = s.at(0);

// Ajout
s.append(" est géniale");
s += " !";

// Insertion
s.insert(6, "++");

// Suppression
s.erase(0, 6);

// Remplacement
s.replace(0, 3, "XYZ");

// Nettoyage
s.clear();

// Recherche
size_t pos = s.find("C++");
if (pos != std::string::npos)
    std::cout << "Trouvé à la position : " << pos << std::endl;

// Sous-chaîne
std::string sub = s.substr(4, 3);

// Comparaison
if (s.compare("Hello") == 0)
    std::cout << "Les chaînes sont égales" << std::endl;
```
