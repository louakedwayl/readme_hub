# Types de Cookies en Web

Les cookies sont de petits fichiers stockés par le navigateur pour échanger des informations entre le client (navigateur) et le serveur.  
Ils peuvent être **temporaires (session)** ou **persistants** selon la configuration.

---

## 1. Cookies de session (Session Cookies)

- **Définition** : Cookies temporaires créés sans attribut `Expires` ou `Max-Age`.  
- **Stockage** : En mémoire du navigateur uniquement.  
- **Durée de vie** : Supprimés automatiquement à la fermeture du navigateur.  
- **Usage typique** :
  - Sessions d’authentification (ex. connexion à un site).
  - Suivi temporaire de navigation.

---

## 2. Cookies persistants (Persistent Cookies)

- **Définition** : Cookies définis avec un attribut `Expires` ou `Max-Age`.  
- **Stockage** : Sur le disque du navigateur.  
- **Durée de vie** : Conservent leur valeur après redémarrage du navigateur, jusqu’à la date d’expiration.  
- **Usage typique** :
  - Mémorisation de préférences (langue, thème).
  - Connexions automatiques (“Se souvenir de moi”).

---

## 3. Cookies HttpOnly

- **Définition** : Cookies créés avec l’attribut `HttpOnly`.  
- **Accessibilité** : 
  - **Non accessibles** par JavaScript (`document.cookie`).  
  - Envoyés uniquement au serveur dans les requêtes HTTP/HTTPS.  
- **Usage typique** :
  - Cookies de session sécurisés (authentification, tokens).  
- **Avantage** : Protection contre le vol de cookie via XSS.

---

## 4. Cookies Secure

- **Définition** : Cookies créés avec l’attribut `Secure`.  
- **Transmission** : Ne sont envoyés que via des connexions **HTTPS** (jamais en HTTP).  
- **Usage typique** :
  - Renforcer la sécurité des cookies sensibles.

---

## Résumé

| Type               | Persistance       | Accessible en JS | Sécurité |
|--------------------|------------------|-----------------|----------|
| **Session**        | Jusqu’à la fermeture du navigateur | Oui (sauf `HttpOnly`) | Faible |
| **Persistant**     | Jusqu’à la date d’expiration       | Oui (sauf `HttpOnly`) | Moyen |
| **HttpOnly**       | Session ou persistant             | ❌ Non                 | Élevée |
| **Secure**         | Session ou persistant             | Oui (sauf `HttpOnly`) | Haute (HTTPS) |

---
