							Subnet Mask
******************************************************************************************************************************************

	Un masque de sous-réseau (ou subnet mask) est une combinaison de bits utilisé dans les réseaux informatiques pour diviser 
une adresse IP en deux parties.

	La partie réseau (Network Address) : identifie le réseau.

	La partie hôte (Host Address) : identifie les dispositifs (ordinateurs, imprimantes, etc.) sur ce réseau.

Représentation:
---------------

	Un masque de sous-réseau est généralement représenté sous la forme d'une adresse IP (décimale pointée, ex. : 255.255.255.0) 
ou sous forme d'un suffixe CIDR (Classless Inter-Domain Routing), par exemple /24.

Exemple:
--------

Pour une adresse IP 192.168.1.1 avec un masque de sous-réseau 255.255.255.0 :

    La partie réseau : 192.168.1.0
    La partie hôte : .1

Calcul des sous-réseaux:
------------------------

	Un masque de sous-réseau est constitué de 1 pour la partie réseau et de 0 pour la partie hôte.

Par exemple :
-------------

    255.255.255.0 = 11111111.11111111.11111111.00000000

Le nombre de 1 détermine la taille du sous-réseau :

    /24 = 24 bits pour le réseau → 256 adresses possibles (254 hôtes utilisables).

Plage d'adresses dans un sous-réseau :
--------------------------------------

    Première adresse : Adresse réseau (non assignable aux hôtes, ex. : 192.168.1.0)
    -----------------

	L’adresse réseau identifie le sous-réseau dans son ensemble. Elle est utilisée pour représenter un groupe d’hôtes (ordinateurs, imprimantes, etc.) qui partagent le même sous-réseau.

    C'est la première adresse dans un sous-réseau.
    Non assignable aux hôtes : elle est réservée à l’identification du réseau.
    En binaire, tous les bits de la partie hôte de l'adresse IP sont mis à 0.

    Dernière adresse : Adresse de diffusion ou broadcast (ex. : 192.168.1.255)
    ------------------

    L'adresse de diffusion permet d'envoyer un message à tous les hôtes d’un sous-réseau. Elle est utilisée pour la communication broadcast.
    C'est la dernière adresse dans un sous-réseau.
    Non assignable aux hôtes : elle est exclusivement utilisée pour la diffusion.
    En binaire, tous les bits de la partie hôte de l'adresse IP sont mis à 1.
   
 Adresses utilisables : Entre les deux (ex. : 192.168.1.1 à 192.168.1.254).
 ----------------------

*****************************************************************************************************************************************
