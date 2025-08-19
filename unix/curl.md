# curl
******************************************************************************

## 1/ Qu’est-ce que curl ?
curl (Client URL) est un outil en ligne de commande pour transférer des données avec des URL.  
Il supporte de nombreux protocoles, notamment HTTP, HTTPS, FTP, SMTP, et bien d’autres.

Contrairement à wget, qui est spécialisé dans le téléchargement de fichiers, curl est plus polyvalent et permet aussi d’envoyer des requêtes, d’interagir avec des API, etc.

## 2/ Syntaxe de base
```bash
curl [options] URL
```

## 3/ Commandes et options principales

Afficher le contenu d’une page web :
```bash
curl http://exemple.com
```

Télécharger un fichier et le sauvegarder sous un nom précis :

```bash
curl -o fichier.html http://exemple.com
```

Télécharger un fichier et garder le même nom que sur le serveur :

```bash
curl -O http://exemple.com/fichier.zip
```

Suivre les redirections (par défaut, curl ne suit pas) :

```bash
curl -L http://exemple.com
```

Envoyer une requête POST avec des données :

```bash
curl -d "param1=val1&param2=val2" -X POST http://exemple.com/api
```

Envoyer des données JSON dans une requête POST :

```bash
curl -H "Content-Type: application/json" -d '{"key":"value"}' -X POST http://exemple.com/api
```

Ajouter un header personnalisé :

```bash
curl -H "Authorization: Bearer TOKEN" http://exemple.com/api
```

Afficher uniquement les headers de la réponse :

```bash
curl -I http://exemple.com
```

Télécharger un fichier en mode silencieux (pas d’affichage) :

```bash
curl -s -O http://exemple.com/fichier.zip
```

## 4/ Exemple d’utilisation dans un script

```bash
#!/bin/bash

url="http://exemple.com/api/data"
response=$(curl -s -H "Authorization: Bearer TOKEN" $url)

echo "Réponse de l’API : $response"
```

## 6/ Différences entre curl et wget

| Fonctionnalité          | curl                  | wget                       |
|-------------------------|---------------------|----------------------------|
| Téléchargement simple    | Oui                  | Oui                        |
| Téléchargement récursif  | Non                  | Oui                        |
| Support d’API REST       | Oui (POST, PUT, DELETE, etc) | Non           |
| Suivi de redirections    | Par option -L        | Oui (par défaut)           |
| Envoi de données         | Oui                  | Très limité                |

## 7/ Cas d’utilisation courants

Interroger des API REST (GET, POST, PUT, DELETE)

Tester des endpoints web

Télécharger des fichiers simples

Automatiser des requêtes HTTP dans des scripts

