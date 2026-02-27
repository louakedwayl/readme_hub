# umask — Masque de permissions par défaut

## 1) Qu'est-ce que l'umask ?

L'umask est un filtre qui définit quelles permissions sont **retirées par défaut** lors de la création d'un fichier ou d'un dossier, ou lors d'un `chmod` sans cible explicite.

Ce n'est pas une permission — c'est une soustraction.

---

## 2) Voir son umask

```bash
umask
# 0022
```

```bash
umask -S    # format symbolique
# u=rwx,g=rx,o=rx
```

---

## 3) Comment ça fonctionne ?

Les permissions maximales de départ sont :

| Type | Permissions max | Octal |
|---|---|---|
| Fichier | `rw-rw-rw-` | 666 |
| Dossier | `rwxrwxrwx` | 777 |

L'umask est **soustrait** de ces valeurs :

```
Fichier : 666 - 022 = 644  →  rw-r--r--
Dossier : 777 - 022 = 755  →  rwxr-xr-x
```

Avec umask `022`, quand tu crées un fichier :

```bash
touch test.txt
ls -l test.txt
# -rw-r--r--   (644)
```

---

## 4) Décomposer l'umask

```
umask 022

0  →  ignoré (sticky bit / setuid / setgid)
2  →  retirer w pour group   (2 = write)
2  →  retirer w pour others  (2 = write)
```

Valeurs possibles :

| Valeur | Permission retirée |
|---|---|
| 0 | rien |
| 1 | execute |
| 2 | write |
| 3 | write + execute |
| 4 | read |
| 5 | read + execute |
| 6 | read + write |
| 7 | tout |

---

## 5) Umask courants

| Umask | Fichier créé | Dossier créé | Usage |
|---|---|---|---|
| `022` | `644` rw-r--r-- | `755` rwxr-xr-x | Standard Linux |
| `027` | `640` rw-r----- | `750` rwxr-x--- | Serveurs sécurisés |
| `077` | `600` rw------- | `700` rwx------ | Très restrictif |
| `000` | `666` rw-rw-rw- | `777` rwxrwxrwx | Aucun filtre |

---

## 6) Changer l'umask

```bash
umask 027    # pour la session courante uniquement
```

Pour le rendre permanent, l'ajouter dans `~/.bashrc` ou `~/.zshrc` :

```bash
echo "umask 027" >> ~/.bashrc
source ~/.bashrc
```

---

## 7) Umask et chmod

L'umask intervient **uniquement** quand la cible n'est pas précisée :

```bash
chmod +w fichier.txt      # umask appliqué → w retiré pour group/others
chmod a+w fichier.txt     # cible explicite → umask ignoré, w ajouté partout
chmod o+w fichier.txt     # cible explicite → umask ignoré, w ajouté pour others
```

---

## 8) Résumé

- L'umask est une soustraction, pas une permission
- Valeur standard : `022`
- S'applique à la création de fichiers et aux `chmod` sans cible
- Pour bypass l'umask : préciser la cible (`a`, `u`, `g`, `o`)
- Changement permanent via `~/.bashrc`
