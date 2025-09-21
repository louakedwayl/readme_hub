# La propriété CSS `grid-auto-flow`

La propriété **`grid-auto-flow`** en CSS permet de contrôler **comment les éléments sont automatiquement placés** dans une grille lorsque leur position n’est pas explicitement définie par `grid-row` ou `grid-column`.

---

## 1. Valeurs possibles

* **`row`** (par défaut)
  Les éléments sont placés **ligne par ligne** (de gauche à droite, puis de haut en bas).

* **`column`**
  Les éléments sont placés **colonne par colonne** (de haut en bas, puis de gauche à droite).

* **`row dense`**
  Similaire à `row`, mais avec un comportement **dense** : le navigateur tente de remplir les "trous" dans la grille si possible.

* **`column dense`**
  Similaire à `column`, mais avec un comportement **dense**.

---

## 2. Exemple simple

```css
.container {
  display: grid;
  grid-template-columns: repeat(3, 100px);
  grid-auto-flow: row; /* valeur par défaut */
}
```

Ici, les éléments seront automatiquement placés ligne par ligne.

---

## 3. Exemple avec `column`

```css
.container {
  display: grid;
  grid-template-rows: repeat(3, 100px);
  grid-auto-flow: column;
}
```

Les éléments seront placés colonne par colonne.

---

## 4. Exemple avec `dense`

```css
.container {
  display: grid;
  grid-template-columns: repeat(3, 100px);
  grid-auto-flow: row dense;
}
```

Si un élément prend plus d’espace (par ex. `grid-column: span 2;`), le navigateur essaiera de combler les cases vides avec les éléments suivants.

---

## 5. Schéma récapitulatif

* `row` → remplit **ligne après ligne**.
* `column` → remplit **colonne après colonne**.
* `row dense` → comme `row`, mais **optimise les espaces vides**.
* `column dense` → comme `column`, mais **optimise les espaces vides**.

---

## 6. Quand utiliser `grid-auto-flow` ?

* Quand tu veux **laisser le navigateur placer automatiquement** les éléments.
* Quand tu ne veux pas écrire `grid-row` et `grid-column` pour chaque élément.
* Quand tu veux **éviter les trous** dans la grille avec l’option `dense`.

⚠️ Attention : l’utilisation de `dense` peut casser l’ordre visuel des éléments, ce qui peut poser des problèmes d’accessibilité.
