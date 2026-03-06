# La fonction `print()` en Python

## 1. Syntaxe de base

```python
print("Hello, World!")  # Hello, World!
```

---

## 2. Signature complète

```python
print(*objects, sep=' ', end='\n', file=sys.stdout, flush=False)
```

| Paramètre | Défaut | Rôle |
|-----------|--------|------|
| `*objects` | — | Valeurs à afficher |
| `sep` | `' '` | Séparateur entre les valeurs |
| `end` | `'\n'` | Caractère de fin |
| `file` | `sys.stdout` | Destination de la sortie |
| `flush` | `False` | Force l'écriture immédiate |

---

## 3. Afficher plusieurs valeurs

```python
print("Hello", "World", "!")
# Hello World !

print("Hello", "World", sep="-")
# Hello-World
```

---

## 4. Modifier la fin de ligne

```python
print("Hello", end="")   # pas de retour à la ligne
print("Hello", end="\n") # comportement par défaut
print("Hello", end="!\n") # Hello!
```

---

## 5. Formater les valeurs

### Concaténation (déconseillé)
```python
nom = "Wayl"
print("Bonjour " + nom)
```

### f-strings (recommandé)
```python
nom = "Wayl"
age = 25
print(f"Nom : {nom}, Age : {age}")
# Nom : Wayl, Age : 25
```

### Formatage numérique avec f-strings
```python
nombre = 1709123456.7891

print(f"{nombre:,.4f}")   # 1,709,123,456.7891  → séparateurs de milliers
print(f"{nombre:.2e}")    # 1.71e+09             → notation scientifique
print(f"{nombre:.2f}")    # 1709123456.79        → 2 décimales
```

---

## 6. Rediriger vers stderr

```python
import sys

print("Erreur critique", file=sys.stderr)
```

---

## 7. Afficher des types différents

```python
print(42)           # int
print(3.14)         # float
print(True)         # bool
print([1, 2, 3])    # list
print({"a": 1})     # dict
```

`print()` appelle automatiquement `str()` sur chaque objet.

---

## 8. Cas pratiques

```python
# Affichage sur la même ligne en boucle
for i in range(5):
    print(i, end=" ")
# 0 1 2 3 4

# Ligne vide
print()

# Séparateur personnalisé
print("2024", "01", "15", sep="/")
# 2024/01/15
```

---

## Résumé

- `print()` → affiche dans stdout par défaut
- `sep` → contrôle le séparateur entre arguments
- `end` → contrôle le caractère de fin (`\n` par défaut)
- `file` → redirige la sortie (ex: `sys.stderr`)
- f-strings → façon la plus propre de formater
