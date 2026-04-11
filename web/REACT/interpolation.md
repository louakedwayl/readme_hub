# 🔄 L’interpolation des variables en JSX

## 🔹 Définition

L’**interpolation** en JSX permet d’insérer des **valeurs JavaScript** directement dans ton HTML (JSX).

👉 Pour ça, on utilise des **accolades `{}`**

---

## 🔹 Exemple simple

```jsx
const name = "Wayl";

return <h1>Hello {name}</h1>;
```

👉 `{name}` permet d’afficher la variable dans le JSX

---

## 🔹 Interpoler des expressions

Tu peux mettre **n’importe quelle expression JavaScript** :

```jsx
const age = 20;

return <p>Tu as {age + 1} ans</p>;
```

👉 JSX évalue l’expression

---

## 🔹 Conditions

```jsx
const isLogged = true;

return <p>{isLogged ? "Connecté" : "Déconnecté"}</p>;
```

👉 Très utilisé dans React

---

## 🔹 Listes (boucles)

```jsx
const items = ["A", "B", "C"];

return (
  <ul>
    {items.map(item => <li>{item}</li>)}
  </ul>
);
```

👉 On utilise `.map()` pour générer du JSX

---

## 🔹 Ce qu’on ne peut pas faire

❌ Instructions complètes :

```jsx
{if (true) { return "Hello"; }} // ❌
```

👉 JSX accepte seulement des **expressions**, pas des blocs de code

---

## 🔥 Résumé

- `{}` = interpolation en JSX
- Permet d’insérer du JavaScript dans le HTML
- Accepte :
  - variables
  - calculs
  - conditions
  - boucles (via `.map()`)
- Refuse :
  - instructions (`if`, `for`, etc.)
