# 📘 Cours sur le Narrowing en TypeScript

Le **narrowing** (ou affinage de type) est le processus par lequel TypeScript réduit le type possible d’une variable, en fonction du **flux du code** et de certaines **vérifications** que tu effectues.  
Cela permet à TypeScript de mieux comprendre ton intention et d’éviter des erreurs.

---

## 🔹 1. Pourquoi le Narrowing ?
En TypeScript, une variable peut avoir plusieurs types (via une **union**).  
Exemple :
```ts
let value: string | number;
```
Ici, `value` peut être soit un `string`, soit un `number`.  
Mais selon le code, on peut **réduire** ce type à un seul cas.

---

## 🔹 2. Les techniques de Narrowing

### ✅ a) `typeof`
```ts
function printLength(x: string | number) {
  if (typeof x === "string") {
    console.log(x.length); // Ici x est un string
  } else {
    console.log(x.toFixed(2)); // Ici x est un number
  }
}
```

### ✅ b) Vérification de valeur (`===`, `!==`)
```ts
function move(direction: "left" | "right") {
  if (direction === "left") {
    console.log("On va à gauche");
  } else {
    console.log("On va à droite");
  }
}
```

### ✅ c) Vérification de `null` ou `undefined`
```ts
function greet(name?: string) {
  if (name !== undefined) {
    console.log("Bonjour " + name.toUpperCase());
  } else {
    console.log("Bonjour invité");
  }
}
```

### ✅ d) L’opérateur `in`
```ts
type User = { name: string };
type Admin = { name: string; rights: string[] };

function showInfo(person: User | Admin) {
  if ("rights" in person) {
    console.log("Admin avec droits:", person.rights);
  } else {
    console.log("Utilisateur:", person.name);
  }
}
```

### ✅ e) `instanceof`
```ts
class Dog {
  bark() { console.log("Woof!"); }
}

class Cat {
  meow() { console.log("Meow!"); }
}

function speak(animal: Dog | Cat) {
  if (animal instanceof Dog) {
    animal.bark();
  } else {
    animal.meow();
  }
}
```

### ✅ f) Type predicates (fonctions personnalisées)
```ts
type Fish = { swim: () => void };
type Bird = { fly: () => void };

function isFish(animal: Fish | Bird): animal is Fish {
  return (animal as Fish).swim !== undefined;
}

function move(animal: Fish | Bird) {
  if (isFish(animal)) {
    animal.swim();
  } else {
    animal.fly();
  }
}
```

---

## 🔹 3. Exemple global
```ts
function format(value: string | number | null) {
  if (value === null) {
    return "Valeur manquante";
  } else if (typeof value === "string") {
    return value.toUpperCase();
  } else {
    return value.toFixed(2);
  }
}
```
👉 Ici, TypeScript comprend automatiquement quel type est en jeu selon les conditions.

---

## 🔹 4. À retenir
- Le **narrowing** permet à TypeScript de réduire les types possibles selon le **contexte**.
- Les outils les plus courants :
  - `typeof`
  - Comparaisons (`===`, `!==`)
  - `in`
  - `instanceof`
  - Vérification `null` / `undefined`
  - Fonctions personnalisées (`is Type`)

---
