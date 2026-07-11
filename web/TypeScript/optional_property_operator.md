# L'opérateur de propriété optionnelle (`?`)

## Définition

L'opérateur `?` permet de rendre une propriété **optionnelle**.

Cela signifie que cette propriété **peut être présente ou absente** sans provoquer d'erreur de type.

## Syntaxe

```ts
interface Exemple {
  obligatoire: string;
  optionnelle?: string;
}
```

## Fonctionnement

Une propriété optionnelle :

- peut être définie ;
- peut être omise ;
- reste connue du système de types.

## Exemple

```ts
interface Utilisateur {
  nom: string;
  email?: string;
}

const user1: Utilisateur = {
  nom: "Alice",
};

const user2: Utilisateur = {
  nom: "Bob",
  email: "bob@example.com",
};
```

Les deux objets sont valides.

## Cas d'utilisation

Les propriétés optionnelles sont utiles lorsque certaines informations :

- ne sont pas toujours disponibles ;
- ne sont pas obligatoires ;
- dépendent du contexte.

## À retenir

- `?` rend une propriété optionnelle.
- Une propriété optionnelle peut être présente ou absente.
- Les propriétés obligatoires, elles, doivent toujours être renseignées.
