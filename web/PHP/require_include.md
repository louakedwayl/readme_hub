# 📘 `include`, `require`, `include_once`, `require_once`

## 🧩 Introduction

En PHP, les mots-clés **include** et **require** permettent d'ajouter le
contenu d'un fichier dans un autre fichier *au moment de l'exécution*.\
C'est indispensable pour organiser ton code : séparer l'HTML, la
configuration, les fonctions, etc.

Les versions \*\*\_once\*\* servent à éviter d'inclure plusieurs fois le
même fichier.

# 1. `include`

### ✔️ Définition

`include` insère un fichier **même si ce fichier n'existe pas**, PHP
continue l'exécution en émettant seulement **un warning**.

### ✔️ Exemple

``` php
include "header.php";
echo "Page chargée";
```

### ✔️ Comportement si erreur

-   ⚠️ Fichier manquant → **Warning**, mais PHP continue quand même.

# 2. `require`

### ✔️ Définition

`require` fait la même chose que `include`, mais il est **strict**.

### ✔️ Exemple

``` php
require "config.php";
echo "Suite du code";
```

### ❌ Si le fichier est introuvable :

-   PHP produit une **fatal error**
-   Le script **s'arrête immédiatement**

### ✔️ Quand utiliser `require` ?

Quand le fichier est **indispensable au fonctionnement** :\
- config\
- connexion BDD\
- autoload\
- fonctions essentielles

# 3. `include_once`

### ✔️ Définition

`include_once` fonctionne comme `include`, mais **il n'inclura le
fichier qu'une seule fois**.

### ✔️ Exemple

``` php
include_once "utils.php";
include_once "utils.php"; // Ignoré la 2e fois
```

### ✔️ À quoi ça sert ?

Éviter les erreurs comme : - fonction redéfinie\
- classe redéfinie\
- constantes dupliquées

# 4. `require_once`

### ✔️ Définition

C'est la version stricte de `include_once`.

``` php
require_once "config.php";
require_once "config.php"; // Ignoré la 2e fois
```

### ✔️ Avantages

-   Le fichier est chargé **une seule fois**
-   **Fatal error** si le fichier est introuvable\
-   Idéal pour les fichiers essentiels (config, autoload, classes...)

# 5. Résumé comparatif

| Fonction        | Fichier introuvable | Double inclusion | Usage principal                       |
|-----------------|----------------------|------------------|----------------------------------------|
| `include`       | Warning              | Oui              | Fichiers optionnels                    |
| `require`       | Fatal error          | Oui              | Fichiers indispensables                |
| `include_once`  | Warning              | ❌ Empêché       | Fichiers optionnels mais uniques       |
| `require_once`  | Fatal error          | ❌ Empêché       | Fichiers essentiels et uniques         |

# 6. Bonnes pratiques

### 🟦 1. Utilise **require_once** pour tout fichier essentiel

Exemples : - config\
- functions.php\
- autoload.php

### 🟩 2. Utilise **include** pour les fichiers non essentiels

Exemples : - templates optionnels\
- parties d'une page HTML

### 🟨 3. Évite les include imbriqués dans des boucles

Ça peut ralentir le script et créer des doublons.

### 🟥 4. Ne confonds pas les chemins

Toujours vérifier ton **path** : - relatif\
- absolu\
- `__DIR__` (très pratique)

``` php
require_once __DIR__ . "/config.php";
```

# 7. Exemples pratiques

### ✔️ Structure de site

    index.php
    header.php
    footer.php
    config.php

**index.php**

``` php
require_once "config.php";
include "header.php";

echo "<h1>Bienvenue</h1>";

include "footer.php";
```
