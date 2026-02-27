# L'interpréteur Python

## 1) Définition

L'interpréteur Python est le programme qui lit, traduit et exécute le code source Python. C'est lui que tu lances quand tu tapes `python3` dans le terminal.

Sans interpréteur, un fichier `.py` n'est qu'un fichier texte — il ne s'exécute pas.

---

## 2) Ce que fait l'interpréteur

Quand tu lances `python3 script.py`, l'interpréteur effectue plusieurs étapes dans l'ordre :

```
1. Lecture du fichier .py
2. Analyse syntaxique (vérifie que le code est valide)
3. Compilation en bytecode (.pyc)
4. Exécution du bytecode via la PVM
```

---

## 3) CPython — l'interpréteur de référence

L'implémentation officielle et la plus utilisée s'appelle **CPython**. C'est celle installée par défaut sur Linux, macOS et Windows.

- Écrit en langage C
- Maintenu par la Python Software Foundation
- Référence pour toutes les nouvelles fonctionnalités du langage

```bash
python3 --version
# Python 3.x.x  →  CPython par défaut
```

---

## 4) Les autres interpréteurs

| Interpréteur | Description |
|---|---|
| **CPython** | Référence, le plus utilisé |
| **PyPy** | Plus rapide grâce à un compilateur JIT |
| **Jython** | Python exécuté sur la JVM Java |
| **IronPython** | Python exécuté sur .NET Microsoft |
| **MicroPython** | Python pour microcontrôleurs (Arduino, ESP32) |

Dans la quasi-totalité des cas, tu utiliseras CPython.

---

## 5) La PVM — Python Virtual Machine

La PVM est le composant interne de l'interpréteur qui exécute le bytecode.

Elle lit les instructions bytecode une par une et les traduit en opérations sur le système d'exploitation. C'est grâce à elle que le même code Python fonctionne sur Linux, Windows et macOS sans modification.

```
script.py
   │
   ▼
Analyse syntaxique
   │
   ▼
Bytecode (.pyc)
   │
   ▼
PVM (exécution)
   │
   ▼
Résultat
```

---

## 6) Le bytecode

Le bytecode est un format intermédiaire entre le code source et le code machine. Python le génère automatiquement et le stocke dans `__pycache__/`.

```bash
ls __pycache__/
# script.cpython-311.pyc
```

Si le fichier `.py` n'a pas changé, Python réutilise le `.pyc` existant — ce qui accélère le démarrage.

---

## 7) Mode interactif

L'interpréteur peut aussi être utilisé en mode interactif — sans fichier, tu exécutes du code ligne par ligne.

```bash
python3
>>> x = 10
>>> print(x)
10
>>> exit()
```

Utile pour tester rapidement du code.

---

## 8) Résumé

- L'interpréteur Python lit et exécute le code `.py`
- L'implémentation de référence est CPython
- En interne : analyse → bytecode → PVM → résultat
- La PVM assure la portabilité entre les OS
- Le mode interactif permet de tester du code sans fichier
