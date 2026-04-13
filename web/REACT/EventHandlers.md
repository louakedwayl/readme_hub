# ⚛️ Cours : Les Event Handlers en React

## 📌 Introduction

Un **event handler** est une fonction exécutée lorsqu’un événement se produit dans l’interface.

👉 Exemples :
- clic (`click`)
- saisie (`input`)
- soumission (`submit`)
- survol (`hover`)

---

## 🧠 Principe

En React, on associe une fonction à un événement :

```js
<button onClick={handleClick}>Click</button>
```

👉 Quand l’utilisateur clique → `handleClick` est exécutée

---

## ⚙️ Syntaxe

### 🔹 Nom des événements

En React :
- `onclick` ❌
- `onClick` ✅ (camelCase obligatoire)

---

### 🔹 Fonction handler

```js
const handleClick = () => {
  console.log("Click")
}
```

---

## ⚠️ Erreur classique

```js
<button onClick={handleClick()}> ❌
```

👉 La fonction est exécutée immédiatement

```js
<button onClick={handleClick}> ✅
```

👉 On passe la fonction, React l’appellera plus tard

---

## 🧠 L’argument `event`

React passe automatiquement un argument :

```js
const handleClick = (e) => {
  console.log(e)
}
```

👉 `e` = objet événement (SyntheticEvent)

---

## ⚠️ Important : nombre d’arguments

👉 React passe **toujours 1 argument automatiquement** :

```js
handleClick(event)
```

---

## 🧩 Ajouter tes propres arguments

Tu ne peux PAS faire :

```js
<button onClick={handleClick("Wayl")}> ❌
```

👉 ça exécute immédiatement

---

## ✅ Bonne méthode

```js
<button onClick={(e) => handleClick("Wayl", e)}>
```

👉 Ici :
- tu contrôles les arguments
- `e` est passé manuellement

---

## 🧪 Exemple complet

```js
function App() {

  const handleClick = (name, e) => {
    console.log("Nom :", name)
    console.log("Event :", e)
  }

  return (
    <button onClick={(e) => handleClick("Wayl", e)}>
      Clique
    </button>
  )
}
```

---

## 📥 Input (très utilisé)

```js
const handleChange = (e) => {
  console.log(e.target.value)
}
```

```js
<input onChange={handleChange} />
```

👉 `e.target.value` = valeur du champ

---

## 📤 Formulaire

```js
const handleSubmit = (e) => {
  e.preventDefault()
  console.log("Form envoyé")
}
```

```js
<form onSubmit={handleSubmit}>
  <button type="submit">Envoyer</button>
</form>
```

👉 empêche le rechargement de la page

---

## 🧠 Bonnes pratiques

- nommer les fonctions `handleX`
- éviter les fonctions trop lourdes dans le JSX
- utiliser `() =>` seulement si nécessaire

---

## 🧠 Résumé

- event handler = fonction déclenchée par un événement
- React passe automatiquement **1 argument (event)**
- tu peux ajouter d’autres arguments avec `() =>`
- ne jamais appeler directement la fonction dans le JSX
- très utilisé avec `useState`

---

## 🚀 Conclusion

Les event handlers rendent ton app **interactive**.

👉 C’est le lien entre l’utilisateur et ton code React.
