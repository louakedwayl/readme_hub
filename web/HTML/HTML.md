# Introduction à HTML

HTML (HyperText Markup Language) est le langage de base pour créer des pages web. Il permet de structurer le contenu d’une page à l’aide de **balises** et d’**éléments HTML**.

---

## 1. Structure de base d’une page HTML

```html
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ma première page</title>
</head>
<body>
    <h1>Bonjour le monde !</h1>
    <p>Ceci est un paragraphe.</p>
</body>
</html>
```

Explications :

* `<!DOCTYPE html>` : indique que le document est en HTML5.
* `<html>` : racine du document HTML.
* `<head>` : contient les informations sur la page (titre, encodage, styles...).
* `<body>` : contient le contenu visible de la page.

---

## 2. Balises et éléments HTML

### Balise

* Une **balise** est le code que tu écris, comme `<p>` ou `<h1>`.

### Élément HTML

* Un **élément HTML** est constitué de la balise ouvrante, de son contenu (éventuellement vide) et de la balise fermante.

Exemple :

```html
<p>Ceci est un paragraphe.</p>
```

* `<p>` : balise ouvrante
* `</p>` : balise fermante
* `<p>Ceci est un paragraphe.</p>` : élément HTML complet

Exemple d’élément vide :

```html
<img src="image.png" alt="Une image">
```

* L’élément `<img>` n’a pas de contenu texte mais reste un élément HTML.

---

## 3. Les balises principales

### Titres

```html
<h1>Titre principal</h1>
<h2>Sous-titre</h2>
<h3>...</h3>
```

* `<h1>` à `<h6>` : titres du plus important (`h1`) au moins important (`h6`).

### Paragraphes

```html
<p>Ceci est un paragraphe.</p>
```

### Liens

```html
<a href="https://www.example.com">Visiter Example</a>
```

* `href` définit l’URL de destination.

### Images

```html
<img src="image.png" alt="Description de l'image">
```

* `src` : chemin vers l’image
* `alt` : texte alternatif si l’image ne s’affiche pas

### Listes

#### Liste non ordonnée

```html
<ul>
    <li>Élément 1</li>
    <li>Élément 2</li>
</ul>
```

#### Liste ordonnée

```html
<ol>
    <li>Premier</li>
    <li>Deuxième</li>
</ol>
```

---

## 4. Attributs HTML

Les balises peuvent avoir des **attributs** qui modifient leur comportement.

```html
<a href="https://www.example.com" target="_blank">Ouvrir dans un nouvel onglet</a>
```

* `target="_blank"` ouvre le lien dans un nouvel onglet.

---

## 5. Commentaires

Les commentaires ne s’affichent pas sur la page :

```html
<!-- Ceci est un commentaire -->
```

---

## 6. Bonnes pratiques

* Toujours fermer les balises (ex : `<p></p>`).
* Utiliser des noms clairs pour les fichiers et images.
* Indenter correctement le code pour le rendre lisible.

---
