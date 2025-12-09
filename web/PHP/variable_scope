# La portée des variables en PHP

## Introduction

La portée (ou "scope") d'une variable définit où cette variable est accessible dans votre code. Comprendre la portée est essentiel pour éviter les erreurs et écrire du code clair.

## Les types de portée en PHP

PHP a trois types principaux de portée :
1. **Locale** : dans une fonction
2. **Globale** : en dehors des fonctions
3. **Statique** : conserve sa valeur entre les appels

## Portée locale

Une variable déclarée dans une fonction n'existe que dans cette fonction.

```php
function maFonction() {
    $variableLocale = "Je suis locale";
    echo $variableLocale; // Fonctionne
}

maFonction();
echo $variableLocale; // Erreur : variable non définie
```

Chaque fonction a son propre espace. Deux fonctions peuvent avoir des variables avec le même nom sans conflit.

```php
function fonction1() {
    $message = "Fonction 1";
    echo $message;
}

function fonction2() {
    $message = "Fonction 2";
    echo $message;
}
```

## Portée globale

Les variables déclarées en dehors des fonctions sont globales. **Attention** : elles ne sont pas automatiquement accessibles dans les fonctions.

```php
$nom = "Alice";

function afficherNom() {
    echo $nom; // Erreur : variable non définie
}
```

### Accéder aux variables globales

Pour utiliser une variable globale dans une fonction, utilisez le mot-clé `global`.

```php
$compteur = 0;

function incrementer() {
    global $compteur;
    $compteur++;
}

incrementer();
echo $compteur; // Affiche : 1
```

### Le tableau $GLOBALS

Alternative au mot-clé `global` :

```php
$x = 10;

function afficher() {
    echo $GLOBALS['x'];
}
```

### Pourquoi éviter les variables globales

Les variables globales peuvent causer des problèmes de maintenance. Il est préférable de passer les valeurs en paramètres.

```php
// ❌ Moins bon
$total = 0;
function ajouter($valeur) {
    global $total;
    $total += $valeur;
}

// ✅ Meilleur
function ajouter($total, $valeur) {
    return $total + $valeur;
}
$total = ajouter(0, 10);
```

## Variables statiques

Une variable statique conserve sa valeur entre les appels de fonction.

```php
function compter() {
    static $nombre = 0;
    $nombre++;
    echo $nombre . "\n";
}

compter(); // Affiche : 1
compter(); // Affiche : 2
compter(); // Affiche : 3
```

### Comparaison locale vs statique

```php
// Variable locale : réinitialisée à chaque appel
function compterLocal() {
    $nombre = 0;
    $nombre++;
    echo $nombre; // Toujours 1
}

// Variable statique : conserve sa valeur
function compterStatique() {
    static $nombre = 0;
    $nombre++;
    echo $nombre; // 1, 2, 3...
}
```

### Usage pratique

Utile pour les compteurs, générateurs d'ID ou cache simple :

```php
function genererID() {
    static $id = 1000;
    return $id++;
}

echo genererID(); // 1000
echo genererID(); // 1001
echo genererID(); // 1002
```

## Variables superglobales

PHP fournit des variables spéciales accessibles partout sans déclaration : les **superglobales**.

```php
$_GET      // Paramètres d'URL
$_POST     // Données de formulaire
$_SESSION  // Données de session
$_COOKIE   // Cookies
$_FILES    // Fichiers uploadés
$_SERVER   // Infos serveur
$GLOBALS   // Variables globales
```

Ces variables sont accessibles directement dans les fonctions :

```php
function afficherMethode() {
    echo $_SERVER['REQUEST_METHOD'];
}

function getParametre($nom) {
    return $_GET[$nom] ?? "Non défini";
}
```

## Passage par référence

Par défaut, PHP passe les paramètres par valeur (copie). Avec `&`, on passe par référence (l'original est modifié).

```php
// Par valeur (défaut)
function doubler($n) {
    $n = $n * 2;
}
$x = 5;
doubler($x);
echo $x; // Affiche : 5 (inchangé)

// Par référence
function doublerRef(&$n) {
    $n = $n * 2;
}
$y = 5;
doublerRef($y);
echo $y; // Affiche : 10 (modifié)
```

Usage pratique :

```php
function echanger(&$a, &$b) {
    $temp = $a;
    $a = $b;
    $b = $temp;
}

$x = 10;
$y = 20;
echanger($x, $y);
echo "$x, $y"; // Affiche : 20, 10
```

## Portée dans les blocs

Contrairement à d'autres langages, PHP n'a pas de portée de bloc. Les variables dans `if`, `for`, `while` restent accessibles après.

```php
if (true) {
    $x = 10;
}
echo $x; // Fonctionne : affiche 10

for ($i = 0; $i < 3; $i++) {
    $valeur = $i;
}
echo $valeur; // Fonctionne : affiche 2
```

## Bonnes pratiques

### 1. Privilégier les paramètres

```php
// ✅ Bon
function calculer($a, $b) {
    return $a + $b;
}
$resultat = calculer(10, 20);
```

### 2. Éviter les variables globales

Préférez passer des paramètres ou utiliser des classes.

```php
// Au lieu de variables globales
class Config {
    private $options = [];
    
    public function get($key) {
        return $this->options[$key] ?? null;
    }
}
```

### 3. Utiliser static avec parcimonie

Les variables statiques sont utiles pour des cas spécifiques (compteurs, cache), mais peuvent compliquer les tests.

### 4. Documenter les références

Indiquez clairement quand une fonction modifie ses paramètres.

```php
/**
 * Trie le tableau (modifié par référence)
 */
function trierTableau(&$tableau) {
    sort($tableau);
}
```

## Résumé

| Type | Accessible | Mot-clé | Durée de vie |
|------|-----------|---------|--------------|
| Locale | Dans la fonction | - | Durée de l'appel |
| Globale | Partout sauf fonctions | `global` | Durée du script |
| Statique | Dans la fonction | `static` | Durée du script |
| Superglobale | Partout | - | Durée du script |

**Points clés :**
- Les variables de fonction sont locales par défaut
- Utilisez `global` pour accéder aux variables globales (mais évitez-le)
- Les variables `static` gardent leur valeur entre les appels
- Les superglobales sont accessibles partout
- Préférez passer des paramètres plutôt qu'utiliser `global`
- Le passage par référence (`&`) modifie l'original
