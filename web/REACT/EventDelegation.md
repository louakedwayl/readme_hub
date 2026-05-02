# Event Delegation en React

## 1. Rappel : c'est quoi l'event delegation en JS natif ?

L'event delegation, c'est un pattern qui exploite le **bubbling** des événements DOM. Au lieu d'attacher un listener sur chaque élément enfant, tu en attaches **un seul** sur un ancêtre commun, et tu utilises `event.target` pour savoir quel enfant a déclenché l'événement.

### Exemple vanilla

```html
<ul id="list">
  <li data-id="1">Item 1</li>
  <li data-id="2">Item 2</li>
  <li data-id="3">Item 3</li>
</ul>
```

```js
// Sans delegation : un listener par <li> (mauvais)
document.querySelectorAll('#list li').forEach(li => {
  li.addEventListener('click', e => console.log(e.target.dataset.id));
});

// Avec delegation : un seul listener sur <ul> (bon)
document.getElementById('list').addEventListener('click', e => {
  if (e.target.tagName === 'LI') {
    console.log(e.target.dataset.id);
  }
});
```

### Pourquoi c'est utile

- **Mémoire** : un listener au lieu de N.
- **Éléments dynamiques** : si tu ajoutes un `<li>` après coup, il "hérite" automatiquement du listener parent. Pas besoin de réattacher.
- **Performance** : le navigateur gère mieux quelques listeners que des milliers.

---

## 2. Ce que React fait dans ton dos

React **fait déjà de l'event delegation pour toi**, automatiquement, sur tous les `onClick`, `onChange`, `onSubmit`, etc. que tu écris dans ton JSX.

Quand tu écris :

```jsx
<button onClick={handleClick}>Click</button>
```

React **n'attache pas** un listener sur ce `<button>`. Il :

1. Attache **un seul listener** sur un nœud racine.
2. Stocke ton `handleClick` dans une structure interne (associée au fiber du composant).
3. Quand l'événement bubble jusqu'à la racine, React intercepte, identifie quel composant a été cliqué, et appelle ton handler.

C'est pour ça que les "events" que tu reçois dans React (`e`) ne sont **pas** des `Event` natifs : ce sont des **SyntheticEvent** (un wrapper React).

### Avant React 17

Le listener global était attaché sur `document`.

### Depuis React 17 (et 18, 19)

Le listener global est attaché sur le **root container** (le DOM node passé à `createRoot` / `ReactDOM.render`).

```jsx
const root = createRoot(document.getElementById('app'));
//                       ^^^^^^^^^^^^^^^^^^^^^^^^^^^
// C'est sur CE node que React attache ses listeners délégués
root.render(<App />);
```

### Pourquoi ce changement ?

Permettre plusieurs versions de React de cohabiter sur la même page (micro-frontends), et éviter les conflits avec d'autres libs qui écoutent sur `document`.

---

## 3. SyntheticEvent : c'est quoi exactement ?

Un `SyntheticEvent` est un objet React qui **wrap** l'événement natif. Il expose la même API que l'event DOM standard (`preventDefault`, `stopPropagation`, `target`, `currentTarget`...) de manière cross-browser.

```jsx
function MyButton() {
  const handleClick = (e) => {
    console.log(e);              // SyntheticEvent
    console.log(e.nativeEvent);  // Le vrai Event DOM en dessous
    e.preventDefault();          // Marche comme attendu
    e.stopPropagation();         // ⚠️ voir section pièges
  };

  return <button onClick={handleClick}>Click</button>;
}
```

### Note historique : event pooling

Avant React 17, les SyntheticEvents étaient **poolés** (recyclés pour économiser la mémoire). Ça obligeait à appeler `e.persist()` si tu voulais utiliser l'event de manière asynchrone. **Depuis React 17, le pooling a été supprimé**, tu peux utiliser `e` librement.

---

## 4. Conséquences pratiques (à connaître)

### a) `stopPropagation` React ≠ `stopPropagation` DOM

Quand tu fais `e.stopPropagation()` dans un handler React, tu stoppes la propagation **dans le système synthétique de React**, pas forcément dans le DOM natif.

```jsx
function Inner() {
  return (
    <button onClick={(e) => {
      e.stopPropagation(); // Stoppe les onClick React parents
    }}>
      Click
    </button>
  );
}

// MAIS un addEventListener('click') natif sur document recevra QUAND MÊME l'event,
// parce que côté DOM, l'event a bubblé jusqu'au root container avant que React le traite.
```

