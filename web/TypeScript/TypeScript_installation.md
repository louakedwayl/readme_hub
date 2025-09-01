# Installation de TypeScript

## 1. Pré-requis

Avant d'installer TypeScript, il faut avoir installé **Node.js** et
**npm** (Node Package Manager).

### Vérifier si Node.js est installé

``` bash
node -v
```

Exemple de résultat :

    v20.10.0

### Vérifier si npm est installé

``` bash
npm -v
```

Exemple de résultat :

    10.2.3

Si tu n'as pas Node.js, télécharge-le depuis
[nodejs.org](https://nodejs.org).

------------------------------------------------------------------------

## 2. Installer TypeScript globalement

Pour utiliser TypeScript partout sur ta machine :

``` bash
npm install -g typescript
```

### Vérifier l'installation

``` bash
tsc -v
```

Exemple de résultat :

    Version 5.4.2

------------------------------------------------------------------------

## 3. Utiliser TypeScript dans un projet

### a) Initialiser un projet Node.js

``` bash
npm init -y
```

Cela crée un fichier `package.json`.

### b) Installer TypeScript localement

``` bash
npm install --save-dev typescript
```

> 💡 Bonne pratique : installer TypeScript **en local** pour chaque
> projet.

------------------------------------------------------------------------

## 4. Configuration de TypeScript

Génère un fichier de configuration `tsconfig.json` :

``` bash
npx tsc --init
```

Exemple de `tsconfig.json` minimal :

``` json
{
  "compilerOptions": {
    "target": "es6",
    "module": "commonjs",
    "strict": true,
    "outDir": "dist"
  },
  "include": ["src"]
}
```

------------------------------------------------------------------------

## 5. Compiler un fichier TypeScript

### Créer un fichier `src/index.ts`

``` ts
let message: string = "Hello TypeScript!";
console.log(message);
```

### Compiler le fichier

``` bash
npx tsc
```

Un dossier `dist` est créé avec le fichier compilé `index.js` :

``` js
let message = "Hello TypeScript!";
console.log(message);
```

------------------------------------------------------------------------

## 6. Exécuter le code

Avec Node.js :

``` bash
node dist/index.js
```

Résultat attendu :

    Hello TypeScript!

------------------------------------------------------------------------

## 7. Bonus : Exécuter TypeScript sans compilation

Avec **ts-node** (pratique pour le développement rapide) :

``` bash
npm install --save-dev ts-node
```

Exécuter directement :

``` bash
npx ts-node src/index.ts
```

------------------------------------------------------------------------

## Conclusion

-   **`npm install -g typescript`** → installation globale\
-   **`npx tsc --init`** → configuration du projet\
-   **`npx tsc`** → compilation `.ts` → `.js`\
-   **`node dist/index.js`** → exécution
