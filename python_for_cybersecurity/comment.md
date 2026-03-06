# Les Commentaires en Python

## 1. Définition

Un commentaire est une portion de code **ignorée par l'interpréteur Python**.  
Son seul destinataire : le développeur qui lit le code.

---

## 2. Commentaire sur une seule ligne

Syntaxe : `#` suivi du texte.

```python
# Ceci est un commentaire
x = 42  # Commentaire en fin de ligne
```

> Le `#` peut se placer en début de ligne ou après une instruction.

---

## 3. Commentaire sur plusieurs lignes

Python n'a pas de syntaxe native pour les blocs de commentaires.  
Deux approches sont utilisées en pratique.

### 3.1 Plusieurs `#` consécutifs

```python
# Étape 1 : récupération des données
# Étape 2 : traitement
# Étape 3 : export des résultats
```

### 3.2 Chaîne de caractères multiligne (non assignée)

```python
"""
Ceci est souvent utilisé comme commentaire bloc.
L'interpréteur l'évalue mais ne l'assigne à rien.
Attention : ce n'est pas un vrai commentaire, c'est une expression ignorée.
"""
```

> ⚠ Cette pratique est tolérée mais à éviter dans le corps d'une fonction — elle peut interférer avec les `docstrings`.

---

## 4. Désactiver du code temporairement

```python
x = 10
# y = x * 2  ← ligne désactivée
z = x + 5
```

Usage courant en debug pour isoler un comportement.

---

## 5. Les Docstrings

Les docstrings ne sont **pas** des commentaires ordinaires.  
Ce sont des chaînes de documentation rattachées à un objet (fonction, classe, module).

```python
def addition(a, b):
    """
    Retourne la somme de a et b.

    Paramètres :
        a (int) : premier opérande
        b (int) : second opérande

    Retour :
        int : résultat de l'addition
    """
    return a + b
```

Accessible via :

```python
print(addition.__doc__)
help(addition)
```

### Différence commentaire vs docstring

| Critère         | Commentaire (`#`)         | Docstring (`"""`)              |
|-----------------|---------------------------|-------------------------------|
| Ignoré par Python | Oui                     | Non (stocké en mémoire)       |
| Accessible runtime | Non                   | Oui (`__doc__`)               |
| Usage principal | Explications internes     | Documentation officielle      |
| Outil `help()`  | Non                       | Oui                           |

---

## 6. Bonnes pratiques

- **Commenter le pourquoi, pas le quoi.**

```python
# ❌ Mauvais : redondant avec le code
x = x + 1  # incrémente x de 1

# ✅ Bon : apporte une information utile
x = x + 1  # décalage d'index pour ignorer l'en-tête CSV
```

- **Ne pas laisser de code commenté en production.** Utiliser un système de versioning (Git).
- **Maintenir les commentaires à jour.** Un commentaire obsolète est pire qu'aucun commentaire.
- **Longueur** : une ligne de commentaire ne devrait pas dépasser 72 caractères (PEP 8).

---

## 7. PEP 8 — Conventions officielles

- Un espace après le `#` : `# commentaire` et non `#commentaire`
- Commentaires en ligne séparés par **deux espaces** du code :

```python
x = 42  # valeur initiale
```

- Les commentaires doivent être des **phrases complètes** avec majuscule initiale.
- Éviter les commentaires inutiles qui paraphrasent le code.

---

## 8. Résumé

```python
# Commentaire simple — ignoré par l'interpréteur

x = 10  # Commentaire inline

# Bloc de commentaires
# sur plusieurs lignes
# avec des # successifs

def ma_fonction():
    """Docstring : documentation officielle de la fonction."""
    pass
```

---

*Référence : [PEP 8 — Style Guide for Python Code](https://peps.python.org/pep-0008/)*
