# La fonction `json_decode()` en PHP

La fonction `json_decode()` permet de **convertir des chaînes JSON en données PHP**, comme des tableaux ou des objets. Elle est souvent utilisée pour traiter les réponses d'API ou les données JSON reçues du client.

---

## 1. Syntaxe

```php
mixed json_decode(string $json, bool $assoc = false, int $depth = 512, int $flags = 0)
```

* `$json` : La chaîne JSON à décoder.
* `$assoc` (optionnel) :
  * `true` : convertit les objets JSON en **tableaux associatifs** PHP.
  * `false` (par défaut) : convertit les objets JSON en **objets PHP**.
* `$depth` (optionnel) : profondeur maximale de décodage (par défaut 512).
* `$flags` (optionnel) : options pour contrôler le décodage (ex. `JSON_BIGINT_AS_STRING`).

---

## 2. Exemples d'utilisation

### a) Décoder un objet JSON en objet PHP

```php
<?php
$json = '{"nom":"Alice", "age":25, "ville":"Paris"}';
$data = json_decode($json);

echo $data->nom;   // Alice
echo $data->age;   // 25
echo $data->ville; // Paris
?>
```

### b) Décoder un objet JSON en tableau associatif

```php
<?php
$json = '{"nom":"Alice", "age":25, "ville":"Paris"}';
$data = json_decode($json, true); // ← true = tableau associatif

echo $data['nom'];   // Alice
echo $data['age'];   // 25
echo $data['ville']; // Paris
?>
```

### c) Décoder un tableau JSON

```php
<?php
$json = '["pomme", "banane", "orange"]';
$fruits = json_decode($json, true);

print_r($fruits);
// Array ( [0] => pomme [1] => banane [2] => orange )
?>
```

### d) Décoder un JSON complexe (imbriqué)

```php
<?php
$json = '{
    "utilisateur": {
        "nom": "Bob",
        "contact": {
            "email": "bob@example.com",
            "tel": "0123456789"
        }
    }
}';

$data = json_decode($json, true);

echo $data['utilisateur']['nom'];              // Bob
echo $data['utilisateur']['contact']['email']; // bob@example.com
?>
```

---

## 3. Gestion des erreurs

Si le JSON est **invalide**, `json_decode()` retourne `null`. Utilisez `json_last_error()` pour connaître l'erreur :

```php
<?php
$json = '{"nom": "Alice", "age": 25,}'; // ← Virgule en trop (invalide)
$data = json_decode($json);

if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
    echo "Erreur JSON : " . json_last_error_msg();
    // Erreur JSON : Syntax error
}
?>
```

### Codes d'erreur courants

| Code                      | Signification                          |
|---------------------------|----------------------------------------|
| `JSON_ERROR_NONE`         | Aucune erreur                          |
| `JSON_ERROR_SYNTAX`       | Erreur de syntaxe JSON                 |
| `JSON_ERROR_DEPTH`        | Profondeur maximale dépassée           |
| `JSON_ERROR_CTRL_CHAR`    | Caractère de contrôle invalide         |
| `JSON_ERROR_UTF8`         | Encodage UTF-8 invalide                |

---

## 4. Cas d'usage pratique : Récupérer des données d'une requête POST

```php
<?php
// Récupérer le body JSON envoyé par fetch()
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (isset($data['username'])) {
    $username = $data['username'];
    echo "Username reçu : $username";
} else {
    echo "Aucun username trouvé";
}
?>
```

### Exemple complet avec validation

```php
<?php
header('Content-Type: application/json');

// Récupérer et décoder le JSON
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Vérifier les erreurs de décodage
if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => 'JSON invalide : ' . json_last_error_msg()
    ]);
    exit;
}

// Valider les données
if (!isset($data['username']) || empty($data['username'])) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => 'Username manquant'
    ]);
    exit;
}

// Traiter les données
$username = trim($data['username']);
echo json_encode([
    'success' => true,
    'message' => "Username '$username' reçu avec succès"
]);
?>
```

---

## 5. Tableau récapitulatif

| **JSON**                                | **`json_decode($json)`** (objet)      | **`json_decode($json, true)`** (tableau) |
|-----------------------------------------|---------------------------------------|------------------------------------------|
| `{"nom":"Alice"}`                       | `$data->nom`                          | `$data['nom']`                           |
| `[1, 2, 3]`                             | `$data[0]`, `$data[1]`                | `$data[0]`, `$data[1]`                   |
| `{"user":{"name":"Bob"}}`               | `$data->user->name`                   | `$data['user']['name']`                  |
| `[{"id":1}, {"id":2}]`                  | `$data[0]->id`                        | `$data[0]['id']`                         |

---

## 6. Différence entre objet et tableau associatif

```php
<?php
$json = '{"nom":"Alice", "age":25}';

// En objet (par défaut)
$obj = json_decode($json);
echo $obj->nom;        // ✅ Fonctionne
echo $obj['nom'];      // ❌ Erreur

// En tableau associatif
$arr = json_decode($json, true);
echo $arr['nom'];      // ✅ Fonctionne
echo $arr->nom;        // ❌ Erreur
?>
```

---

## 7. Options avancées (flags)

```php
<?php
$json = '{"nombre": 9999999999999999999}';

// Sans flag : le grand nombre devient un float (perte de précision)
$data1 = json_decode($json);
echo $data1->nombre; // 1.0E+19

// Avec JSON_BIGINT_AS_STRING : garde le nombre en string
$data2 = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
echo $data2['nombre']; // "9999999999999999999"
?>
```

### Flags disponibles

| Flag                          | Description                                    |
|-------------------------------|------------------------------------------------|
| `JSON_BIGINT_AS_STRING`       | Convertit les grands entiers en string         |
| `JSON_OBJECT_AS_ARRAY`        | Force la conversion en tableau                 |
| `JSON_THROW_ON_ERROR`         | Lance une exception en cas d'erreur (PHP 7.3+) |

---

## 8. Bonnes pratiques

✅ **Toujours vérifier si le JSON est valide** avec `json_last_error()`  
✅ **Utiliser `true` comme 2ᵉ paramètre** pour obtenir des tableaux (plus pratique)  
✅ **Nettoyer et valider les données** après décodage (éviter les injections)  
✅ **Définir le header `Content-Type: application/json`** pour les réponses API  
✅ **Utiliser `JSON_THROW_ON_ERROR`** (PHP 7.3+) pour gérer les erreurs avec try/catch  

---

## 9. Exemple avec `JSON_THROW_ON_ERROR` (PHP 7.3+)

```php
<?php
try {
    $json = '{"nom": "Alice", "age": 25,}'; // JSON invalide
    $data = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
    
    echo $data['nom'];
} catch (JsonException $e) {
    echo "Erreur : " . $e->getMessage();
    // Erreur : Syntax error
}
?>
```

---

## 10. Résumé rapide

| Besoin                              | Solution                                       |
|-------------------------------------|------------------------------------------------|
| JSON → objet PHP                    | `json_decode($json)`                           |
| JSON → tableau associatif           | `json_decode($json, true)`                     |
| Vérifier les erreurs                | `json_last_error()` ou `JSON_THROW_ON_ERROR`   |
| Récupérer body d'une requête POST   | `file_get_contents('php://input')`             |
| Grands nombres                      | Utiliser `JSON_BIGINT_AS_STRING`               |

---

**Conclusion** : `json_decode()` est essentiel pour travailler avec des API et des données JSON. Pensez toujours à valider le JSON et à sécuriser vos données ! 🎯
