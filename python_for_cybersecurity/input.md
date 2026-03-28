# `input()` en Python

## Définition

`input()` sert à **récupérer une saisie de l'utilisateur au clavier**.

Quand le programme rencontre `input()`, il s'arrête et attend que l'utilisateur écrive quelque chose puis appuie sur **Entrée**.

---

## Syntaxe

```python
valeur = input()
```

On peut aussi afficher un message :

```python
valeur = input("Entrez quelque chose : ")
```

---

## Ce que retourne `input()`

`input()` retourne toujours une chaîne de caractères (`str`).

```python
age = input("Quel âge as-tu ? ")
print(age)
```

Même si l'utilisateur tape un nombre, Python le lit d'abord comme du texte.

---

## Conversion

Si on veut utiliser la saisie comme un nombre, il faut la convertir.

```python
age = int(input("Âge : "))
prix = float(input("Prix : "))
```

---

## Exemple simple

```python
name = input("What is your name? ")
print("Hello,", name)
```

---

## Points importants

- `input()` lit une saisie utilisateur.
- Le résultat est une string.
- On peut ajouter un message.
- On convertit avec `int()` ou `float()` si besoin.

---

## Résumé

`input()` est la fonction de base pour faire des programmes interactifs en Python.

Elle permet :

- De poser une question à l'utilisateur.
- De récupérer sa réponse.
- D'utiliser cette réponse dans le programme.

---

## Mini fiche

```python
# lire une chaîne
text = input()

# lire avec un message
text = input("Enter text: ")

# lire un entier
n = int(input("Enter a number: "))

# lire un décimal
x = float(input("Enter a float: "))
```
