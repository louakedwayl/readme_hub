# 📘 L'objet `window` en JavaScript

## 1. Qu’est-ce que l’objet `window` ?

L’objet `window` représente la **fenêtre du navigateur** dans laquelle le document HTML est affiché.
C’est l’objet global en JavaScript côté navigateur, donc toutes les variables et fonctions globales font partie de `window`.

### Exemple :

```js
var x = 10;
console.log(window.x); // 10
```

---

## 2. Propriétés importantes de `window`

* `window.document` : fait référence au document HTML chargé.
* `window.innerWidth` et `window.innerHeight` : dimensions de la fenêtre.
* `window.location` : fournit l’URL actuelle et permet de naviguer.
* `window.history` : accès à l’historique de navigation.
* `window.navigator` : informations sur le navigateur.

### Exemple :

```js
console.log(window.innerWidth);  // largeur de la fenêtre
console.log(window.location.href); // URL actuelle
```

---

## 3. Méthodes utiles de `window`

* `alert(message)` : affiche une alerte.
* `confirm(message)` : affiche un dialogue de confirmation.
* `prompt(message, default)` : affiche une boîte de dialogue pour saisir une valeur.
* `setTimeout(func, delay)` : exécute une fonction après un délai.
* `setInterval(func, interval)` : exécute une fonction à intervalles réguliers.
* `clearTimeout(id)` et `clearInterval(id)` : arrêtent un timer.

### Exemple :

```js
window.alert('Bonjour !');
let id = window.setTimeout(() => console.log('Hello après 2s'), 2000);
window.clearTimeout(id); // annule le timeout
```

---

## 4. Objet global implicite

Toutes les variables et fonctions globales font partie de `window` :

```js
function test() {
  console.log('test');
}

console.log(window.test); // [Function: test]
```

---

## 5. Bonnes pratiques

✅ Éviter de créer trop de variables globales pour ne pas polluer `window`.
✅ Préférer `let` et `const` dans des scopes locaux.
✅ Utiliser `window` pour accéder à des fonctionnalités globales ou gérer la fenêtre, le document et les timers.

---

## 6. Résumé

`window` est la **porte d’accès aux fonctionnalités du navigateur** et à l’objet global JavaScript. Il permet de gérer :

* La fenêtre et le document
* L’URL et l’historique
* Les dialogues utilisateur
* Les timers et événements globaux

