# 📘 Le lien entre les cookies en PHP et en JavaScript

## 🌐 1. Introduction

Les **cookies** sont des petits fichiers stockés par le navigateur pour conserver des informations.
Ils permettent à un site web de **partager des données entre le client (navigateur) et le serveur**.

* **Côté serveur (PHP)** : lecture et écriture via `$_COOKIE` et `setcookie()`.
* **Côté client (JavaScript)** : lecture et écriture via `document.cookie`.

> Comprendre le lien entre PHP et JS est crucial pour gérer correctement les données persistantes.

---

## 🔹 2. Création et lecture d’un cookie en PHP

### Créer un cookie

```php
<?php
// Création d’un cookie valable 1 heure
setcookie("username", "Alice", time() + 3600, "/");
?>
```

### Lire un cookie

```php
<?php
if(isset($_COOKIE['username'])) {
    echo "Bonjour " . $_COOKIE['username'];
}
?>
```

### Important

* `setcookie()` doit être appelé **avant tout affichage HTML**
* Les cookies créés par PHP sont envoyés dans les **en-têtes HTTP** au navigateur

---

## 🔹 3. Lecture et écriture d’un cookie en JavaScript

### Créer un cookie

```javascript
// Cookie valable 1 heure
document.cookie = "username=Alice; max-age=3600; path=/";
```

### Lire un cookie

```javascript
console.log(document.cookie); // affiche tous les cookies accessibles
```

### Supprimer un cookie

```javascript
document.cookie = "username=; max-age=0; path=/";
```

---

## 🔹 4. Comment PHP et JS partagent les cookies

1. **PHP envoie un cookie** via `setcookie()`.
2. Le **navigateur le stocke** et l’envoie automatiquement à chaque requête HTTP vers le serveur.
3. **JavaScript peut lire ce cookie** si **il n’est pas HttpOnly**.

### Exemple : cookie partagé

* PHP crée un cookie :

```php
setcookie("theme", "dark", time()+3600, "/", "", false, false);
```

* JavaScript peut le lire :

```javascript
console.log(document.cookie); // affiche "theme=dark"
```

> ⚠️ Si le cookie a `HttpOnly=true`, JavaScript **ne peut pas y accéder**.

---

## 🔹 5. Différences et limites

| Côté       | Accès             | Peut modifier ?         | Particularité                                 |
| ---------- | ----------------- | ----------------------- | --------------------------------------------- |
| PHP        | `$_COOKIE`        | Oui (via `setcookie()`) | Cookie envoyé avec chaque requête HTTP        |
| JavaScript | `document.cookie` | Oui (si pas HttpOnly)   | Accès limité aux cookies visibles côté client |

---

## 🔹 6. Bonnes pratiques

1. **Sécurité**

   * Mettre `HttpOnly` pour les cookies sensibles (sessions, tokens)
   * Mettre `Secure` pour HTTPS
   * Utiliser `SameSite` pour limiter les requêtes cross-site
2. **Synchronisation**

   * Si PHP modifie un cookie, le JS lira la **nouvelle valeur au prochain chargement de page**
   * JS peut modifier un cookie, mais PHP ne verra la modification qu’**à la prochaine requête**
3. **Nom et path cohérents**

   * Pour que les deux côtés accèdent au même cookie, ils doivent utiliser le **même nom et path**

---

## 🔹 7. Exemple complet

```php
<?php
// PHP : création d’un cookie
setcookie("user_id", "12345", time() + 3600, "/");
?>
<!DOCTYPE html>
<html>
<body>

<script>
// JS : lecture du cookie créé par PHP
console.log("Cookies accessibles en JS:", document.cookie);

// JS : modification d’un cookie
document.cookie = "user_id=67890; max-age=3600; path=/";
</script>

</body>
</html>
```

* PHP crée le cookie `user_id=12345`
* JS lit le cookie côté navigateur
* JS modifie le cookie à `user_id=67890`
* PHP verra cette nouvelle valeur **à la prochaine requête HTTP**

---

## 🔹 8. Conclusion

* Les cookies sont le **pont entre client et serveur**.
* **PHP et JavaScript peuvent lire et écrire les mêmes cookies** si les paramètres le permettent.
* Les cookies sensibles doivent être **HttpOnly et Secure** pour protéger l’utilisateur.
* Il est essentiel de comprendre le **flux : création → stockage → lecture → modification** pour éviter les erreurs de synchronisation.
