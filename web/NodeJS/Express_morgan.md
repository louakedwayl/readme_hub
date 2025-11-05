# Morgan pour Express.js

Morgan est un **middleware de logging HTTP** pour Express, très pratique pour **développer et déboguer des applications**.

---

## 1️⃣ Qu’est-ce que Morgan ?

* Middleware Express pour **logger automatiquement toutes les requêtes HTTP**
* Remplace les petits `console.log(req.url)` maison
* Affiche méthode HTTP, URL, code réponse, temps de réponse, taille de la réponse, etc.

---

## 2️⃣ Installation

```bash
npm install morgan
```

---

## 3️⃣ Utilisation basique

```js
const express = require("express");
const morgan = require("morgan");

const app = express();

// Middleware Morgan
app.use(morgan("dev")); // format compact pour le développement

app.get("/", (req, res) => {
    res.send("Hello World!");
});

app.listen(3000, () => console.log("Serveur sur http://localhost:3000"));
```

* Exemple de log pour `GET /` :

```
GET / 200 3.456 ms - 12
```

* `GET` → méthode HTTP
* `/` → URL
* `200` → code HTTP
* `3.456 ms` → temps de réponse
* `12` → taille de la réponse (octets)

---

## 4️⃣ Formats disponibles

| Format     | Description                                            |
| ---------- | ------------------------------------------------------ |
| `dev`      | Compact, lisible pour le développement                 |
| `combined` | Format complet style Apache, utile pour logs détaillés |
| `tiny`     | Très court, minimaliste                                |
| `common`   | Standard, lisible et simple                            |

Exemple :

```js
app.use(morgan("combined"));
```

---

## 5️⃣ Avantages

* Logs propres et lisibles sans effort
* Capture toutes les requêtes HTTP, même celles des middlewares précédents
* Compatible avec tous les middlewares et routes Express
* Peut être personnalisé pour filtrer certaines routes ou écrire dans un fichier

---

💡 **Astuce :**

* Toujours **enregistrer Morgan avant vos routes** pour logger toutes les requêtes
* Pour la production, utiliser `combined` et écrire les logs dans un fichier

```js
const fs = require('fs');
const path = require('path');
const accessLogStream = fs.createWriteStream(path.join(__dirname, 'access.log'), { flags: 'a' });
app.use(morgan('combined', { stream: accessLogStream }));
```
