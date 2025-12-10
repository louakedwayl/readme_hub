# 📘 Cours : Les requêtes HTTP

## 👨‍💻 1. Qu'est-ce qu'une requête HTTP ?

HTTP est le protocole utilisé par les navigateurs, les API et les
serveurs pour communiquer entre eux.

Une requête HTTP est un message envoyé par un client vers un serveur.

    GET /index.html HTTP/1.1
    Host: www.exemple.com

------------------------------------------------------------------------

## 🧱 2. Structure d'une requête HTTP

Une requête HTTP contient **3 parties** :

1.  **Request Line**
2.  **Headers**
3.  **Body** (optionnel)

------------------------------------------------------------------------

## 🔹 1) Request Line

    METHODE   CHEMIN   VERSION

Exemple :

    GET /produits?id=4 HTTP/1.1

------------------------------------------------------------------------

## 🔹 2) Les Headers

Exemple :

    Host: www.exemple.com
    User-Agent: Mozilla/5.0
    Accept: text/html
    Cookie: session=abc123

------------------------------------------------------------------------

## 🔹 3) Le Body (corps)

Utilisé avec POST, PUT, PATCH.

Exemples :

### JSON

    {
      "email": "test@gmail.com",
      "password": "1234"
    }

### Formulaire

    username=wayl&password=secret

------------------------------------------------------------------------

## 🚦 3. Les principales méthodes HTTP

### GET

Demande une ressource. Pas de body.

### POST

Envoie des données (formulaire, connexion, API).

### PUT

Modifie entièrement une ressource.

### PATCH

Modifie partiellement.

### DELETE

Supprime une ressource.

### OPTIONS

Demande les permissions du serveur (CORS).

------------------------------------------------------------------------

## 📦 4. Paramètres d'URL

    GET /recherche?ville=Paris&tri=asc

------------------------------------------------------------------------

## 🔄 5. Exemple complet d'une requête HTTP

    POST /login HTTP/1.1
    Host: www.site.com
    Content-Type: application/json
    Content-Length: 45

    {
      "email": "test@gmail.com",
      "password": "1234"
    }

------------------------------------------------------------------------

## 🧠 6. Réponse HTTP

    HTTP/1.1 200 OK
    Content-Type: text/html

    <h1>Bienvenue !</h1>

------------------------------------------------------------------------

## 📊 7. Codes de statut

-   200 OK\
-   201 Créé\
-   301 Redirection\
-   400 Mauvaise requête\
-   401 Non authentifié\
-   403 Interdit\
-   404 Non trouvé\
-   500 Erreur serveur

------------------------------------------------------------------------

## 🧩 8. Résumé

| Élément       | Obligatoire | Rôle                 |
|---------------|-------------|----------------------|
| Request Line  | Oui         | Définir la requête   |
| Headers       | Oui         | Infos supplémentaires|
| Body          | Non         | Données envoyées     |

------------------------------------------------------------------------
