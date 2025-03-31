			Exception
*************************************************************

Qu'est-ce qu'une exception ? :
------------------------------

Définition : 
------------

Une exception est un mécanisme qui interrompt l’exécution normale 
du programme lorsqu’une condition d’erreur survient, pour transférer le contrôle à 
un gestionnaire d’erreur approprié (un bloc catch).

Rôle :
------

Les exceptions servent à gérer les erreurs d’exécution de manière structurée.
Elles permettent de séparer le code de traitement des erreurs du code principal, 
ce qui simplifie le programme en évitant de vérifier constamment les codes de retour.

Propagation :
-------------

Si une exception n’est pas capturée dans la fonction où elle survient, elle est propagée 
à la fonction appelante. Ce processus se répète de proche en proche jusqu’à ce qu’un bloc 
catch la traite ou, à défaut, jusqu’à la fin du programme .
(appel de std::terminate si aucune capture n’a lieu).

Syntaxe de base (try, throw, catch) :
-------------------------------------

    try { ... } : définit un bloc de code protégé où des exceptions peuvent se produire. 
On y place le code "à risque".

    throw expr; : lance (léve) une exception – typiquement appelé à l’intérieur d’un try 
lorsqu’une erreur est détectée – en encapsulant une information sur l’erreur dans expr 
(par exemple un objet d’exception).

    catch (TypeExc & e) { ... } : intercepte et traite une exception de type TypeExc 
lancée dans le bloc try associé. Le paramètre e permet d’accéder à l’objet exception 
(il est d’usage de le passer par référence constante).

👉 Il peut y avoir plusieurs blocs catch à la suite d’un même try pour gérer différents types 
d’exceptions. Placez les catch du plus spécifique au plus général. 

Un catch (...) (trois points) en dernier peut servir de filet global capturant toute exception,
quelque soit son type.

Exemple :
---------

L’exemple suivant illustre le lancement et la capture d’une exception en C++. 
La fonction division lance une exception si on tente de diviser par zéro, 
et le bloc try/catch dans main capture cette erreur pour l’afficher 
sans interrompre brutalement le programme :

#include <iostream>
#include <stdexcept>
using namespace std;

int division(int a, int b) 
{
    if (b == 0) {
        throw runtime_error("Division par z\u00e9ro !");
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
        cerr << "Erreur : " << e.what() << endl;     // Affiche "Erreur : Division par z\u00e9ro !"
}

    cout << "Fin du programme." << endl;                   // Le programme continue
}

La méthode what() :
-------------------

what() est une méthode membre de la classe std::exception et de toutes les classes qui en héritent 
(comme std::runtime_error, std::invalid_argument, etc.).

Elle sert à récupérer un message d’erreur sous forme de chaîne de caractères (C-string).

📌 Définition :
---------------

virtual const char* what() const throw();

+--------------+---------------------------------------------------------------+
| Élément      | Signification                                                 |
+--------------+---------------------------------------------------------------+
| virtual      | Permet la redéfinition dans les classes filles.               |
| const        | Ne modifie pas l'objet.                                       |
| throw()      | Garantie que la fonction ne lance pas d'exception.            |
| const char*  | Retourne un C-string (chaîne de caractères).                  |
+--------------+---------------------------------------------------------------+

Exemple simple :
----------------

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


Résultat :

Exception : Erreur critique !

🚀 Quand l’utiliser ?

Tu utilises what() quand tu veux : 

✅ Afficher un message d'erreur propre
✅ Connaître la cause de l'exception
✅ Logger des erreurs ou les transmettre

Exemple avec exception personnalisée :
--------------------------------------

#include <exception>

class MyException : public std::exception
{
public:
    const char* what() const noexcept override
    {
        return "Ceci est une exception personnalisée.";
    }
};

Attention :
-----------

what() retourne un const char*, donc :

    Il vaut mieux l’utiliser immédiatement (std::cerr << e.what();)

    Il ne faut pas essayer de modifier le résultat

Pour résumer simplement :
-------------------------

Si c’est une exception native du C++ (std::exception, std::runtime_error, std::invalid_argument, etc.) →
---------------------------------------------------------------------------------------------------------

La méthode what() retourne un message que tu as passé lors du throw :

throw std::runtime_error("Erreur critique");

→ what() renverra "Erreur critique"

Si c’est une exception personnalisée (comme GradeTooHighException) →
---------------------------------------------------------------------

La méthode what() retourne la chaîne que tu as définie toi-même dans la redéfinition de la fonction :

const char* GradeTooHighException::what() const throw()
{
    return "Grade trop élevé !";
}

→ what() renverra "Grade trop élevé !"

🔥 Donc, en clair :

    La seule mission de what() → fournir une explication textuelle sur l'erreur.
    Rien de plus.
    C’est juste un moyen d’obtenir un message que tu peux afficher ou logguer.

************************************************************************************
