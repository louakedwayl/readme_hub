# /proc – Le pseudo-système de fichiers de Linux

---

## 1. Qu’est-ce que /proc ?

`/proc` est un système de fichiers virtuel (procfs) qui permet de communiquer avec le noyau Linux et d’obtenir des informations sur les processus et le système.  

Il ne contient pas de fichiers réels sur disque, mais des fichiers dynamiques générés en temps réel par le noyau.

---

## 2. Caractéristiques de /proc

- Monté automatiquement sur `/proc` (souvent dans le `fstab`).  
- Réactualisé en direct : les fichiers changent selon l’état du système.  
- Accès en lecture simple : via `cat`, `less`, ou des scripts.

---

## 3. Structure du dossier /proc

```bash
ls /proc
```

### A. Dossiers numériques (/proc/[PID]/)

Chaque dossier correspond à un processus en cours (son PID).

### Exemple : /proc/1/ contient les infos sur le processus 1, souvent systemd ou init.

### Fichiers et sous-dossiers utiles :

cmdline → commande lancée

cwd → répertoire courant

exe → chemin de l'exécutable

fd/ → descripteurs de fichiers ouverts

status → statut détaillé

stat → infos chiffrées (CPU, état, threads, etc.)

maps → mémoire virtuelle

### B. Fichiers système (globaux)

#### Exemples :

/proc/cpuinfo → détails sur les processeurs

/proc/meminfo → mémoire RAM utilisée

/proc/uptime → temps depuis le démarrage

/proc/version → version du noyau

/proc/filesystems → systèmes de fichiers supportés

## 4. Exemples de commandes utiles

### Informations système

cat /proc/cpuinfo       # Infos CPU
cat /proc/meminfo       # Infos mémoire
cat /proc/uptime        # Durée depuis le boot
cat /proc/version       # Version du noyau

### Infos sur un processus

ps aux                   # Voir tous les processus
ls /proc/$$              # Infos du shell actuel
cat /proc/$$/status      # Infos détaillées (PID, état, mémoire, etc.)
ls /proc/$$/fd           # Fichiers ouverts

    $$ = PID du shell courant

## 5. Interaction avec /proc

Lire un fichier :

```bash
cat /proc/1/cmdline
```

Lister les fichiers ouverts d’un processus :

```bash
ls -l /proc/1234/fd
```

Changer des paramètres du noyau :

```bash
echo 1 > /proc/sys/net/ipv4/ip_forward
````

Méthode moderne plus sûre :

```bash
sudo sysctl net.ipv4.ip_forward=1
```

## 6. Utilisation en programmation

Parcourir /proc depuis un programme C/C++ pour obtenir des infos système.

Exemple : ouvrir /proc/self/status pour lire les infos du processus courant.

## 7. Sécurité et permissions

Lecture de /proc/[PID]/ possible si :

Tu es propriétaire du processus, ou

Tu es root

Certains fichiers sont protégés pour éviter des fuites d’infos sensibles.

## 8. Résumé

| Élément        | Contenu                                           |
|----------------|-------------------------------------------------|
| /proc/[PID]/   | Infos sur un processus spécifique               |
| /proc/cpuinfo  | Infos sur les CPU                                |
| /proc/meminfo  | Utilisation de la mémoire                        |
| /proc/uptime   | Temps écoulé depuis le démarrage                |
| /proc/sys/     | Paramètres système modifiables                  |

**Utilisé par :** `ps`, `top`, `htop`, Docker, systemd, outils d’analyse système
