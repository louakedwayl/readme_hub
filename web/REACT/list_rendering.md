# 📋 Le rendu de liste (List Rendering) en React

## 🔹 Définition

Le **rendu de liste** consiste à afficher plusieurs éléments à partir d’un tableau.

On utilise généralement la méthode `.map()` pour transformer un tableau en éléments JSX.

---

## 🔹 Exemple simple

```jsx
const numbers = [1, 2, 3];

function App() {
  return (
    <ul>
      {numbers.map(n => <li>{n}</li>)}
    </ul>
  );
}
```

---

## 🔹 Comment ça fonctionne

1. React lit le tableau  
2. `.map()` transforme chaque élément  
3. JSX crée des composants  
4. React affiche le résultat  

---

## 🔹 Important : les `key`

```jsx
const numbers = [1, 2, 3];

function App() {
  return (
    <ul>
      {numbers.map(n => <li key={n}>{n}</li>)}
    </ul>
  );
}
```

👉 `key` permet d’identifier chaque élément et d’optimiser le rendu

---

## 🔹 Exemple avec objets

```jsx
const users = [
  { id: 1, name: "Wayl" },
  { id: 2, name: "Alice" }
];

function App() {
  return (
    <ul>
      {users.map(user => (
        <li key={user.id}>{user.name}</li>
      ))}
    </ul>
  );
}
```

---

## 🔹 Résumé

- rendu de liste = afficher un tableau en JSX  
- on utilise `.map()`  
- chaque élément devient un composant  
- `key` est importante  

---

## 🔥 Version simple

👉 on transforme un tableau en éléments affichés avec `.map()`
