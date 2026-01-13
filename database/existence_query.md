# Les Requêtes d'Existence en SQL

## 1. Définition

Une **requête d'existence** sert à **vérifier si une ou plusieurs lignes correspondant à un critère existent dans une table**.

- On ne récupère pas forcément toutes les colonnes de la table
- Elle est souvent utilisée pour **vérifier l'existence d'un utilisateur, d'un produit, ou d'une condition particulière** avant de continuer une opération

---

## 2. Syntaxes courantes

### a) Avec `SELECT 1 ... LIMIT 1`
```sql
SELECT 1
FROM users
WHERE username = 'alice'
LIMIT 1;
```

**Explication :**
- `1` = valeur constante, juste pour vérifier l'existence
- `LIMIT 1` = ne récupérer qu'une seule ligne
- **Avantage** : rapide, car la base s'arrête dès qu'une ligne est trouvée

### b) Avec `EXISTS`
```sql
SELECT EXISTS(
    SELECT 1
    FROM users
    WHERE username = 'alice'
) AS user_exists;
```

**Explication :**
- Renvoie `TRUE` si la ligne existe, `FALSE` sinon
- Très pratique pour les sous-requêtes et les conditions

### c) Avec `COUNT(*)`
```sql
SELECT COUNT(*) AS total
FROM users
WHERE username = 'alice';
```

**Explication :**
- Renvoie le nombre de lignes correspondantes
- Peut être utilisé pour vérifier l'existence (`total > 0`)
- **Moins performant** que `SELECT 1 ... LIMIT 1` pour juste tester l'existence

---

## 3. Utilisation avec PDO (PHP)
```php
$statement = $pdo->prepare("SELECT 1 FROM users WHERE username = :username LIMIT 1");
$statement->bindParam(':username', $username, PDO::PARAM_STR);
$statement->execute();

$exists = (bool) $statement->fetchColumn();

if ($exists) {
    echo "L'utilisateur existe !";
} else {
    echo "Utilisateur non trouvé.";
}
```

**Explication :**
- `fetchColumn()` récupère la valeur constante `1` si la ligne existe, ou `false` si aucune ligne
- `(bool)` transforme le résultat en `true`/`false`

---

## 4. Bonnes pratiques

✅ Pour tester rapidement l'existence, utiliser `SELECT 1 ... LIMIT 1` ou `EXISTS`

✅ Éviter de récupérer toutes les colonnes (`SELECT *`) si seule l'existence ou le nombre de lignes importe

✅ Toujours limiter le nombre de lignes avec `LIMIT 1` pour les grandes tables

✅ Utiliser des **requêtes préparées** pour éviter les injections SQL

---

## 5. Tableau comparatif

| Méthode                  | Résultat                    | Avantages                                    | Utilisation recommandée          |
|--------------------------|-----------------------------|--------------------------------------------|----------------------------------|
| `SELECT 1 ... LIMIT 1`   | 1 ligne avec valeur fixe    | Très rapide, simple                        | Vérification d'existence simple  |
| `EXISTS(SELECT ...)`     | `TRUE`/`FALSE`              | Directement utilisable dans conditions SQL | Sous-requêtes, conditions WHERE  |
| `COUNT(*)`               | Nombre de lignes            | Utile si on veut savoir combien            | Statistiques, comptages          |

---

## 6. Exemple complet en PHP
```php
<?php
class UserModel
{
    private PDO $pdo;
    
    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }
    
    /**
     * Vérifie si un nom d'utilisateur existe déjà
     * @param string $username
     * @return bool
     */
    public function usernameExists(string $username): bool
    {
        $query = "SELECT 1 FROM users WHERE username = :username LIMIT 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        
        return (bool) $stmt->fetchColumn();
    }
}
```

---

## 7. Points clés à retenir

🔑 **Performance** : `SELECT 1 LIMIT 1` est le plus rapide pour une simple vérification d'existence

🔑 **Lisibilité** : `EXISTS` est plus explicite dans les sous-requêtes SQL complexes

🔑 **Sécurité** : Toujours utiliser des requêtes préparées avec `bindParam()` ou `execute([])`

🔑 **Cast** : Le `(bool)` garantit un retour de type booléen propre
