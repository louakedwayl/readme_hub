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

---

## Les balises principales

### `<table>`

C’est la balise principale qui contient tout le tableau.

### `<tr>`

`tr` veut dire **table row**, donc une ligne.

### `<td>`

`td` veut dire **table data**.  
C’est une cellule normale.

### `<th>`

`th` veut dire **table header`.  
C’est une cellule d’en-tête.

Par défaut, le texte d’un `<th>` est souvent affiché en gras et centré.

---

## `thead`, `tbody` et `tfoot`

Ces balises servent à **mieux organiser** un tableau.

- `<thead>` : contient **l’en-tête** du tableau
- `<tbody>` : contient **les données principales**
- `<tfoot>` : contient **le pied du tableau**, souvent pour un total ou un résumé

Elles ne sont pas obligatoires dans un petit tableau, mais elles sont très utiles pour avoir un code plus clair.

### Exemple

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

  <tfoot>
    <tr>
      <td>Total</td>
      <td>3€</td>
    </tr>
  </tfoot>
</table>
```

### À quoi ça sert ?

- à rendre le code plus lisible
- à mieux séparer les différentes parties du tableau
- à faciliter le style en CSS
- à mieux structurer les données

En général :

- les titres de colonnes vont dans `thead`
- les lignes de contenu vont dans `tbody`
- les lignes de résumé vont dans `tfoot`

---

## Exemple simple

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

Ici :

- `thead` contient les titres
- `tbody` contient les données

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

Ici, la cellule prend la place de **2 colonnes**.

---

## Ajouter une légende

On peut donner un titre au tableau avec `<caption>`.

```html
<table>
  <caption>Liste des étudiants</caption>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Note</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Lina</td>
      <td>15</td>
    </tr>
  </tbody>
</table>
```

La balise `<caption>` décrit le tableau.

---

## Style avec CSS

Par défaut, un tableau HTML est souvent très simple visuellement.  
On utilise donc souvent du CSS pour le rendre plus lisible.

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

Utilise un tableau quand les données ont un vrai lien **ligne / colonne**.

Bon cas d’usage :

- notes d’élèves
- prix de produits
- horaires
- statistiques

À éviter :

- faire la structure complète d’une page
- aligner juste du texte ou des blocs pour le design

Pour la mise en page, on préfère **CSS**, avec par exemple **flexbox** ou **grid**.

---

## À retenir

Un tableau HTML sert à afficher des données structurées.

Les balises importantes sont :

- `<table>` : le tableau
- `<tr>` : une ligne
- `<th>` : une cellule d’en-tête
- `<td>` : une cellule normale
- `<thead>` : l’en-tête du tableau
- `<tbody>` : le corps du tableau
- `<tfoot>` : le pied du tableau
- `<caption>` : le titre du tableau

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
  <tfoot>
    <tr>
      <td>Total joueurs</td>
      <td>2</td>
    </tr>
  </tfoot>
</table>
```
