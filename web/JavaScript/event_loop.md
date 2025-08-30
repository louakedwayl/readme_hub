# Event Loop

## Introduction

L’Event Loop est le mécanisme central qui permet à JavaScript d’être monothread tout en gérant l’asynchrone.
Il coordonne l’exécution du code synchronisé, le traitement des microtasks, la gestion des macro-tasks, et la mise à jour de l’interface (rendering).
En résumé, c’est la boucle infinie qui régule l’ordre d’exécution dans l’environnement JavaScript.

### Donc, quand on parle de :

```shell
Call Stack

Microtask Queue

Macro-task Queue

Phase de rendu
```
tout cela fait partie d’un même cycle orchestré par l’Event Loop.

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

## Les 3 éléments principaux
---

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

La Call Stack est vidée (tout le code synchrone est exécuté).

On exécute toutes les microtasks (jusqu’à ce qu’il n’en reste plus).

Ensuite, l’Event Loop prend une seule macro-task dans la Task Queue.

Donc, s’il reste plusieurs macro-tâches (par exemple plusieurs setTimeout programmés), elles attendent leur tour.
Elles ne seront pas toutes exécutées dans le même cycle, mais une par une à chaque tour suivant, après avoir vérifié à nouveau la pile et les microtasks.

C’est ce mécanisme qui fait que les microtasks (promises) ont toujours une priorité plus élevée que les macrotasks (timers, événements, etc.).

---
## 5. Microtasks en JavaScript

Les **microtasks** sont des tâches asynchrones ayant une **priorité plus élevée** que les macro-tasks. Elles sont toujours exécutées **avant toute macro-task** lorsque la Call Stack est vide.

---

## 1️⃣ Principales sources de microtasks
- **Promesses résolues** (`Promise.then`, `catch`, `finally`)  
- `async/await` (le code après `await` devient une microtask)  
- `queueMicrotask(callback)`  

> Toutes ces tâches sont placées dans la **microtask queue**.

---

## 2️⃣ Règles d’exécution
- Lorsque la **Call Stack** est vide, l’Event Loop vide **toutes les microtasks** présentes dans la queue, **avant** de passer à la macro-task suivante.  
- Les microtasks s’exécutent dans l’ordre dans lequel elles ont été programmées.

---

## 3️⃣ Points importants
- Elles permettent de gérer des opérations asynchrones **rapidement**, sans attendre un timer ou un événement.  
- La microtask queue peut s’accumuler si de nombreuses promesses sont résolues rapidement.  
- Une microtask peut en créer d’autres, qui seront exécutées **dans le même cycle** avant la macro-task.

---

## 6 Macro-tasks en JavaScript

Dans la **macro-task queue** (ou **task queue**), on retrouve les **tâches asynchrones classiques** qui ne sont pas des microtasks. Ces tâches sont planifiées par certaines API ou événements du navigateur ou de Node.js.

---

## 1️⃣ Timers
- `setTimeout(callback, delay)`  
- `setInterval(callback, delay)`  

> Chaque callback de timer planifié finit dans la macro-task queue.

---

## 2️⃣ Événements utilisateur
- Événements DOM tels que :  
  - `click`  
  - `keydown`  
  - `mousemove`  
- Lorsque l’utilisateur interagit avec la page, le callback associé est placé dans la macro-task queue.

---

## 3️⃣ I/O (Node.js)
En environnement Node.js, certaines opérations asynchrones d’entrée/sortie finissent dans la macro-task queue :  
- Lecture/écriture de fichiers (`fs.readFile`)  
- Réponses réseau (`http`, `net`)

---

## 4️⃣ Autres APIs
- `setImmediate()` (Node.js)  
- `requestAnimationFrame()` : bien qu’il ne soit pas exactement une macro-task normale, il est exécuté avant le rendu visuel et peut être considéré comme une “task spéciale” liée au frame.

---

## 🔑 Points importants
- À **chaque cycle de l’Event Loop**, **une seule macro-task** est retirée et exécutée.  
- Après son exécution, toutes les **microtasks** en attente sont traitées avant de passer à la macro-task suivante.  
- Les macro-tasks peuvent s’accumuler dans la file si beaucoup d’événements ou timers sont programmés.

---

## 6. Schéma simplifié de l’Event Loop

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
