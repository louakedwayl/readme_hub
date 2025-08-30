# 🕹️ Stockage côté client dans les jeux web

Dans les applications web et les jeux, le stockage côté client permet de **sauvegarder des données directement dans le navigateur**, sans avoir besoin d’aller à chaque fois vers le serveur. Cela peut concerner l’état d’un jeu, les préférences utilisateur ou des informations temporaires pour l’application.

Les principaux types de stockage côté client sont **cookies**, **localStorage** et **sessionStorage**.

---

## 1️⃣ Cookies

- **Objectif** : Principalement pour la gestion des sessions côté serveur et l’authentification, mais peuvent aussi servir à stocker de petites informations côté client.
- **Caractéristiques** :
  - Envoyés automatiquement avec chaque requête HTTP vers le serveur.
  - Taille limite ~4 Ko.
  - Peuvent être HttpOnly, Secure, SameSite.
- **Cas d’usage général** :
  - Authentification et gestion de session.
  - Préférences utilisateur simples (langue, thème).
  - Suivi et analytics.
- **Cas d’usage dans les jeux** :
  - Rarement pour l’état du jeu, sauf si le serveur doit suivre la session du joueur.

---

## 2️⃣ localStorage

- **Objectif** : Stockage persistant côté client pour les données volumineuses ou à conserver entre sessions.
- **Caractéristiques** :
  - Stockage clé-valeur accessible via JavaScript.
  - Persiste même après la fermeture du navigateur ou de l’onglet.
  - Taille limite ~5 Mo.
  - Non envoyé automatiquement au serveur.
- **Cas d’usage général** :
  - Préférences avancées de l’utilisateur (thème, paramètres).
  - Données volumineuses qui n’ont pas besoin d’être envoyées au serveur.
- **Cas d’usage dans les jeux** :
  - Sauvegarder la progression du joueur, scores, ou position de la raquette dans Pong.

```js
// Exemple : sauvegarder la position de la raquette
localStorage.setItem("paddlePosition", 120);

// Récupérer la position
const position = localStorage.getItem("paddlePosition");
```
## 3️⃣ sessionStorage

### Objectif : Stockage temporaire limité à l’onglet ou la fenêtre en cours.

### Caractéristiques :

- Accessible via JavaScript.

- Effacé à la fermeture de l’onglet/fenêtre.

- Taille limite ~5 Mo.

### Cas d’usage général :

Informations temporaires pendant une session (panier temporaire, formulaire en cours).

Données qui n’ont pas besoin de persister après fermeture de l’onglet.

### Cas d’usage dans les jeux :

Suivi temporaire de l’état du jeu, score en cours ou position d’objets pour la session actuelle.

```js
// Exemple : sauvegarder la position de la raquette pour la session en cours
sessionStorage.setItem("paddlePosition", 120);

// Récupérer la position
const position = sessionStorage.getItem("paddlePosition");
```

## 4️⃣ Tableau récapitulatif

| Stockage        | Persistance         | Accessible par JS | Envoyé au serveur | Cas d’usage général                         | Cas d’usage dans les jeux                             |
|-----------------|---------------------|------------------|-------------------|---------------------------------------------|-------------------------------------------------------|
| **Cookies**     | Selon `expires`     | Oui (sauf HttpOnly) | Oui               | Sessions, authentification, suivi           | Rare, suivi de session côté serveur                   |
| **localStorage**| Permanent           | Oui              | Non               | Préférences, données volumineuses           | Progression joueur, état du jeu entre sessions        |
| **sessionStorage** | Onglet/fenêtre   | Oui              | Non               | Informations temporaires                    | État temporaire du jeu pendant la session             |


### Recommandations

Pour un jeu web comme Pong : localStorage pour la position de la raquette et l’état persistant, sessionStorage pour l’état temporaire.

Pour applications web en général :

Cookies → sessions et authentification.

localStorage → préférences persistantes et données volumineuses côté client.

sessionStorage → informations temporaires liées à la session de l’utilisateur.
