# Les Tuples en TypeScript

En TypeScript, un **tuple** est un type spécial de tableau dont la longueur et les types des éléments sont connus à l’avance. Cela permet de stocker plusieurs valeurs de types différents dans un même tableau de manière sécurisée.

---

## 1. Déclaration d’un tuple

```ts
// Tuple avec deux éléments : un string et un number
let tuple1: [string, number];

tuple1 = ["Alice", 30]; // ✅ correct
tuple1 = [30, "Alice"]; // ❌ erreur : types inversés
```

---

## 2. Accès aux éléments

Les tuples permettent d’accéder aux éléments comme un tableau classique, mais TypeScript connaît le type exact de chaque élément :

```ts
let tuple2: [string, boolean] = ["OK", true];

let message: string = tuple2[0]; // ✅ OK
let flag: boolean = tuple2[1];   // ✅ OK

tuple2[0] = "Bonjour"; // ✅ correct
tuple2[1] = false;     // ✅ correct
```

⚠️ Attention : accéder à un index qui n’existe pas ou assigner un type incorrect provoque une erreur.

---

## 3. Tuples avec un nombre variable d’éléments

TypeScript 4+ permet les **tuples rest** :

```ts
let tuple3: [number, ...string[]] = [1, "a", "b", "c"];

console.log(tuple3); // [1, "a", "b", "c"]
```

Ici, le premier élément est un `number`, et tous les suivants sont des `string`.

---

## 4. Utilisation dans les fonctions

Les tuples sont utiles pour les fonctions qui retournent plusieurs valeurs :

```ts
function calculer(a: number, b: number): [number, number] {
  const somme = a + b;
  const produit = a * b;
  return [somme, produit];
}

const [somme, produit] = calculer(3, 4);
console.log(somme);   // 7
console.log(produit); // 12
```

---

## 5. Tuples et type `readonly`

On peut rendre un tuple **immutable** avec `readonly` :

```ts
let tuple4: readonly [string, number] = ["Alice", 30];

tuple4[0] = "Bob"; // ❌ Erreur : tuple readonly
```

---

## 6. Résumé

* Un **tuple** est un tableau avec un nombre fixe d’éléments et des types connus.
* Il est utile pour stocker des données hétérogènes de manière sécurisée.
* Avec TypeScript 4+, les tuples peuvent avoir des éléments variables grâce aux tuples rest.
* Les tuples peuvent être rendus immuables avec `readonly`.

---

**Références :**

* [TypeScript Handbook: Tuples](https://www.typescriptlang.org/docs/handbook/2/objects.html#tuple-types)

