# 📘 la méthode `test()` et les expressions régulières

## 1. Introduction

En JavaScript, les **expressions régulières** (ou *regex*) sont utilisées pour rechercher, valider ou extraire des motifs dans des chaînes de caractères.
La méthode **`test()`** est l’une des plus simples et des plus utilisées pour **vérifier si une chaîne correspond à un motif**.

---

## 2. Qu’est-ce qu’une expression régulière (RegExp) ?

Une expression régulière est un objet qui décrit un **modèle de texte**.

### Création d’une RegExp

```js
const regex1 = /chat/;
const regex2 = new RegExp("chat");
```

La forme avec les `/` est la plus utilisée.

---

## 3. La méthode `test()`

### Définition

La méthode `test()` permet de **tester si une chaîne de caractères contient un motif défini par une expression régulière**.

### Syntaxe

```js
regex.test(chaine)
```

### Valeur de retour

* `true` → le motif est trouvé
* `false` → le motif n’est pas trouvé

---

## 4. Exemples simples

### Exemple 1 : recherche basique

```js
const regex = /chat/;

regex.test("J'aime les chats"); // true
regex.test("J'aime les chiens"); // false
```

### Exemple 2 : sensibilité à la casse

```js
const regex = /bonjour/;

regex.test("Bonjour"); // false
```

Avec le flag `i` :

```js
const regex = /bonjour/i;

regex.test("Bonjour"); // true
```

---

## 5. Les flags (options)

| Flag | Nom        | Description       |
| ---- | ---------- | ----------------- |
| `i`  | ignoreCase | Ignore la casse   |
| `g`  | global     | Recherche globale |
| `m`  | multiline  | Mode multiligne   |

⚠️ **Attention** : le flag `g` peut provoquer des comportements inattendus avec `test()`.

---

## 6. Attention au flag `g`

```js
const regex = /a/g;

regex.test("abc"); // true
regex.test("abc"); // false
```

👉 Cela arrive car `test()` mémorise la position de la dernière recherche.

### Bonne pratique

➡️ Ne pas utiliser le flag `g` avec `test()` sauf besoin spécifique.

---

## 7. Utilisation courante : validation

### Vérifier un nombre

```js
const regex = /^\d+$/;

regex.test("123");  // true
regex.test("123a"); // false
```

### Vérifier un code postal (5 chiffres)

```js
const cpRegex = /^\d{5}$/;
cpRegex.test("75001"); // true
```

### Vérifier un email (simple)

```js
const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
emailRegex.test("test@mail.com"); // true
```

---

## 8. `test()` vs autres méthodes

### `test()` vs `match()`

| Méthode   | Résultat                 |
| --------- | ------------------------ |
| `test()`  | booléen (`true / false`) |
| `match()` | tableau ou `null`        |

```js
/a/.test("abc");       // true
"abc".match(/a/);      // ["a"]
```

### `test()` vs `includes()`

```js
"abc".includes("a"); // true
/a/.test("abc");       // true
```

👉 `test()` est plus puissant grâce aux regex.

---

## 9. Cas d’utilisation typiques

* Validation de formulaires
* Vérification de mots de passe
* Détection de formats (email, téléphone, numéro)
* Conditions dans des `if`

```js
if (/^\d{5}$/.test(codePostal)) {
  console.log("Code postal valide");
}
```

---

## 10. Conclusion

La méthode `test()` est :

* simple
* rapide
* idéale pour les validations

Associée aux expressions régulières, elle devient un outil **très puissant en JavaScript**.

---

📌 *Conseil* : entraîne-toi régulièrement avec des regex pour les maîtriser 👍
