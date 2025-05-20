                        sudo
*************************************************************************************************

Introduction :
--------------

Sous Linux, l’utilisateur root est le super-utilisateur qui possède tous les droits sur le système.
Cependant, travailler constamment en tant que root est risqué et dangereux. C’est pourquoi l’outil sudo a 
été créé pour permettre aux utilisateurs standards d’exécuter certaines commandes avec les privilèges de root,
sans ouvrir une session root complète.

Qu’est-ce que sudo ?
--------------------

    sudo signifie superuser do, c’est-à-dire "faire en tant que super-utilisateur".

    Il permet d’exécuter une commande en tant que root (ou un autre utilisateur) de manière temporaire.

    L’utilisateur doit être autorisé à utiliser sudo, généralement en étant membre du groupe sudo.

Pourquoi utiliser sudo ?
------------------------

    Sécurité
    ---------

        Ne pas utiliser directement le compte root évite les erreurs graves (suppression de fichiers système, mauvaises configurations).

        Limite le risque de compromission complète du système en cas de faille.

    Traçabilité
    -----------

        Toutes les commandes lancées avec sudo sont enregistrées dans un fichier journal (souvent /var/log/auth.log), ce qui permet de retracer les actions.

    Gestion des droits
    ------------------

        On peut configurer sudo pour autoriser certains utilisateurs à exécuter seulement certaines commandes spécifiques en root, limitant ainsi leurs pouvoirs.

Utilisation de sudo
-------------------

    Pour exécuter une commande avec sudo :

sudo commande

Lors de la première utilisation dans une session, sudo demande le mot de passe de l’utilisateur (pas celui de root).

Exemple :
---------

    sudo apt update

Configuration de sudo
---------------------

    Le fichier de configuration est /etc/sudoers, mais il ne doit pas être modifié directement avec un éditeur normal.

    Utiliser la commande visudo pour éditer ce fichier en toute sécurité.

    Exemple pour ajouter un utilisateur au groupe sudo :

sudo usermod -aG sudo nom_utilisateur

Il ne faut jamais modifier le fichier /etc/sudoers avec un éditeur normal (comme nano, vim, ou gedit)
car une erreur de syntaxe peut rendre ce fichier invalide, ce qui peut bloquer totalement l'accès à sudo
même pour root et donc empêcher de corriger l'erreur facilement.

✅ Pourquoi utiliser visudo à la place :

    visudo est un éditeur sécurisé spécialement conçu pour éditer /etc/sudoers.

    Il vérifie automatiquement la syntaxe du fichier avant de l’enregistrer.

    Si une erreur est détectée, il t’avertit et empêche la sauvegarde.

    Il verrouille le fichier temporairement pour éviter que deux personnes l’éditent en même temps (ce qui pourrait aussi corrompre le fichier).

Vérifier les groupes d’un utilisateur :
---------------------------------------

    groups nom_utilisateur

Remarques importantes

    Il est déconseillé d’utiliser su pour passer en root si sudo est disponible,
car sudo offre plus de contrôle et de sécurité.

    Dans certains systèmes (comme Debian), root est désactivé par défaut et sudo est le moyen principal 
d’avoir les droits administrateurs.

Conclusion :
------------

sudo est un outil clé pour la sécurité et la gestion des droits sous Linux. Il permet de travailler efficacement 
tout en minimisant les risques liés à l’utilisation du compte root.

*******************************************************************************************************************
