# Le protocole `SMTP`

## 1. Introduction

**SMTP** (*Simple Mail Transfer Protocol*) est le protocole standard pour **l'envoi d'emails** sur Internet. Il définit comment un client ou un serveur peut **transférer un message électronique** d'une machine à une autre.

* Port standard : **25** (serveur à serveur)
* Ports sécurisés : **465 (SSL), 587 (STARTTLS)** (client vers serveur)
* Utilisé avec : **POP3 ou IMAP** pour récupérer les emails

---

## 2. Fonctionnement général

SMTP fonctionne selon le **modèle client/serveur** :

1. Le **client SMTP** (ex : PHP, Outlook, Thunderbird, msmtp) se connecte au serveur SMTP.
2. Le serveur vérifie l’authentification si nécessaire.
3. Le message est envoyé au serveur du destinataire ou relayé à d’autres serveurs SMTP jusqu’à la boîte du destinataire.

---

## 3. Étapes d’envoi d’un email

1. **Connexion** au serveur SMTP (TCP/IP)
2. **Échange des commandes SMTP**
3. **Authentification** (LOGIN, PLAIN, CRAM-MD5)
4. **Transmission du mail**
5. **Fermeture de la connexion**

### 3.1 Exemple simplifié d’échange SMTP

```
Client -> Server: HELO example.com
Server -> Client: 250 Hello example.com
Client -> Server: MAIL FROM:<expediteur@example.com>
Server -> Client: 250 OK
Client -> Server: RCPT TO:<destinataire@example.com>
Server -> Client: 250 OK
Client -> Server: DATA
Server -> Client: 354 End data with <CR><LF>.<CR><LF>
Client -> Server: Subject: Test Email
                     Hello world!
                     .
Server -> Client: 250 OK: queued as 12345
Client -> Server: QUIT
Server -> Client: 221 Bye
```

---

## 4. Commandes SMTP principales

| Commande        | Description                       |
| --------------- | --------------------------------- |
| `HELO` / `EHLO` | Présentation du client au serveur |
| `MAIL FROM:`    | Adresse de l’expéditeur           |
| `RCPT TO:`      | Adresse du destinataire           |
| `DATA`          | Commence le corps du message      |
| `QUIT`          | Terminer la session               |
| `AUTH`          | Authentification du client        |

---

## 5. Ports SMTP

| Port | Usage                                                  |
| ---- | ------------------------------------------------------ |
| 25   | Standard (serveur à serveur)                           |
| 465  | SMTP sécurisé SSL (client -> serveur)                  |
| 587  | SMTP sécurisé STARTTLS (client -> serveur, recommandé) |

---

## 6. Sécurisation du SMTP

1. **SSL/TLS** : Chiffrement de la connexion
2. **STARTTLS** : Upgrade d’une connexion non sécurisée vers TLS
3. **Authentification** : LOGIN, PLAIN, CRAM-MD5
4. **SPF / DKIM / DMARC** : validation anti-spam côté serveur destinataire

---

## 7. SMTP avec PHP

### 7.1 Fonction `mail()`

```php
mail($to, $subject, $message, $headers);
```

* Simple mais limité
* Utilise le **sendmail_path** du serveur (souvent relié à `msmtp`)

### 7.2 Avec PHPMailer ou SwiftMailer

* Permet connexion **SMTP authentifiée**
* Supporte **TLS / SSL**
* Contrôle complet des en-têtes, pièces jointes, HTML

Exemple PHPMailer :

```php
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'tonemail@gmail.com';
$mail->Password = 'motdepasse';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->setFrom('tonemail@gmail.com', 'Camagru');
$mail->addAddress('destinataire@example.com');
$mail->Subject = 'Test SMTP';
$mail->Body    = 'Hello world!';
$mail->send();
```

---

## 8. Bonnes pratiques SMTP

* Utiliser **SMTP authentifié** pour éviter d’être considéré comme spam
* Toujours sécuriser la connexion avec **TLS/SSL**
* Ne jamais stocker les mots de passe en clair dans le repo
* Tester les emails avec un serveur de test avant la prod
* Configurer SPF, DKIM, DMARC pour fiabilité

---

## 9. Résumé

* SMTP = protocole standard pour **envoyer** des emails
* Ports : 25, 465, 587
* Authentification et sécurité essentielles
* Côté PHP, msmtp ou PHPMailer sont utilisés pour envoyer des mails via SMTP
* Recommandation : **SMTP avec TLS sur port 587** pour les applications modernes

---

✍️ **Fin du cours SMTP**
