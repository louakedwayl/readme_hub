# Introduction à TypeScript

## Qu'est-ce que TypeScript ?

**TypeScript** est un langage développé par Microsoft qui est un
**superset de JavaScript**.\
Cela signifie que tout code JavaScript valide est aussi du TypeScript,
mais TypeScript ajoute :

-   Un **système de typage statique** (types : `string`, `number`,
    `boolean`, etc.)
-   Des fonctionnalités avancées comme les **interfaces**,
    **génériques** et **modificateurs d'accès**
-   Une meilleure **intégration avec les IDE** (autocomplétion,
    détection d'erreurs, refactorisation)
-   Une **compilation** en JavaScript pour être exécuté dans le
    navigateur ou Node.js

En résumé : TypeScript rend ton code **plus fiable**, **plus lisible**
et **plus maintenable**.

------------------------------------------------------------------------

## Installation

1.  **Installer TypeScript globalement**

    ``` bash
    npm install -g typescript
    ```

2.  **Vérifier l'installation**

    ``` bash
    tsc -v
    ```

3.  **Compiler un fichier TypeScript**

    ``` bash
    tsc fichier.ts
    ```

    Cela génère un fichier `fichier.js`.

------------------------------------------------------------------------

## Types de base

``` ts
let age: number = 20;
let name: string = "Alice";
let isStudent: boolean = true;
let hobbies: string[] = ["coding", "gaming"];
let tuple: [string, number] = ["Bob", 25]; // tuple
```

------------------------------------------------------------------------

## Fonctions typées

``` ts
function add(a: number, b: number): number {
  return a + b;
}

function greet(name: string): void {
  console.log("Hello " + name);
}
```

------------------------------------------------------------------------

## Interfaces et Objets

``` ts
interface Person {
  name: string;
  age: number;
  isStudent?: boolean; // optionnel
}

const user: Person = {
  name: "Alice",
  age: 22,
};
```

------------------------------------------------------------------------

## Classes en TypeScript

``` ts
class Animal {
  constructor(public name: string) {}

  move(distance: number): void {
    console.log(`${this.name} moved ${distance}m.`);
  }
}

const cat = new Animal("Cat");
cat.move(10);
```

------------------------------------------------------------------------

## Génériques

``` ts
function identity<T>(value: T): T {
  return value;
}

let num = identity<number>(5);
let str = identity<string>("Hello");
```

------------------------------------------------------------------------

## Avantages de TypeScript

-   Détection d'erreurs **avant exécution**
-   Code plus **structuré et lisible**
-   Fonctionne avec tous les projets **JavaScript existants**
-   Excellent support avec **VS Code** et autres IDE

------------------------------------------------------------------------

## Conclusion

TypeScript est un outil puissant pour améliorer la qualité de ton code
JavaScript.\
Il ne remplace pas JavaScript, mais le complète en ajoutant une
**sécurité de typage** et des **fonctionnalités avancées**.
