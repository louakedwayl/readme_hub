# ⚛️ Cours : useState en React

## 📌 Introduction

`useState` est un **hook React** qui permet de gérer un **état (state)** dans un composant fonctionnel.

👉 Il donne à ton composant une **mémoire dynamique**.

---

## 🧠 Pourquoi useState ?

Par défaut, un composant React :
- affiche des données
- mais **ne se souvient de rien**

👉 `useState` permet de :
- stocker une valeur
- la modifier
- déclencher un re-render automatique

---

## ⚙️ Syntaxe

```js
const [state, setState] = useState(valeurInitiale)
```

---

## 🔥 Exemple simple

```js
import { useState } from 'react'

function Counter() {
  const [count, setCount] = useState(0)

  return (
    <>
      <p>{count}</p>
      <button onClick={() => setCount(count + 1)}>
        +1
      </button>
    </>
  )
}
```

---

## ⚠️ Règles importantes

- ❌ Ne jamais modifier directement
- ✅ Toujours utiliser `setState`

---

## 🧠 Mise à jour basée sur l’ancienne valeur

```js
setCount(prev => prev + 1)
```

---

## 📦 Types possibles

- Number
- String
- Boolean
- Object (avec copie via spread)

---

## 🧠 Résumé

- `useState` = mémoire du composant
- `setState` = met à jour
- changement = re-render

---

## 🚀 Conclusion

`useState` est la base de React moderne.
