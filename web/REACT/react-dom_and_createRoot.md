# `react-dom` et `createRoot`

## Pourquoi deux packages : `react` et `react-dom`

React peut être utilisé sur plusieurs types d’applications (web, mobile, etc.).

- **`react`** = le moteur. Composants, hooks, JSX, état, virtual DOM. Ne sait rien du navigateur.
- **`react-dom`** = le pont entre React et le **navigateur** (le vrai DOM).

Cette séparation existe parce que React peut cibler d'autres environnements :
- `react-native` → applications mobiles natives
- `react-three-fiber` → 3D / Canvas
- `ink` → terminal CLI

Le moteur (`react`) reste le même. Seul le "renderer" change.

---

## Le rôle de `react-dom`

Prendre les composants React (qui ne sont que des objets JS décrivant une UI) et les **transformer en vrais nœuds HTML** dans la page.

Sans `react-dom`, tes composants n'apparaîtraient nulle part.

---

## `createRoot` : le point d'entrée

C'est **la première chose** qu'une app React exécute. Elle dit à React :

> "Voici l'élément HTML dans lequel tu vas dessiner toute mon application."

### Code typique (`main.jsx` ou `index.js`)

```jsx
import { createRoot } from 'react-dom/client'
import App from './App'

const container = document.getElementById('root')
const root = createRoot(container)
root.render(<App />)
```

```html
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>react-formation</title>
  </head>
  <body>
    <div id="root"></div>
    <script type="module" src="/src/main.jsx"></script>
  </body>
</html>

```

### Décomposition

1. **`document.getElementById('root')`**
   Récupère le `<div id="root"></div>` qui se trouve dans ton `index.html`. C'est le conteneur vide où React va injecter ton UI.

2. **`createRoot(container)`**
   Crée une "racine React" attachée à ce conteneur. Cette racine est l'objet qui gère tout le cycle de rendu.

3. **`root.render(<App />)`**
   Demande à React de rendre le composant `<App />` dans cette racine. À partir de là, React prend le contrôle du contenu de `#root`.

---

## Le `index.html` côté Vite/CRA

```html
<body>
  <div id="root"></div>
  <script type="module" src="/src/main.jsx"></script>
</body>
```

Toute ton app React vit à l'intérieur de ce **seul** `<div>`. C'est pour ça qu'on parle de **Single Page Application**.

---

## `createRoot` vs l'ancien `ReactDOM.render`

Avant React 18 :

```jsx
import ReactDOM from 'react-dom'
ReactDOM.render(<App />, document.getElementById('root'))
```

Depuis React 18 :

```jsx
import { createRoot } from 'react-dom/client'
createRoot(document.getElementById('root')).render(<App />)
```

**Différence importante** : `createRoot` active le **mode concurrent** de React 18 — features comme `useTransition`, `Suspense` amélioré, rendu interruptible. L'ancienne API est dépréciée.

---

## `StrictMode` (souvent autour de `<App />`)

```jsx
root.render(
  <StrictMode>
    <App />
  </StrictMode>
)
```

`StrictMode` est un composant qui **n'affiche rien**. Il active des vérifications supplémentaires en développement :
- Détecte les effets de bord problématiques
- Avertit sur les API dépréciées
- Re-exécute volontairement certains hooks pour repérer les bugs

**N'a aucun impact en production.** À garder.

---

## Plusieurs racines (cas avancé)

Tu peux créer plusieurs `createRoot` dans la même page si tu veux injecter plusieurs apps React indépendantes dans plusieurs conteneurs HTML. Rare, mais possible (ex : intégrer React dans une page legacy).

---

## À retenir

1. **`react`** = moteur, **`react-dom`** = renderer pour le navigateur.
2. `createRoot(container)` crée une racine React attachée à un nœud HTML.
3. `.render(<App />)` lance le rendu de toute ton app dans ce nœud.
4. Toute l'app vit dans **un seul `<div id="root">`** → Single Page App.
5. `createRoot` est la nouvelle API de React 18, remplace `ReactDOM.render`.
6. `StrictMode` = checks de dev, invisible, à garder.
