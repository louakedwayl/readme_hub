# Comprendre les projets TypeScript

## 1. Qu’est-ce qu’un projet TypeScript ?

Un **projet TypeScript (TS)** est un ensemble organisé de fichiers et de configurations permettant de développer, compiler et exécuter du code TypeScript.
Il permet de gérer correctement les dépendances, la configuration du compilateur et l’organisation du code source.

---

## 2. Les composants d’un projet TypeScript

### 2.1. Code source

* Les fichiers `.ts` (ou `.tsx` pour React) contenant la logique de ton application.
* Exemple : `app.ts`, `index.ts`.

### 2.2. Dépendances

* Les bibliothèques dont ton projet a besoin, listées dans `package.json`.
* Installées dans le dossier `node_modules`.
* Exemples : `typescript`, `lodash`, `esbuild`.

### 2.3. Fichiers de configuration

* Configurations qui définissent comment compiler le projet ou configurer des outils.
* Exemples :

  * `tsconfig.json` → options de compilation TypeScript.
  * `package.json` → scripts et dépendances.
  * `.eslintrc.json` → règles de linting.

---

## 3. Compilation TypeScript

* TypeScript doit être **compilé en JavaScript** pour être exécuté par Node.js ou dans un navigateur.
* Outils possibles :

  * **`tsc`** → compilateur officiel TypeScript.
  * **`esbuild`**, **`swc`** → compilateurs rapides alternatifs.
* La compilation suit les instructions définies dans le `tsconfig.json`.

---

## 4. Structure typique d’un projet TS

```
my-project/
├─ node_modules/         # dépendances du projet
├─ src/
│  ├─ app.ts             # code source principal
│  └─ utils.ts           # code source secondaire
├─ package.json           # dépendances et scripts
├─ package-lock.json      # verrouillage des versions
├─ tsconfig.json          # configuration TypeScript
└─ README.md              # documentation
```

---

## 5. Bonnes pratiques

1. **Ne pas modifier directement `node_modules`**
   Les paquets sont gérés par npm et seront écrasés lors d’une réinstallation.

2. **Ajouter `node_modules` dans `.gitignore`**

   ```gitignore
   node_modules/
   ```

3. **Utiliser `package.json` et `package-lock.json` pour partager le projet**

   ```bash
   npm install
   ```

4. **Organiser le code dans un dossier `src/`**

   * Facilite la compilation et la maintenance du projet.

---

## 6. Commandes utiles

* Installer toutes les dépendances :

```bash
npm install
```

* Compiler le projet TypeScript :

```bash
npx tsc
```

* Exécuter un fichier TypeScript directement (sans compilation) :

```bash
npx ts-node src/app.ts
```

* Supprimer un paquet :

```bash
npm uninstall esbuild
```

---

## 7. Résumé

Un **projet TypeScript** est composé de :

1. **Code source** (`.ts`)
2. **Dépendances** (`node_modules`)
3. **Fichiers de configuration** (`tsconfig.json`, `package.json`, etc.)

Il permet de **développer, compiler et exécuter du code TypeScript** de manière structurée et isolée, tout en gérant correctement les dépendances et la configuration.

