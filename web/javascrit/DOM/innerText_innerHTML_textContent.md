# 📘 `innerText` vs `textContent` vs `innerHTML` en JavaScript

## 1. Qu’est-ce que `innerText` ?

* `innerText` est une propriété des éléments DOM qui permet de **récupérer ou modifier le texte visible** d’un élément.
* Il **respecte le rendu CSS** : par exemple, le texte caché (`display: none`) n’est pas inclus.
* Lecture et écriture déclenchent un **recalcul du rendu**, ce qui peut être moins performant.

### Exemple

```html
<div id="demo" style="display:none">Hello World</div>
<script>
  const elem = document.getElementById('demo');
  console.log(elem.innerText); // '' (texte non visible)
  elem.innerText = 'Bonjour';  // remplace le texte affiché
</script>
```

* Le contenu est considéré comme du texte brut.
* Les balises sont affichées telles quelles et non interprétées.

```js
div.innerText = "<b>Bonjour</b>";
// Affiche : <b>Bonjour</b> (le texte, pas en gras)
```
---

## 2. Qu’est-ce que `textContent` ?

* `textContent` est une propriété des éléments DOM qui retourne **tout le texte contenu dans l’élément**, peu importe s’il est visible ou non.
* Plus **rapide** car il ne déclenche pas de recalcul de rendu.
* Inclus le texte des éléments enfants.

### Exemple

```html
<div id="demo" style="display:none">Hello <span>World</span></div>
<script>
  const elem = document.getElementById('demo');
  console.log(elem.textContent); // 'Hello World'
  elem.textContent = 'Bonjour tout le monde'; // remplace tout le texte
</script>
```

---

## 3. Qu’est-ce que `innerHTML` ?

* `innerHTML` est une propriété qui retourne **tout le contenu HTML** à l’intérieur d’un élément, y compris les balises.
* Permet aussi de **remplacer le contenu HTML entier** de l’élément.
* Attention : modifier `innerHTML` supprime les anciens éléments et leurs événements attachés.

### Exemple

```html
<div id="demo">Hello <span>World</span></div>
<script>
  const elem = document.getElementById('demo');
  console.log(elem.innerHTML); // 'Hello <span>World</span>'
  elem.innerHTML = 'Bonjour <strong>tout le monde</strong>';
</script>
```

* Le contenu est interprété comme du HTML.
* Donc si tu mets une balise dans la chaîne, elle sera rendue dans la page.

```js
div.innerHTML = "<b>Bonjour</b>";
// Affiche : Bonjour (en gras)
```
---

## 4. Différences principales

| Propriété     | Texte visible uniquement ? | Inclut HTML ? | Performance  | Recalcule le rendu ? | Inclut le texte des enfants ? |
| ------------- | -------------------------- | ------------- | ------------ | -------------------- | ----------------------------- |
| `innerText`   | Oui                        | Non           | Moins rapide | Oui                  | Oui                           |
| `textContent` | Non                        | Non           | Plus rapide  | Non                  | Oui                           |
| `innerHTML`   | Non                        | Oui           | Moyenne      | Oui                  | Oui                           |

---

## 5. Quand utiliser quoi ?

* **`innerText`** : récupérer ou modifier **uniquement le texte visible**.
* **`textContent`** : récupérer ou modifier **tout le texte**, rapide et sûr.
* **`innerHTML`** : manipuler ou insérer du **HTML complet**, y compris les balises.

---

## 6. Bonnes pratiques

✅ Pour la plupart des opérations sur le texte, **`textContent`** est recommandé.
✅ Utiliser `innerText` si tu tiens compte du style CSS.
✅ Utiliser `innerHTML` uniquement quand tu veux vraiment insérer ou remplacer du HTML, et être conscient que les anciens événements seront perdus.

---

## 7. Résumé

* `innerText` : texte visible, dépend du rendu CSS, recalcul du rendu.
* `textContent` : texte complet, rapide, ne dépend pas du rendu CSS.
* `innerHTML` : contenu HTML complet, inclut les balises, peut supprimer les événements existants.
