# Les Bind Mounts Docker

## 🎯 C'est quoi un Bind Mount ?

Un **bind mount** est un pont entre un fichier/dossier de **ta machine** et un fichier/dossier dans **le conteneur Docker**.

C'est comme si tu disais au conteneur : *"Utilise MON fichier au lieu de créer le tien"*.

---

## 🔄 Schéma conceptuel

```
┌─────────────────────────┐
│   Ta Machine (Host)     │
│                         │
│  📁 /home/user/projet/  │
│      └── config/        │
│           └── init.sql  │ ◄─────┐
└─────────────────────────┘       │
                                  │ Bind Mount
                                  │ (lien direct)
┌─────────────────────────┐       │
│   Conteneur Docker      │       │
│                         │       │
│  📁 /docker-entrypoint  │       │
│      └── init.sql ──────┘───────┘
│                         │
└─────────────────────────┘
```

**Le fichier existe UNE SEULE FOIS (sur ta machine), mais il est "visible" dans le conteneur.**

---

## 📖 Syntaxe de base

```yaml
volumes:
  - chemin_sur_ta_machine:chemin_dans_conteneur
```

**Exemples :**
```yaml
volumes:
  - ./config/init.sql:/app/init.sql          # Fichier unique
  - ./src:/var/www/html                       # Dossier entier
  - /home/user/data:/data                     # Chemin absolu
```

---

## 🆚 Bind Mount vs Volume vs COPY

| Méthode | Description | Utilisation |
|---------|-------------|-------------|
| **Bind Mount** | Lien direct vers un fichier/dossier de ta machine | Développement, fichiers qui changent souvent |
| **Volume** | Espace de stockage géré par Docker | Données persistantes (DB, uploads) |
| **COPY** | Copie le fichier dans l'image lors du build | Production, fichiers statiques |

---

## ✅ Avantages des Bind Mounts

1. **Synchronisation instantanée** : tu modifies le fichier → changement immédiat dans le conteneur
2. **Pas de rebuild** : pas besoin de reconstruire l'image
3. **Facilité de développement** : édite avec ton éditeur préféré
4. **Versionnable** : le fichier reste dans ton repo git

---

## ❌ Inconvénients

1. **Dépendance au système hôte** : le fichier DOIT exister sur ta machine
2. **Chemins relatifs sensibles** : doit être relatif au `docker-compose.yml`
3. **Moins sécurisé en production** : l'hôte peut modifier le conteneur
4. **Performance** : légèrement moins performant qu'un volume (surtout sur Mac/Windows)

---

## 🎓 Cas d'usage classiques

### 1. Code source en développement
```yaml
volumes:
  - ./src:/var/www/html    # Ton code PHP → serveur web
```
**Utilité :** Tu modifies ton code, le serveur voit les changements immédiatement.

### 2. Fichiers de configuration
```yaml
volumes:
  - ./config/nginx.conf:/etc/nginx/nginx.conf
```
**Utilité :** Personnaliser la config sans rebuild.

### 3. Scripts d'initialisation
```yaml
volumes:
  - ./config/init.sql:/docker-entrypoint-initdb.d/init.sql
```
**Utilité :** MySQL exécute ton SQL au démarrage.

### 4. Logs accessibles
```yaml
volumes:
  - ./logs:/var/log/apache2
```
**Utilité :** Lire les logs directement sur ta machine.

---

## 🔍 Comment ça marche techniquement ?

**Docker ne copie PAS le fichier.** Il crée un "lien" (mount point) qui permet au conteneur d'accéder directement au système de fichiers de ta machine.

**En pratique :**
- Modification sur ta machine → visible immédiatement dans le conteneur
- Modification dans le conteneur → visible sur ta machine
- **C'est le MÊME fichier physique**

---

## ⚠️ Pièges courants

### 1. Chemin relatif incorrect
```yaml
# ❌ Mauvais (si docker-compose.yml est à la racine)
- config/init.sql:/app/init.sql

# ✅ Bon
- ./config/init.sql:/app/init.sql
```

### 2. Fichier inexistant
```yaml
- ./fichier-qui-nexiste-pas.txt:/app/file.txt  # ❌ Erreur au démarrage
```

### 3. Permissions
Sur Linux, parfois le conteneur n'a pas les droits de lecture/écriture. Solution : `chmod` ou gérer les UIDs.

---

## 🏁 En résumé

**Un bind mount c'est :**
- 🔗 Un lien direct entre ta machine et le conteneur
- 🚀 Pratique pour le développement
- 💾 Le fichier reste sur ta machine
- ⚡ Changements en temps réel

**Utilise-le quand :**
- Tu développes et modifies souvent des fichiers
- Tu veux garder le contrôle sur les fichiers
- Tu veux éditer avec tes outils locaux

**Évite-le en production** : préfère COPY dans le Dockerfile pour l'immutabilité.

---

## 🎯 Exemple pratique : Projet Camagru

```yaml
services:
  database:
    image: mysql:8.0
    volumes:
      - db_data:/var/lib/mysql                                   # Volume (données DB)
      - ./config/init.sql:/docker-entrypoint-initdb.d/init.sql  # Bind mount (SQL init)
```

**Ce que ça fait :**
- `db_data` stocke les données MySQL de façon persistante
- `./config/init.sql` est lu directement depuis ta machine pour initialiser la DB

---

## 📚 Pour aller plus loin

**Documentation officielle :**
- [Docker Volumes](https://docs.docker.com/storage/volumes/)
- [Docker Bind Mounts](https://docs.docker.com/storage/bind-mounts/)

**Bonnes pratiques :**
- Utilise des bind mounts en développement
- Utilise des volumes pour les données persistantes
- Utilise COPY dans le Dockerfile pour la production
