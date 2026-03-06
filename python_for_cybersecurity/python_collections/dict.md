# Les Dictionnaires en Python

> Prérequis : cours sur le typage dynamique recommandé.

---

## C'est quoi ?

Un dictionnaire est une collection de paires **clé → valeur**, ordonnée (Python 3.7+), mutable, sans doublons de clés.

```python
user = {"nom": "Wayl", "age": 25, "ville": "Paris"}
vide = {}
vide_propre = dict()
```

Chaque clé est **unique**. Si tu réassignes une clé existante, elle est écrasée.

---

## Les bases

```python
user = {"nom": "Wayl", "age": 25, "ville": "Paris"}

# Accès
user["nom"]             # "Wayl"
user.get("age")         # 25
user.get("email", "N/A") # "N/A" — valeur par défaut si clé absente

# Ajout / modification
user["email"] = "w@wayl.dev"
user["age"] = 26        # écrase l'existant

# Suppression
del user["ville"]
user.pop("age")         # retourne la valeur supprimée
user.pop("xyz", None)   # silencieux si absent

# Vérification
"nom" in user           # True  — O(1)
"xyz" in user           # False

# Taille
len(user)               # 2
```

---

## Itération

```python
user = {"nom": "Wayl", "age": 25}

# Clés uniquement (défaut)
for cle in user:
    print(cle)          # "nom", "age"

# Valeurs uniquement
for val in user.values():
    print(val)          # "Wayl", 25

# Clés + valeurs
for cle, val in user.items():
    print(cle, "→", val)

# Récupérer clés / valeurs comme listes
list(user.keys())       # ["nom", "age"]
list(user.values())     # ["Wayl", 25]
list(user.items())      # [("nom", "Wayl"), ("age", 25)]
```

---

## Fusion de dictionnaires

```python
a = {"x": 1, "y": 2}
b = {"y": 99, "z": 3}

# Python 3.9+ — opérateur |
fusion = a | b          # {"x": 1, "y": 99, "z": 3}
                        # b écrase les clés communes

# Python 3.5+ — unpacking
fusion = {**a, **b}     # même résultat

# Mise à jour en place
a.update(b)             # modifie a directement
```

---

## Dict comprehension

```python
nombres = [1, 2, 3, 4, 5]

carres = {n: n**2 for n in nombres}
# {1: 1, 2: 4, 3: 9, 4: 16, 5: 25}

# Avec condition
pairs = {n: n**2 for n in nombres if n % 2 == 0}
# {2: 4, 4: 16}

# Inverser clés et valeurs
original = {"a": 1, "b": 2}
inverse = {v: k for k, v in original.items()}
# {1: "a", 2: "b"}
```

---

## Comparaison avec les autres langages

### JavaScript — Object & Map

JS a deux équivalents : `Object` et `Map`.

```js
// Object — le plus courant, syntaxe proche de Python
const user = { nom: "Wayl", age: 25 };
user.email = "w@wayl.dev";     // ajout
user["age"] = 26;              // modification
delete user.nom;               // suppression
"age" in user;                 // true

// Itération
Object.keys(user);             // ["email", "age"]
Object.values(user);           // [...]
Object.entries(user);          // [["email", ...], ...]

// Fusion (ES2018)
const fusion = { ...a, ...b }; // même logique que **a, **b
```

```js
// Map — plus proche du dict Python
const m = new Map();
m.set("nom", "Wayl");
m.get("nom");           // "Wayl"
m.has("nom");           // true
m.delete("nom");
m.size;                 // longueur

for (const [cle, val] of m) { ... }
```

**Différence clé** : `Map` accepte n'importe quel type comme clé (objet, fonction…).  
`Object` convertit toutes les clés en string.  
Dict Python : les clés doivent être **hashables** (str, int, tuple — pas de list).

---

### C — Pas de dict natif

C n'a pas de dictionnaire. Deux approches courantes :

```c
// 1. Struct — pour des clés connues à l'avance
typedef struct {
    char nom[50];
    int age;
} User;

User u = {"Wayl", 25};
printf("%s", u.nom);

// 2. Hash table manuelle ou via bibliothèque (GLib, uthash)
// Beaucoup plus verbeux — gestion mémoire manuelle
```

C++ introduit `std::unordered_map` :

```cpp
#include <unordered_map>
std::unordered_map<std::string, int> ages;
ages["Wayl"] = 25;
ages["Alice"] = 30;
ages.count("Wayl");   // 1 si présent
```

---

### PHP — Tableau associatif

PHP n'a qu'un seul type de tableau — il fait à la fois list et dict.

```php
$user = ["nom" => "Wayl", "age" => 25];

// Accès
$user["nom"];                    // "Wayl"

// Ajout / modification
$user["email"] = "w@wayl.dev";

// Suppression
unset($user["age"]);

// Vérification
array_key_exists("nom", $user);  // true
isset($user["nom"]);             // true (false si null)

// Itération
foreach ($user as $cle => $val) {
    echo "$cle → $val\n";
}

// Fusion
$fusion = array_merge($a, $b);   // b écrase les clés communes
```

**Différence** : en PHP, le même type `array` gère les listes indexées ET les dicts.  
En Python, `list` et `dict` sont des types distincts — plus propre conceptuellement.

---

## Types valides pour les clés

```python
# ✅ Clés valides — types hashables
d = {
    "string": 1,
    42: 2,
    3.14: 3,
    True: 4,
    (1, 2): 5    # tuple hashable
}

# ❌ Clés invalides — types non hashables
d[[1, 2]] = 6       # TypeError : list non hashable
d[{"a": 1}] = 7     # TypeError : dict non hashable
d[{1, 2}] = 8       # TypeError : set non hashable
```

---

## Méthodes utiles

```python
d = {"a": 1, "b": 2, "c": 3}

# setdefault — ajoute la clé seulement si absente
d.setdefault("d", 0)    # {"a":1, "b":2, "c":3, "d":0}
d.setdefault("a", 99)   # rien ne change — "a" existe déjà

# copy — copie superficielle
d2 = d.copy()

# fromkeys — créer un dict depuis une liste de clés
vide = dict.fromkeys(["a", "b", "c"], 0)
# {"a": 0, "b": 0, "c": 0}

# clear — vider
d.clear()               # {}
```

---

## Nested dict — dicts imbriqués

```python
users = {
    "wayl": {"age": 25, "role": "admin"},
    "alice": {"age": 30, "role": "user"},
}

# Accès
users["wayl"]["role"]           # "admin"

# Accès sécurisé
users.get("bob", {}).get("age") # None — pas d'erreur

# Modification
users["wayl"]["age"] = 26
```

---

## Résumé

| Concept | Résumé |
|---|---|
| Structure | Paires clé → valeur, clés uniques |
| Accès | `d[clé]` ou `d.get(clé)` — O(1) |
| Clés valides | Types hashables uniquement (str, int, tuple…) |
| Ordonné | Oui depuis Python 3.7 (ordre d'insertion) |
| JS équivalent | `Object` (syntaxe proche) ou `Map` (clés arbitraires) |
| C équivalent | Pas de natif — struct ou hash table manuelle |
| PHP équivalent | `array` associatif — fait tout mais moins précis |
| Cas d'usage | Config, cache, comptage, JSON, structures imbriquées |
