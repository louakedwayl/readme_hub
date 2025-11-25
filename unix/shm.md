# Cours complet sur /dev/shm

## Table des matières
1. [Introduction](#introduction)
2. [Qu'est-ce que /dev/shm ?](#quest-ce-que-devshm)
3. [Fonctionnement technique](#fonctionnement-technique)
4. [Utilisation pratique](#utilisation-pratique)
5. [Avantages et inconvénients](#avantages-et-inconvénients)
6. [Cas d'usage](#cas-dusage)
7. [Sécurité](#sécurité)
8. [Commandes utiles](#commandes-utiles)
9. [Exercices pratiques](#exercices-pratiques)

---

## Introduction

`/dev/shm` est un répertoire spécial présent sur la plupart des systèmes Linux. Contrairement aux répertoires classiques qui pointent vers un disque dur ou SSD, `/dev/shm` est un **système de fichiers temporaire stocké entièrement dans la RAM**.

---

## Qu'est-ce que /dev/shm ?

### Définition

- **shm** = **Shared Memory** (mémoire partagée)
- **Type** : `tmpfs` (temporary file system)
- **Emplacement** : RAM (mémoire vive)
- **Persistance** : Volatile (effacé au redémarrage)

### Caractéristiques principales

| Caractéristique | Valeur |
|----------------|--------|
| Type de filesystem | tmpfs |
| Emplacement physique | RAM |
| Persistance | Non (perdu au reboot) |
| Vitesse | Très rapide (vitesse RAM) |
| Taille par défaut | ~50% de la RAM |
| Permissions | 1777 (comme /tmp) |

---

## Fonctionnement technique

### tmpfs : Temporary File System

`tmpfs` est un système de fichiers qui utilise la mémoire vive (RAM) et le swap si nécessaire.

```bash
# Vérifier le montage de /dev/shm
mount | grep shm
# Sortie typique :
# tmpfs on /dev/shm type tmpfs (rw,nosuid,nodev)
```

### Architecture

```
┌─────────────────────────────────┐
│      Applications/Processus      │
└───────────────┬─────────────────┘
                │
                ▼
┌─────────────────────────────────┐
│         /dev/shm (tmpfs)         │
└───────────────┬─────────────────┘
                │
                ▼
┌─────────────────────────────────┐
│        RAM (Mémoire vive)        │
│  ┌─────┐ ┌─────┐ ┌─────┐        │
│  │File1│ │File2│ │File3│        │
│  └─────┘ └─────┘ └─────┘        │
└─────────────────────────────────┘
                │ (si RAM pleine)
                ▼
┌─────────────────────────────────┐
│          SWAP (disque)           │
└─────────────────────────────────┘
```

### Pourquoi "shared" ?

La mémoire est **partagée** entre tous les processus qui y accèdent. Plusieurs programmes peuvent lire/écrire dans `/dev/shm` simultanément.

---

## Utilisation pratique

### Vérifier l'état de /dev/shm

```bash
# Afficher l'espace disponible
df -h /dev/shm

# Sortie exemple :
# Filesystem      Size  Used Avail Use% Mounted on
# tmpfs           3.9G  8.0K  3.9G   1% /dev/shm
```

```bash
# Voir les détails du montage
mount | grep shm
```

```bash
# Lister le contenu
ls -la /dev/shm
```

### Créer et manipuler des fichiers

```bash
# Créer un fichier
echo "Hello from RAM" > /dev/shm/test.txt

# Lire le fichier
cat /dev/shm/test.txt

# Créer un dossier
mkdir /dev/shm/mon_dossier

# Copier des fichiers
cp fichier.txt /dev/shm/

# Supprimer
rm /dev/shm/test.txt
```

### Tester les performances

```bash
# Créer un fichier de 100 Mo dans /dev/shm (RAM)
time dd if=/dev/zero of=/dev/shm/testfile bs=1M count=100

# Comparer avec le disque
time dd if=/dev/zero of=/tmp/testfile bs=1M count=100
```

**Résultat typique** : `/dev/shm` est 5 à 50 fois plus rapide !

---

## Avantages et inconvénients

### ✅ Avantages

1. **Vitesse ultra-rapide**
   - Accès direct à la RAM (pas de latence disque)
   - Idéal pour les données temporaires

2. **Pas d'usure du disque**
   - Prolonge la durée de vie des SSD
   - Réduit les écritures disque

3. **Volatilité = sécurité**
   - Données effacées au reboot
   - Pas de traces sur le disque

4. **Accessible facilement**
   - Permissions ouvertes (1777)
   - Utilisable sans droits root

5. **Performances constantes**
   - Pas de fragmentation
   - Pas de latence mécanique

### ❌ Inconvénients

1. **Volatilité = perte de données**
   - Tout est perdu au redémarrage
   - Perdu si crash système

2. **Consomme de la RAM**
   - Réduit la RAM disponible pour les applications
   - Peut utiliser le swap (ralentissement)

3. **Taille limitée**
   - Par défaut ~50% de la RAM
   - Impossible de stocker de gros fichiers

4. **Pas de persistance**
   - Inadapté pour les données importantes
   - Nécessite des scripts de sauvegarde

---

## Cas d'usage

### 1. Compilation de code

```bash
# Compiler dans la RAM pour plus de rapidité
cd /dev/shm
git clone https://github.com/projet.git
cd projet
make -j$(nproc)
```

**Gain** : Compilation 20-40% plus rapide !

### 2. Cache temporaire

```bash
# Cache navigateur
firefox -profile /dev/shm/firefox-profile

# Cache d'application
export TMPDIR=/dev/shm
```

### 3. Extraction d'archives

```bash
# Extraire dans la RAM
tar -xzf archive.tar.gz -C /dev/shm/
```

### 4. Tests et développement

```bash
# Base de données temporaire
sqlite3 /dev/shm/test.db

# Fichiers de tests
pytest --basetemp=/dev/shm/pytest
```

### 5. CTF et sécurité

```bash
# Exploits temporaires (pas de traces)
mkdir /dev/shm/exploit
echo '#!/bin/bash' > /dev/shm/exploit/payload.sh
chmod +x /dev/shm/exploit/payload.sh
```

### 6. Scripts et automatisation

```bash
# Fichiers de verrous (locks)
lockfile=/dev/shm/mon_script.lock
if [ -f "$lockfile" ]; then
    echo "Script déjà en cours"
    exit 1
fi
touch "$lockfile"
# ... faire le travail ...
rm "$lockfile"
```

---

## Sécurité

### Permissions par défaut

```bash
ls -ld /dev/shm
# drwxrwxrwt 2 root root 40 Nov 25 10:00 /dev/shm
```

- `1777` = Sticky bit activé
- Tout le monde peut écrire
- Seul le propriétaire peut supprimer ses fichiers

### Risques potentiels

1. **Exploitation par malwares**
   - Les malwares peuvent stocker du code en RAM
   - Pas de traces sur le disque (difficile à détecter)

2. **Fuites de données**
   - Données sensibles accessibles à tous
   - Attention aux permissions des fichiers

3. **Déni de service (DoS)**
   - Un utilisateur peut remplir /dev/shm
   - Bloque les autres utilisateurs

### Bonnes pratiques

```bash
# 1. Créer des fichiers avec permissions restrictives
touch /dev/shm/secret.txt
chmod 600 /dev/shm/secret.txt

# 2. Nettoyer après utilisation
trap "rm -rf /dev/shm/mon_dossier" EXIT

# 3. Vérifier l'espace disponible
if [ $(df /dev/shm | tail -1 | awk '{print $5}' | sed 's/%//') -gt 80 ]; then
    echo "Alerte : /dev/shm presque plein !"
fi
```

### Surveillance

```bash
# Monitorer l'utilisation
watch -n 1 'df -h /dev/shm'

# Voir les processus utilisant /dev/shm
lsof +D /dev/shm

# Chercher des fichiers suspects
find /dev/shm -type f -ls
```

---

## Commandes utiles

### Configuration

```bash
# Voir la taille maximale configurée
df -h /dev/shm

# Modifier la taille (temporaire, jusqu'au reboot)
sudo mount -o remount,size=8G /dev/shm

# Modifier la taille de façon permanente
# Éditer /etc/fstab et ajouter :
# tmpfs /dev/shm tmpfs defaults,size=8G 0 0
```

### Monitoring

```bash
# Utilisation en temps réel
watch -n 1 'du -sh /dev/shm/*'

# Fichiers les plus gros
du -sh /dev/shm/* | sort -h

# Nombre de fichiers
find /dev/shm -type f | wc -l
```

### Nettoyage

```bash
# Supprimer tout le contenu (attention !)
sudo rm -rf /dev/shm/*

# Supprimer seulement vos fichiers
rm -rf /dev/shm/$(whoami)_*

# Nettoyer les fichiers de plus de 7 jours
find /dev/shm -type f -mtime +7 -delete
```

---

## Exercices pratiques

### Exercice 1 : Mesurer les performances

```bash
# 1. Créer un fichier de 500 Mo sur disque
time dd if=/dev/zero of=/tmp/disk_test bs=1M count=500

# 2. Créer le même fichier en RAM
time dd if=/dev/zero of=/dev/shm/ram_test bs=1M count=500

# 3. Comparer les temps
# Question : Quel est le gain de performance ?
```

### Exercice 2 : Script de compilation

Créer un script qui :
1. Clone un dépôt Git dans `/dev/shm`
2. Compile le projet
3. Copie le binaire résultant vers `/usr/local/bin`
4. Nettoie `/dev/shm`

```bash
#!/bin/bash
REPO="https://github.com/exemple/projet.git"
WORKDIR="/dev/shm/build_$$"

# À compléter...
```

### Exercice 3 : Cache intelligent

Créer un système de cache :
- Stocke les résultats de commandes coûteuses dans `/dev/shm`
- Expire après 5 minutes
- Affiche "(cached)" si la donnée vient du cache

### Exercice 4 : Sécurité

```bash
# 1. Créer un fichier secret dans /dev/shm
# 2. Le rendre lisible uniquement par vous
# 3. Vérifier qu'un autre utilisateur ne peut pas le lire
# 4. Le supprimer automatiquement après utilisation
```

---

## Résumé

| Aspect | Détail |
|--------|--------|
| **Qu'est-ce que c'est ?** | Système de fichiers en RAM |
| **Avantage principal** | Vitesse extrême |
| **Inconvénient principal** | Volatile (perdu au reboot) |
| **Cas d'usage** | Compilation, cache, tests, exploits temporaires |
| **Taille par défaut** | ~50% de la RAM |
| **Commande de base** | `df -h /dev/shm` |

---

## Ressources supplémentaires

- `man tmpfs` - Documentation officielle
- `/proc/meminfo` - Informations sur la mémoire
- `free -h` - Voir la RAM disponible
- [Kernel.org tmpfs documentation](https://www.kernel.org/doc/Documentation/filesystems/tmpfs.txt)

---

**Note finale** : `/dev/shm` est un outil puissant pour optimiser les performances, mais doit être utilisé avec précaution en raison de sa nature volatile et de ses implications en termes de sécurité.
