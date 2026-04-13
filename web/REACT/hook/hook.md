# 🪝 Cours : Les Hooks React

## 📌 Introduction

Les **hooks** sont des fonctions spéciales introduites avec React 16.8.

Ils permettent d'utiliser :
- l'état (state)
- le cycle de vie
- et d'autres fonctionnalités React

👉 **dans des composants fonctionnels**, sans utiliser de classes.

---

## 🧠 Pourquoi les hooks existent ?

Avant :
- on utilisait des **classes** pour gérer l'état (`this.state`)
- code plus complexe, difficile à maintenir

Avec les hooks :
- code plus simple
- plus lisible
- plus modulaire

---

## ⚙️ Règles importantes

1. Toujours appeler les hooks :
   - en haut du composant
   - jamais dans une condition ou boucle

2. Seulement dans :
   - un composant React
   - ou un hook personnalisé

---

## 🧩 Les principaux hooks

### 🔹 useState

Permet de gérer un état local.

```js
const [state, setState] = useState(valeurInitiale)
```

---

### 🔹 useEffect

Permet d'exécuter du code après le rendu.

```js
useEffect(() => {
  // code
}, [])
```

---

### 🔹 useContext

Permet d'accéder à une donnée globale.

```js
const value = useContext(MonContext)
```

---

### 🔹 useRef

Permet de référencer un élément DOM.

```js
const ref = useRef(null)
```

---

### 🔹 useMemo

Optimise les performances.

```js
const value = useMemo(() => calcul(), [deps])
```

---

### 🔹 useCallback

Mémorise une fonction.

```js
const fn = useCallback(() => {}, [deps])
```

---

## 🧠 Hook personnalisé

```js
function useCounter() {
  const [count, setCount] = useState(0)
  const increment = () => setCount(count + 1)
  return { count, increment }
}
```

---

## 🔄 Cycle de vie

```js
useEffect(() => {
  console.log("monté")

  return () => {
    console.log("démonté")
  }
}, [])
```

---

## 🧠 Résumé

- useState → état
- useEffect → effets
- useContext → global
- useRef → référence
- Hooks = React moderne

---

## 🚀 Conclusion

Maîtriser les hooks = maîtriser React
