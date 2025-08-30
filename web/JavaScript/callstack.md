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

# 🔄 Cycle de l’Event Loop en JavaScript

L’**Event Loop** est le mécanisme qui coordonne l’exécution du code, la gestion des opérations asynchrones et la mise à jour de l’interface utilisateur.  
Il fonctionne comme une boucle infinie qui suit un cycle précis :  

---

## 1. Exécution du code synchrone dans la Call Stack
- Tout le code **synchronisé** (les instructions et fonctions immédiates) est placé dans la **pile d’exécution** (*Call Stack*).  
- Le moteur JavaScript exécute ces instructions de manière **séquentielle**, sans interruption.  
- Tant que la pile n’est pas vide, aucune autre tâche ne peut être exécutée.

---

## 2. Traitement des files d’attente lorsque la Call Stack est vide
Une fois la pile vidée, l’Event Loop consulte les files d’attente :  

### a) Microtask Queue
- Contient principalement les **Promesses résolues** (`Promise.then`, `catch`, `finally`, `async/await`) et `queueMicrotask`.  
- Toutes les microtâches présentes sont **exécutées en entier** avant de passer à une autre étape.  
- Elles ont une **priorité plus élevée** que les macro-tâches.  

### b) Task Queue (Macro-task Queue)
- Contient les tâches planifiées par des API comme `setTimeout`, `setInterval`, ou par des événements utilisateurs (clics, entrées clavier).  
- À chaque cycle, **une seule macro-tâche est extraite et exécutée**.  
- Après son exécution, le moteur retourne immédiatement vérifier la **microtask queue** avant d’enchaîner avec une nouvelle macro-tâche.  

---

## 3. Phase de rendu (Rendering)
- Une fois les tâches exécutées, le navigateur peut mettre à jour l’affichage.  
- Cela inclut le recalcul des styles, la mise en page (layout) et le rendu visuel (paint).  
- Cette phase n’est pas garantie à chaque cycle, mais elle se produit régulièrement (en général toutes les ~16 ms pour viser 60 FPS).  

---

## 4. Boucle infinie
- Après la phase de rendu, le cycle recommence à l’étape 1.  
- Ce processus se répète indéfiniment tant que l’application est en cours d’exécution.  

---

## 📝 Schéma simplifié du cycle

```shell
      ┌───────────────────────────────┐
      │        Call Stack              │
      │  (code synchrone exécuté)      │
      └───────────────┬───────────────┘
                      │ pile vide ?
                      ▼
          ┌───────────────────────────┐
          │     Microtask Queue       │
          │ (Promises, microtasks...) │
          └───────────────┬──────────┘
                          │ terminée ?
                          ▼
          ┌───────────────────────────┐
          │      Task Queue           │
          │ (Timers, events, I/O...)  │
          └───────────────┬──────────┘
                          │ 1 seule tâche
                          ▼
          ┌───────────────────────────┐
          │   Phase de rendu (UI)     │
          │ (recalcul styles, paint)  │
          └───────────────┬──────────┘
                          │
                          ▼
                     Recommence
```

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
