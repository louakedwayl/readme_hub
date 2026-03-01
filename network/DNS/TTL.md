# TTL (Time To Live) en DNS

Le TTL, ou Time To Live, est un paramètre important dans le système DNS qui contrôle combien de temps un enregistrement DNS peut être mis en cache par les serveurs et clients avant d'être mis à jour.

---

## 1. Définition

- TTL signifie **Time To Live** (temps de vie).
- Il indique la durée (en secondes) pendant laquelle un record DNS reste valide dans le cache d'un serveur DNS ou d'un client.
- Pendant ce temps, les requêtes DNS n'ont pas besoin de contacter le serveur DNS d'origine pour ce record.

---

## 2. Fonctionnement

1. Un client ou serveur fait une requête DNS pour un domaine (ex : `example.com`).
2. Le serveur DNS retourne l'IP ou le record demandé avec le TTL associé.
3. Tant que le TTL n'est pas écoulé :
   - Le record est mis en cache.
   - Les requêtes suivantes utilisent le cache au lieu de recontacter le serveur DNS.
4. Une fois le TTL écoulé :
   - Le cache expire.
   - Une nouvelle requête est faite vers le serveur DNS d'origine.

---

## 3. Exemple

| Domaine     | Type | Valeur    | TTL (secondes) |
| ----------- | ---- | --------- | --------------- |
| example.com | A    | 192.0.2.1 | 3600            |

- Ici, `3600` secondes = **1 heure**.
- Les serveurs DNS garderont l'adresse `192.0.2.1` en cache pendant 1 heure avant de vérifier à nouveau.

---

## 4. Valeurs courantes de TTL

| Usage                              | TTL recommandé                    |
| ---------------------------------- | --------------------------------- |
| Sites web standard                 | `3600` (1 heure)                  |
| Sites avec changements fréquents d'IP | `300` (5 minutes)              |
| Emails / MX records               | `3600` à `86400` (1 à 24 heures) |
| Records statiques                  | `86400` (24 heures) ou plus       |

**Remarques :**

- TTL trop court → augmente le nombre de requêtes DNS → plus de charge sur le serveur DNS.
- TTL trop long → les changements de configuration mettent du temps à se propager.

---

## 5. Bonnes pratiques

1. **Choisir un TTL équilibré** : ni trop court, ni trop long selon la fréquence de changement du record.
2. **Adapter selon le type de record** :
   - A/AAAA → 1 à 4 heures
   - MX/TXT → 1 à 24 heures
   - CNAME → 1 à 4 heures
3. **Avant un changement important** : réduire le TTL quelques heures ou jours avant pour accélérer la propagation.

---

## 6. Résumé

- Le TTL contrôle la **durée du cache DNS** pour un record.
- Un TTL bien choisi permet un bon équilibre entre **performance** et **rapidité de propagation** des changements.
- Trop court → surcharge DNS
- Trop long → propagation lente des mises à jour
