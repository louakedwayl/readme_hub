# 📘 Le serveur web intégré de PHP

### Comprendre et utiliser `php -S localhost:8000`

Depuis PHP 5.4, PHP inclut un **serveur web intégré** très pratique pour
développer en local sans installer Apache, Nginx ou autre serveur
complet.

------------------------------------------------------------------------

## 🔧 1. À quoi sert le serveur intégré ?

-   Tester rapidement du code PHP
-   Héberger temporairement un projet en local
-   Servir des fichiers PHP, HTML, CSS, JS, images...
-   Exécuter vos scripts comme un vrai serveur

⚠️ **Ne jamais l'utiliser en production.**

------------------------------------------------------------------------

## 🏃 2. Lancer le serveur : `php -S localhost:8000`

``` bash
php -S localhost:8000
```

-   **php** : lance PHP\
-   **-S** : active le serveur web intégré\
-   **localhost** : écoute la machine locale\
-   **8000** : port utilisé

Accès via : http://localhost:8000

------------------------------------------------------------------------

## 📂 3. Le dossier courant

Le serveur sert les fichiers **du dossier où la commande est lancée**.

------------------------------------------------------------------------

## 🧭 4. Accéder aux fichiers

    /project
     ├── index.php
     ├── test.php
     └── dossier/page.php

-   http://localhost:8000/test.php\
-   http://localhost:8000/dossier/page.php

------------------------------------------------------------------------

## 📑 5. Router optionnel

``` php
<?php
if (php_sapi_name() === 'cli-server') {
    $path = __DIR__ . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    if (is_file($path)) return false;
}
require __DIR__ . '/index.php';
```

``` bash
php -S localhost:8000 router.php
```

------------------------------------------------------------------------

## 🟢 Exemple simple

``` php
<?php
echo "Hello world!";
```

Puis :

``` bash
php -S localhost:8000
```

Ouvrir : http://localhost:8000
