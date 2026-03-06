# Le Typage Dynamique en Python

> Prérequis : avoir lu les cours sur les listes, tuples, sets et dicts.

---

## Le problème de base

En C, tu déclares le type explicitement :

```c
int x = 5;
char* name = "Wayl";
```

Le compilateur sait à l'avance ce que contient chaque variable.  
Si tu fais une erreur de type → erreur à la **compilation**.

En Python :

```python
x = 5
name = "Wayl"
```

Pas de déclaration. Pourtant Python sait que `x` est un `int` et `name` est un `str`.  
Comment ?

---

## Le type appartient à l'objet, pas à la variable

En Python, **tout est objet**.  
Quand tu écris `x = 5`, Python fait deux choses :

1. Crée un objet `int` de valeur `5` en mémoire — cet objet **porte son type avec lui**
2. Attache le label `x` à cet objet

La variable est un **pointeur**. Rien de plus.

```python
x = 42
print(type(x))   # <class 'int'>

x = "hello"
print(type(x))   # <class 'str'>  — aucune erreur
```

Le label `x` pointe maintenant vers un autre objet. L'ancien `42` est détruit (garbage collector).

---

## Comment Python devine le type à la création ?

Python lit la **syntaxe littérale** — la forme de ce que tu écris.

| Ce que tu écris | Type créé |
|---|---|
| `42` | `int` |
| `3.14` | `float` |
| `"hello"` | `str` |
| `True` | `bool` |
| `[1, 2, 3]` | `list` |
| `(1, 2, 3)` | `tuple` |
| `{1, 2, 3}` | `set` |
| `{"clé": "val"}` | `dict` |
| `None` | `NoneType` |

Pas de magie — juste de la reconnaissance de forme.

```python
ft_list  = ["Hello", "tata!"]   # [] → list
ft_tuple = ("Hello", "toto!")   # () → tuple
ft_set   = {"Hello", "tutu!"}   # {val} → set
ft_dict  = {"Hello": "titi!"}   # {k:v} → dict
```

---

## Vérifier le type à l'exécution

```python
x = [1, 2, 3]

type(x)              # <class 'list'>
isinstance(x, list)  # True  ← méthode recommandée
isinstance(x, (list, tuple))  # True si l'un ou l'autre
```

---

## Le cas du tuple — subtilité importante

```python
ft_tuple = ("Hello", "toto!")
ft_tuple = ("Hello", "France!")   # est-ce une modification ?
```

**Non.** Tu ne modifies pas le tuple — tu :
1. Crées un **nouvel objet** tuple `("Hello", "France!")` en mémoire
2. Réassignes le label `ft_tuple` vers ce nouvel objet
3. L'ancien tuple est détruit

L'immuabilité du tuple est respectée. La variable a changé de cible, pas l'objet.

```python
ft_tuple = ("Hello", "toto!")
print(id(ft_tuple))   # ex: 140234567890

ft_tuple = ("Hello", "France!")
print(id(ft_tuple))   # adresse différente → objet différent
```

`id()` retourne l'adresse mémoire de l'objet — preuve que c'est un nouvel objet.

---

## Comparaison avec les autres langages

### C — Typage statique
```c
int x = 5;
x = "hello";   // ❌ erreur à la compilation
```
Le type est lié à la **variable**, vérifié avant exécution.

### PHP — Typage dynamique (comme Python)
```php
$x = 42;       // int
$x = "hello";  // string — aucune erreur
$x = [1,2,3];  // array — toujours valide
```
Même comportement que Python. PHP 8+ permet le typage optionnel :
```php
function add(int $a, int $b): int { return $a + $b; }
```

### JavaScript — Typage dynamique (comme Python)
```js
let x = 42;
x = "hello";   // valide
x = [1, 2, 3]; // valide
typeof x;      // "object"  ← attention aux surprises JS
```
JS a TypeScript pour ajouter du typage statique optionnel.

---

## Typage statique optionnel en Python (hints)

Python 3.5+ permet d'**annoter** les types — mais c'est indicatif, pas enforced.

```python
def saluer(nom: str) -> str:
    return f"Bonjour {nom}"

saluer(42)   # aucune erreur à l'exécution — Python ignore les hints
```

Pour forcer la vérification, il faut un outil externe : **mypy**.

```bash
mypy mon_fichier.py   # analyse statique, comme un compilateur C
```

---

## Duck Typing

> *"If it walks like a duck and quacks like a duck, it's a duck."*

Python ne vérifie pas le type — il vérifie si l'objet **supporte l'opération demandée**.

```python
def doubler(x):
    return x * 2

doubler(5)        # 10      — int
doubler("ha")     # "haha"  — str
doubler([1, 2])   # [1, 2, 1, 2]  — list
```

La fonction marche sur n'importe quel type qui supporte `*`. Pas de déclaration nécessaire.  
Si le type ne supporte pas l'opération → erreur à l'**exécution** (pas à la compilation).

---

## Résumé

| Concept | Résumé |
|---|---|
| Typage dynamique | Le type est déterminé à l'exécution, pas à la compilation |
| Type porté par l'objet | La variable est un pointeur — pas un conteneur typé |
| Littéraux | La syntaxe (`[]`, `{}`, `()`) détermine le type créé |
| Immuabilité | S'applique à l'**objet**, pas au label |
| Duck typing | Python vérifie les capacités, pas le type |
| Type hints | Optionnels, non enforced — outil mypy pour la rigueur |
