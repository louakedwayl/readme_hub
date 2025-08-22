
# 📘 Cours sur JSDoc en JavaScript

## 🚀 Introduction
**JSDoc** est un outil permettant de **documenter le code JavaScript** directement à l’aide de **commentaires structurés**.  
Cela facilite :
- la compréhension du code par d’autres développeurs,
- l’autocomplétion dans les éditeurs comme VS Code,
- la génération automatique de documentation HTML.

Un commentaire JSDoc commence toujours par `/** ... */`.

---

## ✍️ Syntaxe de base
```js
/**
 * Ceci est un commentaire JSDoc.
 * Il peut décrire une fonction, une classe ou une variable.
 */
```

---

## 📌 Documenter une fonction
On utilise les balises `@param` et `@returns`.

```js
/**
 * Additionne deux nombres.
 * @param {number} a - Le premier nombre.
 * @param {number} b - Le second nombre.
 * @returns {number} La somme de `a` et `b`.
 */
function add(a, b) {
  return a + b;
}
```

➡️ Les éditeurs peuvent ensuite suggérer les types et descriptions lors de l'appel de la fonction.

---

## 📌 Balises les plus utilisées

### 🔹 `@param`
Décrit un **paramètre de fonction**.
```js
@param {string} name - Le nom de l’utilisateur.
```

### 🔹 `@returns` ou `@return`
Décrit la **valeur retournée**.
```js
@returns {boolean} Vrai si l’utilisateur est valide.
```

### 🔹 `@type`
Spécifie le type d’une variable ou constante.
```js
/** @type {number} */
const age = 25;
```

### 🔹 `@typedef`
Crée un **type personnalisé**.
```js
/**
 * @typedef {Object} User
 * @property {string} name - Nom de l’utilisateur.
 * @property {number} age - Âge de l’utilisateur.
 */
```

### 🔹 `@property`
Décrit une propriété d’un objet.
```js
/**
 * @typedef {Object} Book
 * @property {string} title - Titre du livre.
 * @property {string} author - Auteur du livre.
 */
```

### 🔹 `@example`
Donne un **exemple d’utilisation**.
```js
/**
 * Multiplie deux nombres.
 * @param {number} x
 * @param {number} y
 * @returns {number}
 * @example
 * // Retourne 12
 * multiply(3, 4);
 */
function multiply(x, y) {
  return x * y;
}
```

---

## 📌 Documenter une classe
```js
/**
 * Représente un utilisateur.
 */
class User {
  /**
   * Crée un nouvel utilisateur.
   * @param {string} name - Le nom de l’utilisateur.
   * @param {number} age - L’âge de l’utilisateur.
   */
  constructor(name, age) {
    this.name = name;
    this.age = age;
  }

  /**
   * Retourne une présentation de l’utilisateur.
   * @returns {string}
   */
  introduce() {
    return `Bonjour, je m’appelle ${this.name} et j’ai ${this.age} ans.`;
  }
}
```

---

## 📌 Générer de la documentation
Tu peux installer **JSDoc** via npm :
```bash
npm install -g jsdoc
```

Puis générer la doc :
```bash
jsdoc tonfichier.js -d docs
```
➡️ Cela crée un dossier `docs/` contenant une documentation HTML.

---

## ✅ Bonnes pratiques
- Toujours documenter les **fonctions publiques** et les **classes**.
- Utiliser `@example` pour montrer des cas concrets.
- Utiliser `@typedef` pour décrire les objets complexes.
- Garder les descriptions **claires et concises**.

---

## 🎯 Conclusion
JSDoc est un outil puissant qui :
- améliore la **lisibilité** du code,
- facilite la **collaboration** entre développeurs,
- permet de **générer automatiquement** une documentation.
