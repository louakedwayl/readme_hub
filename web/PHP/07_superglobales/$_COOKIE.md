# La superglobale `$_COOKIE`

## 1. Introduction

En PHP, `$_COOKIE` est une **superglobale** qui permet d’accéder aux cookies envoyés par le navigateur lors d’une requête HTTP.

Les cookies sont des données **stockées côté client**, mais **lues côté serveur** grâce à `$_COOKIE`.

---

## 2. Qu’est-ce qu’une superglobale ?

Une superglobale est une variable PHP :

* accessible **partout dans le script**
* sans avoir besoin de `global`

Exemples de superglobales :

* `$_GET`
* `$_POST`
* `$_SESSION`
* `$_COOKIE`

---

## 3. Origine des données de `$_COOKIE`

Les valeurs de `$_COOKIE` proviennent de l’en-tête HTTP suivant :

```http
Cookie: username=Alice; theme=dark
```

➡️ Le navigateur envoie automatiquement cet en-tête au serveur.

---

## 4. Structure de `$_COOKIE`

`$_COOKIE` est un **tableau associatif** :

```php
Array (
    [username] => Alice
    [theme] => dark
)
```

* clé → nom du cookie
* valeur → valeur du cookie

---

## 5. Lire un cookie en PHP

### 5.1 Accès simple

```php
echo $_COOKIE['username'];
```

⚠️ Attention : le cookie peut ne pas exister.

---

### 5.2 Vérifier l’existence d’un cookie

```php
if (isset($_COOKIE['username'])) {
    echo $_COOKIE['username'];
}
```

Bonne pratique pour éviter les erreurs.

---

## 6. Cookies de session et `$_COOKIE`

Les cookies de session contiennent généralement un **identifiant de session**.

Exemple :

```php
$_COOKIE['PHPSESSID'];
```

➡️ Les **données de session** sont stockées côté serveur, pas dans `$_COOKIE`.

---

## 7. Cookies `HttpOnly` et `Secure`

* Un cookie `HttpOnly` :

  * est visible dans `$_COOKIE`
  * n’est **pas accessible en JavaScript**

* Un cookie `Secure` :

  * n’est présent dans `$_COOKIE` que lors des requêtes HTTPS

---

## 8. Modifier un cookie

⚠️ On ne peut **pas modifier directement** `$_COOKIE`.

❌ Mauvais exemple :

```php
$_COOKIE['theme'] = 'light';
```

✅ Bonne méthode : utiliser `setcookie()`

```php
setcookie('theme', 'light', time() + 3600);
```

La modification sera visible **à la prochaine requête**.

---

## 9. Supprimer un cookie

```php
setcookie('theme', '', time() - 3600);
```

Le cookie disparaîtra du navigateur.

---

## 10. Sécurité et bonnes pratiques

⚠️ Les cookies peuvent être modifiés par le client.

Bonnes pratiques :

* Ne jamais faire confiance aux valeurs de `$_COOKIE`
* Toujours valider les données
* Ne pas stocker d’informations sensibles
* Utiliser `HttpOnly` et `Secure`

---

## 11. Différence entre `$_COOKIE` et `$_SESSION`

| `$_COOKIE`                   | `$_SESSION`   |
| ---------------------------- | ------------- |
| Côté client                  | Côté serveur  |
| Modifiable par l’utilisateur | Plus sécurisé |
| Persistant possible          | Temporaire    |

---

## 12. Exemple complet

```php
if (isset($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
} else {
    $lang = 'fr';
}

echo "Langue : $lang";
```

---

## 13. Résumé

* `$_COOKIE` contient les cookies envoyés par le navigateur
* C’est un tableau associatif
* Il est en lecture seule côté PHP
* Il est souvent utilisé avec `setcookie()`

📌 **Règle d’or** : ne jamais faire confiance aux données de `$_COOKIE`.
