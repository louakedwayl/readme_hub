# La propriété CSS `box-sizing`

## 1. Introduction

En CSS, la propriété **`box-sizing`** permet de définir **comment la taille totale d'un élément est calculée** :

* Inclut-elle uniquement le contenu ?
* Inclut-elle aussi le padding et la bordure ?

Cette propriété est très utile pour contrôler la mise en page et éviter des calculs compliqués de largeur/hauteur.

---

## 2. Syntaxe

```css
selector {
  box-sizing: value;
}
```

### Valeurs possibles :

| Valeur        | Description                                                                                                                |
| ------------- | -------------------------------------------------------------------------------------------------------------------------- |
| `content-box` | Valeur par défaut. La largeur et la hauteur ne concernent que le **contenu**. Padding et bordures s’ajoutent **en plus**.  |
| `border-box`  | La largeur et la hauteur incluent **le contenu, le padding et la bordure**. Très pratique pour des mises en page précises. |
| `inherit`     | L’élément hérite la valeur de son parent.                                                                                  |

---

## 3. Exemple avec `content-box` (par défaut)

```css
div.content-box-example {
  width: 200px;
  padding: 20px;
  border: 5px solid black;
  box-sizing: content-box; /* valeur par défaut */
}
```

* Largeur totale = 200px (contenu) + 20px * 2 (padding) + 5px * 2 (bordure) = **250px**

---

## 4. Exemple avec `border-box`

```css
div.border-box-example {
  width: 200px;
  padding: 20px;
  border: 5px solid black;
  box-sizing: border-box;
}
```

* Largeur totale = 200px (contenu + padding + bordure)
* Le contenu est automatiquement réduit pour que l’élément fasse **exactement 200px** au total.

💡 Cette méthode est très utilisée pour éviter que les paddings et bordures ne “cassent” la mise en page.

---

## 5. Astuce pratique : appliquer `border-box` globalement

Pour faciliter le design, on applique souvent `border-box` à **tous les éléments** :

```css
*,
*::before,
*::after {
  box-sizing: border-box;
}
```

* Cela permet de gérer facilement les largeurs et hauteurs sans calculer padding et bordure à chaque fois.

---

## 6. Conclusion

* `box-sizing` contrôle **comment la taille d’un élément est calculée**.
* `content-box` = largeur/hauteur seulement le contenu.
* `border-box` = largeur/hauteur inclut padding et bordure.
* Appliquer `border-box` globalement simplifie grandement les mises en page modernes.
