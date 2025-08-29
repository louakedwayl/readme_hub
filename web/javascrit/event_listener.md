# 🎯 Les Event Listeners en JavaScript

## 📌 Introduction

En JavaScript, un **Event Listener** (écouteur d'événement) permet
d'exécuter une fonction lorsqu'un événement spécifique se produit sur un
élément du DOM (Document Object Model).\
Exemples d'événements courants :\
- Clic sur un bouton (`click`)\
- Mouvement de souris (`mousemove`)\
- Appui sur une touche (`keydown`)\
- Chargement d'une page (`load`)

------------------------------------------------------------------------

## 🛠️ Méthode principale : `addEventListener`

La méthode la plus utilisée est :

``` js
element.addEventListener(type, callback, options);
```

### Paramètres

-   **type** → le nom de l'événement (ex: `"click"`, `"keydown"`)\
-   **callback** → la fonction à exécuter quand l'événement survient\
-   **options** *(facultatif)* → objet ou booléen qui permet de définir
    certains comportements :
    -   `capture` (true/false) : indique si l'événement doit être
        capturé pendant la phase de capture ou la phase de
        bouillonnement\
    -   `once` (true/false) : l'écouteur s'exécute une seule fois puis
        est supprimé automatiquement\
    -   `passive` (true/false) : indique que la fonction n'appellera pas
        `preventDefault()` (utile pour les optimisations de performance)

------------------------------------------------------------------------

## 🧑‍💻 Exemple simple

``` html
<button id="btn">Clique-moi</button>

<script>
  const button = document.getElementById("btn");

  button.addEventListener("click", () => {
    alert("Bouton cliqué !");
  });
</script>
```

------------------------------------------------------------------------

## 🔄 Supprimer un Event Listener

On utilise **removeEventListener** avec les mêmes paramètres que lors de
l'ajout.

``` js
function handleClick() {
  console.log("Bouton cliqué !");
}

button.addEventListener("click", handleClick);
button.removeEventListener("click", handleClick);
```

⚠️ Attention : impossible de retirer un listener si on utilise une
**fonction anonyme**.

------------------------------------------------------------------------

## 🌊 Phases d'un événement

Un événement traverse 3 phases :

1.  **Capture** → l'événement descend du `document` jusqu'à l'élément
    cible\
2.  **Target** → l'événement est sur l'élément cible\
3.  **Bouillonnement (bubbling)** → l'événement remonte de l'élément
    cible jusqu'au `document`

Par défaut, `addEventListener` agit lors de la phase de bouillonnement.\
On peut activer la capture en passant `true` (ou `{ capture: true }`).

``` js
document.getElementById("btn").addEventListener("click", () => {
  console.log("Capture !");
}, true);
```

------------------------------------------------------------------------

## ⌨️ Exemple avec `keydown`

``` js
document.addEventListener("keydown", (event) => {
  console.log("Touche pressée :", event.key);
  
  if (event.key === "Enter") {
    console.log("Tu as appuyé sur Entrée !");
  }
});
```

------------------------------------------------------------------------

## 📋 Les objets d'événement

Quand un événement se déclenche, la fonction callback reçoit un objet
**Event** contenant plusieurs informations utiles :

``` js
element.addEventListener("click", (event) => {
  console.log(event.type); // "click"
  console.log(event.target); // élément qui a déclenché l’événement
  console.log(event.currentTarget); // élément sur lequel le listener est attaché
});
```

------------------------------------------------------------------------

## 🧩 Exemple complet

``` html
<input id="text" placeholder="Tape quelque chose...">
<button id="btn">Valider</button>

<script>
  const input = document.getElementById("text");
  const button = document.getElementById("btn");

  button.addEventListener("click", () => {
    console.log("Texte saisi :", input.value);
  });

  input.addEventListener("keydown", (event) => {
    if (event.key === "Enter") {
      console.log("Validation avec Entrée :", input.value);
    }
  });
</script>
```

------------------------------------------------------------------------

## ✅ Bonnes pratiques

-   Toujours nommer les fonctions de callback si elles sont réutilisées
    (plus facile à retirer).\
-   Utiliser `{ once: true }` si l'événement ne doit se produire qu'une
    seule fois.\
-   Bien comprendre la différence entre `event.target` et
    `event.currentTarget`.\
-   Éviter de mettre trop de listeners sur de nombreux éléments →
    préférer la **délégation d'événements** (placer un seul listener sur
    un parent).

------------------------------------------------------------------------
