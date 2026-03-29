# Les listes en compréhension en Python

## Définition

Une **liste en compréhension** est une façon courte et lisible de **créer une liste** à partir d'un autre iterable.

Au lieu d'écrire une boucle sur plusieurs lignes, on peut écrire la construction de la liste directement en une seule expression.

---

## Forme générale

```python
[expression for element in iterable]
```

Cette écriture veut dire :

- on parcourt un iterable
- on prend chaque élément
- on applique une expression
- on construit une nouvelle liste

## Exemple simple

```python
[n * 2 for n in [1, 2, 3]]
```

Résultat :

```python
[2, 4, 6]
```

Ici :

- `for n in [1, 2, 3]` parcourt les éléments
- `n * 2` transforme chaque élément
- le tout produit une nouvelle liste

## Ajouter une condition

On peut aussi filtrer les éléments avec `if`.

```python
[n for n in [1, 2, 3, 4] if n > 2]
```

Résultat :

```python
[3, 4]
```

Ici, seuls les éléments qui respectent la condition sont gardés.

## Forme avec condition

```python
[expression for element in iterable if condition]
```

Cette forme sert à :

- parcourir
- filtrer
- construire la liste finale

## Exemple avec des mots

```python
[word for word in ["chat", "chien", "lion"] if len(word) > 4]
```

Résultat :

```python
["chien"]
```

Ici, on garde seulement les mots dont la longueur est supérieure à 4.

## Lien avec `filter`

Une liste en compréhension peut servir à reproduire le comportement de `filter`.

Exemple :

```python
[item for item in iterable if function(item)]
```

Cela veut dire :

- on parcourt `iterable`
- on garde seulement les éléments pour lesquels `function(item)` renvoie `True`

## Pourquoi les utiliser

Les listes en compréhension sont utiles pour :

- écrire un code plus court
- rendre la création de liste plus claire
- transformer ou filtrer rapidement des données

## À retenir

Une liste en compréhension sert à créer une liste de manière compacte.

Les deux formes les plus importantes sont :

```python
[expression for element in iterable]
```

```python
[expression for element in iterable if condition]
```

En résumé :

- la première forme transforme
- la deuxième transforme et filtre
