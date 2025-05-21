		Cgroups (Control Groups)
************************************************************************************************

	Définition :
	------------

Les Cgroups (abréviation de Control Groups) sont une fonctionnalité du noyau Linux qui permet de 
limiter, prioriser, surveiller et isoler les ressources système (CPU, mémoire, I/O, réseau, etc.) 
utilisées par un ou plusieurs processus.

Ils sont utilisés pour garantir que chaque groupe de processus reste dans ses limites de ressources, ce qui est fondamental pour les conteneurs.

	Principaux usages :
	-------------------

Limiter : empêcher un processus de dépasser une quantité de mémoire ou CPU.
Prioriser : donner plus de ressources à un groupe spécifique.
Isoler : éviter qu’un groupe ne gêne les autres.
Surveiller : obtenir des statistiques sur la consommation de ressources.

	Ressources contrôlables :
	-------------------------

Ressource	Description
cpu	Part du CPU qu’un groupe peut utiliser
memory	Quantité de mémoire RAM autorisée
blkio	Vitesse d'accès aux disques (I/O disque)
cpuset	Nombres de cœurs CPU et de nœuds NUMA utilisables
pids	Nombre maximum de processus
devices	Accès autorisé aux périphériques
net_cls, net_prio	Contrôle de la priorité réseau
freezer	Suspendre ou reprendre des processus

	Fonctionnement général :
	------------------------

    On crée un groupe de contrôle.

    On attache un ou plusieurs processus à ce groupe.

    On définit des règles de ressources pour ce groupe.

    Le noyau applique automatiquement les limitations.

	Arborescence typique (cgroups v1)

Montée dans /sys/fs/cgroup/ :

/sys/fs/cgroup/cpu/mygroup/
/sys/fs/cgroup/memory/mygroup/

	Contenu :
	---------

    tasks : liste des PIDs assignés au groupe

    cpu.shares : part du CPU

    memory.limit_in_bytes : limite mémoire

    memory.usage_in_bytes : mémoire utilisée

	Exemple simple (v1)
	-------------------

1. Créer un groupe :

mkdir /sys/fs/cgroup/memory/mon_groupe

2. Limiter la mémoire :

echo 100000000 > /sys/fs/cgroup/memory/mon_groupe/memory.limit_in_bytes

3. Ajouter un processus (PID 1234) :

echo 1234 > /sys/fs/cgroup/memory/mon_groupe/tasks

	Cgroups v1 vs v2 :
	------------------

Aspect	v1	v2
Structure	Hiérarchie séparée par contrôleur	Arborescence unifiée
Syntaxe	Plusieurs fichiers par ressource	Un fichier unique cgroup.controllers
Simplicité	Moins uniforme	Plus cohérent, plus moderne
Docker	Supporte les deux	Docker utilise v2 depuis peu (ex. Fedora)

→ Tu peux vérifier ta version avec :

cat /sys/fs/cgroup/cgroup.controllers

Utilisation dans Docker

Docker utilise les cgroups + namespaces pour isoler les conteneurs.

Exemple :

docker run --memory=100m --cpus="1.5" ubuntu

→ Crée automatiquement des cgroups avec les limites spécifiées.

Sécurité et surveillance

    Les cgroups permettent d’éviter les abus de ressources (ex. fork bombs, process gloutons).

    Très utiles en multi-utilisateur ou sur les serveurs mutualisés.

	Résumé :
	--------

Élément	Détail
But	Limiter, surveiller, contrôler les ressources
Cœur du système	/sys/fs/cgroup/
Utilisé par	Docker, Kubernetes, systemd, LXC, etc.
Version actuelle	Cgroups v2 (plus simple, unifiée)

**************************************************************************************************
