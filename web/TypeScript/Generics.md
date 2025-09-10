# Comprendre les génériques en TypeScript

## 1. Qu’est-ce qu’un générique ?

Un **générique** en TypeScript permet de créer des **composants, fonctions ou types réutilisables** qui peuvent fonctionner avec **différents types** sans perdre la sécurité des types.

* Cela évite de réécrire le même code pour différents types.
* Les génériques sont définis avec `<T>` (ou un autre nom de type) qui représente un type **paramétrable**.

---

## 2. Génériques avec les fonctions

### Exemple simple :

```ts
function identity<T>(value: T): T {
    return value;
}

const num = identity<number>(42);   // T est number
const str = identity<string>('hello'); // T est string
```

* `T` est un type générique que l’on précise lors de l’appel de la fonction.
* TypeScript peut aussi **déduire automatiquement le type** :

```ts
const num2 = identity(100);   // TypeScript déduit T = number
const str2 = identity('world'); // T = string
```

---

## 3. Génériques avec les tableaux

```ts
function firstElement<T>(arr: T[]): T | undefined {
    return arr[0];
}

const firstNum = firstElement([1, 2, 3]);       // number
const firstStr = firstElement(['a', 'b', 'c']); // string
```

* Ici, `T` s’adapte au type du tableau passé en paramètre.

---

## 4. Génériques avec les objets et types

```ts
type ApiResponse<T> = {
    data: T;
    error?: string;
};

const userResponse: ApiResponse<{ id: number; name: string }> = {
    data: { id: 1, name: 'Alice' }
};
```

* `T` permet de réutiliser le type `ApiResponse` pour n’importe quel type de donnée.

---

## 5. Génériques avec les classes

```ts
class Box<T> {
    private content: T;

    constructor(value: T) {
        this.content = value;
    }

    getContent(): T {
        return this.content;
    }
}

const numberBox = new Box<number>(123);
const stringBox = new Box<string>('hello');
```

* Les classes génériques permettent de créer des **conteneurs ou structures de données réutilisables**.

---

## 6. Contraintes sur les génériques

On peut **limiter les types** qu’un générique peut accepter avec `extends` :

```ts
function logLength<T extends { length: number }>(value: T): void {
    console.log(value.length);
}

logLength('hello');       // OK
logLength([1, 2, 3]);     // OK
logLength(42);             // ❌ Erreur, number n’a pas de length
```

* Ici, `T` doit avoir une propriété `length`.

---

## 7. Résumé

* **Génériques** = types paramétrables pour rendre le code réutilisable et sûr.
* S’utilisent avec : fonctions, objets, types, classes.
* Syntaxe de base : `<T>`
* Possibilité de **contraindre le type** avec `extends`.

---

## 8. Exemple complet

```ts
// Type générique pour une réponse API

type ApiResponse<T> = {
    data: T;
    error?: string;
};

function fetchData<T>(data: T): ApiResponse<T> {
    return { data };
}

const response = fetchData({ id: 1, name: 'Alice' });
console.log(response.data.name); // Alice
```

