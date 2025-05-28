			TCP (Transmission Control Protocol)
******************************************************************************

	Définition :
	------------

TCP est un protocole de communication fiable utilisé pour transmettre des données sur un réseau.
Il faitpartie de la suite de protocoles TCP/IP, qui est la base d’Internet.

	Fonctionnement :
	----------------

    Connexion obligatoire :

        Avant d’envoyer des données, TCP établit une connexion entre les deux machines (client et serveur).

        Cela se fait par une procédure appelée handshake en 3 étapes (SYN, SYN-ACK, ACK).

    Transmission fiable :

        Les données sont découpées en paquets.

        Chaque paquet est numéroté.

        Le récepteur envoie des accusés de réception (ACK).

        Si un paquet est perdu, il est renvoyé.

    Contrôle de flux et de congestion :

        TCP régule le débit pour éviter de saturer le réseau.

📦 Utilisations courantes :
Application	Protocole utilisé
Web (HTTP/HTTPS)	TCP
Email (SMTP, IMAP)	TCP
FTP (transfert)	TCP

	Avantages :
	-----------

    Transmission fiable et ordonnée.

    Contrôle des erreurs.

    Assure l’intégrité des données.

	Inconvénients :
	---------------

    Plus lent que UDP (plus de vérifications).

    Nécessite une connexion préalable.

********************************************************************************************
