	NGINX 
************************************************************************************
	1/ Qu’est-ce que NGINX ?
	------------------------

NGINX (prononcé "Engine X") est un serveur web open source, également utilisé comme :

    Reverse proxy (pour faire passer les requêtes vers d'autres serveurs)

    Serveur de cache

    Serveur proxy pour HTTP, HTTPS, SMTP, etc.

    Load balancer (répartiteur de charge)

Il est réputé pour sa haute performance, sa faible consommation de ressources, et sa capacité à gérer un grand nombre de connexions simultanées.
	
	2/ Arborescence typique de NGINX (Linux) :
	------------------------------------------

Chemin	Description
/etc/nginx/	Dossier principal de configuration
/etc/nginx/nginx.conf	Fichier principal de configuration
/etc/nginx/conf.d/*.conf	Fichiers de configuration supplémentaires
/etc/nginx/sites-available/	(Debian/Ubuntu) Sites configurés
/etc/nginx/sites-enabled/	Sites activés via symlinks
	
	3/ Structure d’un fichier de configuration NGINX (nginx.conf) :
	---------------------------------------------------------------

 # Bloc des événements qui gère la gestion des connexions
events 
{
    # Nombre maximal de connexions simultanées qu'un worker peut gérer
    worker_connections 1024;
}

http {
    # Inclut les types MIME définis dans ce fichier pour la gestion des extensions de fichiers
    include       /etc/nginx/mime.types;
    
    # Type MIME par défaut si aucun type n'est trouvé
    default_type  application/octet-stream;

    # Début de la configuration d'un serveur virtuel
    server {
        # Écoute sur le port 80 (HTTP)
        listen 80;
        
        # Nom du serveur (domaine) pour lequel cette configuration s'applique
        server_name example.com;
        
        # Répertoire racine des fichiers à servir
        root /var/www/html;
        
        # Fichiers index par défaut dans un dossier (dans cet ordre)
        index index.html index.php;

        # Bloc de configuration pour la racine du site
        location / {
            # Essaie de servir le fichier demandé ($uri)
            # Sinon essaie de servir un dossier avec un index ($uri/)
            # Sinon retourne une erreur 404 (fichier non trouvé)
            try_files $uri $uri/ =404;
        }

        # Bloc de configuration pour les fichiers PHP
        location ~ \.php$ {
            # Inclut la configuration FastCGI standard pour PHP
            include snippets/fastcgi-php.conf;
            
            # Adresse du serveur FastCGI (PHP-FPM ici sur localhost port 9000)
            fastcgi_pass 127.0.0.1:9000;
            
            # Définit le chemin complet du script à exécuter par PHP-FPM
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
            
            # Inclut les paramètres FastCGI standard
            include fastcgi_params;
        }
    }
}


	Explication des blocs :
	-----------------------

Bloc	Description
events {}	Gère les connexions (ex : nombre max de connexions simultanées)
http {}	Contient tous les blocs server pour HTTP/S
server {}	Représente un site web ou un hôte virtuel
location {}	Gère les règles pour des chemins précis (/, /api, etc.)


	4/ Principales directives :
	---------------------------

Directive	Rôle
listen	Définit le port (ex : 80 pour HTTP, 443 ssl pour HTTPS)
server_name	Nom de domaine (ou IP) du serveur
root	Répertoire racine des fichiers web
index	Fichiers à servir en priorité
try_files	Tente différents chemins pour servir un fichier
include	Inclut un fichier de config externe
fastcgi_pass	Envoie les requêtes à PHP-FPM

5/ Tester et recharger la configuration

sudo nginx -t           # Tester la configuration
sudo nginx -s reload    # Recharger sans couper le service
sudo systemctl restart nginx  # Redémarrer NGINX complètement

	6/ HTTPS avec SSL :
	-------------------

listen 443 ssl;
ssl_certificate /etc/nginx/ssl/example.crt;
ssl_certificate_key /etc/nginx/ssl/example.key;

Tu peux générer un certificat auto-signé avec :

openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
-keyout inception.key -out inception.crt

	7/ Astuce : Séparer les fichiers :
	----------------------------------

Plutôt que tout mettre dans nginx.conf, tu peux :

    Garder nginx.conf propre

    Mettre chaque site dans un fichier /etc/nginx/conf.d/mon_site.conf

Nginx les inclura automatiquement si tu utilises :

include /etc/nginx/conf.d/*.conf;

Résumé :
--------

Fonction	NGINX
Serveur Web	✅
Proxy inversé	✅
Load balancer	✅
Gère PHP ?	Oui, via PHP-FPM
Config format	Spécifique, en blocs {}

****************************************************************************************4

