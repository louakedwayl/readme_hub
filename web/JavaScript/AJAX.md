# Cours : HTTP et AJAX

## 1. HTTP (HyperText Transfer Protocol)

### Définition
HTTP est un protocole de communication entre un **client** (navigateur) et un **serveur**.  
Il permet de **demander et recevoir des informations** sur le web.

### Fonctionnement
1. Le client envoie une **requête HTTP** au serveur.
2. Le serveur traite la requête et renvoie une **réponse HTTP** contenant les données demandées (HTML, JSON, images, etc.).

### Méthodes HTTP principales
| Méthode | Description |
|---------|------------|
| GET     | Récupérer des données depuis le serveur |
| POST    | Envoyer des données au serveur |
| PUT     | Modifier des données existantes sur le serveur |
| DELETE  | Supprimer des données sur le serveur |

### Structure d'une requête HTTP
\`\`\`http
GET /page.html HTTP/1.1
Host: www.example.com
\`\`\`

### Structure d'une réponse HTTP
\`\`\`http
HTTP/1.1 200 OK
Content-Type: text/html

<html>
  <body>Bonjour le monde !</body>
</html>
\`\`\`

## 2. AJAX (Asynchronous JavaScript And XML)

### Définition
AJAX est une technique qui permet de **faire des requêtes HTTP depuis une page web sans la recharger**.  
Même si le nom contient "XML", on utilise le plus souvent **JSON** aujourd’hui.

### Avantages d’AJAX
- Pas de rechargement complet de la page → expérience utilisateur plus fluide
- Possibilité de **mettre à jour seulement certaines parties de la page**
- Très utilisé pour les réseaux sociaux, les chats en ligne, les tableaux de bord, etc.

### Fonctionnement simplifié
1. Le navigateur exécute du JavaScript qui envoie une **requête HTTP** au serveur.
2. Le serveur renvoie les données demandées.
3. Le JavaScript met à jour **une partie de la page** avec ces données.

### Exemple avec \`fetch\` (JavaScript moderne)
\`\`\`javascript
fetch('https://api.exemple.com/data')
  .then(response => response.json()) // Convertit la réponse en JSON
  .then(data => {
    console.log(data);
    document.getElementById('contenu').innerText = data.message;
  })
  .catch(error => console.error('Erreur:', error));
\`\`\`

### Exemple avec \`XMLHttpRequest\` (ancienne méthode)
\`\`\`javascript
var xhr = new XMLHttpRequest();
xhr.open('GET', 'https://api.exemple.com/data', true);
xhr.onload = function() {
  if (xhr.status === 200) {
    var data = JSON.parse(xhr.responseText);
    document.getElementById('contenu').innerText = data.message;
  }
};
xhr.send();
\`\`\`

## 3. Différence entre HTTP classique et AJAX
| Critère            | HTTP classique                   | AJAX                                 |
|-------------------|---------------------------------|-------------------------------------|
| Rechargement page  | Oui, toute la page se recharge  | Non, seulement une partie est mise à jour |
| Expérience utilisateur | Moins fluide                   | Très fluide                          |
| Utilisation typique | Sites statiques ou navigation simple | Sites dynamiques, applications web interactives |

## 4. Exemples d’utilisation d’AJAX
- Formulaires qui s’envoient sans recharger la page
- Filtrage ou tri de tableaux de données en temps réel
- Notifications et messages en temps réel (chat, réseaux sociaux)
- Chargement infini de contenus (scroll infini)

## 5. Bonnes pratiques
- Toujours gérer les **erreurs** (404, 500…)
- Ne pas surcharger le serveur avec trop de requêtes
- Utiliser \`async/await\` pour un code plus lisible
- Préférer JSON à XML pour plus de simplicité
