# La ressource spéciale `php://input` en PHP

En PHP, **`php://input`** est une ressource spéciale qui permet de **lire le corps brut d’une requête HTTP**. Elle est particulièrement utile pour les API REST et les données JSON envoyées par POST, PUT ou PATCH.

---

## 1. Qu’est-ce que `php://input` ?

* C’est un **flux en lecture seule** qui contient le contenu brut de la requête HTTP.
* Contrairement à `$_POST`, il fonctionne même si les données ne sont pas encodées en `application/x-www-form-urlencoded` (ex. JSON, XML, texte brut).
* On l’utilise souvent avec `file_get_contents()` pour récupérer le corps complet de la requête.

---

## 2. Exemple concret avec JSON

### Requête envoyée par le client :

```http
POST /api/user HTTP/1.1
Content-Type: application/json

{"username": "Alice", "age": 25}
```

### Côté PHP :

```php
<?php
// Lire le corps brut de la requête
$input = file_get_contents('php://input');

// Convertir le JSON en tableau associatif PHP
$data = json_decode($input, true);

echo $data['username']; // Alice
echo $data['age'];      // 25
?>
```

---

## 3. Différence avec `$_POST`

| Élément                  | `$_POST`                                                     | `php://input`                          |
| ------------------------ | ------------------------------------------------------------ | -------------------------------------- |
| Type de données          | `application/x-www-form-urlencoded` ou `multipart/form-data` | Tous types (JSON, XML, texte, binaire) |
| Accès aux données brutes | Non                                                          | Oui                                    |
| Flux unique              | Non                                                          | Oui, lecture une seule fois            |

> Astuce : après avoir lu `php://input`, le flux est consommé et ne peut plus être relu.

---

## 4. Bonnes pratiques

1. Utiliser `php://input` pour les API REST qui reçoivent du JSON.
2. Toujours vérifier et valider le JSON avec `json_decode()` et gérer les erreurs.
3. Ne pas utiliser pour les formulaires HTML classiques (`application/x-www-form-urlencoded`) → là `$_POST` suffit.
4. Ne lire le flux qu’une seule fois pour éviter les problèmes.

---

## 5. Exemple pratique complet

```php
<?php
header('Content-Type: application/json');

// Lire le corps de la requête
$input = file_get_contents('php://input');

// Décoder le JSON en tableau PHP
$data = json_decode($input, true);

if (!$data || !isset($data['username'])) {
    http_response_code(400);
    echo json_encode(['error' => 'invalid_request']);
    exit;
}

// Utilisation des données
echo json_encode([
    'message' => 'Utilisateur reçu',
    'username' => $data['username']
]);
?>
```

---

## 6. Conclusion

**`php://input`** est essentiel pour lire le corps brut d’une requête HTTP en PHP, notamment pour :

* Les API REST qui envoient du JSON.
* Les flux PUT ou PATCH.
* Les formats non standards qui ne passent pas par `$_POST`.

Associé à `json_decode()`, il permet de transformer facilement le corps de la requête en tableau PHP exploitable.
