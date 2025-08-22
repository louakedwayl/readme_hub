# 📘 Cours : Les Modules en JavaScript

## 1. Qu’est-ce qu’un module en JavaScript ?
Un **module** est un fichier JavaScript qui contient du code (fonctions, variables, classes, etc.)
et qui peut être **réutilisé** dans d’autres fichiers.  
Cela permet :
- de mieux organiser son code,
- d’éviter les variables globales,
- de rendre le code plus lisible et maintenable.

---

## 2. Exporter en JavaScript

Pour partager du code entre fichiers, on utilise **export**.

### 2.1. Export nommé
On peut exporter plusieurs éléments d’un fichier :

```js
// mathUtils.js
export const PI = 3.14;

export function add(a, b) {
  return a + b;
}

export function multiply(a, b) {
  return a * b;
}
```

👉 Ici, on a exporté **PI**, **add**, et **multiply**.

### 2.2. Export par défaut
Un fichier peut aussi avoir un **export par défaut** (souvent une seule fonction ou classe) :

```js
// greet.js
export default function greet(name) {
  return `Hello, ${name}!`;
}
```

👉 Ici, la fonction `greet` est l’export par défaut.

---

## 3. Importer en JavaScript

Pour utiliser le contenu d’un module, on fait un **import**.

### 3.1. Importer des exports nommés
```js
// main.js
import { PI, add, multiply } from './mathUtils.js';

console.log(PI);         // 3.14
console.log(add(2, 3));  // 5
```

👉 On utilise `{ }` pour importer des exports nommés.

### 3.2. Importer un export par défaut
```js
// main.js
import greet from './greet.js';

console.log(greet("Wayl")); // "Hello, Wayl!"
```

👉 Pas besoin de `{ }` pour l’export par défaut.

### 3.3. Importer tout le module
```js
// main.js
import * as MathUtils from './mathUtils.js';

console.log(MathUtils.PI);           // 3.14
console.log(MathUtils.add(2, 3));    // 5
```

👉 Utile pour grouper tout le module dans un seul objet.

---

## 4. Cas pratiques

### 4.1. Renommer un import
```js
import { add as addition } from './mathUtils.js';

console.log(addition(5, 6)); // 11
```

### 4.2. Mélanger export nommé et export par défaut
```js
// user.js
export const role = "student";
export default function getUser(name) {
  return { name, role };
}

// main.js
import getUser, { role } from './user.js';

console.log(getUser("Wayl")); // { name: "Wayl", role: "student" }
console.log(role);            // "student"
```

---

## 5. Modules et Node.js

En **Node.js**, il existe deux systèmes de modules :

1. **CommonJS (ancien système)** avec `require` et `module.exports` :
   ```js
   // math.cjs
   const add = (a, b) => a + b;
   module.exports = { add };
   
   // main.cjs
   const { add } = require('./math.cjs');
   console.log(add(2, 3));
   ```

2. **ES Modules (ESM)** (moderne, comme dans le navigateur) :
   - Utiliser l’extension `.mjs` **ou** mettre `"type": "module"` dans `package.json`.
   - Ensuite, on peut utiliser `import` et `export` comme vu plus haut.

---

## 6. Avantages des modules
✅ Organisation claire du code  
✅ Réutilisation des fonctions/classes  
✅ Encapsulation (pas de variables globales)  
✅ Chargement dynamique possible (`import()`)  

---

## 7. Exemple concret d’application

**Fichier : mathUtils.js**
```js
export function sum(arr) {
  return arr.reduce((acc, val) => acc + val, 0);
}
```

**Fichier : main.js**
```js
import { sum } from './mathUtils.js';

console.log(sum([1, 2, 3, 4])); // 10
```
