# 📚 Les Cookies en JavaScript

## 1️⃣ Introduction
Un **cookie** est un petit fichier stocké par le navigateur sur l’ordinateur de l’utilisateur.  
- Il contient **des paires clé/valeur**.  
- Il peut être envoyé automatiquement au **serveur** à chaque requête HTTP.  
- Il est utilisé pour :  
  - sessions d’utilisateur,  
  - préférences,  
  - suivi de navigation,  
  - authentification.  

---

## 2️⃣ Récupérer tous les cookies

En JavaScript côté client, tous les cookies accessibles (non `HttpOnly`) sont disponibles via :

```javascript
console.log(document.cookie);
```

Exemple de sortie :  
```
username=Wayl; theme=dark; token=abc123
```

### 🔹 Parser les cookies
Pour convertir la chaîne en objet clé/valeur :

```javascript
function parseCookies() {
  const cookies = document.cookie.split("; "); // sépare chaque cookie
  const result = {};
  cookies.forEach(cookie => {
    const [name, value] = cookie.split("=");
    result[name] = decodeURIComponent(value); // décodage si le cookie contient des caractères spéciaux
  });
  return result;
}

console.log(parseCookies());
```

✅ `decodeURIComponent` permet de **décoder les caractères spéciaux** encodés dans les cookies (`%20` → espace, `%3D` → `=` etc.).

---

## 3️⃣ Créer / modifier un cookie

### Syntaxe générale

```javascript
document.cookie = "nom=valeur; expires=DATE; path=/; domain=example.com; secure; samesite=strict";
```

- **nom=valeur** : obligatoire.  
- **expires** : date d’expiration du cookie.  
- **path** : chemin pour lequel le cookie est valide.  
- **domain** : domaine sur lequel le cookie est accessible.  
- **secure** : cookie envoyé uniquement via HTTPS.  
- **samesite** : contrôle le partage entre sites (`strict`, `lax`, `none`).  

### Exemple simple

```javascript
// Créer un cookie qui expire dans 7 jours
const date = new Date();
date.setTime(date.getTime() + (7 * 24 * 60 * 60 * 1000)); // 7 jours en millisecondes
document.cookie = `username=Wayl; expires=${date.toUTCString()}; path=/`;
```

---

## 4️⃣ Que se passe-t-il quand un cookie expire ?

- Le navigateur **supprime automatiquement** le cookie à la date d’expiration.  
- Le cookie **n’est plus envoyé au serveur** et n’apparaît plus dans `document.cookie`.  
- Si tu crées un cookie avec une **date passée**, il sera immédiatement supprimé.  

Exemple pour supprimer un cookie :

```javascript
document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
```

---

## 5️⃣ Points importants

- Les cookies **ont une taille limitée** (~4 Ko par cookie).  
- Les cookies marqués `HttpOnly` **ne sont pas accessibles en JavaScript** (protège contre le vol via XSS).  
- Les cookies expirés ou supprimés **disparaissent automatiquement**.  
- Utiliser `encodeURIComponent` pour stocker des valeurs contenant des caractères spéciaux :

```javascript
document.cookie = `city=${encodeURIComponent("New York")}; path=/`;
console.log(decodeURIComponent(parseCookies().city)); // "New York"
```

---

✅ Ce cours couvre :
1. Récupérer tous les cookies et les parser.  
2. Décoder les cookies avec `decodeURIComponent`.  
3. Créer et modifier des cookies avec expiration.  
4. Que se passe-t-il quand un cookie expire.
