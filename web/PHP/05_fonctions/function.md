# Les fonctions en PHP

## Introduction

Les fonctions sont des blocs de code réutilisables qui effectuent une tâche spécifique. Elles permettent d'organiser le code, d'éviter les répétitions et de rendre les programmes plus maintenables.

## Déclaration d'une fonction

### Syntaxe de base

```php
function nomDeLaFonction() {
    // Code à exécuter
}
```

### Exemple simple

```php
function direBonjour() {
    echo "Bonjour !";
}

// Appel de la fonction
direBonjour(); // Affiche : Bonjour !
```

## Fonctions avec paramètres

Les paramètres permettent de passer des valeurs à une fonction.

```php
function saluer($nom) {
    echo "Bonjour $nom !";
}

saluer("Marie"); // Affiche : Bonjour Marie !
saluer("Pierre"); // Affiche : Bonjour Pierre !
```

### Plusieurs paramètres

```php
function additionner($a, $b) {
    $resultat = $a + $b;
    echo "La somme est : $resultat";
}

additionner(5, 3); // Affiche : La somme est : 8
```

## Valeurs de retour

Une fonction peut retourner une valeur avec le mot-clé `return`.

```php
function multiplier($a, $b) {
    return $a * $b;
}

$resultat = multiplier(4, 5);
echo $resultat; // Affiche : 20

// Utilisation directe
echo multiplier(3, 7); // Affiche : 21
```

**Important :** Le `return` termine l'exécution de la fonction. Tout code après un `return` ne sera pas exécuté.

```php
function exemple() {
    return "Première valeur";
    echo "Ceci ne s'affichera jamais"; // Code non exécuté
}
```

## Arguments par défaut

Les arguments par défaut permettent de rendre certains paramètres optionnels en leur attribuant une valeur par défaut.

### Syntaxe

```php
function nomFonction($parametre = valeurParDefaut) {
    // Code
}
```

### Exemple simple

```php
function saluer($nom = "invité") {
    echo "Bonjour $nom !";
}

saluer("Alice"); // Affiche : Bonjour Alice !
saluer();        // Affiche : Bonjour invité !
```

### Plusieurs arguments avec valeurs par défaut

```php
function creerProfil($nom, $age = 18, $ville = "Paris") {
    echo "Nom : $nom, Age : $age, Ville : $ville";
}

creerProfil("Jean");                    // Nom : Jean, Age : 18, Ville : Paris
creerProfil("Marie", 25);               // Nom : Marie, Age : 25, Ville : Paris
creerProfil("Pierre", 30, "Lyon");      // Nom : Pierre, Age : 30, Ville : Lyon
```

### Règle importante : Ordre des paramètres

Les paramètres avec valeurs par défaut **doivent toujours** être placés après les paramètres obligatoires.

```php
// ✅ CORRECT
function exemple($obligatoire, $optionnel = "défaut") {
    // Code
}

// ❌ INCORRECT
function exemple($optionnel = "défaut", $obligatoire) {
    // Erreur : les paramètres obligatoires doivent venir en premier
}
```

### Cas d'usage pratiques

#### Fonction de connexion à une base de données

```php
function connecterDB($host = "localhost", $user = "root", $password = "", $dbname = "mabase") {
    // Code de connexion
    return "Connexion à $dbname sur $host";
}

connecterDB(); // Utilise toutes les valeurs par défaut
connecterDB("192.168.1.100"); // Change seulement l'host
connecterDB("192.168.1.100", "admin", "pass123", "prod_db"); // Tous personnalisés
```

#### Fonction d'affichage de message

```php
function afficherMessage($texte, $type = "info", $afficher = true) {
    $message = "[$type] $texte";
    
    if ($afficher) {
        echo $message;
    }
    
    return $message;
}

afficherMessage("Opération réussie"); // Type "info" et affichage par défaut
afficherMessage("Attention !", "warning"); // Type warning, affichage par défaut
afficherMessage("Erreur critique", "error", false); // N'affiche pas mais retourne
```

#### Fonction de formatage de prix

```php
function formaterPrix($montant, $devise = "€", $decimales = 2) {
    return number_format($montant, $decimales) . " $devise";
}

echo formaterPrix(1234.5);           // 1,234.50 €
echo formaterPrix(1234.5, "$");      // 1,234.50 $
echo formaterPrix(1234.567, "€", 3); // 1,234.567 €
```

## Types de déclaration et portée

### Variables locales

Les variables déclarées à l'intérieur d'une fonction sont locales à cette fonction.

```php
function calculer() {
    $resultat = 10 * 5;
    echo $resultat; // Affiche : 50
}

calculer();
echo $resultat; // Erreur : $resultat n'existe pas ici
```

### Variables globales

Pour accéder à une variable globale depuis une fonction, utilisez le mot-clé `global`.

```php
$compteur = 0;

function incrementer() {
    global $compteur;
    $compteur++;
}

incrementer();
echo $compteur; // Affiche : 1
```

**Note :** L'utilisation de variables globales est généralement déconseillée. Préférez passer les valeurs en paramètres et retourner les résultats.

### Variables statiques

Une variable statique conserve sa valeur entre les appels de fonction.

```php
function compter() {
    static $nombre = 0;
    $nombre++;
    echo $nombre . " ";
}

compter(); // Affiche : 1
compter(); // Affiche : 2
compter(); // Affiche : 3
```

## Passage de paramètres

### Par valeur (par défaut)

Par défaut, PHP passe les arguments par valeur : une copie est créée.

```php
function doubler($nombre) {
    $nombre = $nombre * 2;
    echo "Dans la fonction : $nombre\n";
}

$valeur = 10;
doubler($valeur); // Dans la fonction : 20
echo $valeur;     // Affiche : 10 (valeur originale inchangée)
```

