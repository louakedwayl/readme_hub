# Les Callbacks et le Callback Hell en JavaScript

## 1. Qu'est-ce qu'un Callback ?

Un **callback** est une fonction passée en argument à une autre
fonction, et qui sera exécutée **plus tard**, généralement après une
opération asynchrone.

### Exemple simple :

``` javascript
function saluer(nom) {
  console.log("Bonjour " + nom);
}

function traiterUtilisateur(callback) {
  const utilisateur = "Alice";
  callback(utilisateur); // Appel du callback
}

traiterUtilisateur(saluer);
```

Ici, `saluer` est une fonction callback. Elle est donnée en paramètre à
`traiterUtilisateur`, qui l'exécute.

------------------------------------------------------------------------

## 2. Callbacks et Asynchronisme

Les callbacks sont souvent utilisés pour gérer des tâches asynchrones,
comme la lecture d'un fichier, une requête HTTP ou un `setTimeout`.

### Exemple avec `setTimeout` :

``` javascript
console.log("Début");

setTimeout(() => {
  console.log("Tâche terminée !");
}, 2000);

console.log("Fin");
```

Résultat :

    Début
    Fin
    Tâche terminée !

------------------------------------------------------------------------

## 3. Le Callback Hell

Le **callback hell** (enfer des callbacks) se produit lorsque les
callbacks sont **imbriqués les uns dans les autres** à un point tel que
le code devient difficile à lire et à maintenir.

### Exemple :

``` javascript
faireEtape1(function(result1) {
  faireEtape2(result1, function(result2) {
    faireEtape3(result2, function(result3) {
      faireEtape4(result3, function(finalResult) {
        console.log("Résultat final :", finalResult);
      });
    });
  });
});
```

Problèmes : - **Lisibilité réduite** (indentation en forme de pyramide
inversée) - **Gestion des erreurs compliquée** - **Maintenance
difficile**

------------------------------------------------------------------------

## 4. Comment éviter le Callback Hell ?

### a) Utiliser les Promises

``` javascript
faireEtape1()
  .then(result1 => faireEtape2(result1))
  .then(result2 => faireEtape3(result2))
  .then(result3 => faireEtape4(result3))
  .catch(error => console.error(error));
```

### b) Utiliser `async/await`

``` javascript
async function process() {
  try {
    const result1 = await faireEtape1();
    const result2 = await faireEtape2(result1);
    const result3 = await faireEtape3(result2);
    const finalResult = await faireEtape4(result3);
    console.log("Résultat final :", finalResult);
  } catch (error) {
    console.error(error);
  }
}

process();
```

------------------------------------------------------------------------

## 5. Conclusion

-   **Callback** : fonction passée en argument à une autre fonction,
    exécutée plus tard.
-   **Callback hell** : trop d'imbriquations de callbacks → code
    illisible.
-   **Solutions** : Promises, `async/await`.
