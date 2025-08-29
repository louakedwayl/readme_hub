# Comprendre les types d'objets et éléments en JavaScript et DOM

## 1. Variables et types de base en JavaScript

En JavaScript, tu n’as pas besoin de déclarer le type d’une variable. Le type est **déduit automatiquement**.

```js
let numberVar = 5;       // Number
let stringVar = "hello"; // String
let boolVar = true;      // Boolean
let objVar = {};         // Object
let arrVar = [];         // Array
```

Types de base :

* **Number** : 1, 2, 3, 3.14
* **String** : "texte", 'texte'
* **Boolean** : true / false
* **Object** : { key: value }
* **Array** : \[1,2,3]

---

## 2. DOM et objets globaux

Le **DOM (Document Object Model)** est une interface qui représente le document HTML en JavaScript.

* L’objet global `document` est fourni par le navigateur.
* Il contient toute la structure HTML et des méthodes pour la manipuler.

Exemple :

```js
let myDiv = document.createElement("div"); // crée un élément <div>
document.body.appendChild(myDiv);          // ajoute <div> au body
```

---

## 3. Types d’éléments DOM

### 3.1 `Element`

* Tous les éléments HTML sont des objets de type `Element`.
* Possèdent des propriétés et méthodes pour manipuler les éléments.

### 3.2 `HTMLElement`

* Sous-type de `Element` pour tous les éléments HTML.
* Possède des propriétés spécifiques aux éléments HTML (ex : `innerText`, `className`, `id`).

### 3.3 Exemple

```js
let li = document.createElement("li");
console.log(li instanceof Element);    // true
console.log(li instanceof HTMLElement); // true
```

---

## 4. Propriétés importantes pour manipuler le contenu

| Propriété     | Description                                   | Quand l’utiliser              |
| ------------- | --------------------------------------------- | ----------------------------- |
| `textContent` | Récupère ou change le texte brut              | Texte simple, rapide          |
| `innerText`   | Récupère ou change le texte affiché à l’écran | Texte tel qu’on le voit       |
| `innerHTML`   | Récupère ou change le HTML à l’intérieur      | Quand tu veux insérer du HTML |

Exemple :

```js
let label = document.createElement("label");
label.textContent = "Texte brut";
label.innerText = "Texte affiché à l'écran";
label.innerHTML = "<strong>Texte en gras</strong>";
```

---

## 5. Sélection d’éléments dans le DOM

* `document.getElementById("id")` → sélectionne un élément par son ID
* `document.getElementsByClassName("class")` → sélectionne un HTMLCollection par classe
* `document.querySelector("css-selector")` → sélectionne **le premier élément** correspondant
* `document.querySelectorAll("css-selector")` → sélectionne **tous les éléments** correspondant

Exemple :

```js
const firstLabel = document.querySelector('label[for="todo-1"]');
firstLabel.textContent = "Nouvelle tâche";
```

---

## 6. Créer et manipuler des éléments dynamiquement

```js
const li = document.createElement("li");
li.className = "todo-item";

const input = document.createElement("input");
input.type = "checkbox";
input.id = "todo-1";

const label = document.createElement("label");
label.htmlFor = "todo-1";
label.textContent = "Acheter des patates";

li.appendChild(input);
li.appendChild(label);

document.querySelector(".list-group").appendChild(li);
```

---

## 7. Récupérer la saisie utilisateur

```js
const userInput = document.querySelector(".form-control");

userInput.addEventListener("change", () => {
    console.log(userInput.value);
});
```

ou via un formulaire :

```js
form.addEventListener("submit", (event) => {
    event.preventDefault(); // empêche le rechargement
    const value = userInput.value;
    console.log("Nouvelle tâche :", value);
});
```

---

## 8. Hiérarchie complète des objets DOM

Chaque élément dans le DOM hérite d'une chaîne d'objets. Voici la chaîne complète pour les éléments et le document :

### Pour un élément HTML, ex: `<div>`

```
divElement → HTMLDivElement → HTMLElement → Element → Node → EventTarget → Object
```

### Pour le document

```
document → HTMLDocument → Document → Node → EventTarget → Object
```

* `document` n’est pas un `HTMLElement`, mais c’est un objet (`Object`).
* `HTMLElement` est la base pour tous les éléments HTML (`<div>`, `<input>`, `<label>`, ...).
* Tous héritent finalement de `Object`.

### Exemple en JavaScript

```js
const input = document.createElement("input");
console.log(input instanceof HTMLInputElement); // true
console.log(input instanceof HTMLElement);      // true
console.log(input instanceof Element);          // true
console.log(input instanceof Node);             // true
console.log(input instanceof Object);           // true
```

---

### ✅ Résumé

* JavaScript est **faiblement typé**, on n’écrit pas le type des variables.
* Le **DOM** est manipulé via `document` et ses méthodes (`createElement`, `appendChild`, etc.).
* Les éléments sont des objets : `Element` et \`HTMLEleme
