# La méthode fetch() en PDO

## 1. Qu'est-ce que fetch() ?

La méthode **fetch()** permet de récupérer **une seule ligne** de
résultat après l'exécution d'une requête SQL avec PDO.

Elle s'utilise toujours après :

``` php
$stmt->execute();
```

------------------------------------------------------------------------

## 2. Syntaxe

``` php
$stmt->fetch(int $fetchStyle);
```

-   `$fetchStyle` définit la forme des données retournées.
-   S'il n'est pas précisé, PDO utilise son mode par défaut.

------------------------------------------------------------------------

## 3. Fonctionnement

-   fetch() lit la **ligne suivante** du résultat.
-   Chaque appel avance le curseur.
-   Lorsqu'il n'y a plus de lignes, elle retourne **false**.

------------------------------------------------------------------------

## 4. Les principaux modes de récupération

### PDO::FETCH_ASSOC

Retourne un tableau associatif :

``` php
$result = $stmt->fetch(PDO::FETCH_ASSOC);
```

``` php
['username' => 'admin']
```

### PDO::FETCH_NUM

Retourne un tableau indexé numériquement :

``` php
$result = $stmt->fetch(PDO::FETCH_NUM);
```

### PDO::FETCH_BOTH

Retourne associatif + numérique (par défaut).

### PDO::FETCH_OBJ

Retourne un objet :

``` php
$result = $stmt->fetch(PDO::FETCH_OBJ);
echo $result->username;
```

------------------------------------------------------------------------

## 5. Exemple concret

``` php
$stmt = $pdo->prepare("SELECT username FROM users WHERE id = :id");
$stmt->execute([':id' => 1]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);
echo $user['username'];
```

------------------------------------------------------------------------

## 6. fetch() vs fetchAll()

  Méthode      Description
  ------------ -------------------
  fetch()      Une seule ligne
  fetchAll()   Toutes les lignes

------------------------------------------------------------------------

## 7. Gestion du retour false

``` php
$user = $stmt->fetch();

if ($user === false) {
    echo "Aucun résultat";
}
```

------------------------------------------------------------------------

## 8. Bonnes pratiques

-   Toujours appeler execute() avant fetch()
-   Utiliser PDO::FETCH_ASSOC
-   Tester le retour
-   Éviter fetchAll() si une seule ligne suffit

------------------------------------------------------------------------

## 9. Conclusion

fetch() est idéale pour récupérer une ligne de résultat de façon simple,
efficace et sécurisée.
