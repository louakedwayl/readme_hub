# Reconnaissance — Pentest Web

> Phase 1 de tout pentest. Collecter avant d'exploiter. Toujours.

---

## Principe

La recon = cartographier la cible avant d'attaquer. Plus tu connais, plus tu trouves.

**Règle :** 30-50% du temps total d'un pentest passe en recon. Qui la bâcle échoue.

---

## Passive vs Active

- **Passive** : zéro interaction avec la cible (Google, GitHub, archive.org). Indétectable.
- **Active** : requêtes directes à la cible (scanners, fuzzing). Visible dans les logs.

Ordre : **passive d'abord**, active ensuite.

---

## Les 4 questions

1. Qu'est-ce qui tourne ? (serveur, framework, versions)
2. Qu'est-ce qui est exposé ? (pages, endpoints, sous-domaines)
3. Qu'est-ce qui est caché mais accessible ? (backups, git, admin)
4. Qu'est-ce qui a changé dans le temps ? (archives, anciennes versions)

---

## Étapes essentielles

### 1. Headers & fingerprinting

```bash
curl -I https://target
whatweb https://target
```

Identifie : serveur, langage, framework, CMS, versions.

### 2. Fichiers standards

```bash
curl https://target/robots.txt
curl https://target/sitemap.xml
curl https://target/.git/HEAD
curl https://target/.env
```

### 3. Code source

- `Ctrl+U` sur chaque page → commentaires HTML, champs cachés
- DevTools → Network → toutes les requêtes AJAX
- Fichiers JS → endpoints API cachés, clés

### 4. Énumération répertoires

```bash
ffuf -u https://target/FUZZ \
     -w /usr/share/seclists/Discovery/Web-Content/raft-medium-directories.txt \
     -e .php,.bak,.old,.zip,.txt
```

### 5. Sous-domaines (si scope large)

```bash
subfinder -d target.com | httpx -silent -title -tech-detect
```

### 6. Burp en proxy

Tout le trafic passe par Burp dès le début. Historique = base de travail pour l'exploitation.

---

## Outils minimum

| Outil | Usage |
|-------|-------|
| Burp Suite | Proxy, Repeater |
| curl | Requêtes manuelles |
| ffuf | Fuzzing dirs/fichiers |
| whatweb | Fingerprinting |
| DevTools (F12) | Analyse client |
| exiftool | Metadata images |

---

## Checklist rapide

- [ ] `curl -I` → headers
- [ ] `/robots.txt`, `/sitemap.xml`
- [ ] `/.git/`, `/.env`, backups (`.bak`, `.old`, `.zip`)
- [ ] Browse complet + Ctrl+U chaque page
- [ ] DevTools Network sur toutes les actions
- [ ] ffuf avec wordlist medium
- [ ] Tech stack identifié
- [ ] Burp history intact

---

## Sur Darkly

Pas besoin de l'artillerie lourde. Pour chaque challenge :

1. Browse la page
2. Ctrl+U → commentaires
3. DevTools → cookies, headers, requêtes
4. `/robots.txt` si pertinent
5. Burp pour modifier les requêtes

Shodan, GitHub dorking, Wayback = inutiles sur Darkly (cible locale).

---

**Retenir :** lire avant deviner, regarder avant présumer. La recon est répétitive mais c'est ce qui sépare le débutant du pro.
