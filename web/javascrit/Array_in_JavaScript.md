
# Les Tableaux en JavaScript : Dynamiques et Flexibles

En JavaScript, les **tableaux** (_arrays_) sont **dynamiques**.  
Ils peuvent **changer de taille automatiquement**, sans qu’il soit nécessaire de définir leur taille au préalable.

---

## 1. Création d'un tableau
```js
let fruits = ["pomme", "banane", "orange"];
```

---

## 2. Ajouter des éléments

Plusieurs méthodes existent :  
- **`push()`** : ajoute à la fin  
- **`unshift()`** : ajoute au début  
- **Affectation directe** à un index

```js
let arr = [1, 2, 3];
arr.push(4);       // [1, 2, 3, 4]
arr.unshift(0);    // [0, 1, 2, 3, 4]
arr[10] = 99;      // [0, 1, 2, 3, 4, <6 vides>, 99]
console.log(arr.length); // 11
```

---

## 3. Supprimer des éléments
- **`pop()`** : retire le dernier élément  
- **`shift()`** : retire le premier élément  
- **`splice()`** : retire des éléments à une position donnée

```js
arr.pop();     // Supprime le dernier élément
arr.shift();   // Supprime le premier élément
```

---

## 4. Caractéristiques principales

- **Pas de taille fixe** : tu peux ajouter ou supprimer des éléments librement.  
- **Indices numériques** : chaque élément est accessible via un index (`arr[0]`).  
- **Peut contenir des types variés** : nombres, chaînes, objets, fonctions, etc.

```js
let mix = [42, "texte", true, {nom: "Alice"}, [1, 2]];
```

---

## 5. Comparaison avec d'autres langages

| Langage        | Tableau classique | Dynamique ? |
|----------------|------------------|-------------|
| **C**          | Oui (taille fixe) | ❌          |
| **Java**       | Oui (taille fixe) | ❌          |
| **JavaScript** | Oui               | ✅          |

> **En résumé :** Les tableaux en JavaScript sont **plus proches des listes dynamiques** dans d’autres langages.  
Ils offrent une grande flexibilité et facilitent la manipulation des données.

---
