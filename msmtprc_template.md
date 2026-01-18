# 🎭 Le concept du msmtprc_template (Docker & Sécurité)

Ce document explique pourquoi nous utilisons un fichier **template** (`msmtprc_template`) au lieu d'un fichier de configuration classique, et comment cela sécurise l'application.

---

## 1. Le Problème : Les secrets "en dur"

Dans une configuration classique (hors Docker), on écrit souvent les mots de passe directement dans les fichiers.

**❌ Mauvaise pratique (Fichier `msmtprc` classique) :**
```ini
account gmail
user mon.adresse@gmail.com
password mon_super_mot_de_passe_secret  # <-- DANGER !
```

### Pourquoi est-ce dangereux avec Docker ?

1. **Git** : Si tu commits ce fichier, ton mot de passe est sur GitHub pour toujours.
2. **Images Docker** : Si tu mets le mot de passe dans le `Dockerfile`, n'importe qui récupérant ton image peut lire le mot de passe en inspectant les couches (`docker history`).
3. **Flexibilité** : Si tu changes de mot de passe, tu dois reconstruire toute l'image.

---

## 2. La Solution : Le Template

L'idée est de créer un fichier "squelette" (le template) qui contient des trous à la place des valeurs sensibles. Ces trous sont des variables.

**✅ Bonne pratique (Fichier `msmtprc_template`) :**
```ini
defaults
auth           on
tls            on
tls_trust_file /etc/ssl/certs/ca-certificates.crt
logfile        /var/log/msmtp.log

account        gmail
host           smtp.gmail.com
port           587
from           ${SMTP_USER}
user           ${SMTP_USER}
password       ${SMTP_PASSWORD}

account default : gmail
```

### Les avantages

* **Pas de secrets dans Git** : Tu peux commit ce fichier sans danger, il ne contient aucun mot de passe réel.
* **Séparation des responsabilités** : Les développeurs travaillent sur le template, les admins gèrent les secrets.
* **Réutilisable** : Le même template fonctionne en dev, staging et production avec des credentials différents.

---

## 3. Comment ça marche ?

### A. Le fichier `.env`

Les vraies valeurs sont stockées dans un fichier `.env` (qui lui, **ne doit JAMAIS être commité**).

```env
SMTP_USER=ton.email@gmail.com
SMTP_PASSWORD=ton_mot_de_passe_application
```

**Important** : Ajoute `.env` dans ton `.gitignore` !

### B. Le script d'entrypoint

Au démarrage du conteneur, un script bash remplace les variables du template par les vraies valeurs.

**Script `docker-entrypoint.sh` :**
```bash
#!/bin/bash

# Remplacer les variables dans le template
envsubst < /etc/msmtprc_template > /etc/msmtprc

# Sécuriser le fichier final
chmod 600 /etc/msmtprc
chown www-data:www-data /etc/msmtprc

# Lancer PHP-FPM
exec "$@"
```

### C. Le Dockerfile

```dockerfile
# Copier le template (pas de secrets ici !)
COPY msmtprc_template /etc/msmtprc_template

# Copier et rendre exécutable l'entrypoint
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["php-fpm"]
```

### D. Le docker-compose.yml

```yaml
services:
  php:
    build: .
    environment:
      - SMTP_USER=${SMTP_USER}
      - SMTP_PASSWORD=${SMTP_PASSWORD}
    env_file:
      - .env
```

---

## 4. Le Flux complet

Voici ce qui se passe au démarrage du conteneur :

1. **Docker Compose** lit le fichier `.env`
2. Il injecte les variables d'environnement dans le conteneur
3. L'**entrypoint** s'exécute :
   * Il prend le `msmtprc_template`
   * Il remplace `${SMTP_USER}` et `${SMTP_PASSWORD}` par les vraies valeurs
   * Il crée `/etc/msmtprc` avec les permissions correctes
4. **PHP-FPM** démarre et peut utiliser msmtp

---

## 5. Sécurité : Les règles d'or

| ✅ À faire | ❌ À ne JAMAIS faire |
|-----------|---------------------|
| Utiliser des variables `${VAR}` dans le template | Écrire des mots de passe en dur |
| Ajouter `.env` au `.gitignore` | Commit le fichier `.env` |
| Générer `/etc/msmtprc` au runtime | Copier un `msmtprc` avec secrets dans l'image |
| Utiliser `chmod 600` sur le fichier final | Laisser le fichier lisible par tous |
| Documenter les variables nécessaires | Oublier de dire quelles variables sont requises |

---

## 6. Exemple complet de fichier `.env.example`

Pour aider les futurs utilisateurs, crée un fichier `.env.example` (celui-ci PEUT être commité) :

```env
# Configuration SMTP pour msmtp
SMTP_USER=votre.email@gmail.com
SMTP_PASSWORD=votre_mot_de_passe_application

# Instructions :
# 1. Copier ce fichier : cp .env.example .env
# 2. Remplacer les valeurs par vos vrais credentials
# 3. Pour Gmail, générer un mot de passe d'application :
#    https://myaccount.google.com/apppasswords
```

---

## 7. Alternative : Docker Secrets (Production)

Pour la production, Docker Swarm et Kubernetes offrent des systèmes de secrets encore plus sécurisés.

**Avec Docker Swarm :**
```bash
# Créer le secret
echo "mon_mot_de_passe" | docker secret create smtp_password -

# Dans docker-compose.yml
services:
  php:
    secrets:
      - smtp_password
secrets:
  smtp_password:
    external: true
```

Le secret est alors monté dans `/run/secrets/smtp_password` et n'est jamais dans une variable d'environnement.

---

## 8. Résumé

| Méthode | Sécurité | Flexibilité | Complexité |
|---------|----------|-------------|------------|
| Mot de passe en dur | ❌ Très faible | ❌ Nulle | ✅ Simple |
| Template + .env | ✅ Bonne | ✅ Bonne | ✅ Simple |
| Docker Secrets | ✅✅ Excellente | ✅ Bonne | ⚠️ Moyenne |

**Pour un projet comme Camagru**, la méthode **Template + .env** est le meilleur compromis entre sécurité et simplicité.
