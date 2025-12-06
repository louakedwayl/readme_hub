# 📄 Cours sur le fichier `.htaccess`

## 📌 Introduction
Le fichier **`.htaccess`** (Hypertext Access) est un fichier de configuration utilisé par le serveur web **Apache**.  
Il permet de **modifier le comportement du serveur pour un dossier spécifique**, sans modifier la configuration globale d’Apache.

> ⚠️ `.htaccess` **ne fonctionne pas avec Nginx**. Pour Nginx, la configuration se fait dans les fichiers `nginx.conf` ou `sites-available`.

---

## 🔹 1. Où placer le fichier `.htaccess` ?

- Le fichier doit être placé dans le **répertoire racine** ou dans un sous-dossier.  
- Apache lira le fichier **pour ce dossier et tous ses sous-dossiers**.  
- Nom du fichier : `.htaccess` (commence par un point, fichier “caché”).

---

## 🔹 2. Activation d’Apache

Pour qu’Apache prenne en compte `.htaccess` :

1. Vérifier que le module `mod_rewrite` est activé :
```bash
sudo a2enmod rewrite
```

2. Vérifier que l’option `AllowOverride` est activée pour le dossier :
```apache
<Directory /var/www/html>
    AllowOverride All
</Directory>
```

3. Redémarrer Apache :
```bash
sudo systemctl restart apache2
```

---

## 🔹 3. Utilisations courantes de `.htaccess`

### 3.1 Redirections d’URL
Rediriger une page vers une autre :
```apache
Redirect 301 /ancienne-page.html /nouvelle-page.html
```

Rediriger tout le site vers HTTPS :
```apache
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

---

### 3.2 Réécriture d’URL (URL rewriting)
Permet de transformer des URL longues en URL “propres” :
```apache
RewriteEngine On
RewriteRule ^produits/([0-9]+)$ produit.php?id=$1 [L,QSA]
```
Exemple : `site.com/produits/123` → `site.com/produit.php?id=123`

---

### 3.3 Protection par mot de passe
Créer un fichier `.htpasswd` pour protéger un dossier :
```apache
AuthType Basic
AuthName "Zone protégée"
AuthUserFile /chemin/vers/.htpasswd
Require valid-user
```

---

### 3.4 Gestion des erreurs personnalisées
Afficher une page 404 personnalisée :
```apache
ErrorDocument 404 /erreurs/404.html
ErrorDocument 403 /erreurs/403.html
```

---

### 3.5 Blocage et filtrage
Bloquer une IP :
```apache
Order Allow,Deny
Deny from 123.456.789.0
Allow from all
```

Bloquer certains bots :
```apache
RewriteEngine On
RewriteCond %{HTTP_USER_AGENT} BadBot [NC]
RewriteRule .* - [F,L]
```

---

### 3.6 Compression et cache
Activer la compression Gzip :
```apache
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/html text/css application/javascript
</IfModule>
```

Mettre en cache les fichiers statiques :
```apache
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType image/jpg "access plus 1 month"
    ExpiresByType text/css "access plus 1 week"
</IfModule>
```

---

## 🔹 4. Bonnes pratiques

- Faire une **sauvegarde** avant de modifier `.htaccess`  
- Tester les règles **une par une**  
- Éviter les règles trop complexes pour ne pas ralentir Apache  
- Sur un serveur dédié, privilégier la **configuration globale d’Apache** pour de meilleures performances

---

## 🔹 5. Limitations

- Nginx **ne supporte pas `.htaccess`**  
- Les règles `.htaccess` sont **lues à chaque requête**, ce qui peut ralentir le serveur si elles sont nombreuses  
- Ne peut pas modifier certaines directives globales d’Apache

---

## 🔹 6. Conclusion

Le fichier `.htaccess` est un outil **puissant** pour gérer :

- Les redirections et réécritures d’URL  
- La sécurité et la protection par mot de passe  
- La gestion des erreurs et du cache  
- Le filtrage des accès  

Il reste particulièrement utile sur les **hébergements mutualisés**, mais pour de gros sites, il est recommandé de **mettre les règles directement dans la configuration globale d’Apache** pour de meilleures performances.
