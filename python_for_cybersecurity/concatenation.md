# La Concaténation en Python

## 1. Qu'est-ce que la concaténation ?

Assembler plusieurs chaînes de caractères en une seule.

```python
resultat = "Hello" + " " + "World"
print(resultat)  # Hello World
```

---

## 2. Les méthodes de concaténation

### Méthode 1 — Opérateur `+`
```python
nom = "Wayl"
message = "Hello " + nom
print(message)  # Hello Wayl
```

⚠️ Ne fonctionne qu'entre strings. Un autre type provoque une erreur :
```python
age = 25
print("Age : " + age)        # ✗ TypeError
print("Age : " + str(age))   # ✓ conversion manuelle obligatoire
```

---

### Méthode 2 — Opérateur `,` (dans print uniquement)
```python
nom = "Wayl"
age = 25
print("Nom :", nom, "| Age :", age)
# Nom : Wayl | Age : 25
```

Ajoute automatiquement un espace entre chaque argument. Pas utilisable hors de `print()`.

---

### Méthode 3 — f-strings (recommandé) — Python 3.6+
```python
nom = "Wayl"
age = 25
message = f"Nom : {nom}, Age : {age}"
print(message)  # Nom : Wayl, Age : 25
```

Accepte n'importe quel type directement. Peut contenir des expressions :
```python
a = 10
b = 5
print(f"Résultat : {a + b}")    # Résultat : 15
print(f"Majuscule : {nom.upper()}")  # Majuscule : WAYL
```

---

### Méthode 4 — `.format()`
```python
nom = "Wayl"
age = 25
message = "Nom : {}, Age : {}".format(nom, age)
print(message)  # Nom : Wayl, Age : 25

# Avec index
message = "Nom : {0}, encore {0}, Age : {1}".format(nom, age)

# Avec nom
message = "Nom : {nom}, Age : {age}".format(nom="Wayl", age=25)
```

Syntaxe plus ancienne. Toujours valide mais f-string lui est supérieur.

---

### Méthode 5 — `*` pour répéter
```python
print("=" * 20)   # ====================
ligne = "-" * 10  # ----------
```

---

### Méthode 6 — `join()` pour les listes
```python
mots = ["Hello", "World", "!"]
resultat = " ".join(mots)
print(resultat)  # Hello World !

# Séparateur personnalisé
resultat = "-".join(mots)
print(resultat)  # Hello-World-!
```

Beaucoup plus performant que `+` en boucle.

---

## 3. Concaténation en boucle — piège de performance

```python
# ✗ Mauvais — crée un nouvel objet string à chaque itération
resultat = ""
for mot in ["Hello", "World", "!"]:
    resultat += mot + " "

# ✓ Bon — join() est optimisé
resultat = " ".join(["Hello", "World", "!"])
```

---

## 4. Formatage numérique dans les f-strings

```python
nombre = 1709123456.7891

print(f"{nombre:,.4f}")   # 1,709,123,456.7891  → séparateurs de milliers
print(f"{nombre:.2e}")    # 1.71e+09             → notation scientifique
print(f"{nombre:.2f}")    # 1709123456.79        → 2 décimales
print(f"{nombre:>20}")    # alignement à droite sur 20 caractères
print(f"{nombre:<20}")    # alignement à gauche
```

---

## 5. Strings multilignes

```python
message = (
    "Ligne 1 "
    "Ligne 2 "
    "Ligne 3"
)
# Python concatène automatiquement les strings adjacents

message = """
Ligne 1
Ligne 2
Ligne 3
"""
```

---

## Résumé

| Méthode | Syntaxe | Recommandé |
|---------|---------|------------|
| `+` | `"a" + "b"` | Simple, mais fragile avec autres types |
| `,` | `print("a", b)` | print() uniquement |
| f-string | `f"a {var}"` | ✓ Standard actuel |
| `.format()` | `"a {}".format(b)` | Ancienne syntaxe |
| `join()` | `" ".join(liste)` | ✓ Pour les listes |
| `*` | `"a" * 3` | Répétition uniquement |

**Règle** : f-string par défaut. `join()` pour les listes.
