# 📘 `$_POST` en PHP

## 🎯 Introduction

En PHP, `$_POST` est une **superglobale** qui permet de récupérer les
données envoyées par un formulaire HTML utilisant la méthode **POST**.

------------------------------------------------------------------------

# 🔹 1. Qu'est-ce que `$_POST` ?

`$_POST` est un **tableau associatif** automatiquement rempli par PHP
contenant toutes les valeurs envoyées via un formulaire :

``` php
$_POST["nom_du_champ"]
```

------------------------------------------------------------------------

# 🔹 2. Formulaire HTML utilisant POST

``` html
<form action="traitement.php" method="POST">
    <input type="text" name="email" placeholder="Votre email">
    <textarea name="message" placeholder="Votre message"></textarea>
    <button type="submit">Envoyer</button>
</form>
```

------------------------------------------------------------------------

# 🔹 3. Récupérer des données avec `$_POST`

``` php
$email = $_POST["email"];
$message = $_POST["message"];
```

------------------------------------------------------------------------

# 🔹 4. Vérifier l'existence d'un champ

``` php
if (isset($_POST["email"])) {
    echo "Email reçu : " . $_POST["email"];
}
```

------------------------------------------------------------------------

# 🔹 5. Sécuriser les données

``` php
$email = htmlspecialchars(trim($_POST["email"]));
```

------------------------------------------------------------------------

# 🔹 6. Vérifier la méthode HTTP

``` php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Formulaire envoyé
}
```

------------------------------------------------------------------------

# 🔹 7. GET vs POST

  Critère            GET      POST
  ------------------ -------- -------
  Données visibles   Oui      Non
  Quantité           Limité   Large
  Sécurité           Faible   Bonne

------------------------------------------------------------------------

# 🎉 Conclusion

`$_POST` est essentiel pour récupérer des données envoyées depuis un
formulaire HTML en toute sécurité.# 📘 Comprendre `$_POST` en PHP

## 🎯 Introduction

En PHP, `$_POST` est une **superglobale** qui permet de récupérer les
données envoyées par un formulaire HTML utilisant la méthode **POST**.

------------------------------------------------------------------------

# 🔹 1. Qu'est-ce que `$_POST` ?

`$_POST` est un **tableau associatif** automatiquement rempli par PHP
contenant toutes les valeurs envoyées via un formulaire :

``` php
$_POST["nom_du_champ"]
```

------------------------------------------------------------------------

# 🔹 2. Formulaire HTML utilisant POST

``` html
<form action="traitement.php" method="POST">
    <input type="text" name="email" placeholder="Votre email">
    <textarea name="message" placeholder="Votre message"></textarea>
    <button type="submit">Envoyer</button>
</form>
```

------------------------------------------------------------------------

# 🔹 3. Récupérer des données avec `$_POST`

``` php
$email = $_POST["email"];
$message = $_POST["message"];
```

------------------------------------------------------------------------

# 🔹 4. Vérifier l'existence d'un champ

``` php
if (isset($_POST["email"])) {
    echo "Email reçu : " . $_POST["email"];
}
```

------------------------------------------------------------------------

# 🔹 5. Sécuriser les données

``` php
$email = htmlspecialchars(trim($_POST["email"]));
```

------------------------------------------------------------------------

# 🔹 6. Vérifier la méthode HTTP

``` php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Formulaire envoyé
}
```

------------------------------------------------------------------------

# 🔹 7. GET vs POST

  Critère            GET      POST
  ------------------ -------- -------
  Données visibles   Oui      Non
  Quantité           Limité   Large
  Sécurité           Faible   Bonne

------------------------------------------------------------------------

# 🎉 Conclusion

`$_POST` est essentiel pour récupérer des données envoyées depuis un
formulaire HTML en toute sécurité.
