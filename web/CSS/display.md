# 🎨 La propriété CSS `display`

La propriété **`display`** définit la manière dont un élément HTML est affiché dans la page, c’est-à-dire son **mode de rendu** et son **comportement dans le flux**.  
C’est une des propriétés CSS les plus utilisées pour construire des mises en page.

---

## 1. Syntaxe

```css
element {
  display: valeur;
}
```

---

## 2. Les principales valeurs de `display`

### 2.1 `block`
- L’élément occupe **toute la largeur disponible**.  
- Il commence **toujours sur une nouvelle ligne**.  
- On peut définir `width`, `height`, `margin`, `padding`.  
- Exemples : `<div>`, `<p>`, `<h1>`...

```css
div {
  display: block;
}
```

---

### 2.2 `inline`
- L’élément occupe seulement **la largeur de son contenu**.  
- Il **ne commence pas** sur une nouvelle ligne.  
- Impossible de définir `width` ou `height`.  
- Exemples : `<span>`, `<a>`, `<strong>`...

```css
span {
  display: inline;
}
```

---

### 2.3 `inline-block`
- Mélange des deux : se comporte comme `inline` (reste sur la même ligne),  
  mais accepte `width`, `height`, `margin`, `padding`.  
- Très utile pour aligner plusieurs boîtes horizontalement.

```css
button {
  display: inline-block;
}
```

---

### 2.4 `none`
- L’élément est **complètement retiré du flux**.  
- Il ne prend **aucune place** (contrairement à `visibility: hidden` qui cache mais garde l’espace).

```css
#popup {
  display: none;
}
```

---

### 2.5 `flex`
- Active le **mode flexbox** sur le conteneur.  
- Permet d’aligner et de répartir facilement les éléments enfants.  

```css
.container {
  display: flex;
  justify-content: center;
  align-items: center;
}
```

---

### 2.6 `grid`
- Active le **mode CSS Grid Layout**.  
- Permet de créer des grilles bidimensionnelles (lignes + colonnes).  

```css
.container {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
}
```

---

### 2.7 `inline-flex` et `inline-grid`
- Même principe que `flex` et `grid`, mais le conteneur reste **en ligne** dans le flux.  

```css
nav {
  display: inline-flex;
}
```

---

### 2.8 Autres valeurs utiles
- **`table`**, `table-row`, `table-cell` : reproduisent le comportement d’un tableau HTML.  
- **`list-item`** : affiche comme un élément de liste (avec un marqueur).  
- **`run-in`**, `contents`, `flow-root` : plus rares et utilisés dans des cas spécifiques.  

---

## 3. Exemple comparatif

```html
<div class="block">Block</div>
<span class="inline">Inline</span>
<div class="inline-block">Inline-block</div>
```

```css
.block {
  display: block;
  background: lightblue;
  width: 200px;
  height: 50px;
}

.inline {
  display: inline;
  background: pink;
  width: 200px; /* Ignoré */
  height: 50px; /* Ignoré */
}

.inline-block {
  display: inline-block;
  background: lightgreen;
  width: 200px;
  height: 50px;
}
```

---

## 4. Résumé

- `block` → occupe toute la largeur.  
- `inline` → reste dans le flux du texte, pas de `width/height`.  
- `inline-block` → en ligne mais redimensionnable.  
- `none` → l’élément disparaît.  
- `flex` → active flexbox.  
- `grid` → active grid.  
- Variantes : `inline-flex`, `inline-grid`, `table`, `list-item`...

---

👉 En résumé, `display` contrôle **comment un élément est affiché** et c’est la **clé de toute mise en page CSS**.  
