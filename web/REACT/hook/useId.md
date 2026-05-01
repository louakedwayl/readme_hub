# useId — Cours React

## 1. C'est quoi `useId` ?

`useId` est un hook React qui sert à générer des identifiants **uniques et stables** entre le serveur et le client. Il a été introduit pour résoudre un problème fréquent avec le SSR (Server-Side Rendering) :

➡️ **éviter les différences d'IDs entre le rendu serveur et le rendu client.**

---

## 2. Pourquoi on en a besoin ?

Avant `useId`, on utilisait souvent :
- `Math.random()`
- des compteurs globaux
- des librairies externes (uuid)

**Problèmes :**
- ❌ pas stable entre serveur et client
- ❌ risque d'hydratation mismatch (React hydrate un DOM différent)
- ❌ difficile à maintenir

---

## 3. Syntaxe

```jsx
import { useId } from "react";

function MyComponent() {
  const id = useId();
  
  return (
    <div>
      <label htmlFor={id}>Email</label>
      <input id={id} type="email" />
    </div>
  );
}
```

---

## 4. Comment ça marche ?

`useId()` génère une string unique du type :
```
:r0:
```
ou
```
:r1:
```

React garantit que :
- le même composant aura toujours le même id
- l'ID sera identique entre serveur et client

---

## 5. Cas d'utilisation principaux

### 1. Accessibilité (le plus important)

Associer un label à un input :

```jsx
const id = useId();

<label htmlFor={id}>Password</label>
<input id={id} type="password" />
```

### 2. Composants réutilisables

Si tu as plusieurs composants identiques :

```jsx
function Checkbox({ label }) {
  const id = useId();
  
  return (
    <div>
      <input id={id} type="checkbox" />
      <label htmlFor={id}>{label}</label>
    </div>
  );
}
```

Chaque instance aura un ID différent automatiquement.

### 3. Accessibilité avancée (aria)

```jsx
const id = useId();

<div>
  <button aria-describedby={id}>Info</button>
  <p id={id}>Texte d'aide</p>
</div>
```

---

## 6. Ce que `useId` ne fait PAS

- ❌ ce n'est pas un `key` pour les listes
- ❌ ce n'est pas un identifiant de base de données
- ❌ ce n'est pas un générateur de UUID global

---

## 7. Différence avec useRef ou Math.random

| Méthode | Stable SSR | Recommandé |
|---------|-----------|-----------|
| `useId` | oui | ✅ oui |
| `useRef` | oui (client seulement) | ⚠️ limité |
| `Math.random()` | non | ❌ non |

---

## 8. Règles importantes

- ✅ Toujours utiliser `useId` pour les IDs liés au DOM
- ❌ Ne pas utiliser pour identifier des données métier
- ✅ Peut être utilisé plusieurs fois dans un composant sans problème

---

## 9. Résumé

`useId` sert à :
- générer des IDs uniques
- garantir la compatibilité SSR
- améliorer l'accessibilité
- éviter les collisions entre composants

---

## 10. À retenir

👉 **Si tu dois lier un `label` à un `input`, ou gérer des attributs ARIA → `useId` est la solution standard React.**
