# Syntaxe de base de TypeScript

TypeScript est un **superset de JavaScript** qui ajoute le **typage statique** et d’autres fonctionnalités avancées. Ce cours couvre la syntaxe de base et les éléments essentiels à connaître pour commencer.

---

## 1. Variables et types

TypeScript permet de **déclarer des variables avec un type**.

```ts
let name: string = "Alice";
const age: number = 25;
let isStudent: boolean = true;
```

### Types de base

| Type                 | Exemple                                        |
| -------------------- | ---------------------------------------------- |
| `string`             | `"Hello"`                                      |
| `number`             | `42`, `3.14`                                   |
| `boolean`            | `true`, `false`                                |
| `any`                | `let x: any = 5;`                              |
| `unknown`            | `let y: unknown;`                              |
| `void`               | fonctions sans retour                          |
| `null` / `undefined` | valeurs nulles ou non définies                 |
| `array`              | `let arr: number[] = [1,2,3];`                 |
| `tuple`              | `let tuple: [string, number] = ["Alice", 25];` |
| `enum`               | `enum Color {Red, Green, Blue}`                |

---

## 2. Fonctions

TypeScript permet de **typer les paramètres et le retour** des fonctions.

```ts
function add(a: number, b: number): number {
  return a + b;
}

const greet = (name: string): void => {
  console.log(`Hello ${name}`);
};
```

* Le type `void` signifie que la fonction ne retourne rien.

---

## 3. Interfaces et types personnalisés

### Interface

```ts
interface Person {
  name: string;
  age: number;
  isStudent?: boolean; // optionnel
}

const alice: Person = { name: "Alice", age: 25 };
```

### Type alias

```ts
type ID = string | number;
let userId: ID = "123";
userId = 456; // ✅
```

---

## 4. Classes et objets

TypeScript ajoute **des classes avec typage**.

```ts
class Person {
  name: string;
  age: number;

  constructor(name: string, age: number) {
    this.name = name;
    this.age = age;
  }

  greet(): void {
    console.log(`Hello, my name is ${this.name}`);
  }
}

const bob = new Person("Bob", 30);
bob.greet();
```

* Les propriétés et méthodes peuvent être **publiques, privées ou protégées**.

---

## 5. Modules et import/export

TypeScript utilise le système **ES6 modules**.

```ts
// math.ts
export function add(a: number, b: number): number {
  return a + b;
}

// main.ts
import { add } from "./math";
console.log(add(2,3));
```

---

## 6. Génériques (Generics)

Les génériques permettent de créer des fonctions ou classes **indépendantes du type**.

```ts
function identity<T>(arg: T): T {
  return arg;
}

let output = identity<string>("Hello");
let numberOutput = identity<number>(42);
```

---

## 7. Assertions de type

Pour forcer le compilateur à considérer une variable comme un certain type :

```ts
let someValue: any = "Hello TypeScript";
let strLength: number = (someValue as string).length;
```

---

## 8. Opérateur de chaînage optionnel

Permet d'accéder à des propriétés qui pourraient être nulles ou undefined :

```ts
const person: Person | null = null;
console.log(person?.name); // undefined, pas d'erreur
```

---

## 9. Conclusion

TypeScript offre une **sécurité de type** et des fonctionnalités avancées pour rendre le code plus fiable et lisible.
En maîtrisant ces bases, vous pouvez commencer à écrire des applications TypeScript robustes et maintenables.
