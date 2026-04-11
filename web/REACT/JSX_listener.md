# 🎧 Les listeners en JSX

## 🔹 Définition

En JSX, un **listener** permet de **réagir à une action de l’utilisateur**.

Par exemple :

- un clic
- un changement dans un input
- le passage de la souris
- l’envoi d’un formulaire

En React, on utilise les listeners avec des **attributs spéciaux** sur les balises JSX.

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
```jsx
<button onClick={handleClick}>Clique</button>
```

### onChange
```jsx
<input onChange={handleChange} />
```

### onSubmit
```jsx
<form onSubmit={handleSubmit}></form>
```

### onMouseEnter
```jsx
<div onMouseEnter={handleEnter}></div>
```

### onMouseLeave
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
