# 📦 Les props en React

## 🔹 Définition

Un **props** (propriété) est une **donnée passée à un composant**.

👉 Les props permettent de rendre les composants **dynamiques et réutilisables**.

---

## 🔹 Exemple simple

```jsx
<Title text="Bonjour" />
```

👉 Ici :
- `text` = props
- `"Bonjour"` = valeur

---

## 🔹 Récupérer les props

```jsx
function Title(props) {
  return <h1>{props.text}</h1>;
}
```

👉 `props` est un objet qui contient toutes les propriétés

---

## 🔹 Déstructuration (recommandé)

```jsx
function Title({ text }) {
  return <h1>{text}</h1>;
}
```

👉 On récupère directement la propriété

---

## 🔹 Plusieurs props

```jsx
<User name="Wayl" age={20} />
```

```jsx
function User({ name, age }) {
  return <p>{name} a {age} ans</p>;
}
```

---

## 🔹 Props dynamiques

```jsx
const name = "Wayl";

<Title text={name} />
```

👉 On peut passer des variables avec `{}`

---

## 🔹 Rôle des props

- passer des données à un composant  
- personnaliser l’affichage  
- réutiliser un composant  

---

## 🔹 Important

👉 Les props sont **en lecture seule** (on ne les modifie pas)

---

## 🔥 Résumé

- props = données envoyées à un composant  
- reçues en paramètre  
- utilisées dans le JSX  
- rendent les composants dynamiques  

---

## 🎯 Version simple

👉  
> props = arguments d’un composant React
