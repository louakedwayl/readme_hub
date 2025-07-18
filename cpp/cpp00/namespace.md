
# Namespace
***************************************************************************************************

En C++, un namespace est un espace de noms qui permet d'organiser le code et d'éviter les conflits 
de noms entre différentes parties d'un programme. Un namespace peut contenir des variables, 
des fonctions, des classes et d'autres éléments du programme.

## 1/ Déclaration d'un Namespace :
-------------------------------

```cpp
namespace Nom 
{
    int value = 0;
}
```

## 2/ Accéder au Namespace :

On peut accéder à un namespace grâce à l'opérateur :: (Scope Resolution Operator).
Dans un programme, plusieurs espaces de noms peuvent exister, et :: est utilisé pour accéder aux
éléments d'un namespace spécifique.
Exemple :

```cpp
printf("value -> %d", Nom::value);
```

## 3/ Namespace anonyme (Unnamed namespace) :

Un namespace sans nom (namespace {}) en C++ fonctionne comme une fonction static :

Tout ce qui est défini dedans est limité au fichier source.
C'est une alternative moderne à static pour encapsuler des variables et fonctions internes.
Exemple :

```cpp
namespace
{
    int value = 0; // Variable uniquement accessible dans ce fichier source
}
```

value ne sera pas accessible depuis un autre fichier source.

## 4/ Using namespace :

L'utilisation de using namespace std; permet d'éviter d'écrire std:: devant chaque élément :

```cpp
#include <iostream>
using namespace std;

int main() 
{
    cout << "Bonjour, C++ !" << endl;
    return 0;
}
```