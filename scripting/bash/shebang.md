# 📘 Cours : Shebangs (#!) en scripts Unix/Linux

## 1. Introduction

Le **shebang** est une ligne spéciale placée en début de script qui indique quel interpréteur utiliser pour exécuter le script. Il commence toujours par `#!`.

Exemple classique pour Bash :

```bash
#!/bin/bash
```

---

## 2. Fonction du shebang

* Détermine l’interpréteur qui exécutera le script (Bash, Python, Perl, etc.)
* Permet d’exécuter le script directement avec `./script.sh` sans préciser l’interpréteur
* Assure la portabilité si le chemin est correct sur différents systèmes

---

## 3. Syntaxe générale

```
#!<chemin absolu vers interpréteur>
```

Exemples :

| Langage  | Shebang                  |
| -------- | ------------------------ |
| Bash     | `#!/bin/bash`            |
| Sh       | `#!/bin/sh`              |
| Python 3 | `#!/usr/bin/env python3` |
| Perl     | `#!/usr/bin/perl`        |

> Utiliser `/usr/bin/env` permet de chercher l’interpréteur dans le PATH et assure plus de portabilité.

---

## 4. Bonnes pratiques

1. Toujours utiliser un chemin absolu ou `/usr/bin/env` pour l’interpréteur
2. Pas d’espace entre `#!` et le chemin
3. Placer le shebang en première ligne du fichier
4. Rendre le script exécutable :

```bash
chmod +x script.sh
```

5. Vérifier la compatibilité avec le shell ou langage utilisé

---

## 5. Exemples

### Script Bash

```bash
#!/bin/bash
echo "Hello world"
```

Exécution :

```bash
./hello.sh
```

### Script Python

```python
#!/usr/bin/env python3
print("Hello world")
```

---

## 6. Remarques importantes

* Si le shebang est absent, le script est exécuté par le shell courant (souvent `sh`) par défaut.
* Le shebang n’a effet que si le script est exécuté directement (`./script`) et non via `bash script.sh`.
* Le fichier doit avoir les permissions d’exécution.

---

## 7. Résumé rapide

| Partie     | Description                                                     |
| ---------- | --------------------------------------------------------------- |
| `#!`       | Indique qu’il s’agit d’un shebang                               |
| `<chemin>` | Chemin absolu vers l’interpréteur                               |
| Exemple    | `#!/bin/bash` pour Bash, `#!/usr/bin/env python3` pour Python 3 |
| Objectif   | Exécution directe du script avec le bon interpréteur            |
