# CSS `outline`

La propriété CSS **`outline`** permet de créer un contour autour d'un élément, similaire à la bordure (`border`), mais avec quelques différences importantes. L’`outline` est souvent utilisée pour indiquer la mise au focus d’un élément ou pour des effets visuels temporaires.

---

## 1. Syntaxe

```css
element {
  outline: [outline-width] [outline-style] [outline-color];
}
```

### Valeurs possibles

| Sous-propriété   | Description                                                                         |
| ---------------- | ----------------------------------------------------------------------------------- |
| `outline-width`  | Définit l'épaisseur du contour (`thin`, `medium`, `thick`, ou valeur en px/em/rem). |
| `outline-style`  | Définit le style du contour (`solid`, `dashed`, `dotted`, `double`, `none`, etc.).  |
| `outline-color`  | Définit la couleur du contour (`red`, `#ff0000`, `rgba(255,0,0,0.5)`, etc.).        |
| `outline-offset` | Décale l’outline par rapport à l’élément (valeur positive ou négative).             |

> Remarque : `outline` ne prend pas de place dans le modèle de boîte (ne modifie pas la taille de l'élément) contrairement à `border`.

---

## 2. Exemple basique

### a) Définir un outline complet

```css
button {
  outline: 2px solid blue;
}
```

### b) Outline au focus

```css
input:focus {
  outline: 3px dashed orange;
}
```

### c) Décaler l’outline

```css
div {
  outline: 2px solid green;
  outline-offset: 5px; /* L'outline sera légèrement en dehors de l'élément */
}
```

---

## 3. Cas d’usage courants

1. **Indiquer le focus**
   Les navigateurs ajoutent automatiquement un `outline` aux éléments focusables pour l’accessibilité.

2. **Effets visuels temporaires**
   Utilisé pour mettre en évidence des éléments sans modifier le layout.

3. **Debugging CSS**
   Permet de visualiser rapidement les limites des éléments pendant le développement.

---

## 4. Points importants

* Contrairement aux bordures, l’`outline` ne prend **pas de place** et ne pousse pas les autres éléments.
* Peut être combinée avec `outline-offset` pour créer un effet de halo.
* Pour supprimer l’outline, utilisez :

```css
element {
  outline: none;
}
```

> ⚠️ Attention à l’accessibilité : supprimer les outlines au focus peut nuire aux utilisateurs naviguant au clavier.
