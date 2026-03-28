# Les opérateurs en Python

## 1. Définition

Un opérateur est un symbole ou un mot-clé qui effectue une opération sur une ou plusieurs valeurs (appelées **opérandes**).

```python
x + y
```

Ici, `+` est l'opérateur, `x` et `y` sont les opérandes.

Python possède plusieurs catégories d'opérateurs. Ce cours les couvre toutes.

---

## 2. Opérateurs arithmétiques

Ils effectuent des calculs mathématiques.

| Opérateur | Nom | Exemple | Résultat |
|-----------|-----|---------|----------|
| `+` | Addition | `7 + 3` | `10` |
| `-` | Soustraction | `7 - 3` | `4` |
| `*` | Multiplication | `7 * 3` | `21` |
| `/` | Division | `7 / 3` | `2.3333...` |
| `//` | Division entière | `7 // 3` | `2` |
| `%` | Modulo | `7 % 3` | `1` |
| `**` | Puissance | `2 ** 10` | `1024` |

Points importants :

- `/` renvoie toujours un `float`, même si le résultat est entier : `6 / 3` donne `2.0`
- `//` tronque vers le bas (floor division) : `-7 // 2` donne `-4`, pas `-3`
- `%` suit le signe du diviseur en Python : `-7 % 3` donne `2`

---

## 3. Opérateurs de comparaison

Ils comparent deux valeurs et renvoient un booléen (`True` ou `False`).

| Opérateur | Signification | Exemple | Résultat |
|-----------|---------------|---------|----------|
| `==` | Égal à | `5 == 5` | `True` |
| `!=` | Différent de | `5 != 3` | `True` |
| `>` | Strictement supérieur | `5 > 3` | `True` |
| `<` | Strictement inférieur | `5 < 3` | `False` |
| `>=` | Supérieur ou égal | `5 >= 5` | `True` |
| `<=` | Inférieur ou égal | `3 <= 5` | `True` |

Python autorise le **chaînage** des comparaisons :

```python
x = 5
print(1 < x < 10)    # True
print(1 < x < 3)     # False
print(1 <= x <= 5)    # True
```

C'est équivalent à `1 < x and x < 10`, mais plus lisible.

---

## 4. Opérateurs d'affectation

Ils assignent une valeur à une variable, avec possibilité de combiner une opération.

| Opérateur | Équivalent à | Exemple |
|-----------|-------------|---------|
| `=` | — | `x = 5` |
| `+=` | `x = x + 3` | `x += 3` |
| `-=` | `x = x - 3` | `x -= 3` |
| `*=` | `x = x * 3` | `x *= 3` |
| `/=` | `x = x / 3` | `x /= 3` |
| `//=` | `x = x // 3` | `x //= 3` |
| `%=` | `x = x % 3` | `x %= 3` |
| `**=` | `x = x ** 3` | `x **= 3` |

Ces opérateurs modifient la variable en place (pour les types mutables) ou la réassignent (pour les types immutables comme `int` et `str`).

---

## 5. Opérateurs logiques

Ils combinent des expressions booléennes.

| Opérateur | Signification | Exemple | Résultat |
|-----------|---------------|---------|----------|
| `and` | ET logique | `True and False` | `False` |
| `or` | OU logique | `True or False` | `True` |
| `not` | Négation | `not True` | `False` |

### Évaluation en court-circuit

Python n'évalue pas toujours les deux opérandes :

- `and` : si le premier est falsy, le second n'est **jamais évalué**
- `or` : si le premier est truthy, le second n'est **jamais évalué**

```python
x = 0
x != 0 and 10 / x > 2   # False — 10 / x n'est jamais calculé
```

### Valeur de retour réelle

`and` et `or` ne renvoient pas forcément `True` ou `False`. Ils renvoient **la valeur qui a déterminé le résultat**.

```python
print(0 and 42)       # 0 — 0 est falsy, on s'arrête là
print(5 and 42)       # 42 — 5 est truthy, on évalue le second
print(0 or 42)        # 42 — 0 est falsy, on passe au second
print(5 or 42)        # 5 — 5 est truthy, on s'arrête là
print("" or "defaut") # "defaut" — idiome courant pour les valeurs par défaut
```

