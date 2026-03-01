# Les enregistrements CNAME en DNS

Un CNAME (Canonical Name Record) est un type d'enregistrement DNS qui permet de créer un alias d'un autre nom de domaine. Il sert à rediriger un sous-domaine vers un autre nom de domaine sans avoir à gérer directement son adresse IP.

---

## 1. Définition

- CNAME signifie **Canonical Name**.
- Il associe un nom de domaine (alias) à un autre nom de domaine (le canonique).
- Toute requête vers l'alias est automatiquement redirigée vers le domaine canonique, qui fournit l'adresse IP via son record A ou AAAA.

---

## 2. Fonctionnement

1. Un utilisateur demande l'IP d'un sous-domaine alias (ex : `alias.example.com`).
2. Le serveur DNS voit que c'est un CNAME → il renvoie le domaine canonique (ex : `www.example.com`).
3. Le client refait une requête DNS pour le domaine canonique et obtient l'IP réelle.

**Résumé :**

- CNAME ne fournit pas directement une IP.
- Il renvoie un **nom de domaine**, qui sera ensuite résolu via A/AAAA.

---

## 3. Utilisations courantes

- Rediriger plusieurs sous-domaines vers le même domaine principal.
- Simplifier la gestion DNS lorsqu'un domaine change d'IP fréquemment.
- Créer des alias pour services externes (ex : hébergement cloud, CDN).

---

## 4. Règles importantes

1. Un CNAME **ne peut pas coexister** avec d'autres records du même nom (A, MX, TXT, etc.).
2. Le CNAME doit toujours pointer vers un **nom de domaine valide**, jamais directement vers une IP.
3. Les CNAMEs peuvent être chaînés, mais chaque chaîne ajoute une résolution DNS supplémentaire (ralentissement possible).

---

## 5. Exemple général

| Alias              | Type  | Cible                  |
| ------------------ | ----- | ---------------------- |
| blog.example.com   | CNAME | www.example.com        |
| shop.example.com   | CNAME | ecommerce.example.net  |

- Ici, `blog.example.com` et `shop.example.com` sont des alias.
- Quand un client demande l'IP de `blog.example.com`, le DNS renvoie `www.example.com`, puis récupère son A record pour obtenir l'IP.

---

## 6. Bonnes pratiques

1. **Limiter les chaînes de CNAME** → une seule étape est préférable.
2. **Ne pas utiliser pour le domaine racine** (ex : `example.com`) → beaucoup de serveurs DNS n'autorisent pas un CNAME à la racine.
3. **Utiliser pour les sous-domaines** ou les services tiers.
4. **Vérifier** que le domaine canonique a toujours des records A ou AAAA valides.

---

## 7. Résumé

- CNAME = **alias vers un autre domaine**
- Ne contient pas d'adresse IP directement
- Facilite la gestion de plusieurs sous-domaines pointant vers le même serveur ou service
- Respecter les règles pour éviter les conflits et les chaînes trop longues
