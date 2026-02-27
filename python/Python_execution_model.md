# Comment Python est-il exécuté ?

## 1) Python est un langage interprété

Contrairement à C ou C++, Python n'est pas compilé en binaire natif avant l'exécution. Le code est lu et exécuté par un programme appelé **l'interpréteur Python**.

```bash
python3 script.py
```

L'interpréteur prend le fichier `.py` et l'exécute directement.

---

## 2) Ce qui se passe en coulisses

Même si Python est dit "interprété", il passe par deux étapes internes :

```
script.py  →  bytecode (.pyc)  →  exécution par la PVM
```

### Étape 1 — Compilation en bytecode

Python compile le code source en **bytecode** — un format intermédiaire plus rapide à lire pour la machine. Les fichiers bytecode ont l'extension `.pyc` et sont stockés dans le dossier `__pycache__`.

### Étape 2 — Exécution par la PVM

La **PVM (Python Virtual Machine)** lit le bytecode et l'exécute instruction par instruction.

---

## 3) Différence avec un langage compilé

| | Langage compilé (C) | Python |
|---|---|---|
| Étape 1 | Compilation en binaire natif | Compilation en bytecode |
| Étape 2 | Exécution directe par le CPU | Exécution par la PVM |
| Fichier final | `.exe` / binaire | `.pyc` + PVM |
| Portabilité | Dépend de l'OS | Fonctionne partout où Python est installé |

---

## 4) Résumé

- Python est interprété — pas besoin de compiler manuellement
- En interne, Python passe par du bytecode avant l'exécution
- C'est la PVM qui exécute ce bytecode
- Le bytecode est transparent pour l'utilisateur
