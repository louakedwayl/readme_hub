# PHP-FPM (PHP FastCGI Process Manager)

---

## 1/ Introduction :

PHP-FPM signifie PHP FastCGI Process Manager.  
C’est une implémentation améliorée de FastCGI conçue pour gérer efficacement l’exécution de scripts PHP sur un serveur web.

---

## 2/ Pourquoi PHP-FPM ?

- PHP s’exécute côté serveur pour générer des pages web dynamiques.  
- Les serveurs web comme Nginx ne peuvent pas exécuter PHP directement.  
- PHP-FPM agit comme un gestionnaire de processus qui lance, surveille et gère des processus PHP en arrière-plan.

---

## 3/ Fonctionnement de PHP-FPM :

- PHP-FPM lance plusieurs processus PHP qui restent actifs en permanence.  
- Lorsqu’une requête arrive, PHP-FPM attribue cette requête à un processus libre.  
- Le processus exécute le script PHP et renvoie le résultat (généralement du HTML) au serveur web.  
- Le processus reste ensuite prêt à traiter une nouvelle requête, évitant ainsi le coût de redémarrage à chaque fois.

---

## 4/ Avantages de PHP-FPM :

- **Performance :** Pas de création de processus PHP à chaque requête, ce qui réduit la latence.  
- **Gestion de la charge :** Permet de gérer un grand nombre de requêtes simultanées.  
- **Flexibilité :** Configuration fine du nombre de processus, du timeout, etc.  
- **Stabilité :** Si un processus plante, PHP-FPM peut le relancer automatiquement.  
- **Sécurité :** Possibilité de configurer plusieurs pools d’utilisateurs/processus isolés.

---

## 5/ Architecture typique avec PHP-FPM :

[Client] <-- HTTP --> [Nginx] <-- FastCGI --> [PHP-FPM] --> [PHP scripts]


- Le client envoie une requête HTTP à Nginx.  
- Nginx détecte une requête PHP et la transmet à PHP-FPM via FastCGI (socket ou port réseau, ex: localhost:9000).  
- PHP-FPM exécute le script PHP.  
- La réponse est renvoyée à Nginx, qui l’envoie au client.

---

## 6/ Exemple de configuration PHP-FPM (`www.conf`) :

```ini
# Définition de l’adresse d’écoute (socket ou port) :
listen = 127.0.0.1:9000
# ou
listen = /run/php/php7.4-fpm.sock

# Nombre de processus minimum et maximum :
pm = dynamic
pm.max_children = 50
pm.start_servers = 5
pm.min_spare_servers = 5
pm.max_spare_servers = 35
```
## 7/ Utilisation dans un contexte Docker :

    PHP-FPM tourne dans un conteneur séparé.

    Nginx dans un autre conteneur communique avec PHP-FPM via un réseau Docker, souvent sur le port 9000.

    Cette séparation facilite la maintenance, la montée en charge et le déploiement.

## 8/ Conclusion :

PHP-FPM est un composant essentiel pour faire tourner efficacement du PHP derrière un serveur web comme Nginx,
particulièrement dans des environnements modernes et conteneurisés.