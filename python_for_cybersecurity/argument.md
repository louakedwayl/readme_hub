# Les arguments en Python

## À quoi ça sert ?

Les arguments permettent de :

- donner une information à un script au lancement,
- changer son comportement sans modifier le code,
- rendre un script plus flexible.

## Où Python stocke les arguments ?

Python stocke les arguments dans `sys.argv`.

Pour l'utiliser :

```python
import sys
```

`sys.argv` est une liste.

## Comment fonctionne `sys.argv` ?

- `sys.argv[0]` contient le nom du script
- `sys.argv[1]` contient le premier argument
- `sys.argv[2]` contient le deuxième argument
- etc.

### Exemple

```python
import sys

print(sys.argv)
```

Si on lance :

```bash
python3 script.py salut 42
```

Python lit une liste comme :

```python
['script.py', 'salut', '42']
```

## Point important

Les arguments récupérés avec `sys.argv` sont lus comme du texte.

Donc :

- `"42"` est une chaîne de caractères,
- ce n'est pas automatiquement un nombre.

Si on veut faire des calculs, il faut convertir la valeur :

```python
int(sys.argv[1])
```

## Vérification

Quand on utilise des arguments, il faut faire attention :

- si aucun argument n'est donné,
- ou s'il en manque,
- le script peut produire une erreur.

On vérifie souvent le nombre d'éléments avec `len(sys.argv)`.

## En résumé

- Un argument est une valeur donnée au lancement du script.
- Python les stocke dans `sys.argv`.
- `sys.argv[0]` est le nom du script.
- Les autres positions contiennent les arguments.
- Les arguments sont récupérés sous forme de texte.

> Les arguments permettent à un même script de servir dans plusieurs cas, sans changer son code à chaque fois.
