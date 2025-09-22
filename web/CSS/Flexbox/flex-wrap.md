# Flexbox : La propriété `flex-wrap`

En Flexbox, par défaut, les éléments d’un conteneur s’alignent sur une seule ligne. La propriété **`flex-wrap`** permet de contrôler si les éléments doivent **rester sur une seule ligne** ou **passer à la ligne suivante** lorsque l’espace disponible est insuffisant.

---

## 1. Syntaxe

```css
.container {
  display: flex;
  flex-wrap: nowrap | wrap | wrap-reverse;
}
```

- `nowrap` (valeur par défaut) : tous les éléments restent sur une seule ligne, même s’ils débordent du conteneur.  
- `wrap` : les éléments passent automatiquement à la ligne suivante si nécessaire.  
- `wrap-reverse` : même comportement que `wrap`, mais les lignes se positionnent **dans l’ordre inverse** (de bas en haut ou de droite à gauche selon la direction).

---

## 2. Exemple de base

HTML :

```html
<div class="container">
  <div class="box">1</div>
  <div class="box">2</div>
  <div class="box">3</div>
  <div class="box">4</div>
  <div class="box">5</div>
</div>
```

CSS :

```css
.container {
  display: flex;
  flex-wrap: wrap;
  gap: 10px; /* espace entre les éléments */
}

.box {
  width: 100px;
  height: 100px;
  background-color: lightblue;
  display: flex;
  justify-content: center;
  align-items: center;
}
```

**Résultat :**  
Les `.box` s’alignent horizontalement jusqu’à ce qu’il n’y ait plus de place, puis passent à la ligne suivante.

---

## 3. `flex-wrap` et `flex-direction`

- Avec `flex-direction: row` (ligne par défaut) : les éléments s’empilent **horizontalement** et créent de nouvelles lignes si nécessaire.  
- Avec `flex-direction: column` : les éléments s’empilent **verticalement** et créent de nouvelles colonnes si nécessaire.

---

## 4. Utilisation avec `flex-flow`

La propriété **`flex-flow`** combine `flex-direction` et `flex-wrap` :

```css
.container {
  display: flex;
  flex-flow: row wrap;
}
```

- Première valeur : direction (`row` ou `column`)  
- Deuxième valeur : wrap (`nowrap`, `wrap` ou `wrap-reverse`)  

---

## 5. Conseils pratiques

- Toujours utiliser `gap` pour espacer les éléments et éviter qu’ils ne se touchent.  
- `flex-wrap: wrap` est très utile pour les **grilles responsives**.  
- Combiner avec `justify-content` et `align-items` pour un meilleur alignement des éléments.  

---

**Exemple complet responsive :**

```css
.container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
}
```

> Les éléments s’adaptent à la largeur du conteneur et restent bien alignés sur plusieurs lignes.
