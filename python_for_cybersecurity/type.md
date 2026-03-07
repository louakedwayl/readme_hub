# `type()` — Identifier le type de n'importe quel objet

## Ce que ça fait

`type()` renvoie la classe/le type d'un objet. Chaque valeur en Python possède un type.

## Syntaxe

```python
type(objet)
```

Renvoie un objet `<class 'X'>`.

## Exemples de base

```python
type(None)        # <class 'NoneType'>
type(42)          # <class 'int'>
type(3.14)        # <class 'float'>
type("hello")     # <class 'str'>
type(True)        # <class 'bool'>
type([1, 2])      # <class 'list'>
type({"a": 1})    # <class 'dict'>
```

## Comparer des types

```python
# Comparaison directe avec 'is'
type(42) is int          # True
type("hi") is str        # True
type(None) is type(None) # True

# == fonctionne aussi, mais 'is' est préféré pour les vérifications de type
type(False) == bool      # True
```

## Piège : `bool` est une sous-classe de `int`

```python
type(True)   # <class 'bool'>  — pas int
type(1)      # <class 'int'>

# Mais :
isinstance(True, int)  # True — car bool hérite de int
type(True) is int      # False — type() est strict
```

Cette distinction est importante quand on doit différencier `False`/`True` de `0`/`1`.

## `type()` vs `isinstance()`

| Expression | `type(x) is T` | `isinstance(x, T)` |
|---|---|---|
| `x = True` | `type(x) is bool` → True | `isinstance(x, bool)` → True |
| `x = True` | `type(x) is int` → **False** | `isinstance(x, int)` → **True** |

`type()` vérifie le type exact. `isinstance()` respecte l'héritage.

## Quand l'utiliser

- Utilise `type()` quand tu as besoin du type **exact** d'un objet.
- Utilise `type(x) is T` quand tu veux une correspondance stricte sans héritage.
- Préfère `isinstance()` pour les vérifications de type générales dans la plupart du code.
