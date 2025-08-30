# Local Storage en JavaScript

Le **Local Storage** est une API Web qui permet de stocker des données localement dans le navigateur. Contrairement aux cookies, les données du Local Storage :

* sont persistantes (restent même après la fermeture du navigateur)
* ont une taille beaucoup plus grande (\~5 Mo selon le navigateur)
* ne sont pas envoyées au serveur à chaque requête HTTP

---

## 1. Accéder au Local Storage

Le Local Storage est accessible via l’objet global `localStorage` :

```javascript
// Vérifier si le localStorage est disponible
if (typeof(Storage) !== "undefined") {
    console.log("Local Storage disponible !");
} else {
    console.log("Local Storage non supporté par ce navigateur.");
}
```

---

## 2. Stocker des données

On utilise la méthode `setItem(key, value)` pour stocker une donnée :

```javascript
// Stocker une donnée simple
localStorage.setItem("nom", "Wayl");

// Stocker un objet (il faut le convertir en JSON)
const utilisateur = { nom: "Wayl", age: 22 };
localStorage.setItem("utilisateur", JSON.stringify(utilisateur));
```

---

## 3. Récupérer des données

On utilise `getItem(key)` pour lire une donnée :

```javascript
// Récupérer une donnée simple
const nom = localStorage.getItem("nom");
console.log(nom); // "Wayl"

// Récupérer un objet
const utilisateurStr = localStorage.getItem("utilisateur");
const utilisateurObj = JSON.parse(utilisateurStr);
console.log(utilisateurObj.nom); // "Wayl"
```

---

## 4. Supprimer des données

* Supprimer une clé spécifique :

```javascript
localStorage.removeItem("nom");
```

* Supprimer toutes les données :

```javascript
localStorage.clear();
```

---

## 5. Bonnes pratiques

* Stocker **des petites quantités de données** (5 Mo maximum).
* Toujours utiliser **JSON.stringify** pour stocker des objets ou tableaux.
* Toujours utiliser **JSON.parse** pour les récupérer.
* Ne pas stocker de **données sensibles** (mots de passe, tokens, etc.).

---

## 6. Exemple complet

```javascript
// Ajouter une tâche dans le localStorage
function ajouterTache(nom) {
    let taches = JSON.parse(localStorage.getItem("taches")) || [];
    taches.push({ nom: nom, date: new Date() });
    localStorage.setItem("taches", JSON.stringify(taches));
}

// Récupérer et afficher les tâches
function afficherTaches() {
    const taches = JSON.parse(localStorage.getItem("taches")) || [];
    taches.forEach(t => console.log(t.nom, t.date));
}

// Exemple d'utilisation
ajouterTache("Faire les courses");
afficherTaches();
```

---

Le Local Storage est idéal pour stocker des **préférences utilisateur**, des **listes temporaires** ou des **états de l’application** côté client.

