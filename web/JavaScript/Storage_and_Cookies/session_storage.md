# Session Storage en JavaScript

Le **Session Storage** est une API Web similaire au **Local Storage**, mais avec quelques différences clés :

* Les données sont stockées **côté client** dans le navigateur.
* Les données **durent uniquement pendant la session** (elles disparaissent lorsque l’onglet ou le navigateur est fermé).
* Les données sont **isolées par onglet** : chaque onglet a son propre Session Storage.

---

## 1. Accéder au Session Storage

L’objet global `sessionStorage` permet de manipuler le stockage de session :

```javascript
// Vérifier si le sessionStorage est disponible
if (typeof(Storage) !== "undefined") {
    console.log("Session Storage disponible !");
} else {
    console.log("Session Storage non supporté par ce navigateur.");
}
```

---

## 2. Stocker des données

On utilise la méthode `setItem(key, value)` :

```javascript
// Stocker une donnée simple
sessionStorage.setItem("nom", "Wayl");

// Stocker un objet (converti en JSON)
const utilisateur = { nom: "Wayl", age: 22 };
sessionStorage.setItem("utilisateur", JSON.stringify(utilisateur));
```

---

## 3. Récupérer des données

On utilise `getItem(key)` :

```javascript
// Récupérer une donnée simple
const nom = sessionStorage.getItem("nom");
console.log(nom); // "Wayl"

// Récupérer un objet
const utilisateurStr = sessionStorage.getItem("utilisateur");
const utilisateurObj = JSON.parse(utilisateurStr);
console.log(utilisateurObj.nom); // "Wayl"
```

---

## 4. Supprimer des données

* Supprimer une clé spécifique :

```javascript
sessionStorage.removeItem("nom");
```

* Supprimer toutes les données de la session :

```javascript
sessionStorage.clear();
```

---

## 5. Différences avec le Local Storage

| Caractéristique   | Local Storage        | Session Storage               |
| ----------------- | -------------------- | ----------------------------- |
| Durée de stockage | Persistant           | Jusqu'à fermeture de l’onglet |
| Portée            | Par domaine          | Par onglet                    |
| Capacité          | \~5 Mo par domaine   | \~5 Mo par onglet             |
| Accès JS          | Oui (`localStorage`) | Oui (`sessionStorage`)        |

---

## 6. Exemple complet

```javascript
// Ajouter une donnée dans le Session Storage
function ajouterSession(key, value) {
    sessionStorage.setItem(key, JSON.stringify(value));
}

// Récupérer et afficher la donnée
function afficherSession(key) {
    const valueStr = sessionStorage.getItem(key);
    if (valueStr) {
        const value = JSON.parse(valueStr);
        console.log(value);
    } else {
        console.log("Aucune donnée trouvée pour la clé", key);
    }
}

// Exemple d'utilisation
ajouterSession("tache", { nom: "Faire les courses", date: new Date() });
afficherSession("tache");
```

---

Le **Session Storage** est idéal pour stocker des données temporaires, comme l’état d’un formulaire ou des préférences temporaires pendant la session de l’utilisateur.

