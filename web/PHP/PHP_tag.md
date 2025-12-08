# La balise PHP : fonctionnement, règles et bonnes pratiques

Ce cours t’explique **tout sur la balise PHP** : comment l’ouvrir, quand la fermer, et les erreurs à éviter.

---

## 1. C’est quoi la balise PHP ?

La balise PHP sert à indiquer au serveur : « Ici, commence du code PHP ».

La syntaxe :

```php
<?php
    // ton code ici
?>
```

Tout ce qui se trouve **entre `<?php` et `?>`** est exécuté par PHP.

---

## 2. Peut-on utiliser la balise PHP dans n’importe quel fichier ?

Non.

Le PHP s’exécute **uniquement dans un fichier `.php`** ou un fichier que le serveur traite comme du PHP.

Un fichier `.html` avec du PHP **ne marchera pas**.

---

## 3. Quand doit-on fermer la balise PHP ?

### ✔️ Tu DOIS fermer la balise quand :

**Tu mélanges du PHP et du HTML.**

Exemple :

```php
<!DOCTYPE html>
<html>
<body>
    <h1>Bienvenue</h1>
    <p>Heure locale : <?php echo date('H:i'); ?></p>
</body>
</html>
```

Ici, tu ouvres et fermes la balise PHP au milieu du HTML.

---

## 4. Quand NE PAS fermer la balise PHP ? (Bonne pratique)

### ❌ Tu NE DOIS PAS fermer la balise dans un fichier **qui contient uniquement du PHP**.

Exemple :

```php
<?php
function getUser() {
    return "Wayl";
}
// pas de fermeture
```

### Pourquoi c’est recommandé de ne pas fermer ?

Parce que fermer la balise peut créer :

* des **espaces** accidentels après `?>`,
* des **retours à la ligne**,
* ce qui peut casser :

  * `header()`
  * les sessions
  * les redirections
  * ou envoyer du contenu avant le HTML

Cette recommandation est **officielle**, adoptée par :

* Laravel
* Symfony
* WordPress
* CodeIgniter
* Zend / Laminas

Bref : **tous les projets sérieux en PHP**.

---

## 5. Résumé simple

### ✔️ Tu fermes `?>` si :

* il y a du HTML **dans le même fichier**.

### ❌ Tu NE fermes PAS `?>` si :

* le fichier ne contient que du PHP.

---

## 6. Pourquoi cette règle existe ?

La fermeture `?>` est optionnelle **depuis PHP 5.3**.
Elle a été rendue optionnelle pour éviter un bug classique :

```php
?>
<--- un espace ici et tout casse
```

PHP considère cet espace comme du contenu à envoyer au navigateur → ce qui empêche d'envoyer des headers.

---

## 7. Est-ce obligatoire ?

Non, mais **c’est fortement recommandé** par la communauté et dans tous les standards modernes.

---

## 8. Cas particuliers

### Fichier de configuration

Souvent sans fermeture :

```php
<?php
return [
    'db' => 'mysql',
];
```

### Classe, contrôleur, modèle

Toujours sans fermeture :

```php
<?php
class User {}
```

---

Si tu veux, je peux créer un chapitre sur **les balises alternatives** (`<?=`, `<?`, etc.) et pourquoi il faut souvent les éviter.
