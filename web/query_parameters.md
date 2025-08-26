# Les Query Parameters (Paramètres de Requête) en URL

Les **query parameters** sont des informations supplémentaires ajoutées à une URL pour **personnaliser ou filtrer la réponse** d’un serveur.

---

## 1. Syntaxe générale

Une URL avec query parameters se présente ainsi :

https://exemple.com/ressource?param1=valeur1&param2=valeur2


- `?` : indique le **début des paramètres de requête**.  
- `param1=valeur1` : premier paramètre et sa valeur.  
- `&` : sépare plusieurs paramètres.  
- `param2=valeur2` : deuxième paramètre et sa valeur.  

---

### Exemple concret

URL :  

https://jsonplaceholder.typicode.com/posts?_limit=5&_page=2


- `_limit=5` → limite la réponse à 5 éléments.  
- `_page=2` → récupère la **deuxième page** des résultats.  

---

## 2. Récupérer les query parameters avec JavaScript

### 2.1 Depuis `window.location`
```js
// URL = https://exemple.com/page.html?user=123&theme=dark
const params = new URLSearchParams(window.location.search);

console.log(params.get("user"));  // "123"
console.log(params.get("theme")); // "dark"
```
## 2.2 Construire une URL avec query parameters

```js
const url = new URL("https://api.exemple.com/posts");
url.searchParams.append("_limit", 5);
url.searchParams.append("_page", 2);

console.log(url.toString());
// https://api.exemple.com/posts?_limit=5&_page=2
```
## 3. Utilisation avec fetch pour les API

```js
fetch("https://jsonplaceholder.typicode.com/posts?_limit=5&_page=2")
.then(response => response.json())
.then(data => console.log(data));
```

L’API lit les paramètres et filtre ou limite la réponse.

Les paramètres rendent les requêtes dynamiques et flexibles.

## 4. Bonnes pratiques

Utiliser des noms de paramètres clairs : page, limit, sort.

Encodage des valeurs : si elles contiennent des caractères spéciaux, utiliser encodeURIComponent().

```js
const search = "JS & TS";
const url = `https://api.exemple.com/search?q=${encodeURIComponent(search)}`;
```
Ne pas inclure d’informations sensibles (mot de passe, token) dans l’URL.

## 5. Résumé

Les query parameters sont ajoutés après le ? dans une URL.

Ils servent à filtrer, trier, paginer ou personnaliser la réponse d’un serveur.

En JavaScript, on peut les lire (URLSearchParams) ou construire dynamiquement pour des requêtes API (fetch).

---
