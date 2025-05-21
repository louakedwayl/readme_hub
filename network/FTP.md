		 Le protocole FTP (File Transfer Protocol)
******************************************************************************************
1/ Définition du FTP :
----------------------

FTP (File Transfer Protocol) est un protocole de communication réseau qui permet d’échanger des fichiers entre deux machines :

    un client FTP (ton ordinateur, par exemple)

    un serveur FTP (serveur distant ou hébergeur)

    Il fonctionne selon une architecture client/serveur.

2/ Fonctionnement de base :
---------------------------

    Le client se connecte au serveur via une adresse IP ou un nom de domaine, 
un identifiant et un mot de passe.

    Une fois connecté, il peut :

        envoyer (upload) des fichiers vers le serveur

        télécharger (download) des fichiers depuis le serveur

        gérer les dossiers (créer, supprimer, renommer…)

3/ Ports utilisés :
-------------------

    Port 21 : utilisé pour le contrôle (commande de connexion, navigation, etc.)

    Port 20 : utilisé pour le transfert de données (selon le mode actif)

4/ Modes de fonctionnement :
----------------------------

Mode actif :
------------

    Le serveur rappelle le client pour établir la connexion de données.

    Peut être bloqué par les pare-feux du client.

Mode passif (le plus utilisé) :
--------------------------------

    Le client ouvre une connexion secondaire vers le serveur pour le transfert.

    Plus fiable avec les pare-feux/NAT.

    🔐 Le mode passif est utilisé par défaut dans les clients FTP modernes (comme FileZilla).

5/ Sécurité : FTP ≠ sécurisé :
------------------------------
Le FTP classique n’est pas chiffré :

    Les identifiants et les fichiers passent en clair sur le réseau.

    Cela le rend vulnérable aux attaques (ex : interception de mot de passe).

Alternatives sécurisées :
-------------------------

    FTPS (FTP Secure) : FTP avec chiffrement SSL/TLS

    SFTP (SSH File Transfer Protocol) : basé sur le protocole SSH, très sécurisé

6/ Clients FTP populaires :
---------------------------

Client	Description
FileZilla	Gratuit, open-source, très utilisé
WinSCP	Pour Windows, supporte FTP/SFTP
Cyberduck	Pour macOS, simple à utiliser
lftp (CLI)	Ligne de commande sur Linux/macOS

7/ Serveurs FTP populaires :
----------------------------

Serveur	Système	Description
vsftpd	Linux	Très sécurisé, performant
ProFTPD	Linux/Unix	Très configurable
FileZilla Server	Windows	Facile à installer
Pure-FTPd	Linux	Bon équilibre sécurité/simplicité

8/ Commandes FTP en ligne de commande :
----------------------------------------

Si tu veux utiliser le FTP en CLI :

ftp ftp.monsite.com

Quelques commandes utiles une fois connecté :
Commande	Description
ls	Lister les fichiers
cd	Changer de dossier
get	Télécharger un fichier
put	Envoyer un fichier
bye	Fermer la connexion

9/ Exemple concret d’utilisation

Tu veux mettre en ligne un site HTML :

    Tu obtiens les identifiants FTP de ton hébergeur (nom d’hôte, login, mot de passe)

    Tu ouvres FileZilla

    Tu te connectes à ton serveur FTP

    Tu transfères les fichiers dans le répertoire /www ou /public_html

    Le site est maintenant visible sur ton nom de domaine

📚 10. Résumé
Élément	Détail
FTP	Protocole de transfert de fichiers
Port principal	21
Sécurité	Non chiffré → préférer FTPS ou SFTP
Modes	Actif (port 20) / Passif (plus fiable)
Logiciels clients	FileZilla, WinSCP, Cyberduck, etc.
Utilisation typique	Mise en ligne de sites, échanges de fichiers

**************************************************************************************************
