# Le fichier tsconfig.json en TypeScript

Le fichier **`tsconfig.json`** est le fichier de configuration principal de TypeScript. Il permet de **définir les options de compilation**, les fichiers inclus/exclus et le comportement général du compilateur `tsc`.

---

## 1. Pourquoi utiliser un tsconfig.json ?

* Pour **centraliser les options de compilation**.
* Pour indiquer au compilateur **quels fichiers compiler**.
* Pour simplifier l’exécution de `tsc` : avec un `tsconfig.json`, il suffit de taper `tsc` sans arguments.

---

## 2. Structure de base

Un fichier `tsconfig.json` ressemble à ceci :

```json
{
  "compilerOptions": {
    "target": "es6",
    "module": "commonjs",
    "strict": true,
    "outDir": "./dist",
    "rootDir": "./src"
  },
  "include": ["src/**/*"],
  "exclude": ["node_modules", "**/*.spec.ts"]
}
```

### Explication :

* **compilerOptions** : options de compilation.
* **include** : fichiers ou dossiers à inclure.
* **exclude** : fichiers ou dossiers à exclure (par défaut, `node_modules` est exclu).

---

## 3. Options principales de compilerOptions

| Option              | Description                                                         |
| ------------------- | ------------------------------------------------------------------- |
| `target`            | Version JavaScript générée (`es5`, `es6`, `es2017`, `esnext`, etc.) |
| `module`            | Système de modules utilisé (`commonjs`, `es6`, `amd`, `umd`, etc.)  |
| `strict`            | Active toutes les vérifications strictes (type safety)              |
| `outDir`            | Dossier de sortie pour les fichiers compilés                        |
| `rootDir`           | Dossier racine du code source                                       |
| `sourceMap`         | Génère des fichiers `.map` pour le debug                            |
| `esModuleInterop`   | Permet l’import des modules CommonJS de manière compatible ES6      |
| `resolveJsonModule` | Permet d’importer des fichiers JSON                                 |
| `noImplicitAny`     | Génère une erreur si une variable est de type `any` implicite       |
| `strictNullChecks`  | Vérifie que `null` et `undefined` sont gérés correctement           |

---

## 4. Exemple minimal

```json
{
  "compilerOptions": {
    "target": "es6",
    "module": "commonjs",
    "outDir": "dist",
    "rootDir": "src",
    "strict": true
  },
  "include": ["src/**/*"]
}
```

* Compile tous les fichiers `.ts` dans `src/`.
* Place les fichiers compilés dans `dist/`.
* Active le mode strict.

---

## 5. Quelques conseils

* Toujours **mettre `rootDir` et `outDir`** pour séparer code source et code compilé.
* Utiliser `strict` pour profiter au maximum de la sécurité des types.
* Ajouter `exclude` pour éviter de compiler `node_modules` ou les fichiers de test si nécessaire.

---

## 6. Commande TypeScript

Avec un `tsconfig.json` :

```bash
tsc
```

TypeScript lira automatiquement le fichier `tsconfig.json` et compilera tous les fichiers spécifiés.

---

**Conclusion :**
Le fichier `tsconfig.json` est **essentiel pour tout projet TypeScript sérieux**. Il permet de configurer finement le compilateur, de gérer les fichiers source et de garantir une compilation cohérente et sécurisée.
