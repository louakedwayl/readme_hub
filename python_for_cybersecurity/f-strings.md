# Les f-strings en Python

## 1. Définition

Une f-string est une chaîne de caractères préfixée par `f` qui permet d'insérer des expressions Python directement dans la chaîne via `{}`.

```python
nom = "Wayl"
print(f"Bonjour {nom}")  # Bonjour Wayl
```

Introduites en **Python 3.6**. Standard actuel.

---

## 2. Syntaxe de base

```python
f"texte {expression} texte"
```

```python
nom = "Wayl"
age = 25

print(f"Nom : {nom}")           # Nom : Wayl
print(f"Age : {age}")           # Age : 25
print(f"Nom : {nom}, Age : {age}")  # Nom : Wayl, Age : 25
```

---

## 3. Expressions dans `{}`

Les `{}` acceptent n'importe quelle expression Python valide.

```python
a = 10
b = 5

print(f"Somme : {a + b}")           # Somme : 15
print(f"Majuscule : {nom.upper()}") # Majuscule : WAYL
print(f"Longueur : {len(nom)}")     # Longueur : 4
print(f"Pair ? : {a % 2 == 0}")     # Pair ? : True
```

---

## 4. Formatage numérique

La syntaxe est `{valeur:format}`.

### Décimales
```python
pi = 3.14159265

print(f"{pi:.2f}")   # 3.14   → 2 décimales
print(f"{pi:.4f}")   # 3.1416 → 4 décimales
```

### Séparateurs de milliers
```python
nombre = 1709123456.7891

print(f"{nombre:,.2f}")   # 1,709,123,456.79
print(f"{nombre:,.4f}")   # 1,709,123,456.7891
```

### Notation scientifique
```python
print(f"{nombre:.2e}")   # 1.71e+09
print(f"{nombre:.4e}")   # 1.7091e+09
```

### Entiers
```python
n = 1000000

print(f"{n:,}")    # 1,000,000  → séparateurs
print(f"{n:b}")    # binaire
print(f"{n:x}")    # hexadécimal
print(f"{n:o}")    # octal
```

---

## 5. Alignement et padding

```python
nom = "Wayl"

print(f"{nom:>10}")    # "      Wayl"  → aligné à droite
print(f"{nom:<10}")    # "Wayl      "  → aligné à gauche
print(f"{nom:^10}")    # "   Wayl   "  → centré
print(f"{nom:*^10}")   # "***Wayl***"  → centré avec remplissage *
```

---

## 6. Formatage de dates

```python
from datetime import datetime

maintenant = datetime.now()

print(f"{maintenant:%b %d %Y}")      # Oct 21 2022
print(f"{maintenant:%d/%m/%Y}")      # 21/10/2022
print(f"{maintenant:%H:%M:%S}")      # 14:30:45
```

---

## 7. Guillemets dans une f-string

```python
print(f"Il s'appelle {'Wayl'}")         # guillemets simples dans doubles
print(f'Il s\'appelle {"Wayl"}')        # guillemets doubles dans simples
```

---

## 8. F-strings multilignes

```python
nom = "Wayl"
age = 25

message = (
    f"Nom : {nom}\n"
    f"Age : {age}\n"
)
print(message)
```

---

## 9. Débogage avec `=` (Python 3.8+)

```python
nom = "Wayl"
age = 25

print(f"{nom=}")    # nom='Wayl'
print(f"{age=}")    # age=25
```

Affiche automatiquement le nom de la variable et sa valeur. Utile pour déboguer.

---

## Tableau des spécificateurs de format

| Spécificateur | Effet | Exemple |
|--------------|-------|---------|
| `.2f` | 2 décimales | `3.14` |
| `,` | Séparateur milliers | `1,000,000` |
| `,.2f` | Les deux | `1,000,000.00` |
| `.2e` | Notation scientifique | `1.71e+09` |
| `>10` | Aligné droite sur 10 | `"      Wayl"` |
| `<10` | Aligné gauche sur 10 | `"Wayl      "` |
| `^10` | Centré sur 10 | `"   Wayl   "` |
| `b` | Binaire | `1010` |
| `x` | Hexadécimal | `ff` |
| `%b %d %Y` | Format date | `Oct 21 2022` |

---

## Résumé

- Préfixe `f` avant la chaîne
- `{}` contient n'importe quelle expression Python
- `{valeur:format}` pour le formatage avancé
- Gère automatiquement la conversion de type
- Plus rapide et lisible que `+` ou `.format()`
