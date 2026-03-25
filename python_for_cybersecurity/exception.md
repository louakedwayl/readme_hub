# Les Exceptions en Python — Cours Complet

---

## 1. Qu'est-ce qu'une exception ?

Une **exception** est un événement qui interrompt le flux normal d'exécution d'un programme. Quand Python rencontre une erreur, il **lève** (*raise*) une exception. Si elle n'est pas **interceptée** (*catch*), le programme plante.

```python
# Ceci lève une ZeroDivisionError
resultat = 10 / 0
```

**Sortie :**
```
Traceback (most recent call last):
  File "main.py", line 1, in <module>
ZeroDivisionError: division by zero
```

---

## 2. Hiérarchie des exceptions

Toutes les exceptions héritent de `BaseException`. Les plus courantes héritent de `Exception`.

```
BaseException
├── SystemExit
├── KeyboardInterrupt
├── GeneratorExit
└── Exception
    ├── ArithmeticError
    │   ├── ZeroDivisionError
    │   ├── OverflowError
    │   └── FloatingPointError
    ├── LookupError
    │   ├── IndexError
    │   └── KeyError
    ├── ValueError
    ├── TypeError
    ├── AttributeError
    ├── FileNotFoundError
    ├── PermissionError
    ├── OSError
    ├── RuntimeError
    │   └── RecursionError
    └── StopIteration
```

> **Règle** : On intercepte toujours `Exception`, jamais `BaseException` (sinon on bloque `KeyboardInterrupt`, `SystemExit`, etc.).

---

## 3. `try` / `except` — Intercepter une exception

### Syntaxe de base

```python
try:
    valeur = int(input("Entrez un nombre : "))
    resultat = 100 / valeur
except ZeroDivisionError:
    print("Division par zéro interdite.")
except ValueError:
    print("Ce n'est pas un nombre valide.")
```

### Intercepter plusieurs exceptions

```python
# Méthode 1 : tuple
try:
    # ...
except (ValueError, TypeError) as e:
    print(f"Erreur : {e}")

# Méthode 2 : blocs séparés (quand le traitement diffère)
try:
    # ...
except ValueError:
    print("Mauvaise valeur")
except TypeError:
    print("Mauvais type")
```

### Accéder à l'objet exception

```python
try:
    open("fichier_inexistant.txt")
except FileNotFoundError as e:
    print(f"Type : {type(e).__name__}")
    print(f"Message : {e}")
    print(f"Args : {e.args}")
```

**Sortie :**
```
Type : FileNotFoundError
Message : [Errno 2] No such file or directory: 'fichier_inexistant.txt'
Args : (2, 'No such file or directory')
```

---

## 4. `else` et `finally`

```python
try:
    fichier = open("data.txt", "r")
    contenu = fichier.read()
except FileNotFoundError:
    print("Fichier introuvable.")
else:
    # Exécuté SEULEMENT si aucune exception n'a été levée
    print(f"Lu {len(contenu)} caractères.")
finally:
    # Exécuté TOUJOURS, exception ou pas
    print("Bloc finally exécuté.")
```

