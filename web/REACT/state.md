# Les States en React

## 1. C'est quoi un state ?

Un **state** est une variable dont la valeur est gérée par React. React la surveille : dès qu'elle change, le composant est redessiné automatiquement à l'écran.

Une variable normale en JavaScript ne déclenche rien quand on la modifie. Un state, si.

---

## 2. Pourquoi en a-t-on besoin ?

Une interface utilisateur doit refléter des données qui évoluent : un compteur, un champ de formulaire, une case cochée, une liste filtrée, etc.

Sans state, l'écran resterait figé. Le state est le pont entre **les données** et **ce que l'utilisateur voit**.

---

## 3. Comment on en crée un

Avec le hook `useState` :

```js
const [valeur, setValeur] = useState(valeurInitiale)
```

Deux choses sont retournées :
- la **valeur actuelle** (lecture)
- une **fonction setter** (écriture)

Exemple :

```js
const [count, setCount] = useState(0)
```

---

## 4. Les trois règles fondamentales

1. **Lecture directe.** On utilise `count` comme une variable normale.
2. **Écriture via le setter uniquement.** `setCount(1)`, jamais `count = 1`.
3. **Chaque changement déclenche un re-render.** React redessine le composant.

---

## 5. Où vit un state ?

Un state appartient au composant qui l'a déclaré. Il est **privé** par défaut.

Pour qu'un enfant accède à un state du parent, on lui passe la valeur via les **props**. Pour qu'un enfant modifie ce state, on lui passe aussi le setter.

C'est le **flux unidirectionnel** : les données descendent, les événements remontent.

---

## 6. Les autres outils de state

`useState` couvre la majorité des cas. Quand le besoin grandit, d'autres outils existent :

- **`useReducer`** — pour une logique de state complexe avec plusieurs actions.
- **`useContext`** — pour partager un state entre composants éloignés.
- **Bibliothèques externes** (Zustand, Redux, TanStack Query...) — pour gérer un state global ou les données venant d'une API.

À retenir : on commence toujours simple avec `useState`. On ne complexifie que lorsque c'est nécessaire.

---

## 7. Résumé en une phrase

Un state, c'est **une donnée que React surveille pour synchroniser l'écran avec la mémoire du composant**.
