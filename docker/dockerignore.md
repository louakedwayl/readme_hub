# Comprendre le fichier `.dockerignore` dans Docker

Docker utilise le **build context** pour construire une image. Le build context est **le répertoire que tu spécifies dans la commande `docker build`**, et Docker copie tout ce qui s'y trouve dans l'image via `COPY` ou `ADD`.

Si tu as beaucoup de fichiers inutiles (README, Dockerfile, `.git`, etc.), ton image peut devenir **plus lourde et lente à construire**. C'est là qu'intervient le fichier `.dockerignore`.

---

## 1. Qu'est-ce que `.dockerignore` ?

`.dockerignore` est un fichier texte que Docker utilise pour **ignorer certains fichiers et dossiers** du build context.

* Fonctionne comme un `.gitignore`.
* Tout fichier ou dossier listé dans `.dockerignore` **ne sera pas copié dans l'image** lors de `COPY` ou `ADD`.

---

## 2. Syntaxe de base

* Chaque ligne correspond à un **fichier ou dossier à ignorer**.
* Les lignes vides ou commençant par `#` sont ignorées (commentaires).

Exemple :

```
# Ignorer le dossier Git
.git

# Ignorer les fichiers Docker et docker-compose
Dockerfile
docker-compose.yml

# Ignorer les fichiers de configuration locaux
.env

# Ignorer la documentation
README.md
LICENSE
```

---

## 3. Bonnes pratiques

1. **Ignorer les fichiers sensibles** : `.env`, clés API, mots de passe.
2. **Ignorer les fichiers inutiles pour le build** : `.git`, README, scripts locaux, logs.
3. **Réduire la taille de l'image** : moins de fichiers → build plus rapide → déploiement plus rapide.

---

## 4. Exemple concret pour un projet PHP (Camagru)

```
.git
README.md
LICENSE
.env
docker-compose.yml
Dockerfile
node_modules/
tests/
```

* Exclut Git, documentation, fichiers sensibles, Dockerfiles et dossiers de tests ou dépendances.
* Build de l'image plus rapide et propre, incluant uniquement le code PHP/JS/CSS nécessaire.

---

## 5. Résumé

* `.dockerignore` **protège les fichiers sensibles** et **optimise la taille de l'image**.
* Chaque projet Docker devrait avoir un `.dockerignore` adapté.
* Fonctionne automatiquement lors des `COPY` et `ADD` dans le Dockerfile.

---

### ⚡ Astuce

Après modification de `.dockerignore`, rebuild ton image :

```bash
docker compose build
```

Sinon Docker utilisera l'ancienne image et certains fichiers non ignorés pourraient encore être présents.
