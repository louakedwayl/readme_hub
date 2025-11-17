# Cours : L'Obfuscation en JavaScript

## Introduction

L'obfuscation consiste à rendre du code volontairement difficile à lire
sans modifier son fonctionnement. Elle sert à protéger le code contre la
lecture directe, le reverse engineering ou pour créer des challenges.

## Pourquoi obfusquer du JavaScript ?

-   Le JavaScript est entièrement visible côté client.
-   Empêche la copie facile du code.
-   Ralentit l'analyse par des personnes malveillantes.
-   Très utilisé dans les CTF, malware, programmes sensibles.

## Techniques principales

### Minification

Suppression des espaces, commentaires, retours à la ligne.

### Renommage de variables

Transforme :

``` js
var password = "admin";
```

en

``` js
var _0x3a4f = "admin";
```

### Encodage de chaînes

Base64, hexadécimal, octal, ou génération dynamique.

### Obfuscation du flux de contrôle

Ajout de switch, conditions inutiles, chemins morts.

### Tableaux dynamiques

Les chaînes sont cachées dans des tableaux indexés.

### Obfuscation extrême : JSFuck

N'utilise que : `[]()!+`\
Exemple :

``` js
alert("Hello");
```

devient du JSFuck très long générant la même action.

## Outils d'obfuscation

-   javascript-obfuscator
-   UglifyJS
-   Obfuscator.io
-   JSFuck

## Limites

-   Le code reste lisible par un attaquant motivé.
-   Plus lent et difficile à maintenir.
-   Pas une protection absolue.

## Conclusion

L'obfuscation est utile pour protéger du code JavaScript, cacher des
chaînes ou créer des challenges de sécurité, mais ne remplace jamais une
vraie sécurité.
