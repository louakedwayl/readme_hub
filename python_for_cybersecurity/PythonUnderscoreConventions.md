# Les noms avec `_` en Python

## 1. Idée générale

En Python, les noms peuvent parfois contenir des underscores (`_`) pour donner une indication particulière.

Par exemple :

```python
nom
_nom
__nom
__nom__
```

Ces écritures ne veulent pas dire exactement la même chose. Le `_` sert souvent à montrer qu'un nom a un rôle un peu spécial.

---

## 2. Le nom normal

```python
age = 18
prenom = "Wayl"
```

Ici, ce sont des variables normales. Il n'y a rien de spécial.

---

## 3. Un underscore au début : `_nom`

```python
_variable = 10
```

Quand un nom commence par un seul underscore, cela veut souvent dire :

- Que c'est un élément plutôt interne.
- Qu'il n'est pas censé être utilisé partout.
- Que c'est surtout une convention entre programmeurs.

Donc `_nom` veut souvent dire : "ce nom est plutôt réservé à un usage interne".

---

## 4. Deux underscores au début : `__nom`

```python
__secret
```

Quand un nom commence par deux underscores, Python lui donne un traitement particulier, surtout dans les classes.

À un niveau général, tu peux retenir que :

- Ce nom est encore plus "spécial" qu'un simple `_nom`.
- Il est utilisé pour éviter certains problèmes ou protéger un peu le nom.

Pas besoin d'aller plus loin au début.

---

## 5. Deux underscores avant et après : `__nom__`

```python
__name__
__init__
__doc__
```

Ces noms sont des **noms spéciaux de Python**. Ils ont un sens particulier pour le langage.

Par exemple :

- `__name__`
- `__init__`
- `__doc__`

On les appelle souvent :

- Noms spéciaux.
- Ou **dunder names**.

`dunder` veut dire *double underscore*.

---

## 6. Le `_` tout seul

On voit aussi parfois `_` tout seul :

```python
for _ in range(3):
    print("Bonjour")
```

Ici, `_` veut souvent dire : "je n'ai pas besoin de cette variable".

C'est une façon simple de montrer qu'on ignore une valeur.

---

## 7. Ce qu'il faut retenir

| Forme | Signification |
|---|---|
| `nom` | Nom normal |
| `_nom` | Nom interne par convention |
| `__nom` | Nom avec un traitement particulier |
| `__nom__` | Nom spécial Python |
| `_` | Nom utilisé pour ignorer une valeur |

---

## 8. Résumé très court

Les underscores en Python servent à donner des indications sur le rôle d'un nom.

Selon la forme :

- Parfois c'est juste une convention.
- Parfois c'est un nom spécial du langage.
- Parfois c'est une manière de dire qu'une valeur n'est pas importante.
