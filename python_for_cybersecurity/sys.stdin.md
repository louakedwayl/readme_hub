# `sys.stdin` en Python

## 1. Idée générale

`sys.stdin` représente l'**entrée standard** d'un programme Python.

C'est par là que le programme peut recevoir des données depuis l'extérieur. En pratique, cela correspond souvent à ce que l'utilisateur tape dans le terminal, mais pas seulement.

Pour l'utiliser, on importe le module `sys` :

```python
import sys
```

---

## 2. À quoi sert `sys.stdin`

`sys.stdin` sert à lire des données envoyées au programme.

Il fait partie des flux standard :

| Flux | Rôle |
|---|---|
| `sys.stdin` | Entrée |
| `sys.stdout` | Sortie |
| `sys.stderr` | Erreurs |

Donc `sys.stdin` est le canal d'entrée principal.

---

## 3. Pourquoi c'est important

`sys.stdin` est utile quand un programme doit lire du texte sans forcément passer par les arguments du terminal.

Il permet à Python de recevoir des données de manière plus générale, par exemple depuis :

- Le clavier.
- Un pipe.
- Une redirection.

L'idée importante est la suivante : `sys.stdin` représente la **source d'entrée** du programme.

---

## 4. Différence avec `input()`

`input()` et `sys.stdin` sont liés, mais ce n'est pas exactement la même chose.

| | `input()` | `sys.stdin` |
|---|---|---|
| Nature | Fonction simple pour lire une ligne | Flux d'entrée lui-même |
| Niveau | Haut niveau | Bas niveau, plus général |

Donc :

- `input()` est plus simple à utiliser.
- `sys.stdin` est plus bas niveau et plus général.

---

## 5. `sys.stdin.read()`

`sys.stdin.read()` sert à lire le contenu de l'entrée standard.

Cette lecture peut aller jusqu'à la fin de l'entrée. C'est pour cela qu'on l'utilise souvent quand on veut lire un bloc de texte plus librement qu'avec `input()`.

---

## 6. `sys.stdin.readline()`

`sys.stdin.readline()` sert à lire une seule ligne depuis l'entrée standard.

La logique est donc plus proche d'une lecture ligne par ligne.

---

## 7. `sys.stdin` et le terminal

Quand un programme est lancé dans un terminal, `sys.stdin` est souvent relié au clavier.

Cela veut dire que ce que l'utilisateur tape peut être lu par le programme. Mais `sys.stdin` ne dépend pas uniquement du clavier : il représente plus largement l'entrée standard, quelle qu'en soit l'origine.

---

## 8. Ce qu'il faut retenir

`sys.stdin` est l'objet qui représente l'entrée standard en Python. Il sert à lire les données envoyées au programme. Il est plus général que `input()` et s'inscrit dans le fonctionnement global des flux standard.

---

## 9. Résumé

- `sys.stdin` = entrée standard.
- Il permet au programme de lire des données.
- Il fait partie des flux standard de Python.
- Il est plus général que `input()`.

---

## 10. À retenir

> **`sys.stdin` est le flux d'entrée standard d'un programme Python. Il permet de lire ce que le programme reçoit depuis son environnement d'exécution.**
