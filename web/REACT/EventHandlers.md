# Event Handlers

## Le concept

Une page web est **réactive** : elle répond aux actions de l'utilisateur (clic, frappe, scroll, survol…) et à certains événements système (chargement, erreur réseau…).

Pour qu'elle réagisse, il faut **écouter** les événements et **exécuter du code** quand ils se produisent.

```
Événement ──→ Listener (écoute) ──→ Handler (fonction) ──→ Action
```

---

## Vocabulaire

| Terme | Définition |
|---|---|
| **Event** | Une action qui se produit (clic, frappe clavier, etc.) |
| **Event listener** | Le mécanisme qui **écoute** un type d'événement sur un élément |
| **Event handler** | La **fonction** exécutée quand l'événement se déclenche |

En pratique, les deux termes sont souvent confondus. Le listener attache le handler à un élément.

---

## En JavaScript natif

```js
button.addEventListener('click', () => {
  console.log('cliqué')
})
```

- `addEventListener` → installe le listener
- `'click'` → le type d'événement écouté
- `() => {...}` → le handler

Pour retirer :
```js
button.removeEventListener('click', maFonction)
```

---

## En React

React expose les events via des **props** commençant par `on` :

```jsx
<button onClick={() => console.log('cliqué')}>OK</button>
```

Plus besoin de gérer `addEventListener` / `removeEventListener` : React s'en occupe automatiquement.

---

## L'event object

Tout handler reçoit automatiquement un **objet** contenant les infos de l'événement :

```js
button.addEventListener('click', (e) => {
  console.log(e.target)   // élément cliqué
  e.preventDefault()      // annule le comportement par défaut
})
```

Méthodes utiles :
- `e.preventDefault()` → annule l'action par défaut du navigateur (ex : soumission de formulaire)
- `e.stopPropagation()` → empêche l'événement de remonter aux éléments parents

---

## Événements les plus courants

| Catégorie | Événements |
|---|---|
| **Souris** | `click`, `dblclick`, `mouseenter`, `mouseleave` |
| **Clavier** | `keydown`, `keyup` |
| **Formulaire** | `change`, `input`, `submit`, `focus`, `blur` |
| **Fenêtre** | `load`, `resize`, `scroll` |

---

## Règles à retenir

1. Un listener **écoute**, un handler **réagit**.
2. Le handler reçoit toujours un **event object** en paramètre.
3. En JS natif, pense à **retirer** les listeners quand ils ne servent plus (fuites mémoire).
4. En React, les events sont en **camelCase** (`onClick`, pas `onclick`) et la gestion est automatique.
5. **Ne jamais appeler** le handler au moment de l'attacher : passe la **référence**, pas le résultat.
   ```jsx
   onClick={handleClick}     // ✅ référence
   onClick={handleClick()}   // ❌ appel immédiat
   ```

---

## Résumé

Les event listeners sont le **pont entre l'utilisateur et ton code**. Sans eux, une page est statique. Avec eux, elle devient interactive.

React simplifie le mécanisme mais le concept reste identique à JS natif : on attache une fonction à un type d'événement, et elle s'exécute quand l'événement se produit.
