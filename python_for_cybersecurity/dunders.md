# Les dunders en Python

## 1. Idée générale

En Python, certains noms sont entourés de **deux underscores de chaque côté** :

```python
__name__
__init__
__doc__
__str__
```

On les appelle des **dunders**, contraction de *double underscore*.

Ces noms ne sont pas choisis au hasard. Ils ont une **signification particulière pour Python lui-même**. Le langage les reconnaît, les utilise, et leur donne un comportement précis.

Un dunder n'est pas un nom comme les autres : c'est un nom que Python s'attend à trouver pour faire fonctionner certains mécanismes internes.

---

## 2. À quoi servent les dunders ?

Les dunders permettent à Python de savoir **comment un objet doit se comporter** dans certaines situations.

Par exemple :

- Comment afficher un objet ?
- Comment l'initialiser ?
- Comment le comparer à un autre ?
- Comment savoir d'où vient un fichier ?

Chaque dunder répond à une question précise que Python peut se poser en interne.

Le développeur ne les appelle pas directement dans la plupart des cas. C'est **Python qui les appelle automatiquement** quand il en a besoin.

---

## 3. Quelques dunders courants (sans détail)

Voici quelques dunders qu'on croise souvent :

| Dunder | Rôle général |
|---|---|
| `__init__` | Initialiser un objet à sa création |
| `__str__` | Définir comment un objet s'affiche en texte |
| `__repr__` | Définir une représentation technique de l'objet |
| `__len__` | Définir ce que `len()` renvoie pour un objet |
| `__doc__` | Contenir la documentation d'une fonction ou d'une classe |
| `__name__` | Contenir le nom du module en cours d'exécution |

Pas besoin de tous les connaître maintenant. L'important est de comprendre le principe : **chaque dunder a un rôle défini par Python**.

---

## 4. Focus : `__name__`

`__name__` est un dunder particulier. Ce n'est pas une méthode, c'est une **variable spéciale** que Python crée automatiquement dans chaque fichier.

### Ce qu'elle contient

- Si le fichier est **exécuté directement** : `__name__` vaut `"__main__"`.
- Si le fichier est **importé** depuis un autre fichier : `__name__` vaut le nom du module (le nom du fichier sans `.py`).

### Exemple

Fichier `outils.py` :

```python
print(__name__)
```

Si on exécute directement `outils.py` :

```
__main__
```

Si on importe `outils` depuis un autre fichier :

```
outils
```

### Pourquoi c'est utile

Grâce à `__name__`, on peut écrire :

```python
if __name__ == "__main__":
    main()
```

Cette condition veut dire : "lance `main()` **seulement** si ce fichier est exécuté directement".

Si le fichier est importé, `__name__` ne vaut pas `"__main__"`, donc `main()` ne se lance pas.

C'est ce qui permet à un même fichier de servir :

- Soit de **programme** (exécution directe).
- Soit de **module** (importation dans un autre fichier).

### En résumé

`__name__` est un dunder qui permet de **savoir dans quel contexte un fichier est utilisé**. C'est probablement le dunder le plus rencontré quand on débute en Python.

---

## 5. Règle importante : ne jamais inventer de dunder

Les dunders sont **réservés à Python**.

Il ne faut jamais créer ses propres noms en `__quelquechose__`. Ce format est réservé au langage et à ses mécanismes internes.

Si on veut un nom "privé" ou "spécial", on utilise :

- `_nom` → convention pour usage interne.
- `__nom` → traitement particulier par Python (name mangling).

Mais jamais `__nom__` pour un usage personnel.

---

## 6. Ce qu'il faut retenir

- Les dunders sont des noms entourés de `__` de chaque côté.
- Ils ont un **sens précis pour Python**.
- Python les appelle automatiquement dans certaines situations.
- `__name__` est un dunder qui indique si un fichier est exécuté directement ou importé.
- Il ne faut **jamais inventer ses propres dunders**.

---

## 7. Résumé très court

Les dunders (*double underscores*) sont des noms spéciaux que Python reconnaît et utilise en interne.

Le plus courant au début est `__name__`, qui permet d'écrire :

```python
if __name__ == "__main__":
    main()
```

pour contrôler le comportement d'un fichier selon qu'il est exécuté ou importé.

> **Les dunders appartiennent à Python. On les utilise, on ne les invente pas.**
