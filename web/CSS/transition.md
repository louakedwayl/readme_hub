
# La propriété CSS `transition`

La propriété `transition` en CSS permet de créer des **animations douces** lors du changement des valeurs des propriétés CSS d’un élément. Au lieu que le changement soit instantané, il se fait progressivement.

---

## 1. Syntaxe

La syntaxe complète de la propriété `transition` est :

```css
element {
  transition: <property> <duration> <timing-function> <delay>;
}
```

- **`property`** : la propriété CSS à animer (ex: `width`, `height`, `background-color`).  
  - Valeur spéciale : `all` → applique la transition à toutes les propriétés modifiables.
- **`duration`** : durée de la transition (ex: `0.5s`, `200ms`).
- **`timing-function`** : fonction de temporisation qui définit la vitesse de la transition.
  - Valeurs possibles :
    - `linear` → vitesse constante.
    - `ease` → accélère puis ralentit (par défaut).
    - `ease-in` → commence lentement.
    - `ease-out` → finit lentement.
    - `ease-in-out` → commence et finit lentement.
    - `cubic-bezier(x1, y1, x2, y2)` → pour définir une courbe personnalisée.
- **`delay`** : délai avant le début de la transition (ex: `0s`, `0.2s`).

---

## 2. Exemple simple

```css
button {
  background-color: blue;
  transition: background-color 0.5s ease;
}

button:hover {
  background-color: red;
}
```

Dans cet exemple, lorsque l’on survole le bouton (`hover`), le fond change progressivement du bleu vers le rouge en **0.5 secondes**.

---

## 3. Transition sur plusieurs propriétés

```css
div {
  width: 100px;
  height: 100px;
  background-color: green;
  transition: width 0.5s ease, height 0.5s ease, background-color 1s linear;
}

div:hover {
  width: 200px;
  height: 200px;
  background-color: orange;
}
```

Ici, chaque propriété peut avoir sa **propre durée et fonction de temporisation**.

---

## 4. Valeurs raccourcies

Il est possible d’utiliser une **valeur raccourcie** pour la transition :

```css
transition: all 0.3s ease-in-out 0.1s;
```

- `all` → toutes les propriétés.
- `0.3s` → durée.
- `ease-in-out` → fonction de temporisation.
- `0.1s` → délai avant le début.

---

## 5. Remarques importantes

1. Toutes les propriétés CSS ne peuvent pas être animées. Par exemple, `display` ou `position` ne sont pas animables.
2. `transition` fonctionne mieux avec des propriétés numériques ou des couleurs.
3. Pour des animations plus complexes, il est préférable d’utiliser `@keyframes` et `animation`.

---

## 6. Exemple pratique complet

```html
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<style>
.box {
  width: 100px;
  height: 100px;
  background-color: teal;
  transition: width 0.5s ease, height 0.5s ease, transform 0.5s ease;
}

.box:hover {
  width: 150px;
  height: 150px;
  transform: rotate(45deg);
}
</style>
</head>
<body>
<div class="box"></div>
</body>
</html>
```

- La boîte s’agrandit et tourne lorsque la souris la survole.
- Tout se fait en douceur grâce à `transition`.

---

## ✅ Résumé

- `transition` permet de créer des changements progressifs.
- Syntaxe : `<property> <duration> <timing-function> <delay>`.
- Utile pour : hover, focus, changements dynamiques via JS.
- Pour des animations complexes, `animation` est plus adapté.
