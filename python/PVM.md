# La PVM — Python Virtual Machine

## 1) Définition

La PVM (Python Virtual Machine) est le moteur d'exécution interne de l'interpréteur Python. C'est elle qui lit le bytecode et l'exécute instruction par instruction.

Elle fait le lien entre le code Python et le système d'exploitation.

---

## 2) Pourquoi une machine virtuelle ?

Le CPU d'un ordinateur ne comprend pas le Python — il comprend uniquement le code machine (binaire spécifique à chaque processeur).

La PVM joue le rôle de traducteur :

```
Bytecode Python  →  PVM  →  Instructions CPU
```

Grâce à ça, le même code Python fonctionne sur n'importe quel OS sans modification — il suffit que Python soit installé.

---

## 3) Place de la PVM dans le processus d'exécution

```
script.py
   │
   ▼
Analyse syntaxique (vérification du code)
   │
   ▼
Compilation en bytecode (.pyc)
   │
   ▼
PVM — lit et exécute le bytecode
   │
   ▼
Résultat affiché
```

---

## 4) Le bytecode

Le bytecode est le format que la PVM lit. C'est un format intermédiaire — ni du Python lisible, ni du code machine binaire.

```bash
# Python génère automatiquement les fichiers bytecode ici :
__pycache__/script.cpython-311.pyc
```

Tu peux visualiser le bytecode d'une fonction avec le module `dis` :

```python
import dis

def addition(a, b):
    return a + b

dis.dis(addition)
```

Résultat :

```
LOAD_FAST    0 (a)
LOAD_FAST    1 (b)
BINARY_ADD
RETURN_VALUE
```

Ce sont les instructions que la PVM exécute.

---

## 5) PVM et portabilité

C'est l'un des avantages majeurs de Python. Le bytecode est identique peu importe l'OS. Seule la PVM change selon la plateforme.

| OS | PVM utilisée |
|---|---|
| Linux | CPython compilé pour Linux |
| Windows | CPython compilé pour Windows |
| macOS | CPython compilé pour macOS |

Le bytecode `.pyc` reste le même — la PVM s'adapte à l'OS.

---

## 6) PVM vs JVM

La PVM de Python est souvent comparée à la JVM (Java Virtual Machine).

| | PVM | JVM |
|---|---|---|
| Langage | Python | Java / Kotlin / Scala |
| Bytecode | `.pyc` | `.class` |
| Performance | Moins rapide | Plus optimisée |
| JIT compiler | Non (CPython) | Oui |

PyPy est une alternative à CPython qui ajoute un compilateur **JIT** à la PVM, ce qui améliore significativement les performances.

---

## 7) Résumé

- La PVM exécute le bytecode Python instruction par instruction
- Elle traduit le bytecode en instructions compréhensibles par le CPU
- Elle assure la portabilité du code Python entre les OS
- Le bytecode est généré automatiquement par l'interpréteur
- PyPy améliore les performances de la PVM avec un JIT compiler
