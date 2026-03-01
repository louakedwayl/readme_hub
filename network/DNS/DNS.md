# DNS — Notes complètes

## 1️⃣ Définition

Le DNS (Domain Name System) est le système qui traduit un nom de domaine en adresse IP.

Exemple :

```
wayl.dev → 185.XX.XX.XX
```

Les humains utilisent des noms. Les machines utilisent des IP. Le DNS est le traducteur.

---

## 2️⃣ Pourquoi le DNS existe ?

Sans DNS, tu devrais taper :

```
http://185.34.12.88
```

au lieu de :

```
http://wayl.dev
```

Impossible à retenir à grande échelle.

---

## 🧠 3️⃣ Comment fonctionne une requête DNS ?

Étapes quand quelqu'un tape `wayl.dev` :

```
1. Browser
2. DNS Resolver (FAI / Cloudflare / Google)
3. Serveur DNS autoritaire
4. Réponse avec IP
5. Connexion au VPS
```

### 📌 Détail du flow

```
Navigateur
   ↓
Demande au DNS resolver
   ↓
Resolver demande aux serveurs racine
   ↓
Serveur .dev
   ↓
Serveur autoritaire de wayl.dev
   ↓
Renvoie l'IP
```

Ensuite le navigateur contacte l'IP.

---

## 📄 4️⃣ Les types de records importants

### 🔹 A Record

Associe un domaine à une IPv4.

```
wayl.dev → 185.XX.XX.XX
```

Type : `A`

👉 Le plus important pour un VPS.

### 🔹 AAAA Record

Associe un domaine à une IPv6.

```
wayl.dev → 2a01:abcd::1234
```

### 🔹 CNAME

Alias d'un autre domaine.

```
www.wayl.dev → wayl.dev
```

👉 `www` pointe vers le domaine principal.

### 🔹 MX Record

Utilisé pour les emails.

```
wayl.dev → mail server
```

### 🔹 TXT Record

Stocke du texte (souvent pour vérifications ou SPF).

---

## ⏳ 5️⃣ TTL (Time To Live)

TTL = durée de cache.

Exemple :

```
TTL = 3600
```

→ Le résultat est gardé en mémoire **1 heure**.

Si tu changes l'IP de ton VPS :

- TTL long → propagation lente
- TTL court → propagation rapide

---

## 🌐 6️⃣ Propagation DNS

Quand tu modifies un record :

- Tous les serveurs DNS du monde doivent mettre à jour leur cache
- Ça peut prendre de **quelques minutes à 48h** (selon TTL)

---

## 🔍 7️⃣ Comment vérifier ton DNS ?

Sur Linux :

```bash
dig wayl.dev
```

ou

```bash
nslookup wayl.dev
```

Si `dig` n'est pas installé :

```bash
sudo apt install dnsutils
```

---

## 🔥 9️⃣ Sous-domaines

Chaque sous-domaine peut :

- Pointer vers la même IP
- Pointer vers une autre IP
- Être un CNAME

---

## 🧩 🔟 Résumé mental à retenir

| Concept     | Signification         |
| ----------- | --------------------- |
| DNS         | Traducteur            |
| A record    | Domaine → IPv4        |
| AAAA        | Domaine → IPv6        |
| CNAME       | Alias                 |
| TTL         | Durée de cache        |
| Propagation | Mise à jour mondiale  |
