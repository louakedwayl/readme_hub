# 🎯 Cours : display: inline-grid

## 1. 📌 Introduction

En CSS, la propriété `display` permet de définir comment un élément doit
être affiché.\
`inline-grid` est une **valeur de display** qui combine deux
comportements :

-   `grid` → l'élément devient un **conteneur de grille CSS**, ce qui
    permet d'organiser ses enfants selon des lignes et colonnes
    définies.
-   `inline` → le conteneur lui-même reste un **élément en ligne**
    (comme un `<span>`), il s'adapte à son contenu et peut coexister sur
    une même ligne avec d'autres éléments inline.

Autrement dit, c'est un **grid container**... mais qui ne casse pas le
flux en bloc.

------------------------------------------------------------------------

## 2. 🧩 Différence entre `grid` et `inline-grid`

  -------------------------------------------------------------------------
  Propriété      `grid` (ou `display: grid`) `inline-grid`
  -------------- --------------------------- ------------------------------
  Comportement   Agit comme un **bloc**      Agit comme un **élément
  externe        (occupe toute la largeur    inline** (s'ajuste à son
                 dispo par défaut)           contenu)

  Alignement     Peut être centré avec       Peut être aligné dans une
  dans un parent `margin: auto`              ligne de texte, ou avec
                                             `vertical-align`

  Utilisation    Layout principal d'une page Petites grilles intégrées dans
  typique        ou d'une section            un texte ou un composant
  -------------------------------------------------------------------------

------------------------------------------------------------------------

## 3. 🏗️ Exemple simple

``` html
<p>
  Texte avant
  <span class="mini-grid">
    <span>A</span>
    <span>B</span>
    <span>C</span>
    <span>D</span>
  </span>
  texte après.
</p>

<style>
.mini-grid {
  display: inline-grid;
  grid-template-columns: repeat(2, 20px);
  grid-template-rows: repeat(2, 20px);
  gap: 4px;
  background: #eee;
  padding: 4px;
}
.mini-grid span {
  display: flex;
  align-items: center;
  justify-content: center;
  background: #ccc;
  border-radius: 4px;
}
</style>
```

------------------------------------------------------------------------

## 4. 🔧 Propriétés utiles avec `inline-grid`

Comme avec `display: grid`, on peut utiliser :

-   `grid-template-columns` et `grid-template-rows`
-   `gap` (ou `row-gap` / `column-gap`)
-   `justify-items`, `align-items`, `place-items`
-   `justify-content`, `align-content` pour le placement global
-   `grid-template-areas` pour des mises en page nommées

⚠️ La seule différence est la **nature inline** du conteneur. Il ne
s'étendra pas sur toute la largeur par défaut.

------------------------------------------------------------------------

## 5. 🎯 Cas d'utilisation concrets

✅ **Icônes ou boutons avec plusieurs états**\
✅ **Mini-tableaux dans un texte** (math, scores, comparaisons)\
✅ **Badges avec mise en page interne** (comme un petit dashboard
compact)

------------------------------------------------------------------------

## 6. 🧠 Points à retenir

-   `inline-grid` = `grid` + `inline`.
-   Idéal pour créer des grilles compactes à l'intérieur d'une phrase ou
    d'un bouton.
-   Se comporte comme un élément en ligne → prend uniquement la place de
    son contenu.
-   Toutes les propriétés de CSS Grid fonctionnent dessus.
