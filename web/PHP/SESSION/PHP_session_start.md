# 📘 Cours PHP : `session_start()`

## 1. Introduction aux sessions PHP

HTTP est un protocole **sans état** : chaque requête est indépendante.
Les **sessions PHP** permettent de conserver des informations entre plusieurs requêtes (pages).

Exemples d’utilisation :

* authentification (utilisateur connecté)
* panier d’achat
* préférences utilisateur (langue, thème)
* données temporaires

---

## 2. La fonction `session_start()`

### Définition

```php
session_start(): bool
```

`session_start()` :

* démarre une nouvelle session **ou**
* reprend une session existante

Elle crée (ou lit) un **identifiant de session** stocké généralement dans un cookie (`PHPSESSID`).

---

## 3. Fonctionnement interne

Lors de l’appel à `session_start()` :

1. PHP cherche un cookie de session dans la requête
2. S’il existe → la session est reprise
3. Sinon → une nouvelle session est créée
4. Les données sont accessibles via `$_SESSION`

---

## 4. Exemple simple

```php
<?php
session_start();

$_SESSION['nom'] = 'Alice';
echo 'Bonjour ' . $_SESSION['nom'];
```

➡️ La variable `$_SESSION['nom']` sera disponible sur les autres pages.

---

## 5. La superglobale `$_SESSION`

`$_SESSION` est un tableau associatif.

### Écriture

```php
$_SESSION['age'] = 25;
```

### Lecture

```php
echo $_SESSION['age'];
```

### Suppression

```php
unset($_SESSION['age']);
```

---

## 6. Où placer `session_start()`

### ⚠️ Règle importante

`session_start()` doit être appelé **AVANT toute sortie HTML** :

* pas de `echo`
* pas de HTML
* pas d’espace avant `<?php`

### ❌ Mauvais exemple

```php
<p>Bonjour</p>
<?php session_start(); ?>
```

### ✅ Bon exemple

```php
<?php
session_start();
?>
<p>Bonjour</p>
```

---

## 7. Éviter les erreurs : `session_status()`

Appeler `session_start()` plusieurs fois provoque un warning.

### Bonne pratique

```php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
```

---

## 8. Cas d’usage courant : authentification

```php
<?php
session_start();

if ($_POST['login'] === 'admin') {
    $_SESSION['logged'] = true;
}
```

Sur une autre page :

```php
<?php
session_start();

if (!isset($_SESSION['logged'])) {
    header('Location: login.php');
    exit;
}
```

---

## 9. Configuration importante (php.ini)

Quelques options utiles :

| Directive                 | Description          |
| ------------------------- | -------------------- |
| `session.save_path`       | Dossier de stockage  |
| `session.cookie_lifetime` | Durée du cookie      |
| `session.gc_maxlifetime`  | Durée de vie serveur |
| `session.use_strict_mode` | Sécurité             |

---

## 10. Sécurité des sessions

### Recommandations

* Utiliser HTTPS
* Régénérer l’ID après login

```php
session_regenerate_id(true);
```

* Ne pas stocker de données sensibles

---

## 11. Détruire une session

### Déconnexion utilisateur

```php
session_start();
session_unset();
session_destroy();
```

---

## 12. Erreurs fréquentes

### ❌ Oublier `session_start()`

```php
echo $_SESSION['nom']; // Erreur
```

### ❌ Appeler `session_start()` trop tard

### ❌ L’appeler plusieurs fois sans vérification

---

## 13. Résumé

* `session_start()` initialise ou reprend une session
* Doit être appelée avant tout affichage
* Utilise la superglobale `$_SESSION`
* Toujours vérifier l’état avec `session_status()`

---

## 14. Bonnes pratiques

* Centraliser `session_start()`
* Toujours sécuriser les sessions
* Nettoyer les données inutiles
* Tester les variables de session

---

📌 **`session_start()` est la base de toute application PHP avec authentification ou état utilisateur.**
