# Récupérer une réponse HTTP avec cURL

## Introduction

**cURL** est un outil en ligne de commande qui permet d'envoyer des requêtes HTTP et de voir les réponses du serveur. C'est très utile pour tester des APIs, déboguer des sites web, ou résoudre des challenges de sécurité.

---

## Les commandes de base

### 1. Requête simple
```bash
curl http://example.com
```
Affiche uniquement le **contenu** (body) de la page HTML.

### 2. Voir les headers de réponse
```bash
curl -i http://example.com
```
Affiche les **headers + le contenu**. C'est la commande la plus utile pour voir ce que le serveur renvoie.

### 3. Voir uniquement les headers
```bash
curl -I http://example.com
```
Affiche seulement les headers, sans télécharger le contenu.

### 4. Mode verbose (tout voir)
```bash
curl -v http://example.com
```
Affiche la communication complète :
- Ce que tu envoies (requête)
- Ce que tu reçois (réponse)
- Les détails de connexion

---

## Modifier la requête

### Ajouter des headers personnalisés
```bash
curl -H "User-Agent: MonNavigateur" http://example.com
curl -H "Referer: http://google.com" http://example.com
```

### Plusieurs headers en même temps
```bash
curl -H "Header1: valeur1" -H "Header2: valeur2" http://example.com
```

---

## Gérer les redirections

```bash
curl -L http://example.com
```
Suit automatiquement les redirections (codes 301, 302, etc.)

---

## Sauvegarder la réponse

```bash
curl http://example.com > fichier.html
curl -o fichier.html http://example.com
```

---

## Autres options utiles

```bash
# Décompresser automatiquement gzip
curl --compressed http://example.com

# Envoyer une requête POST
curl -X POST http://example.com

# Avec des données
curl -X POST -d "param=valeur" http://example.com
```

---

## Résumé rapide

| Commande | Utilité |
|----------|---------|
| `curl URL` | Contenu seulement |
| `curl -i URL` | Headers + contenu |
| `curl -I URL` | Headers seulement |
| `curl -v URL` | Tout voir (debug) |
| `curl -H "Header: val" URL` | Modifier headers |
| `curl -L URL` | Suivre redirections |

---

## En pratique

Pour analyser une réponse HTTP complète :
```bash
curl -v -H "Mon-Header: valeur" http://site.com
```

---

## Exemple concret (Challenge Root-Me)

```bash
# 1. Voir la réponse initiale
curl -i http://challenge01.root-me.org/web-serveur/ch5/

# 2. Observer les headers personnalisés
# Header-RootMe-Admin: none

# 3. Modifier le header pour se faire passer pour admin
curl -i -H "Header-RootMe-Admin: true" http://challenge01.root-me.org/web-serveur/ch5/

# 4. Récupérer le flag dans la réponse !
```
