# Flux
---

En informatique, un **flux** (*stream*) désigne un ensemble ordonné de données qui circulent entre un **émetteur** et un **récepteur**, généralement de manière **continue** ou **séquentielle**.  

Ce concept est utilisé dans de nombreux domaines :  
- **Entrées/sorties (E/S)**,  
- **Communication réseau**,  
- **Traitement multimédia**,  
- **Gestion de fichiers**.  

---

## Caractéristiques d’un flux

Un flux présente généralement les propriétés suivantes :

- **Séquentiel** : Les données sont lues ou écrites dans un ordre précis.  
- **Unidirectionnel ou bidirectionnel** :  
  - Flux d'entrée → lecture de données (ex : clavier, réseau, fichier).  
  - Flux de sortie → écriture de données (ex : console, fichier, socket).  
  - Flux bidirectionnels → lecture/écriture (ex : sockets réseau).  
- **Bufferisation** :  
  - **Bufferisé** : Stocké temporairement en mémoire avant traitement.  
  - **Non bufferisé** : Traité immédiatement.  

---

## Types de flux en informatique

### 1/ Flux d'entrée/sortie standard

- **Entrée standard (`stdin`)** : données lues depuis le clavier (ou fournies par un autre programme).  
- **Sortie standard (`stdout`)** : données affichées sur l’écran ou redirigées vers un autre programme/fichier.  
- **Sortie d’erreur (`stderr`)** : messages d'erreur affichés séparément de la sortie standard.  

---

### 2/ Flux de fichiers

Un fichier est un type de flux où les données sont **stockées** et accessibles en **lecture** et/ou **écriture**.

---

### 3/ Flux réseau

Un flux réseau permet la **communication entre machines** via des **sockets**, utilisés dans les protocoles comme **HTTP**, **TCP**, **UDP**.

---

### 4/ Flux multimédia

Un flux multimédia est une **transmission continue de données**, utilisée dans :  
- Le **streaming vidéo** (Netflix, YouTube).  
- La **diffusion audio** (Spotify, radios en ligne).  

**Exemple :** Le protocole **RTSP** (*Real-Time Streaming Protocol*) gère le flux vidéo entre un serveur et un client.

---

### 5/ Flux de traitement de données

Certains programmes traitent des flux de données **en continu**, comme :  
- Les **pipelines de données**.  
- Le **traitement de logs en temps réel**.
