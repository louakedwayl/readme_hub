# Cours sur l'opérateur `in` en TypeScript

## Qu'est-ce que l'opérateur `in` ?

En TypeScript (et JavaScript), l'opérateur **`in`** permet de **vérifier si une propriété existe dans un objet**.

### Syntaxe

```ts
propertyName in object
```

- `propertyName` : le nom de la propriété (string ou symbole)
- `object` : l'objet à tester

Le résultat est toujours un **booléen** (`true` ou `false`).

---

## Exemple simple

```ts
const person = {
  name: "Alice",
  age: 25
};

console.log("name" in person); // true
console.log("gender" in person); // false
```

---

## Utilisation avec des types TypeScript

L'opérateur `in` est très utile pour le **narrowing** (réduction du type) lorsqu'on travaille avec des **types union**.

### Exemple avec un type union

```ts
type Bird = { fly: () => void };
type Fish = { swim: () => void };

function move(animal: Bird | Fish) {
  if ("fly" in animal) {
    animal.fly(); // TypeScript sait que c'est un Bird
  } else {
    animal.swim(); // TypeScript sait que c'est un Fish
  }
}
```

> Ici, `in` sert à **déterminer le type exact** dans un union type.

---

## Autres points importants

1. **Narrowing avec `in`** : TypeScript peut automatiquement réduire le type d'une variable si une propriété spécifique existe.
2. **Sécurité** : vérifie toujours que l'objet n'est pas `null` ou `undefined` avant d'utiliser `in` pour éviter les erreurs.
3. **Différence avec `hasOwnProperty`** :
   - `obj.hasOwnProperty(prop)` vérifie uniquement les propriétés directes de l’objet.
   - `prop in obj` vérifie aussi les propriétés héritées via le prototype.

---

## Exemple avancé

```ts
interface Car {
  wheels: number;
  drive: () => void;
}

interface Boat {
  sails: number;
  sail: () => void;
}

function operate(vehicle: Car | Boat) {
  if ("drive" in vehicle) {
    vehicle.drive(); // TypeScript sait que c'est une Car
  } else {
    vehicle.sail(); // TypeScript sait que c'est un Boat
  }
}
```

---

## Conclusion

L'opérateur **`in`** est très pratique en TypeScript pour :

- Vérifier l'existence d'une propriété dans un objet.
- Réduire un type union à un type précis (*type narrowing*).
- Travailler de manière sûre avec des objets dynamiques.

> ⚡ Astuce : combine `in` avec des types union pour rendre ton code plus sûr et éviter les erreurs de type.

