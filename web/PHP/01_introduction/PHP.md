# Introduction à PHP

## 1️⃣ Qu’est-ce que PHP ?

* PHP (Hypertext Preprocessor) est un langage de programmation côté serveur.
* Il est utilisé pour créer des sites web dynamiques et interagir avec des bases de données.
* Les fichiers PHP ont l’extension `.php` et contiennent du code que le serveur interprète pour produire du HTML ou d'autres réponses.

## 2️⃣ PHP est un langage interprété

* Contrairement à C, qui est compilé, PHP est interprété.
* L’interpréteur PHP lit et exécute directement le code PHP.
* Exemple :

```php
<?php
echo "Hello world!";
?>
```

## 3️⃣ Installer PHP

* Installer PHP = mettre l’interpréteur PHP sur le système.
* Sur Linux : `sudo apt install php php-mysqli php-pdo`
* Sur Docker, on utilise souvent `php:8.2-apache`, qui contient PHP et Apache déjà configurés.

## 4️⃣ Les extensions PHP

* Les extensions ajoutent des fonctionnalités :

  * `mysqli` → communication avec MySQL
  * `pdo` et `pdo_mysql` → interface générique pour bases de données
  * `gd` → manipulation d’images
  * `curl` → communication HTTP externe
* Exemple Docker :

```dockerfile
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli
```

## 5️⃣ PHP et le serveur web

* PHP fonctionne côté serveur et génère du HTML.
* Un serveur web (Apache, Nginx) est nécessaire.
* L’image Docker `php:8.2-apache` combine Apache et PHP.

## 6️⃣ Comparaison avec d’autres langages

| Langage | Type       | Installation        | Mode d’exécution                        |
| ------- | ---------- | ------------------- | --------------------------------------- |
| C       | Compilé    | Compilateur (`gcc`) | Compilation → binaire exécutable        |
| Python  | Interprété | Interpréteur Python | Lecture et exécution du code à la volée |
| PHP     | Interprété | Interpréteur PHP    | Lecture et exécution côté serveur       |

## 7️⃣ Exemple minimal

```php
<?php
$dsn = "mysql:host=localhost;dbname=camagru";
$user = "root";
$pass = "";

try {
    $db = new PDO($dsn, $user, $pass);
    echo "Connexion réussie !";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
```

* Ce code nécessite les extensions `pdo` et `pdo_mysql`.

## 8️⃣ Conclusion

* PHP est un langage interprété côté serveur.
* Installer PHP = installer l’interpréteur et les extensions.
* Docker simplifie cette installation avec des images comme `php:8.2-apache`.
* PHP s’intègre avec des serveurs web pour produire du contenu dynamique.
