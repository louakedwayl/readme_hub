# PDO & Data Handling: Technical Reference

## 1. HTTP Data Handling (Frontend to Backend)

La méthode de récupération coté PHP dépend strictement du Header `Content-Type` envoyé par le client.

| Client JS (Method) | Header Envoyé | Superglobale PHP | Action requise |
| :--- | :--- | :--- | :--- |
| **`new FormData()`** | `multipart/form-data` | `$_POST` | Aucune (Natif) |
| **JSON** | `application/json` | **Vide** | `json_decode(file_get_contents('php://input'), true)` |

---

## 2. PDO vs PDOStatement

Deux classes distinctes gèrent l'interaction BDD.

### A. Classe `PDO` (Connection Layer)
Représente la connexion active.
* **Rôle** : Configuration, Transactions, Préparation des requêtes.
* **Méthode clé** : `$pdo->prepare($sql)` -> Retourne un objet `PDOStatement`.

### B. Classe `PDOStatement` (Query Layer)
Représente une requête préparée spécifique.
* **Rôle** : Binding des paramètres, Exécution, Récupération des résultats (Cursor).
* **Cycle de vie** : `Prepare` -> `Bind` -> `Execute` -> `Fetch`.

---

## 3. Méthodes de Récupération (Fetch API)

Ces méthodes s'appellent sur l'objet `$statement` **après** un `$statement->execute()`.

### `fetch()`
Récupère la **prochaine ligne** du jeu de résultats.
* **Retour** : `array` (mixte par défaut) ou `false` (si fin de curseur).
* **Usage** : Boucles `while`, ou récupération d'une entité complète (`SELECT *`).

### `fetchColumn()`
Récupère **une seule colonne** de la prochaine ligne (la 1ère par défaut).
* **Retour** : `string|int|float|bool` (scalaire) ou `false`.
* **Usage** : Vérifications d'existence (`SELECT 1`), Compteurs (`COUNT`), Récupération d'un champ unique (Password hash).

### `fetchAll()`
Récupère **toutes les lignes restantes** dans un tableau multidimensionnel.
* **Retour** : `array` (d'arrays).
* **Usage** : Listes complètes à envoyer en JSON ou à itérer.
* **Note** : Gourmand en RAM sur les gros volumes.

### `rowCount()`
Retourne le nombre de lignes affectées par la dernière opération SQL.
* **Retour** : `int`.
* **Usage** : Pour `UPDATE`, `DELETE`, `INSERT`. (Pas fiable sur `SELECT` selon les drivers SGBD).

---

## 4. Snippet : Flux de vérification (Best Practice)

```php
public function userExists(string $email): bool
{
    // 1. Prepare (PDO)
    $stmt = $this->pdo->prepare("SELECT 1 FROM users WHERE email = :email LIMIT 1");
    
    // 2. Execute (PDOStatement) - Retourne bool (Succès technique)
    $stmt->execute([':email' => $email]);
    
    // 3. Fetch (PDOStatement) - Retourne valeur ou false
    return (bool) $stmt->fetchColumn();
}
