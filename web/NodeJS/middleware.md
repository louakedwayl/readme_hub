# Node.js / Express : Les Middlewares

## 1️⃣ Introduction

Un **middleware** est une fonction qui est exécutée **pendant le traitement d’une requête HTTP**, avant que la requête n’atteigne la route finale. Les middlewares sont utilisés pour :

* Logger les requêtes
* Parser le corps des requêtes (`body`)
* Gérer l’authentification
* Modifier `req` ou `res`
* Gérer les erreurs

---

## 2️⃣ Syntaxe générale

Un middleware a la forme suivante :

```js
(req, res, next) => {
  // traitement
  next(); // passe au middleware suivant
}
```

* `req` : objet représentant la requête
* `res` : objet représentant la réponse
* `next` : fonction qui passe au middleware suivant

---

## 3️⃣ Middleware global

On peut appliquer un middleware à **toutes les requêtes** avec `app.use()` :

```js
const express = require('express');
const app = express();

app.use((req, res, next) => {
  console.log(`${req.method} ${req.url}`);
  next();
});

app.get('/', (req, res) => {
  res.send('Bonjour le monde !');
});

app.listen(3000, () => console.log('Serveur en écoute'));
```

---

## 4️⃣ Middleware pour un chemin spécifique

```js
app.use('/admin', (req, res, next) => {
  console.log('Middleware pour /admin');
  next();
});
```

* Seules les requêtes dont l’URL commence par `/admin` passent par ce middleware.

---

## 5️⃣ Middleware intégré d’Express

### Parser le JSON

```js
app.use(express.json());
```

* Permet de convertir automatiquement un `body` JSON en objet JavaScript accessible via `req.body`.

### Parser les données URL-encoded

```js
app.use(express.urlencoded({ extended: true }));
```

* Permet de récupérer les données d’un formulaire HTML envoyé en POST.

---

## 6️⃣ Middleware tiers

On peut utiliser des middlewares fournis par des packages npm, comme `cors` ou `helmet` :

```js
const cors = require('cors');
app.use(cors()); // permet les requêtes cross-origin
```

---

## 7️⃣ Middleware d’erreur

Un middleware d’erreur a **4 arguments** :

```js
app.use((err, req, res, next) => {
  console.error(err.stack);
  res.status(500).send('Erreur serveur !');
});
```

* Il est appelé automatiquement quand une erreur est passée avec `next(err)`.

---

## 8️⃣ Ordre d’exécution

* Les middlewares sont exécutés **dans l’ordre où ils sont déclarés**.
* Un middleware doit appeler `next()` pour que la requête continue vers le prochain middleware ou vers la route.
* Si `next()` n’est pas appelé, la requête reste bloquée.

---

## 9️⃣ Résumé

* **Middleware** = fonction exécutée lors d’une requête HTTP.
* Peut être global ou spécifique à un chemin.
* Peut modifier `req`, `res` ou effectuer des actions comme logger, parser ou sécuriser.
* Ordre d’exécution important, `next()` doit être appelé pour continuer.
* Middleware d’erreur = 4 arguments `(err, req, res, next)`.
