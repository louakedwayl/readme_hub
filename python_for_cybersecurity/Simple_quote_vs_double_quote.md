# Simple vs Double Quotes en Python

---

## La réponse courte

```python
'hello' == "hello"   # True
```

**Aucune différence fonctionnelle.** Python traite les deux identiquement.  
C'est une question de convention et de lisibilité.

---

## Alors pourquoi les deux existent ?

Pour éviter les caractères d'échappement quand ton texte contient des quotes.

```python
# Sans mélange → backslash obligatoire
msg = 'C\'est la vie'
msg = "Il a dit \"bonjour\""

# Avec mélange → plus propre
msg = "C'est la vie"
msg = 'Il a dit "bonjour"'
```

Règle simple : si ton texte contient des `'`, utilise `"`. Et inversement.

---

## Triple quotes — `'''` et `"""`

Pour les chaînes multilignes.

```python
texte = """
Ligne 1
Ligne 2
Ligne 3
"""

sql = '''
    SELECT *
    FROM users
    WHERE age > 18
'''
```

Les deux (`'''` et `"""`) fonctionnent pareil.  
Convention : `"""` pour les docstrings (documentation de fonctions/classes).

```python
def saluer(nom: str) -> str:
    """Retourne un message de salutation."""
    return f"Bonjour {nom}"
```

---

## F-strings — les deux fonctionnent

```python
nom = "Wayl"

f"Bonjour {nom}"    # "Bonjour Wayl"
f'Bonjour {nom}'    # "Bonjour Wayl" — identique
```

Attention avec les quotes **à l'intérieur** d'une f-string :

```python
user = {"nom": "Wayl"}

# ❌ Conflit de quotes
f"Bonjour {user["nom"]}"    # SyntaxError en Python < 3.12

# ✅ Mélanger les quotes
f"Bonjour {user['nom']}"    # "Bonjour Wayl"

# ✅ Python 3.12+ — les deux types acceptés à l'intérieur
f"Bonjour {user["nom"]}"    # valide depuis 3.12
```

---

## Comparaison avec les autres langages

### JavaScript
Même logique — `'` et `"` sont interchangeables.  
JS ajoute les **template literals** avec des backticks :

```js
const nom = "Wayl";
`Bonjour ${nom}`    // équivalent de la f-string Python
```

Python n'a pas de troisième type de quote — les f-strings utilisent `'` ou `"`.

---

### PHP
PHP fait une **distinction fonctionnelle** — contrairement à Python.

```php
$nom = "Wayl";

echo 'Bonjour $nom';    // "Bonjour $nom"  — PAS interpolé
echo "Bonjour $nom";    // "Bonjour Wayl"  — interpolé
```

**En PHP, les simples quotes sont littérales.** Les doubles quotes interprètent les variables.  
C'est l'inverse de Python où les deux se comportent pareil.

---

### C
C ne connaît que les doubles quotes pour les chaînes, et les simples pour les **caractères** :

```c
char lettre = 'A';      // char — UN seul caractère
char* mot   = "Wayl";   // string — tableau de chars

'AB'   // ❌ invalide en C
"A"    // ✅ string de longueur 1
```

Python n'a pas de type `char` — `'A'` et `"A"` sont tous les deux des `str`.

---

## Convention PEP 8

PEP 8 (le guide de style officiel Python) **ne tranche pas** — les deux sont acceptés.  
En pratique, deux écoles :

| École | Choix | Raison |
|---|---|---|
| Majority Python | `'` simple | Moins de shift au clavier |
| Django / Web | `"` double | Cohérence avec JSON et HTML |
| Black (formatter) | `"` double | Imposé automatiquement |

Si tu utilises **Black** comme formatter → il convertit tout en `"`. Pas de débat.

---

## Résumé

| Cas | Recommandation |
|---|---|
| Cas général | Choisis l'un, reste cohérent |
| Texte avec `'` | Utilise `"` |
| Texte avec `"` | Utilise `'` |
| Multiligne | `"""` |
| Docstrings | `"""` obligatoire par convention |
| F-string avec dict | `f"...{d['clé']}..."` — mélange les quotes |
| Projet avec Black | `"` — automatique |
| PHP comparaison | Attention : en PHP `'` ne fait PAS d'interpolation |
