# Introduction au langage Python

## 1) Qu'est-ce que Python ?

Python est un langage de programmation interprété, simple à lire et très utilisé dans :

- le développement web
- la cybersécurité
- le scripting / automatisation
- la data / IA
- les outils DevOps

Créé par Guido van Rossum en 1991.

---

## 2) Installation et premier programme

Pour vérifier si Python est installé :

```bash
python3 --version
```

Premier programme :

```python
print("Hello, world!")
```

> `print()` affiche du texte dans la console.

---

## 3) Les variables

En Python, on ne déclare pas le type explicitement.

```python
age = 21
nom = "Wayl"
taille = 1.80
est_etudiant = True
```

Types principaux :

- `int` → entier
- `float` → nombre décimal
- `str` → chaîne de caractères
- `bool` → True / False

Vérifier le type :

```python
print(type(age))
```

---

## 4) Les opérations

### Mathématiques

```python
a = 10
b = 3

print(a + b)   # addition
print(a - b)   # soustraction
print(a * b)   # multiplication
print(a / b)   # division
print(a % b)   # modulo
print(a ** b)  # puissance
```

---

## 5) Les conditions

```python
age = 18

if age >= 18:
    print("Majeur")
else:
    print("Mineur")
```

> ⚠️ Python utilise l'indentation (espaces) au lieu des `{}`.

---

## 6) Les boucles

### Boucle `while`

```python
i = 0
while i < 5:
    print(i)
    i += 1
```

### Boucle `for`

```python
for i in range(5):
    print(i)
```

---

## 7) Les fonctions

```python
def dire_bonjour(nom):
    print("Bonjour", nom)

dire_bonjour("Wayl")
```

Avec retour :

```python
def addition(a, b):
    return a + b

resultat = addition(3, 4)
print(resultat)
```

---

## 8) Les listes

```python
nombres = [1, 2, 3, 4]

print(nombres[0])  # premier élément
```

Ajouter un élément :

```python
nombres.append(5)
```

Parcourir une liste :

```python
for n in nombres:
    print(n)
```

---

## 9) Les dictionnaires

```python
personne = {
    "nom": "Wayl",
    "age": 21
}

print(personne["nom"])
```

---

## 10) Les bases de la POO

```python
class Chien:
    def __init__(self, nom):
        self.nom = nom

    def aboyer(self):
        print(self.nom, "aboie")

maya = Chien("Maya")
maya.aboyer()
```

---

## Résumé

Python est simple, lisible, puissant et polyvalent.
