# **Nginx**

## 📌 Introduction

**Nginx** (prononcé *engine-x*) est un serveur web et reverse proxy
open-source, conçu pour être **rapide**, **léger** et **hautement
performant**.\
Il est aujourd'hui l'un des serveurs web les plus utilisés au monde,
notamment pour les sites à fort trafic.

# 🔥 1. Qu'est-ce que Nginx ?

Nginx est un serveur web capable de :

- **Fichiers statiques** : servir HTML, images, CSS…
- **Connexions simultanées** : gérer un grand nombre de connexions
- **Reverse proxy** : acheminer les requêtes vers d’autres serveurs
- **Load balancing** : équilibrer la charge entre plusieurs serveurs
- **HTTPS / TLS** : gérer les certificats et la sécurité
- **Proxy pour apps** : Node.js, PHP-FPM, Python, etc.

Son architecture est **évènementielle** (asynchrone), ce qui le rend
extrêmement performant.

# ⚙️ 2. Architecture interne de Nginx

## 🧠 Modèle évènementiel (asynchrone)

Nginx utilise une architecture **event-driven** : → un petit nombre de
processus gèrent des milliers de connexions simultanément.

**Avantages :** - Très performant - Faible consommation CPU - Faible
consommation RAM - Parfait pour les gros volumes de trafic

# 🆚 3. Différences entre Nginx et Apache

## 📌 3.1 Architecture

  ------------------------------------------------------------------------
  Fonctionnement                **Nginx**            **Apache**
  ----------------------------- -------------------- ---------------------
  Architecture                  Évènementielle       Multi-processus /
                                (asynchrone)         multi-thread

  Performance                   Très élevée même     Diminue quand le
                                sous forte charge    trafic monte

  Consommation RAM              Très faible          Plus élevée

  Scalabilité                   Excellente           Bonne
  ------------------------------------------------------------------------

## 📌 3.2 Fichiers statiques

-   **Nginx** excelle dans la gestion de fichiers statiques.
-   **Apache** est plus lent sous forte charge.

## 📌 3.3 Reverse proxy

  ------------------------------------------------------------------------
  Fonctionnalité                       Nginx            Apache
  ------------------------------------ ---------------- ------------------
  Reverse proxy                        Intégré, très    Via modules, moins
                                       performant       performant

  Load balancing                       Oui              Oui
  ------------------------------------------------------------------------

## 📌 3.4 .htaccess

-   Apache : supporte `.htaccess`
-   Nginx : **ne supporte pas** `.htaccess`

## 📌 3.5 Modules

-   Nginx : modules **compilés**
-   Apache : modules **dynamiques**

## 📌 3.6 Configuration

Exemple simple Nginx :

``` nginx
server {
    listen 80;
    server_name example.com;
    root /var/www/html;
    index index.html;
}
```

# 🧰 4. Quand choisir Nginx ?

## ✔️ Utilise Nginx si :

-   Tu veux un site rapide et scalable
-   Tu veux un reverse proxy performants
-   Tu veux servir du statique

## ❌ N'utilise PAS Nginx si :

-   Tu as besoin de `.htaccess`

# 📁 5. Structure classique

    /etc/nginx/
     ├── nginx.conf
     ├── sites-available/
     └── sites-enabled/

# 📄 6. Exemple HTTPS

``` nginx
server {
    listen 80;
    server_name monsite.com www.monsite.com;
    return 301 https://$host$request_uri;
}

server {
    listen 443 ssl;
    server_name monsite.com www.monsite.com;

    ssl_certificate /etc/ssl/monsite.crt;
    ssl_certificate_key /etc/ssl/monsite.key;

    root /var/www/monsite;
    index index.html;

    location /api {
        proxy_pass http://localhost:3000;
    }
}
```

# 🔚 Conclusion

Nginx est idéal pour les sites modernes, les fortes charges et le
reverse proxy.
