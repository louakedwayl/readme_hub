# Cours sur ECMAScript (ES)

## 1. Introduction à ECMAScript

**ECMAScript** (souvent abrégé **ES**) est la **spécification standard du langage JavaScript**.
JavaScript est donc une **implémentation** d’ECMAScript.
Cette standardisation est assurée par **ECMA International** (European Computer Manufacturers Association).

> En résumé : ECMAScript = règles et standard ; JavaScript = langage qu’on utilise au quotidien.

---

## 2. Historique des versions

| Version     | Année | Principales nouveautés                                                            |
| ----------- | ----- | --------------------------------------------------------------------------------- |
| ES1         | 1997  | Première version standard                                                         |
| ES2         | 1998  | Corrections mineures                                                              |
| ES3         | 1999  | Bases solides du langage moderne                                                  |
| ES4         | N/A   | Projet abandonné                                                                  |
| ES5         | 2009  | `JSON`, `strict mode`, méthodes modernes pour tableaux et objets                  |
| ES6 / 2015  | 2015  | Classes, modules, `let`/`const`, fonctions fléchées, template literals, promesses |
| ES7 / 2016  | 2016  | `Array.includes`, opérateur exponentiation (`**`)                                 |
| ES8 / 2017  | 2017  | `async/await`, `Object.entries`, `Object.values`                                  |
| ES9 / 2018  | 2018  | `Rest/Spread` pour objets, `Promise.finally`                                      |
| ES10 / 2019 | 2019  | `Array.flat`, `Array.flatMap`                                                     |
| ES11 / 2020 | 2020  | `BigInt`, `Nullish Coalescing (??)`, `Optional Chaining (?.)`                     |
| ES12 / 2021 | 2021  | `Logical Assignment Operators`, `String.replaceAll`                               |
| ES13 / 2022 | 2022  | `Top-level await`, améliorations syntaxiques                                      |
| ES14 / 2023 | 2023  | Améliorations mineures et nouvelles APIs                                          |

---

## 3. Pourquoi ECMAScript est important

1. **Compatibilité** : Les navigateurs suivent la spécification pour que le code JavaScript fonctionne partout.
2. **Évolution** : Chaque version apporte des fonctionnalités modernes pour écrire du code plus propre et performant.
3. **Standardisation** : Permet d’avoir des règles claires, évitant des implémentations divergentes entre navigateurs.

---

## 4. Exemples pratiques des nouveautés d’ES6 et plus

### 4.1 Déclarations de variables

```js
let x = 10;   // variable réassignable
const y = 20; // constante, non réassignable
```

### 4.2 Fonctions fléchées

```js
const add = (a, b) => a + b;
```

### 4.3 Classes et objets

```js
class Person {
  constructor(name) {
    this.name = name;
  }
  greet() {
    console.log(`Hello ${this.name}`);
  }
}

const john = new Person('John');
john.greet(); // Hello John
```

### 4.4 Modules

```js
// module.js
export const pi = 3.14;

// main.js
import { pi } from './module.js';
```

### 4.5 Template literals

```js
const name = 'Wayl';
console.log(`Hello ${name}`); // Hello Wayl
```

### 4.6 Promises et async/await

```js
fetch('https://api.example.com/data')
  .then(response => response.json())
  .then(data => console.log(data));

async function getData() {
  const response = await fetch('https://api.example.com/data');
  const data = await response.json();
  console.log(data);
}
```

---

## 5. Conclusion

* ECMAScript définit **les règles et standards** du langage JavaScript.
* Les versions récentes (ES6+) apportent des **fonctionnalités modernes et pratiques**.
* Connaître ECMAScript permet d’écrire un code plus clair, performant et compatible avec différents environnements.

