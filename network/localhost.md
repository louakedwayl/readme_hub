		localhost et l'interface loopback
******************************************************************************************

	1/ Qu’est-ce que localhost ?
	----------------------------

    localhost est un nom de domaine spécial qui pointe vers l'adresse IP 127.0.0.1.

    Cette adresse IP est réservée pour la boucle locale (loopback), c’est-à-dire une communication interne à ta machine.

    Quand tu tapes localhost dans un navigateur ou que tu envoies une requête réseau à 127.0.0.1, tu ne quittes jamais ta machine.

	2/ Pourquoi utiliser localhost ?
	--------------------------------

    Tester des applications réseau localement sans avoir besoin d'une connexion internet.

    Communiquer entre différents processus ou services sur la même machine.

    Sécuriser certaines communications internes (pas de sortie vers l’extérieur).

    Bénéficier d’une communication très rapide, car tout reste en local.

	3/ L’interface réseau loopback (virtuelle) :
	--------------------------------------------

    Contrairement à ce que beaucoup pensent, localhost ne fonctionne pas sans interface réseau.

    Sur ta machine, il existe une interface réseau spéciale appelée loopback (souvent nommée lo).

    Cette interface est virtuelle : elle ne correspond pas à une carte réseau physique (comme ta carte Ethernet ou Wi-Fi), mais à un périphérique logiciel.

    Elle gère toutes les communications internes de type 127.x.x.x.

    Exemple de commande pour voir cette interface sur Linux :

    ip addr show lo

    Tu verras une interface lo avec l’adresse 127.0.0.1.

	4/ Comment fonctionne la boucle locale ?
	----------------------------------------

    Quand une application envoie un paquet à 127.0.0.1, le système d'exploitation le redirige automatiquement vers l’interface loopback.

    Le paquet ne passe pas par le réseau physique ni par ta box ou ton routeur.

    La communication est donc ultra rapide (pas de latence réseau).

    Le système d’exploitation fait un “circuit fermé” interne pour envoyer et recevoir les données.

	5/ La configuration dans /etc/hosts :
	-------------------------------------

    Le fichier /etc/hosts fait la correspondance entre noms de domaine et adresses IP.

    Il contient généralement la ligne :

    127.0.0.1    localhost

    Cela permet de résoudre le nom localhost en 127.0.0.1 sans passer par un serveur DNS externe.

    Tu peux ajouter d’autres noms de domaine pointant vers 127.0.0.1 pour tester localement des sites (exemple : wlouaked.42.fr).

	6/ Pourquoi ne pas utiliser directement l’IP 127.0.0.1 ?
	--------------------------------------------------------

    Le nom localhost est une convention standard, plus lisible et pratique.

    Certaines applications peuvent s’attendre à ce nom.

    Le fichier /etc/hosts permet une résolution rapide et locale sans interroger un DNS externe.

	7/ Différence entre localhost et autres adresses IP :
	-----------------------------------------------------

Adresse IP	Description
127.0.0.1	Boucle locale, communication interne machine
192.168.x.x	Adresse privée locale sur réseau LAN
IP publique	Adresse accessible depuis internet

	8/ Cas pratique : localhost dans Docker :
	-----------------------------------------

    Dans Docker, localhost dans un container signifie le container lui-même, pas l’hôte.

    Pour accéder à un autre container (ex: base de données), il faut utiliser le nom du service Docker (ex: mariadb), pas localhost.

    C’est pour ça que dans ton wp-config.php tu mets DB_HOST=mariadb, pas localhost.

	Conclusion :
	------------

localhost est une adresse IP spéciale qui permet à ta machine de communiquer avec elle-même via une interface réseau virtuelle appelée loopback. C’est la base pour développer et tester localement, et ça fonctionne grâce à une configuration simple dans /etc/hosts qui évite de faire appel à un DNS externe.

********************************************************************************
