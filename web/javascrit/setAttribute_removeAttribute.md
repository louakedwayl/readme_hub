# 📘 `setAttribute` et `removeAttribute` en JavaScript

## 1. `setAttribute`

* La méthode `setAttribute` permet de **définir ou modifier un attribut** d’un élément HTML.
* Syntaxe :

```js
element.setAttribute(nomAttribut, valeur);
```

* Si l’attribut existe déjà, sa valeur sera **remplacée**.

### Exemple

```html
<img id="myImage" src="image1.png">
<script>
  const img = document.getElementById('myImage');
  img.setAttribute('src', 'image2.png'); // change la source de l'image
  img.setAttribute('alt', 'Nouvelle image'); // ajoute un attribut alt
</script>
```

---

## 2. `removeAttribute`

* La méthode `removeAttribute` permet de **supprimer un attribut** d’un élément HTML.
* Syntaxe :

```js
element.removeAttribute(nomAttribut);
```

* Si l’attribut n’existe pas, rien ne se passe.

### Exemple

```html
<img id="myImage" src="image2.png" alt="Nouvelle image">
<script>
  const img = document.getElementById('myImage');
  img.removeAttribute('alt'); // supprime l'attribut alt
  img.removeAttribute('title'); // ne fait rien si title n'existe pas
</script>
```

---

## 3. Différences avec les propriétés directes

* On peut aussi accéder directement aux attributs via `element.src`, `element.id`, etc.
* **`setAttribute` et `removeAttribute` fonctionnent sur tous les attributs HTML**, même ceux non exposés comme propriétés JS.

```js
const input = document.querySelector('input');
input.setAttribute('type', 'password'); // fonctionne même si input.type est spécial
input.removeAttribute('required');       // supprime l'attribut HTML
```

---

## 4. Bonnes pratiques

✅ Utiliser `setAttribute` pour ajouter ou modifier des attributs HTML de manière universelle.
✅ Utiliser `removeAttribute` pour nettoyer ou supprimer des attributs inutiles.
✅ Pour des attributs standard très courants, accéder directement à la propriété JS peut être plus rapide (`element.id = 'newId'`).

---

## 5. Résumé

* `setAttribute(nom, valeur)` : ajoute ou modifie un attribut.
* `removeAttribute(nom)` : supprime un attribut.
* Ces méthodes sont universelles et fonctionnent pour tous les attributs HTML.
