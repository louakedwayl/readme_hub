# Introduction à IRC et Irssi

## Qu'est-ce que l'IRC ?

**IRC** (Internet Relay Chat) est un protocole de communication textuelle en temps réel, conçu pour permettre à plusieurs utilisateurs d’échanger des messages dans des salons appelés *channels*, ou en privé.

- Créé dans les années 1980, IRC reste utilisé pour la discussion en groupe, le support technique, les communautés.
- Basé sur un modèle **client-serveur** : les utilisateurs se connectent à des serveurs IRC, qui gèrent les salons et les messages.
- Les salons sont publics (ou privés), et les utilisateurs peuvent aussi envoyer des messages directs.

---

## Architecture d’IRC

- **Serveur IRC** :  
  - Héberge les salons (channels).  
  - Gère les connexions des clients.  
  - Transmet les messages entre clients.

- **Client IRC** :  
  - Logiciel utilisé par l’utilisateur pour se connecter au serveur IRC.  
  - Envoie et reçoit les messages.  
  - Permet de rejoindre des salons, chatter, etc.

---

## Ports et adresses

- Par défaut, les serveurs IRC utilisent le port **6667** pour les connexions TCP non sécurisées.
- Certains serveurs peuvent utiliser d’autres ports (comme 6666, 7000, ou des ports sécurisés TLS 6697).
- Un nom de domaine peut pointer vers plusieurs serveurs IRC avec différentes IP et ports.

---

## Exemples de clients IRC

| Client    | Interface       | Description                          |
| --------- | --------------- | ---------------------------------- |
| **Irssi** | Terminal (CLI)  | Léger, puissant, idéal pour script |
| WeeChat   | Terminal (CLI)  | Très personnalisable               |
| HexChat   | Graphique (GUI) | Facile à utiliser                  |
| Pidgin    | Graphique (GUI) | Multi-protocoles (IRC + autres)   |

---

## Fonctionnement de base d’Irssi

Irssi est un client IRC en ligne de commande qui organise la communication et l’affichage en **fenêtres**. Voici ce qu’il faut comprendre :

- **Connexion(s) serveur** :  
  Tu peux te connecter à plusieurs serveurs IRC en même temps. Chaque connexion est gérée indépendamment.

- **Fenêtres (windows)** :  
  Irssi gère chaque salon (channel), conversation privée, et même la console serveur dans une fenêtre distincte.  
  Tu passes de fenêtre en fenêtre pour suivre plusieurs discussions.

- **Commandes** :  
  Toutes les actions (connexion, rejoindre un salon, envoyer un message) se font via des commandes commençant par `/`.

- **Statuts** :  
  Irssi affiche les messages normaux, les messages de statut (join, part, nick change), et les alertes dans chaque fenêtre.

- **Nick et identités** :  
  Tu choisis un pseudo (nick) par serveur. Tu peux changer ce pseudo en cours de route.

- **Logs et scripts** :  
  Irssi peut enregistrer les conversations dans des fichiers logs et s’étendre via des scripts Perl.

---

### Navigation dans Irssi

- Pour changer de fenêtre :  
  `/window <numéro>` ou raccourcis clavier `Alt + numéro` (exemple Alt+1, Alt+2...)

- Pour voir la liste des fenêtres :  
  `/windows list`

- Pour quitter une fenêtre (par exemple quitter un salon) :  
  `/part #channel`

---

# Commandes de base dans Irssi

Irssi est entièrement contrôlé par des commandes tapées dans le terminal, toujours précédées par un `/`. Voici les commandes indispensables à connaître pour bien démarrer.

---

## Connexion et déconnexion

- `/connect <serveur> [port]`  
  Se connecter à un serveur IRC.  
  Exemple : `/connect irc.libera.chat 6667`

- `/disconnect [raison]`  
  Se déconnecter du serveur courant. Le paramètre `raison` est optionnel.

- `/quit [message]`  
  Quitter Irssi complètement et fermer toutes les connexions.  
  Exemple : `/quit Bye!`

---

## Gestion des salons (channels)

- `/join #nom_du_salon`  
  Rejoindre un salon IRC.  
  Exemple : `/join #42`

- `/part [#nom_du_salon] [message]`  
  Quitter un salon. Si tu ne précises pas le salon, ça quitte la fenêtre active.  
  Exemple : `/part #42 À plus`

- `/list`  
  Liste les salons disponibles sur le serveur.

---

## Messages

- Pour envoyer un message dans un salon, tape simplement ton texte dans la fenêtre du salon et appuie sur Entrée.

- `/msg <pseudo> <message>`  
  Envoyer un message privé à un utilisateur.  
  Exemple : `/msg wlouaked Salut !`

- `/notice <pseudo> <message>`  
  Envoyer un message type "notice" à un utilisateur (message moins intrusif).

---

## Gestion du pseudo (nick)

- `/nick <nouveau_pseudo>`  
  Change ton pseudo sur le serveur.  
  Exemple : `/nick Wayl`

---

## Fenêtres et navigation

- `/windows`  
  Affiche la liste des fenêtres ouvertes.

- `/window <numéro>`  
  Change de fenêtre en donnant son numéro.  
  Exemple : `/window 2`

- Raccourcis clavier pour changer de fenêtre : `Alt + numéro` (ex : Alt+1, Alt+2).

- `/topic [#channel]`  
  Affiche ou change le sujet d’un salon.

---

## Informations sur le serveur et utilisateurs

- `/whois <pseudo>`  
  Affiche les informations sur un utilisateur.

- `/server`  
  Affiche le serveur IRC actuellement connecté.

---

## Autres commandes utiles

- `/help [commande]`  
  Affiche l’aide sur une commande spécifique.

- `/save`  
  Sauvegarde la configuration actuelle (serveurs, nicks, etc.).

- `/reload`  
  Recharge la configuration sans quitter Irssi.

---

## Exemple de session rapide

```bash
/connect irc.libera.chat
/join #42
/msg wlouaked Salut, ça va ?
/nick Wayl
/part #42
/quit


