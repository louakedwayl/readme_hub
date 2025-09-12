# 📘 Le mot-clé `declare` en TypeScript

Le mot-clé **`declare`** est utilisé en TypeScript pour informer le compilateur qu’une variable, fonction, classe ou module **existe déjà ailleurs** (dans du JavaScript, une bibliothèque externe, ou injecté au runtime).  

👉 Il permet donc de **taper des éléments non définis dans ton code TS**, sans générer de code JavaScript supplémentaire.

---

## 1️⃣ Déclaration de variables globales

```ts
declare const VERSION: string;

console.log(VERSION);
```

Ici, TypeScript accepte l’utilisation de `VERSION`, même si elle n’est pas définie dans ton code.  
Elle doit exister **au runtime** (par exemple définie dans un `<script>` ou par une librairie).

---

## 2️⃣ Déclaration de fonctions existantes

```ts
declare function alert(message: string): void;

alert("Hello TypeScript!");
```

Même si `alert` n’est pas défini dans ton fichier TS, TypeScript sait qu’il existe.

---

## 3️⃣ Déclaration de classes

```ts
declare class Person {
  name: string;
  constructor(name: string);
  greet(): void;
}

const john = new Person("John");
```

TypeScript sait utiliser `Person`, mais n’émet aucun code JS pour l’implémentation.

---

## 4️⃣ Déclaration de modules

```ts
declare module "mylib" {
  export function greet(name: string): void;
}
```

Ensuite, tu peux importer le module :

```ts
import { greet } from "mylib";
greet("Wayl");
```

---

## 5️⃣ Où utilise-t-on `declare` ?

- Dans les fichiers **`.d.ts`** (fichiers de définition de types).  
- Dans ton code TS, pour **annoncer des éléments globaux** qui seront présents au runtime.  

---

## ⚠️ Attention

- `declare` **ne génère aucun code JavaScript** → c’est uniquement pour aider le compilateur TS.  
- Si tu déclares quelque chose qui n’existe pas au runtime → tu auras une erreur à l’exécution.  

---

## ✅ Résumé

- `declare` = *« ça existe, fais-moi confiance »*.  
- Sert à taper du code JS existant ou des bibliothèques externes.  
- Principalement utilisé dans les `.d.ts`.  
