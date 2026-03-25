# `len` en Python

## Définition

`len()` est une fonction intégrée de Python.

Elle sert à connaître la **taille** d'un objet, c'est-à-dire le nombre d'éléments qu'il contient.

---

## Syntaxe

```python
len(objet)
```

`objet` peut être par exemple :

- une chaîne de caractères
- une liste
- un tuple
- un dictionnaire
- un set

---

## Exemples

### Avec une chaîne de caractères

```python
mot = "bonjour"
print(len(mot))
```

Résultat :

```
7
```

`len()` compte le nombre de caractères.

### Avec une liste

```python
nombres = [10, 20, 30, 40]
print(len(nombres))
```

Résultat :

```
4
```

`len()` compte le nombre d'éléments dans la liste.

### Avec un tuple

```python
coordonnees = (12, 8)
print(len(coordonnees))
```

Résultat :

```
2
```

### Avec un dictionnaire

```python
user = {"name": "Wayl", "age": 21}
print(len(user))
```

Résultat :

```
2
```

Pour un dictionnaire, `len()` compte le nombre de clés.

### Avec un set

```python
lettres = {"a", "b", "c"}
print(len(lettres))
```

Résultat :

```
3
```

### Chaîne vide ou liste vide

```python
print(len(""))
print(len([]))
```

Résultat :

```
0
0
```

Si l'objet est vide, `len()` renvoie `0`.

---

## Point important

`len()` ne donne pas la "valeur" d'un objet. Elle donne seulement combien d'éléments il contient.

```python
texte = "42"
print(len(texte))
```

Résultat :

```
2
```

Ici, `len()` renvoie `2` car `"42"` contient 2 caractères.

---

## Erreur fréquente

`len()` ne fonctionne pas avec tout. Par exemple :

```python
print(len(10))
```

Cela provoque une erreur, car un entier n'a pas de longueur.

---

## Résumé

- `len()` sert à connaître la taille d'un objet
- Elle compte le nombre d'éléments
- Elle fonctionne avec : les chaînes, les listes, les tuples, les dictionnaires, les sets
- Si l'objet est vide, elle renvoie `0`

---

## Exemple global

```python
print(len("chat"))              # 4
print(len([1, 2, 3]))          # 3
print(len((10, 20)))           # 2
print(len({"a": 1, "b": 2}))   # 2
print(len(set([1, 2, 3])))     # 3
```
