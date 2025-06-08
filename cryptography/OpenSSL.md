				OpenSSL
******************************************************************************************

	1/ Qu'est-ce qu'OpenSSL ?
	-------------------------

	OpenSSL est une bibliothèque open source qui fournit des outils et des fonctions pour implémenter des protocoles cryptographiques, notamment SSL (Secure Sockets Layer) et TLS (Transport Layer Security). Ces protocoles assurent la sécurité des communications sur internet (confidentialité, intégrité, authentification).

OpenSSL est utilisé partout, dans les serveurs web, les clients, les applications, pour gérer le chiffrement, les certificats, la signature numérique, etc.

	2/ Concepts fondamentaux de la cryptographie dans OpenSSL :
	-----------------------------------------------------------

	a) Chiffrement symétrique :
	---------------------------

    Utilise une clé secrète partagée entre l'émetteur et le récepteur.

    Rapide, mais nécessite un échange sécurisé de la clé.

    Exemples d’algorithmes : AES, DES.

	b) Chiffrement asymétrique (cryptographie à clé publique) :
	-----------------------------------------------------------

    Utilise une paire de clés : une clé publique (connue de tous) et une clé privée (gardée secrète).

    La clé publique sert à chiffrer, la clé privée à déchiffrer, ou inversement pour la signature.

    Plus lent, mais permet d’éviter le problème de partage de clé secrète.

    Exemples : RSA, ECC.

	c) Fonction de hachage :
	------------------------

    Prend un message et produit un condensé (hash) de taille fixe.

    Résumé unique et irréversible, utilisé pour vérifier l’intégrité.

    Exemples : SHA-256, MD5 (moins sécurisé).

	d) Signature numérique :
	------------------------

    Utilise la clé privée pour signer un message ou son hash.

    Permet de vérifier l'authenticité et l’intégrité via la clé publique.

    Fondamental dans les certificats.

	3/ Protocoles SSL/TLS :
	-----------------------

    SSL est un protocole de sécurisation des échanges.

    TLS est la version modernisée et sécurisée de SSL.

    Objectif : établir une connexion sécurisée entre client et serveur.

    Fonctionnement :
    ----------------

        Négociation d’algorithmes (chiffrement, hachage)

        Échange de clés via cryptographie asymétrique (ex : RSA)

        Utilisation du chiffrement symétrique pour la session (plus rapide)

        Vérification des certificats pour authentifier le serveur (et parfois le client)

	4/ Certificats numériques :
	---------------------------

    Un certificat est un fichier numérique délivré par une Autorité de Certification (CA).

    Contient la clé publique, l'identité du propriétaire, et la signature de la CA.

    Sert à prouver qu’une clé publique appartient bien à une entité.

    Structure standard : X.509.

	5/ Ce que fait OpenSSL :
	------------------------

    Génération de clés (symétriques et asymétriques)

    Création et gestion de certificats (CSR - Certificate Signing Request)

    Chiffrement/déchiffrement de données

    Signature et vérification de signatures numériques

    Implémentation des protocoles SSL/TLS pour sécuriser les communications

	7/ Résumé pragmatique :
	-----------------------

    OpenSSL est une bibliothèque pour gérer la cryptographie.

    Il repose sur 3 piliers : chiffrement (symétrique + asymétrique), hachage, signatures.

    SSL/TLS utilisent ces outils pour sécuriser les connexions.

    Les certificats certifient l'identité via une infrastructure à clés publiques.

    Maîtriser la théorie donne un vrai pouvoir de contrôle et de diagnostic.

***********************************************************************************************
