# Commande `ping`

## 🧠 Définition

`ping` est une commande réseau utilisée pour tester la connectivité entre deux machines.
Elle permet de vérifier si une machine est accessible sur le réseau.

Elle repose sur le protocole ICMP (Internet Control Message Protocol).

---

## 🎯 Objectif

- Vérifier si un serveur ou une machine répond
- Mesurer le temps de réponse (latence)
- Détecter des problèmes réseau simples

---

## ⚙️ Fonctionnement

1. Envoi d'une ICMP Echo Request
2. Réception d'une ICMP Echo Reply
3. Mesure du temps entre les deux

---

## 💻 Utilisation

```bash
ping google.com
```

---

## 📊 Informations affichées

- Adresse IP
- Temps de réponse
- Paquets envoyés / reçus
- Pertes de paquets

---

## 🧱 Couche réseau

`ping` fonctionne à la couche 3 (Réseau) du modèle OSI.

---

## ⚠️ Limites

- Peut être bloqué
- Ne teste pas les services (HTTP, etc.)

---

## 🧠 À retenir

- Teste la connectivité
- Utilise ICMP
- Mesure la latence
