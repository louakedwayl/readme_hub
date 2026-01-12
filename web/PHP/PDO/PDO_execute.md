# La méthode `execute()` en PDO

## 1️⃣ Qu'est-ce que `execute()` ?

La méthode `execute()` sert à exécuter une requête préparée (`prepare()`) ou un objet `PDOStatement`.

* Elle envoie la requête SQL à la base de données.
* Elle peut prendre en paramètre un tableau de valeurs à lier aux placeholders de la requête préparée.

## 2️⃣ Syntaxe générale

```php
$stmt->execute(array $params = []);
```

* `$params` (optionnel) : tableau associatif ou indexé contenant les valeurs à lier aux paramètres de la requête.
* Retourne `true` si l'exécution a réussi, `false` sinon.

## 3️⃣ Pourquoi utiliser `execute()` ?

### 🔹 Sécurité
* Sépare les données utilisateurs de la requête SQL.
* Protège contre les injections SQL.

### 🔹 Flexibilité
* Permet d'exécuter plusieurs fois une requête préparée avec des valeurs différentes.

## 4️⃣ Exemple simple avec paramètres nommés

**Requête SQL**
```sql
SELECT * FROM users WHERE username = :username
```

**Code PHP**
```php
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");

$stmt->execute([
    ':username' => $username
]);

$result = $stmt->fetch(PDO::FETCH_ASSOC);
```

## 5️⃣ Exemple avec paramètres positionnels

**Requête SQL**
```sql
SELECT * FROM users WHERE username = ?
```

**Code PHP**
```php
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");

$stmt->execute([$username]);

$result = $stmt->fetch(PDO::FETCH_ASSOC);
```

## 6️⃣ Exécuter plusieurs fois la même requête

```php
$stmt = $pdo->prepare("INSERT INTO users (username, email) VALUES (:username, :email)");

$data = [
    ['username' => 'Alice', 'email' => 'alice@example.com'],
    ['username' => 'Bob', 'email' => 'bob@example.com']
];

foreach ($data as $user) {
    $stmt->execute($user);
}
```

## 7️⃣ Gestion des erreurs

```php
if ($stmt->execute([':username' => $username])) {
    echo "Succès !";
} else {
    $errorInfo = $stmt->errorInfo();
    echo "Erreur SQL : " . $errorInfo[2];
}
```

## 8️⃣ Différence avec `query()`

| Méthode | Utilisation |
|---------|-------------|
| `execute()` | Pour une requête préparée avec variables |
| `query()` | Pour une requête statique sans variable |

## 9️⃣ Bonnes pratiques

* Toujours utiliser avec `prepare()` pour des données utilisateurs.
* Pour plusieurs exécutions, lier les valeurs via `execute([...])` ou `bindParam()`.
* Toujours vérifier le retour (`true` / `false`) pour gérer les erreurs.

## 🔟 Exemple complet

```php
// Préparer la requête
$stmt = $pdo->prepare("SELECT COUNT(*) as count FROM users WHERE username = :username");

// Exécuter avec une valeur
$stmt->execute([':username' => $username]);

// Récupérer le résultat
$result = $stmt->fetch(PDO::FETCH_ASSOC);

echo $result['count'];
```

## 🧠 Conclusion

* `execute()` est la méthode qui lance réellement la requête.
* Associée à `prepare()`, elle assure sécurité, lisibilité et flexibilité.
* Indispensable pour toutes les requêtes avec variables.
