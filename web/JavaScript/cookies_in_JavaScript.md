# 📝 Les cookies en web

Les **cookies** sont de petits fichiers stockés côté client (navigateur) pour conserver des informations entre les requêtes HTTP et entre les sessions.  

---

## 1️⃣ Définition

- Les cookies sont des **paires clé-valeur** envoyées par le serveur et stockées dans le navigateur.  
- Ils sont automatiquement **envoyés au serveur** lors de chaque requête HTTP correspondant au domaine/path du cookie.  
- Utilisés pour :  
  - Authentification et sessions  
  - Stocker des préférences utilisateur  
  - Tracking et analytics  

---

## 2️⃣ Création et lecture côté client

### Ajouter un cookie

```js
// Syntaxe simple
document.cookie = "username=Alice; path=/; max-age=3600"; // valable 1 heure
```

- `username=Alice` : clé-valeur  
- `path=/` : cookie disponible pour tout le site  
- `max-age=3600` : durée de vie en secondes  

### Lire les cookies

```js
console.log(document.cookie); // Affiche tous les cookies sous forme de chaîne
```

> Attention : les cookies HttpOnly **ne sont pas accessibles via JavaScript**, mais sont envoyés au serveur.

---

## 3️⃣ Envoi automatique au serveur

- Chaque requête HTTP envoyée au domaine correspondant **inclut automatiquement les cookies**.  

Exemple :  

```http
GET /index.html HTTP/1.1
Host: example.com
Cookie: username=Alice; sessionId=12345
```

- Cela permet au serveur de **reconnaître l’utilisateur ou sa session** sans que le client doive ré-envoyer les données manuellement.

---

## 4️⃣ Propriétés importantes d’un cookie

| Propriété       | Description                                           |
|-----------------|-------------------------------------------------------|
| name=value      | Clé et valeur du cookie                               |
| expires / max-age | Date d’expiration ou durée de vie                    |
| path            | Chemin où le cookie est accessible                   |
| domain          | Domaine pour lequel le cookie est valide             |
| secure          | Cookie envoyé uniquement via HTTPS                  |
| HttpOnly        | Cookie inaccessible via JavaScript                   |
| SameSite        | Limite l’envoi du cookie cross-site (Strict, Lax)   |

---

## 5️⃣ Limites des cookies

- **Taille limitée** : ~4 Ko  
- **Envoyé à chaque requête** → peut augmenter le poids des requêtes  
- **Sécurité** : ne pas stocker d’informations sensibles côté client (ex : mot de passe ou carte bancaire)

---

## 6️⃣ Comparaison avec localStorage / sessionStorage

| Stockage        | Persistance       | Taille | Envoi automatique au serveur | Accessible par JS |
|-----------------|-----------------|--------|------------------------------|-----------------|
| Cookie           | Selon `expires` | ~4 Ko  | Oui                          | Oui (sauf HttpOnly) |
| localStorage     | Permanent       | ~5 Mo  | Non                          | Oui             |
| sessionStorage   | Session onglet  | ~5 Mo  | Non                          | Oui             |

---

## 7️⃣ Exemple pratique

```js
// Ajouter un cookie
document.cookie = "cart=5; path=/; max-age=86400"; // 1 jour

// Lire tous les cookies
console.log(document.cookie); // "cart=5"

// Supprimer un cookie
document.cookie = "cart=; path=/; max-age=0";
```

---

### 🔹 Conclusion

- Les cookies permettent de **stocker des informations persistantes côté client**.  
- Ils sont **automatiquement envoyés au serveur**, ce qui facilite la gestion des sessions et préférences.  
- Pour des données plus volumineuses ou sensibles, on préfère **localStorage ou le stockage côté serveur**.
