# 🌐 Cours : Introduction à Express.js

## 1. Qu'est-ce qu'Express.js ?

**Express.js** est un **framework minimaliste pour Node.js** qui facilite la création d'applications web et d’API.
Il fournit une couche d’abstraction au-dessus du module HTTP natif de Node.js, en rendant le code plus clair, plus rapide à écrire et plus facile à maintenir.

👉 En clair : Express permet de créer un serveur en **quelques lignes de code**.

---

## 2. Installation

Avant tout, tu dois avoir **Node.js** et **npm** installés sur ton ordinateur.

### Étapes :

```bash
mkdir mon-projet-express
cd mon-projet-express
npm init -y
npm install express
```

---

## 3. Créer un serveur Express

Voici le code minimal pour lancer un serveur avec Express :

```js
// fichier : server.js
const express = require('express');
const app = express();

// Définir un port
const PORT = 3000;

// Route GET de base
app.get('/', (req, res) => {
  res.send('Hello World depuis Express !');
});

// Démarrer le serveur
app.listen(PORT, () => {
  console.log(`Serveur en écoute sur http://localhost:${PORT}`);
});
```

➡️ Lance le serveur :

```bash
node server.js
```

Puis ouvre ton navigateur sur [http://localhost:3000](http://localhost:3000)

---

## 4. Les routes dans Express

Les **routes** permettent de définir les points d’accès (endpoints) de ton application.

### Exemple :

```js
app.get('/users', (req, res) => {
  res.send('Liste des utilisateurs');
});

app.post('/users', (req, res) => {
  res.send('Utilisateur ajouté');
});

app.put('/users/:id', (req, res) => {
  res.send(`Utilisateur ${req.params.id} modifié`);
});

app.delete('/users/:id', (req, res) => {
  res.send(`Utilisateur ${req.params.id} supprimé`);
});
```

---

## 5. Middleware

Les **middlewares** sont des fonctions exécutées entre la réception de la requête et l’envoi de la réponse.

### Exemple simple :

```js
app.use((req, res, next) => {
  console.log(`Requête reçue : ${req.method} ${req.url}`);
  next(); // passe au middleware suivant
});
```

### Exemple d’un middleware intégré :

```js
app.use(express.json()); // pour traiter le JSON dans le corps des requêtes
```

---

## 6. Gestion des fichiers statiques

Tu peux servir des fichiers (HTML, CSS, images...) avec Express.

```js
app.use(express.static('public'));
```

👉 Tous les fichiers dans le dossier `public/` seront accessibles depuis ton navigateur.

---

## 7. Organisation du projet

Structure recommandée pour un projet Express :

```
mon-projet-express/
│
├── server.js
├── package.json
├── routes/
│   └── users.js
├── controllers/
│   └── userController.js
└── public/
    └── index.html
```

### Exemple d’utilisation d’un fichier de routes :

```js
// routes/users.js
const express = require('express');
const router = express.Router();

router.get('/', (req, res) => {
  res.send('Liste des utilisateurs');
});

module.exports = router;

// server.js
const express = require('express');
const app = express();
const usersRoutes = require('./routes/users');

app.use('/users', usersRoutes);
app.listen(3000);
```

---

## 8. Erreurs et gestion des 404

### Exemple :

```js
// Route inexistante
app.use((req, res) => {
  res.status(404).send('Page non trouvée 😢');
});

// Gestion globale des erreurs
app.use((err, req, res, next) => {
  console.error(err.stack);
  res.status(500).send('Erreur serveur 🧨');
});
```

---

## 9. Express et les APIs

Express est très souvent utilisé pour créer des **APIs RESTful**.

### Exemple simple d’API :

```js
const express = require('express');
const app = express();

app.use(express.json());

let users = [
  { id: 1, name: 'Alice' },
  { id: 2, name: 'Bob' }
];

app.get('/api/users', (req, res) => res.json(users));

app.post('/api/users', (req, res) => {
  const newUser = req.body;
  users.push(newUser);
  res.status(201).json(newUser);
});

app.listen(3000, () => console.log('API démarrée sur le port 3000'));
```

---

## 10. Résumé

| Concept                                                   | Description                  |
| --------------------------------------------------------- | ---------------------------- |
| `express()`                                               | Crée une application Express |
| `app.get()` / `app.post()` / `app.put()` / `app.delete()` | Définir des routes           |
| `app.use()`                                               | Ajouter un middleware        |
| `express.json()`                                          | Parse le JSON des requêtes   |
| `app.listen(port)`                                        | Démarre le serveur           |
| `res.send()` / `res.json()`                               | Envoie une réponse au client |

---

## 11. Avantages d’Express

* Simple et rapide à mettre en place
* Flexible et extensible
* Large écosystème de middlewares
* Parfait pour créer des APIs REST

---
