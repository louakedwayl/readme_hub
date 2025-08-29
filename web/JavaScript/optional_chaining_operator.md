
# 🧠 L’opérateur de chaînage optionnel (`?.`) en JavaScript

## 📌 Définition

L'opérateur `?.`, appelé **chaînage optionnel** (*optional chaining*), permet d'accéder **sans erreur** à une propriété ou méthode même si une partie de la chaîne est `null` ou `undefined`.

---

## ✅ Syntaxe de base

```js
objet?.propriete
objet?.[index]
objet?.methode()
```

---

## 🔍 Exemple : accès à une propriété potentiellement manquante

```js
let user = {
  nom: "Alice",
  adresse: null
};

console.log(user.adresse?.ville); // ❯ undefined
```

Sans `?.`, cela provoquerait une erreur :

```js
console.log(user.adresse.ville); // ❌ TypeError: Cannot read property 'ville' of null
```

---

## 🧪 Exemple : appel conditionnel d'une méthode

```js
let user = {
  nom: "Bob",
  direBonjour: function () {
    return "Salut !";
  }
};

console.log(user.direBonjour?.()); // ❯ "Salut !"

let autre = {};
console.log(autre.direBonjour?.()); // ❯ undefined
```

---

## 🧱 Exemple : accès à un tableau potentiellement `null`

```js
let utilisateurs = null;

console.log(utilisateurs?.[0]); // ❯ undefined
```

---

## ⚠️ Remarques importantes

- `?.` ne fonctionne **que pour l'accès à une propriété, une méthode ou un index**
- Il **ne peut pas être utilisé pour affecter une valeur** (`obj?.prop = 3` ❌)
- Ne s'utilise **qu'immédiatement après un objet ou une expression valide**

---

## 📘 Exemple complet d'objet imbriqué

```js
let user = {
  profil: {
    contact: {
      email: "alice@example.com"
    }
  }
};

console.log(user.profil?.contact?.email);     // ❯ "alice@example.com"
console.log(user.profil?.reseaux?.twitter);   // ❯ undefined
```

---

## 🧹 Comparaison : avant vs après

### Sans `?.` (ancien code)

```js
if (user && user.profil && user.profil.contact) {
  console.log(user.profil.contact.email);
}
```

### Avec `?.` (plus propre)

```js
console.log(user?.profil?.contact?.email);
```

---

## 🧪 Exemple avec méthode inconnue

```js
let settings = {
  mode: "dark"
};

settings.save?.(); // ❯ undefined, pas d'erreur
```

---

## 🕹 Exemple avec index inconnu dans un tableau

```js
let liste = ["a", "b", "c"];
console.log(liste?.[2]); // ❯ "c"
console.log(liste?.[5]); // ❯ undefined
```

---

## 🧠 En résumé

| Expression                  | Résultat si tout existe | Résultat si un maillon est null/undefined |
|----------------------------|--------------------------|--------------------------------------------|
| `obj?.prop`                | `valeur`                | `undefined`                                |
| `obj?.[index]`             | `valeur`                | `undefined`                                |
| `obj?.methode()`           | `résultat`              | `undefined`                                |

---

## 📅 Compatibilité

- Introduit en **ES2020**
- Fonctionne dans **tous les navigateurs modernes**
- Pour un support plus large, utilisez un **transpileur comme Babel**
