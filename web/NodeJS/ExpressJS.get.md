# 🧠 Cours Express.js : La méthode `app.get()`

## 1️⃣ Introduction

En Express.js, `app.get()` est utilisé pour **définir une route HTTP GET**. Une route GET est une URL à laquelle un client peut envoyer une requête pour **récupérer des données**.

---

## 2️⃣ Syntaxe

```js
app.get(path, callback)
```

* `path` : le chemin de la route (`"/"`, `"/api/pokemon/:id"`, etc.)
* `callback` : fonction qui sera exécutée quand la route est appelée

  * reçoit deux arguments : `req` (request) et `res` (response)

---

## 3️⃣ Exemple simple

```js
const express = require("express");
const app = express();

app.get("/", (req, res) => {
    res.send("Hello depuis Express!");
});

app.listen(3000, () => console.log("Serveur sur http://localhost:3000"));
```

* Naviguer sur `http://localhost:3000/` renvoie `Hello depuis Express!`
* `res.send()` envoie la réponse au client.

---

## 4️⃣ Routes avec paramètres

```js
app.get("/api/pokemon/:id", (req, res) => {
    const id = parseInt(req.params.id, 10);
    const pokemon = pokemons.find(p => p.id === id);

    if (!pokemon) {
        return res.status(404).send("Pokémon non trouvé !");
    }

    res.status(200).send(`Vous avez demandé le Pokémon n°${pokemon.id} ${pokemon.name}`);
});
```

* `:id` → paramètre dynamique accessible via `req.params.id`
* Toujours vérifier si l’élément existe avant d’accéder à ses propriétés
* `res.status(code).send()` permet de **définir le code HTTP** et d’envoyer la réponse

---

## 5️⃣ Points importants

1. **Le callback** est exécuté **à chaque requête GET** sur cette route.
2. **`req`** contient les informations de la requête (paramètres, headers, query string, etc.).
3. **`res`** sert à envoyer la réponse (texte, JSON, status, headers…)
4. **`return res.send()`** est souvent utilisé pour arrêter l’exécution du callback après avoir envoyé une réponse.
5. Tu peux chaîner certaines méthodes de `res` :

```js
res.status(200).json({ message: "OK" });
```

---

## 6️⃣ Codes HTTP courants pour GET

| Code | Signification         | Exemple dans Express        |
| ---- | --------------------- | --------------------------- |
| 200  | Succès                | `res.status(200).send(...)` |
| 404  | Ressource non trouvée | `res.status(404).send(...)` |
| 400  | Requête invalide      | `res.status(400).send(...)` |
| 500  | Erreur serveur        | `res.status(500).send(...)` |

---

## 7️⃣ Résumé rapide

* `app.get()` : définit une route GET
* `path` : URL de la route
* `callback(req, res)` : gère la requête et envoie la réponse
* `req.params` : récupère les paramètres dynamiques
* `res.send()` / `res.json()` / `res.status()` : envoie la réponse et définit le code HTTP

💡 Astuce : Les routes GET sont utilisées **pour récupérer des données**, tandis que POST, PUT, DELETE sont utilisées pour **modifier ou supprimer des données**.
