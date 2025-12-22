# Les propriétés statiques en PHP

## 1. Introduction

En programmation orientée objet (POO) en PHP, une propriété statique est
une variable qui appartient à la classe et non à une instance de cette
classe.

Cela signifie qu'elle est partagée par tous les objets de la classe.

------------------------------------------------------------------------

## 2. Définition d'une propriété statique

Une propriété statique se déclare avec le mot-clé `static`.

``` php
class MaClasse {
    public static $maPropriete;
}
```

------------------------------------------------------------------------

## 3. Accès à une propriété statique

On accède à une propriété statique avec le nom de la classe et
l'opérateur `::`.

``` php
MaClasse::$maPropriete = "Valeur";
echo MaClasse::$maPropriete;
```

On n'utilise pas `$this` avec une propriété statique.

------------------------------------------------------------------------

## 4. Exemple simple

``` php
class Compteur {
    public static $nombre = 0;
}

Compteur::$nombre++;
Compteur::$nombre++;

echo Compteur::$nombre; // 2
```

------------------------------------------------------------------------

## 5. Propriétés statiques et méthodes statiques

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

## 6. Le mot-clé `self`

Dans une classe, `self` permet d'accéder aux propriétés statiques
internes.

``` php
class Exemple {
    public static $message = "Bonjour";

    public static function afficher() {
        echo self::$message;
    }
}
```

------------------------------------------------------------------------

## 7. Propriétés statiques et héritage

``` php
class ParentClasse {
    public static $valeur = 10;
}

class EnfantClasse extends ParentClasse {
}

echo EnfantClasse::$valeur; // 10
```

Redéfinition :

``` php
class EnfantClasse extends ParentClasse {
    public static $valeur = 20;
}

echo EnfantClasse::$valeur; // 20
```

------------------------------------------------------------------------

## 8. Visibilité des propriétés statiques

``` php
class Exemple {
    private static $secret = "confidentiel";

    public static function getSecret() {
        return self::$secret;
    }
}
```

------------------------------------------------------------------------

## 9. Cas d'utilisation des propriétés statiques

Les propriétés statiques sont utiles pour : - les compteurs globaux -
les configurations partagées - les constantes logiques - le cache simple

Exemple :

``` php
class Config {
    public static $siteName = "Mon Site";
}
```

------------------------------------------------------------------------

## 10. Différence entre propriété statique et propriété classique

| Propriété classique       | Propriété statique |
|---------------------------|------------------|
| Liée à un objet           | Liée à la classe |
| Chaque objet a sa valeur  | Valeur partagée  |
| Utilise `$this`           | Utilise `self::` |

------------------------------------------------------------------------

## 11. Bonnes pratiques

-   Utiliser `private static` par défaut
-   Éviter de stocker trop d'état global
-   Préférer des constantes (`const`) si la valeur ne change pas
-   Utiliser des getters/setters statiques si nécessaire

------------------------------------------------------------------------

## 12. Erreurs courantes

❌ Utiliser `$this` avec une propriété statique\
❌ Accéder à une propriété statique via un objet\
❌ Confondre propriété statique et constante

``` php
$obj = new Exemple();
echo $obj::$message; // ❌ Mauvaise pratique
```

------------------------------------------------------------------------

## 13. Conclusion

Les propriétés statiques en PHP : - appartiennent à la classe - sont
partagées par toutes les instances - sont utiles pour les données
communes

Bien utilisées, elles simplifient la structure du code.
