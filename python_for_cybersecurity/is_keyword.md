# Le mot-clé `is` — Identité vs Égalité

## Ce que ça fait

`is` vérifie si deux variables pointent vers le **même objet en mémoire** (identité). Ça ne vérifie **pas** si elles ont la même valeur (égalité).

```python
a is b    # True si a et b sont le MÊME objet
a == b    # True si a et b ont la MÊME valeur
```

## Exemple de base

```python
a = [1, 2, 3]
b = [1, 2, 3]
c = a

a == b    # True  — même valeur
a is b    # False — objets différents en mémoire

a == c    # True  — même valeur
a is c    # True  — même objet (c pointe vers a)
```

## Résumé `is` vs `==`

| Expression | `==` (égalité) | `is` (identité) |
|---|---|---|
| `[1,2] == [1,2]` | True | False |
| `a = b = [1,2]` puis `a is b` | True | True |
| `None == None` | True | True |
| `"hi" == "hi"` | True | True* |

*Les strings et les petits entiers sont mis en cache (internés) par Python, donc `is` peut renvoyer `True` — mais **ne jamais compter dessus**. C'est un détail d'implémentation.

## Quand utiliser `is`

### 1. Vérifier `None`

C'est le cas d'utilisation principal et le plus important :

```python
x = None

# CORRECT — toujours utiliser 'is' pour None
if x is None:
    print("x est None")

if x is not None:
    print("x a une valeur")

# MAUVAIS — fonctionne mais mauvaise pratique
if x == None:
    print("à éviter")
```

**Pourquoi ?** `None` est un **singleton** — il n'existe qu'un seul objet `None` en Python. `is` vérifie l'identité, ce qui est exactement ce qu'on veut. Utiliser `==` peut être redéfini par des classes custom et produire des résultats inattendus.

### 2. Vérifier `True` / `False` (strict)

```python
x = True

x is True     # True — identité exacte
x is False    # False

1 is True     # False — même valeur, objet différent
0 is False    # False — même valeur, objet différent
1 == True     # True  — l'égalité dit oui
```

### 3. Comparer des types

```python
type(42) is int          # True
type("hi") is str        # True
type(None) is type(None) # True
type(True) is bool       # True
type(True) is int        # False — vérification stricte
```

## Pièges dangereux

### Ne jamais utiliser `is` pour comparer des valeurs

```python
# NE JAMAIS faire ça :
x = 1000
y = 1000
x is y    # Peut être True ou False — dépend des internes de Python

# TOUJOURS faire ça pour comparer des valeurs :
x == y    # True — fiable
```

Python met en cache les entiers de **-5 à 256** et certaines strings. Au-delà de cette plage, le comportement de `is` est imprévisible pour les valeurs.

```python
a = 256
b = 256
a is b     # True (en cache)

a = 257
b = 257
a is b     # False (pas en cache) — ou True dans certains contextes
```

**Règle :** Utilise `is` uniquement pour `None`, `True`, `False`, et les comparaisons de types. Utilise `==` pour tout le reste.

## `is not`

La négation de `is` :

```python
x = 42

x is not None    # True
x is not False   # True

# Équivalent à (mais plus lisible que) :
not (x is None)  # True
```

## Référence rapide

| Cas d'utilisation | Opérateur | Exemple |
|---|---|---|
| Vérifier `None` | `is` | `x is None` |
| Vérifier le type exact | `type() is` | `type(x) is int` |
| Comparer des valeurs | `==` | `x == 42` |
| Vérifier l'appartenance à une classe | `isinstance()` | `isinstance(x, int)` |
