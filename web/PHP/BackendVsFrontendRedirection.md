# Cours Web : Redirection backend vs frontend (PHP & AJAX)

## 1. Introduction

La redirection d’un utilisateur est une action très courante en développement web (connexion, accès refusé, validation d’email, etc.).

Cependant, **la possibilité de rediriger dépend du type de requête** :

* navigation classique
* appel AJAX / API

Ce cours explique **quand**, **comment** et **pourquoi** une redirection fonctionne (ou non).

---

## 2. Qu’est-ce qu’une redirection HTTP ?

Une redirection est une réponse du serveur indiquant au navigateur :

> « Cette ressource se trouve ailleurs »

Elle repose sur :

* un **code HTTP** (301, 302…)
* un **header `Location`**

Exemple :

```php
header("Location: login.php");
exit;
```

➡️ Le navigateur reçoit la réponse et change automatiquement d’URL.

---

## 3. Redirection côté backend (PHP)

### 3.1 Cas où elle fonctionne

La redirection backend fonctionne **uniquement** si :

* la requête est une navigation classique
* aucun contenu n’a été envoyé avant (`echo`, HTML, JSON…)
* la requête n’est **pas AJAX**

### Exemple valide

```php
if (!$userIsLogged) {
    header("Location: index.php?action=login");
    exit;
}
```

✔ Redirection automatique

---

### 3.2 Erreurs fréquentes

❌ Sortie avant le `header`

```php
echo "Erreur";
header("Location: login.php"); // ne fonctionne pas
```

❌ Espaces avant `<?php`

❌ Fichier encodé en UTF-8 avec BOM

---

## 4. Redirection et AJAX : pourquoi ça ne marche pas

### 4.1 Cas AJAX / fetch / axios

Quand une requête est envoyée via JavaScript :

```js
fetch('login.php')
```

➡️ Le navigateur **ne considère plus la réponse comme une navigation**, mais comme une **donnée**.

Donc même si PHP envoie :

```php
header("Location: dashboard.php");
```

❌ la page **ne changera pas**

---

### 4.2 Règle fondamentale

> **Le backend répond, le frontend navigue.**

PHP ne peut pas forcer le navigateur à changer de page lors d’un appel AJAX.

---

## 5. Bonne pratique en AJAX (solution correcte)

### 5.1 Backend : envoyer une instruction

```php
echo json_encode([
    'success' => false,
    'redirect' => 'index.php?action=email_signup'
]);
exit;
```

### 5.2 Frontend : effectuer la redirection

```js
fetch('login.php', { method: 'POST' })
.then(res => res.json())
.then(data => {
    if (data.redirect) {
        window.location.href = data.redirect;
    }
});
```

✔ séparation claire des responsabilités

---

## 6. Comparaison des approches

| Contexte           | Méthode            | Fonctionne |
| ------------------ | ------------------ | ---------- |
| Formulaire HTML    | `header(Location)` | ✅          |
| Navigation directe | `header(Location)` | ✅          |
| AJAX / fetch       | JSON + JS          | ✅          |
| AJAX + header()    | ❌                  | ❌          |

---

## 7. Cas réel : utilisateur non validé

### Backend

```php
if ($user['validated'] == 0) {
    session_start();
    $_SESSION['user_email'] = $user['email'];

    echo json_encode([
        'error_code' => 'not_validated',
        'redirect' => 'index.php?action=email_signup'
    ]);
    exit;
}
```

### Frontend

```js
if (response.redirect) {
    window.location.href = response.redirect;
}
```

---

## 8. Mauvaises pratiques (à éviter)

❌ Injecter du JavaScript depuis PHP

```php
echo "<script>location.href='login.php'</script>";
```

❌ Mélanger HTML, JSON et redirection

❌ Forcer des comportements côté client

---

## 9. Bonnes pratiques générales

* Toujours décider la navigation côté frontend en AJAX
* Utiliser les codes HTTP pour les API
* Garder le backend logique, pas visuel
* Centraliser les redirections dans le JS

---

## 10. À retenir (résumé)

✔ Redirection backend possible sans AJAX

✔ Impossible en AJAX

✔ JSON = instruction, pas navigation

✔ `window.location` côté frontend

---

## 11. Conclusion

Comprendre la différence entre **backend** et **frontend** est essentiel pour gérer correctement les redirections.

👉 Une redirection n’est pas qu’une URL, c’est une **responsabilité**.

---

📌 **Phrase clé à retenir** :

> *Le backend décide, le frontend redirige.*

---

✍️ Fin du cours
