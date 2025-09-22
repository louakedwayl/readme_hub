# CSS Flexbox

## 1. Introduction à Flexbox

Flexbox est un modèle de mise en page unidimensionnel en CSS. Il permet de disposer les éléments soit en ligne (horizontalement) soit en colonne (verticalement) de manière flexible. Flexbox est idéal pour les composants, barres de navigation, galeries, ou n’importe quel élément nécessitant un alignement et un espacement précis.

## 2. Terminologie clé

* **Flex container** : L’élément parent qui active le modèle flex avec `display: flex`.
* **Flex item** : Les enfants directs du container.
* **Main axis** : L’axe principal selon lequel les items sont disposés.
* **Cross axis** : L’axe perpendiculaire à l’axe principal.
* **Flex line** : Une ligne de flex items (utile si `flex-wrap` est activé).

## 3. Créer un container flex

```css
.container {
  display: flex;
}
```

### Axes et direction

```css
flex-direction: row;
flex-direction: row-reverse;
flex-direction: column;
flex-direction: column-reverse;
```

### Wrap

```css
flex-wrap: nowrap;
flex-wrap: wrap;
flex-wrap: wrap-reverse;
```

### Raccourci

```css
flex-flow: row wrap;
```

## 4. Alignement des items

### Sur l’axe principal

```css
justify-content: flex-start;
justify-content: flex-end;
justify-content: center;
justify-content: space-between;
justify-content: space-around;
justify-content: space-evenly;
```

### Sur l’axe transversal

```css
align-items: flex-start;
align-items: flex-end;
align-items: center;
align-items: baseline;
align-items: stretch;
```

### Alignement de plusieurs lignes

```css
align-content: flex-start;
align-content: flex-end;
align-content: center;
align-content: space-between;
align-content: space-around;
align-content: stretch;
```

## 5. Propriétés des flex items

* `flex-grow` : croissance relative
* `flex-shrink` : réduction si manque d’espace
* `flex-basis` : taille initiale
* `flex` : raccourci `flex-grow flex-shrink flex-basis`
* `align-self` : surcharge `align-items` pour un item spécifique

Exemple :

```css
.item {
  flex: 1 1 200px;
  align-self: center;
}
```

## 6. Exemples pratiques

### Barre de navigation

```css
nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
```

### Galerie responsive

```css
.gallery {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
}
.gallery div {
  flex: 1 1 150px;
}
```

## 7. Avantages de Flexbox

* Alignement et distribution faciles.
* Gestion automatique de l’espace entre éléments.
* Très pratique pour des mises en page adaptatives.
* Compatible avec Grid pour des designs hybrides.
