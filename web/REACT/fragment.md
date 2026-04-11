# 📦 Les Fragments en JSX (React)

## 🔹 Définition

Un **Fragment** permet de **regrouper plusieurs éléments JSX** sans ajouter de balise HTML inutile dans le DOM.

---

## 🔹 Pourquoi utiliser un Fragment ?

En JSX, un composant doit retourner **un seul élément parent**.

❌ Ceci ne marche pas :
```jsx
return (
  <h1>Title</h1>
  <p>Text</p>
);
```
👉 Il y a plusieurs éléments au même niveau.

---

## 🔹 Solution : utiliser un Fragment

return (
  <>
    <h1>Title</h1>
    <p>Text</p>
  </>
);

👉 Ici, `<> </>` est un **Fragment**

---

## 🔹 Alternative (version longue)

import React from "react";

return (
  <React.Fragment>
    <h1>Title</h1>
    <p>Text</p>
  </React.Fragment>
);

---

## 🔹 Avantages

- ✅ Pas de balise HTML inutile (`div`, etc.)
- ✅ DOM plus propre
- ✅ Code plus lisible

---

## 🔥 Résumé

- Fragment = conteneur invisible
- Permet de regrouper plusieurs éléments
- Évite d’ajouter un `div` inutile
