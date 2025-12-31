# Docker Compose : Directives, Services et Volumes

## 1️⃣ Introduction

Docker Compose permet de **définir et gérer plusieurs conteneurs Docker** à l’aide d’un fichier YAML (`docker-compose.yml`).
Les directives dans ce fichier servent à configurer les services, volumes, réseaux et autres composants.

---

## 2️⃣ Les directives Docker Compose

Une **directive** est une instruction que Docker Compose comprend et qui définit le comportement d’un service ou d’un projet.

### 2.1 Principales directives pour un service

| Directive     | Description                                                                             |
| ------------- | --------------------------------------------------------------------------------------- |
| `image`       | Spécifie l’image Docker à utiliser pour le conteneur (ex : `mysql:8.0`).                |
| `build`       | Construit une image depuis un Dockerfile local (ex : `./php`).                          |
| `ports`       | Mappe un port du conteneur vers l’hôte (ex : "8080:80").                                |
| `volumes`     | Monte des volumes pour partager ou persister des fichiers (ex : `./src:/var/www/html`). |
| `depends_on`  | Définit l’ordre de démarrage des services (ex : `db` avant `web`).                      |
| `environment` | Définit des variables d’environnement pour le conteneur.                                |
| `networks`    | Configure les réseaux Docker pour les services.                                         |
| `restart`     | Indique la politique de redémarrage du conteneur (`always`, `on-failure`).              |

### 2.2 Directives globales

| Directive  | Description                                                |
| ---------- | ---------------------------------------------------------- |
| `services` | Contient tous les services du projet.                      |
| `volumes`  | Déclare des volumes persistants partagés entre conteneurs. |
| `networks` | Déclare des réseaux Docker personnalisés.                  |

---

## 3️⃣ Nom des services

* Chaque service a un **nom unique** choisi par le développeur.
* Exemple :

```yaml
services:
  web:
    build: .
    ports:
      - "8080:80"
  db:
    image: mysql:8.0
```

* Ces noms servent pour :

  1. Identifier les conteneurs (`docker ps` montre `projet_web_1`)
  2. La résolution réseau interne (`web` peut joindre `db` en utilisant ce nom)

**Bonnes pratiques :** noms explicites (`php`, `apache`, `mysql`, `redis`).

---

## 4️⃣ Les volumes

### 4.1 Déclaration globale

```yaml
volumes:
  db_data:
```

* `db_data` est un volume Docker qui **survivra même si le conteneur est supprimé**.

### 4.2 Montage dans un service

```yaml
services:
  db:
    image: mysql:8.0
    volumes:
      - db_data:/var/lib/mysql
```

* Monte le volume `db_data` dans `/var/lib/mysql` du conteneur MySQL.
* Les données MySQL sont **persistantes**.

### 4.3 Montage pour le code (dev)

```yaml
services:
  web:
    build: .
    volumes:
      - ./src:/var/www/html
```

* Monte le dossier local `./src` dans le conteneur pour que les modifications soient **immédiatement visibles**.

---

## 5️⃣ Exemple complet

```yaml
version: '3.8'

services:
  php-apache:
    build: ./php
    ports:
      - "8080:80"
    volumes:
      - ./src:/var/www/html
    depends_on:
      - mysql-db

  mysql-db:
    image: mysql:8.0
    environment:
      MYSQL_ROOT_PASSWORD: rootpassword
      MYSQL_DATABASE: camagru_db
      MYSQL_USER: camagru_user
      MYSQL_PASSWORD: password
    volumes:
      - db_data:/var/lib/mysql

volumes:
  db_data:
```

* `php-apache` et `mysql-db` → noms explicites des services
* `db_data` → volume persistant pour MySQL
* `./src:/var/www/html` → code partagé pour le développement

---

## 6️⃣ Résumé

1. **Directives** = instructions officielles (`image`, `build`, `ports`, etc.).
2. **Nom des services** = identifiant pour chaque conteneur et pour le réseau interne.
3. **Volumes** = permettent de persister des données et partager des fichiers.
4. **Bonnes pratiques** : noms explicites, volumes pour DB et code, variables d’environnement pour les secrets.
