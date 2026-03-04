# Les boucles en Python

En Python, les boucles ne nécessitent pas de parenthèses — contrairement à C ou JavaScript.

## 1) Qu'est-ce qu'une boucle ?

Une boucle permet de répéter un bloc de code plusieurs fois sans le réécrire. Python propose deux types de boucles : `for` et `while`.

---

## 2) La boucle `for`

La boucle `for` itère sur une séquence — une liste, une chaîne, un range, etc.

```python
for i in range(5):
    print(i)
# affiche 0, 1, 2, 3, 4
```

### `range()`

`range()` génère une séquence de nombres.

```python
range(5)        # 0, 1, 2, 3, 4
range(2, 8)     # 2, 3, 4, 5, 6, 7
range(0, 10, 2) # 0, 2, 4, 6, 8  (pas de 2)
```

### Itérer sur une liste

```python
fruits = ["pomme", "banane", "cerise"]

for fruit in fruits:
    print(fruit)
```

### Itérer sur une chaîne de caractères

```python
for lettre in "Wayl":
    print(lettre)
# W, a, y, l
```

---

## 3) La boucle `while`

La boucle `while` s'exécute tant qu'une condition est vraie.

```python
i = 0
while i < 5:
    print(i)
    i += 1
# affiche 0, 1, 2, 3, 4
```

> Attention : si la condition ne devient jamais fausse, la boucle tourne indéfiniment — c'est une boucle infinie.

### Boucle infinie volontaire

```python
while True:
    commande = input("Entrez une commande : ")
    if commande == "exit":
        break
```

---

## 4) `break` — sortir d'une boucle

`break` arrête immédiatement la boucle.

```python
for i in range(10):
    if i == 5:
        break
    print(i)
# affiche 0, 1, 2, 3, 4
```

---

## 5) `continue` — passer à l'itération suivante

`continue` saute le reste du bloc et passe à l'itération suivante.

```python
for i in range(10):
    if i % 2 == 0:
        continue
    print(i)
# affiche 1, 3, 5, 7, 9 (ignore les pairs)
```

---

## 6) `else` sur une boucle

Le bloc `else` s'exécute quand la boucle se termine normalement — sans `break`.

```python
for i in range(5):
    print(i)
else:
    print("boucle terminée")
```

```python
for i in range(5):
    if i == 3:
        break
else:
    print("jamais affiché — break déclenché")
```

---

## 7) Boucles imbriquées

Une boucle dans une boucle.

```python
for i in range(3):
    for j in range(3):
        print(i, j)
```

---

## 8) `enumerate()` — index + valeur

Quand tu as besoin de l'index en même temps que la valeur.

```python
fruits = ["pomme", "banane", "cerise"]

for index, fruit in enumerate(fruits):
    print(index, fruit)
# 0 pomme
# 1 banane
# 2 cerise
```

---

## 9) Résumé

| | `for` | `while` |
|---|---|---|
| Usage | Itération sur une séquence | Condition à respecter |
| Nombre d'itérations | Connu à l'avance | Pas forcément connu |
| Risque boucle infinie | Non | Oui |

Mots-clés utiles :

- `break` → sortir de la boucle
- `continue` → passer à l'itération suivante
- `else` → exécuté si pas de `break`
- `enumerate()` → index + valeur simultanément
