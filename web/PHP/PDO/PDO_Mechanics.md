# PDO et PDOStatement

## 1. Introduction : Qui fait quoi ?

En PHP, quand on travaille avec une base de données, on manipule deux objets bien distincts. Il est crucial de ne pas mélanger leurs rôles.

### L'Analogie du Restaurant 👨‍🍳
* **La Classe `PDO` (Le Manager / Le Restaurant)** : C'est l'établissement lui-même. Il ouvre la porte (connexion), gère les transactions et prépare les commandes.
* **La Classe `PDOStatement` (Le Bon de Commande)** : C'est une commande spécifique pour une table précise. Une fois que le Manager a créé le bon, c'est ce bon qui voyage, qui reçoit les ingrédients (paramètres) et qui revient avec le plat (données).

---

## 2. L'Objet `PDO` (Le Patron)

C'est ton point d'entrée. Tu l'instancies une seule fois au début du script (via `Database::getConnection()`).

**Ses méthodes principales :**
* `prepare()` : La plus importante. Elle fabrique un objet `PDOStatement`.
* `beginTransaction()`, `commit()`, `rollBack()` : Pour gérer les transactions bancaires/complexes.
* `lastInsertId()` : Pour récupérer l'ID qui vient d'être créé.

```php
// $pdo est un objet de la classe PDO
$pdo = new PDO(...); 

// Le Manager crée un Bon de Commande (Statement)
// $stmt devient un objet de la classe PDOStatement
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
