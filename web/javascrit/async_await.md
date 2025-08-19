# Cours : Async / Await en JavaScript

## 1. Introduction

En JavaScript, certaines opérations sont **asynchrones**, comme les appels réseau, les lectures de fichiers ou les timers.  

Pour gérer l'asynchronicité, on utilise plusieurs approches : **callbacks**, **promises**, et plus récemment **async/await**.

`async/await` est une syntaxe introduite avec ES2017 qui permet d’écrire du code asynchrone **comme du code synchrone**, plus lisible et plus facile à comprendre.

---

## 2. `async` : définir une fonction asynchrone

- Une fonction déclarée avec le mot-clé `async` **retourne toujours une Promise**.
- Si la fonction retourne une valeur, JavaScript la transforme automatiquement en Promise résolue.
- Si la fonction lance une erreur, elle devient une Promise rejetée.

### Exemple :

```javascript
async function maFonction() {
    return 42;
}

maFonction().then(result => console.log(result)); // Affiche 42
```

Ici, même si maFonction retourne juste un nombre, il est encapsulé dans une Promise.

## 3. await : attendre la résolution d’une Promise

Le mot-clé await peut seulement être utilisé dans une fonction async.

Il permet d'attendre la résolution d'une Promise sans utiliser .then().

Le code semble synchrone, mais reste non bloquant pour le reste du programme.

### Exemple :

```javascript
function attendre(ms) 
{
    return new Promise(resolve => setTimeout(resolve, ms));
}

async function demo()
{
    console.log("Avant l'attente");
    await attendre(2000); // attend 2 secondes
    console.log("Après 2 secondes");
}

demo();
```

## 4. Gestion des erreurs avec try/catch

Avec async/await, on peut utiliser try/catch pour gérer les erreurs d'une Promise.

```javascript
async function fetchData() {
    try {
        let response = await fetch("https://api.exemple.com/data");
        if (!response.ok) throw new Error("Erreur réseau");
        let data = await response.json();
        console.log(data);
    } catch (err) {
        console.error("Erreur détectée :", err);
    }
}

fetchData();
```

## 5. Exécution parallèle avec Promise.all

Si tu veux lancer plusieurs Promises en parallèle et attendre leur résolution, tu peux utiliser Promise.all :

```javascript
async function demoParallel() {
    const p1 = fetch("https://api1.exemple.com");
    const p2 = fetch("https://api2.exemple.com");

    const [res1, res2] = await Promise.all([p1, p2]);
    console.log("Résultats reçus :", res1, res2);
}
```

await sur Promise.all attend que toutes les Promises soient résolues.

Si une seule échoue, Promise.all rejette immédiatement.

## 6. Bonnes pratiques

Ne pas utiliser await dans une boucle si les appels sont indépendants :

Utiliser Promise.all pour exécuter en parallèle.

Toujours gérer les erreurs avec try/catch.

Limiter l’usage de await pour éviter de bloquer inutilement l’exécution.

## 7. Résumé

## Mot-clés principaux

| Mot-clé      | Description                                                                 |
|--------------|-----------------------------------------------------------------------------|
| `async`      | Transforme une fonction pour qu’elle retourne une **Promise**               |
| `await`      | Attend la résolution d’une **Promise**, à utiliser uniquement dans une fonction `async` |
| `try/catch`  | Permet de gérer les erreurs d’une **Promise** avec un style synchrone       |
| `Promise.all`| Exécute plusieurs **Promises** en parallèle et attend qu’elles soient toutes résolues |

**Note :**  
`async/await` rend le code asynchrone plus lisible, maintenable et proche du style synchrone, tout en conservant les avantages de l’asynchronicité.
