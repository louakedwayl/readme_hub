# Le cache du navigateur et le CSS

## 1. Qu’est-ce que le cache du navigateur ?

Le **cache du navigateur** est un mécanisme qui permet à un navigateur web de **stocker temporairement des fichiers** (HTML, CSS, JS, images, polices…) pour **accélérer le chargement des pages web**.

### Pourquoi le cache existe ?

* Réduire le temps de chargement des pages.
* Réduire la consommation de bande passante.
* Améliorer l’expérience utilisateur.

Quand tu visites une page, le navigateur regarde d’abord si le fichier demandé est déjà en cache. Si oui, il le charge depuis le cache au lieu de le re-télécharger depuis le serveur.

---

## 2. Pourquoi le CSS reste parfois « bloqué » à l’ancienne version ?

Même après avoir changé ton fichier CSS, le navigateur peut **continuer à afficher l’ancienne version**. C’est à cause du cache.

### Comment le navigateur décide de garder le CSS ?

1. **Expiration du cache (Cache-Control / Expires)**
   Le serveur peut indiquer combien de temps un fichier peut rester dans le cache. Exemple :

   ```http
   Cache-Control: max-age=3600
   ```

   Ici, le fichier peut être utilisé depuis le cache pendant **1 heure** avant de vérifier une nouvelle version.

2. **ETag (Entity Tag)**
   C’est une sorte d’empreinte unique d’un fichier. Si le fichier n’a pas changé, le navigateur garde sa version en cache. Sinon, il le recharge.

3. **Nom de fichier identique**
   Si ton CSS a le même nom (`main.css`) et que le serveur n’indique pas au navigateur de vérifier les mises à jour, le navigateur utilisera le fichier en cache.

---

## 3. Comment forcer le navigateur à prendre la nouvelle version du CSS ?

### a) Rechargement forcé

* **Windows/Linux** : `Ctrl + F5` ou `Ctrl + Shift + R`
* **Mac** : `Cmd + Shift + R`
  Cela ignore le cache et recharge tous les fichiers depuis le serveur.

### b) Changer le nom du fichier ou ajouter un paramètre

* Exemple :

```html
<link rel="stylesheet" href="main.css?v=2">
```

Le navigateur considère `main.css?v=2` comme un fichier **différent**, donc il le recharge.

### c) Configurer le serveur

* **Cache-Control** :

```http
Cache-Control: no-cache
```

* Ou définir une durée courte pour les fichiers CSS/JS en développement.

---

## 4. Bonnes pratiques pour le CSS et le cache

1. **Pendant le développement** :

   * Désactiver le cache ou utiliser des rechargements forcés.
   * Ajouter des versions ou hashes aux fichiers CSS (`main.css?v=12345`).

2. **En production** :

   * Utiliser le cache pour améliorer les performances.
   * Ajouter un **hash unique** au nom de fichier CSS à chaque mise à jour (`main.abc123.css`) pour forcer le navigateur à prendre la nouvelle version.

---

### Exemple concret :

```html
<!-- Développement -->
<link rel="stylesheet" href="style.css?v=dev1">

<!-- Production -->
<link rel="stylesheet" href="style.ef32a1.css">
```

Le hash `ef32a1` change à chaque build, ce qui force le navigateur à récupérer le CSS mis à jour.
