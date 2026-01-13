# La Méthode `query()` en PDO

## 1. Définition

La méthode **`query()`** en PDO permet d'envoyer **directement une requête SQL** à la base de données **sans la préparer au préalable**.

* Utilisée principalement pour des requêtes **fixes** ou qui ne contiennent **pas de valeurs externes**
* Retourne un objet **PDOStatement** si la requête réussit, ou **false** en cas d'erreur

```php
$stmt = $pdo->query("SELECT * FROM users");
$allUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);
```

---

## 2. Caractéristiques principales

* **Pas de préparation** : la requête est exécutée telle quelle
* **Sécurité limitée** : déconseillé pour les requêtes contenant des données externes (risque d'injection SQL)
* **Retour** : un objet **PDOStatement**, utilisable pour récupérer les résultats avec `fetch()` ou `fetchAll()`
* **Simplicité** : très pratique pour les requêtes rapides et fixes

---

## 3. Comparaison avec `prepare()` + `execute()`

| Méthode                   | Prépare la requête ? | Paramètres possibles ? | Sécurité                             | Réutilisable |
| ------------------------- | -------------------- | ---------------------- | ------------------------------------ | ------------ |
| `prepare()` + `execute()` | Oui                  | Oui (`:param` ou `?`)  | Très sécurisé                        | Oui          |
| `query()`                 | Non                  | Non                    | Moins sécurisé si variables externes | Non          |

---

## 4. Exemple concret

### a) Requête simple avec `query()`

```php
$stmt = $pdo->query("SELECT id, username FROM users");
while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $user['username'] . "\n";
}
```

### b) Récupérer toutes les lignes d'un coup

```php
$stmt = $pdo->query("SELECT id, username FROM users");
$allUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($allUsers);
```

---

## 5. Bonnes pratiques

* Utiliser `query()` uniquement pour les requêtes **fixes et sûres**
* Pour toutes les requêtes contenant des données provenant d'une source externe, **préférer `prepare()` + `execute()`**
* Toujours vérifier que `$stmt` n'est pas `false` avant d'utiliser `fetch()` ou `fetchAll()`
