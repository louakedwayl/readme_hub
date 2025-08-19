# Table des processus (Process Table)

La table des processus est une structure de données dans les systèmes d'exploitation de type Unix/Linux.  
Elle est stockée dans la mémoire noyau (kernel memory) et permet de gérer et suivre l'ensemble des processus actifs, ainsi que certains processus terminés comme les zombies.

## Structure et contenu de la table des processus

Chaque entrée contient des informations spécifiques sur un processus :

- **PID (Process ID)** : Identifiant unique pour distinguer chaque processus.
- **PPID (Parent Process ID)** : PID du processus parent qui a créé le processus courant.
- **Statut du processus** : Indique l'état actuel du processus (Running, Waiting, Stopped, Zombie, etc.).
- **UID et GID (User ID et Group ID)** : Identifiants de l’utilisateur et du groupe possédant le processus.
- **Compte de ressources** : Infos sur les ressources consommées (CPU, mémoire, etc.).
- **Priorité et classe de planification** : Influence l'ordre d'exécution du processus par le noyau.
- **Espace mémoire** : Segments de code, données, pile, etc.
- **Descripteurs de fichiers** : Table des fichiers ouverts par le processus (fichiers, pipes, sockets, etc.).
- **Contexte de l’exécution** : État du processeur (registres, compteur de programme, etc.) au moment où le processus a été interrompu.
- **CWD (Current Working Directory)** : Répertoire courant du processus. Modifiable dynamiquement via `chdir()` ou `fchdir()`.

> Chaque processus est suivi précisément pour que le noyau puisse le planifier, gérer ses ressources et reprendre son exécution exactement là où elle s’est arrêtée.
