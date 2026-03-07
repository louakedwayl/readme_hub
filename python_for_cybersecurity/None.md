# `None` en Python — L'équivalent de `NULL` en C

## C'est quoi `None` ?

`None` est la valeur qui représente **l'absence de valeur** en Python. C'est l'équivalent de `NULL` en C, `null` en JavaScript, `nil` en Ruby.

```python
x = None
print(x)       # None
print(type(x)) # <class 'NoneType'>
```

`None` est un objet de type `NoneType`. Il n'existe qu'**un seul** `None` en mémoire — c'est un **singleton**.

## `None` vs `NULL` (C) vs `null` (JS)

| Langage | Mot-clé | Signification |
|---|---|---|
| C | `NULL` | Pointeur vers l'adresse 0 (macro, vaut `0`) |
| JavaScript | `null` | Absence intentionnelle de valeur |
| Python | `None` | Absence de valeur, objet singleton |

Différence clé : en C, `NULL` est juste `0`. En Python, `None` est un **vrai objet** avec son propre type.

```python
type(None)   # <class 'NoneType'>
```

## Comment vérifier `None`

### La bonne façon : `is`

```python
x = None

if x is None:
    print("x est None")

if x is not None:
    print("x a une valeur")
```

### La mauvaise façon : `==`

```python
# Fonctionne, mais à éviter
if x == None:
    print("mauvaise pratique")
```

**Pourquoi ?** `is` vérifie l'**identité** (même objet en mémoire). Comme `None` est un singleton, c'est la vérification la plus fiable. `==` vérifie l'**égalité**, qui peut être redéfinie par des classes custom :

```python
class Piege:
    def __eq__(self, other):
        return True  # dit "oui" à tout

p = Piege()
p == None     # True  ← mensonge
p is None     # False ← vérité
```

**Règle absolue :** Toujours utiliser `is None` et `is not None`.

## Quand est-ce qu'on obtient `None` ?

### 1. Assignation explicite

```python
x = None
```

### 2. Fonction sans `return`

```python
def foo():
    print("hello")

result = foo()
print(result)   # None
```

Si une fonction ne retourne rien, elle retourne `None` par défaut.

### 3. `return` sans valeur

```python
def bar():
    return

result = bar()
print(result)   # None
```

### 4. Valeur par défaut de paramètre

```python
def greet(name=None):
    if name is None:
        print("Hello, stranger")
    else:
        print(f"Hello, {name}")
```

C'est un pattern très courant en Python pour signifier "pas d'argument fourni".

## `None` est falsy

`None` est évalué comme `False` dans un contexte booléen :

```python
if None:
    print("jamais atteint")
else:
    print("None est falsy")

bool(None)  # False
```

Mais **attention** — d'autres valeurs sont aussi falsy :

```python
bool(0)      # False
bool("")     # False
bool([])     # False
bool(None)   # False
```

C'est pour ça qu'on utilise `is None` et pas `if not x` — sinon tu confonds `None` avec `0`, `""`, `[]`, etc.

```python
x = 0

if not x:
    print("déclenché")  # déclenché — mais x n'est pas None !

if x is None:
    print("pas déclenché")  # correct — x est 0, pas None
```

## `None` dans les comparaisons

```python
None == None     # True
None is None     # True
None == False    # False  ← None n'est PAS False
None == 0        # False  ← None n'est PAS 0
None == ""       # False  ← None n'est PAS une string vide
```

`None` n'est égal qu'à lui-même. Il ne vaut ni `0`, ni `False`, ni `""`.

## Résumé

| Concept | Détail |
|---|---|
| Type | `NoneType` |
| Singleton | Un seul `None` existe en mémoire |
| Vérification | Toujours `is None` / `is not None` |
| Valeur booléenne | Falsy (`bool(None)` → `False`) |
| Retour par défaut | Fonction sans `return` → `None` |
| Équivalent C | `NULL` (mais `NULL` = `0`, `None` = objet) |
