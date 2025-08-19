# Dockerfile

## Qu’est-ce qu’un Dockerfile ?

Un Dockerfile est un fichier texte qui contient une série d’instructions pour automatiser la création d’une image Docker.  
C’est comme une recette de cuisine pour construire une image.

### Objectif

Créer une image personnalisée qui contiendra :
- ton code (ex : fichier C++, Python…)  
- ton environnement (ex : Ubuntu, Apache, MySQL…)  
- les commandes à exécuter à la construction de l’image

## Structure de base d’un Dockerfile

### Exemple simple :

```dockerfile
# 1. Image de base
FROM ubuntu:20.04

# 2. Auteur
LABEL maintainer="wayl@example.com"

# 3. Mettre à jour les paquets et installer un programme
RUN apt-get update && apt-get install -y \
    g++ \
    make

# 4. Copier les fichiers dans le conteneur
COPY . /app

# 5. Définir le dossier de travail
WORKDIR /app

# 6. Compiler un programme (exemple pour un projet C++)
RUN make

# 7. Définir la commande de lancement
CMD ["./mon_programme"]
```

### Liste des instructions les plus utilisées

Instruction	Description
FROM	Spécifie l’image de base (ex : ubuntu, alpine, node, etc.)
LABEL	Donne des infos comme l’auteur
RUN	Exécute une commande à la construction de l’image
COPY	Copie des fichiers depuis ta machine vers le conteneur
WORKDIR	Change le dossier courant dans le conteneur
CMD	Définit la commande par défaut au lancement du conteneur
ENTRYPOINT	Comme CMD, mais plus rigide (on peut l’utiliser ensemble)
EXPOSE	Documente un port utilisé par le conteneur (ne le publie pas !)
ENV	Définit une variable d’environnement
Construire une image à partir d’un Dockerfile

Place-toi dans le dossier contenant le Dockerfile :

```bash
cd mon_projet
```

Construis l’image :

```bash
docker build -t mon_image .
```

-t : nom de l’image

. : indique que le Dockerfile est dans le dossier courant

Lance un conteneur :

```bash
docker run mon_image
```

Exemple concret (C++ simple)

Fichier main.cpp :

```c++
#include <iostream>

int main() 
{
    std::cout << "Hello Docker !" << std::endl;
    return 0;
}
```

Makefile :
```makefile
all:
	g++ main.cpp -o hello
```

### Dockerfile associé :

```dockerfile
FROM ubuntu:20.04
RUN apt-get update && apt-get install -y g++
COPY . /app
WORKDIR /app
RUN g++ main.cpp -o hello
CMD ["./hello"]
```

### Bonnes pratiques

Utilise des images légères si possible (alpine)

Combine plusieurs commandes RUN pour éviter de créer trop de couches

Utilise .dockerignore pour éviter de copier des fichiers inutiles (comme .git, node_modules, etc.)

Gère les permissions correctement (évite root si possible)

### Différence entre ENTRYPOINT et CMD

### ENTRYPOINT

Définit le programme principal du conteneur

Toujours exécuté, remplaçable uniquement avec --entrypoint

### Exemple :

```dockerfile
ENTRYPOINT ["/entrypoint.sh"]
```

docker run mon_image → /entrypoint.sh

docker run mon_image --custom-arg → /entrypoint.sh --custom-arg

### CMD

Fournit les arguments par défaut à ENTRYPOINT ou la commande à exécuter si ENTRYPOINT absent

Remplaçable si des arguments sont passés à docker run

### Exemple :

```dockerfile
CMD ["--default-arg"]
```

### Résumé :

ENTRYPOINT → programme principal

CMD → arguments par défaut ou commande principale si pas d’ENTRYPOINT

### Directive EXPOSE

Sert à documenter quel(s) port(s) le conteneur utilise en interne

N’ouvre pas le port vers l’extérieur

### Exemple :

EXPOSE 80

Ouvrir un port vers l’extérieur

Avec docker run :

docker run -p 8080:80 nom_de_l_image

Avec docker-compose.yml :

```dockerfile

services:
  mon_service:
    image: mon_image
    ports:
      - "8080:80"
```

Pourquoi cette séparation ?

EXPOSE → documente le port utilisé dans l’image

-p ou ports: → ouvre réellement la communication avec la machine hôte

### Exemple :

Dockerfile :
```dockerfile
FROM nginx
EXPOSE 80
```
Lancer le conteneur accessible sur ta machine via le port 8080 :

```bash
docker run -p 8080:80 nginx
```

Tu peux accéder à http://localhost:8080.

### Résumé rapide

| Directive   | Rôle                                           |
|------------|-----------------------------------------------|
| EXPOSE 80   | Documente que le conteneur écoute sur le port 80 (interne) |
| -p 8080:80  | Ouvre le port 80 du conteneur vers le port 8080 de la machine hôte |