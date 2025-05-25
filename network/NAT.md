	NAT (Network Address Translation)
************************************************************************************************************

	1/ Qu’est-ce que le NAT ?
	----------------------------

Le NAT est une technique réseau qui permet de modifier les adresses IP et/ou ports des paquets qui traversent 
un routeur ou une machine faisant passerelle.

En gros, ça sert à faire communiquer un réseau privé (avec des adresses IP privées) vers l’extérieur 
(internet ou réseau plus large) avec une seule adresse IP publique.

	2/ Pourquoi utiliser le NAT ? 
	-----------------------------

    Les adresses IPv4 publiques sont limitées → le NAT permet à plusieurs machines d’un réseau privé d’utiliser 
une même adresse IP publique.

    Permet de cacher les adresses privées derrière une IP publique, ce qui apporte une sécurité (masquer le réseau interne).

    Permet de gérer la communication entre plusieurs réseaux (ex : hôte et VM).

	3/ Types de NAT :
	-----------------

    Static NAT (NAT statique) :
    Une adresse IP privée est toujours traduite vers une adresse IP publique fixe.
    (ex : 192.168.1.10 → 203.0.113.10)

    Dynamic NAT (NAT dynamique) :
    Plusieurs adresses privées peuvent être traduites vers une plage d’adresses publiques disponibles.

    PAT (Port Address Translation) ou NAT overload :
    Plusieurs adresses privées partagent une seule adresse publique, mais chaque connexion est identifiée par un port source différent.
    (ex : 192.168.1.10:1234 → 203.0.113.10:40000, 192.168.1.11:4321 → 203.0.113.10:40001)

	4/ NAT dans VirtualBox :
	------------------------

VirtualBox utilise souvent le NAT pour permettre à une VM d’accéder à Internet via la machine hôte.

    La VM a une adresse IP privée sur un réseau interne VirtualBox (ex : 10.0.2.15).

    Quand la VM communique vers l’extérieur, VirtualBox traduit l’adresse privée de la VM en adresse IP de l’hôte 
(ou une adresse NAT) via NAT.

    Cela permet à la VM d’accéder à Internet sans configuration réseau compliquée.

	5/ Le port forwarding dans VirtualBox :
	---------------------------------------

Par défaut, avec NAT, la VM n’est pas directement accessible depuis l’hôte ou un autre réseau externe, 
car elle est “cachée” derrière la NAT.

Pour y accéder (ex: SSH sur la VM), il faut configurer une règle de redirection de port (port forwarding), qui :

    Redirige un port de l’hôte (ex : 4243) vers un port de la VM (ex : 4242).

    Permet à l’hôte d’envoyer des requêtes sur ce port, qui seront ensuite transmises à la VM.

6/ Exemple concret

    VM IP interne : 10.0.2.15

    VM SSH écoute sur : 4242

    VirtualBox NAT redirige : hôte port 4243 → VM port 4242

Quand tu fais :

ssh -p 4243 user@127.0.0.1

    Tu te connectes à ta machine hôte sur le port 4243.

    VirtualBox redirige cette requête vers la VM, port 4242.

    La VM répond, et la communication s’établit.

	7/ Résumé :
	-----------

Concept	Description
NAT	Traduction d’adresse IP privée ↔ publique
Port forwarding	Redirection d’un port hôte vers un port VM
VirtualBox NAT	VM utilise NAT pour accéder à l’extérieur
	
	8/ Avantages et limites :
	-------------------------

    Avantages :
   ------------
        Pas besoin d’IP publique pour chaque VM.

        Simple à configurer pour la VM.

        Sécurise le réseau interne.

    Limites :

        Accès aux VM depuis l’extérieur plus compliqué sans port forwarding.

        Certaines applications nécessitent des configurations spécifiques (ex: VPN, jeux en ligne).

******************************************************************************************************************

