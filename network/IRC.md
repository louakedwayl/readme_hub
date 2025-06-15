# Cours sur IRC (Internet Relay Chat)

## Qu'est-ce que IRC ?

IRC est un protocole de communication texte en temps réel, permettant à plusieurs utilisateurs de discuter simultanément dans des salons (channels) ou en privé.

---

## Comment fonctionne IRC ?

IRC repose sur un modèle **client-serveur** :

- **Serveur IRC** : C’est une machine qui accepte les connexions des clients, gère les salons, les utilisateurs, et relaie les messages.
- **Client IRC** : Logiciel utilisé par l’utilisateur pour se connecter au serveur, envoyer et recevoir des messages.

### Déroulement d’une session IRC

1. Le client établit une connexion TCP avec le serveur (par défaut sur le port 6667 ou 6697 pour SSL).
2. Le client choisit un pseudo (nick) unique sur le serveur.
3. Le client rejoint un ou plusieurs salons (channels), chacun identifié par un nom commençant souvent par `#`.
4. Le serveur relaie les messages envoyés par les clients vers tous les utilisateurs présents dans le même salon.
5. Les utilisateurs peuvent aussi s’envoyer des messages privés.
6. La connexion reste ouverte tant que l’utilisateur ne quitte pas (`/quit`) ou que la connexion est interrompue.

### Protocole simple et textuel

- Les échanges sont des lignes de texte terminées par `\r\n`.
- Les commandes clients commencent par `/` et sont traduites en messages texte selon le protocole.
- Le serveur répond avec des messages de statut, erreurs, ou diffusion des messages des autres utilisateurs.

---

## Principes de base

- **Serveur IRC** : machine qui gère les salons et utilisateurs.
- **Client IRC** : logiciel qui se connecte au serveur.
- **Salon (channel)** : espace de discussion, souvent préfixé par `#`.
- **Nick (pseudo)** : identifiant d'un utilisateur.
- **Message privé** : discussion directe entre deux utilisateurs.

---

## Commandes IRC essentielles

### Gestion des salons

- `/join #salon` : rejoindre un salon  
  Exemple : `/join #42`

- `/part #salon` : quitter un salon  
  Exemple : `/part #42`

- `/list` : lister tous les salons disponibles

- `/topic #salon [nouveau sujet]` : afficher ou changer le sujet d'un salon  
  Exemple : `/topic #42 Discussion C++`

### Gestion des utilisateurs

- `/nick nouveau_pseudo` : changer de pseudo  
  Exemple : `/nick Wayl`

- `/msg pseudo message` : envoyer un message privé à un utilisateur  
  Exemple : `/msg Ninja42 Salut !`

- `/who #salon` : voir les utilisateurs connectés à un salon  
  Exemple : `/who #42`

- `/invite pseudo #salon` : inviter un utilisateur dans un salon

- `/kick #salon pseudo [raison]` : expulser un utilisateur d'un salon (si autorisé)

### Connexion et déconnexion

- `/connect serveur [port]` : se connecter à un serveur IRC  
  Exemple : `/connect irc.freenode.net 6667`

- `/quit [message]` : quitter IRC avec un message optionnel  
  Exemple : `/quit À plus tard !`

---

## Syntaxe des commandes

- Toutes les commandes commencent par un slash `/`.
- Les noms de salons commencent par `#`.
- Les pseudos sont sensibles à la casse.
- Les messages envoyés sans slash sont diffusés dans le salon actif.

---

## Exemple de session IRC

```bash
/nick Wayl
/join #42
/msg Ninja42 Salut, tu es là ?
/topic #42 Discussion C++ avancée
/part #42
/quit Bye !

