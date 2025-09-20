# 📦 Le Système des Boîtes en CSS

En CSS, **tous les éléments HTML sont représentés comme des boîtes**.  
Comprendre le système de boîtes est fondamental pour bien gérer la mise en page.

---

## 1. La boîte CSS (CSS Box Model)

Chaque élément est une boîte composée de plusieurs couches :

```
┌───────────────────────────────┐
│           margin              │
│ ┌───────────────────────────┐ │
│ │          border           │ │
│ │ ┌───────────────────────┐ │ │
│ │ │       padding         │ │ │
│ │ │ ┌───────────────────┐ │ │ │
│ │ │ │     content       │ │ │ │
│ │ │ └───────────────────┘ │ │ │
│ │ └───────────────────────┘ │ │
│ └───────────────────────────┘ │
└───────────────────────────────┘
```

---

## 2. Les parties de la boîte

1. **Content**  
   - Contenu de l’élément (texte, image, etc.).
   - Déterminé par `width` et `height`.

2. **Padding**  
   - Espace **entre le contenu et la bordure**.
   - Défini avec `padding`.

3. **Border**  
   - Entoure le padding et le contenu.
   - Défini avec `border`.

4. **Margin**  
   - Espace **extérieur** entre la boîte et les éléments voisins.
   - Défini avec `margin`.

---

## 3. Dimensions d’une boîte

Par défaut, la taille totale d’un élément est calculée ainsi :

```
Largeur totale = width + padding gauche + padding droit + border gauche + border droit + margin gauche + margin droit
Hauteur totale = height + padding haut + padding bas + border haut + border bas + margin haut + margin bas
```

---

## 4. La propriété `box-sizing`

- **`content-box`** (par défaut)  
  - `width` et `height` ne concernent que le **contenu**.
  - Padding et border s’ajoutent autour.

- **`border-box`**  
  - `width` et `height` incluent le contenu **+ padding + border**.
  - Plus simple pour calculer les tailles.

👉 Exemple :

```css
/* Par défaut */
div {
  box-sizing: content-box;
  width: 200px; /* seulement le contenu */
}

/* Pratique pour la mise en page */
div {
  box-sizing: border-box;
  width: 200px; /* inclut border + padding */
}
```

---

## 5. Types de boîtes

1. **Boîte de bloc (block-level)**  
   - Occupe toute la largeur disponible.
   - Commence sur une nouvelle ligne.  
   - Exemples : `<div>`, `<p>`, `<h1>`...

2. **Boîte en ligne (inline-level)**  
   - N’occupe que l’espace de son contenu.
   - Ne commence pas sur une nouvelle ligne.  
   - Exemples : `<span>`, `<a>`, `<strong>`...

3. **Boîte en ligne-bloc (inline-block)**  
   - Se comporte comme inline mais accepte `width` et `height`.

---

## 6. Exemple pratique

```html
<div class="box">Boîte CSS</div>
```

```css
.box {
  width: 200px;
  height: 100px;
  padding: 20px;
  border: 5px solid black;
  margin: 15px;
  box-sizing: border-box;
}
```

✅ Ici, la boîte fera **200px de large en tout**, car `border-box` inclut padding et border.

---

## 7. Résumé

- Chaque élément est une **boîte CSS**.  
- Une boîte est composée de **content → padding → border → margin**.  
- `box-sizing: border-box` simplifie la gestion des tailles.  
- Trois grands types de boîtes : **block, inline, inline-block**.  
