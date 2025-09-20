# 🎨 Les couleurs en CSS

En CSS, les couleurs permettent de définir l’apparence visuelle des éléments, que ce soit pour le **texte**, les **fonds**, les **bordures** ou encore les **ombres**.

## 1. Propriétés principales liées aux couleurs

* **`color`** → définit la couleur du **texte**.

  ```css
  p {
    color: red;
  }
  ```

* **`background-color`** → définit la couleur de **fond** d’un élément.

  ```css
  div {
    background-color: lightblue;
  }
  ```

* **`border-color`** → définit la couleur de la **bordure**.

  ```css
  .box {
    border: 2px solid green;
  }
  ```

* **`outline-color`**, `text-decoration-color`, `box-shadow`, etc. → d’autres propriétés utilisent aussi des couleurs.

## 2. Les différentes façons d’écrire une couleur

### a) Noms de couleurs

CSS reconnaît environ **140 noms de couleurs prédéfinis** :

```css
h1 {
  color: blue;      /* Bleu */
}
p {
  color: crimson;   /* Rouge profond */
}
```

### b) Hexadécimal (`#RRGGBB`)

Format le plus courant :

* `#RRGGBB` → 2 chiffres hexadécimaux par composante (rouge, vert, bleu).
* `#RGB` → version courte.

```css
p {
  color: #ff0000;  /* rouge */
}
span {
  color: #0f0;     /* vert (abrégé) */
}
```

### c) RGB et RGBA

* `rgb(r, g, b)` → chaque composante de 0 à 255.
* `rgba(r, g, b, a)` → ajoute un canal alpha (`a`) pour la transparence (0 = transparent, 1 = opaque).

```css
div {
  background-color: rgb(255, 165, 0);    /* orange */
}
div.transparent {
  background-color: rgba(255, 0, 0, 0.5); /* rouge à 50% */
}
```

### d) HSL et HSLA

* `hsl(hue, saturation, lightness)` :

  * **hue (teinte)** : 0–360° sur la roue chromatique
  * **saturation** : % d’intensité de la couleur
  * **lightness** : % de luminosité
* `hsla(h, s, l, a)` : avec transparence.

```css
h1 {
  color: hsl(200, 100%, 50%);   /* bleu pur */
}
h2 {
  color: hsla(120, 60%, 40%, 0.7); /* vert foncé semi-transparent */
}
```

## 3. Transparence et mot-clés spéciaux

* `transparent` → couleur complètement transparente.
* `currentColor` → prend la valeur actuelle de la propriété `color`.

```css
button {
  color: black;
  border: 2px solid currentColor; /* hérite du texte */
}
```

## 4. Nouveautés CSS modernes

### a) `color()` et \`la
