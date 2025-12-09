# L'interpolation de variables en PHP

## Introduction

L'interpolation de variables est une fonctionnalité puissante de PHP qui permet d'insérer directement la valeur d'une variable à l'intérieur d'une chaîne de caractères. Cette technique rend le code plus lisible et plus concis que la concaténation traditionnelle.

## Les guillemets doubles vs guillemets simples

En PHP, le type de guillemets utilisé détermine si l'interpolation est possible ou non.

### Guillemets doubles (")

Les guillemets doubles permettent l'interpolation des variables :

```php
$nom = "Marie";
echo "Bonjour $nom !"; // Affiche : Bonjour Marie !
```

### Guillemets simples (')

Les guillemets simples n'interprètent pas les variables :

```php
$nom = "Marie";
echo 'Bonjour $nom !'; // Affiche : Bonjour $nom !
```

## Syntaxes d'interpolation

### Syntaxe simple

La forme la plus basique consiste à placer directement le nom de la variable dans la chaîne :

```php
$prenom = "Jean";
$age = 25;
echo "Je m'appelle $prenom et j'ai $age ans.";
// Affiche : Je m'appelle Jean et j'ai 25 ans.
```

### Syntaxe avec accolades

Pour éviter les ambiguïtés ou accéder à des propriétés complexes, on utilise des accolades `{}` :

```php
$fruit = "pomme";
echo "J'aime les {$fruit}s"; // Affiche : J'aime les pommes

// Sans accolades, PHP chercherait une variable $fruits
echo "J'aime les $fruits"; // Erreur si $fruits n'existe pas
```

## Interpolation avec des tableaux

### Tableaux simples

```php
$couleurs = ["rouge", "vert", "bleu"];
echo "Ma couleur préférée est {$couleurs[0]}";
// Affiche : Ma couleur préférée est rouge
```

### Tableaux associatifs

```php
$personne = ["nom" => "Dupont", "prenom" => "Pierre"];
echo "M. {$personne['nom']} {$personne['prenom']}";
// Affiche : M. Dupont Pierre
```

**Note importante** : Pour les tableaux associatifs, il faut obligatoirement utiliser les accolades et des guillemets simples pour les clés.

## Interpolation avec des objets

On peut interpoler les propriétés d'objets en utilisant la syntaxe avec accolades :

```php
class Utilisateur {
    public $nom = "Martin";
    public $email = "martin@example.com";
}

$user = new Utilisateur();
echo "Utilisateur : {$user->nom} ({$user->email})";
// Affiche : Utilisateur : Martin (martin@example.com)
```

## Caractères d'échappement

Pour afficher un symbole dollar littéral dans une chaîne avec guillemets doubles, on utilise l'antislash `\` :

```php
$prix = 50;
echo "Ce produit coûte \$$prix"; // Affiche : Ce produit coûte $50
```

Autres caractères d'échappement courants :
- `\n` : nouvelle ligne
- `\t` : tabulation
- `\\` : antislash littéral
- `\"` : guillemet double littéral

## Interpolation vs concaténation

### Concaténation avec l'opérateur `.`

```php
$nom = "Sophie";
$message = "Bonjour " . $nom . ", comment allez-vous ?";
```

### Interpolation (recommandée pour la lisibilité)

```php
$nom = "Sophie";
$message = "Bonjour $nom, comment allez-vous ?";
```

L'interpolation est généralement plus lisible, mais la concaténation peut être préférable pour des expressions complexes.

## Interpolation et expressions

Les expressions complexes nécessitent la syntaxe avec accolades :

```php
$a = 5;
$b = 10;
echo "La somme est {$a + $b}"; // Affiche : La somme est 15

$nombre = 7;
echo "Le double est {$nombre * 2}"; // Affiche : Le double est 14
```

## Heredoc et Nowdoc

### Heredoc (avec interpolation)

Heredoc permet d'écrire des chaînes multi-lignes avec interpolation :

```php
$nom = "Alice";
$age = 30;

$texte = <<<EOT
Bonjour, je m'appelle $nom.
J'ai $age ans.
Voici mon profil.
EOT;

echo $texte;
```

### Nowdoc (sans interpolation)

Nowdoc est similaire mais n'interprète pas les variables (comme les guillemets simples) :

```php
$texte = <<<'EOT'
Ceci est du texte brut.
$nom ne sera pas interprété.
EOT;
```

## Bonnes pratiques

1. **Utilisez les accolades pour la clarté** : Même si ce n'est pas toujours nécessaire, cela rend le code plus explicite.

2. **Privilégiez l'interpolation pour des chaînes simples** : C'est plus lisible que la concaténation.

3. **Utilisez la concaténation pour des expressions complexes** : Cela peut être plus clair dans certains cas.

4. **Attention aux performances** : Pour de très grandes quantités de données, la concaténation peut être légèrement plus performante, mais la différence est généralement négligeable.

5. **Évitez l'interpolation dans les requêtes SQL** : Utilisez toujours des requêtes préparées pour éviter les injections SQL.

## Exemples pratiques

### Génération de HTML

```php
$titre = "Mon Site";
$contenu = "Bienvenue sur mon site web";

$html = "<html>
    <head>
        <title>$titre</title>
    </head>
    <body>
        <h1>$titre</h1>
        <p>$contenu</p>
    </body>
</html>";
```

### Formatage de messages

```php
$utilisateur = "Jean";
$articles = 5;

$message = "Bonjour {$utilisateur}, vous avez {$articles} article(s) dans votre panier.";
```

### Chemins de fichiers

```php
$dossier = "/var/www";
$fichier = "index.php";

$chemin = "{$dossier}/{$fichier}";
// Résultat : /var/www/index.php
```

## Conclusion

L'interpolation de variables en PHP est une fonctionnalité essentielle qui améliore la lisibilité du code. En comprenant les différentes syntaxes et leurs cas d'usage, vous pourrez écrire du code PHP plus propre et plus maintenable. N'oubliez pas de toujours utiliser la méthode appropriée en fonction du contexte et de la complexité de votre code.
