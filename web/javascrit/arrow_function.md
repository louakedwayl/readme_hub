
# Les Fonctions Fléchées (Arrow Functions) en JavaScript

Les **fonctions fléchées** (arrow functions) ont été introduites avec **ES6 (ECMAScript 2015)**.  
Elles offrent une **syntaxe plus concise** pour écrire des fonctions et modifient le comportement de `this`.

---

## 1. Syntaxe de Base

### Fonction classique :
```js
function add(a, b) {
    return a + b;
}
```

### Fonction fléchée :
```js
const add = (a, b) => {
    return a + b;
};
```

Si la fonction contient **une seule expression**, on peut omettre les accolades `{}` et le mot-clé `return` :
```js
const add = (a, b) => a + b;
```

### Cas avec un seul paramètre :
Si la fonction n’a **qu’un seul paramètre**, on peut également enlever les parenthèses :
```js
const square = x => x * x;
```

Si la fonction n’a **aucun paramètre**, on met des parenthèses vides :
```js
const sayHello = () => console.log("Hello!");
```

---

## 2. Différences avec les Fonctions Classiques

### 2.1 Pas de `this` propre
Les fonctions fléchées **ne créent pas leur propre `this`**.  
Elles conservent le `this` du contexte dans lequel elles sont définies.

```js
function Person() {
    this.age = 0;

    setInterval(() => {
        this.age++; // `this` fait référence à l'objet Person
        console.log(this.age);
    }, 1000);
}
new Person();
```
Avec une fonction classique dans `setInterval`, `this` aurait été `undefined` ou l'objet global.

### 2.2 Pas d'arguments implicites
Les fonctions fléchées **n’ont pas accès à l’objet `arguments`**.
Si tu veux utiliser des arguments dynamiques, utilise une fonction classique ou le **rest operator** :
```js
const sum = (...numbers) => numbers.reduce((acc, n) => acc + n, 0);
```

### 2.3 Non constructibles
On **ne peut pas utiliser `new`** avec une fonction fléchée.  
Elles ne sont **pas conçues pour être des constructeurs**.

---

## 3. Utilisations Courantes

### 3.1 Fonctions de rappel (callbacks)
Les fonctions fléchées sont idéales pour les callbacks :
```js
const numbers = [1, 2, 3, 4];
const squares = numbers.map(n => n * n);
console.log(squares); // [1, 4, 9, 16]
```

### 3.2 Fonctions anonymes rapides
```js
setTimeout(() => console.log("Hello after 1s"), 1000);
```

### 3.3 Méthodes courtes dans les objets
```js
const obj = {
    name: "Alice",
    greet: () => console.log(`Hello, ${this.name}`) // Attention: `this` n'est pas l'objet
};
```

---

## 4. Quand les Utiliser ?

### Avantages :
- Syntaxe courte et lisible.
- Idéales pour les **fonctions anonymes**.
- Gardent le **contexte `this`**, pratique dans les callbacks.

### À éviter pour :
- Les méthodes d’objet qui doivent utiliser `this`.
- Les fonctions constructrices (avec `new`).

---

## 5. Résumé

- **Syntaxe concise** : `(param) => expression`.
- **Pas de `this` propre** : elles héritent du `this` du contexte.
- **Pas d'arguments implicites** : utiliser `...rest` si nécessaire.
- **Pas de constructeur** : impossible d’utiliser `new`.

---

### Exemple final :
```js
const greet = name => `Hello, ${name}!`;
console.log(greet("John")); // Hello, John!
```

En résumé, **les fonctions fléchées** rendent le code plus concis et facilitent la gestion du `this`, surtout dans les callbacks.
