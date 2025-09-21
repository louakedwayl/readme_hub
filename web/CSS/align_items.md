# Cours : `align-items` en CSS Grid

## 1. Définition

La propriété **`align-items`** contrôle l'**alignement vertical** du
contenu **à l'intérieur de chaque cellule de la grille**.

📌 Elle s'applique aux **éléments enfants** d'un conteneur en
`display: grid` ou `display: inline-grid`.

------------------------------------------------------------------------

## 2. Valeurs possibles

| Valeur   | Effet |
|----------|-------|
| `start`  | Aligne les éléments en haut de leur cellule |
| `end`    | Aligne les éléments en bas de leur cellule |
| `center` | Centre les éléments verticalement dans leur cellule |
| `stretch`| (par défaut) Étire les éléments pour remplir toute la hauteur de la cellule |

------------------------------------------------------------------------

## 3. Exemple simple

### HTML

``` html
<div class="grid">
  <div class="item">A</div>
  <div class="item">B</div>
  <div class="item">C</div>
</div>
```

### CSS

``` css
.grid {
  display: grid;
  grid-template-columns: repeat(3, 100px);
  grid-template-rows: 150px; /* Donne de la hauteur aux cellules */
  align-items: center; /* Centre verticalement les éléments */
  background: lightgray;
}

.item {
  background: lightblue;
  border: 1px solid #333;
}
```

------------------------------------------------------------------------

## 4. Différence avec `align-content`

-   **`align-items`** → aligne le contenu **à l'intérieur des cellules**
-   **`align-content`** → aligne **l'ensemble de la grille** dans son
    conteneur quand la grille est plus petite que ce conteneur

------------------------------------------------------------------------

## 5. Exemple comparatif

``` css
.grid {
  display: grid;
  grid-template-rows: 50px 50px;
  height: 200px;
  align-items: end;      /* éléments en bas de chaque cellule */
  align-content: center; /* grille centrée verticalement dans le conteneur */
}
```

------------------------------------------------------------------------

## 6. Bonnes pratiques

✅ Utiliser `align-items` pour gérer l'alignement vertical global des
éléments de la grille\
✅ Combiner avec `justify-items` pour un contrôle **horizontal** et
obtenir un centrage parfait\
✅ Pour un contrôle individuel sur un élément, utiliser **`align-self`**

## 7. Focus sur `align-self`

La propriété **`align-self`** permet de **surcharger** la valeur de `align-items`, mais **pour un seul élément**.

Autrement dit :
- `align-items` = règle globale pour **tous les éléments** de la grille  
- `align-self` = règle spécifique à **un seul élément**

---

### Exemple d’utilisation

```css
.grid {
  display: grid;
  grid-template-rows: 100px;
  align-items: start; /* aligne tous les éléments en haut */
}

.item.special {
  align-self: end; /* cet élément précis sera aligné en bas */
}
```
Résultat :

Tous les éléments sont alignés en haut

Sauf celui avec la classe .special qui se place en bas

---

### Bonnes pratiques

✅ Utiliser align-items pour définir l’alignement vertical global
✅ Utiliser align-self uniquement pour un élément particulier
✅ align-self accepte les mêmes valeurs que align-items : start, end, center, stretch


