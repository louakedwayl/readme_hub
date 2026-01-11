# La fonction `json_encode()` en PHP

La fonction `json_encode()` permet de **convertir des données PHP en format JSON**, ce qui est très utile pour les échanges entre serveur et client (API, JavaScript, AJAX, etc.).

---

## 1. Syntaxe

```php
string json_encode(mixed $value, int $flags = 0, int $depth = 512)
```

* `$value` : La donnée PHP à convertir (tableau, objet, string, etc.).
* `$flags` (optionnel) : Options supplémentaires pour contrôler le formatage.
* `$depth` (optionnel) : Profondeur maximale d'encodage pour les structures imbriquées (par défaut 512).

---

## 2. Types de données supportés

| Type PHP                    | Résultat JSON                        |
|-----------------------------|--------------------------------------|
| `array` (numérique)         | Tableau JSON `[1, 2, 3]`             |
| `array` (associatif)        | Objet JSON `{"key":"value"}`         |
| `string`                    | String JSON `"texte"`                |
| `int`, `float`              | Nombre JSON `42`, `3.14`             |
| `bool`                      | Booléen JSON `true`, `false`         |
| `null`                      | `null`                               |
| `object` (stdClass)         | Objet JSON `{"prop":"value"}`        |

---

## 3. Exemples d'utilisation

### a) Encoder un tableau numérique

```php
<?php
$fruits = ["pomme", "banane", "orange"];
$json = json_encode($fruits);

echo $json;
// ["pomme","banane","orange"]
?>
```

### b) Encoder un tableau associatif

```php
<?php
$user = [
    "nom" => "Alice",
    "age" => 25,
    "ville" => "Paris"
];
$json = json_encode($user);

echo $json;
// {"nom":"Alice","age":25,"ville":"Paris"}
?>
```

### c) Encoder un objet PHP

```php
<?php
$user = new stdClass();
$user->nom = "Bob";
$user->age = 30;
$user->actif = true;

$json = json_encode($user);

echo $json;
// {"nom":"Bob","age":30,"actif":true}
?>
```

### d) Encoder un tableau multidimensionnel

```php
<?php
$data = [
    "utilisateur" => [
        "nom" => "Charlie",
        "contact" => [
            "email" => "charlie@example.com",
            "tel" => "0123456789"
        ]
    ],
    "role" => "admin"
];

$json = json_encode($data);

echo $json;
// {"utilisateur":{"nom":"Charlie","contact":{"email":"charlie@example.com","tel":"0123456789"}},"role":"admin"}
?>
```

---

## 4. Options (flags) importantes

### a) `JSON_PRETTY_PRINT` : Formatage lisible

```php
<?php
$data = ["nom" => "Alice", "age" => 25];
$json = json_encode($data, JSON_PRETTY_PRINT);

echo $json;
/*
{
    "nom": "Alice",
    "age": 25
}
*/
?>
```

### b) `JSON_UNESCAPED_UNICODE` : Conserver les caractères UTF-8

```php
<?php
$data = ["nom" => "François", "ville" => "Montréal"];

// Sans le flag
echo json_encode($data);
// {"nom":"Fran\u00e7ois","ville":"Montr\u00e9al"}

// Avec le flag
echo json_encode($data, JSON_UNESCAPED_UNICODE);
// {"nom":"François","ville":"Montréal"}
?>
```

### c) `JSON_UNESCAPED_SLASHES` : Ne pas échapper les slashes

```php
<?php
$data = ["url" => "https://example.com/path"];

// Sans le flag
echo json_encode($data);
// {"url":"https:\/\/example.com\/path"}

// Avec le flag
echo json_encode($data, JSON_UNESCAPED_SLASHES);
// {"url":"https://example.com/path"}
?>
```

### d) `JSON_NUMERIC_CHECK` : Convertir les chaînes numériques

```php
<?php
$data = ["age" => "25", "prix" => "19.99"];

// Sans le flag
echo json_encode($data);
// {"age":"25","prix":"19.99"}

// Avec le flag
echo json_encode($data, JSON_NUMERIC_CHECK);
// {"age":25,"prix":19.99}
?>
```

### e) `JSON_FORCE_OBJECT` : Forcer un objet JSON

