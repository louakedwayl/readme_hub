# SSH – Secure Shell

---

## 1/ Définition :

SSH (Secure Shell) est un protocole sécurisé utilisé pour :  
- Se connecter à un système distant via terminal (CLI)  
- Transférer des fichiers de manière sécurisée (scp, sftp)  
- Exécuter des commandes à distance  
- Créer des tunnels chiffrés (port forwarding)  

> CLI (Command Line Interface) : interaction par commandes texte, sans interface graphique.  

SSH chiffre toutes les données pour éviter interceptions ou attaques "man-in-the-middle".

---

## 2/ Fonctionnement général :

### a/ Architecture Client / Serveur :

- Client SSH : envoie la demande de connexion (commande `ssh`)  
- Serveur SSH : écoute sur le port 22 (par défaut), gère l’authentification  

[Client] --connexion SSH--> [Serveur distant]


### b/ Authentification :

Deux méthodes principales :  
- **Mot de passe** : moins sûr, demande saisie à chaque connexion  
- **Clé publique/privée** : recommandée, plus sécurisée  

Fonctionnement des clés :  
- Génère clé privée (`~/.ssh/id_rsa`) et clé publique (`~/.ssh/id_rsa.pub`)  
- Place la clé publique sur le serveur dans `~/.ssh/authorized_keys`  
- Seule la clé privée peut déchiffrer la connexion → seul toi peux te connecter

---

## 3/ Commandes principales :

### a/ Se connecter à un serveur :

```bash
ssh user@host
```
Exemple :
```bash
ssh wayl@192.168.1.50
```
### b/ Copier un fichier via SSH (SCP) :
```bash
scp fichier.txt user@host:/chemin/
```
### c/ Tunnel SSH (port forwarding) :
```bash
ssh -L 8080:localhost:80 user@host
```
Permet d’accéder localement au port 80 du serveur via ton port 8080.

## 4/ Générer une paire de clés
```bash
ssh-keygen
```
Copier la clé publique sur un serveur :
```bash
ssh-copy-id user@host
```
## 5/ Sécurité

Préfère les clés SSH aux mots de passe.

Ne partage jamais ta clé privée (id_rsa).

Utilise fail2ban sur le serveur pour bloquer les IP suspectes.

## 6/ Résumé :
| Élément           | Détail                                  |
|-------------------|----------------------------------------|
| Port par défaut    | 22                                     |
| Protocole         | TCP                                    |
| Sécurité          | Chiffrement, authentification par clé  |
| Utilisation       | Connexion distante, transfert de fichiers |
| Outils liés       | ssh, scp, sftp, ssh-keygen, ssh-agent  |
| ssh_config – Client SSH | Configuration du client SSH          |

Fichier :
```bash
/etc/ssh/ssh_config ou ~/.ssh/config (utilisateur)
```

Configure le comportement des connexions SSH sortantes

Exemples d’options :

| Option       | Description                          |
|--------------|------------------------------------|
| Host         | Nom ou motif d'hôte                |
| Port         | Port distant par défaut (souvent 22) |
| User         | Nom utilisateur distant par défaut  |
| IdentityFile | Fichier de clé privée à utiliser    |
| ForwardAgent | Transfert de l’agent SSH            |


Exemple :
```bash
Host vm42
    HostName 127.0.0.1
    Port 4243
    User wayl
```
Puis connecte-toi simplement avec :
```bash
ssh vm42
```
sshd_config – Serveur SSH

Fichier :
```bash
 /etc/ssh/sshd_config
```

Configure le serveur SSH (réception des connexions entrantes)

Exemples d’options :

| Option                 | Description                          |
|------------------------|------------------------------------|
| Port                   | Port d’écoute (ex: 22 ou 4242)     |
| PermitRootLogin        | Autoriser ou non root à se connecter|
| PasswordAuthentication | Autoriser ou non les mots de passe  |
| AllowUsers             | Qui peut se connecter               |
| UsePAM                 | Utiliser PAM pour authentification  |

---

| Fichier      | Rôle    | Utilisé par | Direction                      |
|--------------|---------|-------------|-------------------------------|
| ssh_config   | Client  | ssh         | Tu → une autre machine         |
| sshd_config  | Serveur | sshd        | Une autre machine → toi        |

