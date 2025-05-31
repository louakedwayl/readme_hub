			WordPress
******************************************************************************************************

	Qu’est-ce que WordPress ?
	-------------------------

WordPress est un système de gestion de contenu (CMS — Content Management System) libre et open source,
principalement utilisé pour créer et gérer des sites web et des blogs.
Il est écrit en PHP et utilise une base de données MySQL ou MariaDB pour stocker les données.

WordPress est aujourd’hui l’un des CMS les plus populaires au monde,
utilisé pour des millions de sites web, des blogs personnels aux grands sites d’entreprise.

	Fonctionnalités principales :
	-----------------------------

    Interface utilisateur conviviale : WordPress propose une interface d’administration intuitive, accessible même aux débutants, sans connaissances techniques approfondies.

    Personnalisation facile : avec des milliers de thèmes graphiques et de plugins, WordPress est hautement personnalisable.

    Gestion de contenu : création, modification et organisation facile des pages, articles, médias (images, vidéos).

    Extensions (plugins) : ajout de fonctionnalités diverses (SEO, sécurité, e-commerce, formulaires, etc.).

    Multilingue : supporte plusieurs langues et permet de gérer des sites multilingues.

    Communauté active : une grande communauté de développeurs et utilisateurs, avec de nombreuses ressources et mises à jour régulières.

Architecture technique
	
	1/ Code source en PHP :
	-----------------------

WordPress est écrit en PHP. Lorsqu’un visiteur demande une page, le serveur web (NGINX, Apache, etc.) envoie la requête à un interpréteur PHP (comme PHP-FPM) qui exécute le code WordPress.
	
	2/ Base de données :
	--------------------

Les contenus (articles, pages, utilisateurs, paramètres) sont stockés dans une base de données MySQL ou MariaDB.
WordPress interagit avec la base via des requêtes SQL.

	3/ Fichiers :
	-------------

Les fichiers WordPress contiennent :

    Le code PHP

    Les thèmes (pour l’apparence)

    Les plugins (pour les fonctionnalités)

    Les médias (images, vidéos) uploadés par l’utilisateur

Fonctionnement dans un environnement Docker

Pour déployer WordPress avec Docker, on utilise généralement 3 containers :

    MariaDB : base de données où sont stockées toutes les données WordPress.

    WordPress + PHP-FPM : container exécutant le code PHP de WordPress, avec PHP-FPM pour gérer les processus PHP.

    NGINX : serveur web qui reçoit les requêtes HTTP/HTTPS et les transmet à PHP-FPM.

Les données importantes sont sauvegardées dans des volumes Docker pour persister entre les redémarrages des containers :

    Volume pour la base de données MariaDB

    Volume pour les fichiers WordPress (thèmes, plugins, médias)

Avantages de WordPress

    Rapidité de mise en place d’un site web

    Grande flexibilité grâce aux thèmes et plugins

    Solution open source gratuite

    Communauté vaste et active

    Nombreuses ressources et tutoriels disponibles

	Résumé :
	--------

WordPress est un CMS puissant et facile à utiliser qui repose sur PHP et une base de données.
Il est souvent déployé avec PHP-FPM et NGINX en production, notamment via des containers Docker pour faciliter la gestion et l’isolation.

*****************************************************************************************************************************************
