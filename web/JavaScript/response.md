# Response en JavaScript

En JavaScript, l'objet **`Response`** représente la réponse à une requête HTTP, souvent utilisée avec l'API **Fetch**.

---

## 1. Exemple d'utilisation

```javascript
fetch('https://jsonplaceholder.typicode.com/users')
  .then(response => {
    console.log(response);
  })
  .catch(error => {
    console.error('Erreur:', error);
  });
```

Dans cet exemple, `response` est un objet `Response`.

---

## 2. Propriétés principales

| Propriété      | Description |
|----------------|-------------|
| `status`       | Le code HTTP renvoyé (ex: 200, 404, 500) |
| `statusText`   | Le texte associé au code HTTP (ex: "OK", "Not Found") |
| `headers`      | Les en-têtes HTTP renvoyés par le serveur |
| `ok`           | Booléen, true si le statut est entre 200 et 299 |
| `type`         | Type de la réponse : `"basic"`, `"cors"`, `"error"`, `"opaque"` |
| `url`          | URL finale après redirections éventuelles |

---

## 3. Méthodes utiles

| Méthode                  | Description |
|---------------------------|-------------|
| `response.json()`         | Lit le corps et renvoie une promesse résolue en objet JSON |
| `response.text()`         | Lit le corps et renvoie une chaîne de caractères |
| `response.blob()`         | Lit le corps et renvoie un Blob (utile pour fichiers) |
| `response.clone()`        | Clone la réponse pour la lire plusieurs fois |

### Exemple pratique

```javascript
fetch('https://jsonplaceholder.typicode.com/users')
  .then(response => {
    if (response.ok) {
      return response.json();
    } else {
      throw new Error('Erreur HTTP : ' + response.status);
    }
  })
  .then(data => {
    console.log('Données reçues:', data);
  })
  .catch(error => {
    console.error(error);
  });
```

---

## 4. Types de réponse (`response.type`)

- `"basic"` → réponse normale provenant du même domaine.  
- `"cors"` → réponse provenant d’un domaine différent avec CORS autorisé.  
- `"error"` → réponse réseau échouée (ex: pas de connexion).  
- `"opaque"` → réponse d’un autre domaine, sans accès aux données (ex: requête cross-origin sans CORS).

---

## 5. Méthode `json()` de l'objet Response

La méthode **`response.json()`** permet de **lire le corps d'une réponse HTTP et de le transformer en objet JavaScript**.  

- Elle retourne une **promesse**, donc il faut utiliser **`await`** ou **`.then()`** pour accéder aux données.  
- Très pratique pour récupérer directement le contenu JSON d'une API.

### Exemple avec `.then()`

```javascript
fetch('https://jsonplaceholder.typicode.com/users')
  .then(response => response.json()) // transforme le corps en JSON
  .then(data => {
    console.log('Données reçues :', data);
  })
  .catch(error => console.error(error));
```

### Exemple avec async/await

```javascript
async function getUsers() {
    try {
        const response = await fetch('https://jsonplaceholder.typicode.com/users');
        const data = await response.json(); // lit le JSON directement
        console.log(data);
    } catch (error) {
        console.error(error);
    }
}

getUsers();
```

### . Astuce :
 
.json() ne lit que le corps de la réponse. Pour vérifier le succès de la requête, il est souvent utile de contrôler response.ok ou response.status avant d’appeler .json().

## 6. Conclusion

L'objet **`Response`** est essentiel pour travailler avec **Fetch** et manipuler les réponses HTTP. Il permet :
- de vérifier le statut de la requête,
- de lire les données reçues,
- de gérer les erreurs réseau ou serveur.
