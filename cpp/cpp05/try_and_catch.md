				Gestion des exceptions en C++ — try / catch
************************************************************************************************************************************

🚀 Qu’est-ce qu’une exception ? :
---------------------------------

Une exception est un mécanisme qui permet de gérer les erreurs ou les situations anormales pendant l’exécution du programme.

Quand un problème survient, on peut lancer (throw) une exception.
Si elle n'est pas attrapée (catch), le programme se termine brutalement.

🟢 Syntaxe générale :
---------------------

try
{
    // Code qui pourrait générer une exception
}
catch (const TypeException &e)
{
    // Code pour gérer l'exception
}

🔥 Exemple simple :
-------------------

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

Résultat :
----------

Erreur attrapée : Une erreur est survenue !

Le programme continue.

Pourquoi utiliser try / catch ? :
---------------------------------

✅ Pour empêcher que le programme plante brutalement en cas d'erreur
✅ Pour récupérer et traiter l'information sur l'erreur
✅ Pour protéger les zones critiques du programme

Le mécanisme complet :
----------------------

    throw → Permet de lancer une exception

    try → Permet de protéger un bloc de code

    catch → Permet de attraper l'exception et d'agir


🧩 Plusieurs catch :
--------------------

On peut attraper plusieurs types d’exceptions :

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


Attraper toutes les exceptions :
--------------------------------

Il existe un catch spécial qui attrape n'importe quelle exception (même sans info) :

try
{
    // Code
}
catch (...)
{
    std::cerr << "Une exception inconnue a été attrapée." << std::endl;
}

Créer sa propre exception :
---------------------------

Tu peux aussi créer ta propre classe d'exception en héritant de std::exception :

#include <exception>

class MyException : public std::exception
{
public:
    const char* what() const noexcept override
    {
        return "Ceci est une exception personnalisée.";
    }
};

Puis l'utiliser :

try
{
    throw MyException();
}
catch (const MyException &e)
{
    std::cerr << e.what() << std::endl;
}

Les arguments de catch :
------------------------

Quand on écrit un bloc catch, on doit indiquer le type d’exception qu’on veut attraper.
Cet argument détermine ce qu’on attrape et comment on y accède.

📌 Structure d'un argument de catch :
-------------------------------------

catch (const TypeException &e)

Décomposition :
---------------

+----------------+-------------------------------------------------------------------------------------------+
| Élément       | Signification                                                                              |
+---------------+--------------------------------------------------------------------------------------------+
| TypeException | Le type de l'exception que l'on souhaite attraper (ex : std::exception, std::runtime_error)|
| const         | L'exception est passée en constante → on ne pourra pas la modifier.                        |
| &             | Passage par référence → évite de faire une copie de l'objet (plus performant).             |
| e             | Nom de la variable qui représente l'exception attrapée. Accès aux infos avec .what().      |
+----------------+-------------------------------------------------------------------------------------------+
 

Exemple

catch (const std::exception &e)
{
    std::cerr << "Erreur : " << e.what() << std::endl;
}

Ici, on attrape toutes les exceptions qui héritent de std::exception.
e est une référence constante vers l'exception, et on peut afficher son message avec e.what().

🔥 Exemple avec plusieurs types :
---------------------------------

catch (const std::out_of_range &e) // Attrape uniquement les exceptions out_of_range
{
    std::cerr << "Erreur hors limites : " << e.what() << std::endl;
}
catch (const std::exception &e) // Attrape les autres exceptions standard
{
    std::cerr << "Erreur : " << e.what() << std::endl;
}

**************************************************************************************************************************************
