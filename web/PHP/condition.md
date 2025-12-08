# Cours : Les conditions en PHP

## Introduction

Les conditions en PHP permettent d'exécuter des blocs de code seulement si certaines situations sont vraies. Elles sont essentielles pour contrôler le flux d'exécution d'un programme.

Ce cours couvre : `if`, `else`, `elseif`, les opérateurs de comparaison, les opérateurs logiques, les conditions ternaires et les structures particulières comme `match`.

---

## 1. La structure `if`

La structure conditionnelle de base.

### Exemple simple

```php
$age = 18;

if ($age >= 18) {
    echo "Vous êtes majeur";
}
```

---

## 2. `if` avec `else`

Permet d'exécuter une autre branche lorsque la condition est fausse.

```php
$age = 15;

if ($age >= 18) {
    echo "Majeur";
} else {
    echo "Mineur";
}
```

---

## 3. `elseif`

Permet de chaîner plusieurs conditions.

```php
$note = 14;

if ($note >= 16) {
    echo "Très bien";
} elseif ($note >= 12) {
    echo "Assez bien";
} elseif ($note >= 10) {
    echo "Passable";
} else {
    echo "Insuffisant";
}
```

---

## 4. Opérateurs de comparaison

| Opérateur | Signification           |
| --------- | ----------------------- |
| `==`      | égal                    |
| `===`     | égal et même type       |
| `!=`      | différent               |
| `!==`     | différent ou type diff. |
| `>`       | supérieur               |
| `<`       | inférieur               |
| `>=`      | supérieur ou égal       |
| `<=`      | inférieur ou égal       |

### Exemple

```php
if ($a === $b) {
    echo "Les valeurs et les types sont identiques";
}
```

---

## 5. Opérateurs logiques

| Opérateur | Nom         | Exemple            | 
| --------- | ----------- | ------------------ | 
| `&&`      | ET logique  | `$a > 0 && $b > 0` | 
| `||`      | OU logique  | `$a==42||$a <= 0   |
| `!`       | NON logique | `!$isValid`        |

### Exemple

```php
if ($age >= 18 && $nationalite === "FR") {
    echo "Vous pouvez voter en France.";
}
```

---

## 6. Conditions imbriquées

Il est possible de placer un `if` dans un autre.

```php
if ($age >= 18) {
    if ($permis) {
        echo "Vous pouvez conduire.";
    } else {
        echo "Il vous faut le permis.";
    }
}
```

---

## 7. L'opérateur ternaire

Permet d'écrire une condition simple en une seule ligne.

### Syntaxe

```php
(condition) ? valeur_si_vrai : valeur_si_faux;
```

### Exemple

```php
$message = ($age >= 18) ? "Majeur" : "Mineur";
```

---

## 8. L'opérateur null coalescent `??`

Renvoie la première valeur définie et non null.

```php
$nom = $_GET["nom"] ?? "Inconnu";
```

---

## 9. Structure `switch`

Alternative propre à plusieurs `elseif`.

```php
$jour = "lundi";

switch ($jour) {
    case "lundi":
        echo "Début de semaine";
        break;
    case "vendredi":
        echo "Presque le week-end";
        break;
    default:
        echo "Jour ordinaire";
}
```

---

## 10. La structure `match` (PHP 8+)

Une alternative moderne à `switch`, plus concise.

```php
$note = 15;

$resultat = match(true) {
    $note >= 16 => "Très bien",
    $note >= 12 => "Assez bien",
    $note >= 10 => "Passable",
    default => "Insuffisant",
};
```

---

## Conclusion

Les conditions sont essentielles pour contrôler la logique d’un programme PHP. En combinant opérateurs de comparaison, logiques, `if`, `switch` et `match`, vous pouvez créer des comportements dynamiques adaptés à votre application.
