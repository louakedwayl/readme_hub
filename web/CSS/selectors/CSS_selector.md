# 🎯 Sélecteurs CSS et sélecteurs d’attribut

## 📌 Introduction

Les **sélecteurs CSS** permettent de choisir quels éléments HTML seront stylés.  
Les **sélecteurs d’attribut** sont un type de sélecteur qui cible les éléments en fonction de leurs **attributs et valeurs**.

---

## 🛠️ Types de sélecteurs CSS

### 1. Sélecteur par type

Sélectionne tous les éléments d’un type donné.

```css
p {
  color: blue;
}
```

### 2. Sélecteur par id

Sélectionne l’élément avec un `id` spécifique.

```css
#header {
  background-color: lightgray;
}
```

### 3. Sélecteur par classe

Sélectionne tous les éléments avec une classe donnée.

```css
.container {
  padding: 20px;
}
```

### 4. Sélecteur universel

Sélectionne tous les éléments.

```css
* {
  margin: 0;
  padding: 0;
}
```

### 5. Sélecteurs combinés

- **Descendant** : `div p` → tous les `<p>` à l’intérieur d’un `<div>`.  
- **Enfant direct** : `div > p` → tous les `<p>` enfants directs d’un `<div>`.  
- **Adjacent** : `h1 + p` → `<p>` juste après un `<h1>`.  
- **Frère général** : `h1 ~ p` → tous les `<p>` après un `<h1>` au même niveau.

---

## 🛠️ Sélecteurs d’attribut

Permettent de cibler les éléments en fonction de leurs **attributs** et valeurs.

### 1. `[attribut]`

Sélectionne tous les éléments ayant l’attribut.

```css
input[required] {
  border: 2px solid red;
}
```

### 2. `[attribut="valeur"]`

Sélectionne tous les éléments dont l’attribut a **exactement** cette valeur.

```css
input[type="text"] {
  background-color: lightyellow;
}
```

### 3. `[attribut~="valeur"]`

Sélectionne les éléments dont l’attribut contient la **valeur dans une liste séparée par des espaces**.

```css
div[class~="highlight"] {
  background-color: yellow;
}
```

### 4. `[attribut|="valeur"]`

Sélectionne les éléments dont l’attribut est **exactement la valeur ou commence par "valeur-"**.

```css
a[lang|="fr"] {
  color: blue;
}
```

### 5. `[attribut^="valeur"]` (commence par)

```css
a[href^="https"] {
  font-weight: bold;
}
```

### 6. `[attribut$="valeur"]` (se termine par)

```css
img[src$=".png"] {
  border: 1px solid gray;
}
```

### 7. `[attribut*="valeur"]` (contient)

```css
a[href*="example"] {
  text-decoration: underline;
}
```

---

## 💡 Astuces

- Les sélecteurs d’attribut sont **très puissants** pour cibler des éléments sans ajouter de classes ou d’ids.  
- On peut **combiner sélecteurs** :

```css
input[type="text"].important {
  border: 2px solid red;
}
```

- Pour des formulaires et boutons, les sélecteurs d’attribut sont utiles :

```css
button[type="submit"] {
  background-color: green;
  color: white;
}
```

---

