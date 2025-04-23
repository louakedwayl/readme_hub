reinterpret_cast
*********************************************

reinterpret_cast en C++

Définition :
------------
reinterpret_cast est un cast (conversion de type) qui permet de convertir un type de donnée en un autre,
sans modifier les bits sous-jacents.
  
C’est l’un des cast les plus dangereux en C++ car il ignore complètement la sémantique des types.


Syntaxe :
---------

reinterpret_cast<type_cible>(expression)

À quoi ça sert ?
----------------

reinterpret_cast est utilisé lorsque :
--------------------------------------

- Tu veux convertir un pointeur d’un type en un autre sans transformation.
- Tu veux travailler avec des représentations bas niveau, par exemple : bits bruts, pointeurs, adresses mémoire.
- Tu fais du code très bas niveau (systèmes, drivers, interfaçage avec du C ou de l'ASM).

Attention : Risques :
---------------------

- Ce cast ne garantit pas la portabilité ni la sécurité.
- Il n’effectue aucun contrôle entre les types (contrairement à `dynamic_cast` par exemple).
- Peut entraîner un comportement indéfini si mal utilisé.

Exemple d'utilisation valable :
-------------------------------

#include <iostream>

int main() 
{
    int a = 42;
    void* ptr = &a;

    // On cast le void* en int*
    int* intPtr = reinterpret_cast<int*>(ptr);

    std::cout << *intPtr << std::endl; // Affiche 42
}

Exemple à éviter (comportement indéfini) :
------------------------------------------

float f = 3.14f;
int* p = reinterpret_cast<int*>(&f); // Interpréter les bits du float comme un int

std::cout << *p << std::endl; // Affiche les bits du float comme si c'était un int

Techniquement valide, mais extrêmement dépendant de l’architecture (endianness, taille des types, etc.)


Comparaison avec les autres casts :
-----------------------------------

| Cast               | Description                                 | Sécurité |
|--------------------|---------------------------------------------|----------|
| `static_cast`      | Cast sûr à la compilation                   | ✅       |
| `dynamic_cast`     | Cast sûr à l’exécution (RTTI)               | ✅✅      |
| `const_cast`       | Ajoute/retire le `const`                    | ⚠️       |
| `reinterpret_cast` | Représentation mémoire brute (non sûr)      | ❌       |


Exemple : conversion de fonction :
----------------------------------

void foo() 
{
    std::cout << "Hello\n";
}

int main() 
{
    void (*fptr)() = foo;
    void* raw = reinterpret_cast<void*>(fptr);

    // Et inversement :
    void (*func)() = reinterpret_cast<void(*)()>(raw);
    func(); // Appelle foo
}

******************************************************************************************************
