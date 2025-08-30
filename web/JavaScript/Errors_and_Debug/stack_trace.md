# La Stack Trace en JavaScript

Une **stack trace** (ou **trace de pile**) est un outil essentiel pour le débogage en programmation. Elle montre **la chaîne d'appels de fonctions** qui a conduit à une erreur, permettant de comprendre d'où vient le problème.

---

## 1️⃣ Qu'est-ce qu'une stack trace ?

* Lorsqu'une erreur survient en JavaScript, l'objet `Error` contient :

  * **Le message d'erreur** (`error.message`)
  * **La stack trace** (`error.stack`)
* La stack trace liste **toutes les fonctions appelées** jusqu'au point où l'erreur a été lancée.
* Elle indique **le nom de la fonction**, **le fichier** et **la ligne** de l'appel.

---

## 2️⃣ Exemple simple

```js
function a() { b(); }
function b() { c(); }
function c() { throw new Error("Oups !"); }

try {
    a();
} catch (error) {
    console.error(error);
}
```

Console :

```
Error: Oups !
    at c (<anonymous>:3:11)
    at b (<anonymous>:2:5)
    at a (<anonymous>:1:5)
    at <anonymous>:5:1
```

* `c` lance l'erreur.
* `b` a appelé `c`.
* `a` a appelé `b`.
* Le code principal a appelé `a`.

Chaque ligne correspond à un **appel de fonction** et montre où exactement il s'est produit.

---

## 3️⃣ Utilité de la stack trace

* Identifier **l'origine exacte d'une erreur**.
* Comprendre **le chemin d'exécution du code**.
* Aider à **corriger les bugs rapidement**.
* Inspecter **la pile d'appels pour des erreurs complexes** dans les projets avec beaucoup de fonctions imbriquées.

---

## 4️⃣ Stack trace vs Valgrind / gdb (C/C++)

La stack trace en JS est similaire à la pile d'appels affichée par **Valgrind ou gdb** :

| JavaScript                            | C / Valgrind                          |
| ------------------------------------- | ------------------------------------- |
| Error: message                        | Segmentation fault / message d'erreur |
| at fonction (fichier\:ligne\:colonne) | #0 fonction() at fichier\:ligne       |
| Liste des appels imbriqués            | Liste des appels imbriqués            |

Elle permet de retracer **la séquence des appels** menant à l'erreur.

---

## 5️⃣ Récupérer la stack trace

Avec un objet `Error`, tu peux accéder à sa stack trace :

```js
try {
    throw new Error("Problème détecté !");
} catch (err) {
    console.log("Message :", err.message);
    console.log("Stack trace :", err.stack);
}
```

* `err.message` → le message d'erreur.
* `err.stack` → la trace complète de la pile.

---

## 6️⃣ Bonnes pratiques

* Toujours **loguer la stack trace** lors du débogage.
* Ne pas concaténer l'erreur avec une chaîne (`+`), pour **garder l'objet intact** :

```js
console.error("Erreur :", err); // ✅ affiche l'objet Error complet
console.error("Erreur: " + err); // ❌ perd la stack trace
```

* Utiliser la stack trace pour **identifier rapidement la fonction et la ligne à corriger**.

---

La stack trace est donc un outil indispensable pour **comprendre et corriger les erreurs** dans vos programmes JavaScript.

