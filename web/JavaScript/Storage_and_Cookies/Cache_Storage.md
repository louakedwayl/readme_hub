# Le Cache Storage en JavaScript

## 1. Introduction

Le **Cache Storage API** (souvent appelé *Cache API*) est une
fonctionnalité fournie par les navigateurs modernes qui permet de
stocker **des requêtes HTTP et leurs réponses**.\
C'est une technologie clé des **Progressive Web Apps (PWA)** et des
**Service Workers**, car elle permet :\
- de **charger plus rapidement** certaines ressources,\
- de rendre une application disponible **hors ligne (offline)**,\
- de **réduire les requêtes réseau** inutiles.

------------------------------------------------------------------------

## 2. Différence avec les autres stockages

-   Contrairement au `localStorage` ou au `sessionStorage`, le Cache
    Storage **ne stocke pas des paires clé/valeur**, mais des **requêtes
    et leurs réponses HTTP** (fichiers HTML, CSS, JS, images, etc.).
-   Contrairement aux cookies, les données du Cache Storage **ne sont
    pas envoyées automatiquement au serveur**.
-   Le Cache Storage est **asynchrone** et fonctionne avec des
    **Promises**.

------------------------------------------------------------------------

## 3. Structure de l'API

L'API du Cache Storage est composée de deux objets principaux :

1.  **`caches`** → l'objet global qui permet d'accéder aux différents
    caches.\
2.  **`Cache`** → représente un cache unique (une sorte de "dossier")
    dans lequel on peut stocker des requêtes et leurs réponses.

------------------------------------------------------------------------

## 4. Méthodes principales

### 🔹 Sur l'objet `caches`

-   **`caches.open(name)`** → ouvre ou crée un cache nommé.
-   **`caches.keys()`** → liste les noms de tous les caches.
-   **`caches.delete(name)`** → supprime un cache entier.

### 🔹 Sur un objet `Cache`

-   **`cache.add(request)`** → télécharge et stocke une ressource.
-   **`cache.addAll([urls])`** → ajoute plusieurs ressources.
-   **`cache.put(request, response)`** → insère manuellement une requête
    et une réponse.
-   **`cache.match(request)`** → cherche si une ressource est déjà en
    cache.
-   **`cache.delete(request)`** → supprime une ressource spécifique.

------------------------------------------------------------------------

## 5. Exemple d'utilisation en JavaScript

### 🔹 Mettre une ressource en cache

``` javascript
caches.open("mon-cache").then(cache => {
  cache.add("/style.css"); // télécharge et stocke style.css
});
```

### 🔹 Récupérer une ressource du cache

``` javascript
caches.open("mon-cache").then(cache => {
  cache.match("/style.css").then(response => {
    if (response) {
      console.log("Trouvé dans le cache !");
    } else {
      console.log("Pas trouvé, requête réseau nécessaire.");
    }
  });
});
```

### 🔹 Ajouter plusieurs ressources

``` javascript
caches.open("mon-cache").then(cache => {
  return cache.addAll([
    "/index.html",
    "/style.css",
    "/script.js",
    "/logo.png"
  ]);
});
```

### 🔹 Supprimer une ressource

``` javascript
caches.open("mon-cache").then(cache => {
  cache.delete("/logo.png");
});
```

### 🔹 Supprimer un cache entier

``` javascript
caches.delete("mon-cache").then(success => {
  if (success) console.log("Cache supprimé !");
});
```

------------------------------------------------------------------------

## 6. Cas d'utilisation typiques

-   **Applications web hors ligne** → stocker des pages et ressources
    critiques pour qu'elles restent accessibles sans Internet.\
-   **Optimisation des performances** → éviter de retélécharger des
    fichiers inchangés.\
-   **PWA (Progressive Web Apps)** → fournir une meilleure expérience
    utilisateur, proche d'une application native.

------------------------------------------------------------------------

## 7. Limites et précautions

-   Le stockage est **limité** (plusieurs dizaines à centaines de Mo
    selon le navigateur, mais pas infini).\
-   Il faut **gérer la mise à jour des caches** (sinon l'utilisateur
    peut rester avec des versions obsolètes).\
-   L'API est **asynchrone** → nécessite d'utiliser Promises ou
    `async/await`.\
-   Disponible uniquement dans les **navigateurs modernes** (pas
    supporté dans certains contextes).

------------------------------------------------------------------------

## 8. Conclusion

Le **Cache Storage** est un outil puissant pour améliorer la rapidité et
la fiabilité des applications web.\
Avec les méthodes fournies par l'API (`add`, `match`, `delete`, etc.),
il est possible de créer des expériences **offline-first** et
d'optimiser le chargement des ressources côté client.
