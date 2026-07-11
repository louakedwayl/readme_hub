# L'opérateur de chaînage optionnel (`?.`)

## Définition

L'opérateur `?.` permet d'accéder à une propriété ou d'appeler une méthode **sans provoquer d'erreur si la valeur est absente** (`null` ou `undefined`).

Il est appelé **optional chaining operator** en anglais.

## Syntaxe

```ts
objet?.propriete
```

ou :

```ts
objet?.methode()
```

## Fonctionnement

Sans `?.`, accéder à une propriété d'une valeur inexistante peut provoquer une erreur :

```ts
user.profile.name
```

Si `profile` n'existe pas, le programme peut échouer.

Avec `?.` :

```ts
user?.profile?.name
```

L'accès s'arrête automatiquement si une valeur est `null` ou `undefined`.

## Exemple

```ts
interface User {
  nom: string;
  email?: string;
}

const user: User = {
  nom: "Alice",
};

console.log(user.email?.length);
```

Ici, si `email` n'existe pas, TypeScript évite une erreur.

## Utilisation

L'opérateur `?.` est utile pour :

- accéder à des données qui peuvent être absentes ;
- travailler avec des objets complexes ;
- éviter des vérifications répétitives.

## À retenir

- `?.` signifie **accès sécurisé à une propriété**.
- Il évite les erreurs liées à `null` et `undefined`.
- Il retourne `undefined` si l'accès n'est pas possible.
- Il ne remplace pas toutes les vérifications de logique.
