# ⚛️ useState en React (avec explication détaillée)

## 📌 Exemple complet

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

## 🔍 Explication ligne par ligne

### 1️⃣ Import

```js
import { useState } from 'react'
```

On importe le hook `useState` depuis React.

---

### 2️⃣ Création du state

```js
const [count, setCount] = useState(0)
```

- `count` = valeur actuelle (0 au début)
- `setCount` = fonction pour modifier la valeur

---

### 3️⃣ Affichage

```js
<p>{count}</p>
```

Affiche la valeur dans l’UI.

---

### 4️⃣ Bouton

```js
<button onClick={() => setCount(count + 1)}>
```

Quand tu cliques :
- calcule `count + 1`
- met à jour avec `setCount`

---

## 🔄 Cycle au clic

1. count = 0
2. clic
3. setCount(1)
4. React re-render
5. UI mise à jour

---

## ⚠️ Mauvaise pratique

```js
count = count + 1
```

React ne détecte pas → pas de mise à jour

---

## ✅ Bonne pratique

```js
setCount(prev => prev + 1)
```

---

## 🧠 Résumé

- useState = mémoire
- setState = update + render
- ne jamais modifier directement

---

## 🚀 Conclusion

`useState` est la base des interfaces dynamiques en React.
