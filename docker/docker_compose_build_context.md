# Docker Compose et le Build Context

Docker Compose utilise aussi un **build context**, similaire à la commande `docker build`, pour construire les images des services définis dans un fichier `docker-compose.yml`.

---

## 1. Définition du build context dans Docker Compose

Dans `docker-compose.yml`, un service peut définir une section `build` :

```yaml
services:
  apache:
    build:
      context: .
      dockerfile: Dockerfile
```

* **`context`** : le répertoire qui contient **tout le contenu disponible pour le build**.
* **`dockerfile`** : optionnel, permet de spécifier un Dockerfile personnalisé.

Si tu écris simplement :

```yaml
build: .
```

C’est équivalent à la version détaillée ci-dessus. Docker Compose prendra le répertoire courant comme build context et cherchera un fichier nommé `Dockerfile`.

---

## 2. Fonctionnement du build context

1. Docker Compose envoie **tout le contenu du contexte** au démon Docker pour construire l’image.
2. Les fichiers envoyés peuvent être utilisés dans le Dockerfile via `COPY` ou `ADD`.
3. Les fichiers listés dans `.dockerignore` **sont exclus** du build context.

⚠️ Important : si un volume est monté (`.:/var/www/html`), il **écrase le contenu de l’image** à l’exécution, donc les fichiers locaux seront prioritaires.

---

## 3. Exemple concret

```yaml
services:
  web:
    build:
      context: ./app
      dockerfile: Dockerfile
    volumes:
      - ./app:/var/www/html
```

* `context: ./app` → tout ce qui est dans `app/` peut être copié dans l’image.
* Le volume monte `app/` sur `/var/www/html`, donc le code local écrase ce qui est copié dans l’image.
* `.dockerignore` dans `app/` sera respecté, les fichiers listés ne seront pas envoyés.

---

## 4. Bonnes pratiques

1. **Limiter le build context** pour ne pas inclure de fichiers inutiles.
2. **Utiliser `.dockerignore`** pour protéger les fichiers sensibles et réduire la taille du build context.
3. **Faire attention aux volumes** qui peuvent écraser le contenu copié dans l’image.
4. **Rebuild de l’image** avec `docker compose up --build` si le Dockerfile ou le contexte change.

---

## 5. Résumé

* Le build context dans Docker Compose fonctionne **comme `docker build`** : il détermine les fichiers disponibles pour le Dockerfile.
* Les volumes peuvent **écraser l’image**, donc le code local est souvent prioritaire.
* `.dockerignore` est crucial pour **optimiser la taille et la sécurité**.
* Toujours rebuild l’image si le Dockerfile ou le build context change pour que les modifications soient prises en compte.

---

### ⚡ Astuce

Pour voir ce qui est envoyé au démon Docker lors du build :

```bash
docker compose build --progress=plain
```
