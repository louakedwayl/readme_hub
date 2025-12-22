# Le mot-clé `self` en PHP

## 1. Introduction

En PHP, le mot-clé `self` est utilisé pour **faire référence à la classe actuelle**.  
Il permet d'accéder aux **propriétés et méthodes statiques** d'une classe depuis l'intérieur de cette classe.

⚠️ `self` ne fonctionne pas pour accéder aux membres d'une instance (utiliser `$this` dans ce cas).

---

## 2. Utilisation avec les propriétés statiques

### Exemple

```php
class Compteur {
    public static $nombre = 0;
    
    public static function incrementer() {
        self::$nombre++;
    }
}

Compteur::incrementer();
Compteur::incrementer();
echo Compteur::$nombre; // 2
```

✅ Ici, `self::$nombre` accède à la propriété statique `$nombre` de la classe `Compteur`.

---

## 3. Utilisation avec les méthodes statiques

On peut aussi utiliser `self` pour appeler une méthode statique depuis l'intérieur de la classe.

```php
class Exemple {
    public static function direBonjour() {
        echo "Bonjour";
    }
    
    public static function appeler() {
        self::direBonjour();
    }
}

Exemple::appeler(); // Bonjour
```

---

## 4. Différence avec `$this`

| `$this` | `self` |
|---------|--------|
| Fait référence à l'objet courant | Fait référence à la classe actuelle |
| Utilisé pour accéder aux propriétés et méthodes non statiques | Utilisé pour accéder aux propriétés et méthodes statiques |
| Appelé depuis une instance | Appelé depuis la classe ou méthode statique |

---

## 5. Héritage et `self`

⚠️ **Attention** : `self` référence toujours la classe où il est écrit, pas nécessairement la classe de l'objet qui appelle la méthode.

```php
class ParentClasse {
    public static function test() {
        echo "Parent";
    }
    
    public static function appel() {
        self::test();
    }
}

class EnfantClasse extends ParentClasse {
    public static function test() {
        echo "Enfant";
    }
}

EnfantClasse::appel(); // Parent
```

👉 Pour appeler la méthode de la classe enfant dans ce contexte, on utilise `static::` (late static binding).

---

## 6. Utilisation avec `const`

`self` permet aussi d'accéder aux constantes de classe.

```php
class Exemple {
    const NOM = "MonSite";
    
    public static function afficherNom() {
        echo self::NOM;
    }
}

Exemple::afficherNom(); // MonSite
```

---

## 7. Bonnes pratiques

- Utiliser `self` pour accéder aux membres statiques et aux constantes de la classe
- Ne pas l'utiliser pour accéder aux propriétés ou méthodes non statiques
- Utiliser `static::` si on veut permettre la redéfinition dans les classes enfants

---

## 8. Conclusion

`self` en PHP est un outil puissant pour référencer la classe courante.

Il est indispensable pour :
- l'accès aux propriétés et méthodes statiques
- l'accès aux constantes de classe
- garantir la cohérence dans le code orienté objet
