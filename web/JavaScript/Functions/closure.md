
# Les Closures en JavaScript

## Qu'est-ce qu'une closure ?

En JavaScript, **une closure** est une fonction qui **se souvient de l'environnement dans lequel elle a été créée**, même après l'exécution de cette fonction parente.

En d’autres termes, une closure **capture** les variables locales de la fonction qui l’a engendrée, et **peut continuer à les utiliser et les modifier**.

---

## Exemple simple

```js
function compteur() {
    var i = 0; // variable locale à compteur()
    return function() {
        return i++; // fonction interne qui utilise i
    };
}

var plusUn = compteur();

console.log(plusUn()); // 0
console.log(plusUn()); // 1
console.log(plusUn()); // 2
```

### Explication :
- `compteur()` s’exécute et crée une variable `i = 0`.
- Elle **retourne une fonction interne** qui utilise `i`.
- Même si `compteur()` est terminé, **la fonction retournée garde en mémoire `i`**.
- À chaque appel de `plusUn()`, `i` est incrémenté.

---

## Pourquoi ça marche ?

Quand une fonction est créée en JavaScript, elle **emporte avec elle une "référence" vers l’environnement où elle a été définie**.

Cette combinaison **(fonction + environnement)** s’appelle une **closure**.

Ainsi, même après que la fonction parent (`compteur()`) soit terminée, **les variables locales restent accessibles pour la fonction interne**.

---

## Comparaison avec C / C++

En C, cela ressemble à l’utilisation d’une **variable `static`** :
```c
int compteur() {
    static int i = 0;
    return i++;
}
```

Mais les closures vont **plus loin** :
- Chaque appel de `compteur()` crée un **nouvel espace mémoire indépendant**.
- Tu peux avoir plusieurs compteurs qui ne partagent pas la même variable `i`.

```js
var c1 = compteur();
var c2 = compteur();

console.log(c1()); // 0
console.log(c1()); // 1
console.log(c2()); // 0 (indépendant de c1)
```

---

## Utilités des closures

1. **Créer des variables privées** : protéger des données de l’accès direct.
2. **Maintenir un état** sans utiliser de variables globales.
3. **Construire des fonctions dynamiques** qui se souviennent de leur contexte.
4. **Éviter les collisions de noms** dans les projets avec beaucoup de code.

---

## Exemple pratique : compteur avec reset

```js
function createCounter() {
    var count = 0;
    return {
        increment: function() { return ++count; },
        reset: function() { count = 0; return count; }
    };
}

var counter = createCounter();

console.log(counter.increment()); // 1
console.log(counter.increment()); // 2
console.log(counter.reset());     // 0
```

**Ici :**
- `count` n’est accessible **que via** `increment()` et `reset()`.
- Impossible de modifier `count` directement depuis l’extérieur.

---

## Schéma visuel
```
createCounter()
    └── count = 0
    └── retourne { increment(), reset() }
                └── Ces fonctions gardent un accès à count
```

---

## Conclusion
Une **closure** est :
- Une **fonction interne** qui garde un accès aux variables de son contexte d’origine.
- Utile pour créer des **données privées**, **mémoriser un état** et **modulariser le code**.

Elles sont fondamentales pour comprendre **le fonctionnement de JavaScript**, surtout dans les patterns modernes (modules, callbacks, etc.).
