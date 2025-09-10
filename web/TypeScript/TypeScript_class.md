# Les Classes en TypeScript

En TypeScript, les classes sont similaires à celles de JavaScript ES6, mais TypeScript apporte **le typage statique**, les **modificateurs d’accès** et d’autres fonctionnalités utiles pour structurer et sécuriser le code.

---

## 1️⃣ Définition d’une classe

Une classe est un **modèle** pour créer des objets avec des propriétés et des méthodes communes.

```ts
class Person {
  name: string;
  age: number;

  constructor(name: string, age: number) {
    this.name = name;
    this.age = age;
  }

  greet() {
    console.log(`Hello, my name is ${this.name}`);
  }
}

const john = new Person("John", 30);
john.greet(); // Hello, my name is John
```

* `constructor` : méthode spéciale appelée lors de la création de l’objet.
* Les propriétés `name` et `age` sont typées grâce à TypeScript.

---

## 2️⃣ Modificateurs d’accès

TypeScript permet de définir **la visibilité** des propriétés et méthodes :

| Modificateur | Description                                               |
| ------------ | --------------------------------------------------------- |
| `public`     | Accessible partout (par défaut).                          |
| `private`    | Accessible uniquement dans la classe.                     |
| `protected`  | Accessible dans la classe et les classes héritées.        |
| `readonly`   | La propriété ne peut être modifiée qu’à l’initialisation. |

Exemple :

```ts
class Car {
  private brand: string;
  readonly year: number;

  constructor(brand: string, year: number) {
    this.brand = brand;
    this.year = year;
  }

  getBrand() {
    return this.brand;
  }
}

const car = new Car("Toyota", 2020);
console.log(car.getBrand()); // Toyota
// car.brand // ❌ Erreur : private
// car.year = 2021 // ❌ Erreur : readonly
```

---

## 3️⃣ Propriétés et méthodes statiques

* `static` permet de définir des propriétés ou méthodes accessibles **sans créer une instance**.

```ts
class MathUtils {
  static PI = 3.14;

  static square(x: number) {
    return x * x;
  }
}

console.log(MathUtils.PI);      // 3.14
console.log(MathUtils.square(4)); // 16
```

---

## 4️⃣ Héritage

Les classes peuvent **hériter d’une autre classe** avec `extends`.

```ts
class Animal {
  name: string;

  constructor(name: string) {
    this.name = name;
  }

  move() {
    console.log(`${this.name} moves`);
  }
}

class Dog extends Animal {
  bark() {
    console.log("Woof!");
  }
}

const dog = new Dog("Rex");
dog.move(); // Rex moves
dog.bark(); // Woof!
```

* TypeScript permet aussi d’utiliser `protected` pour que les propriétés soient accessibles par les classes enfants.

---

## 5️⃣ Différences principales avec JavaScript

| Aspect                | JavaScript                                                   | TypeScript                                |
| --------------------- | ------------------------------------------------------------ | ----------------------------------------- |
| Typage                | Dynamique                                                    | Statique (`string`, `number`, `boolean`…) |
| Modificateurs d’accès | Pas de `private` ou `protected` réels (juste convention `_`) | `private`, \`protected                    |