| Bloc | Exécuté quand ? |
|------|-----------------|
| `try` | Toujours (c'est le code à protéger) |
| `except` | Seulement si une exception correspondante est levée |
| `else` | Seulement si **aucune** exception n'est levée dans `try` |
| `finally` | **Toujours**, même après un `return`, `break` ou exception non interceptée |

### `finally` et `return` — piège classique

```python
def piege():
    try:
        return "depuis try"
    finally:
        return "depuis finally"  # Écrase le return du try !

print(piege())  # "depuis finally"
```

> **Ne jamais mettre de `return` dans `finally`.** C'est un anti-pattern.

---

## 5. `raise` — Lever une exception

```python
def retirer(solde, montant):
    if montant > solde:
        raise ValueError(f"Fonds insuffisants : solde={solde}, demandé={montant}")
    return solde - montant
```

### Re-lever une exception (propagation)

```python
try:
    risque()
except ValueError:
    print("Log de l'erreur...")
    raise  # Propage l'exception originale avec sa traceback intacte
```

### `raise ... from ...` — Chaînage explicite

```python
try:
    valeur = int("abc")
except ValueError as original:
    raise RuntimeError("Échec de parsing de la config") from original
```

**Sortie :**
```
ValueError: invalid literal for int() with base 10: 'abc'

The above exception was the direct cause of the following exception:

RuntimeError: Échec de parsing de la config
```

### `raise ... from None` — Supprimer le chaînage

```python
try:
    valeur = int("abc")
except ValueError:
    raise RuntimeError("Config invalide") from None
```

Seule `RuntimeError` apparaîtra, sans la `ValueError` originale.

---

## 6. Exceptions personnalisées

### Règles de base

1. Hériter de `Exception` (ou d'une sous-classe)
2. Nommer avec le suffixe `Error`
3. Appeler `super().__init__()`

```python
class InsufficientFundsError(Exception):
    """Levée quand le solde est insuffisant."""

    def __init__(self, solde, montant):
        self.solde = solde
        self.montant = montant
        self.deficit = montant - solde
        super().__init__(
            f"Solde insuffisant : {solde}€ disponible, {montant}€ demandé "
            f"(manque {self.deficit}€)"
        )
```

### Hiérarchie d'exceptions personnalisées (pattern pro)

```python
class AppError(Exception):
    """Classe de base pour les erreurs de l'application."""
    pass

class DatabaseError(AppError):
    pass

class ConnectionError(DatabaseError):
    pass

class QueryError(DatabaseError):
    pass

class AuthError(AppError):
    pass

class TokenExpiredError(AuthError):
    pass
```

**Utilisation :**

```python
try:
    query_database()
except DatabaseError:
    # Intercepte ConnectionError ET QueryError
    print("Problème de base de données")
except AuthError:
    # Intercepte TokenExpiredError aussi
    print("Problème d'authentification")
```

---

## 7. Context Managers et exceptions

Le `with` garantit le nettoyage même en cas d'exception :

```python
# Sans with (dangereux)
f = open("data.txt")
try:
    contenu = f.read()
finally:
    f.close()

# Avec with (propre)
with open("data.txt") as f:
    contenu = f.read()
# f.close() est appelé automatiquement, même si exception
```

### Créer son propre context manager

```python
class DatabaseConnection:
    def __enter__(self):
        self.conn = create_connection()
        return self.conn

    def __exit__(self, exc_type, exc_val, exc_tb):
        if exc_type is not None:
            self.conn.rollback()
            print(f"Rollback suite à : {exc_type.__name__}: {exc_val}")
        else:
            self.conn.commit()
        self.conn.close()
        return False  # False = ne pas supprimer l'exception

# Utilisation
with DatabaseConnection() as conn:
    conn.execute("INSERT INTO users VALUES ('Wayl')")
    # Si exception ici → rollback automatique
    # Si tout OK → commit automatique
```

> `__exit__` retourne `True` pour **supprimer** l'exception, `False` pour la **propager**.

---

## 8. Anti-patterns à éviter

### ❌ `except` nu (attrape TOUT)

```python
# CATASTROPHIQUE — cache les vrais bugs
try:
    do_something()
except:
    pass
```

### ❌ `except Exception` trop large

```python
# Mauvais — on ne sait pas ce qu'on traite
try:
    valeur = data["cle"]
except Exception:
    valeur = None
```

```python
# Correct — exception spécifique
try:
    valeur = data["cle"]
except KeyError:
    valeur = None
```

### ❌ Utiliser les exceptions pour le contrôle de flux normal

```python
# Mauvais
try:
    index = liste.index(element)
except ValueError:
    index = -1

# Mieux (pour ce cas précis)
index = liste.index(element) if element in liste else -1
```

> **Nuance** : En Python, le pattern EAFP (*Easier to Ask Forgiveness than Permission*) est idiomatique. Utiliser `try/except` est souvent préféré à des vérifications préalables. L'anti-pattern, c'est d'en abuser quand une condition simple suffit.

### ❌ Logger ET relever sans raison

```python
# Mauvais — double log si le parent log aussi
try:
    risque()
except ValueError as e:
    logger.error(f"Erreur : {e}")
    raise  # Le parent va probablement logger aussi
```

---

## 9. Patterns avancés

### Retry avec backoff exponentiel

```python
import time

def retry(func, max_attempts=3, base_delay=1):
    for attempt in range(max_attempts):
        try:
            return func()
        except (ConnectionError, TimeoutError) as e:
            if attempt == max_attempts - 1:
                raise
            delay = base_delay * (2 ** attempt)
            print(f"Tentative {attempt + 1} échouée, retry dans {delay}s...")
            time.sleep(delay)
```

### Exception groups (Python 3.11+)

```python
# Lever plusieurs exceptions simultanément
def valider_formulaire(data):
    erreurs = []
    if not data.get("nom"):
        erreurs.append(ValueError("Nom requis"))
    if not data.get("email"):
        erreurs.append(ValueError("Email requis"))
    if erreurs:
        raise ExceptionGroup("Validation échouée", erreurs)

# Intercepter avec except*
try:
    valider_formulaire({})
except* ValueError as eg:
    for e in eg.exceptions:
        print(f"  - {e}")
```

### `__traceback__` et nettoyage mémoire

```python
try:
    risque()
except Exception as e:
    logger.error(e)
    e.__traceback__ = None  # Casse les références circulaires
    # Évite les fuites mémoire dans les applications longue durée
```

---

## 10. Résumé — Cheat Sheet

| Syntaxe | Usage |
|---------|-------|
| `try / except` | Intercepter une exception |
| `except ExcType as e` | Capturer l'objet exception |
| `except (TypeA, TypeB)` | Intercepter plusieurs types |
| `else` | Code si aucune exception |
| `finally` | Code exécuté dans tous les cas |
| `raise ExcType("msg")` | Lever une exception |
| `raise` | Re-lever l'exception courante |
| `raise X from Y` | Chaîner les exceptions |
| `raise X from None` | Supprimer le chaînage |
| `with` | Nettoyage automatique via context manager |
| `except*` (3.11+) | Intercepter des `ExceptionGroup` |

---

*Cours rédigé pour Wayl — École 42 Paris*
