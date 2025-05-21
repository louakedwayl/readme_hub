Introduction à FileZilla et au transfert FTP
************************************************************************************************

1/ Qu’est-ce que FileZilla ?
----------------------------

FileZilla est un logiciel client FTP (File Transfer Protocol) qui permet de transférer des fichiers entre ton ordinateur et un serveur distant (par exemple, un serveur web). Il est gratuit, open-source, et supporte plusieurs protocoles de transfert.
📁 2. Pourquoi utiliser FileZilla ?

    Déployer un site web sur un hébergement distant

    Transférer rapidement des fichiers vers un serveur ou un cloud privé

    Administrer un serveur à distance via FTP/SFTP

    Gérer les fichiers d'un serveur sans interface graphique

🔒 3. Protocoles supportés

    FTP : Protocole standard (non chiffré)

    FTPS : FTP sécurisé avec SSL/TLS

    SFTP : FTP via SSH (plus sécurisé)

🛠 4. Installation de FileZilla
✅ Sur Windows, macOS, ou Linux :

    Va sur le site officiel : https://filezilla-project.org

    Télécharge FileZilla Client

    Installe-le comme un programme classique

    ⚠ Ne pas confondre avec FileZilla Server (réservé à l’hébergement local)

🧭 5. Interface de FileZilla (Client)

Voici les parties principales :

    Haut : Champs de connexion rapide (hôte, identifiant, mot de passe, port)

    Gauche : Arborescence des fichiers locaux

    Droite : Arborescence des fichiers distants

    Bas : File d’attente des transferts (en cours, réussis, échoués)

🔌 6. Connexion à un serveur
A. Connexion rapide :

    Ouvre FileZilla

    Remplis en haut :

        Hôte : ex. ftp.monsite.com

        Nom d’utilisateur : ex. admin

        Mot de passe

        Port : souvent 21 (FTP), 22 (SFTP)

    Clique sur Connexion rapide

B. Gestionnaire de sites :

    Menu Fichier > Gestionnaire de sites

    Clique sur Nouveau site

    Renseigne les infos FTP/SFTP fournies par ton hébergeur

    Clique sur Connexion

⬆️⬇️ 7. Transférer des fichiers

    Pour envoyer un fichier : glisse-le du panneau gauche (local) vers le droit (serveur)

    Pour télécharger un fichier : fais l’inverse

    Tu peux aussi clic droit > Télécharger / Envoyer

🧩 8. Conseils pratiques

    Vérifie que tu as bien les droits d’accès au serveur

    Utilise SFTP de préférence pour plus de sécurité

    Ne transfère pas trop de fichiers lourds en même temps

    Vérifie toujours la file de transfert pour les erreurs

🧪 9. Cas d’usage typique (exemple)

Tu développes un site web en HTML/CSS sur ton ordi :

    Tu crées un compte chez un hébergeur (ex : OVH, Infomaniak, Alwaysdata…)

    Tu reçois les identifiants FTP

    Tu ouvres FileZilla, te connectes

    Tu transfères tes fichiers HTML/CSS dans le dossier /www ou /public_html

    Ton site est accessible en ligne 🎉

📚 10. Résumé
Élément	Description
FileZilla	Client FTP pour transférer des fichiers
Protocoles	FTP, FTPS, SFTP
Utilisation	Déploiement, administration serveur
Connexion	Rapide ou via gestionnaire de sites
Transfert	Glisser-déposer, clic droit
Sécurité conseillée	Utiliser SFTP si possible
