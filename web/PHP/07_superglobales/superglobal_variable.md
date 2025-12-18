# Les Variables Super Globales en PHP

## Introduction

Les variables super globales sont des variables prédéfinies en PHP qui sont automatiquement disponibles dans tous les contextes d'un script, sans avoir besoin de les déclarer ou de les importer.

## Caractéristiques Principales

Les super globales sont des tableaux associatifs accessibles partout dans le code, que ce soit au niveau global, dans des fonctions ou dans des classes. Elles permettent de gérer les données provenant de différentes sources comme les formulaires, les sessions ou le serveur.

## Liste des Super Globales

### $_GET
Récupère les données passées dans l'URL via la méthode HTTP GET. Les informations sont visibles dans la barre d'adresse du navigateur.

### $_POST
Récupère les données envoyées via un formulaire HTML avec la méthode POST. Les données ne sont pas visibles dans l'URL.

### $_REQUEST
Combine les données de $_GET, $_POST et $_COOKIE. Pratique mais moins sécurisée car elle mélange différentes sources.

### $_SESSION
Stocke des informations persistantes pour un utilisateur tout au long de sa visite sur le site. Nécessite l'utilisation de `session_start()`.

### $_COOKIE
Contient les données des cookies envoyés par le navigateur. Permet de stocker des informations sur le client.

### $_SERVER
Fournit des informations sur le serveur et l'environnement d'exécution : adresse IP, nom du script, méthode HTTP utilisée, etc.

### $_FILES
Gère les fichiers uploadés via un formulaire. Contient des informations sur le nom, la taille, le type et l'emplacement temporaire des fichiers.

### $_ENV
Contient les variables d'environnement du système. Utile pour accéder à des configurations système.

### $GLOBALS
Référence toutes les variables globales disponibles dans le script. Permet d'accéder aux variables globales depuis n'importe où.

## Utilisation Générale

Les super globales s'utilisent comme des tableaux classiques avec des clés. Il est important de toujours valider et filtrer les données provenant de ces variables pour éviter les failles de sécurité.

## Bonnes Pratiques

- Toujours vérifier l'existence d'une clé avant de l'utiliser
- Filtrer et valider les données reçues
- Éviter d'utiliser $_REQUEST pour limiter les risques de sécurité
- Utiliser des fonctions de filtrage comme `filter_input()` ou `htmlspecialchars()`

## Conclusion

Les variables super globales sont essentielles en PHP pour gérer les interactions avec l'utilisateur, le serveur et les sessions. Leur compréhension est fondamentale pour développer des applications web dynamiques et sécurisées.
