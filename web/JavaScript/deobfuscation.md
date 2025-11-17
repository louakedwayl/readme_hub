# Déobfuscation JavaScript

*Comprendre, analyser et récupérer du code masqué*

------------------------------------------------------------------------

## 1. Qu'est‑ce que la déobfuscation ?

La **déobfuscation** consiste à prendre du code JavaScript
volontairement rendu illisible et à le transformer pour retrouver une
version plus claire, plus lisible et compréhensible.

Elle permet de :\
- analyser du code potentiellement malveillant\
- comprendre un script obscurci pour résoudre un challenge\
- auditer un logiciel ou une page web\
- apprendre comment fonctionne l'obfuscation

------------------------------------------------------------------------

## 2. Pourquoi déobfusquer du JavaScript ?

-   **Sécurité / Malware** : analyser un script suspect dans une page
    web\
-   **Pentest / CTF** : comprendre la logique d'un challenge\
-   **Reverse engineering** : comprendre un fonctionnement caché\
-   **Audit de code** : vérifier qu'un script minimisé ne contient pas
    de backdoor

------------------------------------------------------------------------

## 3. Techniques simples de déobfuscation

### 3.1 Beautifier le code

C'est la première étape.\
Rendre le code lisible : indentation, retours à la ligne, espaces.

Outils (en ligne) :\
- jsbeautifier.org\
- prettier

Exemple :

Avant :

``` js
function a(b){return b*2}
```

Après :

``` js
function a(b) {
    return b * 2;
}
```

------------------------------------------------------------------------

### 3.2 Renommer les variables

Les obfuscateurs remplacent souvent les noms par des lettres : a, b, c,
\_0x12a33...

Tu peux renommer manuellement :\
- `a` → `counter`\
- `b` → `username`\
- `_0x12f2d3` → `lookupTable`

------------------------------------------------------------------------

### 3.3 Évaluer les chaînes encodées

Les obfuscations populaires utilisent des tableaux de chaînes chiffrées
:

``` js
var _0xabc = ["hello", "world"];
alert(_0xabc[0]);
```

Tu peux :\
✔ exécuter le script dans un environnement isolé (console, sandbox)\
✔ afficher les valeurs décodées\
✔ reconstruire une table claire

------------------------------------------------------------------------

### 3.4 Déplier les fonctions anonymes

Beaucoup de scripts utilisent :

``` js
(function(){ ... })();
```

Tu peux l'étaler, comprendre chaque étape et renommer.

------------------------------------------------------------------------

## 4. Méthodes avancées

### 4.1 Suivi d'exécution (Debugging)

Utilise les DevTools :\
- **Sources** → breakpoints\
- inspecter les variables\
- suivre les appels de fonctions

C'est souvent la méthode la plus efficace.

------------------------------------------------------------------------

### 4.2 Déobfuscation automatique

Outils utiles :\
- **https://www.dcode.fr/desobfuscateur-javascript** tester sur root me c est pas mal

------------------------------------------------------------------------

### 4.3 Manipuler l'AST (Abstract Syntax Tree)

Pour les cas difficiles :\
- parser le code\
- modifier les nœuds\
- reconstruire le script "propre"

Librairies :\
- esprima\
- babel parser

------------------------------------------------------------------------

## 5. Astuces pratiques

### ✔ Log partout

Mettre des console.log à des endroits clés permet de voir ce qui se
passe.

### ✔ Désactiver les anti-debug

Certains scripts bloquent DevTools :\
tu peux supprimer ou neutraliser ces lignes.

### ✔ Reconstruire le flux logique

Même si le code est illisible, la logique reste la même :\
- détection de variables\
- appels de fonctions\
- branching (if / switch)

------------------------------------------------------------------------

## 6. Exercice simple de déobfuscation

Code :

``` js
var _0x12 = ["pass", "word"];
(function(x,y){
    console.log(x + y);
})(_0x12[0], _0x12[1]);
```

Déobfuscation :

1.  Beautify\
2.  Remplacer `_0x12[0]` → `"pass"`\
3.  Remplacer `_0x12[1]` → `"word"`\
4.  Le code devient :

``` js
console.log("password");
```

------------------------------------------------------------------------

## 7. Conclusion

La déobfuscation JavaScript est un mélange de :\
- logique\
- debugging\
- expérience\
- outils adaptés

Avec ces techniques, tu peux comprendre n'importe quel code obscurci,
même très complexe.

------------------------------------------------------------------------

Si tu veux un **exo**, un **TP**, ou un **fichier dédié aux outils
avancés**, je peux en générer un deuxième !
