# Cours TypeScript : tsc (TypeScript Compiler)

## 1. Qu’est-ce que `tsc` ?

`tsc` est le **compilateur TypeScript**.
Il permet de **transformer du code TypeScript (.ts)** en **JavaScript (.js)** afin qu’il puisse s’exécuter dans Node.js ou un navigateur.

---

## 2. Installer TypeScript

### 2.1 Installation locale (recommandée pour les projets)

```bash
npm install typescript --save-dev
```

* Installe TypeScript uniquement pour ce projet.
* Le binaire `tsc` sera dans `node_modules/.bin`.

### 2.2 Installation globale

```bash
npm install -g typescript
```

* Permet d’utiliser `tsc` dans tous les projets sans `npx`.

---

## 3. Compiler un fichier TypeScript

### 3.1 Avec `npx` (si TypeScript est local)

```bash
npx tsc app.ts
```

* Produit `app.js` dans le même dossier.

### 3.2 Directement (si TypeScript est global)

```bash
tsc app.ts
```

---

## 4. Options utiles de `tsc`

* **`--watch`**
  Compile automatiquement dès qu’un fichier `.ts` change.

  ```bash
  npx tsc --watch
  ```

* **`--outDir`**
  Spécifie le dossier de sortie des fichiers `.js`.

  ```bash
  npx tsc app.ts --outDir dist
  ```

* **`--strict`**
  Active toutes les vérifications strictes de TypeScript.

  ```bash
  npx tsc app.ts --strict
  ```

* **`--target`**
  Définit la version de JavaScript générée (ES5, ES6, ESNext…).

  ```bash
  npx tsc app.ts --target ES6
  ```

---

## 5. Configurer un projet TypeScript

1. Initialiser un fichier `tsconfig.json` :

```bash
npx tsc --init
```

2. Le fichier `tsconfig.json` contient toutes les options de compilation.
   Exemple minimal :

```json
{
  "compilerOptions": {
    "target": "ES6",
    "module": "commonjs",
    "outDir": "./dist",
    "strict": true
  },
  "include": ["src/**/*"]
}
```

3. Compiler tout le projet :

```bash
npx tsc
```

* `tsc` lit automatiquement `tsconfig.json` et compile tous les fichiers inclus.

---

## 6. Résumé

* `tsc` transforme TypeScript en JavaScript.
* `npx tsc` → utilise TypeScript local au projet.
* `tsc` → si TypeScript est installé globalement.
* `tsconfig.json` → configure les options pour compiler un projet complet.
