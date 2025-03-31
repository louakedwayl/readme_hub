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
⭐️ Le mécanisme complet

    throw → Permet de lancer une exception

    try → Permet de protéger un bloc de code

    catch → Permet de attraper l'exception et d'agir

**************************************************************************************************************************************
