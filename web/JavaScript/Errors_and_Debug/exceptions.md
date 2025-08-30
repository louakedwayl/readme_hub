# Les Exceptions en JavaScript

En JavaScript, une **exception** est un événement qui se produit lors de l’exécution d’un programme et qui interrompt le flux normal du code. Les exceptions permettent de gérer les erreurs de manière organisée et d’éviter que l’application ne plante brutalement.

---

## 1. Concepts de base

- **Erreur** : un problème qui survient lors de l'exécution, par exemple division par zéro, accès à une variable non définie, etc.
- **Exception** : un signal qu’une erreur s’est produite et qui peut être capturé pour traitement.
- **Try/Catch** : mécanisme permettant d’attraper et de gérer les exceptions.

---

## 2. La syntaxe `try...catch`

```javascript
try {
    // Code susceptible de provoquer une erreur
    let result = riskyFunction();
    console.log(result);
} catch (error) {
    // Code exécuté si une erreur survient dans le bloc try
    console.error("Une erreur est survenue :", error.message);
}
```

- **`try`** : contient le code à surveiller.
- **`catch`** : contient le code exécuté si une exception est levée.
- **`error`** : objet représentant l’exception. Il contient des propriétés comme :
  - `name` : type de l'erreur (`ReferenceError`, `TypeError`, etc.)
  - `message` : message descriptif de l'erreur
  - `stack` : trace de l’erreur (facultatif)

---

## 3. Utiliser `finally`

Le bloc `finally` est optionnel et s’exécute **toujours**, que l’erreur se produise ou non.

```javascript
try {
    console.log("Avant l'erreur");
    throw new Error("Erreur personnalisée !");
} catch (err) {
    console.log("Catch :", err.message);
} finally {
    console.log("Bloc finally exécuté à chaque fois");
}
```

---

## 4. Lever une exception avec `throw`

On peut créer et lancer ses propres exceptions avec `throw` :

```javascript
function diviser(a, b) {
    if (b === 0) {
        throw new Error("Division par zéro interdite !");
    }
    return a / b;
}

try {
    console.log(diviser(10, 0));
} catch (err) {
    console.error(err.message);
}
```

- `throw` peut lancer n’importe quel type d’objet ou valeur, mais il est recommandé d’utiliser des objets `Error`.

---

## 5. Types d’erreurs intégrées

JavaScript fournit plusieurs types d’erreurs prédéfinies :

- **`Error`** : erreur générale
- **`TypeError`** : type de variable incorrect
- **`ReferenceError`** : variable non définie
- **`SyntaxError`** : erreur de syntaxe
- **`RangeError`** : valeur hors plage
- **`EvalError`** : erreur avec `eval()`
- **`URIError`** : erreur avec encode/decodeURI

Exemple :

```javascript
try {
    null.f(); // TypeError
} catch (err) {
    console.log(err.name); // TypeError
    console.log(err.message);
}
```

---

## 6. Bonnes pratiques

1. Ne pas utiliser les exceptions pour le flux normal du programme.
2. Toujours fournir des messages clairs dans les erreurs personnalisées.
3. Préférer attraper uniquement les erreurs prévues.
4. Utiliser `finally` pour libérer des ressources (fichiers, connexions, timers…).
