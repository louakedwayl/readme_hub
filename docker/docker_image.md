# Les images Docker
---

## 1/ Qu’est-ce qu’une image Docker ?

Une image Docker est un package léger, autonome et exécutable qui contient tout ce qu’il faut pour exécuter une application :

- Le système de fichiers (binaires, bibliothèques, fichiers de configuration, etc.)
- Le code source ou le code compilé de l’application
- Les dépendances nécessaires (librairies, runtimes, etc.)
- Les instructions d’exécution (commande par défaut, variables d’environnement)

👉 Une image est comme un **instantané immuable** de cet environnement.

---

## 2/ Image vs Conteneur :

- **Image** : un modèle statique → elle ne change pas et sert de base pour créer des conteneurs.  
- **Conteneur** : une instance en cours d’exécution créée à partir d’une image.  
  Il peut avoir un état dynamique (fichiers modifiés, processus en cours).

---

## 3/ Comment sont construites les images ?

Les images sont créées en suivant un **Dockerfile**, un fichier texte qui décrit étape par étape la construction :

- Quelle image de base utiliser (ex : `Ubuntu`, `Alpine`)
- Quelles commandes exécuter (installer paquets, copier fichiers)
- Quelle commande lancer par défaut au démarrage du conteneur

---

## 4/ Structure en couches (layers) :

Les images Docker sont composées de plusieurs **couches (layers)** superposées :

- Chaque commande dans le `Dockerfile` (ex : `RUN apt-get install`, `COPY main.cpp`) crée une nouvelle couche.
- Ces couches sont empilées, ce qui permet de réutiliser les parties communes entre plusieurs images.
- Cela rend le **stockage** et la **distribution** plus efficaces.

---

## 5/ Stockage et partage :

- Les images sont stockées localement dans le moteur Docker (**daemon**) sur ta machine.
- Elles peuvent être **poussées (uploadées)** et **téléchargées (pull)** depuis des registres publics ou privés comme Docker Hub.

### Exemple :

```bash
docker pull ubuntu:20.04
docker push mon_compte/mon_image:version1
```

## 6/ Comment utiliser une image ?

Pour lancer un conteneur basé sur une image :

```bash
docker run nom_image
```

Pour lister les images locales :

```bash
docker images
```

Pour supprimer une image :

```bash
docker rmi nom_image
```

## 7/ Bonnes pratiques :

Utiliser des images de base légères (ex : Alpine) quand c’est possible.

Minimiser le nombre de couches en regroupant les commandes RUN.

Nettoyer les fichiers temporaires dans les images pour réduire leur taille.

Utiliser des images multi-étapes pour séparer la compilation et le runtime.

## 8/ Exemple simple de Dockerfile :

FROM ubuntu:20.04
RUN apt-get update && apt-get install -y g++
WORKDIR /app
COPY main.cpp .
RUN g++ main.cpp -o hello
CMD ["./hello"]

### Résumé

Une image Docker est un environnement complet et portable pour exécuter une application.

Elle est construite en couches à partir d’un Dockerfile.

Tu peux créer des conteneurs à partir de ces images pour exécuter tes programmes.

