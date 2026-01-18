# Cours PHP : `preg_match`

## 1. Introduction

En PHP, la fonction `preg_match` permet de tester si une **expression régulière** (regex) correspond à une chaîne de caractères. Elle est très utilisée pour la **validation**, la **recherche de motifs** et l’**extraction de données**.

`preg_match` fait partie de l’extension **PCRE** (Perl Compatible Regular Expressions).

---

## 2. Syntaxe

```php
preg_match(string $pattern, string $subject, array &$matches = null, int $flags = 0, int $offset = 0): int|false
```

### Paramètres

* **`$pattern`** : l’expression régulière (délimitée par des séparateurs, souvent `/`).
* **`$subject`** : la chaîne à analyser.
* **`$matches`** *(optionnel)* : tableau contenant les correspondances trouvées.
* **`$flags`** *(optionnel)* : options supplémentaires.
* **`$offset`** *(optionnel)* : position de départ de la recherche.

### Valeur de retour

* `1` : une correspondance a été trouvée
* `0` : aucune correspondance
* `false` : erreur

---

## 3. Exemple simple

```php
$texte = "Bonjour le monde";

if (preg_match("/monde/", $texte)) {
    echo "Mot trouvé";
}
```

➡️ Ici, la regex `/monde/` vérifie si le mot *monde* est présent.

---

## 4. Délimiteurs et modificateurs

### Délimiteurs

Une regex doit toujours être entourée par des délimiteurs :

```php
/bonjour/
#bonjour#
~bonjour~
```

### Modificateurs courants

| Modificateur | Description                                |
| ------------ | ------------------------------------------ |
| `i`          | Insensible à la casse                      |
| `m`          | Mode multilignes                           |
| `s`          | Le point `.` inclut les retours à la ligne |
| `u`          | Support UTF-8                              |

Exemple :

```php
preg_match("/bonjour/i", "Bonjour");
```

---

## 5. Utilisation des classes de caractères

```php
preg_match("/[0-9]/", "abc123"); // true
preg_match("/[a-z]/i", "PHP");  // true
```

Classes courantes :

* `[0-9]` : chiffres
* `[
