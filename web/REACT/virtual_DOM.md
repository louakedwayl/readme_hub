# Le Virtual DOM en React

## Problème de base

Manipuler le DOM réel (le document HTML affiché par le navigateur) est **lent**. Chaque modification déclenche un recalcul du layout, du style et un repaint. Sur une app avec beaucoup de mises à jour, ça devient un goulot d'étranglement.

## Qu'est-ce que le Virtual DOM ?

C'est une **copie légère du DOM réel**, stockée en mémoire sous forme d'objets JavaScript. React ne touche jamais le DOM directement — il travaille d'abord sur cette copie.

Un élément JSX comme :

```jsx
<div className="box">
  <p>Texte</p>
</div>
```

Produit en interne un objet du type :

```js
{
  type: 'div',
  props: {
    className: 'box',
    children: {
      type: 'p',
      props: { children: 'Texte' }
    }
  }
}
```

C'est ça, le Virtual DOM : un **arbre d'objets JS** qui décrit l'interface.

## Le cycle de mise à jour

1. **État change** — un `setState` ou un changement de props déclenche un re-render.
2. **Nouveau Virtual DOM** — React génère un nouvel arbre d'objets représentant l'UI après le changement.
3. **Diffing** — React compare l'ancien et le nouveau Virtual DOM pour identifier les différences (le « diff »).
4. **Reconciliation** — React calcule le **minimum d'opérations** nécessaires pour mettre à jour le DOM réel.
5. **Commit** — React applique uniquement ces opérations ciblées au DOM réel.

## L'algorithme de Diffing

React compare les deux arbres nœud par nœud avec deux règles simples :

- **Type différent** → React détruit l'ancien sous-arbre et reconstruit entièrement le nouveau.
- **Type identique** → React conserve le nœud et ne met à jour que les **attributs/props qui ont changé**.

Pour les listes d'éléments, React utilise la prop `key` pour identifier quel élément a été ajouté, supprimé ou déplacé. Sans `key`, React compare par position — ce qui génère des mises à jour inutiles.

```jsx
// Toujours mettre une key stable sur les éléments de liste
{items.map(item => <li key={item.id}>{item.name}</li>)}
```

## Pourquoi c'est performant

- Manipuler des objets JS en mémoire est **ordres de grandeur plus rapide** que toucher le DOM réel.
- Le batching : React regroupe plusieurs changements d'état avant de faire un seul cycle de diff + commit.
- Seuls les nœuds réellement modifiés sont touchés dans le DOM réel.

## Résumé en une phrase

Le Virtual DOM est un intermédiaire en mémoire qui permet à React de calculer le diff entre deux états de l'UI et d'appliquer uniquement les modifications nécessaires au DOM réel.
