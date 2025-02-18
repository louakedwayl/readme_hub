			              stdio streams (Flux d'Entrée/Sortie Standard)
********************************************************************************************************

	stdio vient de "Standard Input/Output" (Entrée/Sortie Standard).

1/ Stdio en C :
---------------

En C, la bibliothèque stdio.h (Standard Input Output Header) fournit des fonctions pour gérer l’entrée et la sortie, comme :

    printf() → afficher du texte
    scanf() → lire une entrée utilisateur
    fopen() → ouvrir un fichier
    fgets() → lire une ligne

2/ Stdio en C++ :
-----------------

En C++, on n'utilise plus stdio.h mais plutôt iostream (input output stream), qui offre des alternativesmodernes comme :

    std::cout (remplace printf())
    std::cin (remplace scanf())
    std::cerr pour afficher des erreurs (sortie d'erreur)
    std::clog pour les messages de journalisation (sortie de log)
    std::ifstream et std::ofstream (remplacent fopen() pour manipuler des fichiers)

Le namespace std (Standard) regroupe tous les éléments de la bibliothèque standard C++
Les nouvelles bibliothèques de C++ (introduites avec le standard C++98) n'utilisent pas l'extension .h 
pour différencier les fichiers C++ modernes des anciens fichiers C hérités.

3/std::cout : character output :
--------------------------------

	std::cout ou character output est un objet du namespace std, utilisé pour afficher des données à l'écran.

Exemple : 

   std::cout << "Bonjour, voici un exemple en C++!\n" << std::endl;

4/std::cin : character input :
------------------------------

std::cin (character input) est un objet du namespace std, utilisé pour récupérer des données depuis l’entrée standard

Exemple :

    std::string nom;
    std::cout << "Entrez votre nom : ";
    std::cin >> nom;
    std::cout << "Bonjour, " << nom << " !" << std::endl;

std::cin récupère une entrée utilisateur et l’assigne à la variable nom.
Attention : std::cin ne prend qu'un seul mot (pour une phrase entière, utiliser std::getline()).

********************************************************************************************************
