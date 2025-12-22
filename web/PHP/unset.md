# La fonction `unset` en PHP

## 1. Introduction

En PHP, la fonction **`unset()`** permet de **supprimer une variable, un élément d'un tableau ou une propriété d'un objet**.  
Après l'utilisation de `unset`, la variable ou l'élément n'existe plus et toute tentative d'accès générera une erreur ou `NULL`.

---

## 2. Supprimer une variable

```php
$nom = "Alice";
unset($nom);
var_dump($nom); // NULL ou Notice : Undefined variable
```

### Points clés

- La variable est complètement supprimée de la mémoire.
- `unset` ne peut pas supprimer une variable par référence directe dans certaines situations.

---

## 3. Supprimer un élément d'un tableau

```php
$fruits = ["pomme", "banane", "orange"];
unset($fruits[1]);
print_r($fruits);
```

### Résultat :

```
Array
(
    [0] => pomme
    [2] => orange
)
```

⚠️ **Les clés ne sont pas renumérotées automatiquement.**

Si tu veux renuméroter les clés, utilise `array_values()` :

```php
$fruits = array_values($fruits);
```

---

## 4. Supprimer une propriété d'un objet

```php
class Personne {
    public $nom;
    public $age;
}

$p = new Personne();
$p->nom = "Alice";
$p->age = 25;

unset($p->age);
var_dump($p);
```

### Résultat :

La propriété `$age` n'existe plus dans l'objet `$p`.

---

## 5. Supprimer plusieurs variables ou éléments

```php
$a = 1;
$b = 2;
$c = 3;

unset($a, $b);

var_dump($a); // NULL
var_dump($b); // NULL
var_dump($c); // 3
```

---

## 6. Bonnes pratiques

- Utiliser `unset` pour libérer de la mémoire, surtout dans les scripts volumineux.
- Ne pas abuser de `unset` pour des variables locales, PHP gère automatiquement la mémoire.
- **Attention aux références** : `unset($var)` supprime la variable, mais si d'autres variables y font référence, elles restent intactes.

---

## 7. Différence avec `NULL`

```php
$nom = "Alice";
$nom = null; // La variable existe toujours mais vaut null

unset($nom); // La variable est supprimée
```

- **NULL** : la variable existe mais sa valeur est vide.
- **unset** : la variable n'existe plus.

---

## 8. Conclusion

La fonction `unset()` est un outil pratique pour :
- supprimer des variables ou éléments de tableau
- gérer la mémoire dans de gros scripts
- supprimer des propriétés d'objets
