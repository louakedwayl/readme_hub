						point to point connection
**************************************************************************************************************************

subnet mask /30 :
-----------------

	Le masque /30 est un masque de sous-réseau couramment utilisé pour créer de petits sous-réseaux.
Ce masque divise un réseau en sous-réseaux avec 4 adresses IP chacune, dont 2 sont assignables aux hôtes.

En notation décimale : 255.255.255.252
En binaire : 11111111.11111111.11111111.11111100

Exemple de sous-réseau /30:
------------------------------

Prenons une plage d'adresses 192.168.1.0/30 :

    Adresse réseau : 192.168.1.0 (non assignable, identifie le sous-réseau)
    Première adresse utilisable : 192.168.1.1
    Deuxième adresse utilisable : 192.168.1.2
    Adresse de diffusion : 192.168.1.3 (non assignable, utilisée pour envoyer des messages à tous les hôtes du sous-réseau)

Structure en binaire :
----------------------

--------------------------------------------------------------------------------
|  Adresse IP |	              Binaire                 |         Rôle	       |
--------------------------------------------------------------------------------
| 192.168.1.0 |	11000000.10101000.00000001.000000000  |	Adresse réseau         |
| 192.168.1.1 |	11000000.10101000.00000001.00000001   |	Hôte utilisable 1      |
| 192.168.1.2 |	11000000.10101000.00000001.00000010   |	Hôte utilisable 2      |
| 192.168.1.3 |	11000000.10101000.00000001.00000011   |	Adresse de diffusion   |
--------------------------------------------------------------------------------

subnet mask /31 :
-----------------

	Le masque de sous-réseau /31 est une notation CIDR (Classless Inter-Domain Routing) qui désigne un masque 
de sous-réseau où 31 bits sont utilisés pour le préfixe réseau. Cela laisse 1 bit pour les adresses hôtes. Il est 
principalement utilisé dans des cas spécifiques, comme les liens point-à-point, où il n'est pas nécessaire d'avoir 
des adresses de diffusion ou des adresses inutilisées.

En notation décimale : 255.255.255.254
En binaire : 11111111.11111111.11111111.11111110

Nombre d'adresses disponibles:
------------------------------

Avec un masque de sous-réseau /31 :

    Il y a 2 adresses IP possibles dans le sous-réseau.
    Ces deux adresses sont généralement utilisées pour établir une connexion entre deux périphériques sur un lien 
point-à-point.

Pourquoi utiliser un masque /31 ?

	Traditionnellement, on évitait les masques /31 car un sous-réseau avait besoin d'une adresse réseau et d'une 
adresse de diffusion. Cela rendait le masque inefficace pour des réseaux avec seulement deux hôtes. Cependant, 
dans un lien point-à-point, il n'y a pas besoin de ces adresses spécifiques, car il n'y a que deux périphériques connectés.

Avec la RFC 3021, l'utilisation du masque /31 a été standardisée pour économiser des adresses IP dans ce type de situation.
Exemple pratique

Imaginons que nous utilisions l'adresse réseau 192.168.1.0/31 :

    Adresses possibles :
        192.168.1.0 (utilisée comme adresse hôte)
        192.168.1.1 (utilisée comme adresse hôte)
    Ce réseau ne peut être utilisé que pour un lien entre deux périphériques.

Avantages
----------

    Économie d'adresses IP : Utile dans les environnements avec des liens point-à-point (comme les connexions entre routeurs) où les adresses réseau et de diffusion ne sont pas nécessaires.
    Simplicité : Limite les erreurs de configuration car seules deux adresses sont disponibles.

Limitation:
------------

Le masque /31 ne peut être utilisé que pour des liens point-à-point. Pour des réseaux nécessitant plusieurs hôtes, un masque plus large, comme /30, est nécessaire.

En résumé, le masque /31 est une solution efficace et économique pour les connexions point-à-point, permettant d'économiser des adresses IP dans des environnements limités en espace d'adressage.

***************************************************************************************************************************
