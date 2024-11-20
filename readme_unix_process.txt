				Unix Process
****************************************************************************************************

	Un processus est une instance en cours d'exécution d'un programme. 
Lorsqu'un programme est lancé sur un ordinateur, il est chargé en mémoire et devient un processus. 
Lorsqu'un processus enfant termine son exécution, le kernell envoie un signal SIGCHLD à son processus parent. Ce signal indique au parent que l'enfant a fini et le parent va récupérer son code de sortie (via fonction wait() par exemple), et apres avoir reçu cette exite code le kernell va liberer les ressources allouées à ce processus enfant, c'est a dire les rendre de nouveaux disponible pour 
un nouveau processus.

****************************************************************************************************


Statut du Processus : Indique l'état actuel du processus, par exemple :
-----------------------------------------------------------------------

Exécution (Running) : Le processus est actuellement en cours d'exécution sur le processeur.

En attente (Waiting/Blocked) : Le processus attend une ressource ou un événement pour continuer.

Arrêté (Stopped) : Le processus est suspendu (généralement par un signal SIGSTOP).

Zombie : Le processus a terminé son exécution, mais son entrée n’a pas encore été supprimée  de la table des processus par le processus parent (lorsqu'il attend que le parent lise son statut de terminaison).

Orphan process :
------------------------------------------------------------------------

    Un processus orphelin est un processus qui reste en exécution après la fin
 de son processus parent ce qui fait que le processus ne peut plus signaler la fin 
de son exécution à son parent.. Lorsqu'une telle situation se produit, le processus
 orphelin est adopté par systemd ou init (PID 1), ce qui assure sa gestion 
jusqu'à la fin de son exécution. Une fois que le processus orphelin se termine, init va
 récupérer le code de sortie du processus orphelin à l'aide de la fonction wait() ou waitpid(),
 de la même manière que le parent d'un processus normal.

	Le rôle de init (ou systemd) est de prendre en charge ces processus orphelins
 pour les "nettoyer" une fois qu'ils ont terminé leur exécution. Cela permet d'éviter
 que ces processus restent dans la table des processus en tant que zombies.

Zombie process :
---------------------------------------------------------------------------

	Un processus zombie est un processus qui a terminé son exécution, mais dont 
l'entrée dans la table des processus n'a pas encore été supprimée. Cela se produit parce 
que son processus parent n'a pas encore récupéré son exit code via un syscall.












**************************************************************************************************
