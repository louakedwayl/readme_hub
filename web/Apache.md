# 🏛️ **Apache HTTP Server**

## 📌 Introduction

**Apache HTTP Server**, souvent appelé **Apache**, est l'un des serveurs
web les plus anciens et les plus utilisés au monde.\
Créé en 1995 par l'Apache Software Foundation, il a longtemps été le
**serveur web dominant** grâce à sa flexibilité et ses modules.

------------------------------------------------------------------------

# 🔥 1. Qu'est-ce qu'Apache ?

Apache est un serveur web capable de : 

- Servir des fichiers statiques (HTML, images…)
- Exécuter du code dynamique via des modules (PHP, Python…)
- Gérer la réécriture d'URL via `.htaccess`
- Être étendu avec des centaines de modules
- Fonctionner comme proxy ou reverse proxy

Son architecture est **process/thread-based**, ce qui le rend très flexible mais moins performant que Nginx sous forte charge.

------------------------------------------------------------------------

# ⚙️ 2. Architecture interne d'Apache

## 🧩 Modèle multi-processus / multi-thread

Apache utilise trois modes principaux (**MPM -- Multi‑Processing
Modules**) :

### 1️⃣ **prefork**

-   Un processus par connexion
-   Sans threads
-   Compatible avec les vieux modules PHP
-   Très stable mais **gourmand en RAM**

### 2️⃣ **worker**

-   Un processus → plusieurs threads
-   Plus performant que prefork

### 3️⃣ **event**

-   Modèle hybride moderne
-   Les threads s'occupent des connexions actives uniquement
-   Proche du modèle de Nginx mais moins optimisé

------------------------------------------------------------------------

# 🆚 3. Différences entre Apache et Nginx

## 📌 3.1 Architecture

| Fonctionnement           | **Apache**          | **Nginx**           |
|--------------------------|-------------------|-------------------|
| Modèle                   | Processus/threads | Évènementiel       |
| Mémoire                  | Plus élevée       | Très faible        |
| Performance sous charge  | Diminue           | Excellente         |
| Scalabilité              | Bonne             | Très élevée        |

## 📌 3.2 .htaccess

-   **Apache supporte `.htaccess`**, un fichier permettant de modifier
    la config par dossier.
-   Très utile en hébergement mutualisé.
-   Mais ralenti le serveur car Apache relit `.htaccess` à chaque
    requête.

➡️ C'est l'un des **plus grands avantages d'Apache**.

------------------------------------------------------------------------

## 📌 3.3 Modules

Apache possède un énorme écosystème de modules : - `mod_php` -
`mod_ssl` - `mod_rewrite` - `mod_proxy` - `mod_security`

Les modules sont **dynamiques**, donc activables à chaud.

------------------------------------------------------------------------

## 📌 3.4 Configuration

Apache utilise principalement : - `httpd.conf` -
`/etc/apache2/sites-available/` - `.htaccess`

Exemple simple :

    <VirtualHost *:80>
        ServerName example.com
        DocumentRoot /var/www/html
    </VirtualHost>

------------------------------------------------------------------------

# 🧰 4. Quand choisir Apache ?

## ✔️ Utilise Apache si :

-   Tu as besoin de `.htaccess`
-   Tu veux une configuration dynamique par projet
-   Tu utilises PHP "à l'ancienne" (mod_php)
-   Tu veux un serveur très flexible

## ❌ N'utilise PAS Apache si :

-   Tu veux les meilleures performances sous charge
-   Tu veux un reverse proxy ultra performant
-   Tu as beaucoup de connexions simultanées

------------------------------------------------------------------------

# 📁 5. Structure classique d'un projet Apache

    /etc/apache2/
     ├── apache2.conf
     ├── sites-available/
     ├── sites-enabled/
     ├── mods-available/
     └── mods-enabled/

------------------------------------------------------------------------

# 📄 6. Exemple VirtualHost HTTPS

    <VirtualHost *:443>
        ServerName monsite.com
        DocumentRoot /var/www/monsite

        SSLEngine on
        SSLCertificateFile /etc/ssl/monsite.crt
        SSLCertificateKeyFile /etc/ssl/monsite.key
    </VirtualHost>

------------------------------------------------------------------------

# 🔚 Conclusion

Apache est un serveur web extrêmement flexible, puissant et largement
supporté.\
Il excelle dans les environnements où : - `.htaccess` est nécessaire, -
une grande modularité est requise, - la compatibilité est plus
importante que la performance absolue.

Bien qu'il soit moins performant que Nginx sous forte charge, il reste
un pilier du web.