---

## 6. Opérateurs d'appartenance : `in` et `not in`

### `in`

L'opérateur `in` vérifie si un élément est présent dans un itérable. Il renvoie `True` ou `False`.

```python
print(3 in [1, 2, 3, 4])        # True
print(5 in [1, 2, 3, 4])        # False
print("a" in "abcdef")          # True
print("hello" in "say hello")   # True — sous-chaîne
print(2 in (1, 2, 3))           # True — tuple
print("x" in {"x": 1, "y": 2}) # True — vérifie les clés du dict
```

Points importants :

- Sur une **liste**, un **tuple**, un **set** : `in` vérifie la présence de l'élément
- Sur une **chaîne** : `in` vérifie la présence d'une sous-chaîne (pas seulement un caractère)
- Sur un **dictionnaire** : `in` vérifie la présence parmi les **clés**, pas les valeurs

### `not in`

Inverse de `in`.

```python
print(5 not in [1, 2, 3])   # True
print("z" not in "abcdef")  # True
```

### Performance selon le type

Le temps d'exécution de `in` dépend de la structure de données :

| Structure | Complexité de `in` | Raison |
|-----------|-------------------|--------|
| `list` | O(n) | Parcours séquentiel |
| `tuple` | O(n) | Parcours séquentiel |
| `str` | O(n) | Recherche de sous-chaîne |
| `set` | O(1) en moyenne | Table de hachage |
| `dict` | O(1) en moyenne | Table de hachage sur les clés |

Pour des recherches fréquentes dans un grand volume de données, un `set` ou un `dict` est largement préférable à une `list`.

```python
# Lent — O(n) à chaque vérification
grande_liste = list(range(1000000))
print(999999 in grande_liste)

# Rapide — O(1) en moyenne
grand_set = set(range(1000000))
print(999999 in grand_set)
```

### `in` dans les boucles `for`

Le mot-clé `in` est aussi utilisé dans les boucles `for`, mais avec un sens différent : il sert à **itérer** sur les éléments, pas à tester l'appartenance.

```python
# Itération — pas un test d'appartenance
for x in [1, 2, 3]:
    print(x)

# Test d'appartenance — renvoie un booléen
if 2 in [1, 2, 3]:
    print("trouvé")
```

Ce sont deux usages distincts du même mot-clé.

---

## 7. Opérateurs d'identité : `is` et `is not`

`is` vérifie si deux variables pointent vers le **même objet en mémoire**, pas si elles ont la même valeur.

```python
a = [1, 2, 3]
b = [1, 2, 3]
c = a

print(a == b)   # True — même valeur
print(a is b)   # False — objets différents en mémoire
print(a is c)   # True — même objet
```

### `==` vs `is`

| Opérateur | Vérifie | Utilise |
|-----------|---------|---------|
| `==` | Égalité de **valeur** | La méthode `__eq__` |
| `is` | Identité d'**objet** | Comparaison d'adresse mémoire (`id()`) |

### Cas d'usage légitime de `is`

Le seul cas courant où `is` est recommandé :

```python
x = None
if x is None:
    print("x est None")
```

On utilise `is None` et non `== None` parce que `None` est un **singleton** en Python : il n'en existe qu'un seul en mémoire. `is` est donc plus rapide et plus correct sémantiquement.

### Piège avec les petits entiers

Python met en cache les entiers de -5 à 256 (optimisation interne appelée **integer interning**).

```python
a = 256
b = 256
print(a is b)  # True — même objet en cache

a = 257
b = 257
print(a is b)  # False — objets différents (hors cache)
```

C'est un détail d'implémentation de CPython. Ne jamais utiliser `is` pour comparer des valeurs numériques.

---

## 8. Opérateurs bit à bit (bitwise)

Ils opèrent sur la représentation binaire des entiers.

| Opérateur | Nom | Exemple | Binaire | Résultat |
|-----------|-----|---------|---------|----------|
| `&` | ET | `5 & 3` | `101 & 011` | `1` |
| `\|` | OU | `5 \| 3` | `101 \| 011` | `7` |
| `^` | XOR | `5 ^ 3` | `101 ^ 011` | `6` |
| `~` | NON (complément) | `~5` | `~00000101` | `-6` |
| `<<` | Décalage gauche | `5 << 1` | `101 << 1` | `10` (= `1010`) |
| `>>` | Décalage droite | `5 >> 1` | `101 >> 1` | `2` (= `10`) |

