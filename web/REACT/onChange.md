# 📘 Cours : `onChange` en React

---

## 🧠 Définition

`onChange` est un **event handler** en React qui se déclenche lorsqu’une valeur change dans un champ de formulaire.

👉 Il est utilisé principalement avec :

* `input`
* `textarea`
* `select`

---

## ⚙️ Principe

`onChange` permet de :

👉 **écouter les modifications de l’utilisateur**
👉 **récupérer la nouvelle valeur**
👉 **mettre à jour le state**

---

## 📦 Exemple simple

```jsx id="l2z2x7"
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

1. L’utilisateur tape dans le champ
2. `onChange` est déclenché
3. L’événement `e` est reçu
4. On lit la valeur → `e.target.value`
5. On met à jour le state
6. React re-render avec la nouvelle valeur

👉 C’est la base des **champs contrôlés**

---

## 🧩 L’objet `event`

Dans :

```jsx id="2j8r2d"
onChange={(e) => setValue(e.target.value)}
```

👉 `e` = **event**

Il contient :

* `e.target` → l’élément HTML
* `e.target.value` → la valeur du champ

---

## 🧪 Exemple avec plusieurs champs

```jsx id="e7c6sk"
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

  return (
    <>
      <input
        name="name"
        value={form.name}
        onChange={handleChange}
      />

      <input
        name="email"
        value={form.email}
        onChange={handleChange}
      />
    </>
  );
}
```

---

## 🚀 Cas spéciaux

### 🔹 Checkbox

```jsx id="5h2h2p"
<input
  type="checkbox"
  checked={checked}
  onChange={(e) => setChecked(e.target.checked)}
/>
```

👉 ici on utilise `checked` au lieu de `value`

---

### 🔹 Select

```jsx id="u4m7p9"
<select onChange={(e) => setValue(e.target.value)}>
  <option value="fr">France</option>
  <option value="us">USA</option>
</select>
```

---

## ⚠️ Points importants

* `onChange` fonctionne différemment de JS natif (plus réactif)
* Toujours coupler avec `value` → sinon champ non contrôlé
* Toujours utiliser `setState` pour mettre à jour

---

## 🧠 Différence avec JavaScript natif

En JavaScript :

```js
input.addEventListener("change", callback);
```

👉 se déclenche souvent quand on quitte le champ

En React :

👉 `onChange` se déclenche **à chaque frappe**

---

## 🧩 Résumé

👉 `onChange` = écouter les modifications

👉 Structure :

```jsx id="6l9p2f"
onChange={(e) => setState(e.target.value)}
```

👉 Sert à :

* gérer les inputs
* créer des formulaires
* synchroniser les données

---

## 🏁 Conclusion

`onChange` est essentiel pour gérer les interactions utilisateur en React.
C’est lui qui permet de connecter les champs de formulaire au state.

👉 Sans `onChange`, pas de champs contrôlés.

---
