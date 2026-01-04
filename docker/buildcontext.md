# le build context dans Docker

Le **build context** est un concept fondamental dans Docker, surtout lorsqu'on construit des images avec un Dockerfile. Il définit **les fichiers et dossiers que Docker peut utiliser pour le build**.

---

## 1. Qu'est-ce que le build context ?

* Le build context est le **répertoire spécifié lors de la commande `docker build`**.
* Docker envoie **tout le contenu de ce répertoire** au démon Docker pour construire l'image.
* Les fichiers à l'extérieur de ce contexte **ne sont pas accessibles** dans le Dockerfile.

Exemple :

```bash
docker build -t monimage .
```

* Ici, le `.` représente le build context (le répertoire courant).
* Tout fichier dans ce répertoire peut être utilisé avec `COPY` ou `ADD`.

---

## 2. Pourquoi le build context est important ?

1. **Accès aux fichiers pour COPY/ADD** :

   ```dockerfile
   COPY ./src /app/src
   ```

   Docker ne pourra copier que les fichiers présents dans le build context.

2. **Performance du build** :

   * Plus le build context est grand, plus Docker doit **transférer de fichiers** au démon, ce qui peut ralentir le build.
   * Utiliser un `.dockerignore` permet de réduire la taille du contexte.

3. **Sécurité et propreté** :

   * Exclure les fichiers sensibles ou inutiles grâce à `.dockerignore`.
   * Éviter d’envoyer des secrets ou des fichiers temporaires au démon Docker.

---

## 3. Bonnes pratiques

1. **Limiter le build context**

   * Lance le build depuis le **dossier racine minimal** contenant uniquement ce qui est nécessaire.

2. **Utiliser `.dockerignore`**

   * Ignore les fichiers volumineux ou inutiles (`.git`, README, tests, node_modules, etc.).

3. **Structure de projet claire**

   * Séparer les fichiers sources nécessaires pour Docker des fichiers locaux ou de documentation.

---

## 4. Exemple concret

Structure de projet :

```
project/
├─ Dockerfile
├─ .dockerignore
├─ src/
├─ public/
├─ README.md
└─ .git/
```

Dockerfile :

```dockerfile
FROM php:8.2-apache
COPY src/ /var/www/html/src/
COPY public/ /var/www/html/public/
```

.dockerignore :

```
.git
README.md
node_modules/
```

* Seuls `src/` et `public/` sont envoyés dans l'image.
* Le reste est ignoré, réduisant la taille du build context et accélérant le build.

---

## 5. Résumé

* Le build context définit **l’ensemble des fichiers disponibles pour Docker lors du build**.
* Docker ne peut utiliser que les fichiers **présents dans ce contexte**.
* Utiliser `.dockerignore` et limiter le contexte rend le build **plus rapide et sécurisé**.

---

### ⚡ Astuce

Pour vérifier le contenu du build context envoyé :

```bash
docker build -t testimage --progress=plain .
```

Tu verras tous les fichiers transférés au démon Docker pendant le build.