C'est un piège classique quand tu mélanges du React avec une lib qui écoute sur `document` (genre un dropdown qui se ferme au clic extérieur).

### b) Mélanger `addEventListener` natif et handlers React

Si tu fais ça :

```jsx
useEffect(() => {
  const handler = (e) => console.log('native');
  document.addEventListener('click', handler);
  return () => document.removeEventListener('click', handler);
}, []);
```

Ton handler natif sur `document` reçoit l'event **avant** que React ne le traite (car React écoute sur le root, qui est un descendant de `document`... non, attends, `document` est l'ancêtre du root, donc bubbling normal — l'ordre dépend de la phase).

**Règle pratique** : évite de mélanger les deux systèmes pour le même type d'event sur les mêmes zones du DOM. Si tu dois, attache le listener natif sur un node **plus profond** que le root React, ou utilise la phase de capture.

### c) Certains events ne sont PAS délégués

Tous les events ne bubblent pas naturellement (`focus`, `blur`, `mouseenter`, `mouseleave`, événements media...). React les gère quand même via `onFocus`, `onBlur`, etc., mais en interne il utilise des tricks (capture phase, ou listeners dédiés). Pour toi en tant que dev, c'est transparent.

---

## 5. Faut-il faire de l'event delegation manuelle en React ?

**Non, dans 99% des cas.** React le fait déjà. Si tu écris :

```jsx
<ul>
  {items.map(item => (
    <li key={item.id} onClick={() => handle(item.id)}>
      {item.name}
    </li>
  ))}
</ul>
```

Tu pourrais penser "je crée N handlers, c'est mauvais". En réalité :

- Côté DOM, il n'y a **toujours qu'un seul listener** (sur le root container).
- Côté React, oui tu crées N closures à chaque render. C'est rarement un problème de perf.

### Si tu veux quand même optimiser (cas extrêmes)

Pour des listes de **plusieurs milliers d'éléments**, tu peux faire de la delegation manuelle au niveau du `<ul>` pour éviter de recréer N closures à chaque render :

```jsx
function List({ items }) {
  const handleClick = (e) => {
    const li = e.target.closest('li[data-id]');
    if (!li) return;
    const id = li.dataset.id;
    // fais ton truc avec id
  };

  return (
    <ul onClick={handleClick}>
      {items.map(item => (
        <li key={item.id} data-id={item.id}>
          {item.name}
        </li>
      ))}
    </ul>
  );
}
```

Avantages :
- Une seule closure créée par render (au lieu de N).
- Pas besoin de `useCallback` sur N handlers.

Inconvénients :
- Tu perds en lisibilité.
- Tu dois passer par `data-*` attributes au lieu de capturer la valeur via closure.
- Tu devrais profiler avant de faire ça. Souvent inutile.

---

## 6. Cheat sheet

| Question | Réponse |
|---|---|
| React fait-il du delegation auto ? | Oui, sur tous les `onXxx` du JSX. |
| Sur quel node ? | Le root container (depuis React 17). |
| Quel objet je reçois dans le handler ? | Un `SyntheticEvent`. L'event natif est dans `e.nativeEvent`. |
| `e.stopPropagation()` stoppe quoi ? | Les handlers React parents. PAS forcément les listeners natifs sur `document`. |
| Dois-je faire de la delegation manuelle ? | Non, sauf cas extrêmes (grosses listes, hot path). |
| L'event pooling existe encore ? | Non, supprimé en React 17. |
| Plusieurs roots React sur la même page ? | OK depuis React 17, chaque root a ses propres listeners. |

---

## 7. À retenir

1. React fait déjà l'event delegation. Tu n'as **pas** à y penser pour 99% du code.
2. Tes handlers reçoivent un `SyntheticEvent`, pas un `Event` natif. Accède au natif via `e.nativeEvent` si besoin.
3. Attention au mélange `addEventListener` natif + handlers React, surtout autour de `stopPropagation`.
4. Depuis React 17, les listeners délégués sont sur le **root container**, pas sur `document`.
5. La delegation manuelle (avec `data-*` + `e.target.closest`) reste une optimisation valide pour les très grosses listes, mais profile avant.
