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
  `/windows`

- Pour quitter une fenêtre (par exemple quitter un salon) :  
  `/part #channel`

---

## Installation d’Irssi (Debian/Ubuntu)

```bash
sudo apt update
sudo apt install irssi

