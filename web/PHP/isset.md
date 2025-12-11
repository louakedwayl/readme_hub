# `isset()`

## 1. Qu'est-ce que `isset()` ?

`isset()` est une fonction intégrée de PHP qui sert à vérifier si :

1. Une variable existe
2. Et qu'elle n'est pas nulle (`NULL`)

Elle renvoie :
* `true` si la variable existe et n'est pas `NULL`
* `false` sinon

---

## 2. Syntaxe

```php
isset($variable);
isset($var1, $var2, ...); // peut tester plusieurs variables à la fois
```

* `$variable` : n'importe quelle variable PHP
* On peut passer plusieurs variables. `isset()` retournera `true` uniquement si **toutes** les variables existent et ne sont pas nulles.

---

## 3. Exemples simples

### Exemple 1 : Variable existante

```php
$nom = "Alice";

if (isset($nom)) {
    echo "La variable \$nom existe !";
}
```

**Résultat :**

```
La variable $nom existe !
```

---

### Exemple 2 : Variable non définie

```php
if (isset($age)) {
    echo "La variable \$age existe !";
} else {
    echo "La variable \$age n'existe pas !";
}
```

**Résultat :**

```
La variable $age n'existe pas !
```

---

### Exemple 3 : Variable définie mais NULL

```php
$prenom = NULL;

if (isset($prenom)) {
    echo "La variable \$prenom existe !";
} else {
    echo "La variable \$prenom n'existe pas ou est NULL !";
}
```

**Résultat :**

```
La variable $prenom n'existe pas ou est NULL !
```

---

### Exemple 4 : Vérifier plusieurs variables

```php
$nom = "Alice";
$age = 25;

if (isset($nom, $age)) {
    echo "Toutes les variables existent !";
}
```

**Résultat :**

```
Toutes les variables existent !
```

---

## 4. Utilisation pratique avec `$_GET` ou `$_POST`

```php
if (isset($_GET["nom"])) {
    $nom = $_GET["nom"];
    echo "Bonjour $nom !";
} else {
    echo "Aucun nom fourni !";
}
```

* Utile pour éviter les erreurs "undefined index".
* Vérifie que l'utilisateur a bien envoyé une donnée.

---

## 5. Résumé

| Fonction | Vérifie quoi ? | Exemple |
|----------|----------------|---------|
| `isset()` | Variable existante et non NULL | `isset($nom)` |
| `isset()` sur plusieurs variables | Toutes les variables existent et ne sont pas NULL | `isset($nom, $age)` |
| Avec `$_GET`/`$_POST` | Permet de vérifier si un paramètre a été envoyé par l'utilisateur | `isset($_GET["email"])` |
