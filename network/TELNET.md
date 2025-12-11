# Telnet

## 1. Qu'est-ce que Telnet ?

Telnet est un **protocole réseau** qui permet de se connecter à distance à un serveur pour exécuter des commandes.

- **Protocole** : TCP
- **Port par défaut** : 23
- **Utilité** : Administration à distance, test de connectivité ou de services réseau
- **Sécurité** : **Non sécurisé** (tout est envoyé en clair, mots de passe inclus)

---

## 2. Historique

- Développé dans les années 1969-1970 pour accéder à des ordinateurs à distance
- Très utilisé dans les années 80-90 pour l'administration de serveurs
- Aujourd'hui remplacé par **SSH** pour des raisons de sécurité

---

## 3. Fonctionnement

Telnet fonctionne en **mode texte** :

1. L'utilisateur ouvre une connexion vers un serveur Telnet
2. Il s'authentifie (nom d'utilisateur + mot de passe)
3. Il peut exécuter des commandes sur le serveur comme s'il était en local

### Exemple de connexion depuis un terminal

```bash
telnet example.com 23
```

- `example.com` : adresse du serveur
- `23` : port Telnet (par défaut)

---

## 4. Commandes de base

Une fois connecté via Telnet, on peut :

- Lister des fichiers, vérifier des services ou envoyer des commandes au serveur
- Tester des ports :

```bash
telnet example.com 80
```

- Si la connexion fonctionne, le port est ouvert
- Sinon, le port est fermé ou filtré

---

## 5. Limites et sécurité

- **Tout est en clair** : les mots de passe et données peuvent être interceptés
- **Non recommandé en production**
- Pour un accès sécurisé, utiliser **SSH (Secure Shell)**

---

## 6. Comparaison Telnet vs SSH

| Protocole | Port | Chiffrement | Sécurité |
|-----------|------|-------------|----------|
| Telnet    | 23   | Non         | Faible   |
| SSH       | 22   | Oui         | Élevée   |

---

## 7. Utilisations modernes

- Tester la connectivité d'un port réseau (`telnet host port`)
- Dépannage de services réseau (SMTP, HTTP, POP3)
- **Ne plus l'utiliser pour administrer des serveurs en production** → préférer SSH

---

## 8. Résumé

- **Telnet** = protocole de connexion à distance en texte clair
- **Obsolète** pour l'administration sécurisée
- Utilisé aujourd'hui principalement pour **tester des ports** ou la **connectivité réseau**
