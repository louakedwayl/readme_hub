# 📘 Cours : Comprendre les cookies en PHP et Web

## 🌐 1. Introduction

Les **cookies** sont de petits fichiers stockés par le navigateur pour conserver des informations côté client.
Ils sont principalement utilisés pour :

* Gérer les **sessions utilisateur**
* Sauvegarder les **préférences**
* Suivre les utilisateurs à des fins analytiques

En PHP, ils sont accessibles via la superglobale `$_COOKIE` et manipulables via la fonction `setcookie()`.

---

## 🔹 2. Structure d’un cookie

Un cookie contient généralement :

* **Nom** : identifiant du cookie
* **Valeur** : donnée à stocker
* **Expiration** : durée de vie
* **Domaine** : site auquel le cookie appartient
* **Path** : chemin pour lequel le cookie est valide
* **Secure** : cookie envoyé seulement via HTTPS
* **HttpOnly** : cookie inaccessible via JavaScript (protège contre certaines attaques XSS)
* **SameSite** : contrôle du partage inter-domaines (`Strict`, `Lax`, `None`)

---

## 🔹 3. Créer un cookie en PHP

### Syntaxe

```php
setcookie(name, value, expire, path, domain, secure, httponly);
```

### Exemple

```php
setcookie("username", "Alice", time() + 3600, "/", "example.com", true, true);
```

> Ce cookie `username` dure 1 heure, est envoyé uniquement sur HTTPS, et est inaccessible à JavaScript.

---

## 🔹 4. Lire un cookie en PHP

```php
if(isset($_COOKIE['username'])){
    echo "Bonjour " . $_COOKIE['username'];
}
```

---

## 🔹 5. Supprimer un cookie

Pour supprimer un cookie, il faut **l’expirer dans le passé** :

```php
setcookie("username", "", time() - 3600, "/");
```

---

## 🔹 6. Bonnes pratiques

1. **Ne jamais stocker d’informations sensibles en clair**
   Utiliser un identifiant ou un token, pas le mot de passe.
2. **Activer `HttpOnly` et `Secure`**
   Pour protéger contre le vol via JavaScript et les connexions non sécurisées.
3. **Limiter la durée de vie**
   Un cookie permanent peut être détourné facilement.
4. **Utiliser `SameSite` pour limiter le CSRF**
   Exemple : `SameSite=Lax` ou `Strict`.

---

## 🔹 7. Différences avec Web Storage

| Type de stockage | Envoyé au serveur ? | Persistant ?           | Accessible via JS ? |
| ---------------- | ------------------- | ---------------------- | ------------------- |
| Cookie           | Oui                 | Oui                    | Oui                 |
| Local Storage    | Non                 | Oui                    | Oui                 |
| Session Storage  | Non                 | Non (fermeture onglet) | Oui                 |

> Important : **Local Storage et Session Storage ne sont pas des cookies.**

---

## 🔹 8. Exemple complet en PHP

```php
<?php
// Création d’un cookie
setcookie("user_id", "12345", time() + 3600, "/", "", true, true);

// Lecture du cookie
if(isset($_COOKIE['user_id'])){
    echo "User ID : " . $_COOKIE['user_id'];
}

// Suppression du cookie
setcookie("user_id", "", time() - 3600, "/");
?>
```

---

## 🔹 9. Conclusion

Les cookies sont essentiels pour **garder des informations entre plusieurs pages** ou **sessions**.
Il est crucial de les utiliser correctement pour **garantir la sécurité des utilisateurs**.
