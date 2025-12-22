# Les méthodes magiques `__construct` et `__destruct` en PHP

## 1. Introduction

En PHP, les méthodes **`__construct`** et **`__destruct`** sont des **méthodes magiques** utilisées dans la programmation orientée objet (POO).

- `__construct` : s'exécute **automatiquement à l'instanciation d'un objet**.
- `__destruct` : s'exécute **automatiquement à la destruction d'un objet**, souvent à la fin du script ou lorsque l'objet n'est plus utilisé.

---

## 2. La méthode `__construct`

### 2.1 Définition

La méthode `__construct` sert à **initialiser un objet** au moment de sa création.  
Elle peut recevoir des **paramètres**.

### Syntaxe

```php
class Personne {
    public $nom;
    
    public function __construct($nom) {
        $this->nom = $nom;
        echo "Objet créé pour " . $this->nom;
    }
}

$personne = new Personne("Alice"); // Objet créé pour Alice
```

### Points clés

- S'exécute automatiquement lors de `new NomClasse()`.
- Peut être utilisée pour initialiser des propriétés ou ouvrir des ressources (fichiers, bases de données…).

---

## 3. La méthode `__destruct`

### 3.1 Définition

La méthode `__destruct` est appelée automatiquement lorsque l'objet est détruit.

Elle est souvent utilisée pour fermer des ressources ou libérer de la mémoire.

### Exemple

```php
class Fichier {
    private $handle;
    
    public function __construct($filename) {
        $this->handle = fopen($filename, "w");
        echo "Fichier ouvert\n";
    }
    
    public function __destruct() {
        fclose($this->handle);
        echo "Fichier fermé\n";
    }
}

$f = new Fichier("test.txt");
// à la fin du script ou à la destruction de $f
// Fichier fermé
```

---

## 4. Différences `__construct` vs `__destruct`

| Méthode | Moment d'exécution | Utilité principale |
|---------|-------------------|-------------------|
| `__construct` | À la création | Initialiser l'objet |
| `__destruct` | À la destruction | Libérer des ressources / nettoyer |

---

## 5. Paramètres et surcharge

- `__construct` peut avoir des paramètres pour initialiser l'objet.
- `__destruct` ne prend pas de paramètre.

```php
class Exemple {
    public function __construct($val) {
        echo "Construct avec $val\n";
    }
    
    public function __destruct() {
        echo "Destruct appelé\n";
    }
}

$ex = new Exemple(42);
```

---

## 6. Héritage et constructeurs

- Si une classe enfant définit son propre `__construct`, le constructeur de la classe parente n'est pas appelé automatiquement.
- Il faut utiliser `parent::__construct()` pour l'appeler.

```php
class ParentClasse {
    public function __construct() {
        echo "Construct parent\n";
    }
}

class EnfantClasse extends ParentClasse {
    public function __construct() {
        parent::__construct();
        echo "Construct enfant\n";
    }
}

$objet = new EnfantClasse();
// Construct parent
// Construct enfant
```

---

## 7. Bonnes pratiques

- Toujours utiliser `__construct` pour initialiser les objets.
- Utiliser `__destruct` pour libérer les ressources, surtout pour les fichiers, bases de données, connexions réseau.
- Ne pas abuser de `__destruct` pour des traitements longs ou complexes.

---

## 8. Conclusion

Les méthodes magiques `__construct` et `__destruct` permettent de :
- Automatiser l'initialisation et la destruction des objets
- Gagner en clarté et en sécurité pour la gestion des ressources
- Respecter les principes de la programmation orientée objet en PHP
