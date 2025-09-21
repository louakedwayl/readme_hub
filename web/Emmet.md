# Emmet

Emmet est un outil intégré dans VS Code (et d'autres éditeurs) qui permet de **générer rapidement du code HTML et CSS** à partir d’abréviations.
Il suffit de taper l’abréviation et d’appuyer sur **Tab** pour développer le code complet.

---

## 1. Emmet pour HTML

### 1.1 Balises simples

* `div` → `<div></div>`
* `p` → `<p></p>`

### 1.2 Multiplication de balises

* `div*4` → génère 4 divs :

```html
<div></div>
<div></div>
<div></div>
<div></div>
```

### 1.3 Imbrication de balises

* `ul>li*3` →

```html
<ul>
  <li></li>
  <li></li>
  <li></li>
</ul>
```

### 1.4 IDs et classes

* `div#header` → `<div id="header"></div>`
* `div.container` → `<div class="container"></div>`
* `div#header.container` → `<div id="header" class="container"></div>`

### 1.5 Texte et numérotation

* `p{Bonjour le monde}` → `<p>Bonjour le monde</p>`
* `ul>li{Item $}*3` →

```html
<ul>
  <li>Item 1</li>
  <li>Item 2</li>
  <li>Item 3</li>
</ul>
```

### 1.6 Combinaisons avancées

* `div>ul>li*3` →

```html
<div>
  <ul>
    <li></li>
    <li></li>
    <li></li>
  </ul>
</div>
```

---

## 2. Emmet pour CSS

### 2.1 Propriétés rapides

* `m10` → `margin: 10px;`
* `p20` → `padding: 20px;`
* `w100` → `width: 100px;`
* `h50` → `height: 50px;`

### 2.2 Couleurs et bordures

* `bgc#f00` → `background-color: #f00;`
* `c#fff` → `color: #fff;`
* `bd1#000` → `border: 1px solid #000;`

### 2.3 Abréviations multiples

* `m10 p5` →

```css
margin: 10px;
padding: 5px;
```

---

## 3. Tableau complet de raccourcis utiles

| Abréviation                      | Résultat                            | Explication                |
| -------------------------------- | ----------------------------------- | -------------------------- |
| `div*4`                          | 4 divs                              | Répète la balise 4 fois    |
| `ul>li*3`                        | Liste 3 items                       | Imbrication                |
| `div#header`                     | `<div id="header"></div>`           | Div avec ID                |
| `div.container`                  | `<div class="container"></div>`     | Div avec classe            |
| `p{Bonjour}`                     | `<p>Bonjour</p>`                    | Texte dans balise          |
| `ul>li{Item $}*3`                | Liste numérotée                     | `$` remplace par le numéro |
| `a[href="https://ex.com"]{Lien}` | `<a href="https://ex.com">Lien</a>` | Lien avec texte            |
| `img[src="img.jpg" alt=""]`      | `<img src="img.jpg" alt="">`        | Image                      |
| `m10`                            | `margin: 10px;`                     | CSS marge                  |
| `p20`                            | `padding: 20px;`                    | CSS padding                |
| `w100`                           | `width: 100px;`                     | CSS largeur                |
| `h50`                            | `height: 50px;`                     | CSS hauteur                |
| `bgc#f00`                        | `background-color: #f00;`           | Couleur de fond            |
| `c#fff`                          | `color: #fff;`                      | Couleur texte              |
| `bd1#000`                        | `border: 1px solid #000;`           | Bordure                    |

---

## 4. Astuces

* `>` → enfant direct
* `+` → frère direct
* `*` → multiplication
* `$` → numéro automatique pour répétition `{Item $}`
* Emmet fonctionne aussi pour **JSX / React**, **SCSS**, **Less**

---

## 5. Exemple complet

Abbréviation :

```
section#main.container>h1{Titre}+p{Paragraphe}+ul>li{Item $}*3
```

Résultat HTML :

```html
<section id="main" class="container">
  <h1>Titre</h1>
  <p>Paragraphe</p>
  <ul>
    <li>Item 1</li>
    <li>Item 2</li>
    <li>Item 3</li>
  </ul>
</section>
```

---
