# React — L'immutabilité du state

## Le principe

En React, **on ne modifie jamais directement le state**. On le **remplace** par une nouvelle valeur.

La raison : React compare les **références** (l'adresse en mémoire), pas le contenu. Si tu mutes l'objet existant, la référence reste identique → React ne détecte rien → pas de re-render.

---

## Les types primitifs (nombres, strings, booléens)

Aucun problème. Ils sont immutables par nature.

```jsx
const [count, setCount] = useState(0)

setCount(count + 1)           // ✅ OK
setCount(prev => prev + 1)    // ✅ Mieux (voir plus bas)
```

---

## Les objets

**Interdit :**
```jsx
person.age = 19           // ❌ Mutation directe
setPerson(person)         // ❌ Même référence
```

**Correct — spread operator :**
```jsx
setPerson({ ...person, age: person.age + 1 })
```

Le `...person` copie toutes les propriétés dans un **nouvel objet**. La clé `age` écrase l'ancienne. Nouvelle référence → React re-render.

---

## Les tableaux

**Interdit :**
```jsx
items.push(nouveau)       // ❌ Mutation
items[0] = modifié        // ❌ Mutation
items.sort()              // ❌ Mutation
```

**Correct :**

| Action | Pattern |
|---|---|
| Ajouter | `setItems([...items, nouveau])` |
| Supprimer | `setItems(items.filter(i => i.id !== id))` |
| Modifier | `setItems(items.map(i => i.id === id ? {...i, ...changes} : i))` |
| Trier | `setItems([...items].sort())` |

Règle : utilise les méthodes qui **retournent un nouveau tableau** (`map`, `filter`, `concat`, spread), jamais celles qui mutent (`push`, `pop`, `splice`, `sort`, `reverse`).

---

## Les objets imbriqués

Le spread est **superficiel** (shallow). Pour modifier un niveau profond, il faut spread chaque niveau :

```jsx
const [user, setUser] = useState({
  name: 'Wayl',
  address: { city: 'Paris', zip: '75014' }
})

// Modifier la ville
setUser({
  ...user,
  address: { ...user.address, city: 'Dubai' }
})
```

---

## Updater function — le pattern robuste

Quand le nouveau state dépend de l'ancien, passe une **fonction** à `setState` au lieu d'une valeur :

```jsx
setCount(prev => prev + 1)
setPerson(prev => ({ ...prev, age: prev.age + 1 }))
setItems(prev => [...prev, nouveau])
```

**Pourquoi :** React garantit que `prev` est la valeur la plus récente. Sans ça, tu lis une valeur figée dans la closure du render, ce qui casse les updates multiples rapprochés.

⚠️ Note la syntaxe `prev => ({ ... })` avec parenthèses autour de l'objet. Sans les parenthèses, `{}` est interprété comme un bloc de fonction, pas comme un objet.

---

## Résumé

1. **Jamais de mutation directe** du state.
2. **Spread** pour copier, puis override les clés à modifier.
3. **map / filter** pour les tableaux, jamais push / splice.
4. **Spread récursif** pour les objets imbriqués.
5. **Updater function** (`prev => ...`) quand le nouveau state dépend de l'ancien.

Maîtrise ces cinq points, tu élimines 80% des bugs React des débutants.