### Utilité

Les opérations bit à bit sont utilisées pour :

- la manipulation de flags et de permissions (comme les permissions Unix)
- les masques de bits
- les algorithmes de hachage et de cryptographie
- les optimisations bas niveau

```python
# Vérifier si un nombre est pair (bit de poids faible = 0)
n = 42
print(n & 1 == 0)  # True — pair

# Multiplier par 2 avec un décalage
print(5 << 1)  # 10
print(5 << 3)  # 40 (5 * 2^3)
```

---

## 9. Priorité des opérateurs

Quand plusieurs opérateurs sont présents dans une expression, Python les évalue dans un ordre précis.

De la plus haute à la plus basse priorité :

| Priorité | Opérateur |
|----------|-----------|
| 1 | `**` |
| 2 | `~`, `+x`, `-x` (unaires) |
| 3 | `*`, `/`, `//`, `%` |
| 4 | `+`, `-` |
| 5 | `<<`, `>>` |
| 6 | `&` |
| 7 | `^` |
| 8 | `\|` |
| 9 | `==`, `!=`, `>`, `<`, `>=`, `<=`, `is`, `in` |
| 10 | `not` |
| 11 | `and` |
| 12 | `or` |

En cas de doute, utiliser des parenthèses. Elles rendent le code explicite et évitent les erreurs.

```python
# Sans parenthèses — ambigu
result = 2 + 3 * 4    # 14, pas 20

# Avec parenthèses — explicite
result = (2 + 3) * 4  # 20
```

---

## 10. Surcharge d'opérateurs (dunder methods)

En Python, les opérateurs sont liés à des méthodes spéciales (appelées **dunder methods** pour "double underscore").

Quand on écrit `a + b`, Python appelle en réalité `a.__add__(b)`.

| Opérateur | Méthode |
|-----------|---------|
| `+` | `__add__` |
| `-` | `__sub__` |
| `*` | `__mul__` |
| `==` | `__eq__` |
| `<` | `__lt__` |
| `in` | `__contains__` |
| `[]` | `__getitem__` |

On peut définir ces méthodes dans ses propres classes pour que les opérateurs fonctionnent avec des objets personnalisés.

```python
class Vecteur:
    def __init__(self, x, y):
        self.x = x
        self.y = y

    def __add__(self, autre):
        return Vecteur(self.x + autre.x, self.y + autre.y)

    def __eq__(self, autre):
        return self.x == autre.x and self.y == autre.y

    def __contains__(self, valeur):
        return valeur == self.x or valeur == self.y

    def __repr__(self):
        return f"Vecteur({self.x}, {self.y})"

a = Vecteur(1, 2)
b = Vecteur(3, 4)
print(a + b)       # Vecteur(4, 6)
print(a == b)       # False
print(2 in a)       # True — appelle a.__contains__(2)
```

L'opérateur `in` appelle `__contains__` sur l'objet de droite. Si `__contains__` n'est pas défini, Python se rabat sur `__iter__` pour parcourir l'objet.

---

## 11. Résumé

- Les opérateurs arithmétiques (`+`, `-`, `*`, `/`, `//`, `%`, `**`) effectuent des calculs
- Les opérateurs de comparaison (`==`, `!=`, `>`, `<`, `>=`, `<=`) renvoient des booléens et sont chaînables
- Les opérateurs logiques (`and`, `or`, `not`) combinent des conditions avec évaluation en court-circuit
- `in` et `not in` testent l'appartenance — avec des performances très différentes selon la structure (O(1) pour `set`/`dict`, O(n) pour `list`)
- `is` teste l'identité d'objet, pas l'égalité de valeur — à utiliser uniquement avec `None`
- Les opérateurs bit à bit manipulent la représentation binaire des entiers
- La priorité des opérateurs détermine l'ordre d'évaluation — les parenthèses lèvent toute ambiguïté
- Tous les opérateurs sont liés à des dunder methods et peuvent être surchargés dans des classes personnalisées
