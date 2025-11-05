# 🌐 Cours : Envoyer des requêtes HTTP avec `curl`

## 🚀 Introduction

`curl` est un outil en ligne de commande qui permet d’envoyer des **requêtes HTTP** à un serveur.  
C’est très utile pour tester une API REST (comme celles que tu crées avec Express.js).

---

## 🧩 1. La syntaxe de base

```bash
curl [options] <URL>
```

---

## 🧰 2. L’option `-X` : spécifier la méthode HTTP

L’option **`-X`** permet de choisir le type de requête HTTP à envoyer :

| Méthode | Description | Exemple |
|----------|--------------|----------|
| `GET` | Lire des données | `curl -X GET http://localhost:3000/api/pokemons` |
| `POST` | Créer une ressource | `curl -X POST http://localhost:3000/api/pokemons` |
| `PUT` | Modifier une ressource | `curl -X PUT http://localhost:3000/api/pokemons/1` |
| `DELETE` | Supprimer une ressource | `curl -X DELETE http://localhost:3000/api/pokemons/1` |

---

## 📨 3. Exemple de requête `POST`

```bash
curl -X POST http://localhost:3000/api/pokemons \
  -H "Content-Type: application/json" \
  -d '{"name": "Evoli"}'
```

### Détails :
- `-X POST` → Méthode utilisée : POST  
- `-H` → Définit un en-tête HTTP (`Content-Type`)  
- `-d` → Contient les données envoyées dans le corps de la requête

---

## 🧠 4. Comportement par défaut de `curl`

- Si tu **n’utilises pas `-X`**, `curl` envoie une requête **GET**.
- Si tu **utilises `-d`**, `curl` devine que tu veux faire un **POST**, même sans `-X POST`.

Exemples :
```bash
curl http://localhost:3000/api/pokemons
# Équivaut à GET

curl -d '{"name":"Evoli"}' -H "Content-Type: application/json" http://localhost:3000/api/pokemons
# Équivaut à POST
```

---

## 📚 5. Tableau récapitulatif

| Méthode | Utilisation | Exemple `curl` |
|----------|--------------|----------------|
| **GET** | Lire une ressource | `curl http://localhost:3000/api/pokemons` |
| **POST** | Créer une ressource | `curl -d '{"name":"Evoli"}' -H "Content-Type: application/json" http://localhost:3000/api/pokemons` |
| **PUT** | Mettre à jour une ressource | `curl -X PUT -H "Content-Type: application/json" -d '{"name":"Evoli"}' http://localhost:3000/api/pokemons/1` |
| **DELETE** | Supprimer une ressource | `curl -X DELETE http://localhost:3000/api/pokemons/1` |

---

## 🧩 6. Astuce pratique

Tu peux aussi ajouter l’option `-i` pour voir les **en-têtes HTTP** de la réponse :

```bash
curl -i http://localhost:3000/api/pokemons
```

---

## 🏁 Conclusion

Avec `curl`, tu peux facilement tester toutes les routes de ton API sans avoir besoin d’un navigateur ou d’un outil graphique comme Postman.
