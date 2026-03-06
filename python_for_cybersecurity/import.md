# Les imports en Python

## 1. Pourquoi importer ?

Python est livré avec une bibliothèque standard massive. Les imports permettent d'accéder à des modules externes sans réécrire leur code.

```python
import time  # accès au module time
```

---

## 2. Les 4 formes d'import

### Forme 1 — Import simple
```python
import time

print(time.time())  # doit préfixer avec le nom du module
```

### Forme 2 — Import avec alias
```python
import datetime as dt

print(dt.datetime.now())  # alias plus court
```

### Forme 3 — Import d'un élément spécifique
```python
from datetime import datetime

print(datetime.now())  # pas besoin de préfixer
```

### Forme 4 — Import de tout (déconseillé)
```python
from time import *  # importe tout dans le namespace local

print(time())  # fonctionne mais dangereux
```

---

## 3. Pourquoi éviter `import *` ?

```python
from module_a import *
from module_b import *

# Si les deux modules ont une fonction "connect()" :
connect()  # laquelle s'exécute ? Impossible à savoir.
```

Pollution du namespace. Conflits silencieux. À bannir.

---

## 4. La bibliothèque standard

Quelques modules utiles disponibles sans installation :

| Module | Utilité |
|--------|---------|
| `time` | Timestamp, sleep |
| `datetime` | Manipulation de dates |
| `os` | Interactions système |
| `sys` | Arguments CLI, stdout/stderr |
| `math` | Fonctions mathématiques |
| `random` | Génération aléatoire |
| `json` | Sérialisation JSON |
| `re` | Expressions régulières |

---

## 5. Installer des modules externes

```bash
pip3 install requests  # installe un module tiers
```

```python
import requests  # utilisable après installation
```

---

## 6. Créer son propre module

Tout fichier `.py` est un module importable.

```python
# utils.py
def addition(a, b):
    return a + b
```

```python
# main.py
from utils import addition

print(addition(2, 3))  # 5
```

---

## 7. L'ordre des imports (convention PEP8)

```python
# 1. Bibliothèque standard
import os
import sys

# 2. Bibliothèques tierces
import requests

# 3. Modules locaux
from utils import addition
```

Séparer chaque groupe par une ligne vide.

---

## 8. `__name__` et les imports

Quand un module est importé, son code global s'exécute. Pour l'éviter :

```python
# utils.py
def addition(a, b):
    return a + b

if __name__ == "__main__":
    print(addition(2, 3))  # exécuté seulement si lancé directement
```

---

## Résumé

- `import module` → accès via `module.fonction()`
- `from module import x` → accès direct à `x`
- `import module as alias` → raccourci
- `from module import *` → à éviter
- Ordre PEP8 : standard → tiers → local
