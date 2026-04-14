# `onSubmit` en React

---

## 🧠 Définition

`onSubmit` est un **event handler** en React qui se déclenche lorsque l’utilisateur soumet un formulaire.

👉 Il est utilisé sur la balise `<form>`

---

## ⚙️ Principe

`onSubmit` permet de :

👉 intercepter l’envoi d’un formulaire
👉 récupérer les données
👉 exécuter une logique (API, validation, etc.)

---

## 📦 Exemple simple

```jsx id="y2k8a1"
import { useState } from "react";

function App() {
  const [email, setEmail] = useState("");

  const handleSubmit = (e) => {
    e.preventDefault(); // empêche le rechargement de la page
    console.log(email);
  };

  return (
    <form onSubmit={handleSubmit}>
      <input
        type="email"
        value={email}
        onChange={(e) => setEmail(e.target.value)}
      />
      <button type="submit">Envoyer</button>
    </form>
  );
}
```

---

## 🔁 Fonctionnement

1. L’utilisateur remplit le formulaire
2. Il clique sur “Envoyer” (ou appuie sur Entrée)
3. `onSubmit` est déclenché
4. La fonction `handleSubmit` s’exécute
5. On traite les données

---

## ⚠️ `preventDefault()` (très important)

```jsx id="6t3l9p"
e.preventDefault();
```

👉 Empêche le comportement par défaut du navigateur :

* rechargement de la page
* envoi classique du formulaire

👉 Indispensable en React pour garder le contrôle

---

## 🧩 Exemple avec plusieurs champs

```jsx id="w8d2qz"
import { useState } from "react";

function Form() {
  const [form, setForm] = useState({
    name: "",
    email: ""
  });

  const handleChange = (e) => {
    setForm({
      ...form,
      [e.target.name]: e.target.value
    });
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log(form);
  };

  return (
    <form onSubmit={handleSubmit}>
      <input name="name" value={form.name} onChange={handleChange} />
      <input name="email" value={form.email} onChange={handleChange} />
      <button type="submit">Envoyer</button>
    </form>
  );
}
```

---

## 🚀 Bonnes pratiques

* Toujours utiliser `onSubmit` sur `<form>`
* Toujours appeler `e.preventDefault()`
* Gérer les inputs avec `onChange` (champs contrôlés)
* Centraliser la logique dans `handleSubmit`

---

## ❌ Erreur fréquente

```jsx id="p1z7kq"
<button onClick={handleSubmit}>Envoyer</button>
```

👉 Ça marche, mais ❌ mauvaise pratique

Pourquoi ?

* ne gère pas la touche Entrée
* casse le comportement standard des formulaires

👉 Toujours utiliser `<form onSubmit={...}>`

---

## 🧠 Différence avec JavaScript natif

En JavaScript :

```js id="a9m2qk"
form.addEventListener("submit", callback);
```

👉 Même principe, mais en React :

* plus simple
* intégré au composant
* lié au state

---

## 🧩 Résumé

👉 `onSubmit` = gérer l’envoi d’un formulaire

👉 Structure :

```jsx id="q7n4lx"
<form onSubmit={handleSubmit}>
```

👉 Toujours :

```jsx id="m2k8zp"
e.preventDefault()
```

---

## 🏁 Conclusion

`onSubmit` est essentiel pour gérer les formulaires en React.
Il permet de contrôler entièrement le comportement d’envoi et de traiter les données proprement.

👉 `onChange` gère la saisie
👉 `onSubmit` gère l’envoi

---
