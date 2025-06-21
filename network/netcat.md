# Netcat (`nc`) – Le couteau suisse du réseau

## 🔍 Introduction

**Netcat** (ou `nc`) est un outil en ligne de commande permettant de lire ou d’écrire des données à travers des connexions réseau en utilisant les protocoles TCP ou UDP.

C’est un utilitaire très puissant utilisé en :
- Développement réseau
- Débogage réseau
- Tests de connectivité
- Transfert de fichiers
- Pentesting

---

## ⚙️ Installation

### 🔹 Debian/Ubuntu
```bash
sudo apt install netcat
```

# 🛠️ Fonctions principales

## 🔸 Connexion à un serveur (mode client TCP)
```bash
nc <adresse_ip> <port>
```

Exemple :
```bash
nc 127.0.0.1 4242
```
🔸 Écoute sur un port (mode serveur TCP)
```bash
nc -l <port>
```
Exemple :
```bash
nc -l 4242
```
## 🔸 Transfert de fichier
▪️ Serveur (réception)
```bash
nc -l 4242 > fichier_recu.txt
```
▪️ Client (envoi)
```bash
nc <adresse_ip> 4242 < fichier.txt
```
🔸 Scanner de ports (basiquement)
```bash
nc -zv <ip> <port_start>-<port_end>
```
Exemple :
```bash
nc -zv 192.168.1.1 20-80
```
🧠 Cas d’usage pratique : test de serveur IRC

    Lancer ton serveur IRC (ex : port 6667)

    Se connecter avec nc :
```bash
nc 127.0.0.1 6667
```
    Envoyer des commandes IRC :
```irc
NICK Wayl
USER Wayl 0 * :Wayl
```

### 🚨 Attention

    nc ne chiffre pas les données.

    Ne pas utiliser sur des machines en production sans précautions.

    Certains systèmes remplacent nc par ncat (version améliorée par Nmap).

### 📚 Commandes utiles
| Commande              | Description                                   |
|-----------------------|-----------------------------------------------|
| `nc -l <port>`        | Écoute sur un port                            |
| `nc <ip> <port>`      | Connexion à une IP/port                       |
| `nc -zv <ip> <range>` | Scan de ports                                 |
| `nc -u <ip> <port>`   | Mode UDP                                      |
| `nc -l -p <port>`     | Mode écoute avec port (anciennes versions)    |

## Résumé

| Action           | Commande                      |
|------------------|------------------------------|
| Connexion client | `nc 127.0.0.1 4242`          |
| Serveur simple   | `nc -l 4242`                 |
| Envoyer fichier  | `nc <ip> 4242 < fichier.txt` |
| Recevoir fichier | `nc -l 4242 > fichier_recu.txt` |
| Scan ports       | `nc -zv 192.168.1.1 20-80`   |


## Conclusion

nc est un outil essentiel pour tout développeur réseau ou sysadmin.
Simple, léger, mais extrêmement puissant, il permet de tester rapidement et comprendre ce qui se passe sur le réseau.
