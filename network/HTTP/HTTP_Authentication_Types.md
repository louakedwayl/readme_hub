# 🔐 Les différents types d’authentification en HTTP

## 🎯 Objectif du cours

Comprendre **comment HTTP gère l’authentification**, quels sont les **mécanismes existants**, leurs **forces / faiblesses**, et **comment les reconnaître**, notamment en **CTF, sécurité et pentest**.

---

## 1️⃣ Rappel : HTTP est *stateless*

HTTP **ne se souvient de rien** entre deux requêtes.
➡️ L’authentification doit donc être **envoyée à chaque requête** (headers, cookies, tokens).

---

## 2️⃣ Authentification HTTP Basic

### 🔹 Principe

* Le serveur demande une authentification via un header HTTP
* Le client envoie `username:password` **encodé en Base64**

### 🔹 Flux

1. Client → requête
2. Serveur → `401 Unauthorized`

   ```http
   WWW-Authenticate: Basic realm="Restricted"
   ```
3. Client → renvoie :

   ```http
   Authorization: Basic dXNlcjpwYXNz
   ```

### 🔹 Caractéristiques

* Très simple
* Popup automatique navigateur
* Mot de passe **non chiffré** (juste encodé)

### 🔹 Avantages / Inconvénients

✅ Facile à mettre en place
❌ Dangereux sans HTTPS

### 🔹 Usage typique

* Apache + `.htaccess`
* Challenges Root-Me

---

## 3️⃣ Authentification HTTP Digest

### 🔹 Principe

* Le mot de passe **n’est jamais envoyé directement**
* Utilise un **hash + nonce** fourni par le serveur

### 🔹 Header serveur

```http
WWW-Authenticate: Digest realm="Secure", nonce="xyz"
```

### 🔹 Caractéristiques

* Plus sécurisé que Basic
* Toujours une popup navigateur
* Moins utilisé aujourd’hui

### 🔹 Avantages / Inconvénients

✅ Mot de passe non envoyé en clair
❌ Complexe, peu supporté

---

## 4️⃣ Authentification par formulaire (Form-Based)

### 🔹 Principe

* Page HTML avec formulaire (`POST`)
* Le serveur crée une **session**
* Le client reçoit un **cookie de session**

### 🔹 Exemple

```html
<form method="POST">
  <input name="username">
  <input name="password">
</form>
```

### 🔹 Caractéristiques

* Très courant sur le web
* Pas de popup navigateur
* Basé sur cookies

### 🔹 Failles courantes

* Session fixation
* Cookie mal protégé
* CSRF

---

## 5️⃣ Authentification Bearer / Token

### 🔹 Principe

* Le client envoie un **token** à chaque requête

### 🔹 Header

```http
Authorization: Bearer eyJhbGciOi...
```

### 🔹 Types de tokens

* JWT
* API Key
* Token opaque

### 🔹 Usage

* APIs REST
* Applications modernes

---

## 6️⃣ OAuth / OAuth2

### 🔹 Principe

* Authentification via un **tiers** (Google, GitHub, etc.)
* Délégation d’accès

### 🔹 Étapes simplifiées

1. Redirection vers le provider
2. Autorisation utilisateur
3. Retour avec un token

### 🔹 Usage

* Login "Se connecter avec Google"

---

## 7️⃣ Authentification par certificat client (TLS)

### 🔹 Principe

* Le client présente un **certificat SSL**
* Le serveur vérifie l’identité

### 🔹 Usage

* Environnements internes
* Sécurité élevée

---

## 8️⃣ Comment reconnaître le type d’authentification ?

### 🔍 Indices visuels

| Indice               | Type probable  |
| -------------------- | -------------- |
| Popup navigateur     | Basic / Digest |
| Formulaire HTML      | Form-Based     |
| Header Authorization | Token / Bearer |

### 🔍 Indices HTTP

* `WWW-Authenticate` → auth serveur
* Cookies → auth applicative

---

## 9️⃣ Tableau récapitulatif

| Type       | Header                | Sécurité     | Popup |
| ---------- | --------------------- | ------------ | ----- |
| Basic      | Authorization: Basic  | ❌ faible     | ✅     |
| Digest     | Authorization: Digest | ⚠️ moyenne   | ✅     |
| Form       | POST + Cookie         | ⚠️ variable  | ❌     |
| Bearer     | Authorization: Bearer | ✅ bonne      | ❌     |
| OAuth2     | Bearer Token          | ✅ bonne      | ❌     |
| Certificat | TLS                   | ✅ très forte | ⚠️    |

---

## 10️⃣ Spécial CTF / Sécurité

### 🔑 Règles d’or

* Popup ≠ JavaScript
* Auth HTTP = headers
* Toujours analyser les **réponses serveur**

### 🔍 Attaques fréquentes

* Fuite `.htpasswd`
* Mauvaise config Apache
* Token mal vérifié

---

## ✅ Conclusion

HTTP propose plusieurs mécanismes d’authentification, du plus simple (Basic) au plus robuste (certificats, OAuth).

👉 En sécurité et en CTF, **le plus important est de savoir les reconnaître rapidement**.
