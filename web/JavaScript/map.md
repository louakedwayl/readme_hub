# La méthode `map()` en JavaScript

## 🔹 Définition

`map()` est une méthode des tableaux (**arrays**) qui permet de :

👉 **parcourir un tableau et créer un nouveau tableau transformé**

---

## 🔹 Exemple simple

```js
const numbers = [1, 2, 3];

const result = numbers.map(n => n * 2);
```

👉 Résultat :

```js
[2, 4, 6]
```

---

## 🔹 Comment ça fonctionne

- `map()` parcourt chaque élément du tableau
- applique une fonction
- retourne un **nouveau tableau**

---

## 🔹 Syntaxe

```js
array.map((element) => {
  return transformation;
});
```

---

## 🔹 Exemple avec texte

```js
const names = ["Wayl", "Anna"];

const result = names.map(name => "Hello " + name);
```

👉 Résultat :

```js
["Hello Wayl", "Hello Anna"]
```

---

## 🔹 Important

- `map()` ne modifie **pas** le tableau d’origine
- il crée un **nouveau tableau**

---

## 🔹 Différence avec `forEach`

```js
array.forEach(...)
```

👉 `forEach` :
- exécute une action
- ne retourne rien

👉 `map` :
- transforme
- retourne un tableau

---

## 🔹 En React (JSX)

Très utilisé pour afficher des listes :

```jsx
const items = ["A", "B", "C"];

return (
  <ul>
    {items.map(item => <li>{item}</li>)}
  </ul>
);
```

---

## 🔥 Résumé

- `map()` parcourt un tableau
- applique une transformation
- retourne un nouveau tableau
- très utilisé en React pour afficher des listes
