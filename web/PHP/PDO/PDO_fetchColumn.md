# La Méthode `fetchColumn()` en PDO

## 1. Définition

La méthode **`fetchColumn()`** permet de récupérer **la valeur d’une seule colonne** de la prochaine ligne d’un résultat SQL.

* Idéal lorsque vous n'avez besoin que d'une **valeur unique** (ex : COUNT(*), id, etc.)
* Renvoie `false` lorsqu'il n'y a plus de lignes

```php
$stmt = $pdo->query("SELECT COUNT(*) FROM users");
$count = $stmt->fetchColumn(); // ex : 42
```

---

## 2. Syntaxe

```php
public mixed PDOStatement::fetchColumn([ int $column_number = 0 ])
```

* `$column_number` (optionnel) : index de la colonne à récupérer (0 par défaut)
* Retour : **valeur de la colonne** ou `false` si fin de résultat

---

## 3. Exemples pratiques

### a) Récupérer le nombre d’utilisateurs

```php
$stmt = $pdo->query("SELECT COUNT(*) FROM users");
$count = $stmt->fetchColumn();
echo "Nombre d'utilisateurs : $count";
```

### b) Récupérer la première colonne d’une table

```php
$stmt = $pdo->query("SELECT id, username FROM users ORDER BY id ASC");
$firstId = $stmt->fetchColumn(); // récupère le premier id
```

### c) Récupérer une autre colonne (ex : 2e colonne)

```php
$stmt = $pdo->query("SELECT id, username FROM users ORDER BY id ASC");
$firstUsername = $stmt->fetchColumn(1); // récupère le username de la première ligne
```

---

## 4. Points importants

* `fetchColumn()` **ne retourne qu’une seule valeur à la fois**
* Si tu veux **plusieurs lignes ou colonnes**, utiliser `fetch()` ou `fetchAll()`
* Très pratique pour des **requêtes d’agrégat** ou **récupération de valeur unique**

---

## 5. Bonnes pratiques

* Utiliser `fetchColumn()` pour **obtenir rapidement une valeur unique**
* Toujours vérifier que la requête a bien renvoyé un résultat avant d’utiliser la valeur

```php
$stmt = $pdo->query("SELECT COUNT(*) FROM users");
if ($stmt !== false) {
    $count = $stmt->fetchColumn();
    echo $count;
}
```
