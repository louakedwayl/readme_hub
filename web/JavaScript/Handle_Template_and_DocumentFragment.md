# Manipuler les Templates, DocumentFragment et Events en JavaScript

## 1. Les templates HTML

Un `<template>` est un **élément HTML spécial** dont le contenu n’est **pas affiché dans la page** au chargement. Il sert de **modèle réutilisable** pour créer dynamiquement des éléments dans le DOM.

### Exemple :

```html
<template id="todolist-layout">
  <div class="todo-item">
    <button class="btn">Supprimer</button>
    <span>Tâche</span>
  </div>
</template>
```
```js
tpl = document.getElementById("todolist-layout") // récupère l’élément <template> dans le DOM.
```

```js
const tpl = document.getElementById("todolist-layout");
console.log(tpl); // <template id="todolist-layout">...</template>
```

## 2. DocumentFragment

Le contenu d’un `<template>` est un DocumentFragment :

C’est un conteneur léger, hors du DOM, où on peut préparer des éléments avant de les insérer.

Les événements ne peuvent pas être écoutés directement sur un DocumentFragment, car il n’est pas dans le DOM.

## Exemple :

```js
const frag = tpl.content; // DocumentFragment
frag.addEventListener("click", () => console.log("clic")); 
// ne fonctionnera pas
```
Pour que les événements fonctionnent, il faut ajouter le fragment au DOM :

```js
const clone = tpl.content.cloneNode(true);
document.body.appendChild(clone);
```

## 3. Event Delegation

Comme on ne peut pas écouter d’événements sur un DocumentFragment, on utilise souvent l’event delegation :

- On écoute sur un élément parent existant dans le DOM.

- On utilise event.target pour savoir quel enfant a déclenché l’événement.

- .matches(selector) permet de vérifier si l’élément correspond à un sélecteur CSS.

## Exemple :

```js
document.body.addEventListener("click", (e) => {
  if (e.target.matches(".btn")) {
    console.log("Bouton cliqué :", e.target.textContent);
  }
});
```

## Explications :

- e.target → l’élément exact cliqué (ex. le bouton).

- e.target.matches(".btn") → vérifie si cet élément a la classe btn.

- Même si le bouton vient d’un template ajouté après le chargement, ça fonctionne.

Astuce : si le bouton contient un enfant (span, icône, etc.), e.target peut être cet enfant.
Dans ce cas, utilisez e.target.closest(".btn") pour remonter jusqu’au bouton parent.

```js
document.body.addEventListener("click", (e) => {
  const btn = e.target.closest(".btn");
  if (btn) {
    console.log("Bouton cliqué :", btn.textContent);
  }
});
```

## 4. Résumé

`<template>` : modèle HTML non affiché.

DocumentFragment : conteneur temporaire pour construire le DOM.

Event delegation : écouter les événements sur un parent, et déterminer quel enfant a été cliqué avec event.target ou event.target.closest().

.matches(selector) : vérifier si un élément correspond à un sélecteur CSS.

## 5. Exemple complet

```html
<template id="todolist-layout">
  <div class="todo-item">
    <button class="btn">Supprimer</button>
    <span>Tâche</span>
  </div>
</template>

<script>
const tpl = document.getElementById("todolist-layout");
const clone = tpl.content.cloneNode(true);
document.body.appendChild(clone);

document.body.addEventListener("click", (e) => {
  const btn = e.target.closest(".btn");
  if (btn) {
    const item = btn.parentElement;
    item.remove(); // supprime l'élément du DOM
    console.log("Tâche supprimée !");
  }
});
</script>
```

Avec ce code :

- Le template est cloné et ajouté au DOM.

- Le clic sur un bouton .btn supprime son élément parent.

- La solution fonctionne même si tu ajoutes plus d’éléments dynamiquement après coup.
