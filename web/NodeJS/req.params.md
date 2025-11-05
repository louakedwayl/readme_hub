# 🧠 Cours Express.js : Paramètres de route (`req.params` et `:id`)

## 🚀 Introduction

Dans Express.js, il est possible de créer des routes **dynamiques**, c’est-à-dire des routes où une partie de l’URL peut changer et être récupérée dans ton code. Cela se fait grâce aux **paramètres de route**, accessibles via `req.params`.

Exemple d’une route dynamique :

```js
app.get('/api/pokemon/:id', (req, res) => {
  const id = req.params.id;
  res.send(`Vous avez demandé le Pokémon n°${id}`);
});
```

---

## 📦 1. Syntaxe d’une route avec paramètre

* `:id` est un **paramètre de route**.
* Tout ce qui est placé à cette position dans l’URL sera capturé par Express et stocké dans `req.params`.

Exemples :

| URL visitée       | `req.params`   | `req.params.id` |
| ----------------- | -------------- | --------------- |
| `/api/pokemon/1`  | `{ id: '1' }`  | `'1'`           |
| `/api/pokemon/25` | `{ id: '25' }` | `'25'`          |

---

## 🔍 2. Accéder aux paramètres dynamiques

`req.params` est un objet contenant tous les paramètres définis dans la route.

```js
app.get('/api/pokemon/:id', (req, res) => {
  const id = req.params.id; // récupère la valeur du paramètre 'id'
  res.send(`Vous avez demandé le Pokémon n°${id}`);
});
```

* **Type** : `req.params.id` est toujours une **chaîne de caractères (`string`)**.
* Si tu veux un nombre :

```js
const idNum = parseInt(req.params.id, 10);
```

---

## 🧩 3. Exemple complet avec Express

```js
const express = require('express');
const app = express();

app.get('/api/pokemon/:id', (req, res) => {
  const id = req.params.id;
  res.send(`Vous avez demandé le Pokémon n°${id}`);
});

app.listen(3000, () => {
  console.log('Serveur en écoute sur http://localhost:3000');
});
```

* Test :

  * `/api/pokemon/1` → `Vous avez demandé le Pokémon n°1`
  * `/api/pokemon/25` → `Vous avez demandé le Pokémon n°25`

---

## 🔧 4. Paramètres multiples

Tu peux définir plusieurs paramètres dans la même route :

```js
app.get('/api/pokemon/:id/:name', (req, res) => {
  const { id, name } = req.params;
  res.send(`Pokémon n°${id} : ${name}`);
});
```

* URL `/api/pokemon/1/Bulbizarre` → `Pokémon n°1 : Bulbizarre`

---

## 🧠 5. Bonnes pratiques

1. **Toujours valider les paramètres** :

```js
if (!/^[0-9]+$/.test(req.params.id)) {
  return res.status(400).send('id invalide');
}
```

2. **Convertir en nombre si nécessaire** :

```js
const idNum = parseInt(req.params.id, 10);
```

3. **Utiliser la destructuration** pour plus de lisibilité :

```js
const { id } = req.params;
```

4. **Sécurité** : ne jamais injecter directement `req.params` dans une requête SQL sans préparation (prévenir les injections).

---

## 🔑 Résumé

| Élément         | Description                                                |
| --------------- | ---------------------------------------------------------- |
| `:id`           | Paramètre dynamique dans la route URL                      |
| `req.params`    | Objet contenant tous les paramètres dynamiques de la route |
| `req.params.id` | Valeur du paramètre `id` (string)                          |
| Conversion      | `parseInt(req.params.id, 10)` pour un nombre               |
| Validation      | Toujours vérifier le format et la valeur                   |

---

> Les paramètres de route permettent de créer des API REST flexibles et dynamiques avec Express.js, en récupérant directement des valeurs depuis l’URL.
