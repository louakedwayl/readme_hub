
# Le Point-Virgule en JavaScript (`;`)

En JavaScript, le **point-virgule** est utilisé pour **terminer une instruction**.  
Mais contrairement à d'autres langages (C, Java, etc.), **il est optionnel dans beaucoup de cas** grâce à l'**ASI** (*Automatic Semicolon Insertion*).

---

## 1. L'ASI : Automatic Semicolon Insertion
Le moteur JavaScript **ajoute automatiquement des `;`** là où il estime qu'une instruction est terminée.

Exemple :
```js
console.log("Hello")
console.log("World")
```
→ Interprété comme :
```js
console.log("Hello");
console.log("World");
```

---

## 2. Quand ça pose problème ?

**L'ASI n'est pas parfaite.**  
Voici des cas où **l'absence de `;` peut casser le code** :

### 2.1 Avec `return`
```js
function test() {
  return
  42
}
console.log(test()); // Renvoie `undefined` (et pas 42)
```
Pourquoi ? → JS insère un `;` après `return`.

---

### 2.2 Avec des tableaux ou objets sur une nouvelle ligne
```js
let x = 5
let y = 10
[x, y] = [y, x] // ❌ Erreur si pas de ;
```
JS pense que `let y = 10 [x, y]` est une seule instruction.

---

### 2.3 Avec les IIFE (fonctions auto-invoquées)
```js
let x = 1
(function(){ console.log("Hello") })()
```
Sans `;`, erreur car JS pense que `(function...)` est rattaché à `x = 1`.

---

## 3. Bonne pratique

**Toujours mettre un `;`.**  
Pourquoi ?  
- Évite les **ambiguïtés**.  
- Rend le code plus **prévisible** et **lisible**.  
- La plupart des projets professionnels imposent cette convention.

---

## 4. En résumé
- **Optionnel** dans les cas simples (l’ASI fait le travail).  
- **Indispensable** dans les cas complexes (`return`, tableaux, IIFE, etc.).  
- **Bonne pratique : toujours le mettre.**

---
