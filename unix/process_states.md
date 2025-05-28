	Les états des processus en système d’exploitation
******************************************************************************

	1/ Qu’est-ce qu’un processus ?
	------------------------------

Un processus est un programme en cours d’exécution.
Le système d’exploitation gère plusieurs processus en même temps,
en leur allouant du temps CPU, de la mémoire, etc.

	2/ États classiques d’un processus :
	------------------------------------

Un processus peut être dans différents états selon ce qu’il fait ou attend :

a) Running (En cours d’exécution)
Le processus est actif, il utilise le CPU pour faire son travail.

b) Waiting (En attente)
Le processus attend un événement externe, comme une entrée/sortie, une ressource libre ou une réponse.
Exemple : un programme qui attend que tu appuies sur une touche.

c) Stopped (Arrêté ou suspendu)
Le processus est temporairement suspendu, souvent par un signal envoyé depuis le terminal.
Exemple : tu as appuyé sur Ctrl+Z dans un terminal pour suspendre un processus.

d) Zombie
Le processus a terminé son travail, mais son parent (le processus qui l’a créé)
n’a pas encore lu son statut de fin.
Le processus zombie est encore listé dans la table des processus mais ne tourne plus.

e) Idle (Inactif ou prêt)
Le processus est prêt à s’exécuter mais attend que le CPU lui soit alloué.

	3/ Premier plan et arrière-plan :
	---------------------------------

Ce sont des notions liées à la relation entre un processus et le terminal.

	Premier plan (Foreground) :
	---------------------------

    Le processus est lié directement au terminal.

    Il reçoit les entrées clavier et affiche la sortie dans la console.

    Tant qu’il tourne, tu ne peux pas utiliser la console pour autre chose.

	Arrière-plan (Background) :
	---------------------------

    Le processus tourne sans bloquer la console.

    Tu peux continuer à utiliser la console pour d’autres commandes.

    Le processus n’interagit pas directement avec la saisie clavier.

    En Linux, on met souvent un & à la fin d’une commande pour lancer un processus en arrière-plan.

	4/ Exemple pratique avec Linux

    Lancer un processus en premier plan :

$ top

top occupe le terminal jusqu’à ce que tu le quittes.

    Lancer un processus en arrière-plan :

$ top &

top tourne en arrière-plan, la console est libre.

    Suspendre un processus en premier plan :
    Appuie sur Ctrl+Z, le processus passe en stopped.

    Reprendre un processus stoppé en arrière-plan :

$ bg

    Reprendre un processus stoppé en premier plan :

$ fg

	5/ Pourquoi c’est important dans Docker ?
	-----------------------------------------

Dans Docker, un container est vivant tant que son processus principal tourne en premier plan.
Si ce processus part en arrière-plan ou termine, Docker arrête le container.

C’est pour ça que nginx est souvent configuré pour tourner en premier plan dans un container.

**************************************************************************************************
