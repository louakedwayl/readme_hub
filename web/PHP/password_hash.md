# La fonction `password_hash()` en PHP

## 1. Définition

`password_hash()` est une **fonction native de PHP** qui permet de **hacher un mot de passe de manière sécurisée** pour le stocker dans une base de données.

* Le hachage est **à sens unique** : on ne peut pas retrouver le mot de passe original à partir du hash.
* La fonction génère automatiquement un **salt** intégré pour renforcer la sécurité.

---

## 2. Syntaxe

```php
string password_hash(string $password, int $algo, array $options = []);
```

* `$password` : le mot de passe en clair à hacher
* `$algo` : l’algorithme de hachage (`PASSWORD_DEFAULT`, `PASSWORD_BCRYPT`, etc.)
* `$options` : options supplémentaires (ex : `'cost'` pour bcrypt)
* Retour : **chaîne de caractères** représentant le hash sécurisé

---

## 3. Exemple d’utilisation

### a) Hachage d’un mot de passe

```php
$password = "monMotDePasse123";
$hash = password_hash($password, PASSWORD_DEFAULT);

echo $hash;
// Exemple de sortie : $2y$10$E1aQjG3FJx4kWl9uFj0Y2uO8k9G
```

### b) Vérification d’un mot de passe

```php
if (password_verify($password, $hash)) {
    echo "Mot de passe correct !";
} else {
    echo "Mot de passe incorrect !";
}
```

* `password_verify()` compare le mot de passe en clair avec le hash stocké
* Retourne `true` si le mot de passe correspond, `false` sinon

---

## 4. Bonnes pratiques

* Toujours utiliser **`PASSWORD_DEFAULT`** pour bénéficier de l’algorithme recommandé par PHP
* Ne jamais stocker le mot de passe en clair dans la base de données
* Vérifier le mot de passe avec `password_verify()` lors de l’authentification
* Pour bcrypt, on peut régler le **`cost`** pour ajuster la difficulté du hachage (par défaut 10)

```php
$options = ['cost' => 12];
$hash = password_hash($password, PASSWORD_BCRYPT, $options);
```

---

## 5. Résumé pour fiche

> **`password_hash()` : fonction native PHP pour hacher un mot de passe de manière sécurisée.
> `password_verify()` : permet de vérifier qu’un mot de passe correspond au hash stocké.**
