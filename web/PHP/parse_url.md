# 📘 `parse_url()` en PHP

## 1️⃣ Introduction

En PHP, la fonction **`parse_url()`** sert à **découper une URL en plusieurs parties** (chemin, paramètres, hôte, etc.).

👉 Elle est **très utilisée dans les routeurs**, les frameworks, et les applications web modernes.

---

## 2️⃣ Pourquoi `parse_url` est importante

Quand un navigateur appelle une page, PHP reçoit l’URL complète, par exemple :

```
/login?redirect=/dashboard&page=2
```

Mais un routeur n’a **pas besoin de tout** :

* il veut surtout le **chemin** (`/login`)
* pas les paramètres GET

Sans `parse_url`, on risque des bugs.

---

## 3️⃣ Signature de la fonction

```php
parse_url(string $url, int $component = -1): array|string|null
```

* `$url` : l’URL à analyser
* `$component` (optionnel) : la partie précise à extraire

---

## 4️⃣ Exemple simple

```php
$url = '/login?redirect=/dashboard&page=2';
$result = parse_url($url);

print_r($result);
```

Résultat :

```php
Array
(
    [path] => /login
    [query] => redirect=/dashboard&page=2
)
```

👉 PHP a **séparé automatiquement** les parties de l’URL.

---

## 5️⃣ Récupérer uniquement le chemin (cas du routeur)

```php
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
```

Exemples :

| URL reçue         | Résultat   |
| ----------------- | ---------- |
| `/login`          | `/login`   |
| `/login?x=1`      | `/login`   |
| `/user/42?page=2` | `/user/42` |

✔ C’est **l’utilisation la plus courante**.

---

## 6️⃣ Les composants possibles d’une URL

URL complète :

```
https://example.com:8080/user/42?active=true#profile
```

| Composant | Constante          | Valeur      |
| --------- | ------------------ | ----------- |
| schéma    | `PHP_URL_SCHEME`   | https       |
| hôte      | `PHP_URL_HOST`     | example.com |
| port      | `PHP_URL_PORT`     | 8080        |
| chemin    | `PHP_URL_PATH`     | /user/42    |
| query     | `PHP_URL_QUERY`    | active=true |
| fragment  | `PHP_URL_FRAGMENT` | profile     |

---

## 7️⃣ Comparaison : avec et sans `parse_url`

### ❌ Sans `parse_url`

```php
$uri = explode('?', $_SERVER['REQUEST_URI'])[0];
```

Problèmes :

* moins lisible
* fragile
* bricolage

### ✅ Avec `parse_url`

```php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
```

✔ propre
✔ standard
✔ robuste

---

## 8️⃣ Lien avec `$_GET`

Les paramètres extraits par `parse_url` sont aussi accessibles via `$_GET`.

Exemple :

```
/login?redirect=/dashboard
```

```php
echo $_GET['redirect']; // /dashboard
```

👉 `parse_url` sert au **routeur**, `$_GET` sert à la **logique métier**.

---

## 9️⃣ Cas réel : mini routeur

```php
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($path === '/') {
    echo 'Home';
} elseif ($path === '/login') {
    echo 'Login';
} else {
    http_response_code(404);
}
```

---

## 🔟 Erreurs fréquentes

❌ Comparer l’URL complète avec des paramètres

```php
if ($_SERVER['REQUEST_URI'] === '/login')
```

❌ Oublier que `REQUEST_URI` contient `?query`

---

## 1️⃣1️⃣ Bonnes pratiques

✔ Toujours utiliser `parse_url` dans un routeur
✔ Utiliser `PHP_URL_PATH` pour le matching
✔ Ne pas parser les paramètres à la main

---

## 1️⃣2️⃣ Résumé

* `parse_url()` découpe une URL
* Le routeur utilise **le path**, pas les paramètres
* Elle évite des bugs subtils
* Tous les frameworks PHP font l’équivalent

---

📌 **À retenir absolument** :

> **A router matches the URL path, not the query string.**

---

👉 Prochaines étapes possibles :

* `parse_str()` pour lire les query params
* routes dynamiques (`/user/{id}`)
* implémentation exacte dans Camagru
