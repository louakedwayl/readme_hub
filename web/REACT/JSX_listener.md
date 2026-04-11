# 🎧 Les listeners en JSX

## 🔹 Définition

En JSX, un **listener** permet de **réagir à une action de l’utilisateur**.

Par exemple :

- un clic
- un changement dans un input
- le passage de la souris
- l’envoi d’un formulaire

---

## 🔹 Exemple simple

```jsx
function App() {
  function handleClick() {
    alert("Tu as cliqué");
  }

  return <button onClick={handleClick}>Clique ici</button>;
}
```

---

## 🔹 Les listeners les plus connus

### onClick
Réagit à un clic de l’utilisateur.
```jsx
<button onClick={handleClick}>Clique</button>
```

### onChange
Réagit quand la valeur d’un input change.
```jsx
<input onChange={handleChange} />
```

### onSubmit
Réagit à l’envoi d’un formulaire.
```jsx
<form onSubmit={handleSubmit}></form>
```

### onMouseEnter
Réagit quand la souris entre sur un élément.
```jsx
<div onMouseEnter={handleEnter}></div>
```

### onMouseLeave
Réagit quand la souris quitte un élément.
```jsx
<div onMouseLeave={handleLeave}></div>
```

---

## 🔹 Important

HTML classique :

```html
<button onclick="alert('Hello')">Clique</button>
```

JSX :

```jsx
<button onClick={handleClick}>Clique</button>
```

En React, on passe **une fonction**, pas du code en texte.

---

## 🔹 Nom des listeners

- camelCase obligatoire
- ex : onClick, onChange, onSubmit

---

## 🔹 Résumé

Les listeners permettent de réagir aux actions de l’utilisateur.  
Ils déclenchent une fonction quand un événement se produit.
