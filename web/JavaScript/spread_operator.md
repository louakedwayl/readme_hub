# L'opérateur Spread (`...`) en JavaScript

## 1. Introduction
L'opérateur **spread** (`...`) permet de **décomposer un tableau, un objet ou une chaîne** en ses éléments.  
Il est apparu avec **ES6 (ECMAScript 2015)** et simplifie grandement la manipulation des données.

---

## 2. Utilisation principale

### a) Avec les tableaux

```js
const arr1 = [1, 2, 3];
const arr2 = [4, 5];
const merged = [...arr1, ...arr2];
console.log(merged); // [1, 2, 3, 4, 5]
```

### b) Avec les objets

```js
const obj1 = { a: 1, b: 2 };
const obj2 = { b: 3, c: 4 };
const mergedObj = { ...obj1, ...obj2 };
console.log(mergedObj); // { a: 1, b: 3, c: 4 }
```

> **Attention** : si deux propriétés ont le même nom, **la dernière écrase la précédente**.

### c) Avec les chaînes

```js
const str = "Hello";
const chars = [...str];
console.log(chars); // ["H", "e", "l", "l", "o"]
```

---

## 3. Cas d'usage courants

- **Copie d'un tableau** :  
```js
const copy = [...arr1];
```
- **Fusion de tableaux** :  
```js
const fusion = [...arr1, ...arr2];
```
- **Ajout d'éléments facilement** :  
```js
const arr3 = [0, ...arr1, 4];
```
- **Copie d'objet** :  
```js
const copyObj = { ...obj1 };
```
- **Mise à jour d'objets** :  
```js
const updated = { ...obj1, b: 10 };
```

---

## 4. Différence avec `rest`
Le spread (`...`) **décompose** une structure, tandis que le **rest** (`...`) **regroupe** des éléments dans une fonction :

```js
function somme(...nombres) {
    return nombres.reduce((a, b) => a + b, 0);
}
console.log(somme(1, 2, 3)); // 6
```

---

## 5. Points d'attention
- Avec les **objets imbriqués**, le spread fait une **copie superficielle** (shallow copy).  
- Pour une **copie profonde**, il faut utiliser des techniques comme `structuredClone()` ou `JSON.parse(JSON.stringify(obj))`.

---

## 6. Exercices rapides
1. Fusionner deux tableaux `a = [1,2]` et `b = [3,4]` avec spread.  
2. Cloner un objet `user = {name:"Alex", age:20}` et changer `age` à `21` sans modifier l'original.  
3. Convertir la chaîne `"42School"` en tableau de lettres.

---

## 7. Conclusion
L'opérateur **spread** est un outil puissant pour simplifier la manipulation des **tableaux**, **objets** et **chaînes**.  
Il rend le code plus **lisible** et **concise**.

---

