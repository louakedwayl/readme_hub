# `localeCompare()` en JavaScript

## À quoi sert `localeCompare()` ?

La méthode `localeCompare()` permet de comparer deux chaînes de caractères.

Elle est particulièrement utile pour trier des mots par ordre alphabétique.

```js
const resultat = "Alice".localeCompare("Bob");

console.log(resultat);
```

## Valeur retournée

`localeCompare()` retourne un nombre :

* un nombre négatif si la première chaîne doit être placée avant la deuxième ;
* `0` si les deux chaînes sont équivalentes ;
* un nombre positif si la première chaîne doit être placée après la deuxième.

```js
console.log("Alice".localeCompare("Bob")); // nombre négatif
console.log("Alice".localeCompare("Alice")); // 0
console.log("Bob".localeCompare("Alice")); // nombre positif
```

Il ne faut pas vérifier si le résultat vaut exactement `-1` ou `1`.

On vérifie seulement s'il est négatif, égal à `0` ou positif.

## Trier un tableau de mots

`localeCompare()` est souvent utilisée avec la méthode `sort()`.

```js
const villes = ["Lyon", "Paris", "Bordeaux"];

villes.sort((a, b) => a.localeCompare(b));

console.log(villes);
```

Résultat :

```js
["Bordeaux", "Lyon", "Paris"]
```

## Trier dans l'ordre inverse

Pour trier de Z à A, il suffit d'inverser les deux valeurs :

```js
const villes = ["Lyon", "Paris", "Bordeaux"];

villes.sort((a, b) => b.localeCompare(a));

console.log(villes);
```

Résultat :

```js
["Paris", "Lyon", "Bordeaux"]
```

## Trier des objets

On peut également trier un tableau d'objets selon une propriété contenant du texte.

```js
const utilisateurs = [
  { nom: "Zoe" },
  { nom: "Alice" },
  { nom: "Mohamed" }
];

utilisateurs.sort((a, b) => {
  return a.nom.localeCompare(b.nom);
});

console.log(utilisateurs);
```

## Prendre en compte les accents

On peut préciser la langue utilisée pour la comparaison.

```js
const mots = ["été", "école", "avion"];

mots.sort((a, b) => a.localeCompare(b, "fr"));

console.log(mots);
```

`"fr"` indique que la comparaison doit respecter les règles de la langue française.

## Résumé

Pour trier des chaînes de caractères de A à Z :

```js
tableau.sort((a, b) => a.localeCompare(b));
```

Pour trier de Z à A :

```js
tableau.sort((a, b) => b.localeCompare(a));
```

Pour trier des objets selon une propriété :

```js
tableau.sort((a, b) => a.nom.localeCompare(b.nom));
```
