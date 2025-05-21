					Namespace
************************************************************************************************

Namespaces :

    Ils créent une illusion. Un processus voit le système comme s’il était seul.

    Il voit ses propres PIDs

    Son propre /proc

    Ses propres interfaces réseau

    Son propre arborescence de fichiers

    Etc.

	Exemple :
	---------

Deux conteneurs peuvent avoir chacun un processus PID 1, 
un hostname différent, ou une interface réseau eth0.

→ Grâce aux namespaces, chacun pense être seul au monde.

Un namespace (espace de nom) en Unix/Linux est une fonctionnalité du noyau Linux qui permet d’isoler certains aspects d’un système pour des groupes de processus.

Chaque type de namespace isole un composant spécifique du système (réseau, PIDs, montages, etc.).

Cela permet à des processus de penser qu’ils sont seuls sur le système, ce qui est la base de la 
conteneurisation.

	2/ Les types de namespaces :
	----------------------------

Type	Nom technique	Ce qu’il isole
UTS	CLONE_NEWUTS	Nom de l’hôte (hostname) et nom du domaine (domainname)
PID	CLONE_NEWPID	Espace de numérotation des processus (chaque conteneur commence à 1)
Mount	CLONE_NEWNS	Système de fichiers (points de montage séparés)
IPC	CLONE_NEWIPC	Objets IPC System V (sémaphores, files de messages, etc.)
Network	CLONE_NEWNET	Interfaces réseau, IP, routage, ports
User	CLONE_NEWUSER	Identifiants UID/GID visibles dans le namespace
Cgroup	CLONE_NEWCGROUP	Vue sur la hiérarchie des cgroups (groupes de ressources)
Time	CLONE_NEWTIME	Horloge système visible (pour tests, containers, etc.)

	3/ Comment ça marche ? :
	------------------------

Quand un processus est lancé dans un namespace, il ne voit que les ressources de son 
propre namespace, comme s’il était dans une "mini-copie" de l’OS.

Exemple : deux conteneurs peuvent avoir chacun un processus PID 1,
chacun avec un /proc qui lui est propre.

	4/ Exemple de création avec unshare :
	-------------------------------------

sudo unshare --uts --pid --mount --fork bash

Cette commande lance un shell (bash) dans des namespaces isolés :

    --uts → permet de changer le nom de l’hôte sans impacter le système réel.

    --pid → l’espace des processus sera séparé.

    --mount → isolation des points de montage.

    --fork → lance un nouveau processus pour appliquer l’isolation correctement.

hostname container42

    Maintenant, tu peux taper hostname dans ce shell : ça ne changera le hostname que dans ce namespace.

	5/ Exemple avec setns et nsenter :
	----------------------------------
Tu peux aussi rejoindre un namespace existant :

sudo nsenter --target <PID> --net

→ entre dans le namespace réseau du processus <PID>.
	
	6/ Où sont stockés les namespaces ? :
	-------------------------------------

Chaque namespace est un fichier spécial dans /proc/[PID]/ns/ :

ls -l /proc/$$/ns/

Tu verras des fichiers comme :

mnt -> mnt:[4026531840]
pid -> pid:[4026531836]
uts -> uts:[4026531838]

Chaque ID ([4026…]) correspond à un namespace spécifique.

	7/ Pourquoi c’est important ? :
	-------------------------------

Les namespaces sont la brique de base de l’isolation dans :

    Docker

    LXC / LXD

    Kubernetes

    Chroot avancé

    et plus généralement les conteneurs Linux

	8/ Limitations :
	----------------

    L’isolation n’est pas une sécurité absolue (le noyau est partagé).

    Certains types de namespaces nécessitent des droits root.

    Pour des isolations vraiment sûres, on les combine avec les cgroups et des mécanismes comme seccomp ou AppArmor.

	9/ Résumé :
	-----------

    Les namespaces permettent d’isoler des ressources pour des processus.

    Il en existe plusieurs types : PID, réseau, montage, utilisateurs, etc.

    Ils sont essentiels pour faire tourner plusieurs environnements isolés sur un seul système 
(comme les conteneurs).

    Outils clés : unshare, nsenter, /proc/[pid]/ns/

****************************************************************************************************
