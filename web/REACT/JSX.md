# Introduction à JSX

## C'est quoi JSX ?

**JSX** (JavaScript XML) = syntaxe qui permet d'écrire du HTML directement dans du JavaScript.

Utilisée avec React pour décrire l'interface.

```jsx
const element = <h1>Salut !</h1>
```

Le navigateur ne comprend pas JSX → un outil comme Vite le transforme en JS classique avant exécution.

---

## Règle n°1 : un seul élément racine

Un composant doit retourner **un seul élément parent**.

```jsx
// ❌ Interdit
return (
  <h1>Titre</h1>
  <p>Texte</p>
)

// ✅ OK
return (
  <div>
    <h1>Titre</h1>
    <p>Texte</p>
  </div>
)
```

Si tu ne veux pas de `<div>` en plus, utilise un **Fragment** :

```jsx
return (
  <>
    <h1>Titre</h1>
    <p>Texte</p>
  </>
)
```

---

## Règle n°2 : les attributs en camelCase

En HTML, on écrit `class` et `onclick`. En JSX, c'est `className` et `onClick`.

```jsx
<button className="btn" onClick={handleClick}>
  Clique
</button>
```

Les balises auto-fermantes doivent être fermées :

```jsx
<img src="photo.jpg" />
<br />
<input type="text" />
```

---

## Règle n°3 : insérer du JavaScript avec `{ }`

Tout ce qui est entre accolades est évalué comme du JavaScript.

```jsx
const name = 'Wayl'
const age = 22

return <p>{name} a {age} ans</p>
```

Tu peux mettre n'importe quelle expression :

```jsx
<p>{2 + 2}</p>              // 4
<p>{name.toUpperCase()}</p> // WAYL
<p>{user.email}</p>         // wayl@example.com
```

---

## Attributs dynamiques

Pour passer une valeur JS à un attribut, on utilise aussi `{ }` :

```jsx
const url = 'https://wayl.dev'

<a href={url}>Mon site</a>
<img src={user.avatar} alt={user.name} />
```

---

## Rendu conditionnel

Pour afficher quelque chose seulement si une condition est vraie :

```jsx
{isLoggedIn && <p>Bienvenue</p>}
```

Avec un ternaire pour choisir entre deux options :

```jsx
{isLoggedIn ? <p>Connecté</p> : <p>Déconnecté</p>}
```

---

## Afficher une liste

On utilise `.map()` pour transformer un tableau de données en tableau d'éléments JSX :

```jsx
const fruits = ['pomme', 'banane', 'kiwi']

return (
  <ul>
    {fruits.map((fruit, index) => (
      <li key={index}>{fruit}</li>
    ))}
  </ul>
)
```

La prop `key` est **obligatoire** sur chaque élément d'une liste — elle aide React à tracker les éléments.

---

## Résumé

- **JSX** = HTML dans du JS
- Un composant retourne **un seul élément racine** (ou un Fragment `<>`)
- Attributs en **camelCase** (`className`, `onClick`)
- `{ }` pour insérer du JavaScript
- `&&` et `? :` pour le rendu conditionnel
- `.map()` pour les listes, avec une `key` unique

C'est tout ce qu'il faut pour lire et écrire du JSX.
