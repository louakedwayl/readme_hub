# Cours sur `npx`

## Qu'est-ce que `npx` ?

`npx` est un outil fourni avec **npm** (depuis la version 5.2) qui permet de **lancer des packages Node.js directement**, sans les installer globalement sur ton ordinateur.

- Il est inclus automatiquement avec Node.js moderne.
- Permet d’exécuter un package **local** ou **temporaire**.

---

## Pourquoi utiliser `npx` ?

1. **Pas besoin d’installer globalement un package**
   ```bash
   npx create-react-app my-app
   ```
   Cela télécharge temporairement `create-react-app` et le lance, sans l’installer définitivement.

2. **Utiliser la version locale d’un package**
   ```bash
   npx tsc
   ```
   Si TypeScript est installé dans ton projet (`node_modules`), `npx` utilisera cette version locale.

3. **Tester rapidement des outils**
   ```bash
   npx cowsay "Hello world!"
   ```
   Pas besoin d’installer `cowsay`, tu peux juste le lancer.

---

## Exemple pratique avec `esbuild`

Supposons que tu as un projet TypeScript et que tu veux compiler un fichier `index.ts` :

```bash
npx esbuild src/index.ts --outfile=dist/index.js --bundle
```

- `src/index.ts` → fichier source TypeScript  
- `--outfile=dist/index.js` → fichier final généré  
- `--bundle` → regroupe toutes les dépendances dans un seul fichier  

> Ici, `npx` permet d’utiliser `esbuild` sans l’installer globalement.

---

## Différence avec `npm install`

- `npm install` → installe un package localement ou globalement.  
- `npx` → lance un package **directement**, parfois sans l’installer définitivement.

---

## Avantages

- Pas besoin de polluer le système avec des installations globales.  
- Toujours utiliser la version exacte d’un package local.  
- Pratique pour tester ou exécuter des outils ponctuellement.

---

## Commandes utiles

- Lancer TypeScript :
  ```bash
  npx tsc
  ```

- Lancer un bundler comme esbuild :
  ```bash
  npx esbuild src/index.ts --outfile=dist/index.js --bundle
  ```

- Créer une application React sans installation globale :
  ```bash
  npx create-react-app my-app
  ```

---

## Conclusion

`npx` est un **lanceur pratique pour Node.js**, qui permet de gagner du temps et de garder ton système propre.  
Il est particulièrement utile pour des **outils CLI** ou des **compilateurs** comme TypeScript et esbuild.

