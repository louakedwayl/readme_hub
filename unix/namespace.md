# Namespace

---

## Définition

Les **namespaces** créent une illusion : un processus voit le système comme s’il était seul.  

- Il voit ses propres PIDs  
- Son propre `/proc`  
- Ses propres interfaces réseau  
- Son propre arborescence de fichiers  
- Etc.

**Exemple :**  
Deux conteneurs peuvent avoir chacun un processus PID 1, un hostname différent, ou une interface réseau `eth0`.  
Grâce aux namespaces, chacun pense être seul au monde.

Un namespace (espace de nom) en Unix/Linux est une fonctionnalité du noyau Linux qui permet d’isoler certains aspects d’un système pour des groupes de processus. Chaque type de namespace isole un composant spécifique du système (réseau, PIDs, montages, etc.).

---

## Types de namespaces

| Type      | Nom technique    | Ce qu’il isole                                      |
|-----------|-----------------|----------------------------------------------------|
| UTS       | CLONE_NEWUTS    | Nom de l’hôte (hostname) et nom du domaine        |
| PID       | CLONE_NEWPID    | Espace de numérotation des processus              |
| Mount     | CLONE_NEWNS     | Système de fichiers (points de montage séparés)   |
| IPC       | CLONE_NEWIPC    | Objets IPC System V (sémaphores, files de messages, etc.) |
| Network   | CLONE_NEWNET    | Interfaces réseau, IP, routage, ports            |
| User      | CLONE_NEWUSER   | Identifiants UID/GID visibles dans le namespace  |
| Cgroup    | CLONE_NEWCGROUP | Vue sur la hiérarchie des cgroups                |
| Time      | CLONE_NEWTIME   | Horloge système visible (tests, containers, etc.)|

---

## Fonctionnement

Quand un processus est lancé dans un namespace, il ne voit que les ressources de son propre namespace, comme s’il était dans une "mini-copie" de l’OS.  
Exemple : deux conteneurs peuvent avoir chacun un processus PID 1, chacun avec un `/proc` qui lui est propre.

---

## Exemple de création avec `unshare`

```bash
sudo unshare --uts --pid --mount --fork bash
```