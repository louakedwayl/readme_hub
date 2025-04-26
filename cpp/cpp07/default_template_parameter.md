				template par défaut 
******************************************************************************************************

Un template par défaut permet de donner une valeur par défaut au type d'un template.

Si l'utilisateur n'indique pas le type lors de l'appel ou de l'instanciation, le type par défaut est utilisé.

Pourquoi ? :
------------

    Simplifier l'utilisation

    Offrir plus de flexibilité

    Garder un comportement "standard" sans forcer à toujours préciser les types

Syntaxe Générale :
------------------

Pour une fonction template :

template<typename T = int>
void afficher(T valeur) 
{
    std::cout << valeur << std::endl;
}

Pour une classe template :

template<typename T = std::string>
class Boite 
{
public:
    T contenu;
};

******************************************************************************************************
