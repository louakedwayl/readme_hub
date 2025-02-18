					       git reset
*****************************************************************************************************

	La commande git reset est utilisée pour réinitialiser l'état de HEAD (le pointeur vers 
le dernier commit sur la branche actuelle) et, éventuellement, l'état de l'index et du répertoire 
de travail. Elle est très utile pour annuler des commits ou modifier l'état de votre dépôt local.

Voici une explication détaillée de git reset, ses modes et son fonctionnement.

Syntaxe générale:
-----------------

git reset [<mode>] [<commit>]

<mode> : Définit jusqu'à quel niveau (HEAD, index, ou répertoire de travail) le reset doit affecter.

    Les modes principaux sont : --soft, --mixed, et --hard.

<commit> : Le commit vers lequel HEAD doit être déplacé. Par défaut, HEAD est réinitialisé à HEAD~1 (le commit précédent).


1/ git reset :
--------------

	Cela déplace les fichiers de la zone de staging vers l'espace de travail (working directory),
 les rendant à nouveau non suivis ou modifiés selon leur état initial.

2/ git reset soft :  git reset --soft <commit>
-------------------
	
	--soft : Conserve tout, ne touche qu'à HEAD.

Déplace uniquement le pointeur HEAD vers le commit spécifié.
Les modifications dans les fichiers restent staged (dans l'index).
Idéal si vous voulez recréer un commit ou modifier un message.


git reset --soft HEAD~1

Annule le dernier commit.
Les fichiers modifiés restent prêts pour un nouveau commit.

****************************************************************************************************
