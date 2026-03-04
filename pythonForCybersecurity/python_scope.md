# La portée des variables en Python (Scope)

## 1) Qu'est-ce que la portée ?

La portée d'une variable définit l'endroit dans le code où elle est accessible. Une variable n'est pas forcément accessible partout — ça dépend d'où elle a été déclarée.

---

## 2) Les deux portées principales

### Variable locale

Déclarée à l'intérieur d'une fonction — accessible uniquement dans cette fonction.

```python
def ma_fonction():
    x = 10      # variable locale
    print(x)    # fonctionne

ma_fonction()
print(x)        # Erreur — x n'existe pas ici
```

### Variable globale

Déclarée en dehors de toute fonction — accessible partout dans le fichier.

```python
x = 10          # variable globale

def ma_fonction():
    print(x)    # fonctionne

ma_fonction()
print(x)        # fonctionne aussi
```

---

## 3) Modifier une variable globale depuis une fonction

Par défaut, une fonction ne peut pas modifier une variable globale — elle en crée une locale du même nom.

```python
x = 10

def modifier():
    x = 20      # crée une variable locale, ne modifie pas x global
    print(x)    # 20

modifier()
print(x)        # 10 — x global n'a pas changé
```

Pour modifier la variable globale, utiliser le mot-clé `global` :

```python
x = 10

def modifier():
    global x
    x = 20

modifier()
print(x)        # 20 — x global a été modifié
```

---

## 4) La règle LEGB

Python cherche une variable dans cet ordre :

| Lettre | Signification | Description |
|---|---|---|
| L | Local | À l'intérieur de la fonction |
| E | Enclosing | Dans la fonction parente (fonctions imbriquées) |
| G | Global | Au niveau du fichier |
| B | Built-in | Fonctions natives Python (`print`, `len`, etc.) |

```python
x = "global"

def externe():
    x = "enclosing"

    def interne():
        print(x)    # cherche local → pas trouvé → enclosing → "enclosing"

    interne()

externe()
```

---

## 5) Fonctions imbriquées et `nonlocal`

Dans une fonction imbriquée, pour modifier la variable de la fonction parente, utiliser `nonlocal`.

```python
def externe():
    x = 10

    def interne():
        nonlocal x
        x = 20

    interne()
    print(x)    # 20

externe()
```

---

## 6) Les variables built-in

Python a des noms réservés aux fonctions natives : `print`, `len`, `range`, `input`, etc.

Ne jamais les écraser :

```python
# A ne pas faire
len = 10        # écrase la fonction len()
print(len("hello"))  # Erreur
```

---

## 7) Résumé

- **Local** — déclarée dans une fonction, accessible uniquement dedans
- **Global** — déclarée hors fonction, accessible partout
- `global` — permet de modifier une variable globale depuis une fonction
- `nonlocal` — permet de modifier une variable de la fonction parente
- Python cherche les variables dans l'ordre LEGB
