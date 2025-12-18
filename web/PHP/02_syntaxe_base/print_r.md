# La fonction print_r() en PHP

## Introduction

`print_r()` est une fonction PHP essentielle pour le débogage et l'inspection de variables. Elle affiche des informations sur une variable de manière lisible par l'humain, ce qui la rend particulièrement utile pour comprendre la structure de tableaux et d'objets complexes.

## Syntaxe de base

```php
print_r(mixed $expression, bool $return = false): string|bool
```

### Paramètres

- **$expression** : La variable à afficher (peut être de n'importe quel type)
- **$return** (optionnel) : Si `true`, retourne le résultat au lieu de l'afficher directement

### Valeur de retour

- Si `$return` est `false` (par défaut) : retourne `true` et affiche le résultat
- Si `$return` est `true` : retourne la représentation sous forme de chaîne

## Utilisation de base

### Affichage simple

```php
$nombre = 42;
print_r($nombre);
// Affiche : 42
```

### Avec des tableaux

```php
$fruits = ["pomme", "banane", "orange"];
print_r($fruits);

/* Affiche :
Array
(
    [0] => pomme
    [1] => banane
    [2] => orange
)
*/
```

## Utilisation avec différents types de données

### Tableaux indexés

```php
$nombres = [10, 20, 30, 40];
print_r($nombres);

/* Affiche :
Array
(
    [0] => 10
    [1] => 20
    [2] => 30
    [3] => 40
)
*/
```

### Tableaux associatifs

```php
$personne = [
    "nom" => "Dupont",
    "prenom" => "Jean",
    "age" => 30
];
print_r($personne);

/* Affiche :
Array
(
    [nom] => Dupont
    [prenom] => Jean
    [age] => 30
)
*/
```

### Tableaux multidimensionnels

```php
$etudiants = [
    [
        "nom" => "Martin",
        "notes" => [15, 18, 16]
    ],
    [
        "nom" => "Durand",
        "notes" => [12, 14, 13]
    ]
];
print_r($etudiants);

/* Affiche :
Array
(
    [0] => Array
        (
            [nom] => Martin
            [notes] => Array
                (
                    [0] => 15
                    [1] => 18
                    [2] => 16
                )
        )
    [1] => Array
        (
            [nom] => Durand
            [notes] => Array
                (
                    [0] => 12
                    [1] => 14
                    [2] => 13
                )
        )
)
*/
```

### Objets

```php
class Voiture {
    public $marque = "Renault";
    public $couleur = "rouge";
    private $prix = 15000;
}

$maVoiture = new Voiture();
print_r($maVoiture);

/* Affiche :
Voiture Object
(
    [marque] => Renault
    [couleur] => rouge
    [prix:Voiture:private] => 15000
)
*/
```

## Le paramètre $return

### Affichage direct (comportement par défaut)

```php
$data = ["a" => 1, "b" => 2];
print_r($data); // Affiche directement
```

### Récupération dans une variable

```php
$data = ["a" => 1, "b" => 2];
$resultat = print_r($data, true);

// $resultat contient maintenant la chaîne de caractères
echo "Voici les données :\n";
echo $resultat;
```

### Cas d'usage du paramètre $return

```php
// Enregistrement dans un fichier de log
$erreurs = ["Erreur 1", "Erreur 2", "Erreur 3"];
$contenu = print_r($erreurs, true);
file_put_contents('log.txt', $contenu);

// Envoi par email
$donnees = ["user" => "jean", "action" => "login"];
$message = "Debug info:\n" . print_r($donnees, true);
mail("admin@example.com", "Debug", $message);

// Utilisation dans une chaîne HTML
$config = ["host" => "localhost", "port" => 3306];
$html = "<pre>" . print_r($config, true) . "</pre>";
```

## Amélioration de la lisibilité avec <pre>

Pour un affichage plus lisible dans un navigateur web, utilisez les balises HTML `<pre>` :

```php
$data = [
    "utilisateur" => "admin",
    "permissions" => ["read", "write", "delete"],
    "config" => [
        "theme" => "dark",
        "lang" => "fr"
    ]
];

echo "<pre>";
print_r($data);
echo "</pre>";
```

Cette technique préserve l'indentation et les sauts de ligne.

## print_r() vs autres fonctions de débogage

### print_r() vs var_dump()

```php
$tableau = ["a" => 1, "b" => 2];

// print_r() : Plus lisible, moins détaillé
print_r($tableau);
/* Affiche :
Array
(
    [a] => 1
    [b] => 2
)
*/

// var_dump() : Plus détaillé, inclut les types
var_dump($tableau);
/* Affiche :
array(2) {
  ["a"]=>
  int(1)
  ["b"]=>
  int(2)
}
*/
```

**Différences principales :**
- `print_r()` : Plus lisible, idéal pour voir la structure
- `var_dump()` : Affiche les types et tailles, plus technique

### print_r() vs var_export()

```php
$data = ["x" => 10, "y" => 20];

// print_r() : Format lisible
print_r($data);

// var_export() : Format valide en PHP (peut être évalué)
var_export($data);
/* Affiche :
array (
  'x' => 10,
  'y' => 20,
)
*/

// var_export() peut générer du code PHP valide
$code = var_export($data, true);
eval('$nouveau = ' . $code . ';');
print_r($nouveau); // Reconstitue le tableau
```

## Cas d'usage pratiques

### Débogage de formulaires

```php
// Afficher toutes les données POST
echo "<pre>";
print_r($_POST);
echo "</pre>";

// Afficher toutes les données GET
echo "<pre>";
print_r($_GET);
echo "</pre>";

// Afficher les fichiers uploadés
echo "<pre>";
print_r($_FILES);
echo "</pre>";
```

### Inspection de sessions

```php
session_start();
$_SESSION['user'] = [
    'id' => 123,
    'nom' => 'Martin',
    'role' => 'admin'
];

echo "<pre>";
print_r($_SESSION);
echo "</pre>";
```

### Analyse de résultats de base de données

```php
// Exemple avec PDO
$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($users);
echo "</pre>";
```

### Débogage d'API et JSON

```php
// Récupération et affichage de données JSON
$json = '{"nom":"Marie","age":25,"ville":"Paris"}';
$data = json_decode($json, true);

echo "<pre>";
print_r($data);
echo "</pre>";
```

### Inspection de configuration

```php
// Afficher la configuration PHP
echo "<pre>";
print_r(ini_get_all());
echo "</pre>";

// Afficher les variables d'environnement
echo "<pre>";
print_r($_ENV);
echo "</pre>";

// Afficher les informations sur le serveur
echo "<pre>";
print_r($_SERVER);
echo "</pre>";
```

## Bonnes pratiques

### 1. Utiliser <pre> pour la lisibilité web

```php
function debug($var) {
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}

$data = ["test" => 123];
debug($data);
```

### 2. Créer une fonction de débogage personnalisée

```php
function dd($var, $label = '') {
    echo "<pre>";
    if ($label) {
        echo "<strong>$label:</strong>\n";
    }
    print_r($var);
    echo "</pre>";
    die(); // Arrête l'exécution
}

$users = ["Alice", "Bob", "Charlie"];
dd($users, "Liste des utilisateurs");
```

### 3. Débogage conditionnel

```php
define('DEBUG_MODE', true);

function debug_print($var) {
    if (DEBUG_MODE) {
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    }
}

$config = ["db" => "mysql", "port" => 3306];
debug_print($config); // S'affiche seulement si DEBUG_MODE est true
```

### 4. Logging avec print_r()

```php
function log_data($data, $filename = 'debug.log') {
    $output = date('[Y-m-d H:i:s] ') . print_r($data, true) . "\n";
    file_put_contents($filename, $output, FILE_APPEND);
}

$erreur = ["type" => "SQL", "message" => "Connection failed"];
log_data($erreur);
```

## Limitations et précautions

### 1. Références circulaires

```php
$a = ["test"];
$a[] = &$a; // Référence circulaire

print_r($a);
// Affiche : *RECURSION* pour éviter une boucle infinie
```

### 2. Objets avec propriétés sensibles

```php
class User {
    public $username = "admin";
    private $password = "secret123"; // Sera visible avec print_r()
}

$user = new User();
print_r($user); // ATTENTION : affiche le mot de passe
```

### 3. Performance

Pour de très grandes structures de données, `print_r()` peut être lent. Utilisez-le principalement pour le débogage, pas en production.

### 4. Sécurité

Ne jamais afficher `print_r()` en production sur des pages publiques, car cela peut révéler des informations sensibles sur la structure de votre application.

## Alternatives et compléments

### Fonctions similaires

```php
// print_r() : Lisible, simple
print_r($data);

// var_dump() : Détaillé avec types
var_dump($data);

// var_export() : Format PHP valide
var_export($data);

// json_encode() : Format JSON
echo json_encode($data, JSON_PRETTY_PRINT);
```

### Bibliothèques de débogage

Pour un débogage plus avancé, considérez :
- **Xdebug** : Extension PHP professionnelle
- **Symfony VarDumper** : Composant élégant pour le débogage
- **Kint** : Outil de débogage PHP moderne

## Conclusion

`print_r()` est un outil indispensable pour tout développeur PHP. Sa simplicité et sa lisibilité en font la fonction de choix pour inspecter rapidement des variables pendant le développement. Bien qu'elle ait ses limitations, elle reste parfaite pour le débogage quotidien et la compréhension de structures de données complexes.

**Points clés à retenir :**
- Utilisez `print_r()` pour inspecter la structure des données
- Ajoutez le paramètre `true` pour récupérer le résultat dans une variable
- Entourez avec `<pre>` pour une meilleure lisibilité web
- Ne l'utilisez jamais en production pour afficher des données publiquement
- Complétez avec `var_dump()` quand vous avez besoin d'informations sur les types
