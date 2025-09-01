# Installation de TypeScript (version simple)

## 1. Pourquoi installer TypeScript ?

TypeScript est un langage que **le navigateur et Node.js ne comprennent
pas directement**.\
Il faut donc un outil pour **transformer ton code TypeScript (`.ts`) en
JavaScript (`.js`)**.

Cet outil s'appelle **`tsc`** (TypeScript Compiler).

------------------------------------------------------------------------

## 2. Installation globale

``` bash
npm install -g typescript
```

-   Permet d'utiliser `tsc` **n'importe où** sur ton ordinateur.\
-   Pratique pour tester rapidement des fichiers `.ts`.\
-   **Limitation** : tous les projets utilisent la même version de
    TypeScript.

Vérifier l'installation :

``` bash
tsc -v
```

------------------------------------------------------------------------

## 3. Initialiser un projet

Avant d'installer TypeScript dans un projet, il faut créer un projet
Node.js :

``` bash
npm init -y
```

-   Cela crée un fichier **`package.json`**\
-   Ce fichier contient la configuration et les dépendances du projet

------------------------------------------------------------------------

## 4. Installation locale dans le projet

``` bash
npm install --save-dev typescript
```

-   Ajoute TypeScript **uniquement pour ce projet**\
-   Permet de **fixer une version spécifique** de TypeScript\
-   Utile quand plusieurs personnes travaillent sur le même projet

Compiler avec la version locale :

``` bash
npx tsc
```

------------------------------------------------------------------------

## 5. Résumé

  ------------------------------------------------------------------------
  Installation                     Où ?                 Pourquoi ?
  -------------------------------- -------------------- ------------------
  Globale                          Sur ton PC           Tester vite et
                                                        utiliser `tsc`
                                                        partout

  Locale                           Dans le projet       Garantir la
                                                        version exacte de
                                                        TypeScript pour le
                                                        projet
  ------------------------------------------------------------------------
