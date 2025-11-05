# Le Type MIME (Media Type)

Le **type MIME** (Multipurpose Internet Mail Extensions), ou **Media Type**, est un standard qui permet de **décrire le type de contenu** transmis via HTTP ou d'autres protocoles internet. Il indique au client comment **interpréter et traiter les données** reçues.

---

## 1. Rôle du type MIME

* Informer le client (navigateur, application mobile, API) sur le **format des données**.
* Permettre au client de **traiter correctement** la réponse (affichage, téléchargement, parsing JSON, lecture d’image, etc.).
* Éviter les erreurs de rendu ou de traitement.

Exemple : si le serveur envoie du JSON mais ne précise pas `application/json`, le client pourrait interpréter le contenu comme du texte brut.

---

## 2. Comment il est transmis

Le type MIME est défini dans le **header HTTP `Content-Type`** de la réponse.

```http
HTTP/1.1 200 OK
Content-Type: application/json

{
  "message": "Hello world"
}
```

En Node.js / Express :

```js
res.setHeader('Content-Type', 'application/json'); // type MIME
res.send(JSON.stringify({ message: "Hello world" }));
```

---

## 3. Structure d’un type MIME

Un type MIME est composé de deux parties séparées par un `/` :

```
type/sous-type
```

Exemples :

| Type MIME             | Description              |
| --------------------- | ------------------------ |
| `text/plain`          | Texte brut               |
| `text/html`           | Page HTML                |
| `application/json`    | Données JSON             |
| `image/png`           | Image PNG                |
| `image/jpeg`          | Image JPEG               |
| `application/pdf`     | Fichier PDF              |
| `multipart/form-data` | Formulaire avec fichiers |

---

## 4. Types MIME et API REST

Dans une API REST, le type MIME est souvent utilisé pour :

* Indiquer que la réponse est en **JSON** :

```js
res.status(200).json({ id: 1, name: "Pikachu" });
```

* Indiquer qu’un fichier est une **image** ou un **PDF** lors d’un téléchargement.

---

## 5. Bonnes pratiques

* Toujours définir le type MIME pour éviter les ambiguïtés.
* Utiliser `application/json` pour les réponses d’API REST.
* Pour les fichiers, utiliser le type MIME correspondant pour que le navigateur sache comment les gérer.

---

### Exemple concret

```js
const express = require('express');
const app = express();

app.get('/api/pokemon', (req, res) => {
    const pokemons = [{ id: 1, name: "Pikachu" }];
    res.setHeader('Content-Type', 'application/json'); // type MIME
    res.send(JSON.stringify(pokemons));
});

app.listen(3000, () => console.log('Server running on http://localhost:3000'));
```

---

**Résumé** :
Le type MIME est essentiel pour **communiquer le format des données** entre serveur et client, assurer une **interprétation correcte** des réponses, et éviter des erreurs ou malentendus lors du traitement des données.
