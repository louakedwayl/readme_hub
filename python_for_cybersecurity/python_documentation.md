# Consulter la documentation en Python

## 1. L'idée générale

En C ou sous Linux, on utilise souvent `man` pour lire la documentation d'une commande ou d'une fonction.

En Python, il n'y a pas exactement le même système, mais il existe plusieurs moyens très simples pour consulter la documentation d'un objet, d'une fonction, d'une classe ou d'un module.

L'objectif est le même :

- comprendre à quoi sert quelque chose
- voir comment l'utiliser
- lire sa description

---

## 2. `help()`

La manière la plus connue en Python est `help()`.

Elle permet d'afficher la documentation d'un élément Python.

Exemples :

```python
help(len)
help(filter)
help(str)
```

`help()` affiche en général :

- le nom de l'objet
- sa description
- parfois sa forme d'utilisation
- quelques informations utiles sur son comportement

C'est l'outil le plus proche de l'idée de "manuel intégré".

Voici un exemple de sortie pour `help(len)` :

```
Help on built-in function len in module builtins:

len(obj, /)
    Return the number of items in a container.
```

---

## 3. `dir()`

Avant de lire la documentation d'un objet, il est souvent utile de savoir **ce qu'il contient**.

`dir()` liste tous les attributs et méthodes disponibles sur un objet.

Exemples :

```python
dir(str)
dir(list)
dir(filter)
```

Cela retourne une liste de noms. Par exemple, `dir(str)` montre entre autres : `upper`, `lower`, `split`, `join`, `replace`, etc.

On peut ensuite utiliser `help()` ou `__doc__` sur un élément précis :

```python
dir(str)           # voir tout ce qui est disponible
help(str.split)    # lire la doc d'une méthode précise
```

`dir()` est donc l'étape zéro : **explorer avant de lire**.

---

## 4. `__doc__`

En Python, beaucoup d'objets possèdent une documentation interne appelée **docstring**.

On peut la lire avec `.__doc__`.

Exemples :

```python
print(filter.__doc__)
print(len.__doc__)
print(str.__doc__)
```

Cela permet d'afficher directement le texte de documentation.

La différence avec `help()` est simple :

- `help()` présente la documentation de manière plus complète et plus lisible
- `__doc__` donne surtout le texte brut de la documentation

Voici un exemple de sortie pour `len.__doc__` :

```
Return the number of items in a container.
```

---

## 5. `pydoc` dans le terminal

Python propose aussi un outil en ligne de commande : `pydoc`.

Il permet de consulter la documentation depuis le terminal, un peu comme `man`.

Exemples :

```bash
python -m pydoc filter
python -m pydoc str
python -m pydoc list
```

On peut aussi rechercher un mot-clé :

```bash
python -m pydoc -k filter
```

`pydoc` est donc une manière pratique de lire la documentation sans entrer dans l'interpréteur Python.

---

## 6. Différence avec `man`

Il faut bien distinguer les deux systèmes :

### `man`

`man` documente le **système** : commandes Unix, appels système (section 2), fonctions de la libc (section 3). La documentation est stockée dans des fichiers statiques sur le disque. On lit des pages écrites à l'avance.

### Documentation Python

En Python, `help()`, `__doc__` et `dir()` fonctionnent par **introspection** : ils interrogent les objets vivants en mémoire. La documentation est rattachée directement à l'objet lui-même, pas à un fichier externe.

C'est une différence fondamentale pour quelqu'un qui vient du C :

- `man printf` lit un fichier dans `/usr/share/man/`
- `help(print)` interroge l'objet `print` directement dans l'interpréteur

On retrouve la même idée de documentation, mais le mécanisme est différent.

---

## 7. Quand utiliser chaque outil

| Outil | Cas d'usage |
|-------|-------------|
| `dir()` | Explorer ce qui est disponible sur un objet |
| `help()` | Comprendre rapidement un objet ou une méthode |
| `__doc__` | Lire directement la docstring brute |
| `pydoc` | Consulter la documentation depuis le terminal |

---

## 8. Exemple simple avec `filter`

Pour un exercice sur `filter`, on peut explorer et lire sa documentation comme ceci :

```python
dir(filter)            # voir les attributs disponibles
help(filter)           # lire la documentation complète
print(filter.__doc__)  # lire la docstring brute
```

Cela permet de voir ce que fait la fonction originale avant d'essayer de la recréer soi-même.

---

## 9. Résumé

En Python, l'équivalent de l'idée de `man` se fait avec :

- `dir()` pour lister les attributs et méthodes d'un objet
- `help()` pour afficher la documentation dans Python
- `__doc__` pour lire la docstring
- `pydoc` pour consulter la documentation dans le terminal

Ce ne sont pas exactement les mêmes outils que `man`, mais ils servent au même objectif : comprendre comment utiliser quelque chose. La différence clé est que Python fonctionne par introspection — on interroge les objets eux-mêmes — là où `man` lit des fichiers statiques.
