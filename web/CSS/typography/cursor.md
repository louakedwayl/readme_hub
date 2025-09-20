# Propriété CSS `cursor`

La propriété CSS `cursor` permet de **changer l'apparence du curseur de la souris** lorsque celui-ci survole un élément HTML.

---

## Syntaxe

```css
element {
    cursor: valeur;
}
```

* **`element`** : n'importe quel élément HTML
* **`valeur`** : type de curseur souhaité

---

## Valeurs courantes

### 1. Curseurs standards

| Valeur        | Description                                              |
| ------------- | -------------------------------------------------------- |
| `default`     | Curseur par défaut (souvent une flèche)                  |
| `pointer`     | Curseur en forme de main → utilisé pour les liens        |
| `text`        | Curseur en forme de barre verticale → sélection de texte |
| `move`        | Curseur indiquant que l’élément est déplaçable           |
| `wait`        | Curseur en forme de sablier → attente                    |
| `crosshair`   | Curseur en forme de croix                                |
| `not-allowed` | Curseur indiquant une action interdite                   |
| `help`        | Curseur avec un point d’interrogation                    |

### 2. Curseurs personnalisés

Il est possible d’utiliser une **image comme curseur** :

```css
.element {
    cursor: url("mon-curseur.png"), auto;
}
```

* `url("...")` : chemin vers l’image du curseur
* `auto` : curseur de repli si l’image ne peut pas être chargée

---

## Exemples pratiques

### Changer le curseur d’un bouton

```css
button {
    cursor: pointer; /* main au survol */
}
```

### Curseur pour texte sélectionnable

```css
p {
    cursor: text;
}
```

### Curseur interdit sur un élément désactivé

```css
.disabled {
    cursor: not-allowed;
    opacity: 0.5;
}
```

### Curseur personnalisé avec image

```css
.custom-cursor {
    cursor: url('curseur.png'), auto;
}
```

---

## Bonnes pratiques

* **Utiliser les curseurs standards** quand c’est possible pour la cohérence.
* **Pointer (`pointer`)** pour tous les éléments cliquables.
* **Éviter les curseurs trop originaux** qui peuvent perturber l’utilisateur.
* Toujours fournir un **curseur de repli (`auto`)** pour les images personnalisées.

---
