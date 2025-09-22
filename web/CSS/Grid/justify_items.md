# Cours : `justify-items` en CSS Grid

## 1. Définition

La propriété **`justify-items`** contrôle l'**alignement horizontal** du
contenu **à l'intérieur de chaque cellule de la grille**.

📌 Elle s'applique uniquement aux **éléments enfants** d'un conteneur en
`display: grid` ou `display: inline-grid`.

------------------------------------------------------------------------

## 2. Valeurs possibles

| Valeur   | Effet |
|----------|-------|
| `start`  | Aligne les éléments sur le **bord gauche** de leur cellule |
| `end`    | Aligne les éléments sur le **bord droit** de leur cellule |
| `center` | Centre les éléments **horizontalement** dans leur cellule |
| `stretch`| (par défaut) Étire les éléments pour occuper **toute la largeur** de la cellule |

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
  justify-items: center; /* Aligne chaque élément au centre horizontalement */
  background: lightgray;
}

.item {
  background: lightblue;
  border: 1px solid #333;
}
```

------------------------------------------------------------------------

## 4. Différence avec `justify-content`

-   **`justify-items`** → aligne les **éléments dans leurs cellules**
-   **`justify-content`** → aligne **la grille entière** par rapport à
    son conteneur

### Exemple visuel :

-   `justify-items: center;` → chaque élément est centré dans sa propre
    case
-   `justify-content: center;` → toute la grille est déplacée au centre
    du conteneur

------------------------------------------------------------------------

## 5. Exemple comparatif

``` css
.grid {
  display: grid;
  grid-template-columns: repeat(3, 80px);
  justify-items: end; /* aligne chaque élément à droite dans sa cellule */
  justify-content: center; /* centre toute la grille dans le conteneur */
}
```

------------------------------------------------------------------------

## 6. Bonnes pratiques

✅ Utiliser `justify-items` pour contrôler **l'alignement interne** des
cellules\
✅ Garder `stretch` par défaut si tu veux que les éléments s'adaptent à
la largeur\
✅ Combiner avec `align-items` pour gérer **l'alignement vertical**\
✅ Pour un contrôle individuel, utiliser la propriété **`justify-self`**
sur un seul élément

## 7. `justify-self`

La propriété **`justify-self`** permet de **surcharger** la valeur de `justify-items` mais **pour un seul élément**.

Autrement dit :
- `justify-items` = règle globale pour **tous les éléments** de la grille
- `justify-self` = règle spécifique à **un seul élément**

---

### Exemple d’utilisation

```css
.grid {
  display: grid;
  grid-template-columns: repeat(3, 100px);
  justify-items: start; /* aligne tous les éléments à gauche */
}

.item.special {
  justify-self: end; /* cet élément précis sera aligné à droite */
}
```
### Résultat :

    Tous les éléments sont alignés à gauche

    Sauf celui avec la classe .special qui se place à droite
---

### Bonnes pratiques

✅ Utiliser justify-items pour définir l’alignement global
✅ Utiliser justify-self uniquement si un élément doit avoir un alignement différent
✅ justify-self accepte les mêmes valeurs que justify-items : start, end, center, stretch

