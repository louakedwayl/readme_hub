	/proc – Le pseudo-système de fichiers de Linux
************************************************************************************

	1/ Qu’est-ce que /proc ? :
	--------------------------

/proc est un système de fichiers virtuel (aussi appelé procfs) qui permet de communiquer avec 
le noyau Linux et d’obtenir des informations sur les processus et le système.

Il ne contient pas de fichiers réels sur disque, mais des fichiers dynamiques générés en temps réel 
par le noyau.

	2/ Caractéristiques de /proc :
	------------------------------

    Monté automatiquement sur /proc (souvent dans le fstab).

    Réactualisé en direct : les fichiers changent selon l’état du système.

    Accès en lecture simple : via cat, less, ou des scripts.

	3/ Structure du dossier /proc :
	-------------------------------

ls /proc

On y trouve :

	A. Dossiers numériques (/proc/[PID]/) :
	---------------------------------------

Chaque dossier correspond à un processus en cours (son PID).

Exemple :

/proc/1/

Contient les infos sur le processus 1, souvent systemd ou init.

Sous-dossiers et fichiers utiles :

    cmdline → commande lancée

    cwd → répertoire courant

    exe → chemin de l'exécutable

    fd/ → descripteurs de fichiers ouverts

    status → statut détaillé

    stat → infos chiffrées (CPU, état, threads, etc.)

    maps → mémoire virtuelle

	B. Fichiers système (globaux) :
	-------------------------------

Exemples :
----------

    /proc/cpuinfo → détails sur les processeurs

    /proc/meminfo → mémoire RAM utilisée

    /proc/uptime → temps depuis le démarrage

    /proc/version → version du noyau

    /proc/filesystems → systèmes de fichiers supportés

	4/ Exemples de commandes utiles :
	---------------------------------

	Informations système :
	----------------------

cat /proc/cpuinfo       # Infos CPU
cat /proc/meminfo       # Infos mémoire
cat /proc/uptime        # Durée depuis le boot
cat /proc/version       # Version du noyau

	Voir les infos d’un processus :
	-------------------------------

ps aux                   # Voir tous les processus
ls /proc/$$              # Voir les infos de ton shell actuel
cat /proc/$$/status      # Infos détaillées (PID, état, mémoire, etc.)
ls /proc/$$/fd           # Fichiers ouverts

    $$ = PID du shell courant

	5/ Interaction avec /proc :
	---------------------------

Lire un fichier dans /proc :

cat /proc/1/cmdline

Lister les fichiers ouverts d’un processus :

ls -l /proc/1234/fd

Changer des paramètres du noyau :

Certains fichiers dans /proc/sys/ sont écrits par l’admin système.

Exemple : activer l’IP forwarding

echo 1 > /proc/sys/net/ipv4/ip_forward

→ Mais la méthode moderne, plus sûre, passe par sysctl :

sudo sysctl net.ipv4.ip_forward=1

	6/ Utilisation en programmation (bonus avancé) :
	------------------------------------------------

Tu peux parcourir /proc depuis un programme C/C++ pour obtenir des infos système.
Exemple : ouvrir /proc/self/status pour lire les infos du processus courant.

	7/ Sécurité et permissions :
	----------------------------

    Tu ne peux lire /proc/[PID]/ que si :

        Tu es propriétaire du processus,

        ou tu es root.

    Certains fichiers sont protégés pour éviter des fuites d’infos sensibles.

	8/ Résumé :
	-----------

Élément	Contenu
/proc/[PID]/	Infos sur un processus spécifique
/proc/cpuinfo	Infos sur les CPU
/proc/meminfo	Utilisation de la mémoire
/proc/uptime	Temps écoulé depuis le démarrage
/proc/sys/	Paramètres système modifiables
Utilisé par	ps, top, htop, Docker, systemd, outils d’analyse système

*****************************************************************************************
