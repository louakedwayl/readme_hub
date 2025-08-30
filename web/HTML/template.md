# 📝 L’élément HTML `<template>` et son utilisation en JavaScript

L’élément `<template>` permet de **stocker du HTML inactif** dans le DOM, qui peut être **réutilisé dynamiquement** via JavaScript.  

---

## 1️⃣ Définition

- `<template>` est une balise spéciale HTML.  
- Son contenu **n’est pas affiché** dans la page tant qu’il n’a pas été cloné et inséré.  
- Utile pour créer des fragments HTML réutilisables, des cartes, des listes, etc.

### Exemple simple
```html
<template id="myTemplate">
  <p>Bonjour, je suis un template !</p>
</template>
```

Le paragraphe <p> n’apparaît pas dans la page tant que vous ne l’avez pas ajouté avec JavaScript.

## 2️⃣ Accéder au contenu avec JavaScript

Chaque template possède une propriété content, qui est un DocumentFragment contenant son contenu.

Il faut cloner ce contenu avant de l’insérer dans le DOM.

### Exemple d’insertion
```html
<template id="myTemplate">
  <div class="card">
    <h3>Nom</h3>
    <p>Description</p>
  </div>
</template>

<div id="container"></div>

<script>
  // 1️⃣ Sélectionner le template
  const template = document.getElementById("myTemplate");

  // 2️⃣ Cloner son contenu
  const clone = template.content.cloneNode(true);

  // 3️⃣ Insérer le clone dans le DOM
  const container = document.getElementById("container");
  container.appendChild(clone);
</script>
```

Après exécution, le <div class="card"> sera visible dans la page.

## 3️⃣ Avantages du `<template>`

Réutilisable : le même template peut être cloné plusieurs fois.

Hors DOM initial : le contenu n’interfère pas avec le rendu initial.

Dynamique : parfait pour générer des listes, des cartes ou des composants via JavaScript.

Sécurisé : le contenu est inactif tant qu’il n’est pas inséré dans le DOM.

## 4️⃣ Exemple avancé : génération d’une liste

```html
<template id="itemTemplate">
  <li class="item"></li>
</template>

<ul id="list"></ul>

<script>
const items = ["Pomme", "Banane", "Cerise"];
const template = document.getElementById("itemTemplate");
const list = document.getElementById("list");

items.forEach(name => {
  const clone = template.content.cloneNode(true);
  clone.querySelector(".item").textContent = name;
  list.appendChild(clone);
});
</script>
```

### Résultat :

Une liste `<ul>` contenant les trois éléments : Pomme, Banane, Cerise.

### Conclusion

L’élément <template> est un outil puissant pour gérer du HTML réutilisable.

Son contenu est inactif jusqu’à ce qu’il soit cloné et ajouté au DOM.

Idéal pour dynamiser des pages web avec JavaScript tout en gardant le HTML initial propre.
