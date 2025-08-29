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

## ✋ Arrêter la propagation d’un événement : `stopPropagation`

Parfois, un événement déclenché sur un élément **remonte ou descend dans l’arbre DOM** et peut déclencher d’autres listeners.  
Pour **empêcher cette propagation**, on utilise la méthode **`event.stopPropagation()`**.

### Exemple : éviter que le clic sur un bouton déclenche le listener du parent

```html
<div id="parent" style="padding:20px; background:lightblue;">
  Parent
  <button id="child">Enfant</button>
</div>

<script>
  const parent = document.getElementById("parent");
  const child = document.getElementById("child");

  parent.addEventListener("click", () => {
    console.log("Clic sur le parent !");
  });

  child.addEventListener("click", (event) => {
    console.log("Clic sur l’enfant !");
    event.stopPropagation(); // Empêche le clic de remonter au parent
  });
</script>
```

### Résultat :

Cliquer sur le parent affiche "Clic sur le parent !".

Cliquer sur l’enfant affiche seulement "Clic sur l’enfant !".

Grâce à stopPropagation, le listener du parent n’est pas déclenché.

### Notes importantes

stopPropagation() n’empêche pas l’exécution du listener courant, seulement la propagation aux autres éléments.

Pour empêcher aussi l’action par défaut du navigateur (ex : suivre un lien, soumettre un formulaire), utiliser event.preventDefault().

---

## 🚫 Empêcher le comportement par défaut : `preventDefault()`

Certains éléments HTML ont un **comportement par défaut** lorsqu’un événement survient.  

### Exemples :  

- Cliquer sur un lien `<a>` ouvre la page cible  
- Soumettre un formulaire recharge la page  

Pour **empêcher ce comportement**, on utilise **`event.preventDefault()`**.

### Exemple : bloquer l’ouverture d’un lien

```html
<a href="https://example.com" id="link">Clique-moi</a>

<script>
  const link = document.getElementById("link");

  link.addEventListener("click", (event) => {
    event.preventDefault(); // Empêche l'ouverture de la page
    console.log("Lien cliqué, mais page non chargée !");
  });
</script>
```

### Résultat :

Cliquer sur le lien n’ouvre pas example.com.

Le message "Lien cliqué, mais page non chargée !" est affiché dans la console.

###  Notes importantes

preventDefault() n’arrête pas la propagation de l’événement.

## Pour empêcher à la fois la propagation et le comportement par défaut, on peut combiner avec stopPropagation() :

```js
element.addEventListener("click", (event) => {
  event.preventDefault();
  event.stopPropagation();
});
```

---