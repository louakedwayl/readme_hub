# Les tableaux en HTML

## Définition

Un tableau en HTML sert à afficher des **données organisées en lignes et en colonnes**.

On l’utilise quand les informations ont une vraie structure tabulaire, par exemple :

- un emploi du temps
- une liste de prix
- un classement
- des statistiques

Un tableau ne sert **pas** à faire la mise en page générale d’un site.

---

## Structure de base

Un tableau se construit avec plusieurs balises :

- `<table>` : le tableau
- `<tr>` : une ligne
- `<td>` : une cellule classique
- `<th>` : une cellule d’en-tête

Exemple :

```html
<table>
  <tr>
    <th>Nom</th>
    <th>Âge</th>
  </tr>
  <tr>
    <td>Alice</td>
    <td>22</td>
  </tr>
  <tr>
    <td>Bob</td>
    <td>25</td>
  </tr>
</table>
```

Ici :

- la première ligne contient les titres des colonnes
- les autres lignes contiennent les données

---

## Rôle des principales balises

### `<table>`

C’est la balise principale qui contient tout le tableau.

```html
<table>
  ...
</table>
```

### `<tr>`

`tr` veut dire **table row**, donc une ligne.

```html
<tr>
  ...
</tr>
```

### `<td>`

`td` veut dire **table data**.  
C’est une cellule normale.

```html
<td>Paris</td>
```

### `<th>`

`th` veut dire **table header**.  
C’est une cellule d’en-tête.

```html
<th>Ville</th>
```

Par défaut, le texte d’un `<th>` est souvent affiché en gras et centré.

---

## Exemple simple

```html
<table>
  <tr>
    <th>Produit</th>
    <th>Prix</th>
  </tr>
  <tr>
    <td>Pomme</td>
    <td>1€</td>
  </tr>
  <tr>
    <td>Banane</td>
    <td>2€</td>
  </tr>
</table>
```

Ce tableau contient :

- 2 colonnes
- 3 lignes
- une ligne d’en-tête
- deux lignes de données

---

## Balises utiles pour mieux organiser un tableau

HTML propose aussi des balises pour structurer le tableau plus proprement :

- `<thead>` : l’en-tête
- `<tbody>` : le corps du tableau
- `<tfoot>` : le pied du tableau

Exemple :

```html
<table>
  <thead>
    <tr>
      <th>Produit</th>
      <th>Prix</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Pomme</td>
      <td>1€</td>
    </tr>
    <tr>
      <td>Banane</td>
      <td>2€</td>
    </tr>
  </tbody>
</table>
```

Cela rend le code plus clair, surtout pour les grands tableaux.

---

## Fusionner des cellules

On peut fusionner des cellules avec :

- `colspan` : fusion sur plusieurs colonnes
- `rowspan` : fusion sur plusieurs lignes

Exemple :

```html
<table>
  <tr>
    <th colspan="2">Informations</th>
  </tr>
  <tr>
    <td>Nom</td>
    <td>Wayl</td>
  </tr>
</table>
```

Ici, la cellule `"Informations"` prend la place de **2 colonnes**.

---

## Ajouter une légende

On peut donner un titre au tableau avec `<caption>`.

```html
<table>
  <caption>Liste des étudiants</caption>
  <tr>
    <th>Nom</th>
    <th>Note</th>
  </tr>
  <tr>
    <td>Lina</td>
    <td>15</td>
  </tr>
</table>
```

La légende décrit le tableau.

---

## Style avec CSS

Par défaut, un tableau HTML est souvent très simple visuellement.  
On utilise donc souvent du CSS pour le rendre plus lisible.

Exemple :

```html
<table>
  <tr>
    <th>Nom</th>
    <th>Ville</th>
  </tr>
  <tr>
    <td>Sarah</td>
    <td>Paris</td>
  </tr>
</table>
```

```css
table {
  border-collapse: collapse;
}

th, td {
  border: 1px solid black;
  padding: 8px;
}
```

Ici :

- `border-collapse: collapse;` fusionne les bordures
- `border` ajoute une bordure aux cellules
- `padding` ajoute de l’espace à l’intérieur

---

## Quand utiliser un tableau

Utilise un tableau quand les données ont un lien **ligne / colonne**.

Bon cas d’usage :

- notes d’élèves
- prix de produits
- horaires
- statistiques

À éviter :

- faire la structure complète d’une page
- aligner juste du texte ou des blocs pour le design

Pour la mise en page, on préfère aujourd’hui **CSS**, avec par exemple **flexbox** ou **grid**.

---

## À retenir

Un tableau HTML sert à afficher des données structurées.

Les balises les plus importantes sont :

- `<table>` : le tableau
- `<tr>` : une ligne
- `<th>` : une cellule d’en-tête
- `<td>` : une cellule normale

On peut aussi mieux organiser le tableau avec :

- `<thead>`
- `<tbody>`
- `<tfoot>`
- `<caption>`

Et le style se fait généralement avec **CSS**.

---

## Exemple complet

```html
<table>
  <caption>Classement</caption>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Score</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Alice</td>
      <td>10</td>
    </tr>
    <tr>
      <td>Bob</td>
      <td>8</td>
    </tr>
  </tbody>
</table>
```
