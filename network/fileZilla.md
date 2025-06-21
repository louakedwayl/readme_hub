# Introduction à FileZilla et au transfert FTP

---

## 1/ Qu’est-ce que FileZilla ?

FileZilla est un logiciel client FTP (File Transfer Protocol) qui permet de transférer des fichiers entre ton ordinateur et un serveur distant (ex : serveur web).  
Il est gratuit, open-source, et supporte plusieurs protocoles de transfert.

---

## 2/ Pourquoi utiliser FileZilla ?

- Déployer un site web sur un hébergement distant  
- Transférer rapidement des fichiers vers un serveur ou cloud privé  
- Administrer un serveur à distance via FTP/SFTP  
- Gérer les fichiers d'un serveur sans interface graphique

---

## 3/ Protocoles supportés

- **FTP** : protocole standard (non chiffré)  
- **FTPS** : FTP sécurisé avec SSL/TLS  
- **SFTP** : FTP via SSH (plus sécurisé)

---

## 4/ Installation de FileZilla

✅ Sur Windows, macOS, Linux :  
- Va sur [filezilla-project.org](https://filezilla-project.org)  
- Télécharge FileZilla Client  
- Installe-le normalement  
⚠ Ne pas confondre avec FileZilla Server (pour hébergement local)

---

## 5/ Interface de FileZilla (Client)

- **Haut** : Champs connexion rapide (hôte, utilisateur, mot de passe, port)  
- **Gauche** : Arborescence fichiers locaux  
- **Droite** : Arborescence fichiers distants  
- **Bas** : File d’attente des transferts (en cours, réussis, échoués)

---

## 6/ Connexion à un serveur

### A. Connexion rapide

- Ouvre FileZilla  
- Remplis en haut :  
  - Hôte (ex : ftp.monsite.com)  
  - Nom d’utilisateur (ex : admin)  
  - Mot de passe  
  - Port (souvent 21 FTP, 22 SFTP)  
- Clique sur **Connexion rapide**

### B. Gestionnaire de sites

- Menu **Fichier > Gestionnaire de sites**  
- Clique sur **Nouveau site**  
- Renseigne les infos FTP/SFTP de ton hébergeur  
- Clique sur **Connexion**

---

## 7/ Transférer des fichiers

- Pour envoyer : glisse un fichier du panneau gauche (local) vers le droit (serveur)  
- Pour télécharger : fais l’inverse  
- Ou clic droit > Télécharger / Envoyer

---

## 8/ Conseils pratiques

- Vérifie les droits d’accès au serveur  
- Utilise **SFTP** de préférence (sécurité)  
- Ne transfère pas trop de fichiers lourds en même temps  
- Vérifie toujours la file de transfert pour détecter les erreurs

---

## 9/ Cas d’usage typique

Tu développes un site web HTML/CSS sur ton ordi :  
- Crée un compte chez un hébergeur (OVH, Infomaniak, Alwaysdata…)  
- Reçois les identifiants FTP  
- Ouvre FileZilla, connecte-toi  
- Transfère les fichiers dans `/www` ou `/public_html`  
- Ton site est en ligne 🎉

---

## 10/ Résumé

| Élément         | Description                            |
|-----------------|-------------------------------------|
| FileZilla       | Client FTP pour transférer des fichiers |
| Protocoles      | FTP, FTPS, SFTP                     |
| Utilisation     | Déploiement, administration serveur |
| Connexion       | Rapide ou via gestionnaire de sites |
| Transfert       | Glisser-déposer, clic droit          |
| Sécurité conseillée | Utiliser SFTP si possible          |
