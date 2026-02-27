# Les conditions en Python

## 1) Qu'est-ce qu'une condition ?

Une condition permet d'exécuter un bloc de code uniquement si une expression est vraie. C'est la base de toute logique en programmation.

---

## 2) `if` / `elif` / `else`

```python
age = 20

if age >= 18:
    print("Majeur")
elif age >= 13:
    print("Adolescent")
else:
    print("Enfant")
```

- `if` — si la condition est vraie
- `elif` — sinon si (autant que nécessaire)
- `else` — sinon (cas par défaut)

> L'indentation est obligatoire. Tout ce qui est indenté appartient au bloc.

---

## 3) Les opérateurs de comparaison

| Opérateur | Signification |
|---|---|
| `==` | égal à |
| `!=` | différent de |
| `>` | supérieur à |
| `<` | inférieur à |
| `>=` | supérieur ou égal |
| `<=` | inférieur ou égal |

```python
x = 10

x == 10   # True
x != 5    # True
x > 20    # False
x <= 10   # True
```

---

## 4) Les opérateurs logiques

Permettent de combiner plusieurs conditions.

| Opérateur | Signification |
|---|---|
| `and` | les deux conditions doivent être vraies |
| `or` | au moins une condition doit être vraie |
| `not` | inverse la condition |

```python
age = 20
admin = True

if age >= 18 and admin:
    print("Accès autorisé")

if age < 13 or age > 65:
    print("Tarif réduit")

if not admin:
    print("Accès refusé")
```

---

## 5) Les valeurs booléennes

En Python, tout peut être évalué comme `True` ou `False`.

Valeurs considérées comme `False` :

```python
False
0
""        # chaîne vide
[]        # liste vide
{}        # dict vide
None
```

Tout le reste est `True`.

```python
nom = ""

if nom:
    print("Nom renseigné")
else:
    print("Nom vide")
```

---

## 6) `in` et `not in`

Vérifie si une valeur est présente dans une séquence.

```python
fruits = ["pomme", "banane", "cerise"]

if "pomme" in fruits:
    print("trouvé")

if "mangue" not in fruits:
    print("absent")
```

Fonctionne aussi sur les chaînes :

```python
if "admin" in "panel_admin_login":
    print("mot trouvé")
```

---

## 7) `is` et `is not`

Vérifie si deux variables pointent vers le **même objet en mémoire** — différent de `==` qui compare les valeurs.

```python
x = None

if x is None:
    print("x est None")

if x is not None:
    print("x a une valeur")
```

> Utiliser `is` uniquement pour comparer avec `None`, `True`, `False`.

---

## 8) Condition ternaire

Écrire une condition en une seule ligne.

```python
# syntaxe : valeur_si_vrai if condition else valeur_si_faux

age = 20
statut = "majeur" if age >= 18 else "mineur"
print(statut)  # majeur
```

---

## 9) Résumé

| Concept | Exemple |
|---|---|
| Condition simple | `if x > 0:` |
| Alternative | `else:` |
| Multiple | `elif x == 0:` |
| Combinaison | `if x > 0 and x < 10:` |
| Appartenance | `if x in liste:` |
| Identité | `if x is None:` |
| Ternaire | `"oui" if x else "non"` |
