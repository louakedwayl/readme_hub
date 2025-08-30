# Événements Personnalisés en JavaScript

En JavaScript, en plus des événements natifs (click, input, scroll…), tu peux créer tes propres événements personnalisés. Cela permet de **déclencher et écouter des actions spécifiques à ton application**.

---

## 1. Créer un événement personnalisé

On utilise la classe `CustomEvent` pour créer un événement personnalisé :

```js
// Création d'un événement nommé "tacheAjoutee"
const event = new CustomEvent("tacheAjoutee", {
  detail: { nom: "Faire les courses", date: "2025-08-30" }, // données personnalisées
  bubbles: true,  // permet à l'événement de remonter dans le DOM
  cancelable: false // ne peut pas être annulé
});
```

### Explications :

* **`detail`** : contient des données que tu veux transmettre aux listeners.
* **`bubbles`** : si vrai, l’événement se propage vers les parents.
* **`cancelable`** : si vrai, on peut appeler `event.preventDefault()` pour annuler l’action.

---

## 2. Écouter un événement personnalisé

On utilise `addEventListener` comme pour un événement natif :

```js
document.body.addEventListener("tacheAjoutee", (e) => {
  console.log("Nouvelle tâche :", e.detail.nom);
  console.log("Date :", e.detail.date);
});
```

---

## 3. Déclencher un événement personnalisé

On utilise `dispatchEvent` sur l’élément concerné :

```js
// Déclenchement de l'événement
document.body.dispatchEvent(event);
```

🔹 Ici, tous les listeners attachés sur `document.body` ou ses parents (si `bubbles: true`) seront exécutés.

---

## 4. Exemple complet

Supposons une todo list où chaque ajout de tâche déclenche un événement personnalisé :

```html
<button id="ajouter">Ajouter Tâche</button>

<script>
const btnAjouter = document.getElementById("ajouter");

// Écoute de l'événement personnalisé
document.body.addEventListener("tacheAjoutee", (e) => {
  console.log("Tâche ajoutée :", e.detail.nom);
});

// Déclenchement de l'événement au clic
btnAjouter.addEventListener("click", () => {
  const nouvelleTache = { nom: "Nouvelle tâche", date: new Date() };
  const event = new CustomEvent("tacheAjoutee", { detail: nouvelleTache });
  document.body.dispatchEvent(event);
});
</script>
```

* Quand tu cliques sur le bouton, l’événement `"tacheAjoutee"` est déclenché.
* Le listener récupère les informations dans `e.detail`.

---

## 5. Notes importantes

* Les événements personnalisés sont très utiles pour **découpler le code** :

  * Une partie du code déclenche l’événement.
  * Une autre partie écoute et réagit, sans être directement liée.

* Tu peux combiner avec **event delegation** pour écouter sur un parent et capter les événements de tous les enfants.

* Tu peux aussi utiliser `e.stopPropagation()` pour **arrêter la propagation** si nécessaire.

---

## 6. Résumé

* **CustomEvent** permet de créer des événements personnalisés.
* **detail** stocke des données à transmettre aux listeners.
* **dispatchEvent** déclenche l’événement.
* **addEventListener** écoute l’événement.
* Utile pour **organiser et découpler ton code JavaScript**.

