# Les conversions de type en Python

## Définition

Une **conversion de type** consiste à transformer une valeur d'un type vers un autre type à l'aide d'une fonction.

```python
x = "42"
y = int(x)  # str → int
```

## Pourquoi convertir ?

- Faire un calcul avec un nombre écrit sous forme de texte
- Transformer un nombre en texte pour l'afficher
- Convertir un entier en nombre décimal

## Les fonctions de conversion

### `int()` — vers entier

```python
x = "42"
y = int(x)
print(y)         # 42
print(type(y))   # <class 'int'>
```

### `float()` — vers nombre à virgule

```python
x = "3.14"
y = float(x)
print(y)         # 3.14
print(type(y))   # <class 'float'>
```

### `str()` — vers texte

```python
x = 42
y = str(x)
print(y)         # 42
print(type(y))   # <class 'str'>
```

### `bool()` — vers booléen

```python
print(bool(1))          # True
print(bool(0))          # False
print(bool("bonjour"))  # True
print(bool(""))         # False
```

Règle : une valeur "vide" donne `False`, une valeur "non vide" donne `True`.

## Conversions courantes

| De       | Vers    | Exemple                        | Résultat |
|----------|---------|--------------------------------|----------|
| `str`    | `int`   | `int("21")`                    | `21`     |
| `str`    | `float` | `float("19.99")`               | `19.99`  |
| `int`    | `str`   | `str(10)`                      | `"10"`   |
| `int`    | `float` | `float(10)`                    | `10.0`   |
| `float`  | `int`   | `int(3.9)`                     | `3`      |

**Attention :** `int()` ne fait pas un arrondi. Il enlève la partie décimale.

## Conversions impossibles

Toutes les conversions ne sont pas possibles :

```python
int("bonjour")  # Erreur
float("abc")    # Erreur
```

Si la valeur ne représente pas un nombre, Python lève une erreur.

## Cas pratique : `sys.argv`

Les arguments reçus via `sys.argv` sont toujours des `str` :

```python
import sys

n = int(sys.argv[1])
print(n + 1)
```

```bash
python3 test.py 42
# Résultat : 43
```

## Différence avec le C

En C, on parle de **cast**. En Python, on parle de **conversion de type** car on utilise des fonctions (`int()`, `float()`, `str()`, `bool()`).

## Résumé

```python
int("42")      # 42
float("3.14")  # 3.14
str(42)        # "42"
bool(0)        # False
```
