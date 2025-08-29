# Introduction aux types de collections en JavaScript (DOM)

En JavaScript, lorsqu'on interagit avec le **DOM** (Document Object
Model), on manipule souvent des **collections** d'éléments.\
Une collection est un objet semblable à un tableau : elle est indexée 
et possède une longueur, mais elle ne dispose pas de toutes les méthodes 
des vrais tableaux (Array).

------------------------------------------------------------------------

## 1. Qu'est-ce qu'une collection ?

Une collection est un **objet qui regroupe plusieurs nœuds ou éléments
du DOM**.\
Elle permet d'accéder aux éléments par **index** (`collection[0]`) et
possède une **longueur** (`collection.length`).

⚠️ Attention : contrairement aux tableaux (`Array`), les
collections n'ont pas toutes les méthodes comme `.map()`, `.filter()` ou
`.reduce()`.

------------------------------------------------------------------------

## 2. Les principaux types de collections

### 2.1 `HTMLCollection`

-   Contient uniquement des **éléments HTML** (balises).\
-   **Collection vivante** : elle se met à jour automatiquement si le
    DOM change.\
-   Exemples pour obtenir une `HTMLCollection` :

``` js
document.getElementsByTagName("div"); 
document.getElementsByClassName("item"); 
element.children;
```

------------------------------------------------------------------------

### 2.2 `NodeList`

-   Contient des **nœuds du DOM** (éléments, texte, commentaires,
    etc.).\
-   Peut être **statique** (ne change pas automatiquement si le DOM
    évolue) ou **vivante** (rare).\
-   Exemples :

``` js
document.querySelectorAll("p"); // NodeList statique
element.childNodes;             // NodeList vivante
```

------------------------------------------------------------------------

### 2.3 `DOMTokenList`

-   Collection spéciale représentant une liste de **tokens** (mots
    séparés par un espace).\
-   Principalement utilisée pour gérer les **classes CSS** d'un
    élément.\
-   Exemple :

``` js
let div = document.querySelector("div");
console.log(div.classList); // DOMTokenList
div.classList.add("active");
div.classList.remove("hidden");
```

------------------------------------------------------------------------

## 3. Différences avec les tableaux (`Array`)

-   Une collection **ressemble** à un tableau mais n'en est pas un.\
-   Exemple :

``` js
let lis = document.getElementsByTagName("li");

console.log(lis.length);   // OK
console.log(lis[0]);       // OK

lis.forEach(li => console.log(li)); // ❌ Erreur : pas une vraie méthode

// Solution : transformer en tableau
let arr = Array.from(lis);
arr.forEach(li => console.log(li)); // ✅ Fonctionne
```

------------------------------------------------------------------------

## 4. Tableau comparatif

  -----------------------------------------------------------------------------
  Type                 Contenu                Vivant ?          Méthodes dispo
  -------------------- ---------------------- ----------------- ---------------
  **HTMLCollection**   Éléments HTML          Oui               Limité (index +
                                                                length)

  **NodeList**         Nœuds (éléments,       Parfois (souvent  `.forEach()`
                       texte, etc.)           statique)         (si statique),
                                                                index, length

  **DOMTokenList**     Tokens (ex: classes    Oui               `.add()`,
                       CSS)                                     `.remove()`,
                                                                `.toggle()`,
                                                                `.contains()`
  -----------------------------------------------------------------------------

------------------------------------------------------------------------

## 5. Conclusion

Les **collections** en JavaScript sont des structures pratiques pour
parcourir et manipuler le DOM.\
- Utilise `HTMLCollection` pour des listes d'éléments HTML.\
- Utilise `NodeList` pour récupérer plusieurs nœuds via
`querySelectorAll`.\
- Utilise `DOMTokenList` pour gérer les classes CSS efficacement.

➡️ Si tu as besoin de méthodes avancées (comme `.map()`), convertis la
collection en **tableau** avec `Array.from()` ou `[...collection]`.
