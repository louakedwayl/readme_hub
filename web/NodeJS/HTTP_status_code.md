# Les Codes de Retour HTTP

Les **codes de retour HTTP** (ou **codes de statut HTTP**) sont des nombres renvoyés par un serveur pour indiquer le **résultat d’une requête** faite par un client (navigateur, application, API). Ces codes permettent au client de savoir si la requête a réussi, échoué, ou nécessite une action supplémentaire.

---

## 1. Structure d’un code HTTP

Un code HTTP est un nombre à **3 chiffres**, classé en 5 grandes catégories selon la première chiffre :

| Classe | Plage   | Signification  | Exemple                            |
| ------ | ------- | -------------- | ---------------------------------- |
| 1xx    | 100-199 | Information    | `100 Continue`                     |
| 2xx    | 200-299 | Succès         | `200 OK`, `201 Created`            |
| 3xx    | 300-399 | Redirection    | `301 Moved Permanently`            |
| 4xx    | 400-499 | Erreur client  | `400 Bad Request`, `404 Not Found` |
| 5xx    | 500-599 | Erreur serveur | `500 Internal Server Error`        |

---

## 2. Codes les plus courants

### 2.1 Codes de succès (2xx)

* **200 OK** : La requête a réussi et le serveur renvoie la réponse attendue.
* **201 Created** : Une ressource a été créée avec succès (souvent après un POST).
* **204 No Content** : La requête a réussi mais il n’y a pas de contenu à renvoyer.

### 2.2 Redirections (3xx)

* **301 Moved Permanently** : La ressource a été déplacée définitivement.
* **302 Found** : La ressource est temporairement disponible à une autre URL.
* **304 Not Modified** : La ressource n’a pas changé depuis la dernière requête (cache).

### 2.3 Erreurs client (4xx)

* **400 Bad Request** : Requête invalide ou mal formée.
* **401 Unauthorized** : Authentification requise.
* **403 Forbidden** : Accès interdit, même si authentifié.
* **404 Not Found** : Ressource demandée introuvable.
* **405 Method Not Allowed** : Méthode HTTP non autorisée sur la ressource.

### 2.4 Erreurs serveur (5xx)

* **500 Internal Server Error** : Erreur interne du serveur.
* **502 Bad Gateway** : Serveur intermédiaire a reçu une réponse invalide.
* **503 Service Unavailable** : Le serveur est temporairement indisponible.

---

## 3. Utilisation dans Node.js / Express

En Express, on définit le code de retour avec `res.status(code)` :

```js
// Succès
res.status(200).send('OK');

// Création d'une ressource
res.status(201).json({ id: 1, name: 'Pikachu' });

// Ressource non trouvée
res.status(404).send('Pokemon non trouvé');

// Erreur serveur
res.status(500).send('Erreur interne du serveur');
```

### Exemple complet :

```js
app.get('/api/pokemon/:id', (req, res) => {
    const pokemon = pokemons.find(p => p.id === parseInt(req.params.id));
    if (!pokemon) return res.status(404).send('Pokemon non trouvé');
    res.status(200).json(pokemon);
});
```

---

## 4. Bonnes pratiques

* Toujours renvoyer un **code HTTP correct** pour chaque situation.
* Accompagner le code HTTP d’un **message clair** pour faciliter le débogage.
* Pour les API REST, utiliser principalement 2xx pour succès, 4xx pour erreur client, 5xx pour erreur serveur.

---

**Résumé** :
Les codes HTTP sont essentiels pour la communication entre client et serveur. Ils permettent de savoir rapidement si la requête a réussi, échoué, ou si une action supplémentaire est nécessaire.
