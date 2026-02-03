# L'opérateur Elvis en PHP

## Introduction

L'opérateur Elvis (`?:`) est un raccourci syntaxique introduit en PHP 5.3. Son nom vient de sa ressemblance avec une émoticône représentant la coiffure d'Elvis Presley vue de côté.

## Syntaxe

```php
$resultat = $valeur ?: $valeurParDefaut;
```

Cette écriture est équivalente à :

```php
$resultat = $valeur ? $valeur : $valeurParDefaut;
```

## Fonctionnement

L'opérateur Elvis évalue l'expression de gauche. Si elle est considérée comme "vraie" (truthy), elle est retournée. Sinon, c'est l'expression de droite qui est retournée.

## Exemple simple

```php
$nom = "";
$affichage = $nom ?: "Anonyme";
// $affichage vaut "Anonyme"

$nom = "Wayl";
$affichage = $nom ?: "Anonyme";
// $affichage vaut "Wayl"
```

## Valeurs considérées comme "fausses"

En PHP, les valeurs suivantes sont évaluées comme `false` : chaîne vide, `0`, `null`, `false`, tableau vide.

## À ne pas confondre

L'opérateur Elvis (`?:`) est différent de l'opérateur null coalescent (`??`) introduit en PHP 7, qui ne vérifie que si la valeur est `null` ou non définie.

## Cas d'usage typiques

L'opérateur Elvis est particulièrement utile pour définir des valeurs par défaut de manière concise, notamment lors du traitement de formulaires ou de paramètres optionnels.

## Conclusion

L'opérateur Elvis est un outil simple et élégant pour gérer les valeurs par défaut en PHP, rendant le code plus lisible et concis.
