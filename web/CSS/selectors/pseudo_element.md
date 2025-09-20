# 🎨 Les Pseudo-éléments en CSS

Les **pseudo-éléments** en CSS permettent de **styliser une partie spécifique d’un élément**, ou d’ajouter du contenu généré sans l’inclure directement dans le HTML.  
Ils commencent par `::` (double deux-points).

---

## 1. Différence avec les pseudo-classes

- **Pseudo-classes (`:`)** : ciblent un **état** d’un élément (ex. `:hover`, `:first-child`).  
- **Pseudo-éléments (`::`)** : ciblent une **partie précise** d’un élément (ex. `::before`, `::first-line`).  

👉 Exemple :  

```css
p::first-line {
  color: red;
}
```

Ici, seule la première ligne du paragraphe sera rouge.

---

## 2. Syntaxe générale

```css
sélecteur::pseudo-élément {
  propriété: valeur;
}
```

---

## 3. Les pseudo-éléments courants

### 3.1 `::before`
- Ajoute du contenu **avant** le contenu de l’élément.
- Nécessite `content`.

```css
h1::before {
  content: "🔥 ";
}
```

---

### 3.2 `::after`
- Ajoute du contenu **après** l’élément.
- Très utile pour des décorations.

```css
h1::after {
  content: " ✅";
}
```

---

### 3.3 `::first-line`
- Cible la **première ligne** d’un élément block.

```css
p::first-line {
  font-weight: bold;
  color: blue;
}
```

---

### 3.4 `::first-letter`
- Cible la **première lettre** d’un texte.
- Idéal pour créer des effets typographiques (lettrines).

```css
p::first-letter {
  font-size: 2em;
  color: crimson;
}
```

---

### 3.5 `::selection`
- Cible la partie du texte **sélectionnée par l’utilisateur**.

```css
p::selection {
  background: yellow;
  color: black;
}
```

---

### 3.6 `::marker`
- Cible le **marqueur** des listes (`<ul>` et `<ol>`).

```css
li::marker {
  color: red;
  font-size: 1.2em;
}
```

---

### 3.7 `::placeholder`
- Cible le texte d’indication dans un champ `<input>` ou `<textarea>`.

```css
input::placeholder {
  color: gray;
  font-style: italic;
}
```

---

## 4. Exemple complet

```html
<h1>Titre</h1>
<p>Bonjour, ceci est un exemple avec des pseudo-éléments.</p>
<ul>
  <li>Élément 1</li>
  <li>Élément 2</li>
</ul>
<input placeholder="Entrez votre nom">
```

```css
h1::before {
  content: "👉 ";
}

h1::after {
  content: " 👈";
}

p::first-letter {
  font-size: 2em;
  color: crimson;
}

p::selection {
  background: yellow;
}

li::marker {
  color: green;
}

input::placeholder {
  color: gray;
  font-style: italic;
}
```

---

## 5. Résumé

- Les pseudo-éléments permettent de **cibler une partie précise** d’un élément.  
- Les plus utilisés : `::before`, `::after`, `::first-line`, `::first-letter`.  
- Ils sont très utiles pour la **décoration** et l’**amélioration de l’expérience utilisateur**.  
