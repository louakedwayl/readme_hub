# `setcookie()`

## 1. Introduction aux cookies

Un **cookie** est une petite donnée stockée **côté client (navigateur)**. Il permet de conserver des informations entre plusieurs requêtes HTTP (protocole sans état).

Exemples d'utilisation :

* Gestion de session
* Préférences utilisateur (langue, thème)
* Authentification
* Tracking

---

## 2. La fonction `setcookie()` en PHP

La fonction `setcookie()` permet **d'envoyer un cookie au navigateur** via les en-têtes HTTP.

⚠️ **Important** : `setcookie()` doit être appelée **avant tout affichage HTML** (avant `echo`, `print`, balises HTML, etc.).

---

## 3. Syntaxe de `setcookie()`

```php
setcookie(
    string $name,
    string $value = "",
    int $expires_or_options = 0,
    string $path = "",
    string $domain = "",
    bool $secure = false,
    bool $httponly = false
);
```

Depuis PHP 7.3, on peut aussi utiliser un tableau d'options.

---

## 4. Paramètres de `setcookie()`

### 4.1 `$name`

Nom du cookie (obligatoire).

```php
setcookie("username", "Alice");
```

---

### 4.2 `$value`

Valeur du cookie (chaîne de caractères).

```php
setcookie("lang", "fr");
```

---

### 4.3 `$expires_or_options`

Date d'expiration du cookie (timestamp Unix).

* `time() + 3600` → expire dans 1 heure
* `0` → cookie de session (supprimé à la fermeture du navigateur)

```php
setcookie("theme", "dark", time() + 3600);
```

---

### 4.4 `$path`

Chemin pour lequel le cookie est valide.

```php
setcookie("panier", "123", time() + 3600, "/");
```

* `/` → accessible sur tout le site

---

### 4.5 `$domain`

Domaine pour lequel le cookie est valide.

```php
setcookie("test", "ok", time() + 3600, "/", "example.com");
```

---

### 4.6 `$secure`

Si `true`, le cookie est envoyé **uniquement via HTTPS**.

```php
setcookie("secureCookie", "1", time() + 3600, "/", "", true);
```

---

### 4.7 `$httponly`

Si `true`, le cookie **n'est pas accessible en JavaScript** (protection XSS).

```php
setcookie("session", "abc123", time() + 3600, "/", "", true, true);
```

---

## 5. Syntaxe moderne (PHP ≥ 7.3)

```php
setcookie("session_id", "abc123", [
    'expires' => time() + 3600,
    'path' => '/',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict'
]);
```

### Option `SameSite`

* `Strict` → cookie envoyé uniquement sur le site
* `Lax` → comportement intermédiaire (par défaut)
* `None` → nécessite `Secure`

---

## 6. Lire un cookie en PHP

Les cookies reçus sont accessibles via la superglobale `$_COOKIE`.

```php
if (isset($_COOKIE['username'])) {
    echo $_COOKIE['username'];
}
```

---

## 7. Supprimer un cookie

Pour supprimer un cookie, on définit une **date d'expiration passée**.

```php
setcookie("username", "", time() - 3600, "/");
```

⚠️ Le nom, le chemin et le domaine doivent correspondre exactement.

---

## 8. Cookies et sessions

* Le cookie contient souvent un **identifiant de session**
* Les **données de session** sont stockées **côté serveur**
* Exemple typique : `PHPSESSID`

```php
session_start();
```

---

## 9. Bonnes pratiques de sécurité

✅ Utiliser `httponly`
✅ Utiliser `secure` en HTTPS
✅ Limiter la durée de vie
✅ Ne jamais stocker de données sensibles

---

## 10. Résumé

* `setcookie()` envoie un cookie au navigateur
* Le cookie est stocké côté client
* Il peut être persistant ou de session
* Il sert souvent à identifier une session serveur

📌 **Règle d'or** : `setcookie()` AVANT tout affichage HTML

---

💡 Astuce : pour la gestion d'état côté serveur, privilégie les **sessions PHP** plutôt que les cookies seuls.
