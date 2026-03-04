# Les strings en Python

## 1) Qu'est-ce qu'une string ?

Une string est une chaîne de caractères. En Python, elle se déclare avec des guillemets simples ou doubles.

```python
nom = "Wayl"
message = 'Hello World'
```

---

## 2) Créer une string

```python
s1 = "double guillemets"
s2 = 'simple guillemets'
s3 = """
string
multi-ligne
"""
```

---

## 3) Concaténation

Assembler deux strings ensemble.

```python
prenom = "Wayl"
message = "Bonjour " + prenom
print(message)  # Bonjour Wayl
```

---

## 4) f-strings — le plus utilisé

Insérer des variables directement dans une string.

```python
host = "localhost"
port = 8080
url = f"http://{host}:{port}/login"
print(url)  # http://localhost:8080/login
```

---

## 5) Accès aux caractères

Une string est une séquence — on accède aux caractères par index.

```python
s = "Wayl"

print(s[0])   # W
print(s[1])   # a
print(s[-1])  # l  (dernier caractère)
```

---

## 6) Slicing — extraire une partie

```python
s = "localhost:8080"

print(s[0:9])    # localhost
print(s[10:])    # 8080
print(s[:9])     # localhost
print(s[-4:])    # 8080
```

Syntaxe : `s[debut:fin]` — `fin` est exclu.

---

## 7) Méthodes essentielles

### Casse

```python
s = "Hello World"

s.lower()    # "hello world"
s.upper()    # "HELLO WORLD"
```

### Nettoyer

```python
s = "  admin  "

s.strip()    # "admin"  (supprime espaces début et fin)
s.lstrip()   # "admin  " (supprime espaces à gauche)
s.rstrip()   # "  admin" (supprime espaces à droite)
```

### Chercher

```python
s = "panel_admin_login"

s.find("admin")      # 6  (index de début, -1 si absent)
s.count("a")         # 3  (nombre d'occurrences)
"admin" in s         # True
s.startswith("panel") # True
s.endswith("login")   # True
```

### Remplacer

```python
s = "Hello World"

s.replace("World", "Wayl")   # "Hello Wayl"
```

### Découper / Assembler

```python
s = "root:x:0:0:root:/root:/bin/bash"

parts = s.split(":")   # ["root", "x", "0", "0", "root", "/root", "/bin/bash"]
print(parts[0])        # root
print(parts[-1])       # /bin/bash

":".join(["a", "b", "c"])   # "a:b:c"
```

### Longueur

```python
len("hello")   # 5
```

---

## 8) Vérifications utiles

```python
s = "12345"

s.isdigit()    # True  — que des chiffres
s.isalpha()    # False — que des lettres
s.isalnum()    # True  — lettres et chiffres
```

---

## 9) Encoder / Décoder

Utile pour manipuler des données en base64 ou des bytes.

```python
s = "hello"

s.encode()           # b'hello'  (bytes)
b"hello".decode()    # "hello"   (string)
```

---

## 10) Exemple concret — parser une réponse HTTP

```python
response = "HTTP/1.1 200 OK\nContent-Type: text/html\n\n<html>flag{secret}</html>"

# extraire le flag
if "flag{" in response:
    start = response.find("flag{")
    end = response.find("}", start) + 1
    flag = response[start:end]
    print(flag)  # flag{secret}
```

---

## 11) Résumé

| Méthode | Usage |
|---|---|
| `lower()` / `upper()` | Changer la casse |
| `strip()` | Nettoyer les espaces |
| `find()` | Trouver un index |
| `replace()` | Remplacer |
| `split()` | Découper en liste |
| `join()` | Assembler une liste |
| `in` | Vérifier la présence |
| `len()` | Longueur |
| `encode()` / `decode()` | Conversion bytes |
