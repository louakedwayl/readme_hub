# Exception

## Qu'est-ce qu'une exception ? :

### Définition :
Une **exception** est un mécanisme qui **interrompt l’exécution normale du programme** lorsqu’une condition d’erreur survient,  
pour transférer le contrôle à un **gestionnaire d’erreur approprié** (un bloc `catch`).

### Rôle :
- Gérer les erreurs d’exécution de manière **structurée**.  
- Séparer le **code de traitement des erreurs** du **code principal**, ce qui simplifie la lecture.  

### Propagation :
Si une exception n’est pas capturée dans la fonction où elle survient, elle est **propagée** à la fonction appelante.  
Ce processus se répète jusqu’à ce qu’un bloc `catch` la traite ou, à défaut, jusqu’à la **fin du programme**  
(`std::terminate` est alors appelé).

---

## Syntaxe de base (try, throw, catch) :
La gestion des exceptions repose sur **trois éléments principaux** : `try`, `throw` et `catch`.

```cpp
try
{
    // Code à risque
    throw exception;  // exception lancée en cas d'erreur
}
catch (TypeExc const & e)
{
    // Traitement de l'erreur
}
catch (...)
{
    // Capture toutes autres exceptions
}

    try { ... } : Définit un bloc protégé où des exceptions peuvent se produire.

    throw expr; : Lance une exception (souvent un objet d’erreur).

    catch (TypeExc & e) : Intercepte et traite l’exception.
```

On peut avoir plusieurs catch pour gérer différents types d’exceptions.
Un catch (...) placé en dernier capture toute exception, quel que soit son type.

### Exemple :

```cpp
#include <iostream>
#include <stdexcept>
using namespace std;

int division(int a, int b) 
{
    if (b == 0) {
        throw runtime_error("Division par zéro !");
    }
    return a / b;
}

int main() 
{
    try 
    {
        cout << "Résultat : " << division(10, 2) << endl;  // Pas d'erreur
        cout << "Résultat : " << division(10, 0) << endl;  // Provoque une exception
    } 
    catch (const runtime_error &e) 
    {
        cerr << "Erreur : " << e.what() << endl;  // Affiche "Erreur : Division par zéro !"
    }

    cout << "Fin du programme." << endl;
}
```

### La méthode what() :

### Définition :

what() est une méthode membre de la classe std::exception et de ses dérivées.
Elle retourne un message d’erreur sous forme de C-string.

virtual const char* what() const throw();

| Élément       | Signification                                  |
|---------------|-----------------------------------------------|
| **virtual**   | Permet la redéfinition dans les classes filles |
| **const**     | Ne modifie pas l’objet                         |
| **throw()**   | Ne lance pas d’exception                       |
| **const char*** | Retourne une chaîne de caractères (C-string)  |

### Exemple simple :

```cpp
#include <iostream>
#include <exception>

int main()
{
    try
    {
        throw std::runtime_error("Erreur critique !");
    }
    catch (const std::exception &e)
    {
        std::cerr << "Exception : " << e.what() << std::endl;
    }
}
```

### Résultat :

Exception : Erreur critique !

### Exemple avec exception personnalisée :

```cpp
#include <exception>

class MyException : public std::exception
{
public:
    const char* what() const throw ()
    {
        return "Ceci est une exception personnalisée.";
    }
};
```

### Bonnes pratiques :

Utiliser what() pour afficher un message d’erreur lisible.

Ne jamais modifier le message retourné par what() (il est const).

Utiliser des exceptions pour des erreurs inattendues (et non pour le flux normal du programme).

### Quand utiliser les exceptions en C++ :

Pour gérer des erreurs imprévues (allocation mémoire, fichier manquant, données invalides).

Lorsqu’une fonction ne peut pas gérer l’erreur elle-même et doit la transmettre à l’appelant.

Pour séparer la logique normale de la gestion d’erreurs, rendant le code plus lisible.

Pour centraliser le traitement d'erreurs.

### En résumé :

throw : signale une erreur.

catch : la capture et la traite.

what() : fournit une explication textuelle de l’erreur.