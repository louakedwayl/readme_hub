
# Les fonctions anonymes en JavaScript

## Qu'est-ce qu'une fonction anonyme ?
Une **fonction anonyme** est une fonction qui n'a **pas de nom**. 
Elle est généralement utilisée comme **valeur** (par exemple assignée à une variable) ou comme **callback** (passée en argument à une autre fonction).

Exemple :
```js
const maFonction = function() {
    console.log("Ceci est une fonction anonyme !");
};
maFonction();
```

## Pourquoi utiliser des fonctions anonymes ?
- **Callbacks** : utilisées dans les événements ou les fonctions asynchrones.
- **Fonctions temporaires** : quand une fonction n’est pas réutilisée ailleurs.
- **Lisibilité** : quand on veut garder le code concis et directement dans le contexte d'utilisation.

## Exemple d'utilisation avec `setTimeout`
```js
setTimeout(function() {
    console.log("Exécuté après 2 secondes");
}, 2000);
```

## Les fonctions anonymes fléchées (Arrow Functions)
Depuis ES6, on peut écrire des fonctions anonymes de façon plus concise grâce aux **arrow functions** :
```js
const maFonction = () => {
    console.log("Ceci est une fonction fléchée !");
};
maFonction();
```

Elles sont particulièrement utiles pour :
- Simplifier la syntaxe.
- Garder le `this` du contexte parent.

### Exemple d'utilisation :
```js
const nombres = [1, 2, 3, 4];
const doubles = nombres.map((n) => n * 2);
console.log(doubles); // [2, 4, 6, 8]
```

## Différences entre fonctions normales et fléchées
- Les **arrow functions** ne créent pas leur propre `this`. Elles héritent de celui du contexte.
- Impossible d’utiliser `arguments` directement dans une arrow function.

## Quand éviter les fonctions anonymes ?
- Quand une fonction doit être réutilisée à plusieurs endroits → **privilégier une fonction nommée**.
- Quand on a besoin de `this` spécifique à la fonction.

## Conclusion
Les **fonctions anonymes** sont très pratiques en JavaScript pour les callbacks, les fonctions temporaires et les manipulations de données.  
Elles deviennent encore plus puissantes avec les **fonctions fléchées**, qui offrent une syntaxe plus concise et un meilleur comportement avec `this`.
