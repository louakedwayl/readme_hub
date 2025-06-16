# WordPress

---

## Qu’est-ce que WordPress ?

WordPress est un **système de gestion de contenu (CMS)** libre et open source, principalement utilisé pour créer et gérer des sites web et des blogs.  
Il est écrit en **PHP** et utilise une base de données **MySQL** ou **MariaDB** pour stocker les données.

> WordPress est aujourd’hui l’un des CMS les plus populaires au monde, utilisé pour des millions de sites web, des blogs personnels aux grands sites d’entreprise.

---

## Fonctionnalités principales

- **Interface utilisateur conviviale** : Interface d’administration intuitive, accessible même aux débutants.
- **Personnalisation facile** : Des milliers de thèmes graphiques et plugins disponibles.
- **Gestion de contenu** : Création, modification et organisation de pages, articles, médias.
- **Extensions (plugins)** : Ajout de fonctionnalités (SEO, sécurité, e-commerce, formulaires…).
- **Multilingue** : Gestion des sites multilingues.
- **Communauté active** : De nombreuses ressources, mises à jour régulières, entraide.

---

## Architecture technique

### 1. Code source en PHP

WordPress est écrit en **PHP**. Lorsqu’un visiteur demande une page, le serveur web (NGINX, Apache, etc.) transmet la requête à **PHP-FPM**, qui exécute le code WordPress.

### 2. Base de données

Les contenus (articles, pages, utilisateurs, paramètres, etc.) sont stockés dans une base de données **MySQL** ou **MariaDB**.  
WordPress communique avec elle via des **requêtes SQL**.

### 3. Fichiers

WordPress est constitué de plusieurs fichiers essentiels :

- Le **code PHP**
- Les **thèmes** (pour l’apparence)
- Les **plugins** (fonctionnalités)
- Les **médias** (images, vidéos) uploadés par l’utilisateur

---

## Fonctionnement dans un environnement Docker

Pour déployer WordPress avec Docker, on utilise généralement **3 containers** :

- **MariaDB** : pour stocker toutes les données.
- **WordPress + PHP-FPM** : exécute le code WordPress.
- **NGINX** : serveur HTTP/HTTPS qui transmet les requêtes à PHP-FPM.

### Volumes Docker utilisés :

- **Volume pour la base de données MariaDB**
- **Volume pour les fichiers WordPress** (thèmes, plugins, médias)

---

## Avantages de WordPress

- 🚀 Mise en place rapide
- 🎨 Grande flexibilité (thèmes, plugins)
- 🆓 Open source et gratuit
- 🌍 Communauté vaste et réactive
- 📚 Beaucoup de tutoriels et documentation

---

## Résumé

WordPress est un **CMS puissant et accessible**, basé sur **PHP** et **MySQL/MariaDB**.  
Il est fréquemment utilisé en **production avec NGINX et PHP-FPM**, souvent **via Docker** pour simplifier l’isolation et la gestion des composants.

---

