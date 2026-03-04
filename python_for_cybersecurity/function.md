# Les fonctions en Python

## 1) Qu'est-ce qu'une fonction ?

Une fonction est un bloc de code réutilisable auquel on donne un nom. Elle évite de répéter le même code plusieurs fois.

```python
def dire_bonjour():
    print("Bonjour")

dire_bonjour()  # appel de la fonction
```

---

## 2) Déclarer une fonction

```python
def nom_de_la_fonction():
    # bloc de code
```

- `def` — mot-clé pour déclarer une fonction
- Le nom suit les mêmes règles que les variables (`snake_case`)
- Les `:` et l'indentation sont obligatoires

---

## 3) Les paramètres

Les paramètres sont des variables que la fonction reçoit à l'appel.

```python
def saluer(nom):
    print("Bonjour", nom)

saluer("Wayl")   # Bonjour Wayl
saluer("Maya")   # Bonjour Maya
```

Plusieurs paramètres :

```python
def addition(a, b):
    print(a + b)

addition(3, 4)   # 7
```

---

## 4) `return` — retourner une valeur

`return` permet à la fonction de renvoyer un résultat utilisable.

```python
def addition(a, b):
    return a + b

resultat = addition(3, 4)
print(resultat)  # 7
```

Sans `return`, la fonction retourne `None`.

`return` arrête immédiatement l'exécution de la fonction :

```python
def verifier(x):
    if x < 0:
        return "négatif"
    return "positif"
```

---

## 5) Les paramètres par défaut

Un paramètre peut avoir une valeur par défaut utilisée si aucune valeur n'est passée.

```python
def saluer(nom="inconnu"):
    print("Bonjour", nom)

saluer("Wayl")   # Bonjour Wayl
saluer()         # Bonjour inconnu
```

---

## 6) Les arguments nommés

On peut passer les arguments par nom — l'ordre n'a alors plus d'importance.

```python
def connexion(host, port):
    print(f"Connexion à {host}:{port}")

connexion(port=8080, host="localhost")
```

---

## 7) `*args` — nombre variable d'arguments

Quand on ne sait pas combien d'arguments seront passés.

```python
def afficher(*args):
    for arg in args:
        print(arg)

afficher("a", "b", "c")
```

`args` est une liste de tous les arguments passés.

---

## 8) `**kwargs` — arguments nommés variables

```python
def afficher(**kwargs):
    for cle, valeur in kwargs.items():
        print(f"{cle} = {valeur}")

afficher(host="localhost", port=8080)
```

`kwargs` est un dictionnaire de tous les arguments nommés passés.

---

## 9) Portée des variables (scope)

Une variable déclarée dans une fonction n'existe que dans cette fonction.

```python
def ma_fonction():
    x = 10      # variable locale
    print(x)

ma_fonction()
print(x)        # Erreur — x n'existe pas ici
```

Pour accéder à une variable globale depuis une fonction :

```python
x = 10

def modifier():
    global x
    x = 20

modifier()
print(x)  # 20
```

---

## 10) Résumé

| Concept | Exemple |
|---|---|
| Déclarer | `def ma_fonction():` |
| Paramètres | `def f(a, b):` |
| Valeur par défaut | `def f(a=0):` |
| Retourner | `return valeur` |
| Arguments nommés | `f(a=1, b=2)` |
| Args variables | `def f(*args):` |
| Kwargs variables | `def f(**kwargs):` |
