# Cours : La méthode bindParam() en PDO

## 1. Qu'est-ce que bindParam() ?

La méthode **bindParam()** permet d'**associer une variable PHP** à un
paramètre préparé dans une requête SQL.

La valeur réelle de la variable est lue **au moment de l'exécution**
(`execute()`), et non lors du lien.

------------------------------------------------------------------------

## 2. Pourquoi utiliser bindParam() ?

-   Sépare clairement la requête et les données
-   Améliore la lisibilité du code
-   Renforce la sécurité contre les injections SQL
-   Utile lorsque la valeur peut changer avant l'exécution

------------------------------------------------------------------------

## 3. Syntaxe générale

``` php
$stmt->bindParam(string $param, mixed &$variable, int $type);
```

-   `$param` : nom ou position du paramètre (`:username`, `1`, etc.)
-   `$variable` : variable PHP liée (passée par référence)
-   `$type` : type de donnée (optionnel)

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

$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->execute();
```

------------------------------------------------------------------------

## 5. Important : passage par référence

``` php
$username = 'admin';
$stmt->bindParam(':username', $username);

$username = 'root';
$stmt->execute();
```

➡️ La requête utilisera la valeur **'root'**, pas `'admin'`.

------------------------------------------------------------------------

## 6. Types PDO courants

  Constante         Description
  ----------------- -------------
  PDO::PARAM_STR    Chaîne
  PDO::PARAM_INT    Entier
  PDO::PARAM_BOOL   Booléen
  PDO::PARAM_NULL   NULL

------------------------------------------------------------------------

## 7. bindParam() vs bindValue()

### bindParam()

-   Lie une variable
-   Valeur évaluée à l'exécution
-   Passage par référence

### bindValue()

-   Lie une valeur directe
-   Valeur immédiate
-   Plus simple à utiliser

------------------------------------------------------------------------

## 8. Exemple complet

``` php
$query = "SELECT COUNT(*) FROM users WHERE username = :username";
$stmt = $pdo->prepare($query);

$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);
```

------------------------------------------------------------------------

## 9. Erreurs courantes

-   Utiliser bindParam() avec une valeur directe
-   Oublier execute()
-   Mauvais type PDO

------------------------------------------------------------------------

## 10. Bonnes pratiques

-   Utiliser bindParam() lorsque la valeur change
-   Sinon préférer execute(\[...\]) ou bindValue()
-   Toujours spécifier le type si possible

------------------------------------------------------------------------

## 11. Conclusion

La méthode **bindParam()** est utile pour lier des variables dynamiques
à une requête préparée. Elle est surtout utilisée dans des cas avancés
ou spécifiques.
