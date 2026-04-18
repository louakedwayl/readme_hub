# Les CDN (Content Delivery Network)

## Définition

Un **CDN** (Content Delivery Network) est un réseau de serveurs répartis géographiquement dans le monde, qui stocke des copies de fichiers statiques (CSS, JS, images, vidéos, fonts) pour les servir rapidement aux utilisateurs.

**Principe :** l'utilisateur télécharge le fichier depuis le serveur CDN le plus proche de lui, pas depuis le serveur d'origine.

---

## Pourquoi utiliser un CDN

| Bénéfice | Explication |
|---|---|
| **Vitesse** | Latence réduite (fichier servi depuis un serveur proche) |
| **Bande passante** | Le serveur d'origine n'est pas sollicité |
| **Cache navigateur** | Si un autre site utilise le même CDN, le fichier est déjà en cache chez l'utilisateur |
| **Fiabilité** | Redondance multi-datacenters, uptime élevé |
| **Sécurité** | Protection DDoS, WAF, rate limiting (Cloudflare, Akamai) |

---

## Comment ça marche

```
Utilisateur (Paris)
    ↓
DNS intelligent du CDN
    ↓
Serveur CDN le plus proche (ex: datacenter Paris)
    ↓
Fichier livré rapidement
```

Le CDN utilise du routage DNS intelligent (GeoDNS / Anycast) pour diriger chaque utilisateur vers le serveur optimal.

---

## CDN populaires

### Pour les librairies (gratuits)

| CDN | Usage principal |
|---|---|
| **jsDelivr** (`cdn.jsdelivr.net`) | npm, GitHub, WordPress |
| **cdnjs** (`cdnjs.cloudflare.com`) | Librairies JS populaires |
| **unpkg** (`unpkg.com`) | Tous les packages npm |

### Pour les sites / entreprises

- **Cloudflare** — CDN + sécurité, plan gratuit disponible
- **AWS CloudFront** — intégré à l'écosystème Amazon
- **Fastly** — haute performance, utilisé par GitHub, Reddit, Stripe
- **Vercel / Netlify** — CDN intégré aux plateformes d'hébergement front-end

---

## Utilisation concrète

### Importer Bootstrap via CDN

```html
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
```

### Importer React via CDN

```html
<script src="https://unpkg.com/react@18/umd/react.production.min.js"></script>
```

### Importer une font (Google Fonts)

```html
<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
```

---

## Quand utiliser un CDN

| Cas | CDN recommandé ? |
|---|---|
| Prototype, démo, apprentissage | ✅ Oui (CDN pour libs) |
| Projet production sérieux | ❌ Non pour libs → utiliser `npm install` |
| Site à fort trafic | ✅ Oui (Cloudflare / CloudFront pour tout le site) |
| Hébergement front-end | ✅ Déjà intégré (Vercel / Netlify) |

---

## À retenir

- Un CDN = infrastructure réseau mondiale de serveurs
- Objectif : servir du contenu statique rapidement et de manière fiable
- Gratuit pour les libs populaires (jsDelivr, cdnjs, unpkg)
- En production, on préfère souvent `npm install` pour les dépendances (contrôle version, tree-shaking) et un CDN global (Cloudflare) devant son propre site
- Aspect sécurité important : un CDN peut masquer l'IP du serveur origine (pertinent en pentest)
