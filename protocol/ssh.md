SSH – Secure Shell
******************************************************************************************************

1/ Définition

SSH (Secure Shell) est un protocole de communication sécurisé utilisé pour :

    Se connecter à un système distant via le terminal (CLI),

    Transférer des fichiers de manière sécurisée (scp, sftp),

    Exécuter des commandes à distance,

    Créer des tunnels chiffrés (port forwarding).

La CLI (Command Line Interface) est un moyen d’interagir avec un ordinateur en tapant des commandes texte dans un terminal,
au lieu d’utiliser une interface graphique (GUI = Graphical User Interface).

SSH chiffre toutes les données échangées pour empêcher l'interception ou les attaques type "man-in-the-middle".

2/ Fonctionnement général

a. Architecture Client / Serveur

    Client SSH : envoie une demande de connexion (commande ssh)

    Serveur SSH : écoute sur le port 22 (par défaut) et gère l’authentification

[Client] --connexion SSH--> [Serveur distant]

b. Authentification

Deux types principaux :

    Par mot de passe
    ➜ Moins sécurisé, car il faut taper le mot de passe à chaque connexion.

    Par clé publique/privée
    ➜ Méthode recommandée et plus sécurisée.

Fonctionnement des clés :

    Tu génères une clé privée (~/.ssh/id_rsa) et une clé publique (~/.ssh/id_rsa.pub)

    Tu places la clé publique sur le serveur distant dans ~/.ssh/authorized_keys

    Seule la clé privée peut déchiffrer les connexions, donc seul toi peux te connecter.

3/ Commandes principales

a. Se connecter à un serveur :

ssh user@host

Exemple :

ssh wayl@192.168.1.50

b. Copier un fichier via SSH (avec SCP) :

scp fichier.txt user@host:/chemin/

c. Tunnel SSH (port forwarding) :

ssh -L 8080:localhost:80 user@host

➜ Permet d'accéder localement au port 80 du serveur via ton port 8080.

4/ Générer une paire de clés

ssh-keygen

Puis copier la clé publique sur un serveur :

ssh-copy-id user@host

5/ Sécurité

    Utilise des clés SSH plutôt que des mots de passe.

    Ne donne jamais ta clé privée (id_rsa) à quelqu’un.

    Utilise fail2ban sur ton serveur pour bloquer les IP suspectes.

6/ Résumé :

Élément	Détail
Port par défaut	22
Protocole	TCP
Sécurité	Chiffrement, authentification par clé
Utilisation	Connexion distante, transfert de fichier
Outils liés	ssh, scp, sftp, ssh-keygen, ssh-agent

**********************************************************************************************************************
