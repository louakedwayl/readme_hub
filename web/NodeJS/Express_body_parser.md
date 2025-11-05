# 📘 Cours : `body-parser` et lecture du corps des requêtes en Express

## 1️⃣ Introduction

Lorsque tu construis une API avec **Express.js**, il est fréquent de recevoir des données envoyées par le client via **POST**, **PUT**, ou **PATCH**.  
Ces données se trouvent dans le **corps de la requête** (`req.body`).  

Pour qu’Express puisse lire ces données, il faut utiliser un **middleware** qui parse le corps de la requête.  
Historiquement, on utilisait le package `body-parser`, mais depuis Express 4.16+, certaines fonctionnalités sont intégrées dans Express directement.

---

## 2️⃣ Installation (si body-parser externe)

```bash
npm install body-parser
```

Puis dans ton code :

```js
const express = require("express");
const bodyParser = require("body-parser");

const app = express();

// Pour parser les JSON
app.use(bodyParser.json());

// Pour parser les données x-www-form-urlencoded
app.use(bodyParser.urlencoded({ extended: true }));
```

---

## 3️⃣ Middleware intégré à Express

Depuis Express 4.16+, tu peux utiliser directement :

```js
const express = require("express");
const app = express();

// Parse le JSON
app.use(express.json());

// Parse les données des formulaires (application/x-www-form-urlencoded)
app.use(express.urlencoded({ extended: true }));
```

---

## 4️⃣ Exemple d’utilisation avec POST

### 🔹 Serveur

```js
const express = require("express");
const app = express();

// Middleware JSON
app.use(express.json());

app.post("/api/pokemons", (req, res) => {
    const { name, hp, cp } = req.body;

    if (!name) return res.status(400).json({ message: "Nom manquant" });

    res.status(201).json({
        message: `Le pokémon ${name} a été créé`,
        data: { name, hp, cp }
    });
});

app.listen(3000, () => console.log("Serveur démarré sur le port 3000"));
```

### 🔹 Client (avec curl)

```bash
curl -X POST http://localhost:3000/api/pokemons      -H "Content-Type: application/json"      -d '{"name":"Chenipan","hp":29,"cp":4}'
```

💡 Résultat attendu :

```json
{
  "message": "Le pokémon Chenipan a été créé",
  "data": {
    "name": "Chenipan",
    "hp": 29,
    "cp": 4
  }
}
```

---

## 5️⃣ Points importants

1. **Middleware obligatoire pour lire `req.body`**  
   Sans `express.json()` ou `body-parser`, `req.body` sera `undefined`.

2. **Différents formats** :
   - `application/json` → JSON  
   - `application/x-www-form-urlencoded` → données de formulaire HTML  
   - `multipart/form-data` → fichiers + formulaire (utiliser `multer`)

3. **Ordre du middleware**  
   Toujours placer `app.use(express.json())` **avant** les routes qui lisent `req.body`.

---

## 6️⃣ Résumé

- `body-parser` ou `express.json()` permet de **parser le corps des requêtes HTTP**.  
- Utilisé surtout pour **POST/PUT/PATCH**.  
- Sans ça, `req.body` est `undefined`.  
- Permet de récupérer facilement les données envoyées par le client.