```php
<?php
$data = []; // Tableau vide

// Sans le flag
echo json_encode($data);
// []

// Avec le flag
echo json_encode($data, JSON_FORCE_OBJECT);
// {}
?>
```

### f) `JSON_THROW_ON_ERROR` : Lancer une exception (PHP 7.3+)

```php
<?php
try {
    $data = ["nom" => "\xB1\x31"]; // Données UTF-8 invalides
    $json = json_encode($data, JSON_THROW_ON_ERROR);
} catch (JsonException $e) {
    echo "Erreur : " . $e->getMessage();
    // Erreur : Malformed UTF-8 characters, possibly incorrectly encoded
}
?>
```

---

## 5. Combiner plusieurs flags

Utilisez le pipe `|` pour combiner plusieurs options :

```php
<?php
$data = [
    "nom" => "François",
    "url" => "https://example.com/path",
    "age" => "30"
];

$json = json_encode($data, 
    JSON_PRETTY_PRINT | 
    JSON_UNESCAPED_UNICODE | 
    JSON_UNESCAPED_SLASHES |
    JSON_NUMERIC_CHECK
);

echo $json;
/*
{
    "nom": "François",
    "url": "https://example.com/path",
    "age": 30
}
*/
?>
```

---

## 6. Cas d'usage pratique : Répondre à une requête AJAX

### Exemple simple

```php
<?php
header('Content-Type: application/json');

$response = [
    'success' => true,
    'message' => 'Utilisateur créé',
    'data' => [
        'id' => 123,
        'username' => 'alice'
    ]
];

echo json_encode($response);
/*
{"success":true,"message":"Utilisateur créé","data":{"id":123,"username":"alice"}}
*/
?>
```

### Exemple avec gestion d'erreur

```php
<?php
header('Content-Type: application/json');

function sendJsonResponse($success, $message, $data = null, $statusCode = 200) {
    http_response_code($statusCode);
    
    $response = [
        'success' => $success,
        'message' => $message
    ];
    
    if ($data !== null) {
        $response['data'] = $data;
    }
    
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
    exit;
}

// Utilisation
if ($username_exists) {
    sendJsonResponse(false, 'Ce nom d\'utilisateur existe déjà', null, 400);
} else {
    sendJsonResponse(true, 'Inscription réussie', ['user_id' => 42], 201);
}
?>
```

---

## 7. Gestion des erreurs

### Vérifier les erreurs avec `json_last_error()`

```php
<?php
$data = ["nom" => "\xB1\x31"]; // UTF-8 invalide
$json = json_encode($data);

if ($json === false) {
    echo "Erreur : " . json_last_error_msg();
    // Erreur : Malformed UTF-8 characters, possibly incorrectly encoded
}
?>
```

### Codes d'erreur courants

| Code                          | Signification                               |
|-------------------------------|---------------------------------------------|
| `JSON_ERROR_NONE`             | Aucune erreur                               |
| `JSON_ERROR_DEPTH`            | Profondeur maximale dépassée                |
| `JSON_ERROR_UTF8`             | Encodage UTF-8 invalide                     |
| `JSON_ERROR_RECURSION`        | Référence récursive détectée                |
| `JSON_ERROR_INF_OR_NAN`       | Valeur infinie ou NaN                       |
| `JSON_ERROR_UNSUPPORTED_TYPE` | Type non supporté (ex: ressource)           |

---

## 8. Différences array numérique vs associatif

```php
<?php
// Tableau numérique → Array JSON
$arr1 = [1, 2, 3];
echo json_encode($arr1);
// [1,2,3]

// Tableau associatif → Objet JSON
$arr2 = ["a" => 1, "b" => 2];
echo json_encode($arr2);
// {"a":1,"b":2}

// Tableau avec index numériques non consécutifs → Objet JSON
$arr3 = [0 => "a", 2 => "b", 5 => "c"];
echo json_encode($arr3);
// {"0":"a","2":"b","5":"c"}

// Forcer un array en objet
$arr4 = [1, 2, 3];
echo json_encode($arr4, JSON_FORCE_OBJECT);
// {"0":1,"1":2,"2":3}
?>
```

---

## 9. Problèmes courants et solutions

