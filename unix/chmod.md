# Les permissions fichiers Unix/Linux — chmod

## 1) Concept de base

Sous Linux, chaque fichier a des **permissions** qui définissent qui peut faire quoi.

3 types d'actions :

| Symbole | Action |
|---|---|
| `r` | read — lire |
| `w` | write — écrire / modifier |
| `x` | execute — exécuter |

3 catégories d'utilisateurs :

| Symbole | Qui |
|---|---|
| `u` | user — le propriétaire du fichier |
| `g` | group — le groupe propriétaire |
| `o` | others — tout le monde |

---

## 2) Lire les permissions

```bash
ls -l fichier.py
```

Résultat :

```
-rwxr-xr--  1 wayl wayl  123 Feb 27 18:00 fichier.py
```

Décomposition :

```
- rwx r-x r--
│ │   │   │
│ │   │   └── others : lecture seule
│ │   └────── group  : lecture + exécution
│ └────────── user   : lecture + écriture + exécution
└──────────── type : - fichier, d dossier, l lien
```

---

## 3) chmod — changer les permissions

### Syntaxe symbolique

```bash
chmod u+x fichier.py    # ajouter exécution au propriétaire
chmod g-w fichier.py    # retirer écriture au groupe
chmod o+r fichier.py    # ajouter lecture aux autres
chmod a+x fichier.py    # ajouter exécution à tout le monde (a = all)
```

### Syntaxe octale (la plus courante)

Chaque permission a une valeur numérique :

| Permission | Valeur |
|---|---|
| `r` | 4 |
| `w` | 2 |
| `x` | 1 |
| aucune | 0 |

On additionne pour chaque catégorie :

```
rwx = 4+2+1 = 7
r-x = 4+0+1 = 5
r-- = 4+0+0 = 4
--- = 0
```

Exemples :

```bash
chmod 755 fichier.py    # rwxr-xr-x
chmod 644 fichier.py    # rw-r--r--
chmod 600 fichier.py    # rw------- (privé, que le proprio)
chmod 777 fichier.py    # rwxrwxrwx (tout le monde tout faire)
```

---

## 4) Cas concret — rendre un script Python exécutable

Sans chmod :

```bash
python3 script.py    # obligé de passer par l'interpréteur
```

Avec chmod :

```bash
# 1. Ajouter le shebang en première ligne du fichier
#!/usr/bin/env python3

# 2. Setter le bit exécutable
chmod +x script.py

# 3. Lancer directement
./script.py
```

---

## 5) Permissions les plus utilisées

| Octal | Permissions | Usage typique |
|---|---|---|
| `777` | rwxrwxrwx | Tout le monde peut tout faire (dangereux) |
| `755` | rwxr-xr-x | Scripts, binaires publics |
| `644` | rw-r--r-- | Fichiers de config, pages web |
| `600` | rw------- | Clés SSH, fichiers sensibles |
| `700` | rwx------ | Scripts privés |

---

## 6) chown — changer le propriétaire

```bash
chown wayl fichier.py           # changer le propriétaire
chown wayl:wayl fichier.py      # changer propriétaire + groupe
chown -R wayl /dossier          # récursif sur tout un dossier
```

---

## 7) Commandes utiles

```bash
ls -l                    # voir les permissions
ls -la                   # inclure fichiers cachés
stat fichier.py          # détail complet
chmod -R 755 /dossier    # récursif
```
