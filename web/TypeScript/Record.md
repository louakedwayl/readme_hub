# Record en TypeScript

## Définition

`Record` est un **type générique** fourni par TypeScript qui permet de décrire un objet avec :

- un type pour ses clés
- un type pour ses valeurs

Syntaxe :

```ts
Record<TypeDesClés, TypeDesValeurs>
```

Exemple simple :

```ts
const ages: Record<string, number> = {
  Alice: 25,
  Bob: 30,
};
```

Ici :

- les clés (`Alice`, `Bob`) sont des `string`
- les valeurs (`25`, `30`) sont des `number`

## Record vs Array

Un tableau contient une liste de valeurs :

```ts
const nombres: number[] = [10, 20, 30];
```

Les éléments sont accessibles avec des indices :

```ts
nombres[0]; // 10
```

Un `Record` représente un objet avec des clés nommées :

```ts
const scores: Record<string, number> = {
  Alice: 100,
  Bob: 80,
};
```

Les valeurs sont accessibles avec les clés :

```ts
scores["Alice"]; // 100
```

## Pourquoi utiliser Record ?

`Record` permet de dire clairement à TypeScript :

> "Cet objet aura des clés d'un certain type et des valeurs d'un certain type."

Exemple :

```ts
const utilisateurs: Record<string, boolean> = {
  Alice: true,
  Bob: false,
};
```

TypeScript va empêcher :

```ts
utilisateurs.Alice = "oui"; // Erreur
```

car les valeurs doivent être des `boolean`.

## Record avec une fonction

Une fonction peut retourner un `Record` :

```ts
function compter(): Record<string, number> {
  return {
    pommes: 5,
    bananes: 3,
  };
}
```

Cela signifie que la fonction retourne un objet :

- avec des clés en `string`
- avec des valeurs en `number`

## À retenir

- `Record` décrit un objet, pas un tableau.
- La syntaxe est :

```ts
Record<clé, valeur>
```

- Le premier type représente les clés.
- Le deuxième type représente les valeurs.

Exemple :

```ts
Record<string, number>
```

signifie : un objet avec des clés texte et des valeurs numériques.
