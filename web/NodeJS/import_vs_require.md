# Node.js : `require` vs `import`

Dans Node.js, il existe deux systèmes pour importer des modules : **CommonJS** (`require`) et **ES Modules** (`import`). Ce cours explique la différence, leur usage et comment les configurer.

---

## 1. `require` (CommonJS)

- Système **classique** de Node.js.
- Fonctionne **immédiatement** sans configuration.
- Modules chargés **synchroniquement**.
- Fichier Node.js typique : `.js`.

### Syntaxe :

```js
const fs = require('fs'); // module système
const myModule = require('./myModule'); // module local
```

## 2 Exporter un module :

```js
// myModule.js
module.exports = function() {
  console.log("Hello from CommonJS!");
}
```

## Avantages :

Compatible avec toutes les versions de Node.js.

Simple à utiliser pour les projets Node classiques.

## 2 import / export (ES Modules)

Système moderne de JavaScript.
Peut être utilisé dans Node.js récent avec configuration :
"type": "module" dans package.json
ou fichier avec extension .mjs

Modules chargés asynchroniquement et supportent le tree-shaking.

## Syntaxe :

import fs from 'fs'; // module système
import { greet } from './myModule.js'; // module local

## Exporter un module :

```js
// myModule.js
export function greet() {
  console.log("Hello from ES Module!");
}
```

## Avantages :

Compatible avec le front-end moderne et les projets Node récents.

Permet d’importer uniquement ce qui est nécessaire (tree-shaking).

## 3. Comparaison

| Critère               | require (CommonJS)           | import (ES Modules)            |
|-----------------------|-----------------------------|--------------------------------|
| Syntaxe               | `const x = require('module')` | `import x from 'module'`      |
| Disponibilité         | Node.js depuis toujours      | Node.js moderne avec config    |
| Chargement            | Synchrone                    | Asynchrone                     |
| Export                | `module.exports = x`         | `export default x` ou `export { x }` |
| Compatibilité projets | Backend Node.js              | Frontend JS et Node.js moderne |

## 4. Exemple concret

CommonJS (require) :
```js
// myModule.js
module.exports = function() { console.log("Hello"); }

// app.js
const greet = require('./myModule');
greet(); // affiche "Hello"
```
ES Module (import) :

// package.json doit contenir : "type": "module"

// myModule.js
export function greet() { console.log("Hello"); }

// app.js
import { greet } from './myModule.js';
greet(); // affiche "Hello"

## 5. Conseils pratiques

Choisis une seule méthode par projet pour éviter les conflits.

Pour les projets Node.js classiques, require est plus simple.

Pour les projets modernes ou front-end, privilégie import / export.

Ne mélange pas les deux dans le même fichier.

## 6. Résumé

require = ancien système Node.js, marche tout de suite.

import = nouveau système JS, nécessite "type": "module" ou .mjs.

Les deux permettent d’importer des modules, mais leur syntaxe et leur configuration diffèrent.  
