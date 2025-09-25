# Les animations en CSS

## 1. Différence entre transition et animation

-   **Transition** : permet de passer d'un état A → B quand une
    propriété change (ex: au survol d'un bouton).\
-   **Animation** : permet de définir **plusieurs étapes (keyframes)**
    et de faire bouger un élément **même sans interaction**.

👉 Donc si tu veux un effet déclenché uniquement quand une propriété
change → **transition**.\
👉 Si tu veux un mouvement complexe, répété ou autonome → **animation**.

------------------------------------------------------------------------

## 2. Structure d'une animation

Une animation en CSS repose sur deux choses :

1.  La règle `@keyframes` → décrit **l'évolution d'un élément** étape
    par étape.\
2.  La propriété `animation` → applique l'animation à un élément.

------------------------------------------------------------------------

## 3. @keyframes

C'est le cœur de l'animation. On définit des étapes avec des
pourcentages (%) ou avec `from` / `to`.

Exemple simple :

``` css
@keyframes slide {
  from {
    transform: translateX(0);
  }
  to {
    transform: translateX(200px);
  }
}
```

Exemple avec plusieurs étapes :

``` css
@keyframes bounce {
  0%   { transform: translateY(0); }
  50%  { transform: translateY(-50px); }
  100% { transform: translateY(0); }
}
```

------------------------------------------------------------------------

## 4. Les propriétés `animation-*`

Tu peux utiliser la forme **courte** (`animation`) ou chaque propriété
séparée.

### Principales propriétés :

-   **`animation-name`** : le nom défini dans `@keyframes`.\
-   **`animation-duration`** : durée (ex: `2s`, `500ms`).\
-   **`animation-timing-function`** : vitesse (ex: `linear`, `ease`,
    `ease-in-out`, `cubic-bezier(...)`).\
-   **`animation-delay`** : délai avant le début.\
-   **`animation-iteration-count`** : nombre de répétitions (`1`, `3`,
    `infinite`).\
-   **`animation-direction`** : sens (`normal`, `reverse`, `alternate`,
    `alternate-reverse`).\
-   **`animation-fill-mode`** : comportement avant/après (`none`,
    `forwards`, `backwards`, `both`).\
-   **`animation-play-state`** : `running` ou `paused`.

------------------------------------------------------------------------

## 5. Exemple complet

``` css
.box {
  width: 100px;
  height: 100px;
  background: royalblue;

  /* Animation */
  animation-name: bounce;
  animation-duration: 2s;
  animation-iteration-count: infinite;
  animation-direction: alternate;
  animation-timing-function: ease-in-out;
}

@keyframes bounce {
  0%   { transform: translateY(0); }
  100% { transform: translateY(-100px); }
}
```

👉 La box monte et descend à l'infini.

------------------------------------------------------------------------

## 6. Gestion avec JavaScript (événements)

On peut écouter :\
- `animationstart` → quand ça commence.\
- `animationend` → quand ça finit.\
- `animationiteration` → à chaque boucle.

Exemple :

``` js
const box = document.querySelector(".box");

box.addEventListener("animationend", () => {
  box.style.background = "tomato"; // change la couleur à la fin
});
```

------------------------------------------------------------------------

## 7. Cas pratiques

-   **Loader** (spinner qui tourne à l'infini).\
-   **Animations de texte** (écrire, clignoter, apparaître).\
-   **Jeux & UI dynamiques** (rebonds, déplacements).\
-   **Effets de transition entre pages**.

------------------------------------------------------------------------

## 8. Raccourci `animation`

Tu peux tout écrire en une ligne :

``` css
animation: bounce 2s ease-in-out 1s infinite alternate forwards;
```

Format :

    animation: name duration timing-function delay iteration-count direction fill-mode;
