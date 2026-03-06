# Le module `time` et `datetime` en Python

## 1. Le timestamp Unix

Le timestamp est le nombre de secondes écoulées depuis le **1er janvier 1970 à 00:00:00 UTC** (appelé "epoch").

```python
import time

ts = time.time()
print(ts)  # ex: 1709123456.7891
```

`time.time()` retourne un `float`.

---

## 2. Formater un nombre avec des virgules

```python
nombre = 1709123456.7891

# Avec des séparateurs de milliers
print(f"{nombre:,.4f}")  # 1,709,123,456.7891
```

---

## 3. La notation scientifique

```python
print(f"{nombre:.2e}")  # 1.71e+09
```

---

## 4. Le module `datetime`

```python
from datetime import datetime

maintenant = datetime.now()

# Formater la date
print(maintenant.strftime("%b %d %Y"))  # Oct 21 2022
```

### Les codes de format `strftime` utiles :

| Code | Signification | Exemple |
|------|--------------|---------|
| `%b` | Mois abrégé | `Oct` |
| `%d` | Jour | `21` |
| `%Y` | Année complète | `2022` |
| `%H` | Heure (24h) | `14` |
| `%M` | Minutes | `30` |
| `%S` | Secondes | `45` |

---

## 5. Convertir un timestamp en datetime

```python
from datetime import datetime
import time

ts = time.time()
dt = datetime.fromtimestamp(ts)
print(dt.strftime("%b %d %Y"))
```

---

## Résumé

- `time.time()` → timestamp brut (float)
- `datetime.now()` → objet date manipulable
- `strftime()` → formater la date en string
- f-strings → formater les nombres (virgules, scientifique)
