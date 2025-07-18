# Stdio Streams (Flux d'Entrée/Sortie Standard)

`stdio` vient de **"Standard Input/Output"** (Entrée/Sortie Standard).

---

## 1/ Stdio en C :
---------------

En C, la bibliothèque `stdio.h` (Standard Input Output Header) fournit des fonctions pour gérer l’entrée et la sortie, comme :

- `printf()` → afficher du texte  
- `scanf()` → lire une entrée utilisateur  
- `fopen()` → ouvrir un fichier  
- `fgets()` → lire une ligne  

---

## 2/ Stdio en C++ :
-----------------

En C++, on n'utilise plus `stdio.h` mais plutôt **`<iostream>`** (input/output stream), qui offre des alternatives modernes comme :

- `std::cout` (remplace `printf()`)  
- `std::cin` (remplace `scanf()`)  
- `std::cerr` → afficher des erreurs (sortie d'erreur)  
- `std::clog` → messages de journalisation (sortie de log)  
- `std::ifstream` / `std::ofstream` → manipuler des fichiers (remplacent `fopen()`)  

> Le namespace `std` (Standard) regroupe tous les éléments de la bibliothèque standard C++.  
> Les nouvelles bibliothèques C++ (introduites avec C++98) **n'utilisent pas `.h`** pour différencier les versions modernes des anciennes bibliothèques C héritées.

---

## 3/ `std::cout` : character output
--------------------------------

`std::cout` (character output) est un objet du namespace `std` utilisé pour afficher des données à l'écran.

### Exemple :
```cpp
std::cout << "Bonjour, voici un exemple en C++!\n" << std::endl;
```
#### Méthode write() :
```cpp
//std::cout peut écrire sur la console en utilisant la méthode write() de la classe std::ostream.

std::cout << "Hello, world!";
std::cout.write("Hello, world!", 13);
```
Ces deux lignes produisent le même résultat.
### 4/ std::cin : character input

std::cin est un objet du namespace std, utilisé pour récupérer des données depuis l’entrée standard.

#### Exemple :
```cpp
std::string nom;
std::cout << "Entrez votre nom : ";
std::cin >> nom;
std::cout << "Bonjour, " << nom << " !" << std::endl;
```
⚠️ std::cin lit uniquement un mot.
Pour lire une ligne entière (avec espaces), utilisez std::getline().

### 5/ std::cin.eof() :

std::cin.eof() est une méthode qui permet de détecter la fin de l’entrée d’un flux de données (std::cin).
Elle est utile pour la lecture de fichiers ou de données utilisateurs dont la taille n’est pas connue à l’avance.

#### Comportement :

Retourne true → si la fin du flux est atteinte

Retourne false → sinon