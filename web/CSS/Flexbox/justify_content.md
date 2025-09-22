# Flexbox : La propriété `justify-content`

En Flexbox, la propriété **`justify-content`** permet de contrôler **l’alignement des éléments le long de l’axe principal** (horizontal par défaut, vertical si `flex-direction: column`). Elle est très utile pour gérer l’espacement entre les éléments dans un conteneur.

---

## 1. Syntaxe

```css
.container {
  display: flex;
  justify-content: flex-start | flex-end | center | space-between | space-around | space-evenly;
}
```

---

## 2. Valeurs principales

| Valeur             | Effet                                                                 |
|-------------------|----------------------------------------------------------------------|
| `flex-start`       | Aligne tous les éléments au début de l’axe principal (défaut)        |
| `flex-end`         | Aligne tous les éléments à la fin de l’axe principal                 |
| `center`           | Centre tous les éléments le long de l’axe principal                  |
| `space-between`    | Répartit les éléments avec un **espace égal entre eux**, aucun aux extrémités |
| `space-around`     | Répartit les éléments avec un **espace égal autour de chaque élément** |
| `space-evenly`     | Répartit les éléments avec un **espace égal entre tous les éléments y compris aux extrémités** |

---

## 3. Exemple pratique

HTML :

```html
<div class="container">
  <div class="box">1</div>
  <div class="box">2</div>
  <div class="box">3</div>
</div>
```

CSS :

```css
.container {
  display: flex;
  justify-content: space-between; /* change cette valeur pour tester les autres */
  gap: 10px;
}

.box {
  width: 100px;
  height: 100px;
  background-color: lightcoral;
  display: flex;
  justify-content: center;
  align-items: center;
}
```

**Résultat :** Les éléments sont espacés selon la valeur choisie de `justify-content`.

---

## 4. Combinaison avec d’autres propriétés Flexbox

- `align-items` : contrôle l’alignement **perpendiculaire** à l’axe principal.  
- `flex-wrap` : si les éléments passent à la ligne, `justify-content` s’applique à chaque ligne individuellement.  
- `flex-direction` : l’axe principal change selon la direction (`row` ou `column`).

---

## 5. Conseils pratiques

- Utiliser `justify-content` pour **espacer les éléments** de manière uniforme dans un conteneur.  
- Combiner avec `gap` pour un meilleur contrôle de l’espacement.  
- Très utile pour les barres de navigation, galeries, boutons ou tout type de disposition horizontale/verticale.

> Exemple rapide :  
> `justify-content: center;` → tous les éléments centrés horizontalement  
> `justify-content: space-around;` → espace égal autour de chaque élément
