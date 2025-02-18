				Thread
**********************************************************************************

	Un thread, ou fil d'exécution, est une séquence d'instructions qui
peut être exécutée de manière indépendante par le processeur.
Un processus contient au minimum un thread, appelé le thread principal,
mais il peut en contenir plusieurs.


Partage des ressources :
------------------------

	Chaque thread a sa propre stack independante a chaque thread.

Ressource partage avec le thread principal : La heap , les files descriptor.


Synchronisation des threads :
-----------------------------

	Lorsque plusieurs threads accèdent à des ressources partagées sans 
synchronisation appropriée, et qu'au moins un thread a la capacité d'écrire 
sur la ressource, on parle de condition de concurrence (race condition). 
Dans ce cas, la lecture de la ressource peut produire des résultats indéfinis.

***********************************************************************************
