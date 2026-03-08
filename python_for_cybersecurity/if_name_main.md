# Cours : `if __name__ == "__main__":`

---

## 1. Le problème

En Python, quand tu **importes** un fichier, tout le code au niveau global s'exécute immédiatement.

```python
# mon_module.py
print("Je m'exécute à l'import !")

def ma_fonction():
    return 42
```

```python
# autre_fichier.py
import mon_module  # → affiche "Je m'exécute à l'import !" sans qu'on le veuille
```

C'est un comportement non désiré.

---

## 2. La variable `__name__`

Python assigne automatiquement la variable `__name__` à chaque fichier.

| Situation | Valeur de `__name__` |
|---|---|
| Fichier exécuté directement | `"__main__"` |
| Fichier importé | `"nom_du_fichier"` |

```python
# mon_module.py
print(__name__)
```

```bash
$ python mon_module.py
__main__          # exécuté directement

$ python autre_fichier.py
mon_module        # importé depuis autre_fichier.py
```

---

## 3. La solution

```python
def ma_fonction():
    return 42

if __name__ == "__main__":
    # Ce bloc ne s'exécute QUE si le fichier est lancé directement
    print(ma_fonction())
```

Maintenant, si tu importes ce fichier : **rien ne s'exécute**.  
Si tu le lances directement : `42` s'affiche.

---

## 4. Pourquoi utiliser `main()` ?

La 42 (et les bonnes pratiques) exigent :

```python
def main():
    # toute ta logique ici
    print(ma_fonction())

if __name__ == "__main__":
    main()
```

**Raisons :**
- Zéro code en scope global (règle 42)
- `main()` devient testable et importable
- Séparation claire entre logique et point d'entrée

---

## 5. Résumé

```
Fichier lancé directement  →  __name__ == "__main__"  →  main() s'exécute
Fichier importé            →  __name__ == "nom_fichier"  →  main() ne s'exécute PAS
```

---

## 6. Exemple complet (style 42)

```python
def all_thing_is_obj(object: any) -> int:
    """Prints the type of the object and returns 42."""
    print(type(object))
    return 42


def main():
    """Entry point."""
    ft_list = ["Hello", "tata!"]
    print(all_thing_is_obj(ft_list))


if __name__ == "__main__":
    main()
```
