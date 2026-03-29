# Les docstrings en Python

## 1. Définition

Une **docstring** est une chaîne de caractères écrite au début d'un **module**, d'une **fonction**, d'une **classe** ou d'une **méthode**.  
Python la reconnaît comme documentation de l'objet et la stocke dans l'attribut `__doc__`.

## 2. À quoi ça sert ?

La docstring sert à **documenter** ton code.  
Des outils comme `help()` et `pydoc` s'appuient dessus pour afficher automatiquement la documentation.

## 3. Où on la met ?

La docstring doit être placée **juste après** la déclaration de l'objet documenté :

- après `def` pour une fonction
- après `class` pour une classe
- au début du fichier pour un module

Si ce n'est pas la première expression, ce n'est plus la docstring officielle de l'objet.

## 4. Forme générale

On l'écrit souvent avec des triples guillemets :

```python
def bonjour():
    """Affiche un message de bienvenue."""
```

On peut ensuite la lire avec :

```python
print(bonjour.__doc__)
```

L'attribut `__doc__` contient bien la docstring de l'objet.

## 5. Exemple simple

```python
def add(a, b):
    """Retourne la somme de deux nombres."""
    return a + b
```

Ici :

- `add` est la fonction
- le texte entre `""" ... """` est la docstring
- `add.__doc__` renverra cette documentation

## 6. Docstring et commentaire : différence

Une docstring n'est pas un simple commentaire.

- Un **commentaire** (`#`) sert surtout au développeur qui lit le code source
- Une **docstring** fait partie de la documentation accessible du code via `__doc__`, `help()` ou `pydoc`

## 7. Bon réflexe

Une bonne docstring reste courte, claire et explique simplement :

- ce que fait l'objet
- à quoi il sert
- éventuellement ce qu'il retourne

La documentation Python recommande d'en mettre, car différents outils peuvent les utiliser pour produire une documentation lisible ou navigable.

## 8. À retenir

- docstring = chaîne de documentation
- elle se met au début d'un module, d'une fonction ou d'une classe
- Python la stocke dans `__doc__`
- `help()` et `pydoc` peuvent l'utiliser pour afficher la documentation
