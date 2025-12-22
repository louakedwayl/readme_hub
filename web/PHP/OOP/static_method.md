# Les méthodes statiques en PHP

## 1. Introduction

En programmation orientée objet (POO) en PHP, une méthode statique est
une méthode qui appartient à la classe elle-même et non à une instance
de cette classe.

On peut appeler une méthode statique sans créer d'objet.

------------------------------------------------------------------------

## 2. Définition d'une méthode statique

Une méthode statique se définit avec le mot-clé `static`.

``` php
class MaClasse {
    public static function maMethode() {
        echo "Méthode statique";
    }
}
```

------------------------------------------------------------------------

## 3. Appel d'une méthode statique

On appelle une méthode statique avec l'opérateur `::`.

``` php
MaClasse::maMethode();
```

On n'utilise pas `$this` dans une méthode statique.

------------------------------------------------------------------------

## 4. Propriétés statiques

Une classe peut contenir des propriétés statiques.

``` php
class Compteur {
    public static $nombre = 0;

    public static function incrementer() {
        self::$nombre++;
    }
}

Compteur::incrementer();
Compteur::incrementer();

echo Compteur::$nombre;
```

------------------------------------------------------------------------

## 5. Le mot-clé `self`

Dans une méthode statique, `self` permet d'accéder aux méthodes et
propriétés statiques de la classe.

``` php
class Exemple {
    public static function test() {
        self::afficher();
    }

    public static function afficher() {
        echo "Hello";
    }
}
```

------------------------------------------------------------------------

## 6. Méthodes statiques vs méthodes classiques

  Méthode classique     Méthode statique
  --------------------- --------------------
  Nécessite un objet    Pas besoin d'objet
  Utilise `$this`       Utilise `self`
  Liée à une instance   Liée à la classe

------------------------------------------------------------------------

## 7. Héritage et méthodes statiques

Les méthodes statiques peuvent être héritées.

``` php
class ParentClasse {
    public static function afficher() {
        echo "Parent";
    }
}

class EnfantClasse extends ParentClasse {
}

EnfantClasse::afficher();
```

------------------------------------------------------------------------

## 8. Cas d'utilisation

Les méthodes statiques sont utilisées pour : - les fonctions
utilitaires - les helpers - les calculs indépendants

``` php
class MathUtils {
    public static function addition($a, $b) {
        return $a + $b;
    }
}
```

------------------------------------------------------------------------

## 9. Bonnes pratiques

-   Utiliser les méthodes statiques avec modération
-   Éviter l'état complexe
-   Préférer les méthodes non statiques si nécessaire

------------------------------------------------------------------------

## 10. Conclusion

Les méthodes statiques permettent de structurer le code et d'éviter les
fonctions globales.
