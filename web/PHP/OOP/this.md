# `$this` en PHP

## 📌 Qu'est-ce que `$this` ?

`$this` est un mot-clé spécial utilisé **à l'intérieur d'une classe**
pour faire référence **à l'objet actuel**.

En clair : 👉 `$this` = "l'objet sur lequel on est en train de
travailler".

------------------------------------------------------------------------

# 1. Pourquoi utiliser `$this` ?

`$this` sert à accéder :

-   aux **propriétés** de l'objet\
-   aux **méthodes** de l'objet

``` php
class User {
    public $name;

    public function sayHello() {
        return "Bonjour " . $this->name;
    }
}
```

------------------------------------------------------------------------

# 2. `$this->propriété`

``` php
class Product {
    public $price;

    public function setPrice($p) {
        $this->price = $p;
    }
}
```

------------------------------------------------------------------------

# 3. `$this->méthode()`

``` php
class Car {
    public function start() {
        return "La voiture démarre";
    }

    public function run() {
        return $this->start() . " et roule";
    }
}
```

------------------------------------------------------------------------

# 4. `$this` n'existe pas en statique

``` php
class Test {
    public static function demo() {
        return $this->value; // impossible
    }
}
```

------------------------------------------------------------------------

# 5. `$this` dans le constructeur

``` php
class User {
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }
}
```

------------------------------------------------------------------------

# 6. Comment penser `$this` ?

👉 `$this` = l'objet qui appelle la méthode.

``` php
$a = new User();
$b = new User();

$a->name = "Alice";
$b->name = "Bob";

$a->sayHello(); // $this = $a
$b->sayHello(); // $this = $b
```

------------------------------------------------------------------------

# Résumé rapide

-   `$this` = l'objet courant\
-   `$this->prop` = propriété\
-   `$this->method()` = méthode\
-   Pas utilisable en static
