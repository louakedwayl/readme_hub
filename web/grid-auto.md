# Cours --- `grid-auto-*` en CSS Grid

## 1. Introduction

En CSS Grid, On définit généralement les **lignes** et les **colonnes**
explicitement via `grid-template-rows` et `grid-template-columns`.\
Mais que se passe-t-il lorsqu'un élément a besoin d'une **ligne ou
colonne supplémentaire** qui n'a pas été définie ?\
➡️ C'est là qu'interviennent les propriétés **`grid-auto-rows`**,
**`grid-auto-columns`** et **`grid-auto-flow`**.

Ces propriétés contrôlent : - la **taille** des lignes ou colonnes
créées automatiquement\
- la **direction de placement** des éléments quand il n'y a plus de
place dans la grille explicite

------------------------------------------------------------------------

## 2. `grid-auto-rows`

### Définition

Définit la taille des **lignes implicites** (celles créées
automatiquement lorsque vous placez un élément sur une ligne qui
n'existe pas encore).

### Syntaxe

``` css
grid-auto-rows: <track-size> [<track-size> ...];
```

### Exemple simple

``` css
.container {
  display: grid;
  grid-template-rows: 100px; /* 1 seule ligne définie */
  grid-auto-rows: 80px;      /* les lignes supplémentaires font 80px */
}
```

------------------------------------------------------------------------

## 3. `grid-auto-columns`

### Définition

Même principe que `grid-auto-rows`, mais pour les **colonnes
implicites**.

### Exemple

``` css
.container {
  display: grid;
  grid-template-columns: 200px; /* 1 colonne définie */
  grid-auto-columns: 150px;     /* colonnes créées automatiquement = 150px */
}
```

------------------------------------------------------------------------

## 4. `grid-auto-flow`

### Définition

Contrôle **l'ordre et la direction** dans lesquels les éléments sont
placés **dans la grille implicite**.

### Valeurs possibles

  -----------------------------------------------------------------------
  Valeur                                             Effet
  -------------------------------------------------- --------------------
  `row` (défaut)                                     Remplit les lignes
                                                     d'abord, crée de
                                                     nouvelles lignes si
                                                     nécessaire

  `column`                                           Remplit les colonnes
                                                     d'abord, crée de
                                                     nouvelles colonnes
                                                     si nécessaire

  `row dense`                                        Même que `row` mais
                                                     essaie de **remplir
                                                     les trous** dans la
                                                     grille

  `column dense`                                     Même que `column`
                                                     mais essaie de
                                                     remplir les trous
  -----------------------------------------------------------------------

### Exemple

``` css
.container {
  display: grid;
  grid-template-columns: 100px 100px;
  grid-auto-flow: column;
  grid-auto-columns: 80px;
}
```

------------------------------------------------------------------------

## 5. Exemple pratique complet

``` html
<div class="container">
  <div class="item">A</div>
  <div class="item">B</div>
  <div class="item">C</div>
  <div class="item">D</div>
</div>
```

``` css
.container {
  display: grid;
  grid-template-columns: 150px 150px; /* 2 colonnes explicites */
  grid-template-rows: 100px;          /* 1 ligne explicite */
  grid-auto-rows: 80px;               /* lignes implicites = 80px */
  grid-auto-flow: row;                /* place les items en ligne d'abord */
  gap: 10px;
}

.item {
  background: #ddd;
  display: flex;
  align-items: center;
  justify-content: center;
}
```

------------------------------------------------------------------------

## 6. Bonnes pratiques

✅ Définir `grid-auto-rows` ou `grid-auto-columns` quand on sait que la
grille peut **dépasser** la zone explicite\
✅ Utiliser `minmax()` pour donner une taille minimale et permettre la
flexibilité :

``` css
grid-auto-rows: minmax(100px, auto);
```

✅ Contrôler `grid-auto-flow` pour forcer un placement vertical ou
horizontal selon le design souhaité\
✅ Éviter de compter uniquement sur les lignes implicites si la grille
doit rester prédictible

------------------------------------------------------------------------

## 7. Résumé (Cheat Sheet)

  --------------------------------------------------------------------------------
  Propriété             Rôle                        Exemple
  --------------------- --------------------------- ------------------------------
  `grid-auto-rows`      Taille des lignes           `grid-auto-rows: 100px;`
                        implicites                  

  `grid-auto-columns`   Taille des colonnes         `grid-auto-columns: 150px;`
                        implicites                  

  `grid-auto-flow`      Direction et remplissage    `grid-auto-flow: row dense;`
                        automatique                 
  --------------------------------------------------------------------------------
