# Méthode `.put()` en Express.js

## 1. Qu'est ce que la méthode PUT ?

La méthode **HTTP PUT** sert à **mettre à jour** ou **remplacer** une ressource sur un serveur.

En REST, on utilise généralement :

* **PUT** pour mettre à jour totalement une ressource.
* **PATCH** pour mettre à jour partiellement.

## 2. Le rôle de `.put()` dans Express

En Express.js, `.put()` sert à définir une **route qui répond aux requêtes HTTP PUT**.

```js
app.put('/api/pokemon/:id', (req, res) => {
  // logique ici
})
```

Cette route sera appelée quand un client enverra une requête PUT vers `/api/pokemon/17` par exemple.

## 3. Anatomie d'une route PUT

```js
app.put('/api/pokemon/:id', (req, res) => {
  const id = parseInt(req.params.id, 10);
  const data = req.body; // les données envoyées par le client

  // traitement logique

  res.status(200).json({ message: 'Ressource mise à jour', data });
});
```

### Les éléments importants

* **req.params.id**: récupère l'identifiant dans l'URL
* **req.body**: contient les nouvelles données envoyées par le client
* **res.status(...).json(...)**: renvoie la réponse au client

## 4. Exemple complet

Imaginons une liste de pokémons :

```js
const express = require('express');
const app = express();
app.use(express.json());

let pokemons = [
  { id: 1, name: 'Bulbizarre' },
  { id: 2, name: 'Salamèche' }
];

app.put('/api/pokemon/:id', (req, res) => {
  const id = parseInt(req.params.id, 10);
  const index = pokemons.findIndex(p => p.id === id);

  if (index === -1) {
    return res.status(404).json({ message: 'Pokemon non trouvé' });
  }

  const updatedPokemon = { id, ...req.body };
  pokemons[index] = updatedPokemon;

  res.json({ message: 'Pokemon mis à jour', data: updatedPokemon });
});

app.listen(3000);
```

## 5. Différence PUT vs PATCH

| Méthode   | Description                                                       |
| --------- | ----------------------------------------------------------------- |
| **PUT**   | Remplace toute la ressource (si une clé manque, elle est perdue). |
| **PATCH** | Modifie seulement certaines propriétés.                           |

## 6. Tester une requête PUT

Tu peux utiliser :

* **Postman**
* **Insomnia**
* **curl**

Exemple curl :

```bash
curl -X PUT -H "Content-Type: application/json" \
-d '{"name":"Carapuce"}' \
http://localhost:3000/api/pokemon/1
```

## 7. Points importants à retenir

* `.put()` correspond à la méthode HTTP PUT.
* Sert principalement à **mettre à jour une ressource existante**.
* Nécessite souvent `express.json()` pour lire le body JSON.
* En REST, PUT = mise à jour complète.

Fin du cours.
