					PIPE ANONYME
*****************************************************************************************************

	Un pipe anonyme est une structure de données qui s'apparente a un buffer stocker dans 
la Kernell memory qui permet de faire communiquer deux processus, (anonyme car il n'a pas de nom 
visible dans le systeme de fichier contrairement au pipe nommés). 

	Le pipe anonyme est present seulement dans la kernell memory et la file table 
utilisateur par consequent aucune entree n'est present dans la table inode.
Lorsque un processus utilisateur crée un pipe anonyme avec pipe(), plusieurs choses se passent :

    Le noyau alloue un buffer en Kernell Memory pour stocker les données échangées.
Deux descripteurs de fichiers sont créés : un pour la lecture (pipefd[0]) et un pour l'écriture (pipefd[1]).
Ces descripteurs sont stockés dans la file table utilisateur du processus.

Premier processus ecrivain :
Redirige stdout → pipefd[1], puis ferme les fds inutilisés.

Deuxième processus lecteur :
Redirige stdin → pipefd[0], puis ferme les fds inutilisés.

Parent :
Ferme les deux extrémités du pipe après avoir forké les enfants.

 Le processus pere n’as pas besoin d’attendre que les processus enfants aient terminé avant de fermer 
les descripteurs dans le parent. Chaque processus enfant dispose de sa propre copie des descripteurs de pipe après un fork().
Le parent peut fermer ses propres descripteurs sans affecter les copies dans les enfants.
Pourquoi fermer rapidement dans le parent ?

    Cela libère des ressources inutiles.
    Évite des fuites de descripteurs ou des comportements indésirables (par ex., garder le pipe ouvert plus longtemps qu’il ne le faut).Pourquoi fermer rapidement dans le parent ?

Si le processus parent garde l’extrémité d’écriture (pipefd[1]) ouverte, le processus lecteur (le deuxième enfant exécutant wc -l) n’obtient jamais l’EOF et attend indéfiniment des données.

******************************************************************************************************

Fermer le descripteur d'écriture immédiatement dans le parent est une bonne pratique pour :

    Prévenir les deadlocks.
    Signaler la fin des données (EOF) aux lecteurs.
    Gérer efficacement les ressources.

******************************************************************************************************
