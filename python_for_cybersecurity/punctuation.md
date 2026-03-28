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

## À retenir

- Majuscules, minuscules, chiffres et espaces → méthodes natives.
- Ponctuation → pas de méthode native directe.
- On utilise souvent `string.punctuation`.

---

## Résumé

La ponctuation en Python ne se teste pas comme `isupper()` ou `isdigit()`. Elle se gère généralement avec `string.punctuation`.
