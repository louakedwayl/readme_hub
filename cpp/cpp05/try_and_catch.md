# Gestion des exceptions en C++ — try / catch

## 🚀 Qu’est-ce qu’une exception ? :

Une **exception** est un mécanisme qui permet de **gérer les erreurs** ou les situations anormales pendant l’exécution du programme.  

Quand un problème survient, on peut **lancer** (`throw`) une exception.  
Si elle n'est pas **attrapée** (`catch`), le programme se **termine brutalement**.

---

## 🟢 Syntaxe générale :
```cpp
try
{
    // Code qui pourrait générer une exception
}
catch (const TypeException &e)
{
    // Code pour gérer l'exception
}
```

### Exemple simple :

```cpp
#include <iostream>
#include <exception>

int main()
{
    try
    {
        throw std::runtime_error("Une erreur est survenue !");
    }
    catch (const std::exception &e)
    {
        std::cerr << "Erreur attrapée : " << e.what() << std::endl;
    }

    std::cout << "Le programme continue." << std::endl;
    return 0;
}
```

### Résultat :

Erreur attrapée : Une erreur est survenue !
Le programme continue.

### Pourquoi utiliser try / catch ? :

Empêcher que le programme plante brutalement en cas d'erreur

Récupérer et traiter l'information sur l'erreur

Protéger les zones critiques du programme

### Le mécanisme complet :

throw → Permet de lancer une exception.

try → Protège un bloc de code.

catch → Attrape l'exception et agit en conséquence.

### Plusieurs catch :

On peut attraper plusieurs types d’exceptions :
```cpp
try
{
    // Code qui peut générer plusieurs types d'exceptions
}
catch (const std::invalid_argument &e)
{
    std::cerr << "Argument invalide : " << e.what() << std::endl;
}
catch (const std::out_of_range &e)
{
    std::cerr << "Hors limites : " << e.what() << std::endl;
}
catch (const std::exception &e)
{
    std::cerr << "Autre erreur : " << e.what() << std::endl;
}
```

### Attraper toutes les exceptions :

Il existe un catch spécial qui attrape n'importe quelle exception :

```cpp
try
{
    // Code
}
catch (...)
{
    std::cerr << "Une exception inconnue a été attrapée." << std::endl;
}
```

### Créer sa propre exception :

On peut créer une classe d’exception en héritant de std::exception :

```cpp
#include <exception>

class MyException : public std::exception
{
public:
    const char* what() const noexcept override
    {
        return "Ceci est une exception personnalisée.";
    }
};
```

### Utilisation :

```cpp
try
{
    throw MyException();
}
catch (const MyException &e)
{
    std::cerr << e.what() << std::endl;
}
```

### Les arguments de catch :

Quand on écrit un bloc catch, on doit indiquer le type d’exception que l’on veut attraper.

### Structure :

```cpp
catch (const TypeException &e)
```

| Élément          | Signification                                                                     |
|------------------|-----------------------------------------------------------------------------------|
| **TypeException** | Type de l'exception à attraper (ex : `std::exception`, `std::runtime_error`).     |
| **const**         | L’exception est en lecture seule → on ne peut pas la modifier.                   |
| **&**             | Passage par référence → évite la copie de l’objet (plus performant).             |
| **e**             | Nom de la variable représentant l'exception (accès au message via `e.what()`).   |


### Exemple :

```cpp
catch (const std::exception &e)
{
    std::cerr << "Erreur : " << e.what() << std::endl;
}
```

### Exemple avec plusieurs types :

```cpp
catch (const std::out_of_range &e) // Attrape uniquement out_of_range
{
    std::cerr << "Erreur hors limites : " << e.what() << std::endl;
}
catch (const std::exception &e) // Attrape les autres exceptions standard
{
    std::cerr << "Erreur : " << e.what() << std::endl;
}
```
