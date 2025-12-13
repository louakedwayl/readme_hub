# 🌐 Cours : Protocole HTTP / HTTPS et les requêtes HTTP

## 1. Introduction
- **HTTP** (HyperText Transfer Protocol) : protocole de communication entre un **client** (navigateur, application) et un **serveur** (site web, API).
- **HTTPS** : version sécurisée de HTTP, où les échanges sont chiffrés grâce au protocole **TLS/SSL**.
- Utilisé pour :
- Consulter des sites web
- Envoyer des données (formulaires, API REST)
- Télécharger ou téléverser des fichiers

---

## 2. Fonctionnement général
1. Le **client** envoie une **requête HTTP** au serveur.
2. Le **serveur** traite la requête et renvoie une **réponse HTTP**.
3. La réponse contient généralement :
- Un **code de statut** (succès, erreur, redirection…)
- Des **en-têtes** (headers)
- Un **corps** (HTML, JSON, image, etc.)

---

## 3. Structure d'une requête HTTP
Une requête HTTP est composée de 3 parties :

### 🔹 1. Ligne de requête
```shell
<Méthode> <Ressource> <Version>
```
Exemple :
```shell
GET /index.html HTTP/1.1
```
### 🔹 2. En-têtes (headers)
- Fournissent des informations supplémentaires :
- `Host: www.exemple.com`
- `User-Agent: Mozilla/5.0`
- `Accept: text/html`

### 🔹 3. Corps (body)
- Contient des données (présent uniquement pour certaines méthodes comme `POST` ou `PUT`).
- Exemple : données d’un formulaire ou JSON envoyé à une API.

---

## 4. Les principales méthodes HTTP
- **GET** : récupérer une ressource (lecture).
- **POST** : envoyer des données (création).
- **PUT** : mettre à jour une ressource (remplacement).
- **PATCH** : modifier partiellement une ressource.
- **DELETE** : supprimer une ressource.
- **HEAD** : comme GET mais sans le corps (uniquement les en-têtes).
- **OPTIONS** : demande les méthodes supportées par le serveur.

---

## 5. Structure d'une réponse HTTP

Une réponse HTTP est composée de 3 parties :

### 1. Ligne de statut

```shell
<Version> <Code statut> <Message>
```
Exemple :
```shell
HTTP/1.1 200 OK
```
### 2. En-têtes (headers)
- Informations sur la réponse :
- `Content-Type: text/html`
- `Content-Length: 1234`
- `Set-Cookie: id=42`

### 3. Corps (body)
- Contient la ressource demandée : HTML, JSON, image, etc.

---

## 6. Codes de statut HTTP

### **1xx** : Information
### **2xx** : Succès  
- `200 OK` → succès
- `201 Created` → ressource créée
### **3xx** : Redirection  
- `301 Moved Permanently`
- `302 Found`
### **4xx** : Erreur côté client  
- `400 Bad Request`
- `401 Unauthorized`
- `403 Forbidden`
- `404 Not Found`
### **5xx** : Erreur côté serveur  
- `500 Internal Server Error`
- `503 Service Unavailable`

---

## 7. Différence HTTP vs HTTPS
| HTTP | HTTPS |
|------|-------|
| Pas sécurisé (données en clair) | Sécurisé (chiffrement TLS/SSL) |
| Port par défaut : `80` | Port par défaut : `443` |
| Susceptible aux attaques (MITM, sniffing) | Garantit **confidentialité**, **intégrité** et **authenticité** |

---

## 8. Exemple complet

### Requête envoyée par le client
```shell
GET /page.html HTTP/1.1
Host: www.exemple.com

User-Agent: Mozilla/5.0
Accept: text/html
```
### Réponse du serveur

```shell
HTTP/1.1 200 OK
Content-Type: text/html
Content-Length: 1256
<html> <head><title>Exemple</title></head> <body><h1>Bonjour !</h1></body> </html> 
```
## 9. Conclusion

HTTP/HTTPS est la base de la communication web.

Les requêtes permettent au client d’interagir avec le serveur.

HTTPS est indispensable aujourd’hui pour garantir la sécurité des échanges.
