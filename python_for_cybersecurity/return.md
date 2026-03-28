# `return` en Python

## 1. Idée générale

`return` est un mot-clé Python qui sert à **renvoyer une valeur depuis une fonction** et à **terminer l'exécution de cette fonction**.

Deux choses à retenir immédiatement :

- `return` ne peut être utilisé que **dans une fonction** (`def`).
- Dès que Python rencontre `return`, il **sort de la fonction** sur-le-champ.

---

## 2. Forme de base

```python
def addition(a, b):
    return a + b
```

Ici, la fonction `addition` **renvoie** le résultat de `a + b`.

On peut récupérer cette valeur :

```python
resultat = addition(3, 5)
print(resultat)  # 8
```

Sans `return`, la valeur serait perdue. La fonction ferait le calcul mais ne donnerait rien en retour.

---

## 3. `return` termine la fonction

Dès que Python atteint un `return`, il **quitte la fonction immédiatement**. Tout le code qui suit dans la fonction est ignoré.

```python
def test():
    print("Avant return")
    return
    print("Après return")  # jamais exécuté
```

Résultat :

```
Avant return
```

La deuxième ligne `print` n'est jamais atteinte.

---

## 4. `return` sans valeur

On peut écrire `return` tout seul, sans rien après :

```python
def verifier(x):
    if x < 0:
        return
    print(x)
```

Dans ce cas :

- Si `x` est négatif, la fonction s'arrête immédiatement.
- Si `x` est positif ou nul, `print(x)` s'exécute.

Un `return` sans valeur renvoie `None` par défaut.

---

## 5. Fonction sans `return`

Si une fonction ne contient aucun `return`, elle renvoie automatiquement `None`.

```python
def saluer():
    print("Bonjour")

resultat = saluer()
print(resultat)  # None
```

`saluer()` affiche "Bonjour" mais ne **renvoie** rien. Donc `resultat` vaut `None`.

---

## 6. Différence entre `print` et `return`

C'est une confusion très courante chez les débutants.

| | `print` | `return` |
|---|---|---|
| Rôle | Affiche quelque chose à l'écran | Renvoie une valeur à l'appelant |
| Où ça va | Vers la console | Vers le code qui a appelé la fonction |
| Stockable | Non | Oui |

Exemple :

```python
def avec_print(a, b):
    print(a + b)

def avec_return(a, b):
    return a + b
```

```python
x = avec_print(3, 5)   # affiche 8, mais x vaut None
y = avec_return(3, 5)   # n'affiche rien, mais y vaut 8
```

`print` montre. `return` donne.

---

## 7. Renvoyer plusieurs valeurs

Python permet de renvoyer plusieurs valeurs avec un seul `return` :

```python
def coordonnees():
    return 10, 20
```

```python
x, y = coordonnees()
print(x)  # 10
print(y)  # 20
```

En réalité, Python renvoie un **tuple**, mais on peut le décomposer directement.

---

## 8. Erreur classique : `return` en dehors d'une fonction

```python
import sys
if len(sys.argv) > 2:
    return  # SyntaxError
```

Ce code provoque une erreur : `SyntaxError: 'return' outside function`.

`return` **n'existe pas en dehors d'un `def`**. C'est une règle absolue.

Si on veut quitter un programme depuis le scope global, on utilise `sys.exit()` :

```python
import sys
if len(sys.argv) > 2:
    sys.exit(1)
```

---

## 9. `return` avec une condition

On utilise souvent `return` pour **sortir d'une fonction plus tôt** selon une condition :

```python
def diviser(a, b):
    if b == 0:
        return None
    return a / b
```

Si `b` vaut 0, la fonction s'arrête et renvoie `None`. Sinon, elle renvoie le résultat de la division.

C'est ce qu'on appelle un **early return** : on traite les cas problématiques en premier, puis on exécute la logique normale.

---

## 10. Ce qu'il faut retenir

- `return` renvoie une valeur depuis une fonction.
- `return` termine immédiatement la fonction.
- `return` sans valeur renvoie `None`.
- Une fonction sans `return` renvoie aussi `None`.
- `return` ne peut **jamais** être utilisé en dehors d'une fonction.
- `print` affiche. `return` renvoie. Ce n'est pas la même chose.

---

## 11. Résumé très court

`return` sert à **donner un résultat** depuis une fonction et à **en sortir**. Il ne fonctionne que dans un `def`.

En dehors d'une fonction, pour quitter un programme, on utilise `sys.exit()`.

> **`return` = renvoyer une valeur + quitter la fonction. Rien de plus, rien de moins.**
