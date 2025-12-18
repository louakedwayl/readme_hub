# Cours PHP : La fonction `is_file()`

## 1. Introduction

En PHP, la fonction `is_file()` permet de vérifier si un chemin donné correspond à un **fichier**. Elle est complémentaire à `is_dir()`, qui vérifie si un chemin est un dossier.

---

## 2. Syntaxe

```php
bool is_file(string $path)
```

* **$path** : le chemin du fichier à tester.
* Retourne **true** si le chemin existe et correspond à un fichier.
* Retourne **false** si le chemin n'existe pas ou s'il s'agit d'un dossier.

---

## 3. Exemple simple

```php
$chemin = "document.txt";

if (is_file($chemin)) {
    echo "$chemin est un fichier.";
} else {
    echo "$chemin n'est pas un fichier.";
}
```

* Si `document.txt` existe et est un fichier, le message affiché sera :

```
document.txt est un fichier.
```

* Sinon :

```
document.txt n'est pas un fichier.
```

---

## 4. Comparaison avec `is_dir()`

| Fonction    | Vérifie quoi ?           |
| ----------- | ------------------------ |
| `is_dir()`  | Le chemin est un dossier |
| `is_file()` | Le chemin est un fichier |

* `is_file()` retourne **false** pour un dossier.
* `is_dir()` retourne **false** pour un fichier.

### Exemple combiné :

```php
$chemin = "test";

if (is_file($chemin)) {
    echo "C'est un fichier.";
} elseif (is_dir($chemin)) {
    echo "C'est un dossier.";
} else {
    echo "Le chemin n'existe pas.";
}
```

---

## 5. Utilisations courantes

* Vérifier qu’un fichier existe avant de le lire ou le modifier.
* Différencier fichiers et dossiers dans une arborescence.
* Sécuriser les opérations sur les fichiers pour éviter les erreurs.

---

## 6. Conclusion

La fonction `is_file()` est essentielle pour :

* Identifier si un chemin est un fichier.
* Sécuriser la lecture, l’écriture ou la suppression de fichiers.
* Travailler de manière sûre avec l’arborescence des fichiers et dossiers.

**Astuce :** Utiliser `is_file()` et `is_dir()` ensemble pour gérer correctement les chemins et éviter les confusions entre fichiers et dossiers.
