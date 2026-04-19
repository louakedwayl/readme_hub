# Protocole ICMP (Internet Control Message Protocol)

## 🧠 Définition

ICMP est un protocole utilisé pour **envoyer des messages de contrôle et de diagnostic** sur un réseau.  
Il permet aux machines de **communiquer des informations sur l’état du réseau**.

Il est étroitement lié au protocole IP.

---

## 🎯 Objectif

- Signaler des erreurs réseau
- Vérifier la connectivité entre machines
- Aider au diagnostic (debug réseau)

---

## ⚙️ Fonctionnement

ICMP envoie des **messages spéciaux** entre machines.

Exemples :
- **Echo Request / Echo Reply** → utilisé par `ping`
- **Destination Unreachable** → machine inaccessible
- **Time Exceeded** → délai dépassé (TTL)

Ces messages sont **encapsulés dans des paquets IP**.

---

## 🧱 Position dans le réseau

ICMP fonctionne à la **couche 3 (Réseau)** du modèle OSI, comme IP.

👉 Mais :
- ICMP **dépend de IP pour être transporté**
- Il ne fonctionne jamais seul

---

## 💻 Commandes associées

- `ping` → utilise ICMP pour tester la connectivité
- `traceroute` → utilise ICMP ou UDP selon les cas

---

## ⚠️ Limites

- Peut être bloqué par un firewall
- Ne garantit pas que les services fonctionnent (ex : HTTP)
- Sert uniquement au diagnostic, pas au transport de données utilisateur

---

## 🧠 À retenir

- ICMP = protocole de **contrôle et diagnostic**
- Utilisé par `ping`
- Fonctionne avec IP (encapsulation)
- Couche 3 du modèle OSI
