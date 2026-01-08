# 📦 La superglobale PHP $_ENV

## 1. Introduction

En PHP, une **superglobale** est une variable spéciale accessible **partout dans le code**, sans avoir besoin de la passer en paramètre.

Exemples de superglobales :
- `$_GET`
- `$_POST`
- `$_SESSION`
- `$_COOKIE`
- `$_ENV`

👉 Ce document explique en détail **`$_ENV`**, utilisée pour gérer les **variables d’environnement**.

---

## 2. Qu’est-ce qu’une variable d’environnement ?

Une **variable d’environnement** est une variable :
- définie **en dehors du code**
- utilisée pour la **configuration**
- contenant souvent des **données sensibles**

### Exemples :
- Identifiants de base de données
- Mots de passe
- Clés API
- Mode DEV / PROD

⚠️ Ces informations ne doivent **jamais** être écrites directement dans le code.

---

## 3. La superglobale $_ENV

`$_ENV` est un **tableau associatif PHP** contenant les variables d’environnement.

```php
$_ENV['DB_HOST'];
$_ENV['DB_NAME'];
$_ENV['DB_USER'];
$_ENV['DB_PASS'];
```

---

## 4. Pourquoi utiliser $_ENV ?

### ❌ Mauvaise pratique
```php
$db_pass = "root123";
```

### ✅ Bonne pratique
```php
$db_pass = $_ENV['DB_PASS'];
```

Avantages :
- Sécurité
- Code portable
- Obligatoire pour Camagru

---

## 5. Le fichier .env

Exemple de fichier `.env` :

```env
DB_HOST=localhost
DB_NAME=camagru
DB_USER=root
DB_PASS=secret
```

⚠️ Le fichier `.env` :
- doit être ajouté au `.gitignore`
- ne doit jamais être envoyé sur Git

---

## 6. Charger le fichier .env en PHP

PHP ne charge pas automatiquement le fichier `.env`.

```php
$env = parse_ini_file(__DIR__ . '/../.env');

foreach ($env as $key => $value) {
    $_ENV[$key] = $value;
}
```

---

## 7. Utilisation avec PDO

```php
$dsn = "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};charset=utf8mb4";

$pdo = new PDO(
    $dsn,
    $_ENV['DB_USER'],
    $_ENV['DB_PASS']
);
```

---

## 8. Différence avec les autres superglobales

| Superglobale | Rôle |
|-------------|------|
| $_GET | Données URL |
| $_POST | Données formulaire |
| $_SESSION | Session utilisateur |
| $_COOKIE | Cookies |
| $_ENV | Configuration |

---

## 9. Bonnes pratiques

- Centraliser le chargement du `.env`
- Vérifier l’existence des clés
- Ne jamais afficher `$_ENV` en production

---

## 10. Conclusion

`$_ENV` est essentielle pour la sécurité et la configuration d’une application PHP moderne, notamment pour le projet Camagru.
