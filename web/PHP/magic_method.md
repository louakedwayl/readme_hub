# Les méthodes magiques en PHP

## 1. Introduction

En PHP, les **méthodes magiques** sont des méthodes spéciales qui commencent et se terminent par **`__`** (double underscore).  
Elles sont **appelées automatiquement** par PHP dans certaines situations.

Elles permettent de :
- Simplifier l'écriture de code
- Contrôler le comportement des objets
- Interagir avec les propriétés et méthodes de manière dynamique

---

## 2. Les méthodes magiques principales

Voici les méthodes magiques les plus utilisées :

| Méthode | Description |
|---------|-------------|
| `__construct()` | Appelée automatiquement à la création d'un objet |
| `__destruct()` | Appelée automatiquement à la destruction d'un objet |
| `__get($nom)` | Appelée lorsqu'une propriété inaccessible est lue |
| `__set($nom, $valeur)` | Appelée lorsqu'une propriété inaccessible est écrite |
| `__isset($nom)` | Appelée lorsqu'on utilise `isset()` ou `empty()` sur une propriété inaccessible |
| `__unset($nom)` | Appelée lorsqu'on utilise `unset()` sur une propriété inaccessible |
| `__call($nom, $arguments)` | Appelée lorsqu'une méthode inaccessible est appelée sur un objet |
| `__callStatic($nom, $arguments)` | Appelée lorsqu'une méthode statique inaccessible est appelée |
| `__toString()` | Appelée lorsqu'un objet est converti en chaîne |
| `__invoke()` | Appelée lorsqu'un objet est utilisé comme une fonction |
| `__clone()` | Appelée lorsqu'un objet est cloné |
| `__sleep()` | Appelée avant la sérialisation de l'objet |
| `__wakeup()` | Appelée après la désérialisation de l'objet |

---

## 3. Exemple d'utilisation

### 3.1 `__construct` et `__destruct`

```php
class Personne {
    public $nom;
    
    public function __construct($nom) {
        $this->nom = $nom;
        echo "Objet créé pour $nom\n";
    }
    
    public function __destruct() {
        echo "Objet détruit pour $this->nom\n";
    }
}

$p = new Personne("Alice");
```

### 3.2 `__get` et `__set`

```php
class Exemple {
    private $data = [];
    
    public function __set($nom, $valeur) {
        $this->data[$nom] = $valeur;
    }
    
    public function __get($nom) {
        return $this->data[$nom] ?? null;
    }
}

$obj = new Exemple();
$obj->prenom = "Alice";
echo $obj->prenom; // Alice
```

### 3.3 `__call` et `__callStatic`

```php
class Test {
    public function __call($nom, $arguments) {
        echo "Méthode $nom appelée avec " . implode(', ', $arguments);
    }
    
    public static function __callStatic($nom, $arguments) {
        echo "Méthode statique $nom appelée avec " . implode(', ', $arguments);
    }
}

$obj = new Test();
$obj->direBonjour("Alice"); // Méthode direBonjour appelée avec Alice
Test::direSalut("Bob"); // Méthode statique direSalut appelée avec Bob
```

### 3.4 `__toString`

```php
class Personne {
    public $nom;
    
    public function __construct($nom) {
        $this->nom = $nom;
    }
    
    public function __toString() {
        return "Nom : " . $this->nom;
    }
}

$p = new Personne("Alice");
echo $p; // Nom : Alice
```

---

## 4. Bonnes pratiques

- Utiliser les méthodes magiques pour simplifier le code, pas pour tout contrôler.
- Documenter les comportements magiques, car ils peuvent surprendre d'autres développeurs.
- Ne pas abuser de `__get` et `__set` pour toutes les propriétés, car cela peut masquer des erreurs.

---

## 5. Conclusion

Les méthodes magiques en PHP permettent :
- De réagir automatiquement à certaines opérations sur les objets
- De personnaliser le comportement des objets
- D'écrire du code plus flexible et dynamique
