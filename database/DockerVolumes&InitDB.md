# 📦 Docker : Volumes, Bind Mounts et /docker-entrypoint-initdb.d/

## 1️⃣ Introduction

Dans Docker, il existe plusieurs façons de stocker et de partager des données entre ton ordinateur et les conteneurs. Ces notions sont essentielles pour tout projet utilisant MySQL ou MariaDB, comme Camagru.

* **Volume Docker** : stockage géré par Docker.
* **Bind mount** : fichier ou dossier de ton disque monté dans le conteneur.
* **/docker-entrypoint-initdb.d/** : dossier spécial pour initialiser la base de données.

---

## 2️⃣ Volume Docker

Syntaxe :

```yaml
volumes:
  - db_data:/var/lib/mysql
```

### Explication

* `db_data` : nom du volume géré par Docker
* `/var/lib/mysql` : chemin dans le conteneur où la DB stockera ses données

### Caractéristiques

* Persistant même si le conteneur est supprimé
* Docker gère l’emplacement sur le disque de l’hôte
* Parfait pour les données sensibles ou critiques comme les bases MySQL

### Schéma

```
Volume Docker : db_data
        |
        v
/var/lib/mysql (conteneur)
```

---

## 3️⃣ Bind Mount

Syntaxe :

```yaml
volumes:
  - ./config/init.sql:/docker-entrypoint-initdb.d/init.sql
```

### Explication

* `./config/init.sql` : fichier réel sur ton PC
* `/docker-entrypoint-initdb.d/init.sql` : chemin dans le conteneur
* Docker monte le fichier tel quel dans le conteneur

### Caractéristiques

* Tout changement sur le fichier local est visible immédiatement dans le conteneur
* Utile pour les fichiers de configuration, scripts SQL, assets statiques
* Ne fonctionne que si le fichier/dossier existe sur l’hôte

### Schéma

```
Bind mount : ./config/init.sql
        |
        v
/docker-entrypoint-initdb.d/init.sql (conteneur)
```

---

## 4️⃣ /docker-entrypoint-initdb.d/

### Définition

* **Dossier spécial dans l’image Docker officielle MySQL/MariaDB**
* Contient **des scripts `.sql` ou `.sh`** qui sont exécutés **au premier démarrage de la DB**
* Permet d’initialiser la base automatiquement

### Règles importantes

1. Exécution **uniquement si la DB n’existe pas encore** (volume vide)
2. Types de fichiers : `.sql`, `.sql.gz`, `.sh`
3. Ordre : fichiers exécutés par ordre alphabétique

### Exemple

```yaml
volumes:
  - ./config/init.sql:/docker-entrypoint-initdb.d/init.sql
```

* MySQL exécutera automatiquement `init.sql` pour créer tables et données initiales

### Schéma

```
Hôte                          Conteneur
./config/init.sql  -->  /docker-entrypoint-initdb.d/init.sql
```

* Premier démarrage : MySQL lit tous les fichiers dans `/docker-entrypoint-initdb.d/`
* Scripts SQL ou shell sont exécutés

### Remarque

* Ce dossier **n’existe que dans l’image Docker**, pas dans une installation MySQL native.

---

## 5️⃣ Comparaison Volume vs Bind mount

| Caractéristique     | Volume Docker                 | Bind mount                  |
| ------------------- | ----------------------------- | --------------------------- |
| Source              | Nom géré par Docker           | Chemin réel sur l’hôte      |
| Persistance         | Oui, indépendant du conteneur | Dépend du fichier local     |
| Portabilité         | Plus portable                 | Dépend du chemin sur l’hôte |
| Cas d’usage typique | Bases de données, logs        | Scripts, configurations     |

---

## 6️⃣ Conclusion

* **Volume Docker** → stockage persistant géré par Docker
* **Bind mount** → monte des fichiers/dossiers existants de l’hôte
* **/docker-entrypoint-initdb.d/** → dossier magique pour initialiser automatiquement une DB Docker

> Connaître ces notions est essentiel pour gérer correctement les bases de données dans des projets Docker comme Camagru.
