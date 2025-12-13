# Cours PHP : La fonction `is_dir()`

## 1. Introduction

En PHP, la fonction `is_dir()` permet de vérifier si un chemin donné correspond à un **dossier** (directory). Elle est très utile pour gérer les fichiers et dossiers de manière sécurisée.

---

## 2. Syntaxe

```php
bool is_dir(string $path)
```

* **$path** : le chemin à tester (ex : "dossier_test" ou "/var/www/html/uploads").
* Retourne **true** si le chemin existe et est un dossier.
* Retourne **false** si le chemin n'existe pas ou s'il ne s'agit pas d'un dossier.

---

## 3. Exemple simple

```php
$chemin = "dossier_test";

if (is_dir($chemin)) {
    echo "$chemin est un dossier.";
} else {
    echo "$chemin n'est pas un dossier.";
}
```

* Si `dossier_test` existe et est un dossier, le message sera :

```
dossier_test est un dossier.
```

* Sinon :

```
dossier_test n'est pas un dossier.
```

---

## 4. Vérification avant création de dossier

Avant de créer un dossier, il est recommandé de vérifier qu'il n'existe pas déjà :

```php
$dir = "uploads";

if (!is_dir($dir)) {
    mkdir($dir, 0755); // Crée le dossier avec permissions
    echo "Dossier créé : $dir";
} else {
    echo "Le dossier $dir existe déjà.";
}
```

* `mkdir()` crée le dossier si nécessaire.
* `0755` définit les permissions du dossier (lecture, écriture, exécution).

---

## 5. Utilisations courantes

* Vérifier qu’un dossier existe avant d’y stocker des fichiers uploadés.
* Sécuriser la gestion de fichiers pour éviter les erreurs.
* Parcourir des dossiers uniquement s’ils existent.

---

## 6. Conclusion

La fonction `is_dir()` est simple mais essentielle pour :

* Identifier si un chemin est un dossier.
* Sécuriser les opérations sur fichiers et dossiers.
* Éviter les erreurs lors de la création ou de l’accès à des dossiers.

**Astuce :** Toujours vérifier un dossier avant d’y créer des fichiers ou sous-dossiers pour éviter les conflits ou les erreurs.