### a) Caractères accentués encodés

**Problème :**
```php
echo json_encode(["nom" => "François"]);
// {"nom":"Fran\u00e7ois"}
```

**Solution :**
```php
echo json_encode(["nom" => "François"], JSON_UNESCAPED_UNICODE);
// {"nom":"François"}
```

### b) Tableau vide devient `[]` au lieu de `{}`

**Problème :**
```php
$data = ["users" => []];
echo json_encode($data);
// {"users":[]}
```

**Solution :**
```php
$data = ["users" => new stdClass()];
echo json_encode($data);
// {"users":{}}
```

### c) Ressources non supportées

**Problème :**
```php
$file = fopen("test.txt", "r");
echo json_encode(["file" => $file]);
// false (erreur)
```

**Solution :**
Ne pas encoder les ressources, encoder seulement les données extraites.

---

## 10. Tableau récapitulatif des flags

| Flag                          | Description                                    |
|-------------------------------|------------------------------------------------|
| `JSON_PRETTY_PRINT`           | Formate le JSON avec indentation               |
| `JSON_UNESCAPED_UNICODE`      | Ne pas échapper les caractères Unicode         |
| `JSON_UNESCAPED_SLASHES`      | Ne pas échapper les `/`                        |
| `JSON_NUMERIC_CHECK`          | Convertir les strings numériques en nombres    |
| `JSON_FORCE_OBJECT`           | Forcer un objet au lieu d'un tableau           |
| `JSON_THROW_ON_ERROR`         | Lancer une exception en cas d'erreur (PHP 7.3+)|
| `JSON_HEX_TAG`                | Convertir `<` et `>` en `\u003C` et `\u003E`   |
| `JSON_HEX_AMP`                | Convertir `&` en `\u0026`                      |
| `JSON_HEX_QUOT`               | Convertir `"` en `\u0022`                      |
| `JSON_PARTIAL_OUTPUT_ON_ERROR`| Encoder partiellement en cas d'erreur          |

---

## 11. Bonnes pratiques

✅ **Toujours définir le header `Content-Type: application/json`** pour les réponses API  
✅ **Utiliser `JSON_UNESCAPED_UNICODE`** pour éviter l'échappement des accents  
✅ **Utiliser `JSON_THROW_ON_ERROR`** (PHP 7.3+) pour une meilleure gestion des erreurs  
✅ **Valider les données avant l'encodage** (éviter les ressources, objets complexes)  
✅ **Utiliser `JSON_PRETTY_PRINT`** uniquement en développement (impact sur la taille)  
✅ **Combiner les flags avec `|`** pour plus de contrôle  

---

## 12. Exemple complet : API REST

```php
<?php
header('Content-Type: application/json; charset=utf-8');

try {
    // Simuler une récupération de données
    $users = [
        ['id' => 1, 'nom' => 'François', 'email' => 'francois@example.com'],
        ['id' => 2, 'nom' => 'Marie', 'email' => 'marie@example.com']
    ];
    
    $response = [
        'success' => true,
        'count' => count($users),
        'data' => $users
    ];
    
    echo json_encode(
        $response,
        JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR
    );
    
} catch (JsonException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Erreur lors de l\'encodage JSON'
    ]);
}
?>
```

---

## 13. Résumé rapide

| Besoin                              | Solution                                       |
|-------------------------------------|------------------------------------------------|
| PHP → JSON                          | `json_encode($data)`                           |
| JSON lisible (debug)                | `json_encode($data, JSON_PRETTY_PRINT)`        |
| Conserver les accents               | `JSON_UNESCAPED_UNICODE`                       |
| Ne pas échapper les URL             | `JSON_UNESCAPED_SLASHES`                       |
| Convertir strings en nombres        | `JSON_NUMERIC_CHECK`                           |
| Forcer un objet `{}`                | `JSON_FORCE_OBJECT`                            |
| Gérer les erreurs (PHP 7.3+)        | `JSON_THROW_ON_ERROR`                          |
| Vérifier les erreurs                | `json_last_error()` et `json_last_error_msg()` |

---

**Conclusion** : `json_encode()` est essentiel pour créer des API et envoyer des données au client. Pensez à combiner les flags pour un résultat optimal ! 🎯
