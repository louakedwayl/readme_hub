# 🎨 L’attribut `style` en JSX

## 🔹 Définition

En JSX, l’attribut `style` permet d’ajouter du style directement à un élément.

Contrairement au HTML classique, on n’écrit pas le CSS sous forme de texte.
En JSX, on écrit le style sous forme d’**objet JavaScript**.

L’attribut style utilise un objet JavaScript que tu écris directement. Cet objet est un objet littéral (non nommé) dans lequel chaque propriété CSS devient une propriété JavaScript en camelCase, et React utilise cet objet pour appliquer le style à l’élément.

---

## 🔹 Exemple simple

```jsx
function Box() {
  return <div style={{ color: "red" }}>Hello</div>;
}
```

---

## 🔹 Pourquoi il y a deux accolades ?

```jsx
style={{ color: "red" }}
```

- les **premières accolades** `{}` servent à écrire du JavaScript dans le JSX
- les **deuxièmes accolades** `{}` servent à créer l’objet JavaScript

---

## 🔹 Différence avec le HTML classique

HTML :
```html
<div style="color: red;"></div>
```

JSX :
```jsx
<div style={{ color: "red" }}></div>
```

---

## 🔹 Nom des propriétés

- `background-color` → `backgroundColor`
- `font-size` → `fontSize`

Exemple :

```jsx
function Title() {
  return <h1 style={{ fontSize: "32px", backgroundColor: "black" }}>Bonjour</h1>;
}
```

---

## 🔹 Plusieurs styles

```jsx
function Card() {
  return (
    <div style={{ color: "white", backgroundColor: "blue", padding: "10px" }}>
      Contenu
    </div>
  );
}
```

---

## 🔹 Utiliser une variable

```jsx
const boxStyle = {
  color: "white",
  backgroundColor: "green",
  padding: "10px"
};

function Box() {
  return <div style={boxStyle}>Hello</div>;
}
```

---

## 🔹 Quand utiliser `style`

- styles simples
- styles dynamiques
- tests rapides

---

## 🔥 Résumé

- `style` = objet JavaScript
- camelCase obligatoire
- `style={{ ... }}`
- pratique pour du simple
