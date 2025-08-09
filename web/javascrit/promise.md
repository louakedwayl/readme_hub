# Les Promesses en JavaScript

## 1. Introduction

En JavaScript, une **Promesse** (`Promise`) est un objet qui représente **la valeur d’une opération asynchrone**, qui peut être disponible maintenant, plus tard, ou jamais.

Les promesses sont utilisées pour gérer l’asynchronisme **sans tomber dans le “callback hell”**.

---

## 2. États d’une promesse

Une promesse peut avoir **3 états** :

1. **Pending** (*en attente*)  
   L’opération n’est pas encore terminée.
2. **Fulfilled** (*réussie*)  
   L’opération est terminée avec succès → `resolve(...)` a été appelé.
3. **Rejected** (*échouée*)  
   L’opération a échoué → `reject(...)` a été appelé.

---

## 3. Création d’une promesse

```js
const maPromesse = new Promise((resolve, reject) => {
  // Traitement asynchrone ici
  const succes = true;

  if (succes) {
    resolve("Opération réussie !");
  } else {
    reject("Erreur !");
  }
});
```

---

## 4. Consommer une promesse

Une promesse se consomme avec :

- `.then()` → si la promesse est **réussie**
- `.catch()` → si la promesse est **rejetée**
- `.finally()` → exécuté dans tous les cas

```js
maPromesse
  .then((resultat) => {
    console.log("Succès :", resultat);
  })
  .catch((erreur) => {
    console.error("Échec :", erreur);
  })
  .finally(() => {
    console.log("Terminé");
  });
```

---

## 5. Exemple concret avec `setTimeout`

```js
function wait(duration) {
  return new Promise((resolve) => {
    setTimeout(() => {
      resolve(`Attente de ${duration} ms terminée`);
    }, duration);
  });
}

wait(2000)
  .then((message) => {
    console.log(message);
    return wait(1000);
  })
  .then((message) => {
    console.log(message);
  });
```

---

## 6. Chaînage de promesses

Chaque `.then()` retourne **une nouvelle promesse**, ce qui permet de chaîner les opérations.

```js
wait(1000)
  .then(() => wait(2000))
  .then(() => wait(1500))
  .then(() => {
    console.log("Toutes les attentes sont terminées");
  });
```

---

## 7. Gestion des erreurs

Si une promesse échoue (`reject`), le flux est redirigé vers le premier `.catch()` rencontré.

```js
new Promise((resolve, reject) => {
  reject("Erreur !");
})
  .then(() => {
    console.log("Ne sera pas exécuté");
  })
  .catch((err) => {
    console.error("Erreur attrapée :", err);
  });
```

---

## 8. `async` / `await` : syntaxe moderne

Les mots-clés **`async`** et **`await`** permettent d’écrire du code asynchrone de manière **synchrone visuellement**.

```js
async function demo() {
  await wait(1000);
  console.log("1 seconde passée");

  await wait(2000);
  console.log("Encore 2 secondes passées");
}

demo();
```

**Règles :**
- `await` ne peut être utilisé que dans une fonction marquée `async`.
- `await` attend la résolution de la promesse avant de passer à la suite.

---

## 9. Exécution parallèle avec `Promise.all`

`Promise.all` exécute plusieurs promesses **en parallèle** et attend que toutes soient terminées.

```js
Promise.all([wait(1000), wait(2000), wait(1500)])
  .then(() => {
    console.log("Toutes les attentes terminées");
  });
```

---

## 10. Points clés à retenir

- Une promesse **représente** un résultat futur.
- Trois états : *pending*, *fulfilled*, *rejected*.
- `.then()` pour succès, `.catch()` pour erreurs, `.finally()` pour “cleanup”.
- `async/await` rend le code plus lisible.
- Utiliser `Promise.all` ou `Promise.race` pour coordonner plusieurs promesses.