				   Bufferisation dans les Flux C++
******************************************************************************************************

	La bufferisation est un mécanisme permettant de stocker temporairement des données dans une 
zone mémoire (appelée buffer) avant de les traiter, les transmettre ou les écrire sur un périphérique.
Ce mécanisme joue un rôle crucial dans l’optimisation des performances des entrées/sorties (E/S) 
en réduisant le nombre d’appels système et en améliorant l’efficacité globale des opérations.

Introduction à la Bufferisation :
---------------------------------

Définition : La bufferisation consiste à accumuler des données dans un espace mémoire temporaire 
avant d'effectuer une opération d'E/S. Cela permet de traiter des données en bloc plutôt 
qu’en les manipulant caractère par caractère ou octet par octet.

En C, la fonction printf utilise un buffer pour accumuler des données avant de les envoyer via des 
appels système (write), ce qui permet de limiter le nombre de ces appels et d'optimiser 
les performances.

std::cout gère un buffer interne pour accumuler les données. Lorsqu'il est vidé (automatiquement ou 
manuellement), la bibliothèque standard finit par appeler, via la libc, des fonctions de bas niveau 
qui utilisent le syscall write pour envoyer les données à la sortie standard. Ainsi, même si on 
n'appelle pas write directement en C++, c'est bien ce syscall qui est utilisé en arrière-plan.

Avantages :
-----------

    Amélioration des performances : Réduction des appels coûteux au niveau système.
    Gestion efficace des ressources : Réduction des accès disque ou réseau.
    Optimisation de la latence : Permet de minimiser l'impact des délais d'attente 
sur les périphériques lents.

******************************************************************************************************
