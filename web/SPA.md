# Cours : Single Page Application (SPA)

## 1️⃣ Définition

Une **SPA (Single Page Application)** est une application web qui fonctionne sur **une seule page HTML**, où **le contenu est mis à jour dynamiquement** sans recharger entièrement la page.
Contrairement aux applications web classiques (multi-page), une SPA communique avec le serveur principalement via des **API (souvent REST ou GraphQL)** pour récupérer ou envoyer des données.

---

## 2️⃣ Principe de fonctionnement

1. Le navigateur charge **une seule page HTML**, souvent très simple.
2. Le **JavaScript côté client** prend le relais pour gérer l’interface.
3. Les interactions utilisateur (clics, formulaires…) sont captées par le JS.
4. Le JS effectue des **requêtes vers le serveur** pour récupérer ou envoyer des données.
5. Le DOM est mis à jour **sans recharger la page**, donnant une expérience fluide proche d’une application native.

---

## 3️⃣ Avantages des SPA

* **Fluidité et rapidité** : pas de rechargement complet des pages.
* **Expérience utilisateur améliorée** : transitions et interactions instantanées.
* **Réduction de la charge serveur** : seules les données sont envoyées, pas la page entière.
* **Possibilité de créer des applications mobiles hybrides** avec le même code front-end (React Native, Ionic…).

---

## 4️⃣ Inconvénients des SPA

* **SEO plus compliqué** : les moteurs de recherche ont parfois du mal à indexer les contenus générés dynamiquement.
* **Chargement initial plus long** : la page unique peut être lourde à charger.
* **Complexité côté client** : toute la logique de routage et de rendu est gérée en JavaScript.
* **Gestion de l’historique et des URLs** : nécessite l’usage du **History API** ou de librairies de routing.

---

## 5️⃣ Technologies courantes pour les SPA

* **Frameworks / Bibliothèques JS** :

  * React.js
  * Vue.js
  * Angular
  * Svelte

* **Gestion du routage côté client** :

  * React Router
  * Vue Router
  * Angular Router

* **Communication avec le serveur** :

  * `fetch` ou `axios` pour les API REST
  * GraphQL pour des requêtes plus flexibles

---

## 6️⃣ Exemple simple de SPA (pseudo-code)

```js
// index.html
<body>
  <div id="app"></div>
  <script src="app.js"></script>
</body>
```

```js
// app.js
const app = document.getElementById('app');

// Fonction pour afficher la page d'accueil
function showHome() {
  app.innerHTML = `<h1>Accueil</h1>
                   <button onclick="showProfile()">Profil</button>`;
}

// Fonction pour afficher la page profil
function showProfile() {
  fetch('/api/user')
    .then(res => res.json())
    .then(user => {
      app.innerHTML = `<h1>Profil de ${user.name}</h1>
                       <button onclick="showHome()">Accueil</button>`;
    });
}

// Initialisation
showHome();
```

**Explication** :

* Le HTML de base reste une seule page (`index.html`).
* Toutes les interactions et changements de contenu sont gérés par **JavaScript**.
* Les données sont récupérées depuis le serveur via des **API**.

---

## 7️⃣ SPA vs Applications Multi-page (MPA)

| Critère                | SPA                                  | MPA                            |
| ---------------------- | ------------------------------------ | ------------------------------ |
| Nombre de pages HTML   | 1                                    | Plusieurs                      |
| Chargement             | Dynamique, sans rechargement complet | Chaque action recharge la page |
| Expérience utilisateur | Fluide                               | Moins fluide                   |
| SEO                    | Plus compliqué                       | Simple                         |
| Complexité JS          | Élevée                               | Faible                         |

---

## 8️⃣ Bonnes pratiques pour les SPA

* Séparer **logique de présentation** et **logique métier**.
* Utiliser un **router** pour gérer les URLs.
* Charger les données **asynchrones** pour ne pas bloquer l’affichage.
* Gérer le **SEO et le rendu côté serveur** si nécessaire (SSR – Server-Side Renderin
