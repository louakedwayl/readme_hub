# Comprendre les alias de type en TypeScript

## 1. Qu’est-ce qu’un alias de type ?

Un **alias de type** en TypeScript est un **nom que tu donnes à un type** pour le réutiliser plus facilement dans ton code.
Il permet de simplifier les types complexes ou de donner un nom significatif à un type existant.

---

## 2. Syntaxe de base

```ts
type NomAlias = typeOriginal;
```

### Exemple simple :

```ts
type ID = string | number;

function printId(id: ID) {
    console.log(`L'identifiant est : ${id}`);
}
```

* Ici, `ID` est un alias pour `string | number`.
* Tu peux maintenant utiliser `ID` partout où ce type est nécessaire.

---

## 3. Alias pour des objets

Tu peux créer des alias pour des **objets complexes** :

```ts
type User = {
    id: number;
    name: string;
    email?: string; // optionnel
};

const user1: User = {
    id: 1,
    name: 'Alice'
};
```

* Cela rend ton code **plus lisible et maintenable**.

---

## 4. Alias pour des fonctions

Tu peux aussi définir un type pour une fonction :

```ts
type GreetFunction = (name: string) => string;

const greet: GreetFunction = (name) => `Hello, ${name}`;
```

---

## 5. Alias et types génériques

Les alias peuvent aussi être **génériques** :

```ts
type ApiResponse<T> = {
    data: T;
    error?: string;
};

const response: ApiResponse<User> = {
    data: user1
};
```

* Ici, `ApiResponse<T>` est un type réutilisable pour n’importe quel type de donnée.

---

## 6. Différence entre alias de type et interface

| Aspect               | Type Alias                                             | Interface       |
| -------------------- | ------------------------------------------------------ | --------------- |
| Extension            | Non directement (mais peut utiliser intersections `&`) | Oui (`extends`) |
| Objets               | Oui                                                    | Oui             |
| Primitives           | Oui                                                    | Non             |
| Fonctions/génériques | Oui                                                    | Oui             |

💡 En général, les alias sont plus flexibles, mais les interfaces sont préférées pour les objets extensibles et l’implémentation de classes.

---

## 7. Résumé

* **Alias de type** = donner un nom à un type pour le réutiliser.
* **Syntaxe** : `type NomAlias = type;`
* Utiles pour :

  * Types primitifs combinés (`string | number`)
  * Objets complexes
  * Fonctions
  * Types génériques
* Plus flexibles que les interfaces, mais moins adaptés à l’extension ou aux classes.

---

## 8. Exemple complet

```ts
type ID = string | number;
type User = {
    id: ID;
    name: string;
    email?: string;
};
type ApiResponse<T> = {
    data: T;
    error?: string;
};

function fetchUser(): ApiResponse<User> {
    return {
        data: { id: 1, name: 'Alice' }
    };
}
```
