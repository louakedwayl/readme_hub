# 🚀 Les exports en JavaScript (ES Modules)

En JavaScript moderne (ES6+), on peut **organiser le code** en plusieurs fichiers grâce aux **modules**.  
Pour rendre une fonction, une variable ou une classe disponible à l’extérieur d’un fichier, on utilise le mot-clé **`export`**.  
Et pour l’utiliser dans un autre fichier, on fait un **`import`**.

---

## 1. Export par défaut (`export default`)

- Chaque fichier peut avoir **un seul export par défaut**.
- On l’importe avec le nom qu’on veut.

### Exemple :
```js
// fichier: math.js
export default function add(a, b) {
  return a + b;
}
```

```js
// fichier: main.js
import addition from "./math.js";

console.log(addition(2, 3)); // 5
```

> Ici, `add` est exporté par défaut, et lors de l’import, on peut l’appeler `addition` ou n’importe quel autre nom.

---

## 2. Export nommé (`export`)

- On peut avoir **plusieurs exports nommés** dans un fichier.
- Lorsqu’on importe, il faut utiliser les **mêmes noms** entre `{ }`.

### Exemple :
```js
// fichier: math.js
export const PI = 3.14159;

export function multiply(a, b) {
  return a * b;
}
```

```js
// fichier: main.js
import { PI, multiply } from "./math.js";

console.log(PI); // 3.14159
console.log(multiply(2, 3)); // 6
```

---

## 3. Export renommé

On peut aussi **renommer un export** pour éviter les conflits.

```js
// fichier: math.js
export function add(a, b) {
  return a + b;
}

export function subtract(a, b) {
  return a - b;
}
```

```js
// fichier: main.js
import { add as addition, subtract as soustraction } from "./math.js";

console.log(addition(5, 2)); // 7
console.log(soustraction(5, 2)); // 3
```

---

## 4. Tout exporter en un seul objet (`import * as`)

On peut importer **tous les exports nommés** d’un fichier dans un objet.

```js
// fichier: math.js
export const PI = 3.14;
export function square(x) {
  return x * x;
}
```

```js
// fichier: main.js
import * as MathUtils from "./math.js";

console.log(MathUtils.PI);       // 3.14
console.log(MathUtils.square(4)); // 16
```

---

## 5. Export direct

On peut exporter **directement lors de la déclaration**.

```js
export const name = "Wayl";
export function hello() {
  console.log("Hello!");
}
```

Ou séparer la déclaration et l’export :

```js
const age = 21;
function greet() {
  console.log("Salut!");
}

export { age, greet };
```

---

## 🎯 Récapitulatif

- `export default` : **un seul par fichier**, importé sans `{ }`.
- `export` : plusieurs possibles, importés avec `{ }`.
- `import * as X` : regrouper tous les exports dans un objet.
- `as` : permet de renommer lors de l’export ou de l’import.

---