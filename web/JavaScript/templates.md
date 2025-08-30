# 📝 Les Templates en JavaScript

En JavaScript, un **template** permet de créer des chaînes de caractères dynamiques en insérant des expressions directement dans la chaîne.  

Les templates les plus utilisés sont les **template literals**, introduits avec ES6 (ECMAScript 2015).

---

## 1️⃣ Template Literals

### Définition
- Une template literal est une **chaîne de caractères entourée de backticks** (`` ` ``) au lieu de guillemets (`"` ou `'`).  
- Elle permet d’inclure des **expressions JavaScript** avec la syntaxe `${expression}` c'est ce qu'on appele une interpolation.
- Elle permet également les **chaînes multi-lignes**.

### Syntaxe de base
```js
const name = "Alice";
const age = 25;

const message = `Bonjour, je m'appelle ${name} et j'ai ${age} ans.`;
console.log(message);
```

### Sortie :
```shell
Bonjour, je m'appelle Alice et j'ai 25 ans.
```
## 2️⃣ Chaînes multi-lignes

Avec les backticks, il est possible de faire des chaînes sur plusieurs lignes sans concaténation.
```shell
const poem = `Roses are red,
Violets are blue,
JS templates,
Are great too!`;

console.log(poem);
```

### Sortie :

```shell
Roses are red,
Violets are blue,
JS templates,
Are great too!
```

## 3️⃣ Expressions dans les templates

On peut insérer toute expression JS : variables, calculs, appels de fonctions.

```js
const a = 5;
const b = 10;

console.log(`La somme de ${a} et ${b} est ${a + b}`);
```

### Sortie :
```shell
La somme de 5 et 10 est 15
```
---

```js
function greet(name) {
  return `Bonjour ${name}!`;
}

console.log(`Message: ${greet("Alice")}`);
```
### Sortie :

```shell
Message: Bonjour Alice!
```

---

### Templates imbriqués (Nested Templates)

On peut imbriquer des templates dans d’autres templates.

```js
const user = { name: "Alice", age: 25 };
const greeting = `Salut ${user.name}, ${`tu as ${user.age} ans`}`;
console.log(greeting);
```

### Sortie :
```shell
Salut Alice, tu as 25 ans
```

---

### 5️⃣ Avantages des template literals

Lisibilité : pas besoin de concaténer avec +.

Expressions dynamiques : insertion directe de variables ou calculs.

Multi-lignes : plus pratique que les chaînes classiques.

Flexibilité : imbriquer des templates ou exécuter des fonctions directement.

### 6️⃣ Exemple complet

```js
const product = { name: "Laptop", price: 999, stock: 5 };

const message = `
Produit : ${product.name}
Prix : ${product.price} €
Disponible : ${product.stock > 0 ? "Oui" : "Non"}
`;

console.log(message);
```

### Sortie :

```shell
Produit : Laptop
Prix : 999 €
Disponible : Oui
```

### Conclusion

Les template literals sont une manière moderne et pratique de gérer les chaînes de caractères en JavaScript.
Elles remplacent efficacement la concaténation classique et facilitent l’insertion d’expressions et de variables directement dans les chaînes.
