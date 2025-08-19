# Heredoc

Un heredoc est une redirection des shells UNIX qui permet d'écrire des chaînes de caractères en indiquant un délimiteur et de faire pointer le descripteur de fichier d'entrée standard d'un processus vers ces chaînes.

## Spécificité des HEREDOC dans BASH POSIX :
1. Si plusieurs Heredoc existent, seul le dernier Heredoc défini sera la cible du fd du processus enfant (commande exécutée), sauf si le heredoc est explicitement redirigé vers un autre fd : chaque heredoc peut alimenter un descripteur de fichier distinct.
2. Si un heredoc est suivi d'une redirection de sortie standard sans appel de commande UNIX, la redirection de sortie standard ne recevra rien en entrée.
3. Si le délimiteur est entre simple quotes, les variables ne seront pas substituées dans le heredoc.
4. Si plusieurs commandes séparées par des pipes ont un ou plusieurs heredoc respectivement, Bash demandera à l'utilisateur de remplir tous les heredoc avant de rediriger leurs chaînes vers l'entrée standard de leurs commandes respectives.

## SIGNAUX pendant un heredoc :
- **SIGINT** -> Affiche un nouveau prompt ; ce qui a déjà été tapé n'est pas pris en compte.
- **SIGQUIT** -> Ne fait rien.
- **EOF** -> Affiche un nouveau prompt ; ce qui a déjà été tapé est pris en compte et un message d'erreur est affiché.

