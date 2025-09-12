# 📘 Type vs Interface en TypeScript

En TypeScript, `type` et `interface` permettent de définir des **formes de données** (objets, fonctions, etc.).  
Ils semblent similaires, mais il existe des différences importantes.

---

## 1️⃣ Définition d’un `type`

Un `type` permet de créer un **alias** pour un type existant ou complexe.

```ts
type ID = number | string; // alias
type Point = {
  x: number;
  y: number;
};

const p1: Point = { x: 10, y: 20 };
```

✅ Un `type` peut :  
- Combiner plusieurs types avec `|` (union) ou `&` (intersection).  
- Représenter des types primitifs, des tuples, des fonctions.  

---

## 2️⃣ Définition d’une `interface`

Une `interface` décrit la **structure d’un objet** ou d’une **classe**.

```ts
interface Person {
  name: string;
  age: number;
  greet(): void;
}

const user: Person = {
  name: "Alice",
  age: 25,
  greet() {
    console.log("Hello!");
  },
};
```

✅ Une `interface` peut :  
- Être **implémentée** par une classe (`class implements Interface`).  
- Être **étendue** avec `extends`.  

---

## 3️⃣ Similarités

- Les deux servent à définir des **formes de données**.  
- Les deux supportent **l’héritage** (`extends` pour interface, `&` pour type).  
- Les deux sont effacés à la compilation (ils n’existent pas en JavaScript).  

---

## 4️⃣ Différences principales

| Aspect                  | `type`                                | `interface`                             |
| ----------------------- | -------------------------------------- | --------------------------------------- |
| Alias                   | ✅ Peut créer un alias de type         | ❌ Seulement pour objets et classes      |
| Unions & intersections  | ✅ Supporte `|` et `&`                 | ❌ Non                                  |
| Étendre                 | ✅ Avec `&`                           | ✅ Avec `extends`                       |
| Implémentation classe   | ❌ Pas directement                     | ✅ `class MyClass implements Interface` |
| Redéfinition            | ❌ Impossible                          | ✅ Possible (merge automatique)         |

---

## 5️⃣ Quand utiliser ?

- Utilise **`interface`** :  
  - Pour décrire la **forme d’un objet** ou d’une **classe**.  
  - Quand tu veux bénéficier du **merge** automatique.  

- Utilise **`type`** :  
  - Pour des **alias de types primitifs, unions, intersections**.  
  - Quand tu dois décrire des structures complexes (fonctions, tuples, etc.).  

---

## 6️⃣ Exemple comparatif

```ts
// Avec type
type Animal = {
  name: string;
};
type Dog = Animal & {
  bark(): void;
};

// Avec interface
interface Animal2 {
  name: string;
}
interface Dog2 extends Animal2 {
  bark(): void;
}

const d: Dog2 = { name: "Rex", bark: () => console.log("Woof!") };
```

---

📌 **Résumé** :  
- `type` = plus flexible, adapté aux unions/alias complexes.  
- `interface` = mieux pour définir des contrats d’objets ou classes.  
