					  Heredoc
************************************************************************************************

	Un heredoc est une redirection des shells UNIX qui permet d'écrire des
chaînes de caractères en indiquant un délimiteur et de faire pointer le
descripteur de fichier d'entrée standard d'un processus vers ces chaînes.

Specificite des HEREDOC dans BASH POSICS :
-------------------------------------------

	1/ S il y a plusieurs Heredoc seul le dernier Heredoc definit sera la cible du
fd du processus enfant (commande executee) sauf si le heredoc est explicitement redirige vers
un autre fd : chaque heredoc peut alimenter un descripteur de fichier distinct.
	2/ Si un heredoc est suivie d une redirection de sortie standard sans appel de
commande UNIX , La redirection de sortie standart ne recevra rien en entree.
	3/ Si le delimiteur est entre simple quotes les variables ne seront pas substituer
dans le heredoc.
	4/ Si plusieurs commandes separes par des pipes ont un ou plusieurs heredoc
respectivement, Bash va demander a l 'utilisateur de remplir tous les heredoc avant
rediriger leurs chaines vers l'entree standart de leur commandes respectives.



	?/ Voir pour gerer les signaux dans le heredoc
*************************************************************************************************
