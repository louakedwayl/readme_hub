# 📘 Cours PHP : `session_regenerate_id()`

## 1. Introduction

La sécurité des sessions est un point **critique** en PHP.
Une mauvaise gestion de l’identifiant de session peut conduire à des attaques comme la **session fixation**.

La fonction `session_regenerate_id()` permet de **renforcer la sécurité** des sessions PHP.

---

## 2. La fonction `session_regenerate_id()`

### Définition

```php
session_regenerate_id(bool $delete_old_session = false): bool
```

Cette fonction :

* génère un **nouvel identifiant de session**
* conserve les données de `$_SESSION`

---

## 3. Pourquoi régénérer l’ID de session ?

### 🔥 Problème : la session fixation

Un attaquant peut forcer un utilisateur à utiliser un ID de session connu à l’avance.
Si la session n’est pas régénérée après une action sensible, l’attaquant peut :

* voler la session
* se faire passer pour l’utilisateur

➡️ **Régénérer l’ID empêche cette attaque.**

---

## 4. Quand utiliser `session_regenerate_id()` ?

Il est recommandé de l’utiliser :

* après une **connexion utilisateur**
* après une **élévation de privilèges** (admin)
* après un **changement de rôle**
* périodiquement pour les sessions longues

---

## 5. Exemple simple

```php
<?php
session_start();

session_regenerate_id(true);
```

➡️ L’ancienne session est supprimée et un nouvel ID est créé.

---

## 6. Paramètre `$delete_old_session`

### ❌ Sans suppression

```php
session_regenerate_id(false);
```

* Ancien fichier de session conservé
* Moins sécurisé

---

### ✅ Avec suppression (recommandé)

```php
session_regenerate_id(true);
```

* Ancienne session détruite
* Empêche la réutilisation

---

## 7. Exemple réaliste : login sécurisé

```php
<?php
session_start();

if ($loginOk) {
    session_regenerate_id(true);
    $_SESSION['user_id'] = 42;
    $_SESSION['role'] = 'user';
}
```

➡️ Le nouvel ID protège la session après authentification.

---

## 8. Bon ordre d’exécution

### ⚠️ Règles importantes

* `session_start()` doit être appelé AVANT
* `session_regenerate_id()` doit être appelé :

  * après l’authentification
  * avant l’envoi du HTML

### Exemple correct

```php
session_start();
// vérification login
session_regenerate_id(true);
```

---

## 9. Erreurs fréquentes

### ❌ Appeler sans session active

```php
session_regenerate_id(true); // Erreur
```

➡️ Une session doit déjà être active.

---

### ❌ Régénérer à chaque requête

* Consommation inutile
* Problèmes de performances

---

## 10. Interaction avec `session_status()`

Bonne pratique :

```php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

session_regenerate_id(true);
```

---

## 11. Impact s
