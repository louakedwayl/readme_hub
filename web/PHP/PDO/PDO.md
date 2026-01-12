# Cours PHP – PDO (PHP Data Objects)

## 1. Qu’est-ce que PDO ?

**PDO (PHP Data Objects)** est une extension PHP qui fournit une **interface uniforme** pour accéder aux bases de données.

Elle permet de se connecter et d’interagir avec différents SGBD :

* MySQL / MariaDB
* PostgreSQL
* SQLite
* SQL Server
* Oracle (selon drivers)

👉 L’intérêt principal : **écrire un code plus sécurisé, plus propre et plus portable**.

---

## 2. Pourquoi utiliser PDO ?

### Avantages principaux

* 🔒 **Sécurité** : protection contre les injections SQL grâce aux requêtes préparées
* 🔁 **Portabilité** : même API pour plusieurs bases de données
* 🧹 **Code plus lisible** que `mysqli`
* ⚠️ **Gestion des erreurs** centralisée avec les exceptions

⚠️ Contrairement à `mysqli`, PDO ne supporte **pas les procédures stockées spécifiques à MySQL** de façon avancée.

---

## 3. Activer PDO

PDO est généralement activé par défaut.

Pour vérifier :

```bash
php -m | grep pdo
```

Ou dans `phpinfo()` :

```php
<?php phpinfo(); ?>
```

---

## 4. Connexion à une base de données

### DSN (Data Source Name)

La chaîne DSN décrit la base à laquelle se connecter.

Exemple MySQL :

```text
mysql:host=localhost;dbname=test;charset=utf8mb4
```

### Connexion basique

```php
<?php
$dsn = 'mysql:host=localhost;dbname=test;charset=utf8mb4';
$user = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $user, $password);
    echo "Connexion réussie";
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
```

---

## 5. Options importantes de PDO

```php
$pdo = new PDO($dsn, $user, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
]);
```

### Explication

| Option             | Rôle                                          |
| ------------------ | --------------------------------------------- |
| `ATTR_ERRMODE`     | Gestion des erreurs (exceptions recommandées) |
| `FETCH_ASSOC`      | Résultats sous forme de tableaux associatifs  |
| `EMULATE_PREPARES` | Utiliser les vraies requêtes préparées        |

---

## 6. Exécuter une requête simple (query)

Utilisé quand **il n’y a pas de données utilisateur**.

```php
$sql = 'SELECT * FROM users';
$stmt = $pdo->query($sql);

$users = $stmt->fetchAll();
```

⚠️ À éviter avec des données dynamiques.

---

## 7. Requêtes préparées (prepare / execute)

### Pourquoi ?

* Sécurité contre l’injection SQL
* Meilleures performances pour requêtes répétées

### Exemple SELECT

```php
$sql = 'SELECT * FROM users WHERE email = :email';
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'email' => 'test@mail.com'
]);

$user = $stmt->fetch();
```

---

## 8. Bind des paramètres

### bindValue

```php
$stmt->bindValue(':id', 5, PDO::PARAM_INT);
```

### bindParam (par référence)

```php
$id = 5;
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
```

| Méthode   | Différence                  |
| --------- | --------------------------- |
| bindValue | Valeur immédiate            |
| bindParam | Variable liée par référence |

---

## 9. INSERT, UPDATE, DELETE

### INSERT

```php
$sql = 'INSERT INTO users (name, email) VALUES (:name, :email)';
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'name' => 'Wayl',
    'email' => 'wayl@mail.com'
]);

$id = $pdo->lastInsertId();
```

### UPDATE

```php
$sql = 'UPDATE users SET name = :name WHERE id = :id';
$stmt->execute([
    'name' => 'Nouveau nom',
    'id' => 1
]);
```

### DELETE

```php
$sql = 'DELETE FROM users WHERE id = :id';
$stmt->execute(['id' => 1]);
```

---

## 10. Récupération des résultats

```php
$stmt->fetch();        // Une ligne
$stmt->fetchAll();     // Toutes les lignes
```

Modes courants :

* `PDO::FETCH_ASSOC`
* `PDO::FETCH_OBJ`
* `PDO::FETCH_BOTH`

Exemple objet :

```php
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
```

---

## 11. Gestion des erreurs

```php
try {
    $stmt->execute();
} catch (PDOException $e) {
    echo $e->getMessage();
}
```

👉 Toujours activer `ERRMODE_EXCEPTION`.

---

## 12. Transactions

Utile pour garantir la cohérence des données.

```php
try {
    $pdo->beginTransaction();

    $pdo->exec("INSERT INTO accounts VALUES (1, 100)");
    $pdo->exec("INSERT INTO accounts VALUES (2, 200)");

    $pdo->commit();
} catch (Exception $e) {
    $pdo->rollBack();
}
```

---

## 13. Sécurité – Bonnes pratiques

✅ Toujours utiliser des requêtes préparées

❌ Ne jamais concaténer les entrées utilisateur

```php
// MAUVAIS
$sql = "SELECT * FROM users WHERE id = $id";
```

```php
// BON
$sql = "SELECT * FROM users WHERE id = :id";
```

---

## 14. Exemple de classe PDO simple

```php
class Database {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = new PDO(
            'mysql:host=localhost;dbname=test;charset=utf8mb4',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }

    public function query(string $sql, array $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}
```

---

## 15. PDO vs MySQLi

| PDO                | MySQLi           |
| ------------------ | ---------------- |
| Multi-SGBD         | MySQL uniquement |
| Requêtes préparées | Oui              |
| Orienté objet      | Oui              |
| Procédures MySQL   | Limité           |

---

## 16. À retenir

* PDO est **la norme moderne** en PHP
* Sécurise les accès base de données
* Indispensable pour MVC / frameworks

---

📌 **Prochaine étape conseillée** :

* PDO + MVC
* Repository pattern
* ORM (Doctrine, Eloquent)
