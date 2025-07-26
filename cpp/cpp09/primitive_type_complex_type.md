

# Primitive type and complex type

## 1/ Les types primitifs :

Les types primitifs sont les types de données de base fournis par le langage de programmation.  
En C++, les types primitifs sont définis de manière standard et sont directement représentés en mémoire.  
Ils ne sont pas des objets complexes, mais des entités de données simples.

### Principaux types primitifs en C++ :

int : Représente un nombre entier.  

Exemple :

```cpp
int x = 10;
```
float : Représente un nombre à virgule flottante (nombre réel simple).

Exemple :
```cpp
float y = 3.14f;
```
double : Représente un nombre à virgule flottante de précision double.

Exemple :
```cpp
double z = 3.1415926535;
```
char : Représente un caractère (utilisé pour les caractères ASCII).

Exemple :
```cpp
char c = 'A';
```
bool : Représente une valeur booléenne, qui peut être true ou false.

Exemple :
```cpp
bool b = true;
```

void : Ce type ne représente aucune donnée. Il est souvent utilisé comme type de retour dans les fonctions qui ne retournent rien.

### Propriétés des types primitifs :

Taille fixe : Chaque type a une taille fixe en mémoire. Par exemple, un int occupe typiquement 4 octets sur la plupart des systèmes modernes.

Valeur simple : Ces types ne peuvent stocker qu'une seule valeur à la fois.

Immutabilité : Les types primitifs ne sont pas modifiables dans leur structure (ils ne peuvent pas contenir d'autres valeurs à l'intérieur).

## 2/ Les types complexes :

Les types complexes sont des types qui permettent de regrouper plusieurs valeurs ou de définir des structures de données plus sophistiquées.
Contrairement aux types primitifs, les types complexes sont souvent utilisés pour gérer des informations plus complexes.
Principaux types complexes en C++ :

Tableaux (arrays) : Permettent de stocker plusieurs valeurs du même type. Les tableaux peuvent être unidimensionnels ou multidimensionnels.

### Exemple :

```cpp
int arr[5] = {1, 2, 3, 4, 5};
```

Structs (structures) : Permettent de regrouper différentes variables (de types primitifs ou complexes) sous un même nom. Une structure est comme un conteneur pour des données variées.

### Exemple :
```cpp
struct Person {
    std::string name;
    int age;
};
```

Classes : Semblables aux structures, mais avec des fonctions membres. Les classes permettent l'encapsulation et la gestion des comportements des objets.

### Exemple :

```cpp
class Car {
public:
    std::string brand;
    int speed;
};
```

std::string : Une chaîne de caractères dynamique, qui peut contenir un texte de longueur variable.

### Exemple :

```cpp
std::string str = "Hello, world!";
```

std::vector : Une collection dynamique d'éléments, semblable à un tableau, mais dont la taille peut varier à l'exécution.

### Exemple :
```cpp
std::vector<int> v = {1, 2, 3, 4};
```

### Propriétés des types complexes :

Taille variable : La taille des types complexes peut changer, surtout pour les conteneurs dynamiques comme les std::vector ou les chaînes de caractères.

Contenant plusieurs valeurs : Les types complexes peuvent contenir plusieurs valeurs, qui peuvent être de types différents (structures, classes) ou identiques (tableaux, vecteurs).

Comportement associé : Les types complexes peuvent inclure des fonctions ou des méthodes qui définissent leur comportement (comme les méthodes d'une classe).

## 3/ Passage par valeur vs. Passage par référence :

En C++, il existe deux façons principales de passer des arguments aux fonctions : par valeur et par référence.
Chacune a des implications sur la façon dont les données sont manipulées et sur les performances du programme.

## 3.1 Passage par valeur :

Lorsque vous passez un argument par valeur à une fonction, une copie de l'argument est créée et envoyée à la fonction.
Les modifications faites à cet argument dans la fonction n'affecteront pas la variable d'origine.

### Exemple :

```cpp
void increment(int x) {
    x = x + 1;  // La modification de x ne change pas la valeur d'origine
}

int main() {
    int num = 5;
    increment(num);
    std::cout << num << std::endl;  // Affichera 5, pas 6
}
```

### Propriétés du passage par valeur :

Indépendance des données : La fonction travaille sur une copie des données, donc la variable d'origine reste inchangée.

Coût de copie : Lorsque l'objet est complexe (par exemple, un grand tableau ou un vecteur), la copie peut être coûteuse en termes de mémoire et de performance.

### 3.2 Passage par référence :

Lorsque vous passez un argument par référence à une fonction, la fonction reçoit un lien direct vers l'argument original.
Cela signifie que toute modification apportée à l'argument dans la fonction affectera directement la variable d'origine.

### Exemple :

```cpp
void increment(int &x) {
    x = x + 1;  // La modification de x affecte la variable d'origine
}

int main() {
    int num = 5;
    increment(num);
    std::cout << num << std::endl;  // Affichera 6
}
```

### Propriétés du passage par référence :

Modification des données : Toute modification de l'argument dans la fonction affecte directement la variable d'origine.

Pas de copie : Il n'y a pas de copie des données, ce qui peut améliorer les performances, surtout pour des objets complexes (comme des grands vecteurs, des tableaux ou des objets).

Références constantes : Vous pouvez aussi passer des arguments par référence constante (const), ce qui permet de garantir que la fonction ne modifiera pas les données.

### Exemple avec une référence constante :

```cpp
void print(const std::string &str) {
    std::cout << str << std::endl;
}

int main() {
    std::string message = "Hello, world!";
    print(message);  // La fonction ne modifie pas message
}
```

### Conclusion : Le lien entre types et passage par référence / valeur :

Le passage par valeur et passage par référence sont des concepts cruciaux qui affectent la façon dont les types sont manipulés dans une fonction.

Types primitifs : Comme ce sont des valeurs simples, passer un type primitif par valeur est souvent suffisant et ne pose pas de problème de performance, sauf si l'objet est très grand (ce qui est rare).

Types complexes : Pour les types complexes (comme des tableaux, des classes, ou des vecteurs), le passage par référence est souvent préféré, car il évite de créer des copies coûteuses en termes de mémoire et de performance.

Le choix entre ces deux méthodes dépend des besoins du programme, notamment des contraintes de performance et des exigences sur les modifications des données.