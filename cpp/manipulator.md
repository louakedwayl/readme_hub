                                                        manipulateur 
*******************************************************************************************************

Introduction :
--------------

Les manipulateurs en C++ sont des fonctions utilisées pour organiser l'affichage des données sur la 
sortie standard (cout) ou la lecture depuis l'entrée standard (cin). Ils permettent d'améliorer 
la lisibilité des sorties et de contrôler la mise en forme des données.

Manipulateurs Courants:
----------------------

Ces manipulateurs ne nécessitent pas d'argument et sont directement utilisés avec 
les flux d'entrée/sortie.

endl : Insère un retour à la ligne et vide le tampon de sortie.
std::cout << "Bonjour" << std::endl;

flush : Vider immédiatement le tampon de sortie.
std::cout << "Texte affiché immédiatement" << std::flush;

ws : Ignore les espaces blancs au début de l'entrée.
std::string nom;
std::cin >> std::ws >> nom;

*******************************************************************************************************
