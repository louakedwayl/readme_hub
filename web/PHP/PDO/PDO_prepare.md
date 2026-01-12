# Cours : La méthode prepare() en PDO

## 1. Qu'est-ce que prepare() ?

La méthode **prepare()** permet de **préparer une requête SQL** avant
son exécution. Elle sépare la structure de la requête des données
fournies par l'utilisateur.

Objectifs : - Sécurité - Performance - Bonnes pratiques

------------------------------------------------------------------------

## 2. Pourquoi utiliser prepare() ?

### Sécurité

-   Protège contre les injections SQL
-   Les données ne sont jamais interprétées comme du code SQL

### Performance

-   Une requête préparée peut être exécutée plusieurs fois avec des
    valeurs différentes

### Standard professionnel

-   Indispensable dès qu'une variable est utilisée dans une requête

------------------------------------------------------------------------

## 3. Syntaxe générale

``` php
$stmt = $pdo->prepare($sql);
```

-   `$pdo` : instance PDO
-   `$sql` : requête SQL avec paramètres
-   `$stmt` : objet PDOStatement

------------------------------------------------------------------------

## 4. Exemple simple

### Requête SQL

``` sql
SELECT * FROM users WHERE username = :username
```

### Code PHP

``` php
$stmt = $pdo->prepare(
    "SELECT * FROM users WHERE username = :username"
);
```

------------------------------------------------------------------------

## 5. Paramètres préparés

### Paramètres nommés (recommandé)

``` sql
:username
```

``` php
$stmt->bindParam(':username', $username);
```

### Paramètres positionnels

``` sql
?
```

``` php
$stmt = $pdo->prepare(
    "SELECT * FROM users WHERE username = ?"
);
$stmt->bindParam(1, $username);
```

------------------------------------------------------------------------

## 6. prepare() et execute()

Une requête préparée doit toujours être exécutée :

``` php
$stmt->execute();
```

Ou directement avec des valeurs :

``` php
$stmt->execute([
    ':username' => $username
]);
```

------------------------------------------------------------------------

## 7. bindParam() vs bindValue()

### bindParam()

-   Lie une variable
-   Valeur évaluée au moment du execute()

``` php
$stmt->bindParam(':username', $username);
```

### bindValue()

-   Lie une valeur directe

``` php
$stmt->bindValue(':username', 'admin');
```

------------------------------------------------------------------------

## 8. Exemple complet

``` php
$query = "SELECT COUNT(*) FROM users WHERE username = :username";
$stmt = $pdo->prepare($query);

$stmt->execute([
    ':username' => $username
]);

$result = $stmt->fetch(PDO::FETCH_ASSOC);
```

------------------------------------------------------------------------

## 9. prepare() vs query()

  Méthode     Utilisation
  ----------- -------------------------
  prepare()   Requêtes avec variables
  query()     Requêtes statiques

------------------------------------------------------------------------

## 10. Erreurs courantes

-   Oublier execute()
-   Insérer directement des variables dans la requête
-   Mélanger paramètres nommés et positionnels

------------------------------------------------------------------------

## 11. Conclusion

La méthode **prepare()** est essentielle en PDO : - Sécurise les
requêtes - Rend le code plus propre - Est indispensable en production
