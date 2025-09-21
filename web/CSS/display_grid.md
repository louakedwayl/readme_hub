# CSS Grid

## 1. Introduction à CSS Grid

CSS Grid est un système de mise en page bidimensionnel pour le web, ce qui signifie qu'il peut gérer à la fois les lignes (rows) et les colonnes (columns). Contrairement à Flexbox, qui est principalement un système unidimensionnel, Grid permet de créer des mises en page complexes de manière simple.

## 2. Terminologie clé

* **Grid container** : L’élément parent qui active le modèle de grille avec `display: grid`.
* **Grid item** : Les enfants directs du container qui deviennent des éléments de la grille.
* **Grid line** : Les lignes imaginaires qui séparent les colonnes et les rangées.
* **Grid track** : L’espace entre deux lignes (une colonne ou une rangée).
* **Grid cell** : L’intersection d’une ligne de colonne et d’une ligne de rangée.
* **Grid area** : Une zone rectangulaire composée de plusieurs cellules de la grille.

## 3. Usage

- Créer une grille 
```css
.container {
display: grid;
}
```
---

- Définir les colonnes et lignes
```css
.container-columns-rows {
display: grid;
grid-template-columns: 200px 200px 200px; /* 3 colonnes de 200px */
grid-template-rows: 100px 100px; /* 2 lignes de 100px */
gap: 10px; /* espace de 10px entre lignes et colonnes */
}
```
---

- Séparer gap vertical et horizontal
```css
.container-gap {
display: grid;
row-gap: 15px; /* espace entre les lignes */
column-gap: 20px; /* espace entre les colonnes */
}
```
---

### Unités utiles :

* `px` : pixels fixes.
* `%` : pourcentage du container.
* `fr` : fraction de l’espace disponible.
* `auto` : s’adapte automatiquement au contenu.

```css
.container {
  display: grid;
  grid-template-columns: 1fr 2fr 1fr;
  grid-template-rows: auto auto;
  gap: 20px;
}
```
---

## 4. Placer les éléments dans la grille

Une fois qu’une **grille est définie** avec `grid-template-columns` et `grid-template-rows`, tu peux **placer tes éléments enfants** en précisant **sur quelles lignes** ils doivent commencer et finir.

---

### 4.1. Placement avec `grid-column` et `grid-row`

Chaque cellule d’une grille est délimitée par des **lignes de grille** (grid lines).  
Ces lignes sont numérotées à partir de **1**, horizontalement (colonnes) et verticalement (lignes).

```css
.item1 {
  grid-column: 1 / 3; /* de la ligne 1 à la ligne 3 → occupe 2 colonnes */
  grid-row: 1 / 2;   /* de la ligne 1 à la ligne 2 → occupe 1 ligne */
}
```

👉 Ici, `.item1` s’étend de la **colonne 1** à la **colonne 3** (donc deux colonnes de large).  
En hauteur, il occupe seulement la première ligne.

---

### 4.2. Utilisation de `span` (s’étendre sur plusieurs cellules)

Plutôt que de compter les lignes manuellement, tu peux dire :  
> "cet élément doit **s’étendre sur X colonnes ou lignes**".

```css
.item2 {
  grid-column: 2 / span 2; /* commence à la ligne 2 et occupe 2 colonnes */
}

.item3 {
  grid-row: 1 / span 3; /* commence à la ligne 1 et occupe 3 lignes */
}
```

➡️ `.item2` s’étend sur **2 colonnes**.  
➡️ `.item3` s’étend sur **3 lignes de hauteur**.

---

### 4.3. Placement simplifié avec `grid-area` (shorthand)

Tu peux combiner **row** et **column** dans une seule propriété :

```css
.item4 {
  grid-area: 1 / 2 / 3 / 4;
}
```

Cela correspond à :  
```css
grid-row: 1 / 3;
grid-column: 2 / 4;
```

📖 Ordre des valeurs dans `grid-area` :  
```
grid-area: row-start / column-start / row-end / column-end;
```

---

### 4.4. Nommer des zones avec `grid-template-areas`

Tu peux aussi créer des **zones nommées** pour placer les éléments plus facilement :

```css
.container {
  display: grid;
  grid-template-areas:
    "header header header"
    "sidebar main main"
    "footer footer footer";
}

.header  { grid-area: header; }
.sidebar { grid-area: sidebar; }
.main    { grid-area: main; }
.footer  { grid-area: footer; }
```

➡️ C’est très lisible :  
- `header` occupe toute la première ligne.  
- `sidebar` occupe la première colonne de la 2e ligne.  
- `main` occupe les deux dernières colonnes de la 2e ligne.  
- `footer` occupe toute la 3e ligne.

---

✅ **Résumé** :  
- `grid-column` et `grid-row` → placement précis par lignes.  
- `span` → étendre sur plusieurs colonnes ou lignes.  
- `grid-area` → version raccourcie (ou zones nommées pour plus de lisibilité).
---

## 5. Alignement dans Grid

### Alignement des items dans leur cellule

* `justify-items` : horizontal (start, center, end, stretch)
* `align-items` : vertical (start, center, end, stretch)

```css
.container {
  display: grid;
  justify-items: center;
  align-items: center;
}
```

### Alignement de toute la grille dans le container

* `justify-content` : horizontal
* `align-content` : vertical

## 6. Répétition et simplification

```css
grid-template-columns: repeat(3, 200px);
grid-template-rows: repeat(2, 100px);
```

## 7. Auto-placement et responsive

* `grid-auto-flow: row | column;`
* `minmax(min, max)`
* `auto-fit` et `auto-fill`

```css
.container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
  gap: 10px;
}
```

## 8. Avantages de CSS Grid

* Gestion facile des mises en page complexes.
* Compatible avec Flexbox.
* Responsive design simplifié.
* Placement précis et alignement facile.

## 9. Ressource

- Pour s'entrainer Avec Grid Garden https://cssgridgarden.com/
