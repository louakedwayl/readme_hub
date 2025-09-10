# L'opérateur de chaînage optionnel (`?.`) en JavaScript / TypeScript

L'opérateur de **chaînage optionnel** (`?.`) permet d'accéder **en toute sécurité** aux propriétés ou méthodes d'un objet qui pourrait être `null` ou `undefined`, sans provoquer d'erreur.

---

## 1. Pourquoi l'utiliser ?

En JavaScript classique, accéder à une propriété d'un objet `null` ou `undefined` provoque une **erreur** :

```js
const user = null;
console.log(user.name); // ❌ TypeError: Cannot read property 'name' of null
```

Avec le chaînage optionnel, l'accès est sécurisé :

```js
const user = null;
console.log(user?.name); // ✅ undefined, pas d'erreur
```

---

## 2. Syntaxe et utilisation

### a) Accéder à une propriété

```js
const user = { name: "Alice" };
console.log(user?.name); // "Alice"

const user2 = null;
console.log(user2?.name); // undefined
```

### b) Appeler une méthode

```js
const user = {
  sayHi: () => "Salut !"
};

console.log(user.sayHi?.()); // "Salut !"
console.log(null?.sayHi?.()); // undefined
```

### c) Accéder à un élément dans un tableau ou objet

```js
const users = [{ name: "Alice" }];
console.log(users[0]?.name); // "Alice"
console.log(users[1]?.name); // undefined
```

### d) Combinaison avec l’opérateur de coalescence nulle (`??`)

```js
const user = null;
const name = user?.name ?? "Invité";
console.log(name); // "Invité"
```

---

## 3. Chaînage multiple

Vous pouvez chaîner plusieurs niveaux d’objets ou méthodes :

```js
const obj = { a: { b: { c: 42 } } };

console.log(obj?.a?.b?.c); // 42
console.log(obj?.x?.y?.c); // undefined
```

---

## 4. Bonnes pratiques

* Utilisez-le pour **éviter les vérifications manuelles répétitives** : `if (obj && obj.prop && obj.prop2)`
* Ne l’utilisez pas systématiquement : si une valeur doit absolument exister, mieux vaut laisser l'erreur apparaître pour détecter un bug.
* Combinez-le avec `??` pour gérer des valeurs par défaut.

---

## 5. Résumé

| Cas d'utilisation             | Exemple              | Résultat                                 |
| ----------------------------- | -------------------- | ---------------------------------------- |
| Accéder à une propriété       | `obj?.prop`          | `undefined` si `obj` nul                 |
| Appeler une méthode           | `obj?.method()`      | `undefined` si `obj` nul                 |
| Accéder à un tableau ou objet | `arr?.[0]`           | `undefined` si `arr` nul                 |
| Chaînage multiple             | `obj?.a?.b?.c`       | `undefined` si n'importe quel niveau nul |
| Valeur par défaut             | `obj?.prop ?? "val"` | "val" si `obj?.prop` nul                 |

---

**Conclusion :**
L’opérateur `?.` simplifie la gestion des valeurs nulles ou indéfinies, rend le code plus lisible et évite les erreurs fréquentes dans l’accès aux objets complexes.
