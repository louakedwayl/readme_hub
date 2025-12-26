# CSS `pointer-events`

La propriété CSS **`pointer-events`** permet de contrôler comment un élément réagit aux événements de la souris ou du doigt (touch events). Elle est particulièrement utile pour gérer l’interaction avec des éléments superposés ou pour rendre des éléments "inaccessibles" aux clics.

---

## 1. Syntaxe

```css
element {
  pointer-events: valeur;
}
```

### Valeurs possibles

| Valeur           | Description                                                                                            |
| ---------------- | ------------------------------------------------------------------------------------------------------ |
| `auto`           | Comportement par défaut. L’élément réagit normalement aux événements de la souris.                     |
| `none`           | L’élément **ignore** tous les événements de la souris. Les clics passent à l’élément situé en dessous. |
| `visiblePainted` | (SVG) L’élément reçoit des événements seulement s’il est peint et visible.                             |
| `visibleFill`    | (SVG) L’élément reçoit des événements seulement si sa zone de remplissage est visible.                 |
| `visibleStroke`  | (SVG) L’élément reçoit des événements seulement si son contour est visible.                            |
| `painted`        | (SVG) L’élément reçoit des événements si peint, indépendamment de la visibilité.                       |
| `fill`           | (SVG) L’élément reçoit des événements si sa zone de remplissage est activée.                           |
| `stroke`         | (SVG) L’élément reçoit des événements si son contour est activé.                                       |
| `all`            | (SVG) L’élément reçoit tous les événements, indépendamment de la visibilité.                           |

> ⚠️ La plupart des développeurs utilisent surtout `auto` et `none`. Les autres valeurs sont principalement utilisées pour **SVG**.

---

## 2. Exemple basique

### a) Ignorer les clics sur un élément

```html
<div class="overlay">
  <button>Cliquer</button>
</div>
```

```css
.overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.5);
  pointer-events: none; /* Ignore tous les clics */
}

button {
  pointer-events: auto; /* Le bouton reste cliquable */
}
```

### b) Superposition et clics

```html
<div class="background">Fond</div>
<div class="foreground">Avant-plan</div>
```

```css
.foreground {
  pointer-events: none; /* Permet de cliquer sur le fond à travers l’avant-plan */
}
```

---

## 3. Cas d’usage courants

1. **Overlays ou modales transparentes**
   Permet de créer des couches visuelles qui ne bloquent pas les clics.

2. **SVG interactifs**
   Pour contrôler quel élément d’un SVG répond aux clics.

3. **Animations ou effets visuels**
   Rendre un élément temporairement "non interactif" pendant une animation.

4. **Drag & Drop**
   Désactiver les interactions sur certains éléments pour faciliter le drag.

---

## 4. Points importants

* `pointer-events` **n’empêche pas le focus clavier**. Pour bloquer complètement l’interaction, combinez avec `user-select: none;` et `tabindex="-1"`.
* Compatible avec tous les navigateurs modernes.
* Peut être combiné avec `opacity` ou `visibility`, mais attention : `visibility: hidden` empêche également l’affichage et l’interaction, alors que `pointer-events: none` laisse l’élément visible.
