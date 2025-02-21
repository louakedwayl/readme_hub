                                            std::string
*************************************************************************************************************

1/ Introduction à std::string :
-------------------------------

    std::string est une classe de la bibliothèque standard C++ qui encapsule un tableau dynamique 
de caractères (char * en interne). Elle offre une gestion automatique de la mémoire et fournit diverses 
fonctionnalités pour manipuler des chaînes de caractères plus facilement qu'avec des char *.

 1/ Gestion automatique de la mémoire : La taille de la chaîne s’ajuste dynamiquement selon le contenu.
 2/ Fonctions membres riches : Des méthodes pour la modification, la recherche, la comparaison et la conversion.
 3/ Sécurité et simplicité : Moins de risques d’erreurs comme les dépassements de tampon.

2/ Déclaration, Construction et Initialisation :
------------------------------------------------

2.1. Inclusion et Déclaration:
------------------------------

    Exemple d'implementation de std::string :
    -----------------------------------------

#include <iostream>

int main() {
    std::string string = "Hello while";
    std::cout << string << std::endl;
    return 0;
}

2.2 Constructeurs :
-------------------

    std::string propose plusieurs constructeurs :

    1/Constructeur par défaut : Crée une chaîne vide
    --------------------------------------------------

std::string s1;  // chaîne vide

    2/Constructeur à partir d’un littéral : Permet d’initialiser avec une chaîne de caractères C
    ---------------------------------------------------------------------------------------------

std::string s2("Hello While");   ou  std::string s2 = "Hello While";

    3/ Constructeur de copie : Crée une nouvelle chaîne en copiant une chaîne existante
    -----------------------------------------------------------------------------------

std::string s3(s2);

    4/ Constructeur de répétition : Crée une chaîne contenant plusieurs occurrences d’un même caractère
    ---------------------------------------------------------------------------------------------------

std::string s4(10, '*');


2.3 Opérations et Fonctions Membres :
-------------------------------------

1/ size() / length() : Renvoient le nombre de caractères dans la chaîne.

    std::string s = "Chaine de caratère";
    std::cout << "Taille : " << s.size() << std::endl;

2/empty() : Vérifie si la chaîne est vide.

    if(s.empty()) {
        std::cout << "La chaîne est vide" << std::endl;
    }

3/ operator[] et at() : Accès aux caractères par indice.

    char premier = s[0];         // accès direct (sans vérification)
    char premierSecure = s.at(0);  // avec vérification d’indice

4/append() et operator+= : Ajouter du contenu à la fin de la chaîne.

    s.append(" est génial");
    s += " en C++";

5/insert() : Insérer une sous-chaîne à une position donnée.

    s.insert(3, "++");

6/erase() : Supprimer une partie ou l’intégralité de la chaîne.

    s.erase(0, 2);  // supprime les deux premiers caractères

7/replace() : Remplacer une portion de la chaîne par une autre.

    s.replace(0, 3, "XYZ");

8/clear() : Vider complètement la chaîne.

    s.clear();

9/ find() : Recherche la position d’une sous-chaîne ou d’un caractère.

    size_t pos = s.find("C++");
    if(pos != std::string::npos)
        std::cout << "Trouvé à la position " << pos << std::endl;

! : rfind() : Recherche depuis la fin.

10/substr() : Extrait une sous-chaîne à partir d’un indice donné.

std::string sub = s.substr(4, 3);  // extrait 3 caractères à partir de l'indice 4

11/ compare() : Compare deux chaînes.

    if(s.compare("Hello") == 0) {
        std::cout << "Les chaînes sont égales" << std::endl;
    }

***********************************************************************************************************************
