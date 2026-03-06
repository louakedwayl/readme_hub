# Les Sets en Python

## C'est quoi ?

Un set est une **collection non ordonnée, sans doublons, et mutable**.  
Inspiré directement de la **théorie des ensembles** en mathématiques.

```python
fruits = {"pomme", "banane", "cerise"}
vide = set()          # PAS {} — ça crée un dict vide
nombres = {1, 2, 3, 3, 2}  # → {1, 2, 3} : doublons supprimés automatiquement
```

---

## Les bases

```python
s = {"a", "b", "c"}

# Ajout / suppression
s.add("d")        # {"a", "b", "c", "d"}
s.remove("a")     # erreur si absent
s.discard("z")    # silencieux si absent

# Vérification
"b" in s          # True  ← très rapide (O(1))

# Taille
len(s)            # 3

# Itération (ordre non garanti)
for x in s:
    print(x)
```

---

## Opérations ensemblistes

C'est là que le set devient puissant.

```python
A = {1, 2, 3, 4}
B = {3, 4, 5, 6}

# Union : tous les éléments
A | B             # {1, 2, 3, 4, 5, 6}
A.union(B)

# Intersection : éléments communs
A & B             # {3, 4}
A.intersection(B)

# Différence : dans A mais pas dans B
A - B             # {1, 2}
A.difference(B)

# Différence symétrique : dans l'un OU l'autre, pas les deux
A ^ B             # {1, 2, 5, 6}
A.symmetric_difference(B)

# Sous-ensemble / sur-ensemble
{1, 2}.issubset(A)    # True
A.issuperset({1, 2})  # True
```

---

## Set vs List vs Dict

| | Set `{}` | Liste `[]` | Dict `{}` |
|---|---|---|---|
| Ordonné | ❌ | ✅ | ✅ (Python 3.7+) |
| Doublons | ❌ | ✅ | Clés uniques |
| Accès par index | ❌ | ✅ | Par clé |
| Recherche (`in`) | O(1) | O(n) | O(1) |
| Mutable | ✅ | ✅ | ✅ |

---

## Comparaison avec les autres langages

### JavaScript
JS a `Set` depuis ES6 — syntaxe quasi identique.

```js
const s = new Set(["a", "b", "c", "a"]);  // → {"a", "b", "c"}

s.add("d");
s.has("b");      // true  (équivalent de `in`)
s.delete("a");
s.size;          // 3

// Pas d'opérateurs natifs |, &, -
// Faut les implémenter manuellement
const union = new Set([...A, ...B]);
const inter = new Set([...A].filter(x => B.has(x)));
```

**Différence clé** : Python a des opérateurs dédiés (`|`, `&`, `-`, `^`).  
JS oblige à reconstruire ces opérations manuellement.

---

### C
C n'a pas de set natif.  
L'équivalent standard : une **table de hachage** (`unordered_set` en C++).

```c
// En C pur → pas de set. On utilise des tableaux triés + recherche binaire,
// ou des bibliothèques tierces (GLib : g_hash_table).

// En C++ (STL) :
#include <unordered_set>
std::unordered_set<int> s = {1, 2, 3};
s.insert(4);
s.count(2);   // 1 si présent, 0 sinon
```

**À retenir** : le set Python est implémenté comme une hash table en C sous le capot — même concept, syntaxe exposée à un niveau plus haut.

---

### PHP
PHP n'a pas de set natif non plus.  
Le pattern habituel : utiliser les **clés d'un tableau associatif** (toujours uniques).

```php
// Simuler un set avec les clés
$set = array_flip(["pomme", "banane", "cerise"]);
// → ["pomme" => 0, "banane" => 1, "cerise" => 2]

isset($set["banane"]);  // true  — O(1)

// Union
$union = array_keys($set1 + $set2);

// Intersection
$inter = array_keys(array_intersect_key($set1, $set2));
```

C'est verbeux et contre-intuitif — PHP force à contourner l'absence de type dédié.

---

## Cas d'usage concrets

```python
# 1. Dédupliquer une liste instantanément
liste = [1, 2, 2, 3, 3, 3, 4]
unique = list(set(liste))   # [1, 2, 3, 4]

# 2. Tester l'appartenance à grande échelle (O(1) vs O(n))
mots_interdits = {"spam", "pub", "promo"}
if mot in mots_interdits:   # rapide même avec 1M d'entrées
    ...

# 3. Trouver les éléments communs entre deux sources
admins_db = {"alice", "bob", "charlie"}
admins_ldap = {"bob", "charlie", "dave"}
communs = admins_db & admins_ldap   # {"bob", "charlie"}

# 4. Trouver ce qui a changé
anciens = {"alice", "bob"}
nouveaux = {"bob", "charlie"}
ajoutes  = nouveaux - anciens   # {"charlie"}
supprimes = anciens - nouveaux  # {"alice"}
```

---

## Frozenset : le set immuable

Comme le tuple pour les listes, `frozenset` est la version **immuable et hashable** du set.

```python
fs = frozenset({1, 2, 3})
fs.add(4)   # ❌ AttributeError

# Utilité : peut servir de clé de dictionnaire
cache = {}
cache[frozenset({1, 2})] = "résultat"  # ✅
```

---

## Résumé

- Set = collection **sans ordre, sans doublons, recherche O(1)**
- Opérateurs `|`, `&`, `-`, `^` : puissance unique par rapport à JS/PHP/C
- JS a `Set` mais sans opérateurs natifs
- C/PHP n'ont pas de type natif — on simule avec des hash maps
- Cas d'usage principal : **déduplication**, **tests d'appartenance rapides**, **opérations ensemblistes**
