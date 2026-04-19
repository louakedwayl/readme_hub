# Modèle OSI (Open Systems Interconnection)

## 🧠 Définition

Le **modèle OSI** est un modèle théorique qui permet de comprendre comment les données circulent sur un réseau.  
Il découpe la communication en **7 couches**, chacune ayant un rôle précis.

L’objectif est de **standardiser** les échanges entre systèmes.

---

## 🧱 Les 7 couches du modèle OSI

### 1. Physique
Transmet les bits sous forme de signaux (électriques, optiques…).

### 2. Liaison de données
Assure la communication entre machines sur un même réseau local.

### 3. Réseau
Permet de faire circuler les données entre différents réseaux (routage, IP).

### 4. Transport
Gère le transport des données de bout en bout (fiabilité, segmentation).

### 5. Session
Gère l’ouverture, la gestion et la fermeture des sessions de communication.

### 6. Présentation
S’occupe du format des données (encodage, chiffrement, compression).

### 7. Application
Interface directe avec l’utilisateur (protocoles comme HTTP, DNS…).

---

## 🔄 Fonctionnement global

Quand une donnée est envoyée :
- Elle **descend les couches** côté émetteur (7 → 1)
- Elle est transmise sur le réseau
- Puis elle **remonte les couches** côté récepteur (1 → 7)

Chaque couche ajoute ou lit des informations.

---

## ⚡ À retenir

- Le modèle OSI contient **7 couches**
- Chaque couche a un rôle spécifique
- Il sert à **comprendre et organiser les communications réseau**
- C’est un modèle **théorique**, mais très utilisé pour apprendre

---

## 🧠 Astuce de mémorisation

**PLRTSPA**  
→ Physique, Liaison, Réseau, Transport, Session, Présentation, Application
