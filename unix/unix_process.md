# Unix Process

Un processus est une instance en cours d'exécution d'un programme.  
Lorsqu'un programme est lancé sur un ordinateur, il est chargé en mémoire et devient un processus.  

Lorsqu'un **processus enfant** termine son exécution, le **kernel** envoie un signal `SIGCHLD` à son **processus parent**.  
Ce signal indique au parent que l'enfant a fini et permet au parent de récupérer le **code de sortie** (via la fonction `wait()` par exemple).  
Une fois le code de sortie récupéré, le kernel libère les ressources allouées à ce processus enfant, les rendant disponibles pour de nouveaux processus.

---

## Statut du Processus

Indique l'état actuel du processus, par exemple :

- **Exécution (Running)** : Le processus est actuellement en cours d'exécution sur le processeur.
- **En attente (Waiting / Blocked)** : Le processus attend une ressource ou un événement pour continuer.
- **Arrêté (Stopped)** : Le processus est suspendu (généralement par un signal `SIGSTOP`).
- **Zombie** : Le processus a terminé son exécution, mais son entrée n’a pas encore été supprimée de la table des processus par le parent.

---

## Orphan Process

Un processus **orphelin** est un processus qui reste en exécution après la fin de son processus parent.  
Il ne peut donc plus signaler sa fin à son parent.  

- Dans ce cas, le processus orphelin est adopté par `systemd` ou `init` (PID 1), qui gère sa terminaison.
- Une fois terminé, `init` récupère le **code de sortie** via `wait()` ou `waitpid()`, de la même manière qu’un parent normal.
- Le rôle de `init` (ou `systemd`) est donc de "nettoyer" ces processus orphelins pour éviter qu'ils restent dans la table des processus en tant que **zombies**.

---

## Zombie Process

Un processus **zombie** est un processus qui a terminé son exécution, mais dont l’entrée dans la table des processus n’a pas encore été supprimée.  

- Cela se produit lorsque le **processus parent** n’a pas encore récupéré le **exit code** via un syscall.
- Les zombies restent listés dans la table des processus mais ne consomment pas de ressources CPU ou mémoire significatives.
