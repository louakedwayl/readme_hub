# Les Scripts Python

## 1. Qu'est-ce qu'un script Python ?

Un script Python est un fichier `.py` exécuté directement depuis le terminal, de haut en bas, ligne par ligne. Contrairement à un module (importé), un script est un **point d'entrée**.

```bash
python3 mon_script.py
```

---

## 2. Le Shebang

La première ligne d'un script exécutable. Indique au système quel interpréteur utiliser.

```python
#!/usr/bin/env python3
```

- `/usr/bin/env python3` → trouve `python3` dans le `PATH` système (portable)
- Sans shebang : doit être lancé avec `python3 fichier.py`
- Avec shebang + permissions : peut être lancé avec `./fichier.py`

### Rendre un script exécutable :

```bash
chmod +x mon_script.py
./mon_script.py
```

---

## 3. Structure d'un script Python

```python
#!/usr/bin/env python3

# 1. Imports
import time
from datetime import datetime

# 2. Constantes / variables globales
VERSION = "1.0"

# 3. Fonctions
def ma_fonction():
    pass

# 4. Point d'entrée
if __name__ == "__main__":
    ma_fonction()
```

---

## 4. `if __name__ == "__main__"`

Bloc exécuté **uniquement** quand le fichier est lancé directement. Pas exécuté si le fichier est importé comme module.

```python
# script.py
def dire_bonjour():
    print("Bonjour")

if __name__ == "__main__":
    dire_bonjour()  # exécuté seulement si lancé directement
```

```bash
python3 script.py      # affiche "Bonjour"
```

```python
import script          # n'affiche rien — bloc __main__ ignoré
```

---

## 5. Arguments en ligne de commande

### `sys.argv`

```python
#!/usr/bin/env python3
import sys

print(sys.argv)       # liste de tous les arguments
print(sys.argv[0])    # nom du script
print(sys.argv[1])    # premier argument passé
```

```bash
python3 script.py hello 42
# ['script.py', 'hello', '42']
```

---

## 6. Codes de sortie

Un script retourne un code au système à sa fin.

```python
import sys

sys.exit(0)   # succès
sys.exit(1)   # erreur
```

```bash
python3 script.py
echo $?   # affiche le code de sortie (0 = OK)
```

---

## 7. Stdin / Stdout / Stderr

```python
import sys

print("message normal")            # stdout
print("erreur", file=sys.stderr)   # stderr
entree = input("Entrez quelque chose : ")  # stdin
```

```bash
python3 script.py > output.txt    # redirige stdout
python3 script.py 2> errors.txt   # redirige stderr
```

---

## 8. Bonnes pratiques

| Règle | Raison |
|-------|--------|
| Toujours un shebang | Portabilité |
| `if __name__ == "__main__"` | Réutilisabilité |
| Imports en haut | Lisibilité |
| `sys.exit()` explicite | Contrôle des codes de sortie |
| Pas de code nu au niveau global | Effets de bord à l'import |

---

## Résumé

- Script = fichier `.py` exécuté directement
- Shebang = `#!/usr/bin/env python3`
- `__name__ == "__main__"` = point d'entrée propre
- `sys.argv` = arguments CLI
- `sys.exit()` = code de sortie
