# Docker Compose

---

## Qu’est-ce que Docker Compose ?

**Docker Compose** est un outil qui permet de définir et de gérer des **applications multi-conteneurs Docker** à l’aide d’un fichier de configuration unique : `docker-compose.yml`.

**Exemple :** Une application web avec un conteneur pour le backend, un pour la base de données, et un pour le frontend.

---

# 📁 Structure d’un projet avec Docker Compose

```bash
my-app/
├── docker-compose.yml
├── backend/
│ └── Dockerfile
├── frontend/
│ └── Dockerfile
└── db/ 
```
---

## Fichier `docker-compose.yml`

Le fichier `docker-compose.yml` permet de **décrire les services, volumes, réseaux, etc.**

### Exemple de base :
```yaml
version: "3.8"

services:
  web:
    build: ./backend
    ports:
      - "8000:8000"
    volumes:
      - ./backend:/app
    depends_on:
      - db

  db:
    image: postgres:13
    environment:
      POSTGRES_USER: user
      POSTGRES_PASSWORD: password
      POSTGRES_DB: mydb
    volumes:
      - db-data:/var/lib/postgresql/data

volumes:
  db-data:
```

### Commandes principales

Démarrer les services :
```bash
docker-compose up
```

Détaché (en arrière-plan) :
```bash
docker-compose up -d
```

Stopper les services :
```bash
docker-compose down
```
Rebuild les images :
```bash
docker-compose up --build
```

Voir les logs :
```bash
docker-compose logs
```
Voir les conteneurs en cours :
```bash
docker-compose ps
```

**depends_on**

Cela indique qu’un service dépend d’un autre.

⚠️ Attention : cela ne garantit pas que le service dépendant est "prêt", seulement qu’il est lancé en premier.
Pour attendre que la base soit disponible, il faut un script "wait-for-it" ou équivalent.

Volumes et données persistantes

```yaml
volumes:
  - db-data:/var/lib/postgresql/data
```
Un volume nommé (db-data) permet de conserver les données entre les redémarrages du conteneur.

### Réseaux personnalisés (optionnel)

Docker Compose crée automatiquement un réseau, mais tu peux le configurer :
```yaml
networks:
  mynetwork:
```

Et l’utiliser dans les services :

```yaml
services:
  web:
    networks:
      - mynetwork
```

### Bonnes pratiques

Utilise .env pour stocker les variables sensibles ou réutilisables.

Ne pas versionner les données dans les volumes.

Utilise depends_on avec précaution (ajouter un script d’attente si besoin).

Découpe bien les services (db, backend, frontend, etc.).

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
