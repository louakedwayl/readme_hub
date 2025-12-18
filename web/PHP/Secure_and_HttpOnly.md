# Cookies `Secure` et `HttpOnly`

## 1. Contexte et enjeux de sécurité

Les cookies servent souvent à stocker des informations sensibles (identifiant de session, token d’authentification). Une mauvaise configuration peut entraîner :

* Vol de session (session hijacking)
* Attaques XSS (Cross-Site Scripting)
* Interception des cookies sur un réseau non sécurisé

👉 Les attributs **`Secure`** et **`HttpOnly`** permettent de renforcer la sécurité des cookies.

---

## 2. L’attribut `HttpOnly`

### 2.1 Définition

Un cookie marqué **`HttpOnly`** :

* est accessible **uniquement via HTTP/HTTPS**
* **n’est pas accessible en JavaScript** (`document.cookie`)

```http
Set-Cookie: PHPSESSID=abc123; HttpOnly
```

---

### 2.2 Objectif de `HttpOnly`

L’attribut `HttpOnly` protège contre les attaques **XSS**.

Sans `HttpOnly` :

```js
console.log(document.cookie); // cookie lisible
```

Avec `HttpOnly` :

```js
document.cookie; // le cookie n'apparaît pas
```

➡️ Même si du JavaScript malveillant est injecté, il **ne peut pas voler le cookie**.

---

### 2.3 Utilisation en PHP

```php
setcookie("session_id", "abc123", time() + 3600, "/", "", false, true);
```

* `false` → Secure
* `true` → HttpOnly

---

## 3. L’attribut `Secure`

### 3.1 Définition

Un cookie marqué **`Secure`** :

* est envoyé **uniquement via HTTPS**
* n’est jamais transmis en HTTP clair

```http
Set-Cookie: PHPSESSID=abc123; Secure
```

---

### 3.2 Objectif de `Secure`

`Secure` protège contre :

* l’interception des cookies (sniffing)
* les attaques de type **Man-in-the-Middle**

➡️ Indispensable sur les sites HTTPS.

---

### 3.3 Utilisation en PHP

```php
setcookie("session_id", "abc123", time() + 3600, "/", "", true, true);
```

* `true` → Secure
* `true` → HttpOnly

---

## 4. Syntaxe moderne (PHP ≥ 7.3)

PHP permet l’utilisation d’un tableau d’options plus lisible.

```php
setcookie("session_id", "abc123", [
    'expires' => time() + 3600,
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);
```

---

## 5. Différence entre `Secure` et `HttpOnly`

| Attribut | Protection | Empêche          |
| -------- | ---------- | ---------------- |
| HttpOnly | XSS        | Accès JavaScript |
| Secure   | Réseau     | Envoi en HTTP    |

👉 Ils sont **complémentaires** et doivent être utilisés ensemble.

---

## 6. Cookies de session et PHPSESSID

PHP utilise un cookie appelé `PHPSESSID` pour gérer les sessions.

```php
session_start();
```

Configuration recommandée :

```php
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1); // uniquement en HTTPS
```

---

## 7. Bonnes pratiques

✅ Toujours utiliser `HttpOnly`
✅ Toujours utiliser `Secure` en HTTPS
✅ Ne jamais stocker de données sensibles dans un cookie
✅ Associer avec `SameSite`

---

## 8. Exemple complet sécurisé

```php
setcookie("auth_token", "xyz789", [
    'expires' => time() + 3600,
    'path' => '/',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict'
]);
```

---

## 9. Résumé

* `HttpOnly` empêche l’accès JavaScript aux cookies
* `Secure` empêche l’envoi des cookies en HTTP
* Ils protègent principalement les **sessions utilisateur**
* Ils sont indispensables pour les applications modernes

📌 **Règle d’or** : un cookie de session doit toujours être `Secure` + `HttpOnly` (en HTTPS).
