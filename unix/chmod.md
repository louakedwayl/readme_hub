# chmod — Les options

## Syntaxe générale

```bash
chmod [options] [qui][action][permission] fichier
```

---

## Les actions

| Symbole | Effet |
|---|---|
| `+` | ajouter une permission |
| `-` | retirer une permission |
| `=` | définir exactement (écrase le reste) |

```bash
chmod +x script.py      # ajouter exécution
chmod -x script.py      # retirer exécution
chmod =r fichier.txt    # lecture uniquement, tout le reste retiré
```

---

## Les permissions

| Symbole | Permission |
|---|---|
| `r` | read — lecture |
| `w` | write — écriture |
| `x` | execute — exécution |
| `X` | execute seulement si c'est un dossier ou déjà exécutable |

```bash
chmod +r fichier.txt    # ajouter lecture
chmod -w fichier.txt    # retirer écriture
chmod +rx script.py     # ajouter lecture ET exécution
```

---

## Les cibles (qui ?)

| Symbole | Cible |
|---|---|
| `u` | user — propriétaire |
| `g` | group — groupe |
| `o` | others — autres |
| `a` | all — tout le monde (u+g+o) |

```bash
chmod u+x script.py     # exécution pour le propriétaire seulement
chmod g-w fichier.py    # retirer écriture au groupe
chmod o-r fichier.py    # retirer lecture aux autres
chmod a+x script.py     # exécution pour tout le monde
```

Sans préciser la cible, `a` est appliqué par défaut :

```bash
chmod +x script.py      # équivalent à chmod a+x script.py
```

---

## Les options de la commande

### `-R` — Récursif

Applique les permissions à un dossier et tout son contenu.

```bash
chmod -R 755 /var/www/html
chmod -R +x /scripts
```

### `-v` — Verbose

Affiche chaque fichier modifié.

```bash
chmod -v +x script.py
# output: mode of 'script.py' changed from 0644 to 0755
```

### `-c` — Changes only

Comme `-v` mais affiche uniquement les fichiers dont les permissions ont changé.

```bash
chmod -c +x script.py
```

### `--reference` — Copier les permissions d'un fichier

```bash
chmod --reference=source.py cible.py
```

---

## Combiner les options

```bash
chmod -Rv 755 /dossier          # récursif + verbose
chmod u+x,g-w,o-r fichier.py   # plusieurs règles en une commande
```

---

## Résumé rapide

```bash
chmod +x script.py              # rendre exécutable
chmod -R 755 /dossier           # récursif
chmod u+x,o-r fichier           # multi-règles
chmod a=r fichier               # lecture seule pour tout le monde
chmod --reference=a.py b.py     # copier permissions
```
