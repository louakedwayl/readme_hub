							routeur
****************************************************************************************************************************

	Un routeur est un appareil réseau utilisé pour connecter plusieurs réseaux entre eux. Il a pour rôle de 
transmettre les paquets de données d’un réseau source à un réseau de destination, en utilisant des adresses IP pour déterminerle chemin optimal.

Caractéristiques principales :
------------------------------

    Interfaces réseau :
    -------------------

        Un routeur dispose d'autant d'interfaces réseau (cartes réseau) qu'il a de connexions à des réseaux distincts.
        Chaque interface possède une adresse MAC unique.

    Adresse IP :
    ------------
       
 Chaque interface d’un routeur se voit attribuer une adresse IP unique, correspondant au réseau auquel elle est connectée.

Modèle OSI:
-----------

    Le routeur opère principalement à la couche 3 : la couche réseau.
    La couche réseau gère l'adressage IP et le routage des paquets entre différents réseaux.

Protocole utilisé:
------------------

    Le routeur utilise principalement le protocole IP (Internet Protocol) pour acheminer les paquets.
    Il peut également utiliser des protocoles de routage pour optimiser les trajets des données :
        RIP (Routing Information Protocol)
        OSPF (Open Shortest Path First)
        BGP (Border Gateway Protocol)
        EIGRP (Enhanced Interior Gateway Routing Protocol)

Fonctions principales:
----------------------

    Routage : Acheminer les paquets de données entre différents réseaux.
    NAT (Network Address Translation) : Traduire les adresses IP privées en adresses publiques pour permettre une communication avec Internet.
    Pare-feu : Bloquer ou autoriser le trafic en fonction de règles définies.
    VPN (Virtual Private Network) : Permettre une connexion sécurisée entre deux réseaux distants.
    Qualité de service (QoS) : Prioriser certains types de trafic (vidéo, voix, etc.).

Utilisation courante:
---------------------

    Réseaux domestiques : Connecter un réseau local (LAN) à Internet via un fournisseur d'accès.
    Réseaux d'entreprise : Connecter plusieurs sites d’une entreprise via un réseau étendu (WAN).
    Internet : Les routeurs font partie de l’infrastructure principale d’Internet en connectant les réseaux des différents 
fournisseurs.

****************************************************************************************************************************
