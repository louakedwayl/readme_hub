                                                dependances
*****************************************************************************************************************

1/ Introduction :
-----------------

En programmation C et C++, une dépendance désigne un fichier, une bibliothèque ou un module externe dont un 
programme a besoin pour fonctionner correctement. Une bonne gestion des dépendances est essentielle pour assurer 
la portabilité, la maintenabilité et la robustesse du code.

2/ Types de Dépendances :
-------------------------

On distingue plusieurs types de dépendances en C et C++ :

1/ Dépendances internes : fichiers d'en-tête (.h) et fichiers sources (.c/.cpp) du projet.

2/ Dépendances externes : bibliothèques tierces comme OpenSSL, Boost, SDL, etc.

3/ Dépendances du système : bibliothèques standard (stdio.h, iostream, etc ).

3/ Gestion des Dépendances :
----------------------------

3.1 /Inclusion de fichiers d'en-tête :
--------------------------------------

En C et C++, on inclut les fichiers d'en-tête avec la directive #include :

#include <stdio.h> // Bibliothèque standard
#include "monfichier.h" // Fichier interne au projet

Il est important d'utiliser des gardes d'inclusion pour éviter les inclusions multiples :

>#ifndef MONFICHIER_H
#define MONFICHIER_H

// Contenu du fichier d'en-tête

#ifndef MONFICHIER_H
#define MONFICHIER_H

// Contenu du fichier d'en-tête

#endif

Ou en C++ :

#pragma once

3.2 Utilisation de Bibliothèques Externes :
-------------------------------------------

Certaines bibliothèques doivent être installées et liées au projet.

Installation sous Linux (ex: SDL2) : sudo apt install libsdl2-dev

Compilation avec GCC : gcc monprogramme.c -o monprogramme -lSDL2

4/ Génération Automatique des Dépendances :
-------------------------------------------

Pour gérer les dépendances de manière efficace, on peut utiliser GCC avec les options -MM et -MD.

4.1 Option -MM :
----------------

L'option -MM permet de générer la liste des fichiers .h inclus dans le projet, sans prendre en compte 
les fichiers système comme stdio.h ou iostream. Cela permet d'obtenir une vue simplifiée des dépendances internes.

Exemple d'utilisation : 
-----------------------

gcc -MM monfichier.c

Exemple de sortie :
-------------------

monfichier.o: monfichier.c monfichier.h util.h

Utilité : Idéal pour générer un Makefile propre et ne pas inclure de dépendances inutiles aux bibliothèques du système.


4.2 Option -MD :
----------------

L'option -MD génère un fichier .d contenant toutes les dépendances, y compris les fichiers système, 
tout en permettant une compilation normale.

Exemple d'utilisation :
-----------------------

gcc -MD -c monfichier.c -o monfichier.o

Utilité : Utile pour automatiser la recompilation des fichiers modifiés en fonction de leurs dépendances.

4.3 Exemple d'Utilisation dans un Makefile :
--------------------------------------------

Un Makefile peut utiliser -MD pour suivre automatiquement les dépendances :

CC = gcc
CFLAGS = -Wall -MD

OBJ = main.o utils.o

monprogramme: $(OBJ)
	$(CC) $(OBJ) -o monprogramme

-include $(OBJ:.o=.d)

clean:
	rm -f $(OBJ) monprogramme *.d

5/ le flag de compilation -MMD en C++ :
---------------------------------------

Objectif du flag -MMD :
-----------------------

Le flag -MMD est utilisé pour générer automatiquement les dépendances des fichiers .cpp, sans inclure les 
fichiers système (/usr/include/...). Il est très utile dans un Makefile pour assurer une recompilation efficace 
en cas de modification d’un fichier .hpp.

6 /Conclusion :
---------------

Le Makefile, par défaut, vérifie uniquement les fichiers explicitement indiqués dans ses règles 
(par exemple, les fichiers source .c ou .cpp). Cependant, dans un programme en C/C++, un fichier source peut 
inclure un ou plusieurs fichiers d'en-tête (headers) qui contiennent des déclarations ou des définitions cruciales. 
Si l'un de ces fichiers d'en-tête change, le fichier source qui l'inclut doit être recompilé, même si sa date de 
modification directe n'a pas changé.

En Resumé :
-----------

Sans dépendances générées : Le Makefile ne sait que recompiler un fichier source que si ce fichier source a été modifié.
Avec les dépendances (générées par -MM par exemple) : Le Makefile connaît également les fichiers d'en-tête dont dépend 
chaque fichier source. Ainsi, si un header change, le Makefile recompile automatiquement le ou les fichiers source concernés.

C'est pour cela que l'utilisation d'options comme -MM est cruciale : elle permet d'automatiser la détection des dépendances 
internes (les headers de ton projet) afin que tout changement dans ces fichiers entraîne la recompilation des fichiers qui 
les incluent. Cela garantit que ton code reste cohérent et à jour, sans nécessiter une intervention manuelle dans le Makefile.

J'espère que cette explication te permet de mieux comprendre l'intérêt des dépendances !

***************************************************************************************************************************







**************************************************************************************************************************

