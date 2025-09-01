# Docker Compose

---

## Qu’est-ce que Docker Compose ?

**Docker Compose** est un outil qui permet de définir et de gérer des **applications multi-conteneurs Docker** à l’aide d’un fichier de configuration unique : `docker-compose.yml`.

**Exemple :** Une application web avec un conteneur pour le backend, un pour la base de données, et un pour le frontend.

---

## 📁 Structure d’un projet avec Docker Compose

```bash
my-app/
├── docker-compose.yml
├── backend/
│   └── Dockerfile
├── frontend/
│   └── Dockerfile
└── db/
```

---

## Fichier `docker-compose.yml`

Le fichier `docker-compose.yml` permet de **décrire les services, volumes, réseaux, etc.**

---

### 1. version

```yaml
version: "3.9"
```

* Indique la version du format Docker Compose utilisée.
* Certaines fonctionnalités dépendent de la version choisie.

---

### 2. services

C’est le cœur du fichier. Chaque service correspond généralement à un conteneur Docker.

```yaml
services:
  web:
    image: nginx:latest
    ports:
      - "80:80"
```

#### Options fréquentes pour un service :

* **image** : image Docker à utiliser (`nginx`, `postgres`, etc.)
* **build** : construire l’image depuis un `Dockerfile`
* **ports** : mappe un port du conteneur vers ton hôte (`hôte:conteneur`)
* **volumes** : persister des données ou partager des fichiers
* **environment** : variables d’environnement
* **depends\_on** : indiquer qu’un service doit démarrer après un autre
* **networks** : connecter le service à un réseau Docker

---

### 3. volumes

```yaml
volumes:
  db-data:
```

* Permet de créer un stockage persistant indépendant du cycle de vie des conteneurs.
* Idéal pour les bases de données ou fichiers qui doivent survivre aux redémarrages.

---

### 4. networks

```yaml
networks:
  frontend:
  backend:
```

* Permet de créer des réseaux Docker personnalisés pour isoler ou relier des services.

---

### 5. configs / secrets (optionnel)

* **configs** : injecter des fichiers de configuration dans un conteneur
* **secrets** : stocker des informations sensibles de façon sécurisée

---

## Commandes principales

```bash
docker-compose up           # Démarrer les services
docker-compose up -d        # Démarrer en arrière-plan
docker-compose down         # Arrêter et supprimer les services
docker-compose up --build   # Rebuild des images
docker-compose logs         # Voir les logs
docker-compose ps           # Voir les conteneurs en cours
```

---

### Bonnes pratiques

* Utilise un fichier `.env` pour les variables sensibles ou réutilisables.
* Ne pas versionner les données dans les volumes.
* Découpe bien les services (db, backend, frontend…).
* Pour `depends_on`, ajouter un script d’attente si le service dépendant doit être prêt avant de démarrer.

---

### Schéma type d’architecture multi-conteneurs

```bash
my-app/
├── frontend/   # Conteneur web / interface utilisateur
├── backend/    # Conteneur serveur / API
└── db/         # Conteneur base de données
```

* Tous les services peuvent communiquer via un **réseau Docker**.
* La base de données utilise un **volume** pour persister les données.

---

### Exemple complet : Application Flask + PostgreSQL

```yaml
version: '3.8'

services:
  web:
    build: ./web
    ports:
      - "5000:5000"
    volumes:
      - ./web:/app
    depends_on:
      - db

  db:
    image: postgres:13
    environment:
      POSTGRES_DB: mydb
      POSTGRES_USER: user
      POSTGRES_PASSWORD: password
    volumes:
      - db-data:/var/lib/postgresql/data

volumes:
  db-data:
```
