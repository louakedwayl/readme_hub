# Les Props en React

## C'est quoi ?

**Props** = abréviation de *properties*. Ce sont les **données qu'un composant parent envoie à un composant enfant**.

Analogie : un composant est une fonction. Les props sont ses arguments.

```jsx
<Title color="red">Mon titre</Title>
```

Ici, `Title` reçoit deux props : `color` et `children`.

---

## Pourquoi ça existe

Sans props, tous les composants seraient figés. Les props permettent de **réutiliser un même composant avec des données différentes**.

Un seul composant `Button`, cent boutons différents.

---

## Règle fondamentale

React passe **toujours un seul argument** au composant : un objet appelé `props`, qui contient **toutes** les valeurs transmises.

```jsx
function Title(props) {
  // props = { color: "red", children: "Mon titre" }
}
```

Jamais deux arguments. Jamais.

---

## Destructuring (standard)

Au lieu d'écrire `props.color`, `props.children`, on extrait directement :

```jsx
function Title({ color, children }) { ... }
```

C'est plus court, c'est le standard de l'écosystème.

---

## `children` : la prop spéciale

Tout ce qui se trouve **entre les balises ouvrante et fermante** d'un composant est automatiquement passé dans la prop `children`.

```jsx
<Title>Mon titre</Title>
//      ^^^^^^^^^
//      devient props.children
```

---

## Règle d'or : les props sont en lecture seule

Un composant **ne doit jamais modifier ses props**. Elles viennent d'en haut, elles ne se modifient que d'en haut. Pour gérer du changement interne, on utilise `state` (autre concept).

C'est le principe du **flux de données unidirectionnel** : du parent vers l'enfant, jamais l'inverse.

---

## Ce qu'on peut passer en prop

N'importe quoi : strings, numbers, booleans, arrays, objects, fonctions, voire d'autres composants. Tout ce qui est valeur JavaScript.

---

## À retenir

1. Props = arguments d'un composant.
2. React passe **un seul objet** `props`.
3. Destructure tes props.
4. `children` = contenu entre les balises.
5. Les props sont **immuables** dans l'enfant.
6. Flux : parent → enfant, jamais l'inverse.+
