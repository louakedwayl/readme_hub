                        root
**************************************************************************************************

Qu’est-ce que l’utilisateur root ?
----------------------------------

    root est le super-utilisateur par défaut sur les systèmes Unix/Linux.

    Il a tous les droits sur le système : peut lire, écrire, modifier, supprimer n’importe quel fichier ou configuration.

    C’est l’administrateur système par excellence.

Pourquoi ne pas utiliser root tout le temps ?
---------------------------------------------

    Utiliser root pour toutes les tâches est dangereux :

        Une erreur peut casser le système.

        C’est un vecteur de faille de sécurité (si root est compromis, tout est compromis).

    C’est pour cela que la plupart des distributions Linux encouragent l’usage de comptes utilisateurs standards avec sudo.

Mot de passe root et Debian (exemple pratique) :
------------------------------------------------

    Sur Debian moderne, lors de l’installation :

        Tu définis un mot de passe utilisateur, pas forcément un mot de passe root.

        Le compte root est souvent désactivé par défaut, c’est-à-dire qu’il n’a pas de mot de passe défini.

        Tu utilises donc sudo pour les opérations nécessitant les droits d’administration.

    Si tu essaies de faire su sans avoir défini de mot de passe root, cela ne fonctionnera pas car root n’a pas de mot de passe.

Comment gérer le mot de passe root ?
-------------------------------------

    Pour définir ou changer le mot de passe root, utilise :

    sudo passwd root

    Cela active ou modifie le mot de passe root.

    Une fois défini, tu peux utiliser su pour passer en root.

Différence entre root, sudo, et su
----------------------------------

Commande :  
root  
sudo  
su  

Description :  
- root : Super-utilisateur avec tous les droits  
- sudo : Exécute une commande en root sans changer de session  
- su : Change d’utilisateur avec session shell complète  

Usage principal :  
- root : Compte système complet  
- sudo : Élévation temporaire de privilèges  
- su : Ouvre une session shell sous un autre utilisateur  

Mot de passe demandé :  
- root : Mot de passe root (parfois désactivé)  
- sudo : Mot de passe de l’utilisateur courant  
- su : Mot de passe de l’utilisateur cibl

ourquoi Debian désactive root ?
--------------------------------

    Pour plus de sécurité.

    Pour que l’administrateur utilise sudo, limitant ainsi les risques d’erreurs et les accès non surveillés.

Résumé
-------

    root = super-utilisateur, tous les droits.

    Sur Debian, root est souvent désactivé par défaut, pas de mot de passe root.

    Tu utilises ton compte utilisateur + sudo pour les commandes administratives.

    Tu peux activer root en définissant un mot de passe avec sudo passwd root.

    su permet de changer d’utilisateur si tu as le mot de passe de cet utilisateur (ex : root).

******************************************************************************************************************
