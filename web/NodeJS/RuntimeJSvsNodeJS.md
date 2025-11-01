# Comprendre le Runtime JavaScript et NodeJS

## 🧠 Qu'est-ce qu'un Runtime ?

Un **runtime** (ou *environnement d’exécution*) est le **contexte dans lequel un code est exécuté**.  
C’est l’ensemble des composants qui permettent à un programme d’un certain langage de fonctionner.

👉 En clair :  
Le **runtime JavaScript** est ce qui permet **d’exécuter du code JavaScript** en dehors du simple texte du fichier.

---

## ⚙️ Les composants d’un runtime

Un runtime contient plusieurs éléments :

| Composant | Rôle |
|------------|------|
| **Moteur JavaScript (V8)** | Transforme le code JS en instructions machine exécutables |
| **Heap (tas mémoire)** | Zone où sont stockés les objets et variables dynamiques |
| **Call Stack (pile d’appels)** | Suit les fonctions en cours d’exécution |
| **API natives** | Fonctions fournies par le runtime (ex : `fs`, `setTimeout`) |
| **Event Loop** | Gère les opérations asynchrones |
| **Callback Queue / Task Queue** | File d’attente des fonctions prêtes à être exécutées |

---

## 🧩 Exemple : le Runtime d’un navigateur

Dans un **navigateur**, le runtime JavaScript inclut :

- Le moteur **V8** (Chrome) ou **SpiderMonkey** (Firefox)
- Le **DOM** (Document Object Model)
- Les **Web APIs** (ex : `fetch`, `setTimeout`, `localStorage`)
- L’**Event Loop**

Exemple :
```js
console.log('Début');
setTimeout(() => console.log('Async'), 0);
console.log('Fin');
```

Résultat :
```
Début
Fin
Async
```

Explication :
1. `console.log('Début')` → exécuté immédiatement.  
2. `setTimeout()` → envoyé à la file d’attente.  
3. `console.log('Fin')` → exécuté ensuite.  
4. Quand la pile est vide, l’**event loop** exécute la fonction du `setTimeout`.

---

## 🚀 Le Runtime NodeJS

**NodeJS** a aussi un runtime, mais **différent de celui du navigateur** :

| Élément | Description |
|----------|-------------|
| **V8** | Même moteur JavaScript que Chrome |
| **libuv** | Bibliothèque C++ qui gère l’Event Loop, les threads et les I/O |
| **Modules internes** | (`fs`, `http`, `os`, etc.) fournis par NodeJS |
| **npm** | Gestionnaire de paquets (non inclus dans le moteur lui-même) |

Exemple :
```js
const fs = require('fs');

console.log('Lecture du fichier...');
fs.readFile('texte.txt', 'utf8', (err, data) => {
  if (err) throw err;
  console.log('Contenu du fichier :', data);
});
console.log('Fin du programme');
```

Résultat :
```
Lecture du fichier...
Fin du programme
Contenu du fichier : ...
```

> NodeJS délègue la lecture du fichier à **libuv** → la tâche est effectuée en arrière-plan sans bloquer le code principal.

---

## 🔄 L’Event Loop

L’**Event Loop** (boucle d’événements) est au cœur du runtime JavaScript.  
Elle **surveille la pile d’exécution** et **traite les callbacks** lorsque la pile est vide.

### Schéma simplifié

```
          ┌──────────────────────┐
          │  Pile d’exécution    │
          └─────────┬────────────┘
                    │
                    ▼
          ┌──────────────────────┐
          │  Event Loop          │
          └─────────┬────────────┘
                    │
                    ▼
          ┌──────────────────────┐
          │  File de callbacks   │
          └──────────────────────┘
```

---

## 💬 En résumé

| Concept | Description |
|----------|-------------|
| **Runtime** | Environnement d’exécution du JavaScript |
| **Moteur V8** | Convertit le code JS en code machine |
| **Event Loop** | Gère l’asynchronicité |
| **libuv (NodeJS)** | Gère les I/O et les threads |
| **Différence navigateur / NodeJS** | Le navigateur fournit le DOM et les Web APIs ; NodeJS fournit `fs`, `http`, etc. |

---

## 🧠 À retenir

- Le runtime est **ce qui donne vie à ton code JavaScript**.  
- Le **même langage** (JS) fonctionne dans **plusieurs runtimes** :  
  - le navigateur,  
  - NodeJS,  
  - Deno, Bun, etc.  
- Chaque runtime fournit ses propres **API natives** et **mécanismes internes**.

---

> 💡 **Astuce :**  
> Quand tu écris du code NodeJS, rappelle-toi que tu travailles **dans le runtime NodeJS**, pas celui du navigateur.  
> Donc pas de `document`, `window`, ou `fetch` natif — sauf s’ils ont été ajoutés par NodeJS ou un module externe.
