# Cours : DOMTokenList en JavaScript

## 1. Définition
Un **DOMTokenList** est un objet JavaScript représentant une collection de chaînes de texte (appelées *tokens*).  
Il est surtout utilisé avec les **attributs qui contiennent plusieurs valeurs séparées par des espaces**, comme l’attribut `class` d’un élément HTML.

👉 Exemple :  
```html
<ul class="menu active"></ul>
```
Ici, `class="menu active"` est interprété comme une **liste de 2 tokens** : `"menu"` et `"active"`.

---

## 2. Accéder à un DOMTokenList
On récupère généralement un `DOMTokenList` grâce à la propriété **`element.classList`**.

```js
const ul = document.querySelector("ul");
console.log(ul.classList);
```

Affichage dans la console :
```
DOMTokenList(2) ["menu", "active", value: "menu active"]
```

---

## 3. Méthodes principales
`DOMTokenList` fournit plusieurs méthodes très pratiques :

- **`add(token)`** → ajoute une valeur
  ```js
  ul.classList.add("hidden");
  ```

- **`remove(token)`** → supprime une valeur
  ```js
  ul.classList.remove("active");
  ```

- **`toggle(token)`** → ajoute si absent, supprime si présent
  ```js
  ul.classList.toggle("dark-mode");
  ```

- **`contains(token)`** → renvoie `true` si la valeur est présente
  ```js
  console.log(ul.classList.contains("menu")); // true
  ```

- **`replace(old, new)`** → remplace une valeur par une autre
  ```js
  ul.classList.replace("active", "inactive");
  ```

---

## 4. Propriétés utiles
- **`length`** → nombre de tokens  
  ```js
  console.log(ul.classList.length); // 2
  ```

- **Accès par index** (comme un tableau)
  ```js
  console.log(ul.classList[0]); // "menu"
  ```

---

## 5. Cas pratiques
```js
// Ajouter une classe
ul.classList.add("visible");

// Vérifier si une classe existe
if (ul.classList.contains("active")) {
  console.log("L'élément est actif !");
}

// Alterner une classe (ex: mode sombre)
document.body.classList.toggle("dark-mode");
```

---

## 6. Résumé
- `DOMTokenList` = une **liste dynamique de chaînes** (tokens).  
- Principal usage : **`classList`** pour manipuler les classes CSS.  
- Méthodes clés : `add`, `remove`, `toggle`, `contains`, `replace`.  
- Très utile pour rendre ton code plus lisible que de modifier directement `element.className`.

---