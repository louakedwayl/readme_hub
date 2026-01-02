# Le routeur en PHP

## 1️⃣ Introduction

Un **routeur** en PHP est un composant qui permet de **diriger une requête HTTP vers le bon code** (fonction, méthode, contrôleur) en fonction de :

* l’URL
* la méthode HTTP (`GET`, `POST`, etc.)

👉 Il est très utilisé dans les architectures **MVC** (Model–View–Controller), mais peut aussi exister **sans MVC complet**.

---

## 2️⃣ Pourquoi utiliser un routeur ?

Sans routeur, on fait souvent :

```php
/page.php
/login.php
/register.php
```

### ❌ Problèmes

* URLs peu propres
* Logique mélangée
* Difficile à maintenir

### ✅ Avec un routeur

```txt
/           → page d'accueil
/login     → formulaire de connexion
/user/42   → profil utilisateur
```

Avantages :

* URLs lisibles
* Code centralisé
* Meilleure organisation

---

## 3️⃣ Principe de fonctionnement

1. Le navigateur appelle une URL
2. Le serveur redirige tout vers `index.php`
3. Le routeur analyse l’URL
4. Il décide **quel code exécuter**

Schéma simplifié :

```
Navigateur → index.php → routeur → contrôleur → vue
```

---

## 4️⃣ Redirection vers index.php (Front Controller)

### 📁 Structure classique

```
public/
 └── index.php
src/
 ├── Router.php
 ├── controllers/
 └── views/
```

### 🧩 .htaccess (Apache)

```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [QSA,L]
```

👉 Toutes les requêtes passent par `index.php`

---

## 5️⃣ Récupérer l’URL en PHP

```php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
```

Exemples :

```txt
/login        → /login
/user/42      → /user/42
```

---

## 6️⃣ Routeur très simple (if / else)

```php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/') {
    require 'views/home.php';
} elseif ($uri === '/login') {
    require 'views/login.php';
} else {
    http_response_code(404);
    echo '404 - Page non trouvée';
}
```

✔ Simple
❌ Pas scalable

---

## 7️⃣ Routeur avec tableau de routes

```php
$routes = [
    '/' => 'home.php',
    '/login' => 'login.php',
    '/register' => 'register.php'
];

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (array_key_exists($uri, $routes)) {
    require 'views/' . $routes[$uri];
} else {
    http_response_code(404);
    echo '404';
}
```

✔ Plus propre
✔ Facile à maintenir

---

## 8️⃣ Gestion des méthodes HTTP

```php
$method = $_SERVER['REQUEST_METHOD'];

if ($uri === '/login' && $method === 'GET') {
    require 'views/login.php';
}

if ($uri === '/login' && $method === 'POST') {
    require 'controllers/LoginController.php';
}
```

👉 Essentiel pour les formulaires

---

## 9️⃣ Routeur orienté MVC

### Exemple de routes

```php
$routes = [
    'GET' => [
        '/' => ['HomeController', 'index'],
        '/login' => ['AuthController', 'loginForm'],
    ],
    'POST' => [
        '/login' => ['AuthController', 'login'],
    ]
];
```

### Exécution

```php
[$controller, $method] = $routes[$httpMethod][$uri];

require "controllers/$controller.php";
(new $controller())->$method();
```

---

## 🔟 Routes dynamiques (paramètres)

URL :

```txt
/user/42
```

```php
if (preg_match('#^/user/(\d+)$#', $uri, $matches)) {
    $userId = $matches[1];
    require 'controllers/UserController.php';
}
```

✔ Très utilisé
✔ Base des frameworks modernes

---

## 1️⃣1️⃣ Routeur sans Model (MVC partiel)

👉 Oui, **MVC sans Model est possible** :

* Routeur
* Contrôleurs
* Vues
* Accès DB direct dans le contrôleur

⚠️ Acceptable pour petits projets / pédagogie (ex: **Camagru**)

---

## 1️⃣2️⃣ Comparaison avec les frameworks

| Framework | Routeur          |
| --------- | ---------------- |
| Laravel   | Très avancé      |
| Symfony   | Composant dédié  |
| Slim      | Minimaliste      |
| PHP natif | À coder soi-même |

👉 Comprendre le routeur **avant** un framework est essentiel

---

## 1️⃣3️⃣ Bonnes pratiques

✔ Une seule entrée (`index.php`)
✔ Séparer routes / contrôleurs
✔ Gérer les erreurs 404
✔ Ne pas mettre de logique dans les vues

---

## 1️⃣4️⃣ Résumé

* Le routeur décide **quoi exécuter** selon l’URL
* Il est au cœur d’une app PHP moderne
* MVC **n’est pas obligatoire**, mais recommandé
* Tout framework PHP repose sur ce principe

---

📌 **Prochaine étape possible** :

* Implémenter un routeur propre pour ton projet Camagru
* Ajouter un mini Router en POO
* Comparer avec Laravel/Symfony
