# Le mot-clé `readonly` en TypeScript

En TypeScript, `readonly` est un modificateur qui permet de créer des propriétés ou des variables **immuables**, c’est-à-dire qui ne peuvent pas être réassignées après leur initialisation. Cela permet de garantir que certaines valeurs restent constantes à travers le code.

## 1. Utilisation avec les propriétés d’objets

Lorsque vous déclarez une propriété d’objet comme `readonly`, elle ne peut être assignée qu’une seule fois, soit à l’initialisation de l’objet, soit dans le constructeur (pour les classes).

```ts
interface Person {
  readonly name: string;
  age: number;
}

const john: Person = { name: "John", age: 30 };
john.age = 31;       // ✅ OK
john.name = "Mike";  // ❌ Erreur : la propriété 'name' est en lecture seule
```

Pour les classes :

```ts
class Car {
  readonly brand: string;

  constructor(brand: string) {
    this.brand = brand; // ✅ Initialisation autorisée dans le constructeur
  }

  changeBrand(newBrand: string) {
    // this.brand = newBrand; // ❌ Erreur : 'brand' est en lecture seule
  }
}

const car = new Car("Toyota");
console.log(car.brand); // Toyota
```

---

## 2. Utilisation avec les tableaux

En TypeScript, `readonly` peut aussi s’appliquer aux tableaux pour empêcher toute modification de leur contenu.

```ts
const numbers: readonly number[] = [1, 2, 3];
numbers.push(4); // ❌ Erreur
numbers[0] = 10; // ❌ Erreur

// Lecture seule possible
console.log(numbers[1]); // 2
```

TypeScript propose également le type générique `ReadonlyArray<T>` :

```ts
const fruits: ReadonlyArray<string> = ["apple", "banana"];
fruits.pop(); // ❌ Erreur
```

---

## 3. Différence entre `const` et `readonly`

* `const` : La variable ne peut pas être réassignée.
* `readonly` : La propriété ou le tableau ne peut pas être modifié, mais la variable peut être réassignée si elle n’est pas `const`.

```ts
const arr = [1, 2, 3];
arr.push(4); // ✅ OK
arr = [5, 6]; // ❌ Erreur

const arr2: readonly number[] = [1, 2, 3];
arr2.push(4); // ❌ Erreur
```

---

## 4. `readonly` avec les tuples

On peut aussi rendre un tuple immuable avec `readonly` :

```ts
const point: readonly [number, number] = [10, 20];
point[0] = 15; // ❌ Erreur
```

---

## 5. Bonnes pratiques

* Utiliser `readonly` pour **les valeurs qui ne doivent pas changer** après initialisation.
* Combinez `readonly` avec `const` pour un maximum de sécurité et de clarté.
* Idéal pour les interfaces et les types représentant des **données immuables** (par ex. les objets provenant d’une API).

