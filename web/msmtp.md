# msmtp (Docker & PHP)

Ce document explique le rôle, le fonctionnement et la configuration de **msmtp** dans un environnement Dockerisé pour l'envoi d'emails (projet Camagru, etc.).

---

## 1. C'est quoi msmtp ?

**msmtp** est un **client SMTP** ultra-léger.

Contrairement à des serveurs de messagerie lourds comme *Postfix* ou *Sendmail* (qui peuvent recevoir, stocker et trier des mails), msmtp a une seule fonction : **faire le relais**.

* Il ne stocke pas les mails.
* Il n'écoute pas sur le port 25.
* Il prend juste un mail local et le pousse vers un vrai serveur (Gmail, Outlook, SendGrid).

> **L'analogie :** Si PHP est l'écrivain de la lettre, msmtp est le coursier qui prend l'enveloppe pour l'amener jusqu'au centre de tri de la Poste (Gmail).

---

## 2. Le Flux d'envoi (Architecture)

Comment un mail part de ton code PHP pour arriver chez l'utilisateur ? C'est une course de relais en 4 étapes :

1. **PHP (`mail()`)** :  
   Ton script génère le contenu, les en-têtes et appelle la fonction `mail()`. PHP ne se connecte pas à internet lui-même.

2. **Le Système (`sendmail_path`)** :  
   PHP regarde sa configuration (`php.ini`) pour savoir à qui donner le bébé. Il exécute la commande définie : `/usr/bin/msmtp -t`.

3. **msmtp (Le Relais)** :
   * Il lit sa config (`/etc/msmtprc`).
   * Il récupère les identifiants (User/Pass).
   * Il initie une connexion sécurisée (TLS) vers le serveur externe.

4. **Serveur SMTP (Gmail/Autre)** :  
   C'est lui qui parle le protocole SMTP final, authentifie l'envoi et distribue le mail au destinataire.

---

## 3. Configuration Technique

### A. Le fichier `/etc/msmtprc`

C'est le fichier vital. Il contient les secrets de connexion.

```ini
# Valeurs par défaut
defaults
auth           on
tls            on
tls_trust_file /etc/ssl/certs/ca-certificates.crt
logfile        /var/log/msmtp.log

# Configuration Gmail
account        gmail
host           smtp.gmail.com
port           587
from           ton.email@gmail.com
user           ton.email@gmail.com
password       ton_mot_de_passe_application

# Définir le compte par défaut
account default : gmail
```

### B. La sécurité (CRITIQUE ⚠️)

msmtp refuse de se lancer si le fichier de configuration est lisible par tout le monde. Dans le Dockerfile ou le script d'entrypoint, il faut absolument :

```bash
chmod 600 /etc/msmtprc
chown www-data:www-data /etc/msmtprc
```

### C. La liaison avec PHP (php.ini)

Pour que PHP utilise msmtp, on crée un fichier de config PHP (ex: `/usr/local/etc/php/conf.d/sendmail.ini`) :

```ini
sendmail_path = /usr/bin/msmtp -t
```

* `-t` : Dit à msmtp de lire les destinataires directement dans l'en-tête du mail généré par PHP.

---

## 4. Intégration dans Docker

Voici les étapes clés à mettre dans le Dockerfile :

```dockerfile
# 1. Installer msmtp
RUN apt-get update && apt-get install -y msmtp msmtp-mta ca-certificates

# 2. Configurer le chemin sendmail pour PHP
RUN echo 'sendmail_path = /usr/bin/msmtp -t' > /usr/local/etc/php/conf.d/sendmail.ini

# 3. Copier la config (ou le template)
COPY msmtprc_template /etc/msmtprc

# 4. Appliquer les permissions strictes (sinon ça plante)
RUN chown www-data:www-data /etc/msmtprc && chmod 600 /etc/msmtprc
```

---

## 5. Debugging : Quand ça ne marche pas

Si les mails ne partent pas, il faut isoler le problème. Est-ce PHP ? Est-ce msmtp ? Est-ce Gmail ?

### Test manuel (Sans PHP)

Tu peux tester l'envoi directement depuis le terminal du conteneur Docker pour vérifier la connexion SMTP.

1. Entre dans le conteneur :
   ```bash
   docker exec -it nom_du_conteneur bash
   ```

2. Lance la commande de test :
   ```bash
   echo "Ceci est un test" | msmtp --debug ton.adresse@gmail.com
   ```

   * `--debug` : Affiche tout le dialogue avec le serveur Google.
   * Si tu vois `Authentication failed` : Ton mot de passe est faux.
   * Si tu vois `Connection timed out` : Le port 587 est bloqué par ton pare-feu ou ta box.
   * Si ça marche ici mais pas en PHP : Le problème vient de ton code PHP ou du `sendmail_path`.

### Vérifier les logs

Si configuré dans le `msmtprc` (logfile), tu peux suivre les erreurs en direct :

```bash
tail -f /var/log/msmtp.log
```

---

## 6. Résumé

| Composant | Rôle | Commande / Fichier |
|-----------|------|-------------------|
| PHP | Génère le mail | `mail($to, $subject, ...)` |
| php.ini | Dit à PHP qui utiliser | `sendmail_path = ...` |
| msmtp | Transmet le mail (Relais) | `/usr/bin/msmtp` |
| msmtprc | Contient les mots de passe | `/etc/msmtprc` |
| Gmail | Envoie réellement le mail | Serveur SMTP (Port 587) |
