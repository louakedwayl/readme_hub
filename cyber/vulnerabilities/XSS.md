# 🛡️ Les failles XSS (Cross‑Site Scripting)

## 📘 Introduction

Les failles **XSS** (Cross‑Site Scripting) font partie des
vulnérabilités web les plus courantes et les plus dangereuses.\
Elles permettent à un attaquant d'injecter du code malveillant ---
généralement du JavaScript --- dans une page web consultée par d'autres
utilisateurs.

L'OWASP classe la XSS dans son **Top 10** des failles de sécurité
applicatives.

------------------------------------------------------------------------

## 🔎 1. Qu'est‑ce qu'une faille XSS ?

Une faille XSS se produit lorsque :

1.  L'application **accepte des données fournies par un utilisateur**
    (formulaire, paramètre d'URL, base de données...)
2.  L'application **réinjecte ces données dans une page web**
3.  Sans les **échapper** ni **sanitiser**
4.  Et le **navigateur les interprète comme du code** (souvent
    JavaScript)

**➡ Cela permet à un attaquant de faire exécuter un script dans le
navigateur d'une victime.**

------------------------------------------------------------------------

## 🧭 2. Les trois types de XSS

### 2.1. XSS réfléchie (Reflected)

La XSS réfléchie se produit lorsque les données utilisateur sont
renvoyées immédiatement dans la page sans être stockées.

Exemples typiques : - formulaires\
- paramètres d'URL\
- moteurs de recherche internes

🎯 **Impact** :\
L'attaque touche principalement les utilisateurs qui cliquent sur un
lien manipulé.

------------------------------------------------------------------------

### 2.2. XSS stockée (Stored)

La XSS stockée est la plus dangereuse.\
Le code malveillant est **enregistré dans une base de données**
(commentaires, profils, forums, etc.) et est exécuté par **tous les
visiteurs** de la page.

🎯 **Impact** :\
Peut toucher des milliers d'utilisateurs si la page est très visitée.

------------------------------------------------------------------------

### 2.3. XSS DOM (DOM-based)

Ici, la vulnérabilité vient du **JavaScript exécuté côté navigateur**,
qui manipule le DOM de manière non sécurisée.

Exemples : - `innerHTML` utilisé avec des données non filtrées\
- paramètres d'URL utilisés pour modifier la page

🎯 **Impact** :\
La faille est entièrement **côté client**.

------------------------------------------------------------------------

## 🎯 3. Pourquoi la XSS est dangereuse ?

Une XSS peut permettre à un attaquant de :

-   usurper une session en volant les cookies\
-   rediriger l'utilisateur vers un faux site\
-   modifier l'affichage de la page\
-   injecter de faux formulaires pour voler des informations\
-   exécuter des actions en utilisant la session de la victime\
-   propager des vers (worms) dans les réseaux sociaux

------------------------------------------------------------------------

## 🛠️ 4. Comment prévenir les failles XSS ?

### ✔️ Échapper les sorties (Output Escaping)

La règle numéro 1 : **tout contenu affiché qui provient de l'utilisateur
doit être échappé**.

------------------------------------------------------------------------

### ✔️ Utiliser des fonctions sécurisées côté serveur

Exemples : - PHP : `htmlspecialchars()`\
- Python/Jinja : échappement automatique\
- Moteurs de templates : encodage automatique

------------------------------------------------------------------------

### ✔️ Utiliser des templates modernes

Les moteurs de templates échappent automatiquement les variables.

------------------------------------------------------------------------

### ✔️ Interdire le HTML utilisateur si possible

Si le site n'a pas besoin d'accepter du HTML :\
➡ **n'acceptez que du texte brut.**

------------------------------------------------------------------------

### ✔️ Filtrer le HTML si nécessaire

Si vous devez accepter du HTML, utiliser une bibliothèque de
sanitisation.

------------------------------------------------------------------------

### ✔️ Éviter `innerHTML` côté client

Utiliser plutôt `textContent` ou des frameworks modernes.

------------------------------------------------------------------------

## 🔬 5. Comment détecter une XSS ?

-   tester les entrées\
-   observer le rendu\
-   analyser le DOM\
-   utiliser des outils comme Burp Suite ou OWASP ZAP

------------------------------------------------------------------------

## 📝 6. Résumé rapide

-   ✓ XSS = injection de code **côté navigateur**\
-   ✓ Trois types : **réfléchie**, **stockée**, **DOM**\
-   ✓ Danger : code exécuté chez les visiteurs\
-   ✓ Protection : échappement, sanitisation, CSP
