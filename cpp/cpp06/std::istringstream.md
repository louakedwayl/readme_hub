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


******************************************************************************************************************
