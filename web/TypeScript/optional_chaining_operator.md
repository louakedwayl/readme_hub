# L'opérateur de chaînage optionnel (`?.`)

## Définition

L'opérateur `?.` permet d'accéder à une propriété, d'appeler une méthode ou d'accéder à un élément d'un objet **sans provoquer d'erreur si une valeur est absente** (`null` ou `undefined`).

Il est appelé **optional chaining operator** en anglais.

## Syntaxe

Accès à une propriété :

```ts
objet?.propriete
```

Appel d'une méthode :

```ts
objet?.methode()
```

Accès à un élément :

```ts
objet?.[index]
```

## Fonctionnement

Sans l'opérateur `?.`, accéder à une propriété d'une valeur inexistante peut provoquer une erreur :

```ts
user.profile.name
```

Si `profile` vaut `undefined` ou `null`, JavaScript provoque une erreur.

Avec `?.` :

```ts
user?.profile?.name
```

L'accès s'arrête automatiquement dès qu'une valeur rencontrée est `null` ou `undefined`.

## Valeur retournée

Lorsque l'opérateur `?.` arrête l'accès, l'expression retourne `undefined`.

Exemple :

```ts
interface User {
  nom: string;
  email?: string;
}

const user: User = {
  nom: "Alice",
};

const longueur = user.email?.length;

console.log(longueur);
```

Résultat :

```text
undefined
```

Car `email` n'existe pas, donc l'accès à `length` n'est pas effectué.

## Exemple avec un objet imbriqué

```ts
const user = {
  profil: {
    age: 25,
  },
};

console.log(user.profil?.age);
```

Résultat :

```text
25
```

Si `profil` n'existe pas :

```ts
console.log(user.profil?.age);
```

Résultat :

```text
undefined
```

## Utilisation

L'opérateur `?.` est utile pour :

- accéder à des données qui peuvent être absentes ;
- travailler avec des objets complexes ;
- éviter des vérifications répétitives ;
- sécuriser l'accès aux propriétés et méthodes.

## Différence avec un accès classique

Accès classique :

```ts
user.email.length
```

Si `email` vaut `undefined`, une erreur est provoquée.

Avec `?.` :

```ts
user.email?.length
```

Si `email` vaut `undefined`, le résultat est simplement :

```ts
undefined
```

## À retenir

- `?.` est appelé **optional chaining operator**.
- Il permet un accès sécurisé aux propriétés, méthodes ou éléments.
- Il arrête l'évaluation si une valeur est `null` ou `undefined`.
- Il retourne `undefined` lorsque l'accès ne peut pas être effectué.
- Il évite certaines erreurs liées aux valeurs absentes.
