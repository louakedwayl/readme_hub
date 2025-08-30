
# Les Types en JavaScript

JavaScript est un langage **dynamiquement typé** : cela signifie qu’on n’a pas besoin de déclarer le type d’une variable, le moteur JavaScript le déduit automatiquement.

Il existe deux grandes catégories de types :  
- **Les types primitifs**  
- **Les objets** (incluant les **objets littéraux**)

---

## 1. Les Types Primitifs

Un type **primitif** représente une valeur simple et **immutable** (elle ne peut pas être modifiée directement).  
Il existe **7 types primitifs** en JavaScript :

1. **String** : Chaîne de caractères  
   ```js
   let nom = "Alice";
   ```

2. **Number** : Nombre (entier ou flottant)  
   ```js
   let age = 25;
   let pi = 3.14;
   ```

3. **BigInt** : Entier très grand (introduit en ES2020)  
   ```js
   let grandNombre = 123456789012345678901234567890n;
   ```

4. **Boolean** : Valeur vraie ou fausse  
   ```js
   let estActif = true;
   ```

5. **Undefined** : Valeur d’une variable déclarée mais non initialisée  
   ```js
   let x;
   console.log(x); // undefined
   ```

6. **Null** : Valeur intentionnellement vide  
   ```js
   let data = null;
   ```

7. **Symbol** : Valeur unique, souvent utilisée pour créer des clés d’objets uniques  
   ```js
   let id = Symbol("identifiant");
   ```

### Caractéristiques des primitifs
- **Immutables** : Une fois créés, ils ne peuvent pas être modifiés.  
- **Passés par valeur** : Lorsqu’on les copie, on crée une nouvelle valeur indépendante.

---

## 2. Les Objets

Un **objet** est une collection de **paires clé/valeur**.  
Contrairement aux primitifs, les objets sont **mutables** et **passés par référence**.

### Exemple d’objet classique :
```js
let personne = {
    nom: "Alice",
    age: 25
};
```

### Les types d’objets incluent :
- **Objets standards** : `{}`, `new Object()`  
- **Tableaux** : `[]`  
- **Fonctions** : `function() {}`  
- **Dates**, **Regex**, **Map**, **Set**, etc.

### Caractéristiques des objets :
- **Mutables** : On peut modifier leurs propriétés après création.  
- **Passés par référence** : Si on les assigne à une autre variable, elles pointent vers le même objet.

---

## 3. Les Objets Littéraux

Un **objet littéral** est une façon simple et rapide de créer un objet.  
On l’écrit **directement avec des accolades `{}`**.

### Exemple :
```js
let voiture = {
    marque: "Toyota",
    modele: "Corolla",
    demarrer: function() {
        console.log("La voiture démarre");
    }
};

voiture.demarrer(); // La voiture démarre
```

#### Différences avec `new Object()`
- **Plus concis** : Pas besoin d’appeler un constructeur.  
- **Plus lisible** : Directement écrit dans le code.  

---

## 4. Vérifier le Type d’une Valeur

### Avec `typeof` :
```js
typeof 42; // "number"
typeof "Hello"; // "string"
typeof null; // "object" (cas particulier en JS)
typeof {}; // "object"
```

### Avec `instanceof` (pour les objets) :
```js
let d = new Date();
console.log(d instanceof Date); // true
```

---

## 5. Résumé

- **Primitifs** : Simples, immuables, passés par valeur.  
- **Objets** : Complexes, mutables, passés par référence.  
- **Objet littéral** : Manière rapide de créer un objet en JS.  

---

### Bonnes pratiques :
- Utiliser des **objets littéraux** quand on veut créer des objets simples.  
- Se rappeler que **null** est un type spécial (même si `typeof null` retourne "object").  
- Éviter de confondre **undefined** (jamais défini) et **null** (vide intentionnellement).

