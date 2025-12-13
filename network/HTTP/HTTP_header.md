# Les Headers HTTP

Les **headers HTTP** sont des informations envoyées dans une requête ou une réponse HTTP qui permettent de transmettre des métadonnées entre le client (navigateur, application) et le serveur.

---

## 1. Qu'est-ce qu'un header HTTP ?

Un **header HTTP** est une ligne de texte sous la forme :
```
Nom-Du-Header: Valeur
```

Ils sont utilisés pour :
- Donner des informations sur la requête ou la réponse
- Contrôler le comportement du client ou du serveur
- Fournir des informations sur la ressource échangée

### Exemple de requête HTTP avec headers :
```http
GET /index.html HTTP/1.1
Host: www.example.com
User-Agent: Mozilla/5.0
Accept: text/html
```

### Exemple de réponse HTTP avec headers :
```http
HTTP/1.1 200 OK
Content-Type: text/html
Content-Length: 1024
Cache-Control: no-cache
```

---

## 2. Types de headers

### 2.1 Headers de requête (Request Headers)

Envoyés par le client pour donner des informations au serveur.

| Header | Description |
|--------|-------------|
| `Host` | Nom du serveur ciblé par la requête |
| `User-Agent` | Informations sur le navigateur ou le client |
| `Accept` | Types de contenu que le client peut recevoir |
| `Authorization` | Informations d'authentification |
| `Cookie` | Envoi des cookies stockés au serveur |

### 2.2 Headers de réponse (Response Headers)

Envoyés par le serveur pour donner des informations sur la réponse.

| Header | Description |
|--------|-------------|
| `Content-Type` | Type du contenu envoyé (`text/html`, `application/json`, etc.) |
| `Content-Length` | Taille du contenu en octets |
| `Set-Cookie` | Créer ou mettre à jour un cookie |
| `Cache-Control` | Contrôle la mise en cache |
| `Location` | URL de redirection (pour les réponses 3xx) |

### 2.3 Headers généraux

S'appliquent à la fois aux requêtes et aux réponses.

| Header | Description |
|--------|-------------|
| `Connection` | Contrôle la persistance de la connexion (`keep-alive`, `close`) |
| `Date` | Date et heure de la requête ou réponse |
| `Transfer-Encoding` | Type d'encodage du corps (`chunked`, etc.) |

### 2.4 Headers d'entité

Fournissent des informations sur le corps de la requête ou de la réponse.

| Header | Description |
|--------|-------------|
| `Content-Encoding` | Encodage utilisé pour compresser le corps (`gzip`, `deflate`) |
| `Content-Language` | Langue du contenu (`fr`, `en-US`) |
| `Content-Disposition` | Suggestion pour le téléchargement ou affichage du contenu |

---

## 3. Exemples concrets

### 3.1 Requête GET
```http
GET /page HTTP/1.1
Host: example.com
User-Agent: Mozilla/5.0
Accept: text/html
```

### 3.2 Réponse 200 OK
```http
HTTP/1.1 200 OK
Content-Type: text/html; charset=UTF-8
Content-Length: 512
Cache-Control: no-cache
```

### 3.3 Réponse 302 Redirection
```http
HTTP/1.1 302 Found
Location: https://www.example.com/nouvelle-page
```

---

## 4. Sécurité et headers

Certains headers sont utilisés pour améliorer la sécurité :

| Header | Utilité |
|--------|---------|
| `Strict-Transport-Security` | Force l'usage du HTTPS |
| `X-Content-Type-Options: nosniff` | Empêche le navigateur de deviner le type de contenu |
| `Content-Security-Policy` | Contrôle le chargement des ressources externes |
| `X-Frame-Options` | Empêche le clickjacking (chargement en iframe) |

---

## 5. Conclusion

Les headers HTTP sont essentiels pour :
- Communiquer des métadonnées entre client et serveur
- Contrôler le comportement des requêtes et réponses
- Assurer sécurité, performance et compatibilité

Les comprendre est fondamental pour le développement web, le débogage et la sécurité.
