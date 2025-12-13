# Modifier les Headers HTTP avec curl

## Introduction

**curl** est un outil en ligne de commande qui permet d'envoyer des requêtes HTTP et de manipuler tous les aspects d'une requête, notamment les headers.

---

## 1. Qu'est-ce que curl ?

curl (Client URL) est un outil qui permet de :
- Envoyer des requêtes HTTP/HTTPS vers des serveurs
- Télécharger ou envoyer des données
- **Modifier les headers HTTP** de nos requêtes
- Tester des APIs et des sites web

### Installation
- **Linux/macOS** : généralement préinstallé
- **Windows** : téléchargeable ou inclus dans Windows 10+

Pour vérifier l'installation :
```bash
curl --version
```

---

## 2. Pourquoi modifier les headers avec curl ?

Modifier les headers permet de :
- **Tester la sécurité** d'un site web (pentesting, CTF)
- **Contourner des restrictions** basées sur le User-Agent ou le Referer
- **Simuler différents clients** (navigateurs, applications mobiles)
- **Interagir avec des APIs** qui demandent des headers spécifiques
- **Déboguer** des problèmes de communication HTTP

---

## 3. Les options principales de curl

### 3.1 Option `-H` : Modifier n'importe quel header

L'option `-H` (ou `--header`) permet d'ajouter ou modifier n'importe quel header HTTP.

**Syntaxe générale :**
```bash
curl -H "Nom-Header: Valeur" http://example.com
```

**Exemples :**
```bash
# Modifier le User-Agent
curl -H "User-Agent: MonNavigateur/1.0" http://example.com

# Ajouter un cookie
curl -H "Cookie: session=abc123" http://example.com

# Modifier le Referer
curl -H "Referer: https://google.com" http://example.com

# Ajouter plusieurs headers
curl -H "User-Agent: admin" -H "Cookie: id=123" http://example.com
```

### 3.2 Option `-A` : Raccourci pour User-Agent

L'option `-A` (ou `--user-agent`) est un raccourci spécifique pour modifier le User-Agent.

```bash
curl -A "admin" http://example.com

# Équivalent à :
curl -H "User-Agent: admin" http://example.com
```

### 3.3 Option `-e` : Raccourci pour Referer

L'option `-e` (ou `--referer`) modifie le header Referer.

```bash
curl -e "https://google.com" http://example.com

# Équivalent à :
curl -H "Referer: https://google.com" http://example.com
```

### 3.4 Option `-b` : Raccourci pour Cookie

L'option `-b` (ou `--cookie`) permet d'envoyer des cookies.

```bash
curl -b "session=abc123" http://example.com

# Équivalent à :
curl -H "Cookie: session=abc123" http://example.com
```

---

## 4. Options utiles pour le débogage

### 4.1 Option `-v` : Mode verbose

Affiche tous les détails de la communication (headers envoyés et reçus).

```bash
curl -v http://example.com
```

**Affiche :**
- `>` : ce que curl **envoie** au serveur
- `<` : ce que le serveur **renvoie**

### 4.2 Option `-i` : Afficher les headers de réponse

Affiche les headers de la réponse du serveur sans les détails de la requête.

```bash
curl -i http://example.com
```

### 4.3 Option `-I` : Requête HEAD uniquement

Envoie une requête HEAD (récupère seulement les headers, pas le contenu).

```bash
curl -I http://example.com
```

---

## 5. Exemples pratiques

### 5.1 Contourner une restriction de Referer

```bash
# Certains sites vérifient que tu viens de leur propre site
curl -e "https://site-autorise.com" http://example.com/page-protegee
```

### 5.2 Simuler un navigateur mobile

```bash
curl -A "Mozilla/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X)" http://example.com
```

### 5.4 Envoyer une requête avec authentification

```bash
curl -H "Authorization: Bearer mon_token_secret" http://api.example.com/data
```

### 5.5 Envoyer des données JSON avec headers

```bash
curl -X POST \
     -H "Content-Type: application/json" \
     -H "Authorization: Bearer token123" \
     -d '{"user":"admin","pass":"1234"}' \
     http://api.example.com/login
```

---

## 6. Résumé des options importantes

| Option | Description | Exemple |
|--------|-------------|---------|
| `-H` | Ajouter/modifier un header | `curl -H "User-Agent: admin"` |
| `-A` | Modifier le User-Agent | `curl -A "admin"` |
| `-e` | Modifier le Referer | `curl -e "https://google.com"` |
| `-b` | Envoyer un cookie | `curl -b "session=xyz"` |
| `-v` | Mode verbose (débogage) | `curl -v http://...` |
| `-i` | Afficher headers de réponse | `curl -i http://...` |
| `-X` | Changer la méthode HTTP | `curl -X POST` |
| `-d` | Envoyer des données (POST) | `curl -d "user=admin"` |

---

## 7. Bonnes pratiques

### Toujours utiliser des guillemets
```bash
# ✅ Correct
curl -H "User-Agent: admin" http://example.com

# ❌ Peut causer des erreurs
curl -H User-Agent: admin http://example.com
```

### Combiner plusieurs options
```bash
curl -v -A "admin" -e "https://google.com" http://example.com
```

### Sauvegarder la réponse dans un fichier
```bash
curl -A "admin" http://example.com -o resultat.html
```

---

## 8. Conclusion

curl est un outil essentiel pour :
- **Manipuler les headers HTTP** facilement
- **Tester la sécurité** des applications web
- **Déboguer** des problèmes de communication
- **Automatiser** des interactions avec des APIs

Maîtriser curl est fondamental pour le pentesting, les challenges CTF (comme Root-Me) et le développement web.

---

## Ressources

- Documentation officielle : `man curl` ou [curl.se](https://curl.se)
- Challenges Root-Me : [root-me.org](https://www.root-me.org)
- Pour aller plus loin : tester différentes combinaisons de headers sur des challenges web
