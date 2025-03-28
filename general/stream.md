							Flux
***************************************************************************************************************************

	En informatique, un flux (stream) désigne un ensemble ordonné de données qui circulent entre un émetteur et un 
récepteur, généralement de manière continue ou séquentielle. Ce concept est utilisé dans de nombreux domaines, 
comme les entrées/sorties (E/S), la communication réseau, le traitement multimédia et la gestion de fichiers.

Caractéristiques d’un flux :
----------------------------

Un flux présente généralement les propriétés suivantes :

Séquentiel : Les données sont lues ou écrites dans un ordre précis.

Unidirectionnel ou bidirectionnel :

Un flux d'entrée permet de lire des données (ex : clavier, réseau, fichier).
Un flux de sortie permet d'écrire des données (ex : console, fichier, socket).
Certains flux sont bidirectionnels (ex : sockets réseau, flux de fichiers en mode lecture/écriture).

Bufferisation : Un flux peut être bufferisé (stocké temporairement en mémoire avant traitement)
ou non bufferisé (traité immédiatement).

Types de flux en informatique :
-------------------------------

	1/Flux d'entrée/sortie standard : 
	---------------------------------

Entrée standard (stdin) : données lues depuis le clavier.
Dans le cas d’un flux d’entrée standard (stdin), l’émetteur est généralement l’utilisateur (ou un programme) 
qui fournit des données, et le récepteur est le programme qui les reçoit.

Sortie standard (stdout) : données affichées sur l’écran.
Dans le cas d’un flux de sortie standard (stdout), l’émetteur est le programme qui génère des données,
et le récepteur est généralement l’écran (le terminal) ou un autre programme si la sortie est redirigée.

Sortie d’erreur (stderr) : messages d'erreur affichés séparément de la sortie standard.

	2/Flux de fichiers :
	--------------------

Un fichier est un type de flux, où les données sont stockées et accessibles en lecture et/ou écriture.

	3/Flux réseau :
	---------------

Un flux réseau permet la communication entre machines via des sockets, utilisés dans les protocoles comme HTTP, TCP, UDP.

	4/ Flux multimédia :
	--------------------

Un flux multimédia est une transmission continue de données, utilisée dans le streaming vidéo (Netflix, YouTube)
ou la diffusion audio (Spotify, radios en ligne).

Exemple : Le protocole RTSP (Real-Time Streaming Protocol) est utilisé pour gérer le flux vidéo 
entre un serveur et un client.

	5/ Flux de traitement de données :
	----------------------------------

Certains programmes traitent des flux de données en continu, comme les pipelines de données ou le traitement des 
logs en temps réel.

*****************************************************************************************************************************
