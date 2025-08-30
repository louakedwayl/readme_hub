# La Pile d’Exécution et l’Asynchrone en JavaScript

## 1. La pile d’exécution (Call Stack)

La **pile d’exécution** (ou **call stack**) est une structure interne de JavaScript qui garde la trace des fonctions en cours d’exécution.

### Fonctionnement :

- JavaScript suit un **ordre d’exécution séquentiel** : de haut en bas, ligne par ligne.
- Les fonctions sont **empilées** (push) lorsqu’elles sont appelées.
- Lorsqu’une fonction se termine, elle est **retirée** (pop) de la pile.
- Le moteur exécute toujours la fonction **au sommet de la pile**.

### Exemple :

```js
function a() { b(); console.log("Fin A"); }
function b() { c(); console.log("Fin B"); }
function c() { console.log("Dans C"); }

a();
```

**Pile étape par étape :**

| Étape | Pile (du bas vers le haut) |
|-------|---------------------------|
| Avant `a()` | (vide) |
| Appel `a()` | a |
| Appel `b()` | a → b |
| Appel `c()` | a → b → c |
| Fin `c()` | a → b |
| Fin `b()` | a |
| Fin `a()` | (vide) |

---

## 2. Call Stack dans la console

Lorsque **une erreur survient**, la console affiche la **pile au moment de l’erreur** :

```js
function a() { b(); }
function b() { c(); }
function c() { throw new Error("Oups"); }

a();
```

Console :
```
Error: Oups
    at c (script.js:3)
    at b (script.js:2)
    at a (script.js:1)
```

💡 Chaque ligne correspond à une fonction dans la pile.

---

## 3. L’Event Loop : le chef d’orchestre

JavaScript est **monothread** : il ne peut exécuter qu’une seule chose à la fois sur la **call stack**.  
Pour gérer l’asynchrone, il utilise le mécanisme de l’**Event Loop**.

### Les 3 éléments principaux

1. **Call Stack**  
   La pile où s’exécute le code.

2. **Task Queue (macro-tâches)**  
   - Contient les callbacks de `setTimeout`, `setInterval`, `setImmediate`, les événements DOM, etc.
   - Ce sont les "grosses tâches".

3. **Microtask Queue**  
   - Contient les callbacks de `Promise.then`, `async/await`, `queueMicrotask`.
   - Prioritaire par rapport à la task queue.

---

### Cycle de l’Event Loop

L’event loop fonctionne en boucle infinie et suit ce processus :

1. **Exécuter tout le code synchronisé** dans la call stack.  
2. Quand la pile est vide :  
   - Traiter **toutes les microtasks** de la microtask queue.  
   - Puis prendre **une seule macro-tâche** de la task queue.  
3. **Mettre à jour le rendu (rendering)** s’il y a des changements visuels.  
4. Retour à l’étape 1.

---

### Exemple 1 : setTimeout vs Promises

```js
console.log("Début");

setTimeout(() => console.log("Timer terminé"), 0);

Promise.resolve().then(() => console.log("Promise"));

console.log("Fin");
```

Résultat :
```
Début
Fin
Promise
Timer terminé
```

Explication :  
- `Promise.then` (microtask) est exécuté **avant** `setTimeout` (macro-task).  
- L’event loop donne toujours la priorité aux **microtasks**.

---

### Exemple 2 : Plusieurs microtasks

```js
console.log("Start");

Promise.resolve().then(() => console.log("Microtask 1"));
Promise.resolve().then(() => console.log("Microtask 2"));

console.log("End");
```

Résultat :
```
Start
End
Microtask 1
Microtask 2
```

Toutes les microtasks sont vidées **avant de passer à la moindre macro-task**.

---

## 4. Résumé

- La **call stack** gère l’exécution synchrone.  
- L’**Event Loop** orchestre l’asynchrone :  
  - **Microtasks** (Promesses) → priorité maximale.  
  - **Macro-tasks** (Timers, events) → traitées ensuite.  
- Le navigateur/Node.js ajoute aussi une étape de **rendering** après chaque cycle.

---

## 5. Schéma simplifié de l’Event Loop

```
        ┌─────────────┐
        │  Call Stack │
        └──────┬──────┘
               │
               ▼
        ┌─────────────┐
        │ Microtasks  │  (Promesses, async/await)
        └──────┬──────┘
               │
               ▼
        ┌─────────────┐
        │ Task Queue  │  (setTimeout, events)
        └──────┬──────┘
               │
               ▼
        ┌─────────────┐
        │ Rendering   │ (rafraîchissement visuel)
        └─────────────┘
```
