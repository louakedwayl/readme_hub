# Introduction à React

## C'est quoi React ?

**React** est une bibliothèque JavaScript créée par Facebook pour construire des interfaces utilisateur (sites web, apps).

Principe : découper l'UI en **composants** réutilisables, et mettre à jour l'affichage automatiquement quand les données changent.

---

## JSX

JSX = syntaxe qui permet d'écrire du HTML dans du JavaScript.

```jsx
function Hello() {
  return <h1>Salut !</h1>
}
```

Le navigateur ne comprend pas JSX → Vite le transforme en JS classique avant exécution.

---

## Les composants

Un composant = une fonction qui retourne du JSX.

```jsx
function Button() {
  return <button>Clique</button>
}
```

Nom **toujours** avec une majuscule. On les réutilise comme des balises HTML :

```jsx
<Button />
<Button />
```

---

## Les props

Les props = données passées d'un parent à un enfant.

```jsx
function Hello({ name }) {
  return <h1>Salut {name}</h1>
}

<Hello name="Wayl" />
```

---

## Le state

Le state = données qui changent dans le temps. Quand le state change, React re-affiche automatiquement le composant.

```jsx
import { useState } from 'react'

function Counter() {
  const [count, setCount] = useState(0)

  return (
    <button onClick={() => setCount(count + 1)}>
      {count}
    </button>
  )
}
```

---

## Résumé

- **React** = bibliothèque pour construire des UI
- **JSX** = HTML dans du JS
- **Composant** = fonction qui retourne du JSX
- **Props** = données qui descendent du parent
- **State** = données qui changent → re-render automatique

C'est tout ce qu'il faut pour démarrer.
