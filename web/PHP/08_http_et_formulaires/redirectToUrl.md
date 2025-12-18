# La fonction `redirectToUrl()`

## 1. Introduction

La fonction `redirectToUrl()` est généralement une **fonction utilitaire** utilisée en développement web pour **rediriger un utilisateur vers une autre page (URL)**.

👉 Elle n’est **pas une fonction native** de JavaScript ou de PHP :

* C’est une **fonction personnalisée**
* Elle encapsule une logique de redirection
* Elle améliore la lisibilité et la réutilisabilité du code

---

## 2. Principe de la redirection

Une redirection consiste à :

* Quitter la page courante
* Charger automatiquement une autre URL

Cas d’usage courants :

* Après une connexion réussie
* Après un formulaire validé
* Après une déconnexion
* En cas d’accès non autorisé

---

## 3. Exemple simple en JavaScript

### Définition de `redirectToUrl()`

```javascript
function redirectToUrl(url) {
    window.location.href = url;
}
```

### Utilisation

```javascript
redirectToUrl('dashboard.html');
```

📌 L’utilisateur est immédiatement redirigé vers la page indiquée.

---

## 4. Fonctionnement technique

* `window.location` représente l’URL courante
* `href` permet de modifier l’adresse
* Le navigateur déclenche une **nouvelle requête HTTP**

```javascript
window.location.href = 'login.html';
```

---

## 5. Exemple avec un bouton

```html
<button onclick="redirectToUrl('index.html')">
    Retour à l'accueil
</button>
```

Lors du clic, la redirection est exécutée.

---

## 6. Redirection conditionnelle

```javascript
function redirectToUrl(url, condition) {
    if (condition) {
        window.location.href = url;
    }
}
```

```javascript
redirectToUrl('admin.html', isAdmin);
```

---

## 7. Comparaison avec d’autres méthodes de redirection

### JavaScript

```javascript
window.location.href = 'page.html';
window.location.replace('page.html');
```

| Méthode   | Retour arrière possible |
| --------- | ----------------------- |
| `href`    | ✅ Oui                   |
| `replace` | ❌ Non                   |

---

## 8. Exemple côté PHP (équivalent)

En PHP, la redirection se fait côté serveur :

```php
header('Location: dashboard.php');
exit;
```

📌 Différence importante :

* JavaScript → redirection **côté client**
* PHP → redirection **côté serveur**

---

## 9. Bonnes pratiques

* Toujours vérifier l’URL avant de rediriger
* Éviter les redirections infinies
* Centraliser la logique de redirection dans une fonction
* Utiliser des chemins clairs et sécurisés

---

## 10. Erreurs fréquentes

❌ URL invalide

```javascript
redirectToUrl();
```

❌ Redirection avant la validation des données

❌ Mélanger logique serveur et client sans cohérence

---

## 11. Exemple complet

```javascript
function redirectToUrl(url) {
    if (typeof url === 'string' && url.length > 0) {
        window.location.href = url;
    }
}

// Après validation
redirectToUrl('success.html');
```

---

## 12. Résumé

* `redirectToUrl()` est une fonction personnalisée
* Elle sert à rediriger l’utilisateur vers une autre page
* Elle améliore la lisibilité du code
* Elle s’appuie généralement sur `window.location.href`

---

📌 **À retenir** : `redirectToUrl()` n’est pas native, mais elle simplifie et structure les redirections dans une application web.
