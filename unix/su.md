                                                su
*************************************************************************************************

Qu’est-ce que su ?
------------------

su signifie substitute user ou switch user. Cette commande sous Linux/Unix permet de changer d’utilisateur 
dans une session terminal, souvent pour passer à l’utilisateur root (administrateur).

Pourquoi utiliser su ?
----------------------

    Pour ouvrir une session avec un autre utilisateur, souvent root, afin d’exécuter des commandes avec ses droits.

    Pour avoir une session shell complète avec les privilèges de l’autre utilisateur.

    Utile quand on veut rester connecté en root un certain temps.

Syntaxe de base :
-----------------

su [utilisateur]

    Par défaut, si tu tapes juste su, tu passes en root.

    Si tu veux passer à un autre utilisateur, tu mets son nom après su.

Exemples :
----------

su

(te demande le mot de passe root et te connecte en root)

su alice

(te demande le mot de passe de l’utilisateur alice et ouvre une session avec cet utilisateur)

Fonctionnement :
----------------

    La commande su demande le mot de passe de l’utilisateur cible.

    Après authentification, tu obtiens un nouveau shell avec les droits de cet utilisateur.

    Pour revenir à ton utilisateur initial, tu tapes exit ou Ctrl+D.

| **su**                              | **sudo**                                   |
|------------------------------------|--------------------------------------------|
| Change d’utilisateur complètement  | Exécute une seule commande avec droits élevés |
| Demande le mot de passe de l’utilisateur cible (ex : root) | Demande ton mot de passe utilisateur       |
| Utile pour avoir une session root complète | Utile pour exécuter une commande ponctuelle    |
| Session continue jusqu’à `exit`    | Commande unique et retour au shell normal  |


su - signifie "substituer l’utilisateur et charger son environnement".

Détail :
--------

    su tout seul te connecte à un autre utilisateur (par défaut root) mais sans charger 
son environnement (comme les variables PATH).

    su - est équivalent à ouvrir une nouvelle session de login comme si tu te connectais 
directement avec cet utilisateur.

*************************************************************************************************************
