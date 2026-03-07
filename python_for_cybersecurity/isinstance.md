# `isinstance()` — Vérifier si un objet appartient à un type

## Ce que ça fait

`isinstance()` renvoie `True` si l'objet est une instance du type donné (ou de l'une de ses classes parentes).

## Syntaxe

```python
isinstance(objet, classinfo)
```

- `objet` — la valeur à vérifier.
- `classinfo` — un type, ou un **tuple** de types.

## Exemples de base

```python
isinstance(42, int)          # True
isinstance(3.14, float)      # True
isinstance("hello", str)     # True
isinstance(None, type(None)) # True
isinstance([1, 2], list)     # True
```

## Vérifier plusieurs types en une fois

Passe un tuple de types en second argument :

```python
isinstance(42, (int, float))      # True
isinstance("hi", (int, str))      # True
isinstance(None, (int, str))      # False
```

## Le piège `bool` / `int`

C'est LE point le plus important à comprendre :

```python
isinstance(True, bool)   # True
isinstance(True, int)    # True  ← DANGER
isinstance(False, int)   # True  ← DANGER
```

**Pourquoi ?** `bool` est une sous-classe de `int` en Python. `True` vaut littéralement `1` et `False` vaut littéralement `0` sous le capot.

```python
True + True    # 2
False + 10     # 10
True == 1      # True
False == 0     # True
```

**Conséquence :** Si tu vérifies `isinstance(x, int)` en premier, `True` et `False` matcheront. Il faut toujours vérifier `bool` **avant** `int`.

```python
# MAUVAIS ordre
def check(x):
    if isinstance(x, int):    # attrape aussi bool !
        print("int")
    elif isinstance(x, bool):  # jamais atteint
        print("bool")

# BON ordre
def check(x):
    if isinstance(x, bool):   # vérifier bool d'abord
        print("bool")
    elif isinstance(x, int):  # puis int
        print("int")
```

## `isinstance()` vs `type()`

```python
x = False

# isinstance respecte l'héritage
isinstance(x, int)    # True (bool hérite de int)

# type() est strict
type(x) is int        # False (le type exact est bool, pas int)
```

## Quand l'utiliser

- Utilise `isinstance()` pour une vérification de type **générale** — ça gère l'héritage.
- Utilise `type() is` pour une correspondance **exacte** quand l'héritage doit être exclu.
- Vérifie toujours les **types les plus spécifiques en premier** (`bool` avant `int`, sous-classe avant classe parente).
