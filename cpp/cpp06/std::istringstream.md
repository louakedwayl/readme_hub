						std::istringstream
************************************************************************************************************************

 Définition :
--------------

std::istringstream est une classe du C++ qui permet de traiter une chaîne de caractères (std::string) comme un flux d'entrée,
similaire à la lecture depuis std::cin. Elle est définie dans l'en-tête <sstream>.

🧠 Utilité principale :
-----------------------

std::istringstream est particulièrement utile pour :

    Analyser une chaîne de caractères contenant des données formatées.

    Extraire des valeurs de types différents (int, float, etc.) à partir d'une chaîne.

    Diviser une chaîne en mots ou en éléments individuels.

⚙️ Syntaxe de base :
-------------------

#include <sstream>
#include <string>

std::string texte = "42 3.14 hello";
std::istringstream iss(texte);
int entier;
float reel;
std::string mot;

iss >> entier >> reel >> mot;

Après exécution :
-----------------

    entier contient 42

    reel contient 3.14

    mot contient "hello"

En clair :
----------

std::istringstream permet de découper (parser) une std::string mot par mot (ou valeur par valeur),
en utilisant l’opérateur d’extraction >>.

À retenir :
-----------

    Le découpage se fait automatiquement par espace (ou séparateurs blancs comme tabulations, retours à la ligne).

    Tu peux chaîner les >> pour récupérer plusieurs valeurs facilement.

Exemple complet :
-----------------

#include <iostream>
#include <sstream>
#include <string>

int main() 
{
    std::string input = "21 3.14 Hello";
    std::istringstream iss(input);

    int i;
    float f;
    std::string s;

    iss >> i >> f >> s;

    std::cout << "Int: " << i << "\n";
    std::cout << "Float: " << f << "\n";
    std::cout << "String: " << s << "\n";

    return 0;
}

Sortie :
--------

Int: 21
Float: 3.14
String: Hello

******************************************************************************************************************
