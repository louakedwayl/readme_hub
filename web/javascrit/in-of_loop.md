
# Les boucles `for...in` et `for...of` en JavaScript

En JavaScript, il existe plusieurs façons de parcourir des collections (objets, tableaux, chaînes…).  
Deux boucles très pratiques sont `for...in` et `for...of`.  

Elles ont des comportements différents et doivent être utilisées selon le type de données.

---

## 1. La boucle `for...in`

### Définition
La boucle `for...in` permet d’**itérer sur les clés (propriétés)** d’un objet **ou les indices d’un tableau**.

### Syntaxe
```js
for (let clé in objet) {
    // Code à exécuter
}
```

- `clé` : représente le **nom de la propriété** (ou l’indice si c’est un tableau).
- `objet` : l’objet ou le tableau à parcourir.

### Exemple avec un objet
```js
const utilisateur = { nom: "Alice", age: 25, ville: "Paris" };

for (let clé in utilisateur) {
    console.log(clé + " : " + utilisateur[clé]);
}
// Résultat :
// nom : Alice
// age : 25
// ville : Paris
```

### Exemple avec un tableau
```js
const fruits = ["pomme", "banane", "orange"];

for (let index in fruits) {
    console.log(index + " -> " + fruits[index]);
}
// Résultat :
// 0 -> pomme
// 1 -> banane
// 2 -> orange
```

> **Attention** : `for...in` donne les **indices** du tableau, pas les valeurs directement.

---

## 2. La boucle `for...of`

### Définition
La boucle `for...of` permet d’**itérer directement sur les valeurs** d’un tableau, d’une chaîne ou d’un objet itérable (comme `Map` ou `Set`).

### Syntaxe
```js
for (let valeur of iterable) {
    // Code à exécuter
}
```

- `valeur` : représente directement **l’élément** de la collection.
- `iterable` : un tableau, une chaîne, un `Map`, un `Set`…

### Exemple avec un tableau
```js
const fruits = ["pomme", "banane", "orange"];

for (let fruit of fruits) {
    console.log(fruit);
}
// Résultat :
// pomme
// banane
// orange
```

### Exemple avec une chaîne
```js
const mot = "JS";

for (let lettre of mot) {
    console.log(lettre);
}
// Résultat :
// J
// S
```

---

## 3. Différence entre `for...in` et `for...of`

| Boucle      | Parcourt…           | Utilisation typique       |
|-------------|---------------------|---------------------------|
| `for...in`  | **Les clés** (indices ou noms des propriétés) | Objets et tableaux quand on veut les **clés** |
| `for...of`  | **Les valeurs**     | Tableaux, chaînes, `Map`, `Set`… |

---

## 4. Quand utiliser quoi ?

- **Utiliser `for...in`** : pour parcourir **les propriétés d’un objet** ou récupérer les **indices d’un tableau**.  
- **Utiliser `for...of`** : pour parcourir **directement les valeurs** d’un tableau, d’une chaîne ou d’un itérable.

---

## 5. Exemple combiné

```js
const utilisateur = { nom: "Alice", age: 25, ville: "Paris" };
const fruits = ["pomme", "banane", "orange"];

// Parcours des propriétés d'un objet
for (let clé in utilisateur) {
    console.log(`${clé} : ${utilisateur[clé]}`);
}

// Parcours direct des valeurs d'un tableau
for (let fruit of fruits) {
    console.log(fruit);
}
```

---

## En résumé
- **`for...in`** : on parcourt les **clés** (indices ou noms des propriétés).  
- **`for...of`** : on parcourt directement les **valeurs**.  
- **Bonne pratique** : `for...in` plutôt pour les objets, `for...of` pour les tableaux et autres itérables.
