# 📘 `$_SERVER` en PHP

## 1️⃣ Introduction

`$_SERVER` est modifié automatiquement par le serveur web dès qu'il reçoit la requête.
`$_SERVER` est une **superglobale PHP** qui contient des informations sur :

* la requête HTTP
* le serveur web
* le client (navigateur)

Elle est **disponible partout**, sans avoir besoin de la passer en paramètre.

👉 Indispensable pour :

* routeurs
* frameworks
* APIs
* debug et sécurité

---

## 2️⃣ Superglobale ?

Une superglobale :

* est toujours accessible
* ne nécessite pas `global`
* contient des données système ou serveur

Exemples de superglobales : `$_GET`, `$_POST`, `$_COOKIE`, `$_SESSION`, `$_SERVER`

---

## 3️⃣ Les usages principaux

### 🌐 URL & routing

```php
$_SERVER['REQUEST_URI'];    // URL demandée (chemin + query)
$_SERVER['REQUEST_METHOD']; // GET, POST, etc.
$_SERVER['SCRIPT_NAME'];    // /index.php
$_SERVER['PHP_SELF'];       // fichier PHP exécuté
```

### 🖥️ Serveur

```php
$_SERVER['SERVER_NAME']; // nom du domaine
$_SERVER['SERVER_PORT']; // 80, 443
```

### 🌍 Client (navigateur)

```php
$_SERVER['HTTP_USER_AGENT']; // navigateur
$_SERVER['REMOTE_ADDR'];    // IP client
```

---

## 4️⃣ Exemple : mini routeur

```php
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

if ($path === '/' && $method === 'GET') {
    echo 'Accueil';
} elseif ($path === '/login' && $method === 'POST') {
    echo 'Connexion';
}
```

* `$_SERVER` fournit la **méthode HTTP** et l’**URL**
* `$_POST` fournit les **données du formulaire**

---

## 5️⃣ Comparaison avec `$_GET` et `$_POST`

| Question                  | Superglobale | Exemple           |
| ------------------------- | ------------ | ----------------- |
| Quelle URL est demandée ? | `$_SERVER`   | `/login`          |
| Quelle méthode HTTP ?     | `$_SERVER`   | GET ou POST       |
| Paramètres `?x=1`         | `$_GET`      | `$_GET['x']`      |
| Champs de formulaire      | `$_POST`     | `$_POST['email']` |

---

## 6️⃣ Points importants

* Dépend du serveur web (Apache, Nginx)
* Certaines clés peuvent ne pas exister
* Ne jamais faire confiance aux données client (sécurité)

---

## 7️⃣ Bonnes pratiques

✔ Utiliser `$_SERVER['REQUEST_URI']` pour le **routing**
✔ Utiliser `$_SERVER['REQUEST_METHOD']` pour distinguer GET / POST
✔ Valider les données provenant de l’utilisateur (`$_GET`, `$_POST`)

---

## 8️⃣ Résumé

* `$_SERVER` contient **des informations sur la requête et le serveur**
* Il est **complémentaire** à `$_GET` et `$_POST`
* Indispensable pour un **routeur ou une API PHP**

---

### 🔹 Phrase à retenir

> **`$_SERVER` décrit la requête et l’environnement, `$_GET` et `$_POST` contiennent les données envoyées par l’utilisateur.**
