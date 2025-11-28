# 📘 Cours : Les Bits Spéciaux (SUID, SGID, Sticky Bit)

## 1. Introduction

Dans Linux/Unix, les permissions classiques (r, w, x) ne suffisent pas toujours à gérer des comportements avancés. C’est pourquoi il existe trois bits spéciaux qui modifient le comportement d’un fichier ou d’un répertoire :

* **SUID** : Set User ID
* **SGID** : Set Group ID
* **Sticky Bit**

Ces bits s’ajoutent aux permissions classiques et modifient l’exécution ou la gestion des fichiers.

---

# 2. Le SUID (Set User ID)

## 🔹 Fonction

Lorsque le bit SUID est activé sur **un fichier exécutable**, toute personne qui l'exécute **hérite des droits du owner** du fichier.

Exemple :

```
-rwsr-xr-x  1 root root  ...  /usr/bin/passwd
```

## 🔹 Position du SUID

Remplace le `x` de la colonne owner :

```
u (owner)   g (group)   o (others)
r w s        r - x       r - x
```

## 🔹 Activer/désactiver

```
chmod 4755 fichier  # activer
chmod 0755 fichier  # désactiver
```

> Le **4** correspond au bit SUID.

---

# 3. Le SGID (Set Group ID)

## 🔹 Fonction

* **Fichier exécutable** : s'exécute avec les privilèges du **groupe** propriétaire.
* **Répertoire** : tout fichier créé à l'intérieur hérite automatiquement du groupe du dossier.

## 🔹 Position du SGID

Remplace le `x` de la colonne group :

```
u (owner)   g (group)   o (others)
r w x        r w s       r - x
```

## 🔹 Activer/désactiver

```
chmod 2755 dossier  # activer
chmod 0755 dossier  # désactiver
```

> Le **2** correspond au SGID.

---

# 4. Le Sticky Bit

## 🔹 Fonction

Empêche les utilisateurs de supprimer les fichiers des autres dans un répertoire partagé.
Exemple : `/tmp`

```
drwxrwxrwt  10 root root  ...  /tmp
```

## 🔹 Position du Sticky Bit

Remplace le `x` de la colonne others :

```
u (owner)   g (group)   o (others)
r w x        r w x       r w t
```

## 🔹 Activer/désactiver

```
chmod 1755 dossier  # activer
chmod 0755 dossier  # désactiver
```

> Le **1** correspond au Sticky Bit.

---

# 5. Résumé visuel

| Bit spécial    | Position   | Effet                                                   | Chiffre |
| -------------- | ---------- | ------------------------------------------------------- | ------- |
| **SUID**       | owner (u)  | Exécution avec les droits du owner                      | 4       |
| **SGID**       | group (g)  | Exécution avec les droits du groupe / héritage groupe   | 2       |
| **Sticky Bit** | others (o) | Empêche suppression des fichiers d'autrui (répertoires) | 1       |

---

# 6. Exemple complet

```
chmod 6755 fichier
```

* 6 = 4 (SUID) + 2 (SGID)
* 7 = rwx (owner)
* 5 = r-x (group)
* 5 = r-x (others)
  Affichage : `-rwsr-sr-x`

---

# 7. Commandes utiles

```
ls -l                # voir permissions détaillées
find / -perm -4000 2>/dev/null  # fichiers SUID
find / -perm -2000 2>/dev/null  # fichiers SGID
find / -type d -perm -1000      # répertoires Sticky
```

---

# 8. Conclusion

Les bits spéciaux permettent de :

* donner des droits élevés de manière contrôlée (SUID, SGID)
* gérer des répertoires collaboratifs en sécurité (sticky)
* sécuriser ou exploiter des environnements Unix selon les besoins

Ils sont indispensables en administration système et très fréquents dans les challenges de sécurité.")
