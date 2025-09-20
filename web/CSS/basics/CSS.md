# Introduction au CSS

CSS (Cascading Style Sheets) est le langage utilisé pour **mettre en forme les pages web** créées avec HTML. Il permet de modifier les couleurs, polices, tailles, marges, positions, et bien plus.

---

## 1. Les trois façons d’ajouter du CSS

### 1.1 CSS en ligne (inline)

Directement dans une balise HTML avec l’attribut `style` :

```html
<p style="color: red; font-size: 16px;">Texte rouge</p>
```

* Rapide mais peu pratique pour de grands projets.

### 1.2 CSS interne (internal)

Dans une balise `<style>` dans le `<head>` :

```html
<head>
  <style>
    p {
      color: blue;
      font-size: 18px;
    }
  </style>
</head>
```

* Utile pour une page unique.

### 1.3 CSS externe (external)

Dans un fichier séparé `.css`, relié avec `<link>` :

```html
<head>
  <link rel="stylesheet" href="styles.css">
</head>
```

`styles.css` :

```css
p {
  color: green;
  font-size: 20px;
}
```

* Meilleure pratique pour plusieurs pages.

---

## 2. Sélecteurs CSS

### 2.1 Sélecteur de type

```css
p {
  color: red;
}
```

* Affecte **tous les `<p>`** de la page.

### 2.2 Sélecteur de classe

```css
.mon-paragraphe {
  font-size: 18px;
}
```

* Dans HTML : `<p class="mon-paragraphe">Texte</p>`
* Peut s’appliquer à plusieurs éléments.

### 2.3 Sélecteur d’ID

```css
#titre-principal {
  text-align: center;
}
```

* Dans HTML : `<h1 id="titre-principal">Bienvenue</h1>`
* Doit être unique sur la page.

### 2.4 Sélecteurs combinés

```css
div p {
  color: blue;
}
```

* Cible les `<p>` **dans un `<div>`**.

---

## 3. Propriétés CSS courantes

### 3.1 Texte

```css
p {
  color: #333333;   /* couleur du texte */
  font-size: 16px;  /* taille de la police */
  font-family: Arial, sans-serif; /* police */
  text-align: center; /* alignement */
}
```

### 3.2 Couleurs et arrière-plan

```css
body {
  background-color: #f0f0f0;
}
```

### 3.3 Marges et paddings

```css
div {
  margin: 20px;  /* espace autour de l'élément */
  padding: 10px; /* espace à l'intérieur */
}
```

### 3.4 Bordures

```css
img {
  border: 2px solid black;
  border-radius: 10px; /* coins arrondis */
}
```

### 3.5 Dimensions

```css
div {
  width: 300px;
  height: 150px;
}
```

### 3.6 Affichage et positionnement

```css
span {
  display: inline-block;
}

div {
  position: relative;
  top: 10px;
  left: 20px;
}
```

---

## 4. Commentaires

```css
/* Ceci est un commentaire */
```

---

## 5. Bonnes pratiques

* Séparer le HTML et le CSS (fichier externe).
* Utiliser des noms de classes clairs et cohérents.
* Indenter et organiser le CSS pour la lisibilité.
* Éviter les styles inline sauf pour tests rapides.

---

