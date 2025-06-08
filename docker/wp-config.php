			wp-config.php
****************************************************************
	
	Qu’est-ce que c’est ?
	---------------------

Le fichier wp-config.php est le fichier de configuration principal de WordPress.
Il contient les paramètres essentiels permettant à WordPress de fonctionner correctement.
	
	Où se trouve-t-il ?
	-------------------

À la racine de l’installation WordPress, par exemple /var/www/wordpress/wp-config.php.

Rôle principal :
----------------

    Configurer la connexion à la base de données (MariaDB/MySQL)

    Définir des constantes clés pour la sécurité et le comportement de WordPress

    Personnaliser certains paramètres avancés

----------------------------------------------------------------------------
| Paramètre       | Description                                            |
|-----------------|--------------------------------------------------------|
| DB_NAME         | Nom de la base de données WordPress                    |
| DB_USER         | Utilisateur pour se connecter à la base de données    |
| DB_PASSWORD     | Mot de passe associé à l’utilisateur DB                |
| DB_HOST         | Adresse du serveur de base (ex: localhost ou mariadb:3306) |
| Clés de sécurité (AUTH_KEY, etc.) | Assurent la sécurité des cookies et des sessions |
| $table_prefix   | Préfixe utilisé pour les tables de la base (ex: wp_)  |
---------------------------------------------------------------------------

Création

    Généré automatiquement avec la commande CLI :

wp config create --dbname=... --dbuser=... --dbpass=... --dbhost=... --allow-root

    Peut aussi être créé manuellement en copiant wp-config-sample.php et en éditant les infos.

Pourquoi c’est important ?

Sans ce fichier, WordPress ne sait pas comment accéder à la base de données, donc ne peut pas fonctionner.
Astuces

    Ne jamais exposer ce fichier publiquement (il contient des infos sensibles).

    Protéger les clés de sécurité en les générant sur https://api.wordpress.org/secret-key/1.1/salt/

    Vérifier les permissions du fichier (lecture par WordPress, mais pas accessible publiquement).

*******************************************************************************
