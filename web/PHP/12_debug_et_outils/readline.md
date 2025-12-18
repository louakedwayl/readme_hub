# La fonction `readline()` en PHP

## Introduction

La fonction `readline()` en PHP permet de lire une ligne saisie par l'utilisateur dans le terminal. Très utilisée dans les scripts CLI (Command Line Interface), elle facilite les interactions en ligne de commande.

Ce cours détaille son fonctionnement, ses options, ainsi que des exemples pratiques.

---

## 1. Présentation de `readline()`

`readline()` affiche une invite (prompt) et attend que l'utilisateur saisisse du texte, puis renvoie la chaîne tapée.

### Syntaxe

```php
readline(string $prompt = ""): string|false
```

* `$prompt` : texte affiché avant la saisie
* Retourne : la chaîne entrée ou `false` si une erreur survient

### Exemple simple

```php
$nom = readline("Entrez votre nom : ");
echo "Bonjour, $nom !";
```

---

## 2. Validation et conversion des entrées

La valeur lue est toujours une chaîne. Il peut être nécessaire de valider ou convertir.

### Exemple : nombre entier

```php
$age = readline("Quel âge avez-vous ? ");
$age = (int)$age;
```

### Validation

```php
$valide = false;
while (!$valide) {
    $choix = readline("Tapez un nombre entre 1 et 5 : ");
    if (is_numeric($choix) && $choix >= 1 && $choix <= 5) {
        $valide = true;
    } else {
        echo "Saisie incorrecte.\n";
    }
}
```

---

## 3. Utiliser l'historique (`readline_add_history`)

PHP peut enregistrer les précédentes commandes saisies.

### Ajouter une entrée à l'historique

```php
$commande = readline("Commande : ");
readline_add_history($commande);
```

### Lire l'historique dans un fichier

```php
readline_read_history("historique.txt");
```

### Écrire l'historique dans un fichier

```php
readline_write_history("historique.txt");
```

---

## 4. Autocomplétion

L'autocomplétion permet de proposer des complétions de texte.

### Exemple : autocompléter parmi une liste

```php
$fruits = ["pomme", "banane", "orange", "kiwi"];

readline_completion_function(function($input) use ($fruits) {
    return array_filter($fruits, fn($fruit) => str_starts_with($fruit, $input));
});

$valeur = readline("Fruit : ");
echo "Vous avez choisi $valeur";
```

> Remarque : L’autocomplétion dépend de la disponibilité de la bibliothèque `readline` dans votre installation PHP.

---

## 5. Construction d'un petit programme CLI

Exemple : un mini-menu utilisant `readline()`.

```php
while (true) {
    echo "\n--- MENU ---\n";
    echo "1. Dire bonjour\n";
    echo "2. Donner la date\n";
    echo "3. Quitter\n";

    $choix = readline("Choisissez une option : ");

    switch ($choix) {
        case "1":
            echo "Bonjour !\n";
            break;
        case "2":
            echo date("d/m/Y H:i:s") . "\n";
            break;
        case "3":
            exit("Au revoir !\n");
        default:
            echo "Option inconnue.\n";
    }
}
```

---

## 6. Limitations et alternatives

* `readline()` fonctionne uniquement en mode CLI.
* Elle peut ne pas être disponible sur certaines installations Windows.

### Alternatives

* `fgets(STDIN)` : plus simple et disponible partout

```php
echo "Votre nom : ";
$nom = trim(fgets(STDIN));
```

---

## Conclusion

La fonction `readline()` est un outil puissant pour créer des applications PHP interactives en ligne de commande. Elle permet la saisie utilisateur, l’autocomplétion, et la gestion d’historique, facilitant grandement la création d’outils CLI propres et ergonomiques.
