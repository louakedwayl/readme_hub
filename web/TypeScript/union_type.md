# TypeScript : Les types Union

## 1. Introduction

En TypeScript, un **type union** permet à une variable de prendre **plusieurs types différents**. On définit un type union avec le symbole `|` (pipe).

```ts
let value: string | number;
value = "Hello";
value = 42;
// value = true; // Erreur : boolean n'est pas inclus dans le type union
```

Dans cet exemple, `value` peut être soit une chaîne, soit un nombre.

---

## 2. Pourquoi utiliser les types union

Les types union sont utiles pour :

* Autoriser plusieurs types possibles pour une variable ou un paramètre de fonction.
* Renforcer la sécurité du code tout en restant flexible.
* Mieux documenter les intentions de votre code.

```ts
function format(input: string | number) {
  if (typeof input === "number") {
    return input.toFixed(2);
  }
  return input.toUpperCase();
}

console.log(format(10.123)); // "10.12"
console.log(format("hello")); // "HELLO"
```

---

## 3. Vérification du type

Quand une variable est de type union, il faut souvent **vérifier son type** avant de l’utiliser.

```ts
function display(value: string | boolean) {
  if (typeof value === "string") {
    console.log("String: " + value);
  } else {
    console.log("Boolean: " + value);
  }
}

display("Test"); // String: Test
display(true);   // Boolean: true
```

---

## 4. Union avec des types littéraux

On peut créer des unions de **valeurs spécifiques** (types littéraux).

```ts
type Direction = "up" | "down" | "left" | "right";

function move(dir: Direction) {
  console.log("Moving " + dir);
}

move("up");    // OK
// move("forward"); // Erreur : "forward" n'est pas un type valide
```

Cela permet de **restreindre les valeurs possibles** tout en conservant la flexibilité.

---

## 5. Combiner avec d’autres types

Les unions peuvent être combinées avec :

* `null` ou `undefined` pour gérer l’absence de valeur.
* Des objets ou des interfaces différentes.

```ts
interface Cat {
  meow(): void;
}

interface Dog {
  bark(): void;
}

function speak(animal: Cat | Dog) {
  if ("meow" in animal) {
    animal.meow();
  } else {
    animal.bark();
  }
}
```

---

## 6. Bonnes pratiques

* Utiliser les types union **lorsque c’est nécessaire**, pas par habitude.
* Toujours **vérifier le type** avant d’utiliser la variable.
* Préférer les unions de types précis plutôt que `any`.

---

## 7. Résumé

| Point clé        | Description                                                          |       |       |
| ---------------- | -------------------------------------------------------------------- | ----- | ----- |
| Type union       | Permet à une variable d’avoir plusieurs types possibles              |       |       |
| Syntaxe          | \`type1                                                              | type2 | ...\` |
| Avantages        | Flexibilité et sécurité du typage                                    |       |       |
| Vérification     | `typeof` ou `in` pour distinguer les types                           |       |       |
| Bonnes pratiques | Limiter l’usage, vérifier les types, privilégier les unions précises |       |       |

---

**Conclusion** : Les types union sont un outil puissant de TypeScript qui permet de combiner flexibilité et sécurité. Ils sont particulièrement utiles pour les fonctions ou variables pouvant accepter plusieurs formes de données.
