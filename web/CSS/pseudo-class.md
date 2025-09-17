# Les Pseudo-classes en CSS

Les **pseudo-classes** en CSS permettent de cibler un élément **dans un état particulier** (par exemple, lorsqu'il est survolé, sélectionné ou premier dans une liste).  
Elles commencent toujours par un `:`.

---

## 1. Pseudo-classes dynamiques (interactions utilisateur)

### `:hover`
S’applique lorsqu’un utilisateur **survole** un élément avec la souris.

```css
button:hover {
  background-color: blue;
  color: white;
}
```

### `:active`
S’applique lorsqu’un élément est **cliqué** et maintenu.

```css
button:active {
  transform: scale(0.95);
}
```

### `:focus`
S’applique lorsqu’un élément (souvent un champ de formulaire) est **sélectionné**.

```css
input:focus {
  border: 2px solid green;
}
```

### `:visited` et `:link`
- `:link` : liens **jamais visités**  
- `:visited` : liens **déjà visités**

```css
a:link {
  color: blue;
}
a:visited {
  color: purple;
}
```

---

## 2. Pseudo-classes structurelles (position dans le DOM)

### `:first-child` / `:last-child`
Cible le premier ou dernier enfant d’un parent.

```css
p:first-child {
  font-weight: bold;
}
p:last-child {
  color: red;
}
```

### `:nth-child(n)`
Sélectionne les enfants selon un motif.

```css
li:nth-child(2) {
  color: orange; /* 2ème élément */
}

li:nth-child(2n) {
  color: blue; /* éléments pairs */
}

li:nth-child(2n+1) {
  color: green; /* éléments impairs */
}
```

### `:only-child`
Cible un élément qui est le seul enfant de son parent.

```css
div p:only-child {
  color: pink;
}
```

### `:first-of-type` / `:last-of-type`
Cible le premier ou dernier élément d’un type donné.

```css
p:first-of-type {
  text-decoration: underline;
}
```

### `:nth-of-type(n)`
Similaire à `:nth-child` mais appliqué **au type d’élément**.

```css
p:nth-of-type(2) {
  color: teal;
}
```

---

## 3. Pseudo-classes d’état de formulaire

### `:checked`
Cible les cases cochées, boutons radio ou options sélectionnées.

```css
input:checked {
  border: 2px solid red;
}
```

### `:disabled` / `:enabled`
Cible les champs désactivés ou activés.

```css
input:disabled {
  background: lightgray;
}
```

### `:required` / `:optional`
Cible les champs de formulaire obligatoires ou facultatifs.

```css
input:required {
  border: 2px solid red;
}
```

### `:valid` / `:invalid`
Cible les champs dont la valeur est correcte ou incorrecte (selon les règles HTML5).

```css
input:invalid {
  border: 2px solid red;
}
```

---

## 4. Pseudo-classes diverses

### `:not(selector)`
Inverse la sélection.

```css
p:not(.important) {
  color: gray;
}
```

### `:empty`
Cible les éléments **vides** (sans texte ni enfants).

```css
div:empty {
  display: none;
}
```

### `:target`
Cible un élément dont l’**ID correspond à l’ancre dans l’URL**.

```css
#section2:target {
  background-color: yellow;
}
```

---

## 5. Nouveautés (CSS3+)

### `:is()` et `:where()`
Simplifient l’écriture des sélecteurs multiples.  
- `:is()` applique la spécificité du sélecteur le plus fort.  
- `:where()` a une spécificité **nulle**.

```css
:is(h1, h2, h3) {
  color: blue;
}

:where(section p) {
  margin: 0;
}
```

### `:has()`
Sélectionne un élément **en fonction de son contenu** (support limité).

```css
article:has(img) {
  border: 1px solid green;
}
```

---

# Résumé

- **Interaction** : `:hover`, `:active`, `:focus`, `:visited`
- **Structure** : `:first-child`, `:nth-child()`, `:only-child`, `:first-of-type`
- **Formulaire** : `:checked`, `:disabled`, `:required`, `:valid`
- **Divers** : `:not()`, `:empty`, `:target`
- **Modernes** : `:is()`, `:where()`, `:has()`

👉 Les pseudo-classes permettent d’adapter les styles **selon l’état et la position** des éléments, rendant les interfaces plus dynamiques et accessibles.
