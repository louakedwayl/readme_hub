# PHP : trim(), filter_var() et empty()

## 1. La fonction `trim()`

`trim()` est utilisée pour **supprimer les espaces (ou d'autres caractères) en début et fin d'une chaîne**.

### Syntaxe

```php
trim(string $chaine, string $caracteres = " \t\n\r\0\x0B"): string
```

- `$chaine` : la chaîne à nettoyer.
- `$caracteres` (optionnel) : liste des caractères à supprimer (par défaut, espaces, tabulations, retours à la ligne…).

### Exemple

```php
$nom = "  Alice  ";
$nom = trim($nom);
echo $nom; // "Alice"
```

**Remarque :** Supprime uniquement les espaces au début et à la fin, pas ceux au milieu.

---

## 2. La fonction `filter_var()`

`filter_var()` sert à **valider ou filtrer une donnée**.

### Syntaxe

```php
filter_var(mixed $variable, int $filtre, array|int $options = 0): mixed
```

- `$variable` : la donnée à filtrer.
- `$filtre` : type de filtre à appliquer (ex. `FILTER_VALIDATE_EMAIL`).
- `$options` : options supplémentaires pour le filtre.

### Exemples

#### Valider un email

```php
$email = "test@example.com";
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email valide";
} else {
    echo "Email invalide";
}
```

#### Nettoyer une chaîne

```php
$chaine = "<h1>Bonjour</h1>";
$chaine_filtre = filter_var($chaine, FILTER_SANITIZE_STRING);
echo $chaine_filtre; // "Bonjour"
```

**Remarque :** `filter_var()` est très utile pour sécuriser les données envoyées par l'utilisateur.

---

## 3. La fonction `empty()`

`empty()` permet de vérifier si une variable est vide.

### Syntaxe

```php
empty($variable): bool
```

- Retourne `true` si la variable est :
  - `""` (chaîne vide)
  - `0` ou `"0"`
  - `NULL`
  - `false`
  - un tableau vide
  - non définie
- Sinon, retourne `false`.

### Exemple

```php
$nom = "";
if (empty($nom)) {
    echo "La variable est vide";
} else {
    echo "La variable contient quelque chose";
}
```

**Résultat :**

```
La variable est vide
```

---

## 4. Exemple pratique combiné

```php
$email = "   test@example.com   ";

// Supprimer les espaces
$email = trim($email);

// Vérifier si vide
if (empty($email)) {
    echo "Email non fourni";
} else {
    // Valider l'email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email valide : $email";
    } else {
        echo "Email invalide";
    }
}
```

**Résultat attendu :**

```
Email valide : test@example.com
```

---

## 5. Résumé

| Fonction | Utilité |
|----------|---------|
| `trim()` | Supprimer les espaces au début et à la fin d'une chaîne |
| `filter_var()` | Valider ou nettoyer une donnée (email, URL, chaîne…) |
| `empty()` | Vérifier si une variable est vide ou non définie |

Ces trois fonctions sont souvent utilisées ensemble pour nettoyer, valider et sécuriser les données envoyées par l'utilisateur, notamment via `$_GET` ou `$_POST`.
