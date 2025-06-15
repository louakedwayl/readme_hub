# FastCGI, PHP-FPM et leur rôle avec Nginx

---

## 1/ Contexte : Servir des pages PHP via un serveur web

Quand tu héberges un site web dynamique en PHP, le serveur web (Nginx, Apache) doit exécuter du code PHP pour générer des pages HTML affichables par le navigateur.

Le serveur web **ne sait pas exécuter PHP nativement**, il doit donc communiquer avec un moteur PHP qui interprète les scripts.

---

## 2/ CGI : Le protocole historique

Le protocole **CGI (Common Gateway Interface)** permet au serveur web de lancer un programme externe (ex : interpréteur PHP) à chaque requête.

### Problème :

Pour chaque requête PHP, un **nouveau processus PHP est lancé**, ce qui est lourd et lent.

---

## 3/ FastCGI : l’amélioration

FastCGI est une version améliorée de CGI :

- Il garde un ou plusieurs processus PHP toujours actifs (ex. PHP-FPM).
- Le serveur web envoie les requêtes PHP à ces processus via un protocole rapide.
- Les processus PHP traitent les requêtes sans redémarrer à chaque fois.

---

## 4/ PHP-FPM (FastCGI Process Manager)

PHP-FPM est un gestionnaire de processus FastCGI pour PHP :

- Il lance et gère plusieurs processus PHP en arrière-plan.
- Il permet d’ajuster le nombre de processus selon la charge.
- Il améliore la performance et la stabilité de l’exécution PHP.

---

## 5/ Le rôle de Nginx avec FastCGI

Nginx est un serveur web performant, mais **ne peut pas interpréter PHP directement**.

Pour gérer PHP, Nginx utilise FastCGI pour :

- Recevoir la requête HTTP pour un fichier `.php`.
- Transmettre la requête à PHP-FPM via FastCGI (souvent `localhost:9000` ou un socket).
- Recevoir la réponse générée par PHP-FPM (HTML).
- Envoyer la réponse au client (navigateur).

---

## 6/ Exemple de configuration Nginx pour PHP avec FastCGI

```nginx
location ~ \.php$ {
    include snippets/fastcgi-php.conf;
    fastcgi_pass 127.0.0.1:9000;  # Adresse du serveur PHP-FPM
    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    include fastcgi_params;
}
```

## 7/ Pourquoi utiliser FastCGI + PHP-FPM dans Docker ?

- Dans Docker, chaque service tourne dans son propre conteneur (ex : Nginx, PHP-FPM).
- Nginx envoie les requêtes PHP via FastCGI au conteneur PHP-FPM, souvent sur le port 9000.
- Cela sépare clairement les responsabilités et facilite la scalabilité et la maintenance.

## 8/ Résumé

| Composant | Rôle                                           |
|-----------|------------------------------------------------|
| Nginx     | Serveur web, gère les requêtes HTTP            |
| FastCGI   | Protocole entre Nginx et PHP-FPM                |
| PHP-FPM   | Interprète le PHP, gère les processus PHP en arrière-plan |

