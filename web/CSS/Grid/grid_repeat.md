# `repeat()` en CSS Grid

## 1. Introduction

La fonction **`repeat()`** est utilisée en CSS Grid pour définir
rapidement des **colonnes** ou **lignes** répétées.\
Elle permet d'éviter de réécrire plusieurs fois la même valeur dans
`grid-template-columns` ou `grid-template-rows`.

Exemple simple :

``` css
/* Sans repeat() */
grid-template-columns: 1fr 1fr 1fr;

/* Avec repeat() */
grid-template-columns: repeat(3, 1fr);
```

------------------------------------------------------------------------

## 2. Syntaxe

``` css
repeat(<count>, <track-size>)
```

-   **`<count>`** :
    -   Un **nombre entier positif** (ex. `3`, `4`)\
    -   ou un mot-clé spécial : `auto-fill` / `auto-fit`\
-   **`<track-size>`** :
    -   Taille de chaque colonne/ligne (ex. `100px`, `1fr`,
        `minmax(200px, 1fr)`)

------------------------------------------------------------------------

## 3. Utilisation avec `grid-template-columns` et `grid-template-rows`

### Exemple --- Colonnes identiques

``` css
.container {
  display: grid;
  grid-template-columns: repeat(4, 1fr); /* 4 colonnes égales */
}
```

### Exemple --- Lignes identiques

``` css
.container {
  display: grid;
  grid-template-rows: repeat(3, 200px); /* 3 lignes de 200px */
}
```

------------------------------------------------------------------------

## 4. Combinaison avec d'autres valeurs

``` css
grid-template-columns: repeat(2, 150px) 1fr;
/* => 150px | 150px | 1fr */
```

------------------------------------------------------------------------

## 5. `auto-fill` et `auto-fit`

### `auto-fill`

``` css
.container {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
}
```

### `auto-fit`

``` css
.container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
}
```

------------------------------------------------------------------------

## 6. `minmax()` avec `repeat()`

``` css
.container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
}
```

------------------------------------------------------------------------

## 7. Exemples complets

### Grille fixe

``` css
.grid-fixed {
  display: grid;
  grid-template-columns: repeat(3, 200px);
  gap: 10px;
}
```

### Grille responsive

``` css
.grid-responsive {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 16px;
}
```

------------------------------------------------------------------------

## 8. Bonnes pratiques

✅ Utiliser `repeat()` pour réduire la duplication de code\
✅ Privilégier `auto-fit` + `minmax()` pour des grilles fluides\
✅ Combiner avec `gap` pour gérer les espacements

------------------------------------------------------------------------

## 9. Résumé / Cheat Sheet

| Utilisation          | Exemple                                   | Effet                                    |
|---------------------|-------------------------------------------|-----------------------------------------|
| Colonnes fixes      | `repeat(3, 200px)`                        | 3 colonnes de 200 px                    |
| Colonnes flexibles  | `repeat(4, 1fr)`                          | 4 colonnes partageant l'espace          |
| Colonnes responsive | `repeat(auto-fit, minmax(200px, 1fr))`    | Colonnes qui s'ajoutent/s'adaptent selon la largeur |
