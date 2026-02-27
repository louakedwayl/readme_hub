# Les variables en Python

Python est un langage à typage dynamique — le type d'une variable est déterminé à l'exécution et peut changer au cours du programme.

## 1) Qu'est-ce qu'une variable ?

Une variable est une boîte qui stocke une valeur en mémoire. On lui donne un nom pour pouvoir la réutiliser.

```python
age = 21
```

Ici `age` est le nom, `21` est la valeur.

---

## 2) Déclarer une variable

En Python, pas besoin de déclarer le type. Python le détecte automatiquement.

```python
age = 21
nom = "Wayl"
taille = 1.80
est_admin = True
```

---

## 3) Les types principaux

| Type | Exemple | Description |
|---|---|---|
| `int` | `42` | Nombre entier |
| `float` | `3.14` | Nombre décimal |
| `str` | `"hello"` | Chaîne de caractères |
| `bool` | `True / False` | Booléen |

Vérifier le type d'une variable :

```python
print(type(age))    # <class 'int'>
```

---

## 4) Modifier une variable

Une variable peut être réassignée à tout moment.

```python
score = 0
score = 10
score = score + 5   # score vaut 15
```

---

## 5) Nommage

Règles :
- Commence par une lettre ou `_`, jamais par un chiffre
- Pas d'espaces — utiliser `_` à la place
- Sensible à la casse : `Nom` et `nom` sont deux variables différentes

```python
nom_utilisateur = "wayl"    # correct
_privé = "secret"           # correct
2fast = "non"               # incorrect
```

Convention Python : `snake_case` — tout en minuscules, mots séparés par `_`.

---

## 6) Afficher une variable

```python
nom = "Wayl"
print(nom)              # Wayl
print("Nom :", nom)     # Nom : Wayl
print(f"Bonjour {nom}") # Bonjour Wayl
```

---

## 7) Affecter plusieurs variables en une ligne

```python
x, y, z = 1, 2, 3
a = b = c = 0       # toutes valent 0
```

---

## 8) Supprimer une variable

```python
del age
```

Après `del`, la variable n'existe plus — y accéder provoque une erreur.
