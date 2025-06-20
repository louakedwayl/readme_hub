# Dépendances en C et C++

---

## 1. Introduction

En programmation C et C++, une **dépendance** désigne un fichier, une bibliothèque ou un module externe dont un programme a besoin pour fonctionner correctement.  
Une bonne gestion des dépendances est essentielle pour assurer la **portabilité**, la **maintenabilité** et la **robustesse** du code.

---

## 2. Types de dépendances

1. **Dépendances internes** : fichiers d'en-tête (`.h`) et fichiers sources (`.c`/`.cpp`) du projet.  
2. **Dépendances externes** : bibliothèques tierces comme OpenSSL, Boost, SDL, etc.  
3. **Dépendances du système** : bibliothèques standard (`stdio.h`, `iostream`, etc.).

---

## 3. Gestion des dépendances

### 3.1 Inclusion de fichiers d'en-tête

En C et C++, on inclut les headers avec la directive `#include` :

```cpp
#include <stdio.h>      // bibliothèque standard
#include "monfichier.h" // fichier interne au projet

Pour éviter les inclusions multiples, on utilise des gardes d’inclusion :

#ifndef MONFICHIER_H
#define MONFICHIER_H

// contenu du fichier d'en-tête

#endif
```
Ou en C++ moderne :
```cpp
#pragma once
```
## 3.2 Utilisation de bibliothèques externes

Certaines bibliothèques doivent être installées et liées au projet.

    Exemple sous Linux (SDL2) :
```bash
sudo apt install libsdl2-dev
gcc monprogramme.c -o monprogramme -lSDL2
```
## 4. Génération automatique des dépendances
### 4.1 Option -MM

    Génère la liste des fichiers .h inclus dans un fichier source, sans prendre en compte les fichiers système.

    Utile pour avoir une vue claire des dépendances internes.

Exemple :
```bash
gcc -MM monfichier.c
```
Sortie typique :
```bash
monfichier.o: monfichier.c monfichier.h util.h
```
### 4.2 Option -MD

    Génère un fichier .d listant toutes les dépendances, y compris système.

    Permet une compilation normale et facilite la recompilation automatique.

Exemple :
```bash
gcc -MD -c monfichier.c -o monfichier.o
```
### 4.3 Exemple dans un Makefile
```makefile
CC = gcc
CFLAGS = -Wall -MD

OBJ = main.o utils.o

monprogramme: $(OBJ)
	$(CC) $(OBJ) -o monprogramme

-include $(OBJ:.o=.d)

clean:
	rm -f $(OBJ) monprogramme *.d
```
## 5. Le flag -MMD en C++

    Génère les dépendances des fichiers .cpp sans inclure les headers système (/usr/include/...).

    Très utile dans un Makefile pour recompilation efficace après modification des fichiers .hpp.

## 6. Conclusion

Le Makefile, par défaut, ne recompile qu’un fichier source modifié directement.
Mais si un fichier d'en-tête inclus change, il faut aussi recompiler les sources qui l’incluent.

L’utilisation d’options comme -MM ou -MD permet d’automatiser cette détection, garantissant ainsi que :

    Toute modification d’un header entraîne la recompilation des fichiers concernés.

    Le code reste cohérent sans intervention manuelle dans le Makefile.

Résumé :

    Sans dépendances générées : recompilation uniquement si fichier source modifié.

    Avec dépendances générées : recompilation automatique aussi si un header change.