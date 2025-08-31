# La Console en JavaScript : `console.log` et ses Variantes

## Introduction

En JavaScript, l’objet global **console** est fourni par l’environnement d’exécution (navigateur ou Node.js) pour permettre la sortie d’informations et le débogage.

l'objet **`console`** est utilisé pour afficher des informations, aider au débogage et interagir avec les outils de développement du navigateur ou l'environnement Node.js.

La méthode la plus connue est **`console.log()`**, mais il en existe d'autres très utiles.

---

## 1. `console.log()`
La méthode **`console.log()`** sert à afficher du texte ou des valeurs dans la console.

### Exemple :
```javascript
let name = "Wayl";
console.log("Bonjour " + name); 
```
**Résultat dans la console :**
```
Bonjour Wayl
```

On peut aussi afficher plusieurs valeurs en même temps :
```javascript
console.log("Nom :", name, "| Âge :", 25);
```

---

## 2. `console.error()`
Affiche un message d'erreur en **rouge** (utile pour signaler un problème).
```javascript
console.error("Erreur : Impossible de charger la ressource");
```

---

## 3. `console.warn()`
Affiche un avertissement en **jaune**.
```javascript
console.warn("Attention : Cette fonction est dépréciée");
```

---

## 4. `console.table()`
Affiche des données sous forme de **tableau** (très pratique pour lire des objets et tableaux).
```javascript
let users = [
    { name: "Wayl", age: 25 },
    { name: "Alex", age: 30 }
];
console.table(users);
```

---

## 5. `console.info()`
Affiche un message d’information (semblable à `console.log()` mais intention différente).
```javascript
console.info("Initialisation du programme...");
```

---

## 6. `console.group()` et `console.groupEnd()`
Permet de **regrouper des messages** dans la console.
```javascript
console.group("Infos utilisateur");
console.log("Nom : Wayl");
console.log("Âge : 25");
console.groupEnd();
```

---

## 7. `console.time()` et `console.timeEnd()`
Mesure le temps d'exécution entre deux points du code.
```javascript
console.time("Timer");
// Un code long ici
console.timeEnd("Timer");
```
**Résultat :**
```
Timer: 123.45ms
```

---

## 8. Où voir ces messages ?
- **Navigateur** : Ouvre les outils développeur → Onglet **Console** (raccourci `F12` ou `Ctrl+Shift+I`).  
- **Node.js** : Les messages apparaissent dans le terminal.

---

## Bonnes pratiques
- Utiliser `console.log()` pour le débogage rapide.
- Utiliser `console.error()` et `console.warn()` pour bien distinguer les messages.
- Supprimer les `console.log()` inutiles avant de mettre le code en production.

---

## Conclusion
`console.log()` et ses variantes sont des **outils indispensables** pour comprendre et déboguer un programme JavaScript.  
En apprenant à bien les utiliser, tu gagneras énormément de temps lors du développement.

