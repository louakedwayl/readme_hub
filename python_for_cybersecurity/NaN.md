# Détecter `NaN` — La valeur qui n'est pas égale à elle-même

## C'est quoi `NaN` ?

`NaN` signifie **Not a Number** (pas un nombre). C'est une valeur spéciale à virgule flottante définie par le standard IEEE 754. Elle représente un résultat numérique indéfini ou non représentable.

```python
nan = float("NaN")
print(nan)       # nan
print(type(nan)) # <class 'float'>
```

`NaN` est un `float`. Pas `None`. Pas `0`. Pas `False`. Un float.

## Comment créer un `NaN`

```python
float("NaN")          # depuis une string
float("nan")          # insensible à la casse

import math
math.nan              # constante

# Résultats d'opérations invalides
float("inf") - float("inf")   # nan
0 * float("inf")              # nan
```

## La propriété clé : `NaN != NaN`

`NaN` est la **seule** valeur en Python qui n'est pas égale à elle-même :

```python
nan = float("NaN")

nan == nan     # False  ← comportement unique
nan != nan     # True

# Compare avec tout le reste :
None == None   # True
0 == 0         # True
"" == ""       # True
False == False # True
```

Ce n'est pas un bug. C'est voulu par la spécification IEEE 754.

## Méthodes de détection

### Méthode 1 : `math.isnan()`

```python
import math

math.isnan(float("NaN"))  # True
math.isnan(42)             # False
math.isnan(0.0)            # False
```

**Limitation :** N'accepte que `float` ou `int`. Passer `None`, `str` ou `bool` lève une `TypeError`.

```python
math.isnan(None)    # TypeError
math.isnan("hello") # TypeError
```

### Méthode 2 : `x != x` (aucun import nécessaire)

```python
nan = float("NaN")

nan != nan     # True  → c'est NaN
42 != 42       # False → pas NaN
None != None   # False → pas NaN
```

C'est la manière la plus propre quand tu ne peux pas ou ne veux pas importer `math`. Seul `NaN` renvoie `True` pour `x != x`.

## NaN dans les comparaisons

Toute comparaison avec `NaN` renvoie `False` (sauf `!=`) :

```python
nan = float("NaN")

nan > 0      # False
nan < 0      # False
nan >= 0     # False
nan == 0     # False
nan == nan   # False

nan != 0     # True
nan != nan   # True
```

## Quand l'utiliser

- Utilise `math.isnan()` quand tu sais que la valeur est numérique et que tu veux un code explicite et lisible.
- Utilise `x != x` quand tu as besoin d'une vérification rapide sans import, ou quand la valeur n'est pas forcément numérique (évite `TypeError`).
- Dans le contexte de détection de types null : vérifie `NaN` en confirmant que le type est `float` **et** que `x != x`.
