# CSS : Remettre une propriété à sa valeur par défaut

En CSS, il n’existe pas de valeur `default` pour remettre une propriété à sa valeur standard. Cependant, plusieurs mots-clés permettent de **réinitialiser ou hériter une propriété**.

---

## 1. Les mots-clés pour remettre une valeur par défaut

### 1.1 `initial`

* Met la propriété à sa **valeur initiale définie par le standard CSS**.
* Exemple :

```css
p {
    color: initial; /* couleur par défaut du navigateur */
}
```

### 1.2 `inherit`

* La propriété prend la **valeur du parent**.
* Exemple :

```css
span {
    color: inherit; /* hérite de la couleur du parent */
}
```

### 1.3 `unset`

* Comportement mixte :

  * Si la propriété est **héritable**, prend `inherit`.
  * Sinon, prend `initial`.
* Exemple :

```css
div {
    font-size: unset;
}
```

### 1.4 `revert`

* Rétablit la valeur **appliquée par l’agent utilisateur ou par une feuille de style précédente**.
* Exemple :

```css
h1 {
    font-weight: revert;
}
```

* `revert` est utile pour annuler des overrides CSS.

---

## 2. Comparaison rapide

| Mot-clé   | Résultat                                                                   |
| --------- | -------------------------------------------------------------------------- |
| `initial` | Valeur standard définie par CSS pour la propriété                          |
| `inherit` | Hérite la valeur du parent                                                 |
| `unset`   | Héritable → inherit, Non héritable → initial                               |
| `revert`  | Revenir à la valeur de l’agent utilisateur ou de la feuille CSS précédente |

---

## 3. Exemple pratique

```css
/* Texte rouge par défaut */
p {
    color: red;
}

/* Remise à la couleur standard du navigateur */
p.default-color {
    color: initial;
}

/* Héritage de la couleur du parent */
p.inherit-color {
    color: inherit;
}
```

---

## 4. Bonnes pratiques

* Utiliser **`initial`** pour réinitialiser à la valeur standard CSS.
* Utiliser **`inherit`** pour harmoniser la mise en forme avec le parent.
* `unset` est pratique pour les styles génériques ou les resets CSS.
* `revert` est utile pour annuler des overrides complexes, mais peut ne pas être supporté sur tous les navigateurs anciens.

---
