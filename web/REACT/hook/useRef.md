# useRef — Référence persistante en React

## 1. Définition

`useRef` est un hook React qui permet de stocker une valeur persistante entre les rendus, sans déclencher de re-render.

## 2. Structure

`useRef` retourne un objet contenant une seule propriété :

```javascript
{ current: valeurInitiale }
```

- `.current` est la propriété qui contient la valeur stockée.

## 3. Accès et modification

```javascript
myRef.current        // lecture
myRef.current = val  // modification
```

Modifier `.current` ne déclenche pas de re-render.

## 4. À quoi ça sert ?

- Garder une valeur en mémoire sans impacter l'UI
- Stocker des données internes (timers, flags, identifiants)
- Accéder à des éléments du DOM
- Conserver une valeur entre les renders

## 5. Différence avec useState

| useState | useRef |
|----------|--------|
| Déclenche un re-render | Ne déclenche pas de re-render |
| Utilisé pour l'interface | Utilisé pour la logique interne |
| Valeur affichée dans le JSX | Valeur non affichée |

## 6. Fonctionnement interne

- L'objet retourné par `useRef` reste le même entre les renders
- Seule la propriété `.current` peut changer
- React ne surveille pas les modifications de `.current`

## 7. Exemple général

```javascript
import { useRef } from 'react'

function App() {
    const counter = useRef(0)
    
    function increment() {
        counter.current += 1
        console.log(counter.current)
    }
    
    return (
        <button onClick={increment}>
            Click
        </button>
    )
}
```

La valeur augmente à chaque clic — le composant ne se re-render pas.

## 8. Cas d'usage principaux

- Gestion de timers / intervalles
- Stockage de valeurs temporaires
- Gestion de flags (ex : détecter le premier rendu)
- Accès direct à un élément du DOM

## 9. Quand l'utiliser ?

- Quand une valeur doit persister sans provoquer de re-render
- Quand la valeur n'a pas besoin d'être affichée
- Pour éviter des re-renders inutiles

## 10. Quand ne PAS l'utiliser ?

- Pour afficher une valeur dans le JSX → utiliser `useState`
- Pour gérer un état visible à l'écran → utiliser `useState`
- Quand un re-render est nécessaire → utiliser `useState`

## 11. ⭐ L'attribut ref (très important)

`ref` est l'attribut React qui permet de connecter un `useRef` à un élément du DOM.

### Exemple :

```javascript
import { useRef } from 'react'

function App() {
    const myRef = useRef(null)
    return <div ref={myRef}>Hello</div>
}
```

### 🧠 Ce qui se passe

1. React crée un objet `{ current: null }`
2. Après le rendu, il met automatiquement : `myRef.current = <div>`

### ⚙️ Rôle de ref

| Élément | Rôle |
|---------|------|
| `useRef` | crée un objet persistant |
| `ref={...}` | connecte cet objet au DOM |
| `.current` | contient l'élément HTML réel |

### 🔥 Exemple concret

```javascript
function App() {
    const inputRef = useRef(null)
    
    function focusInput() {
        inputRef.current.focus()
    }
    
    return (
        <>
            <input ref={inputRef} />
            <button onClick={focusInput}>
                Focus
            </button>
        </>
    )
}
```

## Résumé

| Concept | Détail |
|---------|--------|
| `useRef` | Mémoire interne du composant |
| `.current` | Contient la valeur ou le DOM |
| `ref` | Lie React au DOM |
| Re-render | Aucun |
| Persistance | Survit entre les renders |
| Usage | Logique interne + DOM access |
