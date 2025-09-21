# Cours : `grid-template-areas` en CSS Grid

## 1. Définition

La propriété **`grid-template-areas`** permet de définir la disposition
visuelle d'une grille en **nommant les zones** et en décrivant leur
arrangement sous forme de texte.\
C'est l'une des façons les plus lisibles de construire un layout avec
**CSS Grid**.

------------------------------------------------------------------------

## 2. Principe de base

1.  On **nomme les zones** à l'aide de la propriété `grid-area` sur les
    éléments enfants.\
2.  On **dessine la grille** avec `grid-template-areas` en utilisant ces
    noms.

------------------------------------------------------------------------

## 3. Exemple simple

### HTML

``` html
<div class="grid">
  <header>Header</header>
  <nav>Menu</nav>
  <main>Contenu</main>
  <footer>Footer</footer>
</div>
```

### CSS

``` css
.grid {
  display: grid;
  grid-template-columns: 1fr 3fr; /* 2 colonnes : étroite + large */
  grid-template-rows: auto 1fr auto; /* 3 lignes : header, contenu, footer */

  grid-template-areas:
    "header header"
    "nav    main"
    "footer footer";
}

header {
  grid-area: header;
  background: lightblue;
}

nav {
  grid-area: nav;
  background: lightgreen;
}

main {
  grid-area: main;
  background: lightyellow;
}

footer {
  grid-area: footer;
  background: lightgray;
}
```

------------------------------------------------------------------------

## 4. Résultat visuel

-   La première ligne contient **header** sur toute la largeur\
-   La deuxième ligne affiche **nav** à gauche et **main** à droite\
-   La troisième ligne contient **footer** sur toute la largeur

------------------------------------------------------------------------

## 5. Règles importantes

✅ Les noms utilisés dans `grid-template-areas` doivent correspondre aux
valeurs de `grid-area` des éléments.\
✅ Chaque ligne dans `grid-template-areas` doit avoir **le même nombre
de colonnes**.\
✅ On peut utiliser `.` (point) pour représenter une **zone vide**.

------------------------------------------------------------------------

## 6. Exemple avec zone vide

``` css
grid-template-areas:
  "header header"
  "nav    main"
  ".      footer";
```

Ici, la première cellule de la dernière ligne reste vide.

------------------------------------------------------------------------

## 7. Avantages de `grid-template-areas`

-   Très **lisible** : on "dessine" le layout avec du texte\
-   Facile à maintenir\
-   Idéal pour les **layouts complexes**

------------------------------------------------------------------------

## 8. Bonnes pratiques

-   Utiliser des **noms clairs et cohérents** pour les zones (`header`,
    `sidebar`, `main`, `footer`, etc.)\
-   Garder un layout **simple et régulier** (toutes les lignes doivent
    avoir la même largeur en colonnes)\
-   Combiner avec `grid-template-columns` et `grid-template-rows` pour
    une mise en page précise
