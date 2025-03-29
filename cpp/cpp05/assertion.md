                                assertion
**************************************************************************

🧩 Les Assertions en C++ — Le Guide Ultime :
--------------------------------------------

🚀 Qu’est-ce qu’une assertion ?
-------------------------------

Une assertion est une instruction utilisée pour vérifier qu'une condition est vraie pendant l'exécution.
Si la condition est fausse, le programme s'arrête immédiatement et affiche un message d'erreur.

En C++, on utilise la macro :
-----------------------------

#include <cassert>

assert(condition);


🔍 Comment ça fonctionne ?
Quand l'assertion est évaluée :

Si condition est vraie, le programme continue normalement.

Si condition est fausse, le programme affiche un message d'erreur contenant :

Le fichier source

Le numéro de ligne

Le test qui a échoué
Puis il termine brutalement l'exécution.

💡 Quand utiliser assert() ? :
------------------------------

✅ Pour vérifier les préconditions
✅ Pour s'assurer des invariants
✅ Pendant la phase de développement et de débogage
❌ Jamais pour gérer les erreurs côté utilisateur (préférer throw, if/else, etc.)

📄 Exemple simple :
-------------------

#include <iostream>
#include <cassert>

int main() 
{
    int age = 20;
    assert(age >= 0); // Vérifie que l'âge est positif
    std::cout << "Âge : " << age << std::endl;
    return 0;
}

Si l'âge est négatif, le programme s’arrêtera ici.

⚙️ Désactivation des assertions (Release Mode) :
-----------------------------------------------

En production, les assertions peuvent être désactivées avec la directive :

g++ -DNDEBUG programme.cpp

Quand NDEBUG est défini :

Toutes les assertions sont ignorées.

Aucun impact sur les performances.

***********************************************************************************************
