# Daemon
---

Un **daemon** est un processus informatique qui tourne en arrière-plan, sans interface directe avec l’utilisateur.  

Il reste actif tout le temps ou jusqu’à ce qu’on l’arrête, prêt à répondre à des demandes ou à exécuter des tâches automatiquement.

---

## Pourquoi "daemon" pour Docker ?

Dans Docker Engine, le **daemon** (appelé aussi `dockerd`) est le service serveur qui gère les conteneurs.  
Il fonctionne en continu, en arrière-plan, pour recevoir les commandes du client Docker CLI et exécuter les actions correspondantes (lancer un conteneur, construire une image, etc.).

---

### En résumé simple

- Le terme *daemon* vient de l’informatique classique (et un peu de la mythologie grecque où un "daemon" est une sorte d’esprit invisible qui fait son travail sans qu’on le voie).  
- Ici, ça signifie simplement : **un programme qui tourne tout le temps en arrière-plan, prêt à répondre aux requêtes.**
