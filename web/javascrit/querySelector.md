# 📘 Le `querySelector` et `querySelectorAll` en JavaScript

## 1. Qu’est-ce que `querySelector` ?

`querySelector` est une méthode de l’objet `document` (ou d’un élément DOM) qui permet de **sélectionner le premier élément** correspondant à un sélecteur CSS.

### Syntaxe

```js
document.querySelector(selecteur)
```

* `selecteur` : une chaîne de caractères représentant un **sélecteur CSS**.
* Retourne le **premier élément** correspondant ou `null` si aucun élément n’est trouvé.

### Exemple

```html
<div class="box"></div>
<div class="box"></div>
<script>
  const firstBox = document.querySelector('.box');
  console.log(firstBox); // renvoie le premier <div class="box">
</script>
```

---

## 2. Qu’est-ce que `querySelectorAll` ?

`querySelectorAll` permet de **sélectionner tous les éléments** correspondant au sélecteur CSS.

### Syntaxe

```js
document.querySelectorAll(selecteur)
```

* Retourne une **NodeList**, qui est une collection de nœuds (semblable à un tableau).
* Tu peux parcourir cette NodeList avec `forEach`, `for`, etc.

### Exemple

```html
<div class="box"></div>
<div class="box"></div>
<script>
  const allBoxes = document.querySelectorAll('.box');
  allBoxes.forEach(box => console.log(box)); // renvoie les deux div
</script>
```

---

## 3. Sélecteurs avancés

Tu peux utiliser n’importe quel sélecteur CSS :

* **ID** : `#monId`
* **Classe** : `.maClasse`
* **Balise** : `div`, `p`, etc.
* **Attribut** : `[type="text"]`
* **Combinaison** : `div.box > p.highlight`

### Exemple

```html
<p class="highlight" id="para1">Hello</p>
<script>
  const para = document.querySelector('#para1.highlight');
  console.log(para.textContent); // Hello
</script>
```

---

## 4. Différences principales entre `getElementById`, `getElementsByClassName` et `querySelector`

| Méthode                  | Sélecteur             | Retourne        | Multiple ? |
| ------------------------ | --------------------- | --------------- | ---------- |
| `getElementById`         | ID (`'monId'`)        | Element         | Non        |
| `getElementsByClassName` | Classe (`'maClasse'`) | HTMLCollection  | Oui        |
| `querySelector`          | Tout sélecteur CSS    | Premier élément | Non        |
| `querySelectorAll`       | Tout sélecteur CSS    | NodeList        | Oui        |

---

## 5. Bonnes pratiques

✅ Utiliser `querySelector` ou `querySelectorAll` pour plus de flexibilité avec les sélecteurs CSS.
✅ Si tu cherches un seul élément précis par ID, `getElementById` peut être légèrement plus performant.
✅ Pour parcourir tous les éléments, `querySelectorAll` avec `forEach` est pratique et moderne.

---

## 6. Résumé

* `querySelector` : premier élément correspondant à un sélecteur CSS.
* `querySelectorAll` : tous les éléments correspondants.
* Flexible grâce aux sélecteurs CSS.
* Retourne `null` si aucun élément trouvé (`querySelector`) ou une NodeList vide (`querySelectorAll`).

