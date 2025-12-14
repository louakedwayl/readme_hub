# La variable `$_SESSION` en PHP

## 1. Introduction aux sessions

En PHP, une **session** permet de conserver des informations **d'une page à l'autre** pour un même utilisateur. Contrairement aux variables classiques, les données de session ne sont pas perdues lors d'un changement de page.

La superglobale `$_SESSION` est un tableau associatif utilisé pour stocker ces données.

👉 Cas d'usage typiques :

* Authentification (utilisateur connecté)
* Panier d'achat
* Préférences utilisateur (langue, thème)
* Messages flash

---

## 2. Fonctionnement général des sessions

* Chaque utilisateur possède un **identifiant de session unique**
* Cet identifiant est stocké côté client (cookie par défaut)
* Les données de session sont stockées **côté serveur**

Schéma simplifié :

```
Navigateur → ID de session → Serveur → Données $_SESSION
```

---

## 3. Démarrer une session

Avant d'utiliser `$_SESSION`, il faut **impérativement démarrer la session** avec la fonction `session_start()`.

```php
<?php
session_start();
?>
```

⚠️ `session_start()` doit être appelé :

* Avant toute sortie HTML
* Avant toute utilisation de `$_SESSION`

❌ Incorrect :

```php
echo "Bonjour";
session_start();
```

✅ Correct :

```php
session_start();
echo "Bonjour";
```

---

## 4. Déclarer et modifier une variable de session

`$_SESSION` est un **tableau associatif**.

### Ajouter une variable

```php
$_SESSION['username'] = 'Alice';
$_SESSION['age'] = 25;
```

### Modifier une variable

```php
$_SESSION['age'] = 26;
```

---

## 5. Lire une variable de session

```php
echo $_SESSION['username'];
```

### Vérifier l'existence d'une variable

```php
if (isset($_SESSION['username'])) {
    echo "Utilisateur connecté";
}
```

Bonne pratique : **toujours vérifier avec `isset()`** avant d'utiliser une variable de session.

---

## 6. Exemple complet : système de connexion simple

### Page de connexion (`login.php`)

```php
<?php
session_start();

$_SESSION['user'] = 'admin';
$_SESSION['is_logged'] = true;

header('Location: dashboard.php');
exit;
```

### Page protégée (`dashboard.php`)

```php
<?php
session_start();

if (!isset($_SESSION['is_logged']) || $_SESSION['is_logged'] !== true) {
    header('Location: login.php');
    exit;
}

echo "Bienvenue " . $_SESSION['user'];
```

---

## 7. Supprimer des variables de session

### Supprimer une variable spécifique

```php
unset($_SESSION['username']);
```

### Supprimer toutes les variables de session

```php
session_unset();
```

---

## 8. Détruire complètement une session

Pour déconnecter un utilisateur, on détruit la session.

```php
session_start();
session_destroy();
```

⚠️ `session_destroy()` :

* Supprime les données côté serveur
* Ne supprime pas automatiquement le tableau `$_SESSION`

Bonne pratique :

```php
session_start();
$_SESSION = [];
session_destroy();
```

---

## 9. Sécurité des sessions

### Bonnes pratiques

* Toujours utiliser `session_start()` sur chaque page concernée
* Régénérer l'ID de session après connexion

```php
session_regenerate_id(true);
```

* Ne jamais stocker de mots de passe en clair
* Utiliser HTTPS pour éviter le vol de session

---

## 10. Différence entre sessions et cookies

| Sessions                     | Cookies                            |
| ---------------------------- | ---------------------------------- |
| Stockées côté serveur        | Stockées côté client               |
| Plus sécurisées              | Moins sécurisées                   |
| Durée contrôlée côté serveur | Durée contrôlée par expiration     |
| Identifiées par un cookie    | Données directement dans le cookie |

---

## 11. Résumé

* `$_SESSION` permet de stocker des données persistantes par utilisateur
* `session_start()` est obligatoire
* Les sessions sont idéales pour l'authentification
* Une bonne gestion des sessions est essentielle pour la sécurité

---

## 12. Exercices (optionnel)

1. Créer une page qui stocke un compteur de visites avec `$_SESSION`
2. Créer un système de connexion/déconnexion simple
3. Stocker la langue préférée de l'utilisateur

---

📌 **À retenir** : sans `session_start()`, `$_SESSION` ne fonctionne pas.
