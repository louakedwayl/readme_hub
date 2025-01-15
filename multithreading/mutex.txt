					Mutex
*********************************************************************************************

Un mutex (abréviation de "mutual exclusion") est un mécanisme de synchronisation utilisé 
dans un environnement multithread. Il permet d'assurer qu'un seul thread à la fois peut 
accéder à une ressource critique ou exécuter une section critique du code.

Fonctionnement général:
-----------------------

L'utilisation d'un mutex repose sur deux actions principales :
--------------------------------------------------------------
    1/ Acquérir la propriété du mutex : un thread peut verrouiller le mutex 
	à l'aide de la fonction pthread_mutex_lock.
    2/ Relâcher la propriété du mutex : le mutex est libéré par le thread via 
la fonction pthread_mutex_unlock, permettant à d'autres threads d'y accéder.

Ces mécanismes garantissent l'exclusion mutuelle, c'est-à-dire que tant qu'un thread détient 
le mutex, aucun autre thread ne peut y accéder.

*********************************************************************************************
