# useState

## 1. Définition

`useState` est un **hook React** qui permet à un composant fonctionnel de posséder un **état local**, c'est-à-dire des données qui peuvent changer au cours du temps et déclencher un re-render quand elles changent.

Avant les hooks, seuls les composants de classe pouvaient avoir un état. `useState` a rendu cette capacité accessible aux composants fonctionnels.

---

## 2. Syntaxe de base

```jsx
import { useState } from "react";

const [valeur, setValeur] = useState(valeurInitiale);
```

- `valeur` → la donnée actuelle.
- `setValeur` → la fonction qui permet de modifier cette donnée.
- `valeurInitiale` → la valeur de départ (au premier render).

La destructuration `[a, b]` est obligatoire : `useState` retourne toujours un tableau de deux éléments.

---

## 3. Principe fondamental

React est **déclaratif** : tu ne manipules pas le DOM directement. Tu décris ce que l'UI doit être en fonction de l'état, et React se charge de synchroniser l'affichage.

> Quand l'état change → React re-render le composant → l'UI reflète le nouvel état.

---

## 4. À quoi ça sert

- Mémoriser une valeur entre deux renders.
- Réagir à des interactions utilisateur (clics, saisie, toggle…).
- Piloter l'affichage conditionnel d'éléments.
- Stocker des données récupérées (API, formulaires, etc.).

---

## 5. Règles à respecter

1. **Toujours appelé au top-level** du composant — jamais dans une condition, une boucle ou une fonction imbriquée.
2. **Uniquement dans des composants React** (ou dans d'autres hooks custom).
3. **Ne jamais modifier l'état directement** : on passe toujours par le setter.
4. **L'état est immuable** : pour les objets et tableaux, on crée une nouvelle référence plutôt que de muter l'existant.

---

## 6. Comportement clé

- La mise à jour de l'état est **asynchrone** : la nouvelle valeur n'est pas disponible immédiatement après l'appel du setter.
- Chaque appel du setter **programme un re-render**.
- Si la nouvelle valeur est identique à l'ancienne, React peut éviter le re-render.

---

## 7. Mental model

Pense à `useState` comme à une **case mémoire** attachée à l'instance du composant. À chaque render, React te redonne la valeur actuelle de cette case, et te fournit un moyen de l'écraser pour provoquer un nouveau render.

---

## 8. Quand ne PAS l'utiliser

- Pour des données qui ne déclenchent pas de changement visuel → utiliser `useRef`.
- Pour un état partagé entre beaucoup de composants → Context, Zustand, Redux, etc.
- Pour des valeurs dérivées calculables à partir d'autres états → les calculer directement, ne pas les stocker.

---

## 9. Résumé

`useState` = mémoire locale + déclencheur de re-render. C'est la brique la plus fondamentale de la réactivité dans React moderne. Maîtriser ses règles et son comportement asynchrone est un prérequis avant d'aborder `useEffect`, `useReducer` ou tout hook plus avancé.
