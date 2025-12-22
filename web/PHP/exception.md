# Exceptions en PHP

## 1. Introduction aux exceptions en PHP

En PHP, une exception est un mécanisme qui permet de gérer les erreurs de façon plus structurée qu'avec les simples instructions `if` ou les fonctions comme `die()` ou `trigger_error()`.

Une exception est un objet qui est "jeté" (`throw`) lorsqu'une erreur survient, et qui peut être "attrapée" (`catch`) pour être traitée.

### Pourquoi utiliser des exceptions ?

* Séparer le code normal du code de gestion des erreurs
* Permettre la propagation des erreurs jusqu'au niveau où elles peuvent être correctement gérées
* Fournir des informations détaillées sur l'erreur (message, code, fichier, ligne…)

## 2. Syntaxe de base

### 2.1. Structure générale

```php
try {
    // Code pouvant générer une exception
    if ($condition) {
        throw new Exception("Une erreur est survenue !");
    }
} catch (Exception $e) {
    // Code exécuté en cas d'exception
    echo "Erreur : " . $e->getMessage();
} finally {
    // Code exécuté quoi qu'il arrive (optionnel)
    echo "Bloc finally exécuté.";
}
```

### Explications :

* `try` : contient le code qui peut provoquer une exception
* `throw` : permet de lancer une exception
* `catch` : attrape l'exception et exécute le code pour la gérer
* `finally` : s'exécute toujours, que l'exception soit levée ou non (utile pour fermer des fichiers, connexions…)

## 3. Les classes d'exceptions

PHP possède une classe de base : `Exception`. On peut utiliser directement `Exception` ou créer ses propres classes d'exceptions en héritant de `Exception`.

### 3.1. Exemple avec Exception standard

```php
function division($a, $b) {
    if ($b == 0) {
        throw new Exception("Division par zéro impossible !");
    }
    return $a / $b;
}

try {
    echo division(10, 0);
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
```

### 3.2. Créer une exception personnalisée

```php
class MonException extends Exception {}

function test($val) {
    if ($val < 0) {
        throw new MonException("La valeur ne peut pas être négative !");
    }
    return sqrt($val);
}

try {
    echo test(-5);
} catch (MonException $e) {
    echo "Erreur personnalisée : " . $e->getMessage();
}
```

## 4. Les méthodes utiles de l'objet Exception

Une exception en PHP possède plusieurs méthodes pratiques :

| Méthode | Description |
|---------|-------------|
| `getMessage()` | Retourne le message d'erreur |
| `getCode()` | Retourne le code de l'exception |
| `getFile()` | Retourne le fichier où l'exception a été levée |
| `getLine()` | Retourne la ligne où l'exception a été levée |
| `getTrace()` | Retourne un tableau contenant la pile d'appels |
| `getTraceAsString()` | Retourne la pile d'appels sous forme de chaîne |

### Exemple :

```php
try {
    throw new Exception("Erreur critique", 101);
} catch (Exception $e) {
    echo "Message : " . $e->getMessage() . "<br>";
    echo "Code : " . $e->getCode() . "<br>";
    echo "Fichier : " . $e->getFile() . "<br>";
    echo "Ligne : " . $e->getLine() . "<br>";
}
```

## 5. Propagation des exceptions

Si une exception n'est pas attrapée dans le bloc `try`, elle remonte la pile d'appels jusqu'à trouver un `catch`. Si aucun `catch` n'est trouvé, le script s'arrête et une erreur fatale est générée.

## 6. Bonnes pratiques

1. Ne pas abuser des exceptions pour le contrôle de flux normal
2. Créer des exceptions spécifiques pour mieux identifier le type d'erreur
3. Toujours attraper les exceptions ou laisser le script échouer proprement
4. Utiliser `finally` pour libérer les ressources (fichiers, bases de données, connexions…)
