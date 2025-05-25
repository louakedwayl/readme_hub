	Cours TLS (Transport Layer Security)
************************************************************************
	
	1/ Qu’est-ce que TLS ?
	----------------------

TLS (Transport Layer Security) est un protocole de sécurité utilisé pour chiffrer les communications sur Internet.
Il garantit que les données échangées entre un client (par exemple, un navigateur web) et un serveur (par exemple, un site web)
restent confidentielles et intégrales.

Un certificat TLS est un élément clé de ce protocole. Il permet au client de vérifier l’identité du serveur et d’établir une
connexion sécurisée.

	2/ Fonctionnement :
	-------------------

TLS commence par un handshake où le client et le serveur négocient la version TLS et les algorithmes cryptographiques.
Le serveur s’authentifie avec un certificat numérique.
Une clé de session symétrique est échangée de manière sécurisée.
Les données échangées sont ensuite chiffrées et protégées par un code d’authentification (MAC).

	3/ Rôle du certificat TLS :
	---------------------------

Le certificat TLS permet de :

    Authentifier le serveur : le client vérifie que le serveur est bien celui qu’il prétend être.

    Établir une connexion sécurisée : en utilisant la clé publique du serveur, le client chiffre une clé secrète pour la session. Cette clé est ensuite utilisée pour chiffrer toutes les données échangées.

    Garantir l’intégrité des données : grâce à des mécanismes cryptographiques, le client et le serveur peuvent vérifier que les données n’ont pas été modifiées en cours de route.

	3/ Fonctionnement du certificat TLS dans une connexion HTTPS :
	--------------------------------------------------------------

    Le client demande une connexion sécurisée au serveur (ex: via HTTPS).

    Le serveur envoie son certificat TLS au client.

    Le client vérifie que le certificat est valide (signature de la Certificate Authority, date de validité,
correspondance du nom de domaine).

    Si tout est correct, le client génère une clé de session, la chiffre avec la clé publique du serveur (du certificat)
et l’envoie au serveur.

    Le serveur déchiffre la clé de session avec sa clé privée.

    À partir de ce moment, client et serveur utilisent cette clé de session pour chiffrer et déchiffrer leurs échanges.

	4/ Types de certificats TLS :
	-----------------------------

    Certificat DV (Domain Validation) : Vérifie que le demandeur contrôle le nom de domaine.

    Certificat OV (Organization Validation) : Vérifie en plus l’existence de l’organisation.

    Certificat EV (Extended Validation) : Validation plus poussée, affiche une barre verte dans certains navigateurs.

	5/ Autorités de Certification (CA) :
	------------------------------------

Une CA est une organisation de confiance qui émet des certificats TLS. Parmi les plus connues :

    Let's Encrypt (certificats gratuits)

    DigiCert

    GlobalSign

    Comodo

	6/ Renouvellement et révocation :
	---------------------------------

    Les certificats ont une durée de validité limitée (souvent 1 an ou 2 ans).

    Ils doivent être renouvelés avant expiration.

    En cas de compromission (ex: vol de clé privée), le certificat peut être révoqué et ajouté à une liste de révocation (CRL) ou via le protocole OCSP.

	Conclusion :
	------------

Les certificats TLS sont essentiels pour assurer la sécurité et la confiance sur Internet.
Ils permettent d’authentifier les serveurs et de chiffrer les communications, évitant ainsi les interceptions et
les modifications malveillantes.

*********************************************************************************************
