# La ponctuation en Python

## Idée générale

En Python, certaines catégories de caractères ont des méthodes intégrées, comme :

- `isupper()`
- `islower()`
- `isdigit()`
- `isspace()`

La ponctuation est différente.

---

## La ponctuation

Il n'existe pas de méthode native sur les chaînes comme :

```python
text.ispunctuation()
```

Donc, pour la ponctuation, on utilise généralement le module `string`.

```python
import string
```

Ce module contient :

```python
string.punctuation
```

Cette constante regroupe des signes de ponctuation.

---

## Comment tester si un caractère est de la ponctuation ?

### Tester un seul caractère

```python
import string

char = "!"
if char in string.punctuation:
    print("C'est de la ponctuation")
```

L'opérateur `in` vérifie si le caractère fait partie de la liste des signes de ponctuation.

### Tester tous les caractères d'une chaîne

```python
import string

text = "...!!!"
resultat = all(c in string.punctuation for c in text)
print(resultat)  # True
```

`all()` renvoie `True` seulement si **chaque** caractère de la chaîne est de la ponctuation.

### Compter la ponctuation dans un texte

```python
import string

text = "Bonjour, comment ça va ?"
count = sum(1 for c in text if c in string.punctuation)
print(count)  # 2
```

### Extraire la ponctuation d'un texte

```python
import string

text = "Hello, world!"
ponctuation = [c for c in text if c in string.punctuation]
print(ponctuation)  # [',', '!']
```

---

## À retenir

- Majuscules, minuscules, chiffres et espaces → méthodes natives.
- Ponctuation → pas de méthode native directe.
- On utilise souvent `string.punctuation`.

---

## Résumé

La ponctuation en Python ne se teste pas comme `isupper()` ou `isdigit()`. Elle se gère généralement avec `string.punctuation`.
