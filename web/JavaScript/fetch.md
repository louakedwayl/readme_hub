# 📚 Cours : La fonction `fetch` en JavaScript

## 🚀 Introduction

La fonction **`fetch`** est une API intégrée dans JavaScript qui permet
d'effectuer des **requêtes HTTP** (comme GET, POST, PUT, DELETE) afin de
récupérer ou envoyer des données entre un client (navigateur) et un
serveur.

Elle est basée sur les **Promises**, ce qui la rend asynchrone et plus
simple à utiliser que les anciennes méthodes comme **XMLHttpRequest**.

------------------------------------------------------------------------

## 📌 Syntaxe de base

``` javascript
fetch(url, options)
  .then(response => {
    // Vérifie si la requête a réussi
    if (!response.ok) {
      throw new Error("Erreur HTTP : " + response.status);
    }
    return response.json(); // ou response.text(), response.blob(), etc.
  })
  .then(data => {
    console.log("Données reçues :", data);
  })
  .catch(error => {
    console.error("Erreur lors de la requête :", error);
  });
```

------------------------------------------------------------------------

## 🔑 Paramètres

-   **`url`** : L'adresse de la ressource (ex:
    `"https://api.example.com/data"`).
-   **`options`** *(facultatif)* : Un objet qui permet de configurer la
    requête.
    -   `method` : Méthode HTTP (`GET`, `POST`, `PUT`, `DELETE`...).
    -   `headers` : Les en-têtes HTTP (JSON, token d'authentification,
        etc.).
    -   `body` : Le contenu à envoyer (souvent en JSON pour un
        POST/PUT).

------------------------------------------------------------------------

## 📖 Exemples

### 1. Requête GET simple

``` javascript
fetch("https://jsonplaceholder.typicode.com/posts/1")
  .then(response => response.json())
  .then(data => console.log(data));
```

------------------------------------------------------------------------

### 2. Requête POST avec envoi de données

``` javascript
fetch("https://jsonplaceholder.typicode.com/posts", {
  method: "POST",
  headers: {
    "Content-Type": "application/json"
  },
  body: JSON.stringify({
    title: "Mon premier post",
    body: "Ceci est un test",
    userId: 1
  })
})
  .then(response => response.json())
  .then(data => console.log("Réponse du serveur :", data));
```

------------------------------------------------------------------------

### 3. Gestion des erreurs

``` javascript
fetch("https://api.exemple.com/404")
  .then(response => {
    if (!response.ok) {
      throw new Error("Erreur HTTP " + response.status);
    }
    return response.json();
  })
  .catch(error => console.error("Erreur attrapée :", error));
```

------------------------------------------------------------------------

## ⏳ Utilisation avec `async/await`

L'API `fetch` peut être utilisée avec `async/await` pour un style plus
lisible :

``` javascript
async function getData() {
  try {
    const response = await fetch("https://jsonplaceholder.typicode.com/posts/1");
    if (!response.ok) {
      throw new Error("Erreur HTTP " + response.status);
    }
    const data = await response.json();
    console.log("Données :", data);
  } catch (error) {
    console.error("Erreur attrapée :", error);
  }
}

getData();
```

------------------------------------------------------------------------

## ✅ Points clés à retenir

-   `fetch` retourne toujours une **Promise**.
-   Il ne rejette pas automatiquement en cas d'erreur HTTP (404,
    500...), il faut vérifier `response.ok`.
-   Les données doivent être transformées (`response.json()`,
    `response.text()`, etc.) avant d'être utilisées.
-   Compatible avec `async/await` pour écrire un code plus lisible.

------------------------------------------------------------------------

✍️ **Conclusion** :\
`fetch` est aujourd'hui la méthode standard et moderne pour effectuer
des appels réseau en JavaScript. Il est simple, puissant et supporté par
tous les navigateurs modernes.