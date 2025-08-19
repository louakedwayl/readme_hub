# Introduction à Docker

## Qu’est-ce que Docker ?

Docker est une plateforme open-source qui permet de créer, déployer et gérer des applications  
dans des conteneurs. Un conteneur est une unité légère et portable qui contient tout ce dont  
une application a besoin pour fonctionner : le code, les bibliothèques, les dépendances,  
et les fichiers système.

### Docker désigne à la fois :

#### 1/ Le système de conteneurisation

C’est une technologie qui permet de créer, isoler et gérer des conteneurs. Ces conteneurs  
contiennent une application avec toutes ses dépendances, et ils s’exécutent de façon isolée sur  
le système d’exploitation.

#### 2/ Le programme Docker (le moteur Docker)

C’est l’outil logiciel (la CLI et le moteur) qui permet de construire des images,  
de lancer des conteneurs, de les gérer, etc. C’est grâce à ce programme que tu peux taper  
des commandes comme `docker build` ou `docker run`.

### En résumé

- Le système de conteneurisation Docker est la technologie sous-jacente qui fournit  
l’isolation et la portabilité via les conteneurs.  
- Le programme Docker est l’application que tu utilises pour interagir avec ce système,  
construire des images, lancer et gérer les conteneurs.

## Pourquoi utiliser Docker ?

- **Portabilité** : Un conteneur Docker fonctionne de la même manière sur n’importe  
quelle machine (local, serveur, cloud).  
- **Isolation** : Chaque application tourne dans son propre environnement isolé,  
évitant les conflits entre dépendances.  
- **Légèreté** : Les conteneurs sont plus légers que des machines virtuelles classiques.  
- **Rapidité** : Démarrer un conteneur est rapide, ce qui facilite le développement et les tests.

## Concepts clés

- **Image Docker** : Une image est un modèle immuable qui contient tout ce dont une  
application a besoin. On peut la comparer à un template.  
- **Conteneur Docker** : Un conteneur est une instance en cours d’exécution d’une image.  
- **Dockerfile** : Fichier texte qui décrit étape par étape comment construire une image Docker.  
- **Docker Hub** : Un registre public où sont stockées et partagées des images Docker.

## Comment ça marche ?

1. **Créer une image** : À partir d’un Dockerfile, on construit une image qui inclut l’application  
et ses dépendances.  
2. **Lancer un conteneur** : On démarre un conteneur à partir d’une image.  
3. **Utiliser le conteneur** : L’application tourne dans ce conteneur, isolée des autres.

## Exemple simple
Voici un Dockerfile basique pour une application Node.js :

```dockerfile
FROM node:14
WORKDIR /app
COPY package.json .
RUN npm install
COPY . .
CMD ["node", "app.js"]
```

Pour construire et lancer :

```bash
docker build -t mon-app .
docker run -p 3000:3000 mon-app
```

### Principaux composants de Docker

Docker Engine : le moteur principal qui exécute les conteneurs.

Docker CLI : (Command Line Interface) l’interface en ligne de commande pour interagir avec Docker.

Docker Hub : le registre public d’images Docker.

Docker Compose : un outil pour définir et gérer des applications multi-conteneurs via un fichier YAML.

Docker Swarm : l’outil d’orchestration natif Docker pour gérer des clusters de conteneurs.

### Conclusion

Docker facilite grandement la gestion et le déploiement d’applications, surtout dans des environnements complexes. C’est un outil essentiel pour les développeurs et les DevOps.