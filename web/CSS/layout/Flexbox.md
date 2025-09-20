# Flexbox (CSS Flexible Box Layout)

Flexbox est un modèle de disposition CSS conçu pour organiser facilement des éléments dans une **direction** (ligne ou colonne) et contrôler leur **alignement**, **espacement**, et **dimension**.

---

## 1. Activer Flexbox

Pour utiliser Flexbox, il faut définir `display: flex` sur le conteneur parent.

```css
.container {
  display: flex;
}
```

---

## 2. Direction des éléments

* `flex-direction` définit l’axe principal des éléments :

| Valeur             | Description                                           |
| ------------------ | ----------------------------------------------------- |
| `row` (par défaut) | Les éléments sont disposés en ligne (horizontalement) |
| `row-reverse`      | Comme `row`, mais dans l’ordre inverse                |
| `column`           | Les éléments sont disposés en colonne (verticalement) |
| `column-reverse`   | Comme `column`, mais dans l’ordre inverse             |

```css
.container {
  display: flex;
  flex-direction: row;
}
```

---

## 3. Alignement horizontal : justify-content

Contrôle l’espacement entre les éléments le long de l’axe principal.

| Valeur                    | Effet                                        |
| ------------------------- | -------------------------------------------- |
| `flex-start` (par défaut) | Les éléments collés au début                 |
| `flex-end`                | Les éléments collés à la fin                 |
| `center`                  | Les éléments centrés                         |
| `space-between`           | Espacement égal entre les éléments           |
| `space-around`            | Espacement égal autour des éléments          |
| `space-evenly`            | Espacement parfaitement égal entre et autour |

```css
.container {
  display: flex;
  justify-content: space-between;
}
```

---

## 4. Alignement vertical : align-items

Contrôle l’alignement le long de l’axe secondaire (perpendiculaire à l’axe principal).

| Valeur                 | Effet                                            |
| ---------------------- | ------------------------------------------------ |
| `stretch` (par défaut) | Les éléments remplissent la hauteur du conteneur |
| `flex-start`           | Alignement en haut                               |
| `flex-end`             | Alignement en bas                                |
| `center`               | Centré verticalement                             |
| `baseline`             | Alignement selon la ligne de base du texte       |

```css
.container {
  display: flex;
  align-items: center;
}
```

---

## 5. Flex wrap

Par défaut, les éléments restent sur une seule ligne. `flex-wrap` permet de passer à plusieurs lignes.

| Valeur            | Effet                                     |
| ----------------- | ----------------------------------------- |
| `nowrap` (défaut) | Pas de retour à la ligne                  |
| `wrap`            | Les éléments passent à la ligne si besoin |
| `wrap-reverse`    | Comme wrap, mais l’ordre inversé          |

```css
.container {
  display: flex;
  flex-wrap: wrap;
}
```

---

## 6. Contrôle des éléments individuels : flex

* `flex-grow` : facteur d’expansion
* `flex-shrink` : facteur de rétrécissement
* `flex-basis` : taille de base avant l’expansion

```css
.item {
  flex: 1; /* équivalent à flex-grow:1, flex-shrink:1, flex-basis:0 */
}
```

---

## 7. Exemple complet

```html
<div class="container">
  <div class="item">1</div>
  <div class="item">2</div>
  <div class="item">3</div>
</div>
```

```css
.container {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
}

.item {
  flex: 1;
  margin: 5px;
  padding: 20px;
  background-color: lightblue;
  text-align: center;
}
```

---

## 8. Flexbox dans Tailwind et Bootstrap

| Framework | Classe pour activer Flexbox | Alignement horizontal                  | Alignement vertical            |
| --------- | --------------------------- | -------------------------------------- | ------------------------------ |
| Tailwind  | `flex`                      | `justify-start/center/space-between`   | `items-start/center/end`       |
| Bootstrap | `d-flex`                    | `justify-content-start/center/between` | `align-items-start/center/end` |

---

## 9. Points clés

* Flexbox s’applique **au conteneur**, pas aux éléments eux-mêmes.
* Contrôle **direction, alignement, espacement et dimension** facilement.
* Idéal pour **interfaces responsives**.
* Complémentaire à **CSS Grid**, qui est mieux pour les mises en page 2D complexes.

