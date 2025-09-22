# Flexbox : La propriété `align-items`

En Flexbox, la propriété **`align-items`** permet de contrôler **l’alignement des éléments le long de l’axe transversal** (perpendiculaire à l’axe principal).  
Par défaut, l’axe principal est horizontal (`flex-direction: row`) et l’axe transversal est vertical.

---

## 1. Syntaxe

```css
.container {
  display: flex;
  align-items: flex-start | flex-end | center | baseline | stretch;
}
```

---

## 2. Valeurs principales

| Valeur          | Effet                                                                 |
|-----------------|----------------------------------------------------------------------|
| `flex-start`    | Aligne tous les éléments au début de l’axe transversal (haut si row) |
| `flex-end`      | Aligne tous les éléments à la fin de l’axe transversal (bas si row)  |
| `center`        | Centre tous les éléments le long de l’axe transversal               |
| `baseline`      | Aligne les éléments selon leur ligne de base de texte                |
| `stretch`       | Étire les éléments pour remplir l’espace disponible (défaut)         |

---

## 3. Exemple pratique

HTML :

```html
<div class="container">
  <div class="box">1</div>
  <div class="box tall">2</div>
  <div class="box">3</div>
</div>
```

CSS :

```css
.container {
  display: flex;
  align-items: center; /* change cette valeur pour tester les autres */
  gap: 10px;
  height: 200px; /* hauteur pour visualiser l'alignement */
}

.box {
  width: 50px;
  background-color: lightgreen;
  display: flex;
  justify-content: center;
  align-items: center;
}

.tall {
  height: 150px;
}
```

**Résultat :** Les éléments s’alignent verticalement selon la valeur choisie de `align-items`.

---

## 4. Combinaison avec d’autres propriétés Flexbox

- `justify-content` : contrôle l’alignement sur l’axe principal.  
- `align-self` : permet de **surcharger l’alignement d’un élément individuel**.  
- `flex-direction` : si l’axe principal change (`column`), l’axe transversal devient horizontal et `align-items` agit sur l’horizontal.

---

## 5. Conseils pratiques

- Utiliser `align-items` pour **centrer verticalement des éléments**, très pratique pour des barres de navigation ou des cartes.  
- Combinez toujours avec `justify-content` pour un contrôle complet des alignements dans le conteneur.  
- `stretch` est pratique pour que tous les éléments prennent **toute la hauteur du conteneur**.
