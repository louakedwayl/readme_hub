# useMemo en React

## 1. Introduction

`useMemo` est un **Hook de React** qui permet d'optimiser les performances d'une application en **évitant des calculs inutiles** à chaque rendu.

Il sert à **mémoriser une valeur calculée** et à ne la recalculer que si ses dépendances changent.

---

## 2. Pourquoi utiliser useMemo ?

Dans React, un composant se **re-render souvent** :
- changement d'état
- changement de props
- re-render du composant parent

Si tu fais un **calcul coûteux** à chaque render, cela peut **ralentir ton application**.

`useMemo` permet donc de :
- ✅ éviter des recalculs inutiles
- ✅ améliorer les performances
- ✅ stabiliser certaines valeurs dérivées

---

## 3. Syntaxe

```javascript
const value = useMemo(() => {
  return computation();
}, [dependencies]);
```

**Détail des paramètres :**
- **Premier argument** : fonction qui retourne une valeur
- **Second argument** : tableau de dépendances

---

## 4. Fonctionnement

React garde en mémoire le résultat de la fonction.

| Situation | Résultat |
|-----------|----------|
| Les dépendances ne changent pas | React réutilise la valeur précédente (pas de recalcul) |
| Une dépendance change | React recalcule la valeur |

**Schéma simple :**
```
Premier render → Calcul exécuté → Résultat en mémoire
↓
Second render (dépendances inchangées) → Récupère la valeur en mémoire
↓
Troisième render (une dépendance change) → Recalcul exécuté → Nouveau résultat en mémoire
```

---

## 5. Exemple Simple

```javascript
import { useMemo, useState } from "react";

function App() {
  const [count, setCount] = useState(0);
  const [text, setText] = useState("");

  const expensiveCalculation = (num) => {
    console.log("Calcul en cours...");
    return num * 2;
  };

  // Mémoriser le résultat du calcul
  const result = useMemo(() => {
    return expensiveCalculation(count);
  }, [count]);

  return (
    <div>
      <p>Résultat : {result}</p>
      <button onClick={() => setCount(count + 1)}>Incrémenter</button>
      <input 
        value={text} 
        onChange={(e) => setText(e.target.value)} 
        placeholder="Tape du texte..."
      />
    </div>
  );
}

export default App;
```

**Comportement :**
- Le calcul (`expensiveCalculation`) ne se relance **que si `count` change**
- Si tu modifies le `text`, le calcul n'est **pas réexécuté**
- Le message `"Calcul en cours..."` n'apparaît en console que quand `count` change

---

## 6. Exemple Avancé : Filtrage d'une Liste

```javascript
import { useMemo, useState } from "react";

function UserList() {
  const [users, setUsers] = useState([
    { id: 1, name: "Alice" },
    { id: 2, name: "Bob" },
    { id: 3, name: "Charlie" },
  ]);
  const [search, setSearch] = useState("");

  // Filtrer les utilisateurs uniquement si search ou users changent
  const filteredUsers = useMemo(() => {
    console.log("Filtrage...");
    return users.filter(user =>
      user.name.toLowerCase().includes(search.toLowerCase())
    );
  }, [users, search]);

  return (
    <div>
      <input
        type="text"
        placeholder="Rechercher un utilisateur..."
        value={search}
        onChange={(e) => setSearch(e.target.value)}
      />
      <ul>
        {filteredUsers.map(user => (
          <li key={user.id}>{user.name}</li>
        ))}
      </ul>
    </div>
  );
}

export default UserList;
```

**Avantage :** le filtrage coûteux n'est recalculé que si `users` ou `search` changent.

---

## 7. Différence avec useEffect

| Hook | Utilité | Retour |
|------|---------|--------|
| `useEffect` | Exécuter du code (effet de bord) | Rien |
| `useMemo` | Retourner une valeur mémorisée | Une valeur |

**Exemple useEffect :**
```javascript
useEffect(() => {
  // Faire quelque chose (appel API, mise à jour du DOM, etc.)
  console.log("Effet lancé");
}, [dependencies]);
```

**Exemple useMemo :**
```javascript
const result = useMemo(() => {
  // Calculer et retourner une valeur
  return expensiveOperation();
}, [dependencies]);
```

---

## 8. Quand Utiliser useMemo ?

✅ **Utilise `useMemo` quand :**
- Un calcul est **coûteux** (filtrage d'une grosse liste, calcul mathématique complexe, etc.)
- Tu veux **éviter les recalculs inutiles**
- Tu optimises une **liste filtrée ou triée**
- Tu passes une **valeur complexe à des composants enfants** (pour éviter des re-renders inutiles)

❌ **N'utilise PAS `useMemo` si :**
- Le calcul est **simple et rapide** (React est déjà optimisé)
- C'est une **valeur primitive** (nombre, string, booléen)
- Ça complique inutilement le code

---

## 9. Erreurs Fréquentes

### ❌ Erreur 1 : Utiliser `useMemo` partout

```javascript
// MAUVAIS - Inutile
const name = useMemo(() => "Alice", []);
```

C'est de l'over-engineering. React gère déjà ce genre de cas.

### ❌ Erreur 2 : Oublier les dépendances

```javascript
// MAUVAIS - Dépendances manquantes
const result = useMemo(() => {
  return count * 2;  // count n'est pas dans le tableau
}, []);  // ← Tableau vide !
```

La valeur ne sera **jamais recalculée**, même si `count` change.

### ❌ Erreur 3 : Penser que ça améliore tout automatiquement

`useMemo` est un **outil d'optimisation**, pas une baguette magique.

---

## 10. Bonnes Pratiques

```javascript
// BON - Utiliser quand c'est nécessaire
const expensiveValue = useMemo(() => {
  console.time("calcul");
  const result = complexCalculation(data);
  console.timeEnd("calcul");
  return result;
}, [data]);

// BON - Toujours inclure les dépendances
const filtered = useMemo(() => {
  return largeList.filter(item => item.category === category);
}, [largeList, category]);  // ← Tous les usages
```

---

## 11. Résumé

| Point | Détail |
|-------|--------|
| **Définition** | Hook qui mémorise une valeur calculée |
| **Utilité** | Éviter des recalculs inutiles |
| **Quand l'utiliser** | Calculs coûteux, listes filtrées/triées |
| **Attention** | Ne pas over-utiliser, toujours inclure les dépendances |
| **Bénéfice** | Amélioration des performances |

---

## 12. Cas d'Usage Courants

### Tri d'une grande liste
```javascript
const sortedItems = useMemo(() => {
  return [...items].sort((a, b) => a.value - b.value);
}, [items, sortOrder]);
```

### Objet complexe stable
```javascript
const config = useMemo(() => {
  return {
    timeout: 5000,
    retries: 3,
    headers: { "Content-Type": "application/json" }
  };
}, []);
```

### Calcul mathématique complexe
```javascript
const fibonacci = useMemo(() => {
  return fib(n);  // Peut être très coûteux
}, [n]);
```

---

## 13. Debugging

Utilise les React DevTools pour vérifier si une valeur est mémorisée :

```javascript
const result = useMemo(() => {
  console.log("Recalcul !");
  return expensiveCalculation();
}, [deps]);
```

Si le log n'apparaît qu'une fois (au premier render) et que tes dépendances ne changent pas, c'est bon ! 🎉

---

**Version créée :** 2026-05-01
