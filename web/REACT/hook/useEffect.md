# `useEffect`

## 1. Définition

`useEffect` est un **hook React** qui permet d'exécuter du code en réponse à des événements du cycle de vie d'un composant.

Il remplace les méthodes de classe `componentDidMount`, `componentDidUpdate` et `componentWillUnmount`.

---

## 2. Syntaxe de base

```jsx
useEffect(() => {
  // code à exécuter
}, [dépendances]);
```

Deux paramètres :
- **callback** — la fonction à exécuter
- **tableau de dépendances** — contrôle *quand* le callback s'exécute

---

## 3. Les 3 modes d'exécution

| Tableau de dépendances | Comportement |
|---|---|
| Absent | S'exécute après **chaque rendu** |
| `[]` vide | S'exécute **une seule fois** (montage) |
| `[a, b]` | S'exécute quand `a` ou `b` **change** |

---

## 4. La fonction de nettoyage (cleanup)

Le callback peut retourner une fonction. Elle s'exécute :
- avant le prochain effet
- au démontage du composant

```jsx
useEffect(() => {
  // setup
  return () => {
    // cleanup
  };
}, [dep]);
```

Cas d'usage typiques : abonnements, timers, event listeners, connexions WebSocket.

---

## 5. Cas d'usage courants

- Appels API / fetch de données
- Mise à jour du titre de la page (`document.title`)
- Synchronisation avec un système externe (socket, store, lib tierce)
- Gestion d'abonnements et leur annulation
- Animations au montage

---

## 6. Ce que `useEffect` n'est PAS

- Ce n'est **pas** un gestionnaire d'événements
- Ce n'est **pas** le bon endroit pour transformer des données déjà disponibles en state
- Ce n'est **pas** la seule façon de gérer les effets de bord (voir `useLayoutEffect`, `useSyncExternalStore`)

---

## 7. Règles fondamentales

1. Ne pas appeler `useEffect` dans des conditions ou des boucles
2. Toujours déclarer dans le tableau de dépendances les valeurs utilisées dans le callback
3. Toujours prévoir un cleanup si l'effet crée une ressource persistante

---

## 8. Positionnement dans React

```
Rendu → Commit DOM → useEffect s'exécute (asynchrone, après peinture)
```

Contrairement à `useLayoutEffect` qui s'exécute **synchroniquement** après le commit et avant la peinture.
