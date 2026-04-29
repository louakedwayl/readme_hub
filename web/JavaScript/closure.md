# Closures en JavaScript

## 1. Définition

Une closure est une fonction qui garde accès aux variables de son contexte de création, même lorsque ce contexte n'est plus actif.

## 2. Principe

Quand une fonction est créée en JavaScript :

- Elle capture les variables accessibles à ce moment-là
- Elle conserve ces variables en mémoire
- Elle peut les utiliser plus tard, même hors de leur scope initial

## 3. Fonctionnement

Une closure est composée de :

- Une fonction
- Un environnement lexical — les variables disponibles au moment de sa création

## 4. Caractéristique principale

- Une closure conserve les variables de son scope d'origine
- Même si la fonction extérieure a terminé son exécution
- Ces variables restent accessibles tant que la fonction existe

## 5. Portée lexicale

Les closures reposent sur la portée lexicale :

- Les variables sont définies selon l'endroit où le code est **écrit**
- Pas selon l'endroit où il est **exécuté**

## 6. Cycle de vie

1. Une fonction est créée
2. Elle capture son environnement
3. Elle est stockée ou transmise
4. Elle est exécutée plus tard
5. Elle continue d'utiliser les variables capturées

## 7. Propriétés importantes

- Les variables capturées ne sont pas copiées — la closure capture le **binding** (l'identifiant lexical), pas la valeur
- Les modifications sur ces variables sont visibles dans la closure
- Chaque instance de fonction a son propre environnement lexical
- Une closure qui retient une grosse structure **bloque le garbage collector** → risque de memory leak

## 8. Exemple canonique — Encapsulation

```js
const createCounter = () => {
  let count = 0;
  return {
    inc: () => ++count,
    dec: () => --count,
    get: () => count,
  };
};

const counter = createCounter();
counter.inc(); // 1
counter.inc(); // 2
counter.get(); // 2
// `count` est inaccessible depuis l'extérieur — encapsulation pure
```

## 9. Piège classique : `var` vs `let` en boucle

```js
// var → une seule variable partagée par toutes les itérations
for (var i = 0; i < 3; i++) {
  setTimeout(() => console.log(i), 0);
}
// Output : 3, 3, 3

// let → un binding distinct par itération
for (let i = 0; i < 3; i++) {
  setTimeout(() => console.log(i), 0);
}
// Output : 0, 1, 2
```

**Explication** : `var` a un scope de fonction, donc toutes les closures référencent la même variable `i`. `let` a un scope de bloc, donc chaque itération crée un nouveau binding capturé indépendamment.

Question d'entretien JavaScript standard.

## 10. Closures et `this`

```js
const obj = {
  name: "Wayl",
  // Fonction classique : `this` dynamique, perdu dans les callbacks
  greetClassic: function () {
    setTimeout(function () {
      console.log(this.name); // undefined
    }, 0);
  },
  // Arrow function : pas de `this` propre, capture celui du scope parent
  greetArrow: function () {
    setTimeout(() => {
      console.log(this.name); // "Wayl"
    }, 0);
  },
};
```

**Règle** : les arrow functions capturent lexicalement `this`, les fonctions classiques non.

## 11. Stale closure en React

Bug le plus courant en hooks. Une closure capture une version périmée d'un state.

```jsx
function Counter() {
  const [count, setCount] = useState(0);

  useEffect(() => {
    const id = setInterval(() => {
      // `count` est figé à 0 — capturé au mount
      console.log(count);
      setCount(count + 1); // ne dépasse jamais 1
    }, 1000);
    return () => clearInterval(id);
  }, []); // dépendances vides → closure jamais mise à jour
}
```

**Solutions** :

```jsx
// 1. Ajouter la dépendance (recrée l'effet à chaque update)
useEffect(() => { /* ... */ }, [count]);

// 2. Functional update (lit la valeur fraîche)
setCount(prev => prev + 1);

// 3. useRef pour valeur mutable
const countRef = useRef(count);
countRef.current = count;
```

## 12. Utilité

Les closures sont utilisées pour :

- Maintenir un état interne
- Encapsuler des données (alternative aux classes)
- Créer des fonctions spécialisées (currying, partial application)
- Gérer des callbacks et des événements
- Implémenter des modules privés

## 13. Points importants

- Une closure n'est **pas** une feature React
- C'est un mécanisme **natif** de JavaScript
- Elle est omniprésente dans les fonctions, hooks et callbacks
- Mauvaise compréhension = bugs silencieux en prod

## Résumé

| Concept              | Détail                                                |
| -------------------- | ----------------------------------------------------- |
| Closure              | Fonction + environnement lexical                      |
| Variables capturées  | Binding référencé, pas valeur copiée                  |
| Persistance          | Survit à la fin de la fonction parente                |
| Portée               | Lexicale — définie à l'écriture du code               |
| `var` vs `let`       | `var` partage le binding, `let` en crée un par bloc   |
| `this`               | Capturé lexicalement uniquement par les arrow fns     |
| Piège React          | Stale closure si dépendances mal gérées dans `useEffect` |
| Memory leak          | Closure retenant une grosse structure bloque le GC    |
| Usage                | État interne, encapsulation, callbacks, modules       |
