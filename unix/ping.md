# 📡 La commande `ping` (Unix / Linux)

## 🧠 Définition

La commande `ping` est un outil réseau utilisé pour **tester la connectivité entre deux machines**.

Elle permet de vérifier :
- si une machine est joignable
- combien de temps met un message pour faire l’aller-retour (latence)
- si des paquets sont perdus

---

## ⚙️ Principe de fonctionnement

`ping` envoie des **requêtes ICMP (Internet Control Message Protocol)** à une machine cible.

👉 Si la machine répond → la connexion fonctionne  
👉 Si elle ne répond pas → problème réseau ou machine indisponible

---

## 🧪 Utilisation de base

```bash
ping google.com
```

👉 Cela envoie des requêtes en continu vers `google.com`

---

## 📊 Résultat typique

```bash
64 bytes from 142.250.74.14: icmp_seq=1 ttl=117 time=14.2 ms
```

### Interprétation simple :
- `icmp_seq` → numéro du paquet
- `ttl` → durée de vie du paquet
- `time` → temps aller-retour (latence)

---

## ⏹️ Arrêter la commande

Par défaut, `ping` tourne en continu.

👉 Pour arrêter :
```bash
Ctrl + C
```

---

## 🔧 Options utiles

### Limiter le nombre de requêtes
```bash
ping -c 4 google.com
```

👉 Envoie seulement 4 paquets

---

### Changer l’intervalle entre les requêtes
```bash
ping -i 2 google.com
```

👉 1 requête toutes les 2 secondes

---

## 🚨 Cas d’usage

- Vérifier si un site est accessible
- Diagnostiquer un problème réseau
- Tester la latence (important pour les jeux, serveurs, etc.)

---

## ⚠️ Limites

- Une machine peut **bloquer les requêtes ICMP** → `ping` échoue même si elle fonctionne
- Ne donne pas une analyse complète du réseau (juste un test basique)

---

## 🧾 Résumé

`ping` est un outil simple et rapide pour :
- tester la connectivité
- mesurer la latence
- détecter des problèmes réseau basiques
