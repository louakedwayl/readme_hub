# onClick en HTML vs JSX (React)

## 🔹 Définition

Les deux permettent de réagir à un clic, mais ils fonctionnent **différemment** :

- HTML → utilise du **code en texte (string)**
- JSX → utilise des **fonctions JavaScript**

---

## 🔹 HTML classique

```html
<button onclick="alert('Hello')">Clique</button>
```

👉 Ici :

- `onclick` est en **minuscule**
- on met du **code JavaScript en string**
- le navigateur exécute ce texte

---

## 🔹 JSX (React)

```jsx
<button onClick={() => alert("Hello")}>Clique</button>
```

👉 Ici :

- `onClick` est en **camelCase**
- on passe une **fonction JavaScript**
- React appelle cette fonction au clic

---

## 🔹 Différences principales

| HTML                  | JSX (React)              |
|----------------------|--------------------------|
| `onclick`            | `onClick`                |
| minuscule            | camelCase                |
| code en string       | fonction JS              |
| exécution directe    | exécuté via React        |

---

## 🔹 Exemple avec fonction

### HTML

```html
<button onclick="handleClick()">Clique</button>
```

---

### JSX

```jsx
function handleClick() {
  alert("Hello");
}

<button onClick={handleClick}>Clique</button>
```

---

## 🔹 Pourquoi React fait ça ?

- plus **sécurisé**
- plus **lisible**
- mieux intégré avec JavaScript

---

## 🔥 Résumé

- HTML → `onclick` + string  
- JSX → `onClick` + fonction  
- JSX utilise du JavaScript, pas du texte
