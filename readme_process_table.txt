					Process Table 
********************************************************************************************************

	La table des processus (ou process table) est une structure de données 
dans les systèmes d'exploitation de type Unix/Linux. Elle est stockée
 dans la mémoire noyau (kernel memory), un segment spécifique de la RAM réservé au 
noyau du système. Cette table est utilisée pour gérer et suivre l'ensemble des processus
 actifs et certains processus terminés, comme les processus zombies.
Structure et Contenu de la Table des Processus

Chaque entrée dans la table des processus contient des informations spécifiques sur un
 processus, telles que :

    PID (Process ID) : Un identifiant unique attribué à chaque processus pour le distinguer des autres.

    PPID (Parent Process ID) : Le PID du processus parent, c'est-à-dire du processus
qui a créé le processus courant.

    Statut du Processus : Indique l'état actuel du processus

    UID et GID (User ID et Group ID) : Identifiants de l’utilisateur et du groupe 
qui possèdent le processus, ce qui détermine les permissions d'accès aux ressources.

    Compte de Ressources : Informations sur les ressources consommées par le processus,
 comme le temps CPU, la mémoire allouée, etc.

    Priorité et Classe de Planification : Détermine la priorité du processus dans 
la file d'attente de l'ordonnanceur, influençant l'ordre dans lequel il sera exécuté par le noyau.

    Espace Mémoire : Informations sur l’espace mémoire alloué au processus, y compris les segments 
de code, de données et de pile. Ces informations sont essentielles pour la gestion de la mémoire.

    Descripteurs de Fichiers : Table des fichiers ouverts par le processus, ce qui inclut les fichiers, les pipes, les sockets, etc. Chaque processus utilise des descripteurs pour gérer ses entrées/sorties.

    Contexte de l’Exécution : L'état du processeur (les registres, le compteur de programme, etc.) 
au moment où le processus a été interrompu. Cela permet au système de reprendre
 l'exécution du processus exactement à l'endroit où il avait été stoppé.


*******************************************************************************************************
