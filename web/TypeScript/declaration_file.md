# 📘 Cours sur les fichiers de déclaration en TypeScript (`.d.ts`)

## 1. Qu'est-ce qu'un fichier de déclaration ?

Un **fichier de déclaration** en TypeScript est un fichier avec
l'extension **`.d.ts`** qui contient uniquement des **informations de
type** (pas d'implémentation).\
Il sert à **décrire la forme** de modules, bibliothèques ou objets
JavaScript afin que TypeScript puisse : - Vérifier les types lors du
développement, - Fournir de l'autocomplétion dans l'éditeur, - Aider à
la documentation du code.

👉 En clair : ça dit à TypeScript *« voici comment ce code est structuré
»* sans contenir le code lui-même.

------------------------------------------------------------------------

## 2. Quand utilise-t-on un fichier de déclaration ?

-   Quand tu utilises une bibliothèque JavaScript qui n'est pas écrite
    en TypeScript.
-   Quand tu veux exposer une API propre pour ton propre code.
-   Quand tu veux séparer la **définition des types** de leur
    **implémentation**.

Exemples concrets : - Utiliser `express` ou `lodash` en TS → on a besoin
de leurs types via `@types/express` ou `@types/lodash`. - Créer un
module JS custom mais fournir une déclaration `.d.ts` pour l'intégrer
facilement dans un projet TS.

------------------------------------------------------------------------

## 3. Structure de base d'un `.d.ts`

### Exemple simple :

``` ts
// math-lib.d.ts
declare module "math-lib" {
  export function add(a: number, b: number): number;
  export function sub(a: number, b: number): number;
}
```

➡️ Ici, on décrit que le module `"math-lib"` exporte deux fonctions
(`add` et `sub`) avec des types définis.

------------------------------------------------------------------------

### Interfaces et types

``` ts
// shapes.d.ts
interface Point {
  x: number;
  y: number;
}

type Shape = "circle" | "square" | "triangle";
```

------------------------------------------------------------------------

### Déclarations globales

On peut aussi déclarer des types ou variables qui seront accessibles
partout dans le projet.

``` ts
// globals.d.ts
declare const __DEV__: boolean;

declare function log(message: string): void;

declare interface Window {
  appVersion: string;
}
```

------------------------------------------------------------------------

## 4. Mots-clés importants

-   **`declare`** : mot-clé pour indiquer qu'on fournit une déclaration
    (pas d'implémentation).
-   **`module`** : utilisé pour décrire un module externe.
-   **`namespace`** : pour grouper des types/fonctions (ancien style,
    remplacé par modules ES dans la plupart des cas).
-   **`export`** : permet d'exporter des types/fonctions/constantes
    déclarées.

------------------------------------------------------------------------

## 5. Exemples pratiques

### a) Déclarer une librairie JS

Supposons une lib `logger.js` :

``` js
// logger.js
function logInfo(msg) {
  console.log("INFO:", msg);
}
function logError(msg) {
  console.error("ERROR:", msg);
}
module.exports = { logInfo, logError };
```

➡️ Fichier de déclaration :

``` ts
// logger.d.ts
declare module "logger" {
  export function logInfo(msg: string): void;
  export function logError(msg: string): void;
}
```

------------------------------------------------------------------------

### b) Étendre un module existant

``` ts
// express-extensions.d.ts
import "express";

declare module "express" {
  interface Request {
    userId?: string;
  }
}
```

➡️ Ajoute un champ `userId` au type `Request` d'Express.

------------------------------------------------------------------------

## 6. Où mettre les fichiers `.d.ts` ?

-   **Dans `@types`** (si tu crées un package partagé).
-   **Dans un dossier `types/`** à la racine de ton projet.
-   Ou **à côté de ton code** avec le même nom (ex : `math-lib.js` et
    `math-lib.d.ts`).

⚠️ TypeScript les détecte automatiquement si `include`/`typeRoots` dans
`tsconfig.json` est bien configuré.

------------------------------------------------------------------------

## 7. Résumé

-   Les fichiers `.d.ts` servent à **définir des types pour du code
    JS**.
-   Ils n'ont **aucune implémentation**, uniquement des signatures et
    interfaces.
-   Ils permettent : autocomplétion, vérification des types et meilleure
    documentation.
-   Ils sont essentiels pour utiliser des libs JS dans un projet TS.