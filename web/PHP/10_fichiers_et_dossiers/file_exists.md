# Cours PHP : La fonction `file_exists()`

## 1. Introduction

En PHP, la fonction `file_exists()` permet de vérifier si un chemin donné correspond à un **fichier ou un dossier existant**. Elle est utile pour valider l'existence d'un chemin avant de le manipuler.

---

## 2. Syntaxe

```php
bool file_exists(string $path)
```

* **$path** : le chemin du fichier ou du dossier à tester.
* Retourne **true** si le chemin existe.
* Retourne **false** si le chemin n'existe pas.

---

## 3. Exemple simple

```php
$chemin = "document.txt";

if (file_exists($chemin)) {
    echo "$chemin existe.";
} else {
    echo "$chemin n'existe pas.";
}
```

* Si `document.txt` existe :

```
document.txt existe.
```

* Sinon :

```
document.txt n'existe pas.
```

---

## 4. Comparaison avec `is_file()` et `is_dir()`

| Fonction        | Vérifie quoi ?                        |
| --------------- | ------------------------------------- |
| `file_exists()` | Le chemin existe (fichier ou dossier) |
| `is_file()`     | Le chemin existe et est un fichier    |
| `is_dir()`      | Le chemin existe et est un dossier    |

* `file_exists()` ne distingue pas si c'est un fichier ou un dossier.
* Pour savoir exactement le type, combinez-la avec `is_file()` ou `is_dir()`.

---

## 5. Exemple combiné

```php
$chemin = "uploads";

if (file_exists($chemin)) {
    if (is_file($chemin)) {
        echo "C'est un fichier existant.";
    } elseif (is_dir($chemin)) {
        echo "C'est un dossier existant.";
    }
} else {
    echo "Le chemin n'existe pas.";
}
```

---

## 6. Utilisations courantes

* Vérifier qu'un fichier existe avant de le lire ou de le modifier.
* Vérifier qu'un dossier existe avant d'y stocker des fichiers.
* Éviter les erreurs liées à l'accès à des chemins inexistants.

---

## 7. Conclusion

La fonction `file_exists()` est simple mais essentielle pour :

* Vérifier l'existence d'un chemin.
* Sécuriser les opérations sur les fichiers et dossiers.
* Préparer des conditions avant de manipuler des fichiers ou dossiers.

**Astuce :** Utilisez `file_exists()` en combinaison avec `is_file()` et `is_dir()` pour un contrôle complet sur vos chemins.
