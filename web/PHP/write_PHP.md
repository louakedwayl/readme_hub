# Où écrire le PHP ?

Ce cours t’explique clairement **où et comment écrire du PHP**, comment l’exécuter, et comment l’organiser dans un projet.

---

## 1. Le PHP s’exécute côté serveur

PHP est un **langage backend**. Contrairement au JavaScript dans le navigateur, le PHP :

* ne s’exécute **pas** dans ton navigateur directement,
* il s’exécute **sur un serveur** (Apache, Nginx, PHP-FPM, etc.),
* ton navigateur reçoit **uniquement le HTML généré** par le serveur.

---

## 2. Où écrire ton code PHP ?

Tu peux écrire ton code PHP dans **des fichiers avec l’extension `.php`**.

Exemples de fichiers :

* `index.php`
* `login.php`
* `upload.php`
* `config.php`

À l’intérieur d’un fichier `.php`, tu écris le code entre balises :

```php
<?php
    echo "Hello World";
?>
```

> Sans ces balises `<?php ... ?>`, le serveur ne reconnaît pas ton code.

---

## 3. Écrire du PHP dans un fichier HTML

Tu peux **mélanger du HTML et du PHP** dans le même fichier `.php`.

Exemple :

```php
<!DOCTYPE html>
<html>
<body>
    <h1>Mon site</h1>
    <p>
        Aujourd'hui nous sommes :
        <?php echo date('d/m/Y'); ?>
    </p>
</body>
</html>
```

> Attention : si le fichier s’appelle `.html`, le PHP ne s’exécutera pas.
> Il doit être enregistré en `.php`.

---

## 4. Le PHP doit être exécuté par un serveur

Le code PHP ne marche **que** si tu l’exécutes via :

* Apache + module PHP,
* ou Nginx + PHP-FPM,
* ou un serveur interne comme :

```bash
php -S localhost:8000
```

> Si tu ouvres un `.php` directement en double-cliquant dessus, ça ne marche pas.

---

## 5. Organisation d’un projet PHP

Structure typique :

```
/mon-projet
│── index.php
│── login.php
│── register.php
│── config.php
└── includes/
       ├── header.php
       └── footer.php
```

Tu peux inclure un fichier dans un autre :

```php
<?php include 'includes/header.php'; ?>
```

---

## 6. Interagir avec une base de données

Le code PHP peut se trouver dans des fichiers connectés à la base :

```php
<?php
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$users = $pdo->query("SELECT * FROM users");
?>
```

En général on met :

* la connexion dans `config.php`,
* et on l’inclut partout où on en a besoin.

---

## 7. Résumé

* Tu écris du PHP dans des fichiers **.php**.
* Le PHP doit être exécuté par un **serveur**.
* Tu peux mélanger **HTML + PHP** dans un fichier .php.
* Le navigateur ne voit **jamais** ton code PHP.
* Organisation typique : plusieurs fichiers .php + includes.

---

Si tu veux, je peux aussi t’écrire un **chapitre 2** : “Comment organiser un projet PHP proprement”, ou un cours sur **PDO**, **les sessions**, **la POO**, etc.
