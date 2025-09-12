# Le type `unknown` en TypeScript

En TypeScript, `unknown` est un type sûr pour représenter une valeur dont le type n’est pas connu à l’avance. Il est similaire à `any`, mais beaucoup plus sécurisé, car on ne peut pas utiliser directement une valeur `unknown` sans la vérifier.

---

## 1. Déclaration d’une variable `unknown`

```ts
let valeur: unknown;

valeur = 10;        // ✅ correct
valeur = "Hello";   // ✅ correct
valeur = true;      // ✅ correct
```

Contrairement à `any`, TypeScript n’autorise pas certaines opérations directes sur `unknown`.

```ts
let x: unknown = 5;

x + 1;  // ❌ Erreur : Opération sur 'unknown' impossible
```

---

## 2. Différence entre `any` et `unknown`

| Caractéristique             | `any`                              | `unknown`                                 |
| --------------------------- | ---------------------------------- | ----------------------------------------- |
| Assignable à d'autres types | Oui                                | Non, sauf à `any` et `unknown`            |
| Sécurité des types          | Faible, toutes opérations permises | Forte, nécessite vérification avant usage |
| Usage recommandé            | Rare, pour compatibilité legacy    | Pour valeurs dont le type est incertain   |

---

## 3. Vérification du type

Avant d’utiliser une valeur `unknown`, il faut vérifier son type :

```ts
let valeur: unknown = "Bonjour";

if (typeof valeur === "string") {
  console.log(valeur.toUpperCase()); // ✅ OK
}

if (typeof valeur === "number") {
  console.log(valeur + 1); // ✅ OK si c'était un nombre
}
```

---

## 4. Assertion de type

Si vous êtes sûr du type, vous pouvez forcer TypeScript à considérer `unknown` comme un type spécifique avec une assertion de type :

```ts
let valeur: unknown = "Salut";

// On dit à TypeScript que c'est une string
let texte: string = valeur as string;

console.log(texte.toUpperCase());
```

⚠️ À utiliser avec prudence, car cela contourne la sécurité du type.

---

## 5. Exemple pratique

`unknown` est souvent utilisé dans des fonctions qui peuvent recevoir n’importe quelle valeur, comme les entrées utilisateur ou les données provenant d’une API :

```ts
function afficher(valeur: unknown) {
  if (typeof valeur === "string") {
    console.log("Texte :", valeur);
  } else if (typeof valeur === "number") {
    console.log("Nombre :", valeur);
  } else {
    console.log("Autre type :", valeur);
  }
}

afficher("Hello"); // Texte : Hello
afficher(42);      // Nombre : 42
afficher(true);    // Autre type : true
```

---

## 6. Résumé

* `unknown` est un type sûr pour des valeurs dont le type est inconnu.
* On ne peut pas effectuer d’opérations directes sur une valeur `unknown`.
* Il faut soit vérifier le type avec `typeof` ou `instanceof`, soit utiliser une assertion de type.
* C’est plus sécurisé que `any` et recommandé dans les situations où le type réel n’est pas connu.

---
