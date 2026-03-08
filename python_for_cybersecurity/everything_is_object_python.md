# Tout est objet en Python

---

## 1. Le concept fondamental

En Python, **absolument tout est un objet** : les entiers, les strings, les fonctions, les classes elles-mêmes.

Un objet, c'est une entité qui possède :
- Une **valeur**
- Un **type**
- Une **identité** (adresse mémoire unique)

---

## 2. Vérification avec `type()` et `id()`

```python
x = 42
print(type(x))   # <class 'int'>
print(id(x))     # adresse mémoire, ex: 140456789

print(type("hello"))   # <class 'str'>
print(type([1, 2, 3])) # <class 'list'>
print(type(None))      # <class 'NoneType'>
```

Même `None`, `True`, `False` sont des objets.

---

## 3. Les fonctions sont des objets

```python
def ma_fonction():
    return 42

print(type(ma_fonction))  # <class 'function'>
print(id(ma_fonction))    # une adresse mémoire
```

Tu peux :
- Assigner une fonction à une variable
- La passer en argument
- La retourner depuis une autre fonction

```python
a = ma_fonction   # pas d'appel, juste une référence
print(a())        # 42
```

---

## 4. Les classes sont des objets

```python
class MaClasse:
    pass

print(type(MaClasse))  # <class 'type'>
```

Une classe est une instance de `type`. `type` est lui-même un objet.

---

## 5. La méthode `__class__`

Chaque objet connaît sa propre classe :

```python
x = 42
print(x.__class__)        # <class 'int'>

texte = "hello"
print(texte.__class__)    # <class 'str'>
```

---

## 6. `isinstance()` — vérifier l'héritage

```python
print(isinstance(42, int))     # True
print(isinstance(42, object))  # True — TOUT hérite de object
print(isinstance("hi", object)) # True
```

En Python, **toutes les classes héritent de `object`** implicitement.

```python
class MaClasse:
    pass

print(isinstance(MaClasse(), object))  # True
```

---

## 7. Résumé

| Élément | Type |
|---|---|
| `42` | `<class 'int'>` |
| `"hello"` | `<class 'str'>` |
| `[1, 2]` | `<class 'list'>` |
| `None` | `<class 'NoneType'>` |
| `True` | `<class 'bool'>` |
| `ma_fonction` | `<class 'function'>` |
| `MaClasse` | `<class 'type'>` |

**Règle absolue :** si tu peux faire `type()` ou `id()` dessus → c'est un objet.
