# Les Zones DNS

Une zone DNS est un espace de configuration qui contient tous les enregistrements pour un domaine sur Internet. Elle détermine où les utilisateurs et les services trouvent ton site web, tes emails et d'autres services.

---

## 1. Qu'est-ce qu'une zone DNS ?

- Une zone DNS regroupe tous les records (enregistrements) d'un domaine et de ses sous-domaines.
- Chaque record indique une instruction au réseau Internet : "va ici pour le site web", "envoie les emails là", etc.

---

## 2. Structure d'une zone DNS

Chaque enregistrement d'une zone DNS comporte généralement :

| Champ  | Description                                                          |
| ------ | -------------------------------------------------------------------- |
| Nom    | Le sous-domaine ou le domaine principal                              |
| TTL    | Temps (en secondes) pendant lequel les serveurs peuvent mettre en cache ce record |
| Type   | Type d'enregistrement (A, AAAA, CNAME, MX, TXT, NS…)               |
| Valeur | L'information associée (IP, serveur mail, alias, texte…)            |

---

## 3. Types principaux de records DNS

### 3.1 Record A

Associe un domaine à une adresse **IPv4**.

### 3.2 Record AAAA

Associe un domaine à une adresse **IPv6**.

### 3.3 Record CNAME

Crée un **alias** vers un autre nom de domaine.

### 3.4 Record MX

Définit les serveurs qui reçoivent les **emails** pour le domaine. Chaque record MX a une **priorité** : le plus petit numéro est essayé en premier.

### 3.5 Record TXT

Contient des informations textuelles pour vérification ou sécurité (ex : SPF pour email).

### 3.6 Record NS

Indique les **serveurs DNS autorisés** pour la zone.

### 3.7 Record CAA (optionnel)

Permet de limiter qui peut émettre un **certificat SSL** pour le domaine.

---

## 4. TTL (Time To Live)

- Définit combien de temps un record peut être mis en cache par les serveurs DNS.
- `0` = pas de cache → toutes les requêtes vont directement sur le serveur DNS (ralentit la résolution).
- **Recommandation** : `3600` secondes (1 heure) ou plus.

---

## 5. Bonnes pratiques

1. Assurer que les records A/AAAA sont corrects pour le site et les sous-domaines.
2. Supprimer les records inutiles pour réduire la complexité et la surface d'attaque.
3. Configurer les MX et SPF si le domaine reçoit des emails.
4. Ajouter un record CAA pour sécuriser les certificats SSL.
5. Mettre un TTL raisonnable, ni `0`, ni trop long.
6. Vérifier régulièrement la zone DNS pour éviter des records obsolètes ou incorrects.

---

## 6. Résumé visuel simple

```
Nom                  → Type  → Valeur
sub.example.com      → A     → 192.0.2.1
www.example.com      → CNAME → example.com
example.com          → MX    → mail.example.com (priorité 10)
example.com          → TXT   → "v=spf1 include:_spf.example.com ~all"
example.com          → NS    → ns1.fournisseur-dns.com
```

| Type   | Fonction                       |
| ------ | ------------------------------ |
| A/AAAA | Adresse serveur web            |
| CNAME  | Alias d'un autre domaine       |
| MX     | Serveur mail                   |
| TXT    | Informations supplémentaires   |
| NS     | Serveurs DNS autorisés         |
| CAA    | Contrôle certificat SSL        |