### Par référence

Avec le symbole `&`, on passe une référence à la variable originale.

```php
function doublerReference(&$nombre) {
    $nombre = $nombre * 2;
}

$valeur = 10;
doublerReference($valeur);
echo $valeur; // Affiche : 20 (valeur originale modifiée)
```

## Fonctions avec un nombre variable d'arguments

### Avec ... (opérateur splat)

```php
function additionnerTout(...$nombres) {
    $somme = 0;
    foreach ($nombres as $nombre) {
        $somme += $nombre;
    }
    return $somme;
}

echo additionnerTout(1, 2, 3);        // Affiche : 6
echo additionnerTout(10, 20, 30, 40); // Affiche : 100
```

### Combinaison avec paramètres normaux

```php
function creerMessage($titre, ...$elements) {
    echo "=== $titre ===\n";
    foreach ($elements as $element) {
        echo "- $element\n";
    }
}

creerMessage("Ma liste", "Pommes", "Bananes", "Oranges");
// === Ma liste ===
// - Pommes
// - Bananes
// - Oranges
```

## Typage des paramètres et valeurs de retour

### Typage des paramètres

```php
function calculerAge(int $anneeNaissance): int {
    return date('Y') - $anneeNaissance;
}

echo calculerAge(1990); // Fonctionne
// calculerAge("1990"); // PHP tentera une conversion automatique
```

### Types disponibles

- `int` : entier
- `float` : nombre à virgule
- `string` : chaîne de caractères
- `bool` : booléen
- `array` : tableau
- `object` : objet
- Classes spécifiques

```php
function traiterTableau(array $data): string {
    return implode(", ", $data);
}

function afficherUtilisateur(User $user): void {
    echo $user->nom;
}
```

### Type mixte et nullable

```php
// Paramètre nullable (peut être null)
function afficher(?string $message): void {
    if ($message !== null) {
        echo $message;
    }
}

afficher("Hello");  // Affiche : Hello
afficher(null);     // Ne fait rien

// Type mixte (PHP 8+)
function traiter(mixed $valeur): mixed {
    return $valeur;
}
```

## Fonctions anonymes et fléchées

### Fonctions anonymes (closures)

```php
$saluer = function($nom) {
    return "Bonjour $nom";
};

echo $saluer("Marie"); // Affiche : Bonjour Marie
```

### Fonctions fléchées (arrow functions - PHP 7.4+)

```php
$multiplier = fn($x, $y) => $x * $y;

echo $multiplier(5, 3); // Affiche : 15
```

### Utilisation avec array_map

```php
$nombres = [1, 2, 3, 4, 5];
$doubles = array_map(fn($n) => $n * 2, $nombres);
print_r($doubles); // [2, 4, 6, 8, 10]
```

## Fonctions récursives

Une fonction récursive s'appelle elle-même.

```php
function factorielle($n) {
    if ($n <= 1) {
        return 1;
    }
    return $n * factorielle($n - 1);
}

echo factorielle(5); // Affiche : 120 (5 × 4 × 3 × 2 × 1)
```

## Bonnes pratiques

### 1. Nommage clair et descriptif

```php
// ❌ Mauvais
function f($x, $y) { return $x + $y; }

// ✅ Bon
function calculerSomme($nombre1, $nombre2) {
    return $nombre1 + $nombre2;
}
```

### 2. Une fonction = une responsabilité

```php
// ✅ Bon : fonctions spécialisées
function validerEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function envoyerEmail($destinataire, $sujet, $message) {
    // Code d'envoi
}

// Utilisation
if (validerEmail($email)) {
    envoyerEmail($email, "Bienvenue", "Merci de votre inscription");
}
```

### 3. Limiter le nombre de paramètres

Si une fonction a plus de 3-4 paramètres, envisagez d'utiliser un tableau ou un objet.

```php
// Au lieu de :
function creerUtilisateur($nom, $prenom, $email, $age, $ville, $pays, $tel) {
    // ...
}

// Préférez :
function creerUtilisateur($donnees) {
    $nom = $donnees['nom'];
    $prenom = $donnees['prenom'];
    // ...
}

creerUtilisateur([
    'nom' => 'Dupont',
    'prenom' => 'Jean',
    'email' => 'jean@example.com',
    'age' => 30
]);
```

### 4. Documentation avec PHPDoc

```php
/**
 * Calcule la surface d'un rectangle
 * 
 * @param float $longueur La longueur du rectangle
 * @param float $largeur La largeur du rectangle
 * @return float La surface calculée
 */
function calculerSurface(float $longueur, float $largeur): float {
    return $longueur * $largeur;
}
```

### 5. Gestion des erreurs

```php
function diviser($a, $b) {
    if ($b == 0) {
        throw new Exception("Division par zéro impossible");
    }
    return $a / $b;
}

try {
    echo diviser(10, 2); // Affiche : 5
    echo diviser(10, 0); // Lance une exception
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
```

## Résumé

Les fonctions en PHP permettent de :
- **Réutiliser** du code facilement
- **Organiser** le programme en blocs logiques
- **Simplifier** la maintenance et les tests
- **Paramétrer** le comportement avec des arguments
- **Définir des valeurs par défaut** pour rendre les paramètres optionnels

**Points clés à retenir :**
- Les fonctions rendent le code plus lisible et maintenable
- Les arguments par défaut doivent être placés en fin de liste
- Utilisez `return` pour retourner des valeurs
- Le typage renforce la robustesse du code
- Une fonction devrait avoir une seule responsabilité claire
- Documentez vos fonctions pour faciliter leur utilisation
