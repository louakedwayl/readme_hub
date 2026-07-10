# Promise.all() en JavaScript

`Promise.all()` sert à lancer plusieurs promesses en même temps et à attendre qu’elles soient toutes terminées.

## Exemple simple

```js
const resultat = await Promise.all([
  getTrajet(id),
  getPassagers(id),
]);
```

Ici :

* `getTrajet(id)` démarre ;
* `getPassagers(id)` démarre aussi ;
* `await` attend que les deux soient terminés.

Le résultat est un tableau :

```js
console.log(resultat[0]); // le trajet
console.log(resultat[1]); // les passagers
```

## Avec la déstructuration

On peut récupérer directement les deux résultats :

```js
const [trajet, listePassagers] = await Promise.all([
  getTrajet(id),
  getPassagers(id),
]);
```

L’ordre des résultats correspond à l’ordre des promesses :

```js
[
  getTrajet(id),     // va dans trajet
  getPassagers(id),  // va dans listePassagers
]
```

## À retenir

```js
await Promise.all([
  promesse1,
  promesse2,
]);
```

Cela signifie :

> Lance les deux opérations en même temps et attends qu’elles soient toutes les deux terminées.

`Promise.all()` est utile lorsque les deux opérations ne dépendent pas l’une de l’autre.
