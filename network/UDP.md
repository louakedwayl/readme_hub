		UDP (User Datagram Protocol)
************************************************************************************
	
	Définition :
	------------

UDP est un protocole de communication non fiable, mais rapide. Il envoie des paquets sans vérifier s’ils arrivent bien ou dans le bon ordre.
	
	Fonctionnement :
	----------------

    Pas de connexion :

        UDP n’établit pas de lien entre l’émetteur et le récepteur.

        Il envoie directement les données sous forme de datagrammes.

    Pas de contrôle d’erreur :

        Pas d’accusé de réception.

        Pas de retransmission automatique en cas de perte.

    Chaque paquet est indépendant :

        Pas de suivi d’ordre ou de cohérence entre les paquets.

Utilisations courantes :
------------------------

Application	Protocole utilisé
Streaming vidéo/audio (Live)	UDP
Appels VoIP (Skype, WhatsApp)	UDP
Jeux en ligne	UDP
DNS, DHCP	UDP

Avantages :
-----------

    Très rapide (moins de traitement).

    Moins de ressources utilisées (CPU, bande passante).

Inconvénients :
---------------

    Pas fiable (paquets peuvent être perdus ou dans le désordre).

    Pas d’assurance que le message arrive.

⚖️ Résumé : TCP vs UDP
Caractéristique	TCP	UDP
Fiabilité	✅ Oui	❌ Non
Ordre des données	✅ Oui	❌ Non
Vitesse	❌ Plus lent	✅ Plus rapide
Connexion requise	✅ Oui (handshake)	❌ Non
Utilisations typiques	Web, email, fichiers	Streaming, VoIP, jeux

	Est-ce que YouTube utilise TCP pour le site et UDP pour la vidéo ?
	------------------------------------------------------------------

	Oui, au début : TCP pour le site

Quand tu ouvres YouTube dans ton navigateur :

    Le chargement de la page (HTML, CSS, images, etc.) se fait en HTTP/HTTPS, qui utilise TCP.

    Cela garantit que tout le contenu du site arrive sans erreur et dans le bon ordre.

	 Et le flux vidéo ? UDP ou TCP ?
En réalité : YouTube utilise encore TCP pour la vidéo, pas UDP.

Pourquoi ?

    YouTube utilise le protocole HTTPS, même pour les vidéos (donc TCP).

    Grâce au buffering (mise en mémoire tampon), YouTube peut se permettre un léger délai pour garantir zéro perte de données.

    YouTube privilégie la fiabilité à la vitesse brute, contrairement à des outils comme Zoom ou les jeux vidéo.

	Mais alors, qui utilise UDP pour les vidéos ?
	---------------------------------------------

Des applis comme :

    Zoom, Skype, Google Meet

    Twitch en direct (dans certains cas)

    Apps de streaming en direct "faible latence"

Ces services ont besoin de vitesse maximale, donc ils utilisent souvent UDP via des protocoles comme RTP (Real-time Transport Protocol).

 Que se passe-t-il en cas de perte de données ?
-----------------------------------------------

	1/ Avec TCP (comme sur YouTube) :
	---------------------------------

    Si un paquet est perdu, TCP le renvoie automatiquement.

    Tu ne perds donc aucune image, mais la vidéo peut :

        mettre en pause pour charger ("buffering"),

        prendre un peu de temps à démarrer.

    L’objectif est : qualité maximale, même avec un petit délai.

	Avec UDP (comme sur Zoom, Skype, les jeux) :
	--------------------------------------------

    Si un paquet est perdu, il n’est pas renvoyé.

    Résultat :

        Image sautée ou floue.

        Micro-coupures de son.

        Moins de latence, mais qualité variable.

    L’objectif est : vitesse maximale, même si tout n’arrive pas parfaitement.

*****************************************************************************************
