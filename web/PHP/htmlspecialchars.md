# 🛡️ `htmlspecialchars` en PHP

## 📘 Introduction

Lorsque vous développez une application web, l'une des règles
essentielles est : \> **ne jamais afficher directement des données
provenant d'un utilisateur.**

La fonction PHP `htmlspecialchars` est un outil clé pour éviter les
failles XSS et sécuriser l'affichage.

------------------------------------------------------------------------

## 🔎 1. Qu'est‑ce que `htmlspecialchars` ?

`htmlspecialchars` convertit certains caractères spéciaux en entités
HTML pour empêcher leur interprétation comme du code.\
Elle protège donc contre les injections HTML/JS.

------------------------------------------------------------------------

## 🔥 2. Pourquoi utiliser `htmlspecialchars` ?

Les navigateurs interprètent des caractères comme `<`, `>` ou `"` comme
du HTML.\
Sans protection, cela peut permettre à un utilisateur d'injecter du
code.

------------------------------------------------------------------------

## 🧪 3. Fonctionnement de la fonction

### Syntaxe

    htmlspecialchars(string $string, int $flags = ENT_COMPAT, ?string $encoding = null, bool $double_encode = true): string

------------------------------------------------------------------------

## 📌 4. Les paramètres

### ✔️ `$string`

Le texte à sécuriser.

### ✔️ `$flags`

Les options les plus importantes : - `ENT_QUOTES` -- Convertit ' et " -
`ENT_COMPAT` -- Convertit seulement " - `ENT_HTML5` -- Mode HTML5

### ✔️ `$encoding`

Toujours utiliser **UTF‑8**.

### ✔️ `$double_encode`

Empêche la double conversion si mis à `false`.

------------------------------------------------------------------------

## 🛠️ 5. Exemples

### Affichage sécurisé

    echo htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

### Sécurisation d'un attribut HTML

    <input value="<?= htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?>">

------------------------------------------------------------------------

## 🧨 6. Limitations

`htmlspecialchars` ne protège pas contre : - les injections SQL - les
CSRF - les attaques serveur

------------------------------------------------------------------------

## 🧩 7. `htmlspecialchars` vs `htmlentities`

-   `htmlspecialchars` : conversion minimale (sécurité)
-   `htmlentities` : conversion complète des caractères HTML

------------------------------------------------------------------------

## 🔐 8. Bonnes pratiques

-   Toujours utiliser `ENT_QUOTES`
-   Toujours utiliser UTF‑8
-   L'utiliser **à l'affichage**, jamais à l'enregistrement
-   Coupler avec une sanitisation si HTML autorisé

------------------------------------------------------------------------

## 📝 9. Résumé

`htmlspecialchars` protège l'affichage HTML contre les injections de
code.\
Utilisation recommandée :

    htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
