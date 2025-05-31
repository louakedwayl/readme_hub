			mapping
************************************************************************************

Mapping signifie faire correspondre ou relier une chose à une autre.

Dans le contexte de Docker et des réseaux, le port mapping (ou mappage de ports) désigne l’action de relier un port d’une machine hôte 
(ton ordinateur) à un port d’un conteneur Docker.

Exemple concret :
-----------------

    Ton conteneur Docker a un serveur web qui écoute sur le port 80 (port interne au conteneur).

    Ta machine hôte (ton ordinateur) va utiliser le port 8080.

    Le mapping de port va relier le port 8080 de ta machine au port 80 du conteneur.

    Ainsi, quand tu vas accéder à localhost:8080, tu seras en fait redirigé vers le port 80 à l’intérieur du conteneur.

En résumé :
-----------

Le mapping permet de faire le pont entre deux ports différents pour que la communication entre l’extérieur (machine hôte) et l’intérieur (conteneur) fonctionne.

**********************************************************************************************************
