# Le Main Thread en JavaScript

## 1️⃣ Qu’est-ce que le main thread ?

- JavaScript est **single-threaded** : il n’y a **qu’un seul fil d’exécution** pour tout le code JS.  
- Ce fil unique est appelé **main thread**.  
- Tout le code JS, les événements, et les mises à jour de l’UI passent par ce thread.  

💡 **Implication** : si le main thread est bloqué, le navigateur devient **non réactif**.

---

## 2️⃣ Que fait le main thread ?

1. **Exécute le code JavaScript**
```js
console.log("Bonjour"); // exécuté sur le main thread
```

2. **Gère les callbacks des opérations asynchrones**
- `setTimeout`, `setInterval`, `fetch()`, Promises, etc.  
- Les opérations async sont traitées en arrière-plan par le navigateur ou Node, **puis leur callback est renvoyé dans la queue de l’event loop**.  
- Quand c’est leur tour, **le main thread exécute ces callbacks**.

3. **Met à jour l’UI** (dans le navigateur)
- Le rendu et l’interaction utilisateur dépendent du main thread.  
- Une boucle infinie ou un code lourd peut bloquer la page.

---

## 3️⃣ Interaction avec l’event loop

- Le main thread exécute **les instructions synchrones**.  
- Les tâches asynchrones terminées sont placées dans la **queue de l’event loop**.  
- L’event loop prend les callbacks et les exécute **toujours sur le main thread**.

### Exemple

```js
console.log("Début");

setTimeout(() => {
  console.log("Timeout terminé");
}, 1000);

console.log("Fin");
```

**Ordre d’exécution :**

1. Début → main thread  
2. Fin → main thread  
3. Timeout terminé → main thread (via event loop après 1s)

---

## 4️⃣ Relation avec `async/await`

- `await` **met en pause la fonction async**, mais **le main thread continue d’exécuter le reste du code**.  
- Quand la Promise se résout, le code après `await` est remis dans la queue de l’event loop, **et exécuté sur le main thread**.

---

## 5️⃣ Points importants à retenir

- **Main thread = unique thread JS**
- Tout le code JS, y compris les callbacks async, est exécuté sur le main thread.
- Les opérations asynchrones n’utilisent pas un autre thread JS, mais **l’arrière-plan du navigateur** ou Node pour la tâche (réseau, timer, I/O).
- Bloquer le main thread → bloque la page (UI + JS).

---

💡 **Résumé fiche ultra courte :**

> **Main thread** = thread unique qui exécute le JS.  
> Toutes les fonctions synchrones, callbacks, et mises à jour de l’UI passent par ce thread.  
> Les async utilisent l’arrière-plan, mais reviennent toujours sur le main thread via l’event loop.
