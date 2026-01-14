# 📘 window.location en JavaScript

## 1️⃣ Qu’est-ce que window.location ?

`window.location` est un **objet du navigateur** qui représente **l’URL courante** de la page.

Il permet :
- de lire les informations de l’URL
- de modifier l’URL
- de rediriger l’utilisateur
- de recharger la page

```js
window.location
```

---

## 2️⃣ window est implicite

```js
location.href = '/login';
```

est équivalent à :

```js
window.location.href = '/login';
```

---

## 3️⃣ Propriétés principales

### location.href
URL complète (lecture et écriture)

```js
console.log(location.href);
location.href = '/dashboard';
```

### location.origin
Protocole + domaine

```js
console.log(location.origin);
```

### location.pathname
Chemin de l’URL

```js
console.log(location.pathname);
```

### location.search
Paramètres GET

```js
console.log(location.search);
```

### location.hash
Ancre URL

```js
console.log(location.hash);
```

---

## 4️⃣ Méthodes importantes

### location.assign(url)
Redirige et garde l’historique

```js
location.assign('/login');
```

### location.replace(url)
Redirige sans garder l’historique

```js
location.replace('/login');
```

### location.reload()
Recharge la page

```js
location.reload();
```

---

## 5️⃣ Exemple pratique

```js
if (response.valid) {
    window.location.href = '?action=dashboard';
}
```

---

## 6️⃣ Résumé

`window.location` est un objet du navigateur permettant de lire et modifier l’URL et de rediriger l’utilisateur.
