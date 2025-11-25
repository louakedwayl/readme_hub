# Cours complet sur le Sticky Bit sous Linux

## Table des matières
1. [Introduction](#introduction)
2. [Les permissions Linux : rappel](#les-permissions-linux--rappel)
3. [Les bits spéciaux](#les-bits-spéciaux)
4. [Le Sticky Bit en détail](#le-sticky-bit-en-détail)
5. [Utilisation pratique](#utilisation-pratique)
6. [Cas d'usage](#cas-dusage)
7. [Différences avec SUID et SGID](#différences-avec-suid-et-sgid)
8. [Sécurité](#sécurité)
9. [Exercices pratiques](#exercices-pratiques)
10. [Dépannage](#dépannage)

---

## Introduction

Le **sticky bit** est un bit de permission spécial sous Linux qui modifie le comportement des répertoires. Il permet de créer des espaces partagés sécurisés où chaque utilisateur ne peut supprimer que ses propres fichiers.

### Origine historique

Le nom "sticky" vient des anciens systèmes Unix où ce bit permettait de garder un programme en mémoire (il "collait" en RAM). Aujourd'hui, son usage a complètement changé et il sert exclusivement à protéger les répertoires partagés.

---

## Les permissions Linux : rappel

### Structure de base

```
-rwxrwxrwx
│││││││││└── Exécution (autres)
││││││││└─── Écriture (autres)
│││││││└──── Lecture (autres)
││││││└───── Exécution (groupe)
│││││└────── Écriture (groupe)
││││└─────── Lecture (groupe)
│││└──────── Exécution (propriétaire)
││└───────── Écriture (propriétaire)
│└────────── Lecture (propriétaire)
└─────────── Type (d=directory, -=file, l=link)
```

### Notation octale classique

| Binaire | Octal | Permissions | Signification |
|---------|-------|-------------|---------------|
| 000 | 0 | --- | Aucun droit |
| 001 | 1 | --x | Exécution seulement |
| 010 | 2 | -w- | Écriture seulement |
| 011 | 3 | -wx | Écriture + exécution |
| 100 | 4 | r-- | Lecture seulement |
| 101 | 5 | r-x | Lecture + exécution |
| 110 | 6 | rw- | Lecture + écriture |
| 111 | 7 | rwx | Tous les droits |

Exemple : `chmod 755 fichier` = rwxr-xr-x

---

## Les bits spéciaux

En plus des permissions classiques, Linux possède **3 bits spéciaux** :

### Vue d'ensemble

| Bit | Valeur | Nom | Symbole | Position | Cible |
|-----|--------|-----|---------|----------|-------|
| **Sticky** | 1 | Sticky bit | `t` | Fin (autres) | Répertoires |
| **SGID** | 2 | Set Group ID | `s` | Milieu (groupe) | Fichiers + répertoires |
| **SUID** | 4 | Set User ID | `s` | Début (user) | Fichiers exécutables |

### Notation complète à 4 chiffres

```
1777
││││
│└┴┴── Permissions classiques (User, Group, Others)
└───── Bits spéciaux (SUID=4, SGID=2, Sticky=1)
```

### Exemples visuels

```bash
# Permissions normales (0755)
drwxr-xr-x

# Avec sticky bit (1755)
drwxr-xr-t
          └── 't' au lieu de 'x'

# Avec SUID (4755)
-rwsr-xr-x
   └── 's' au lieu de 'x'

# Avec SGID (2755)
-rwxr-sr-x
      └── 's' au lieu de 'x'

# Combinaisons (7777 = tous les bits)
drwsrwsrwt
```

---

## Le Sticky Bit en détail

### Principe de fonctionnement

Le sticky bit (valeur **1**) modifie les règles de suppression dans un répertoire.

#### Sans sticky bit (0777)

```
Répertoire avec permissions 777 :
┌─────────────────────────────────┐
│   N'importe qui peut :          │
│   ✓ Créer des fichiers          │
│   ✓ Modifier des fichiers       │
│   ✓ Supprimer TOUS les fichiers│
│     (même ceux des autres!)     │
└─────────────────────────────────┘
```

**Problème** : Bob peut supprimer les fichiers d'Alice !

#### Avec sticky bit (1777)

```
Répertoire avec permissions 1777 :
┌─────────────────────────────────┐
│   N'importe qui peut :          │
│   ✓ Créer des fichiers          │
│   ✓ Modifier ses fichiers       │
│   ✓ Supprimer UNIQUEMENT        │
│     ses propres fichiers        │
│   ✗ Supprimer les fichiers      │
│     des autres                  │
└─────────────────────────────────┘
```

**Solution** : Bob ne peut toucher que ses propres fichiers !

### Démonstration concrète

```bash
# Créer un répertoire test sans sticky bit
mkdir /tmp/test_sans_sticky
chmod 777 /tmp/test_sans_sticky

# Alice crée un fichier
su - alice
echo "Document d'Alice" > /tmp/test_sans_sticky/alice.txt
exit

# Bob peut le supprimer ! (DANGER)
su - bob
rm /tmp/test_sans_sticky/alice.txt  # ✓ Succès (problème !)
exit

# ==========================================

# Maintenant avec sticky bit
mkdir /tmp/test_avec_sticky
chmod 1777 /tmp/test_avec_sticky

# Alice crée un fichier
su - alice
echo "Document d'Alice" > /tmp/test_avec_sticky/alice.txt
exit

# Bob NE PEUT PAS le supprimer (SÉCURISÉ)
su - bob
rm /tmp/test_avec_sticky/alice.txt  # ✗ Permission denied
exit
```

### Règles exactes de suppression

Avec le sticky bit, un fichier peut être supprimé **UNIQUEMENT** si :

1. L'utilisateur est le **propriétaire du fichier**, OU
2. L'utilisateur est le **propriétaire du répertoire**, OU
3. L'utilisateur est **root**

```bash
# Exemple
ls -l /tmp/
drwxrwxrwt  root  root  /tmp/

# Dans /tmp/ :
-rw-r--r--  alice users  document.txt

# Qui peut supprimer document.txt ?
# ✓ alice (propriétaire du fichier)
# ✓ root (propriétaire du répertoire /tmp)
# ✓ root (super-utilisateur)
# ✗ bob (ni propriétaire fichier, ni propriétaire répertoire)
```

---

## Utilisation pratique

### Vérifier le sticky bit

```bash
# Méthode 1 : ls -l
ls -ld /tmp
drwxrwxrwt  # Le 't' indique le sticky bit
#        └── 't' au lieu de 'x'

# Méthode 2 : stat
stat /tmp | grep Access
# Access: (1777/drwxrwxrwt)

# Méthode 3 : find
find /tmp -perm -1000
```

### Activer le sticky bit

```bash
# Méthode 1 : Notation octale (4 chiffres)
chmod 1777 /mon/repertoire

# Méthode 2 : Notation symbolique
chmod +t /mon/repertoire

# Méthode 3 : Combinaison
chmod o+t /mon/repertoire  # Ajoute le sticky bit

# Exemple complet
mkdir /tmp/partage
chmod 1777 /tmp/partage
ls -ld /tmp/partage
# drwxrwxrwt
```

### Désactiver le sticky bit

```bash
# Méthode 1 : Notation octale (0 au début)
chmod 0777 /mon/repertoire

# Méthode 2 : Notation symbolique
chmod -t /mon/repertoire

# Vérification
ls -ld /mon/repertoire
# drwxrwxrwx  (plus de 't')
```

### Cas particuliers : 't' vs 'T'

```bash
# 't' minuscule : sticky bit + exécution
chmod 1777 /repertoire
ls -ld /repertoire
# drwxrwxrwt  (t minuscule)

# 'T' majuscule : sticky bit SANS exécution
chmod 1776 /repertoire
ls -ld /repertoire
# drwxrwxrwT  (T majuscule)
```

**Important** : Le 'T' majuscule indique que le sticky bit est activé, mais que le bit d'exécution pour "others" n'est pas positionné. C'est rare et généralement non fonctionnel pour les répertoires (qui nécessitent 'x' pour être traversés).

---

## Cas d'usage

### 1. Répertoires système (/tmp, /var/tmp)

```bash
# /tmp - Fichiers temporaires
ls -ld /tmp
drwxrwxrwt root root /tmp

# Usage : scripts, caches, fichiers temporaires
# Besoin : Chacun peut créer, mais pas supprimer les fichiers des autres
```

### 2. Répertoires partagés en RAM (/dev/shm)

```bash
# /dev/shm - Mémoire partagée
ls -ld /dev/shm
drwxrwxrwt root root /dev/shm

# Usage : IPC (Inter-Process Communication), caches rapides
# Besoin : Partage entre processus sans conflits
```

### 3. Espaces de travail collaboratifs

```bash
# Créer un espace projet partagé
sudo mkdir /projet/equipe
sudo chmod 1777 /projet/equipe

# Avantages :
# - Tous les membres peuvent contribuer
# - Personne ne peut supprimer le travail des autres
# - Idéal pour collaboration sans conflits
```

### 4. Serveurs multi-utilisateurs

```bash
# Répertoire upload sur un serveur web
sudo mkdir /var/www/uploads
sudo chown www-data:www-data /var/www/uploads
sudo chmod 1777 /var/www/uploads

# Scénario :
# - Plusieurs utilisateurs uploadent des fichiers
# - Chacun peut gérer ses uploads
# - Personne ne peut supprimer les uploads des autres
```

### 5. Boîtes de dépôt (drop boxes)

```bash
# Répertoire pour soumettre des devoirs
sudo mkdir /soumissions/tp1
sudo chmod 1733 /soumissions/tp1  # Pas de lecture pour autres

# Propriétés :
# - Les étudiants peuvent déposer (write)
# - Ils ne peuvent pas voir les autres soumissions (pas de read)
# - Ils ne peuvent pas supprimer les soumissions des autres (sticky)
```

### 6. Logs partagés

```bash
# Répertoire de logs accessibles
sudo mkdir /var/log/shared
sudo chmod 1777 /var/log/shared

# Usage :
# - Plusieurs applications écrivent leurs logs
# - Chaque app gère ses propres logs
# - Protection contre suppression accidentelle
```

---

## Différences avec SUID et SGID

### Tableau comparatif

| Caractéristique | SUID (4) | SGID (2) | Sticky Bit (1) |
|----------------|----------|----------|----------------|
| **Valeur octale** | 4000 | 2000 | 1000 |
| **Symbole** | s (user) | s (group) | t (others) |
| **Cible** | Fichiers exécutables | Fichiers + répertoires | Répertoires uniquement |
| **Effet** | Exécute avec l'UID du propriétaire | Exécute avec le GID du groupe | Limite la suppression |
| **Position visuelle** | rwsrwxrwx | rwxrwsrwx | rwxrwxrwt |
| **Cas d'usage** | passwd, sudo, ping | Répertoires partagés | /tmp, /dev/shm |

### Exemples visuels combinés

```bash
# SUID seul (4755)
-rwsr-xr-x  /usr/bin/passwd
   └── s = SUID activé

# SGID seul (2755)
drwxr-sr-x  /projet/groupe
      └── s = SGID activé

# Sticky bit seul (1755)
drwxr-xr-t  /tmp
          └── t = Sticky activé

# SGID + Sticky (3777)
drwxrwsrwt  /projet/collaboratif
      │  └── t = Sticky
      └────── s = SGID

# Tous les bits (7777)
drwsrwsrwt  (rare, déconseillé)
  │ │  └── Sticky
  │ └───── SGID
  └─────── SUID
```

### Quand utiliser quoi ?

```bash
# SUID : Programmes nécessitant des privilèges temporaires
chmod 4755 /usr/bin/programme_special

# SGID : Collaboration en équipe avec groupe commun
chmod 2775 /projet/equipe

# Sticky : Espaces publics où chacun garde le contrôle de ses fichiers
chmod 1777 /tmp/public

# SGID + Sticky : Collaboration + protection
chmod 3777 /partage/projet
```

---

## Sécurité

### Avantages sécuritaires

1. **Protection contre suppression malveillante**
   ```bash
   # Sans sticky bit, un utilisateur malveillant pourrait faire :
   rm -rf /tmp/*  # Supprime TOUT, même les fichiers des autres !
   
   # Avec sticky bit :
   rm -rf /tmp/*  # Ne supprime QUE ses propres fichiers
   ```

2. **Prévention des attaques DoS**
   ```bash
   # Attaque impossible :
   # - Alice ne peut pas supprimer les fichiers de Bob
   # - Bob ne peut pas supprimer les fichiers d'Alice
   # - Chacun garde le contrôle de ses ressources
   ```

3. **Isolation des utilisateurs**
   ```bash
   # Chaque utilisateur a son espace protégé
   # même dans un répertoire partagé
   ```

### Risques et précautions

#### Risque 1 : Remplissage d'espace disque

```bash
# Un utilisateur peut saturer le répertoire
alice$ dd if=/dev/zero of=/tmp/huge.file bs=1G count=100
# Solution : Quotas disque

# Mettre en place des quotas
sudo setquota -u alice 1000000 2000000 0 0 /tmp
```

#### Risque 2 : Symlink attacks

```bash
# Attaque par lien symbolique (ancien problème, souvent corrigé)
# 1. Alice crée un lien symbolique
ln -s /etc/passwd /tmp/trick

# 2. Un script root écrit dans /tmp/trick
# 3. Résultat : /etc/passwd est modifié !

# Protection moderne : fs.protected_symlinks dans le kernel
cat /proc/sys/fs/protected_symlinks
# 1 = Protection activée
```

#### Risque 3 : Race conditions

```bash
# Problème classique dans /tmp
# 1. Programme vérifie que /tmp/myfile n'existe pas
# 2. [RACE] Attaquant crée /tmp/myfile (symlink vers /etc/shadow)
# 3. Programme écrit dans /tmp/myfile
# 4. Résultat : /etc/shadow corrompu !

# Solution : Utiliser mktemp
tempfile=$(mktemp)  # Crée un fichier unique et sécurisé
```

### Bonnes pratiques

```bash
# 1. Toujours utiliser mktemp pour les fichiers temporaires
tempdir=$(mktemp -d)  # Répertoire temporaire unique
tempfile=$(mktemp)    # Fichier temporaire unique

# 2. Nettoyer après utilisation
trap "rm -rf $tempdir" EXIT

# 3. Permissions restrictives sur vos fichiers
touch /tmp/mon_fichier
chmod 600 /tmp/mon_fichier  # Seul vous pouvez lire/écrire

# 4. Ne pas faire confiance aux noms de fichiers dans /tmp
# Toujours valider et nettoyer les entrées

# 5. Utiliser des répertoires privés si possible
mkdir -p ~/.cache/mon_app
# Au lieu de /tmp si possible
```

---

## Exercices pratiques

### Exercice 1 : Comprendre le comportement

```bash
# 1. Créer deux répertoires de test
mkdir /tmp/sans_sticky /tmp/avec_sticky

# 2. Configurer les permissions
chmod 777 /tmp/sans_sticky
chmod 1777 /tmp/avec_sticky

# 3. Créer deux utilisateurs (si pas déjà existants)
sudo useradd -m alice
sudo useradd -m bob

# 4. Alice crée un fichier dans chaque répertoire
sudo -u alice bash -c 'echo "Alice sans" > /tmp/sans_sticky/alice.txt'
sudo -u alice bash -c 'echo "Alice avec" > /tmp/avec_sticky/alice.txt'

# 5. Bob tente de supprimer les fichiers
sudo -u bob rm /tmp/sans_sticky/alice.txt    # Que se passe-t-il ?
sudo -u bob rm /tmp/avec_sticky/alice.txt    # Que se passe-t-il ?

# Questions :
# - Quelle suppression réussit ?
# - Pourquoi ?
# - Que se passe-t-il si Bob est le propriétaire du répertoire ?
```

### Exercice 2 : Espace de travail collaboratif

```bash
# Mission : Créer un espace partagé pour une équipe

# 1. Créer le répertoire
sudo mkdir /projet/devops

# 2. Créer un groupe
sudo groupadd devops

# 3. Ajouter les utilisateurs au groupe
sudo usermod -aG devops alice
sudo usermod -aG devops bob

# 4. Configurer les permissions
# TODO : Quelle commande chmod utiliser ?
# Objectifs :
# - Le groupe peut lire/écrire
# - Les nouveaux fichiers appartiennent au groupe
# - Chacun ne peut supprimer que ses fichiers

# Solution attendue :
sudo chown root:devops /projet/devops
sudo chmod 2770 /projet/devops  # SGID pour héritage groupe
# Ou
sudo chmod 3770 /projet/devops  # SGID + Sticky

# 5. Tester
sudo -u alice bash -c 'echo "Code Alice" > /projet/devops/module_a.py'
sudo -u bob bash -c 'echo "Code Bob" > /projet/devops/module_b.py'
sudo -u bob rm /projet/devops/module_a.py  # Doit échouer si sticky activé
```

### Exercice 3 : Sécuriser un script

```bash
# Script non sécurisé
#!/bin/bash
# ⚠️ DANGEREUX
tempfile=/tmp/myapp.tmp
echo "données" > $tempfile
# Problème : race condition, nom prévisible

# TODO : Réécrire ce script de manière sécurisée
# Indices :
# - Utiliser mktemp
# - Nettoyer avec trap
# - Permissions restrictives

# Solution attendue :
#!/bin/bash
tempfile=$(mktemp) || exit 1
chmod 600 "$tempfile"
trap "rm -f $tempfile" EXIT

echo "données" > "$tempfile"
# ... traitement ...
# Nettoyage automatique à la sortie
```

### Exercice 4 : Audit de sécurité

```bash
# Trouver tous les répertoires avec sticky bit sur le système
find / -type d -perm -1000 -ls 2>/dev/null

# Questions :
# 1. Quels répertoires ont le sticky bit ?
# 2. Pourquoi ont-ils besoin de cette protection ?
# 3. Y a-t-il des répertoires suspects ?

# Vérifier les permissions de /tmp
stat /tmp

# Tester la suppression
cd /tmp
touch test_$(whoami).txt
# Demander à un autre utilisateur d'essayer de le supprimer
```

### Exercice 5 : Sticky bit et scripts

```bash
# Créer un système de "boîte aux lettres"
# Où chacun peut déposer un message, mais pas lire ceux des autres

# 1. Créer la structure
sudo mkdir /messages
sudo chmod 1733 /messages  # sticky + write, pas de read

# 2. Tester
echo "Message de $(whoami)" > /messages/msg_$(date +%s).txt

# 3. Vérifier qu'on ne peut pas lister
ls /messages/  # Permission denied

# 4. Mais on peut écrire
echo "Autre message" > /messages/autre.txt

# 5. root peut lire tous les messages
sudo ls -la /messages/
sudo cat /messages/*
```

---

## Dépannage

### Problème 1 : Le sticky bit ne fonctionne pas

```bash
# Symptôme : Un utilisateur peut supprimer les fichiers des autres

# Vérifications :
# 1. Le sticky bit est-il vraiment activé ?
ls -ld /mon/repertoire
# Doit afficher : drwxrwxrwt (avec 't')

# 2. Les permissions sont-elles correctes ?
stat /mon/repertoire
# Doit montrer : Access: (1777/drwxrwxrwt)

# 3. Le filesystem supporte-t-il le sticky bit ?
mount | grep $(df /mon/repertoire | tail -1 | awk '{print $1}')
# Certains FS comme FAT32 ne supportent pas les permissions Unix

# Solution :
chmod 1777 /mon/repertoire
```

### Problème 2 : "T" majuscule au lieu de "t"

```bash
# Symptôme :
ls -ld /repertoire
drwxrwxrwT  # T majuscule

# Cause : Sticky bit activé, mais pas le bit d'exécution
# Pour un répertoire, c'est problématique (on ne peut pas y entrer)

# Solution :
chmod 1777 /repertoire  # Ajoute l'exécution
ls -ld /repertoire
drwxrwxrwt  # t minuscule = OK
```

### Problème 3 : Impossible de supprimer même mes propres fichiers

```bash
# Symptôme : rm: cannot remove 'mon_fichier': Operation not permitted

# Causes possibles :
# 1. Attribut immutable
lsattr mon_fichier
# Si 'i' affiché : fichier immutable

# Solution :
sudo chattr -i mon_fichier

# 2. SELinux/AppArmor
getenforce  # SELinux
aa-status   # AppArmor

# 3. Le répertoire parent est en lecture seule
mount | grep $(dirname /chemin/vers/fichier)
```

### Problème 4 : Permissions héritées incorrectement

```bash
# Symptôme : Les nouveaux fichiers n'ont pas les bonnes permissions

# Vérifier l'umask
umask
# 0022 est commun

# Les fichiers créés auront : 0666 - 0022 = 0644
# Les répertoires créés auront : 0777 - 0022 = 0755

# Le sticky bit n'affecte PAS les permissions des nouveaux fichiers
# Il affecte seulement la suppression

# Pour l'héritage de groupe, utiliser SGID :
chmod 2775 /repertoire  # SGID, pas sticky
```

---

## Résumé

### Points clés à retenir

| Aspect | Détail |
|--------|--------|
| **Valeur** | 1 (ou 1000 en octal complet) |
| **Symbole** | `t` (minuscule) ou `T` (majuscule) |
| **Cible** | Répertoires uniquement |
| **Effet** | Limite la suppression aux propriétaires |
| **Commande** | `chmod 1777` ou `chmod +t` |
| **Exemples** | /tmp, /dev/shm, /var/tmp |

### Commandes essentielles

```bash
# Activer
chmod 1777 /repertoire
chmod +t /repertoire

# Désactiver
chmod 0777 /repertoire
chmod -t /repertoire

# Vérifier
ls -ld /repertoire
stat /repertoire

# Trouver
find / -type d -perm -1000 2>/dev/null
```

### Quand l'utiliser ?

✅ **Utilisez le sticky bit pour :**
- Répertoires temporaires partagés
- Espaces de collaboration multi-utilisateurs
- Zones de dépôt (drop zones)
- Tout répertoire où chacun doit garder le contrôle de ses fichiers

❌ **N'utilisez PAS le sticky bit pour :**
- Fichiers individuels (n'a aucun effet)
- Contrôle d'accès complexe (utilisez ACL à la place)
- Sécurité de niveau entreprise seule (combinez avec d'autres mesures)

---

## Ressources complémentaires

### Commandes liées
- `chmod` - Modifier les permissions
- `chown` - Changer le propriétaire
- `chgrp` - Changer le groupe
- `umask` - Masque de création de fichiers
- `getfacl` / `setfacl` - ACL avancées

### Pages de manuel
```bash
man chmod
man 2 chmod  # Appel système
man sticky   # (si disponible)
```

### Fichiers système importants
- `/tmp` - Répertoire temporaire standard
- `/var/tmp` - Répertoire temporaire persistant
- `/dev/shm` - Mémoire partagée

---

## Conclusion

Le sticky bit est un mécanisme simple mais puissant pour sécuriser les répertoires partagés. En empêchant les utilisateurs de supprimer les fichiers des autres, il permet une collaboration saine tout en maintenant l'intégrité des données.

**Règle d'or** : Tout répertoire accessible en écriture par plusieurs utilisateurs devrait avoir le sticky bit activé, sauf cas particulier justifié.

N'oubliez pas : `chmod 1777` est votre ami pour les espaces partagés ! 🔒
