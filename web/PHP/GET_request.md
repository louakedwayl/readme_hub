# Les requêtes GET en PHP (formulaires et liens)

## 1. Qu'est-ce qu'une requête GET ?

En HTTP, une requête GET sert à demander une page et peut aussi
transporter des données via l'URL, comme :

    page.php?cle=valeur&age=20&ville=Paris

## 2. Formulaire avec method="GET"

Exemple :

``` html
<form action="submit_contact.php" method="GET">
    <input type="email" name="email">
    <textarea name="message"></textarea>
</form>
```

Quand l'utilisateur envoie :

    submit_contact.php?email=TON_EMAIL&message=TON_MESSAGE

PHP récupère avec :

``` php
$_GET["email"];
$_GET["message"];
```

## 3. Les liens avec paramètres GET

``` html
<a href="bonjour.php?nom=Dupont&amp;prenom=Jean">Dis-moi bonjour !</a>
```

Le lien ouvre :

    bonjour.php?nom=Dupont&prenom=Jean

PHP récupère avec :

``` php
$nom = $_GET["nom"];
$prenom = $_GET["prenom"];
```

## 4. Résumé

-   GET met les données dans l'URL (visibles).
-   Les formulaires GET et les liens GET fonctionnent pareil.
-   PHP lit tout via `$_GET`.
