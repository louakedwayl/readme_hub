# ⚡ Passer une fonction vs appeler une fonction en JSX

## 🔹 Définition

En JSX, quand on utilise des listeners (comme `onClick`), il est très important de comprendre la différence entre :

- **passer une fonction**
- **appeler une fonction**

---

## 🔹 Passer une fonction

```jsx
<button onClick={handleClick}></button>
```

👉 Ici :

- on **passe la fonction**
- elle sera exécutée **plus tard**, quand l’événement se produit (ex : clic)

---

## 🔹 Appeler une fonction

```jsx
<button onClick={handleClick()}></button>
```

👉 Ici :

- la fonction est **appelée immédiatement**
- elle s’exécute dès le rendu du composant
- ❌ ce n’est pas ce qu’on veut pour un event

---

## 🔹 Exemple simple

```jsx
function sayHello() {
  console.log("Hello");
}
```

- `sayHello` → référence à la fonction  
- `sayHello()` → exécute la fonction  

---

## 🔹 Pourquoi c’est important en React

React attend une **fonction à appeler plus tard**.

Donc :

- ✅ `onClick={handleClick}` → correct  
- ❌ `onClick={handleClick()}` → incorrect  

---

## 🔹 Cas avec arguments

```jsx
<button onClick={() => handleClick("Wayl")}></button>
```

👉 Ici :

- on passe une fonction anonyme
- qui appelle `handleClick` au clic

---

## 🔥 Résumé

- sans `()` → on passe la fonction  
- avec `()` → on exécute la fonction immédiatement  
- React a besoin d’une fonction pour gérer les événements
