# 📘 Cours : Les champs contrôlés en React

---

## 🧠 Définition

Un **champ contrôlé** (controlled component) est un champ de formulaire (input, textarea, select…) dont la valeur est **gérée par React via le state**.

👉 Cela signifie que **React devient la source de vérité**, et non plus le DOM.

---

## ⚙️ Principe de base

Un champ contrôlé repose toujours sur 3 éléments :

* `useState` → stocker la valeur
* `value` → afficher la valeur
* `onChange` → mettre à jour la valeur

---

## 📦 Exemple simple

```jsx
import { useState } from "react";

function App() {
  const [value, setValue] = useState("");

  return (
    <input
      type="text"
      value={value}
      onChange={(e) => setValue(e.target.value)}
    />
  );
}
```

---

## 🔁 Fonctionnement

1. L’utilisateur tape dans l’input
2. L’événement `onChange` est déclenché
3. On récupère la valeur avec `e.target.value`
4. On met à jour le state avec `setValue`
5. React re-render le composant
6. La nouvelle valeur est affichée

👉 Tout passe par React

---

## ⚖️ Comparaison : contrôlé vs non contrôlé

### ❌ Champ non contrôlé

```jsx
<input type="text" />
```

* La valeur est gérée par le DOM
* React ne contrôle rien
* Difficile à manipuler

---

### ✅ Champ contrôlé

```jsx
<input value={value} onChange={(e) => setValue(e.target.value)} />
```

* La valeur est dans le state React
* Facile à contrôler et modifier
* Plus flexible

---

## 🚀 Avantages des champs contrôlés

* Validation en temps réel (email, mot de passe…)
* Contrôle total des données
* Synchronisation entre plusieurs inputs
* Gestion simple des formulaires
* Debug plus facile

---

## 🧩 Exemple avec formulaire

```jsx
import { useState } from "react";

function Form() {
  const [email, setEmail] = useState("");

  const handleSubmit = (e) => {
    e.preventDefault();
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

## ⚠️ Points importants

* Toujours mettre `value` → sinon ce n’est pas contrôlé
* Toujours gérer `onChange` → sinon champ bloqué
* Le state doit être la seule source de vérité

---

## 🧠 Résumé

👉 Champ contrôlé = React contrôle la valeur

👉 Structure :

```
useState → value → onChange
```

👉 Avantage : contrôle total du formulaire

---

## 🏁 Conclusion

Les champs contrôlés sont essentiels en React pour gérer correctement les formulaires.
Ils permettent d’avoir une logique claire, centralisée et facile à maintenir.

---
