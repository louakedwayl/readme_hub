# Cours : JSON.stringify en JavaScript

## 1. Qu'est-ce que JSON.stringify ?

`JSON.stringify()` est une fonction JavaScript qui permet de **convertir un objet ou un tableau JavaScript en chaîne de caractères (string) au format JSON**. Cette chaîne peut ensuite être affichée dans le HTML, enregistrée dans un fichier, ou envoyée à un serveur.

---

## 2. Syntaxe

```js
JSON.stringify(value, replacer, space)
```

* **value** : l’objet ou tableau à convertir.
* **replacer** (optionnel) : une fonction ou un tableau qui contrôle ce qui doit être inclus.
* **space** (optionnel) : nombre d'espaces pour indenter le texte, pour le rendre lisible.

---

## 3. Exemple simple

```js
const obj = { nom: "Alice", age: 25 };

const texte = JSON.stringify(obj);
console.log(texte);
// sortie : '{"nom":"Alice","age":25}'
```

* Ici, l'objet `obj` est transformé en texte JSON.

---

## 4. Exemple avec indentation

```js
const texteLisible = JSON.stringify(obj, null, 2);
console.log(texteLisible);
```

* `null` : pas de fonction de remplacement.
* `2` : indentation de 2 espaces pour rendre le JSON lisible.

**Sortie :**

```json
{
  "nom": "Alice",
  "age": 25
}
```

---

## 5. Exemple avec un tableau

```js
const posts = [
  { id: 1, title: "Premier post" },
  { id: 2, title: "Deuxième post" }
];

const textePosts = JSON.stringify(posts, null, 2);
console.log(textePosts);
```

**Sortie :**

```json
[
  {
    "id": 1,
    "title": "Premier post"
  },
  {
    "id": 2,
    "title": "Deuxième post"
  }
]
```

---

## 6. Utilité

* Permet d’**afficher un objet ou un tableau dans le HTML** avec `innerText` ou `console.log`.
* Permet de **sauvegarder ou envoyer des données** en JSON.
* Très utile pour le **debug** ou pour communiquer avec des API.

---

## 7. Remarque

Si tu veux seulement afficher certaines valeurs (par exemple uniquement les titres des posts), tu n’as pas besoin de `JSON.stringify`. Tu peux utiliser une boucle ou `map` pour transformer les données en texte HTML.

