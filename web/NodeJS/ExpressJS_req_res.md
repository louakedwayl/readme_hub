# Express.js : `req` et `res`

## 🚀 Introduction

Dans Express.js, chaque fois qu’un client (navigateur, API, application mobile…) envoie une **requête HTTP** au serveur, Express exécute la fonction callback associée à la route correspondante :

```js
app.get("/", (req, res) => {
  // ton code ici
});
```

Les deux paramètres :

* `req` → représente **la requête entrante** (du client vers le serveur)
* `res` → représente **la réponse** (du serveur vers le client)

---

## 📦 1. L’objet `req` (Request)

`req` contient **toutes les informations** que le client envoie au serveur :

* l’URL demandée
* les paramètres
* le corps (body) de la requête
* les en-têtes HTTP (headers)
* etc.

### ✳️ Principales propriétés de `req`

| Propriété     | Description                                                  | Exemple                             |
| ------------- | ------------------------------------------------------------ | ----------------------------------- |
| `req.params`  | Contient les **paramètres dynamiques** de l’URL              | `/user/:id` → `req.params.id`       |
| `req.query`   | Contient les **paramètres de requête** après `?`             | `/search?q=pikachu` → `req.query.q` |
| `req.body`    | Contient les **données envoyées dans le corps** (POST, PUT…) | `{ name: "Bulbizarre" }`            |
| `req.headers` | Contient les **en-têtes HTTP** envoyés par le client         | `req.headers['content-type']`       |
| `req.method`  | Type de requête HTTP                                         | `"GET"`, `"POST"`, etc.             |
| `req.url`     | L’URL demandée                                               | `"/api/pokemon/1"`                  |

### 🔍 Exemple d’utilisation :

```js
app.get("/api/pokemon/:id", (req, res) => {
  console.log(req.params); // { id: "1" }
  console.log(req.query);  // { power: "grass" } si URL = /api/pokemon/1?power=grass
  res.send(`Pokémon ${req.params.id}`);
});
```

---

## 🔎 Focus : `req.params.id` (explication détaillée)

Quand tu définis une route avec un paramètre dynamique, par exemple `:id`, Express place la valeur correspondante dans `req.params` :

```js
app.get('/api/pokemon/:id', (req, res) => {
  const id = req.params.id; // <- ici
  res.send(`Tu as demandé le Pokémon numéro ${id}`);
});
```

### Ce qu’il faut savoir sur `req.params.id` :

* **C’est toujours une chaîne de caractères (`string`)**. Même si l’URL contient un nombre (`/api/pokemon/5`), `req.params.id === "5"`.
* **Conversion** : si tu veux traiter `id` comme un nombre, convertis-le explicitement :

  ```js
  const idNum = Number(req.params.id); // ou parseInt(req.params.id, 10)
  ```
* **Validation** : vérifie la forme/valeur avant de l’utiliser :

  ```js
  if (!/^[0-9]+$/.test(req.params.id)) {
    return res.status(400).send('id invalide');
  }
  ```
* **Sécurité** : évite d’insérer directement `req.params.id` dans des requêtes SQL sans sanitation / requêtes paramétrées pour éviter les injections.
* **Destructuration** : on peut extraire proprement :

  ```js
  const { id } = req.params;
  ```
* **Valeur par défaut / fallback** :

  ```js
  const id = req.params.id || '1';
  ```
* **Typescript** : définit le type attendu si besoin (ex : `req.params.id: string`) et effectue la conversion/validation.

### Exemple complet avec conversion et validation :

```js
app.get('/api/pokemon/:id', (req, res) => {
  const { id } = req.params;

  if (!/^[0-9]+$/.test(id)) {
    return res.status(400).json({ error: 'id doit être un nombre entier positif' });
  }

  const idNum = parseInt(id, 10);

  // logique métier : récupérer le Pokémon par idNum
  res.json({ id: idNum, name: 'Bulbizarre' });
});
```

---

## 💬 2. L’objet `res` (Response)

`res` sert à **envoyer une réponse HTTP** au client. C’est la façon dont ton serveur “répond” à une requête.

### ✳️ Méthodes les plus utilisées de `res`

| Méthode          | Description                                             | Exemple                                 |
| ---------------- | ------------------------------------------------------- | --------------------------------------- |
| `res.send()`     | Envoie une réponse (texte, objet, HTML…)                | `res.send("Hello World")`               |
| `res.json()`     | Envoie une réponse **JSON**                             | `res.json({ id: 1, name: "Pikachu" })`  |
| `res.status()`   | Définit le **code HTTP** avant d’envoyer la réponse     | `res.status(404).send("Not Found")`     |
| `res.set()`      | Définit un **en-tête HTTP**                             | `res.set("Content-Type", "text/plain")` |
| `res.redirect()` | Redirige vers une autre route                           | `res.redirect("/home")`                 |
| `res.end()`      | Termine la réponse sans rien envoyer (rarement utilisé) | `res.end()`                             |

### 🔍 Exemple d’utilisation :

```js
app.get("/api/pokemon/1", (req, res) => {
  res.status(200).json({
    id: 1,
    name: "Bulbizarre",
    type: "Plante/Poison"
  });
});
```

---

## ⚙️ 3. Schéma simplifié

```
[ CLIENT ]  --->  [ REQUÊTE HTTP ] --->  [ SERVER Express ]
                     |                      |
                     |------> req ---------->|
                     |<------ res -----------|
```

---

## 🧩 4. Exemple complet

```js
const express = require("express");
const app = express();

// Middleware pour lire le corps JSON
app.use(express.json());

app.get("/api/pokemon/:id", (req, res) => {
  const { id } = req.params;

  if (!/^[0-9]+$/.test(id)) {
    return res.status(400).json({ error: 'id doit être un nombre entier positif' });
  }

  const idNum = parseInt(id, 10);

  res.status(200).json({
    id: idNum,
    name: "Bulbizarre",
    type: "Plante/Poison"
  });
});

app.post("/api/pokemon", (req, res) => {
  console.log(req.body);
  res.status(201).send("Nouveau Pokémon ajouté !");
});

app.listen(3000, () => {
  console.log("Serveur en écoute sur le port 3000");
});
```

---

## 🧠 5. À retenir

| Élément         | Description                                                 |
| --------------- | ----------------------------------------------------------- |
| `req`           | Données **entrantes** (ce que le client envoie)             |
| `res`           | Données **sortantes** (ce que le serveur renvoie)           |
| `req.params`    | Variables dans l’URL (ex: `/user/:id`)                      |
| `req.params.id` | **Valeur du paramètre `id`** (toujours une chaîne `string`) |
| `req.query`     | Variables après le `?` dans l’URL                           |
| `req.body`      | Données envoyées via POST/PUT                               |
| `res.send()`    | Envoie une réponse HTTP                                     |
| `res.json()`    | Envoie une réponse JSON                                     |
| `res.status()`  | Définit le code HTTP (200, 404, 500, …)                     |

---

## ❓ FAQ rapide (entretien)

**Q1 : Quelle est la différence entre `req.params` et `req.query` ?**

* `req.params` = paramètres de route définis par `:name` dans le chemin.
* `req.query` = paramètres envoyés après `?` dans l’URL.

**Q2 : `req.params.id` est-il un nombre ?**

* Non, c’est une chaîne. Il faut convertir/valider avant utilisation.

**Q3 : Comment protéger contre l’injection SQL si j’utilise `req.params.id` ?**

* Utilise des requêtes paramétrées/prepared statements et valide le format côté serveur.

---
