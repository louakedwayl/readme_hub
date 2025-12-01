# Cours : MVC (Model-View-Controller)

## 1️⃣ Définition

Le **MVC (Model-View-Controller)** est un **patron de conception (design pattern)** utilisé pour organiser le code d’une application en trois parties distinctes : **Modèle, Vue, Contrôleur**.
L’objectif est de **séparer les responsabilités** pour rendre le code plus clair, maintenable et réutilisable.

---

## 2️⃣ Les trois composants du MVC

### **2.1 Model (Modèle)**

* Gère **les données et la logique métier**.
* Interagit avec la base de données ou d’autres sources de données.
* Ne s’occupe pas de l’affichage.

**Exemple pseudo-code :**

```js
class UserModel {
    constructor(db) {
        this.db = db;
    }

    getUser(id) {
        return this.db.query('SELECT * FROM users WHERE id = ?', [id]);
    }

    createUser(name, email) {
        return this.db.query('INSERT INTO users (name, email) VALUES (?, ?)', [name, email]);
    }
}
```

---

### **2.2 View (Vue)**

* Représente **l’interface utilisateur**.
* Affiche les données fournies par le modèle.
* Ne contient **pas de logique métier**.

**Exemple HTML :**

```html
<h1>Profil de l'utilisateur</h1>
<p>Nom : {{user.name}}</p>
<p>Email : {{user.email}}</p>
```

---

### **2.3 Controller (Contrôleur)**

* Sert de **pont entre le modèle et la vue**.
* Reçoit les actions de l’utilisateur, interagit avec le modèle, puis met à jour la vue.

**Exemple pseudo-code :**

```js
class UserController {
    constructor(userModel, userView) {
        this.userModel = userModel;
        this.userView = userView;
    }

    showUserProfile(id) {
        const user = this.userModel.getUser(id);
        this.userView.render(user);
    }https://meta.intra.42.fr/articles/evaluations-in-paris#-valuations-distance
}
```

---

## 3️⃣ Flux de fonctionnement

1. L’utilisateur effectue une action (clic, formulaire…) → **Controller**
2. Le Controller demande ou modifie les données → **Model**
3. Le Model renvoie les données → **Controller**
4. Le Controller transmet les données à la → **View**
5. La View affiche les informations à l’utilisateur

---

## 4️⃣ Avantages du MVC

* **Séparation claire des responsabilités** → plus facile à maintenir.
* **Réutilisation du code** → modèle indépendant des vues.
* **Facilité de test** → on peut tester le modèle et le contrôleur séparément.
* **Flexibilité** → on peut changer la vue sans toucher au modèle.

---

## 5️⃣ Exemples d’utilisation

* Applications web côté serveur : PHP (Laravel, Symfony), Node.js (Express + EJS/Pug)
* Applications desktop : Java Swing, .NET
* Applications mobiles : Android (MVVM, proche du MVC)

---

## 6️⃣ Bonnes pratiques

* Garder le modèle **libre de toute logique d’affichage**.
* La vue doit être **le plus simple possible**, juste pour afficher les données.
* Le contrôleur doit **gérer uniquement la coordination** entre modèle et vue.
* Bien structurer les fichiers :

```
/models
/views
/controllers
/routes (pour les URLs)
```

---

💡 **Conclusion** : Le MVC est une base solide pour organiser une application web ou logicielle. Il facilite la maintenance, la lisibilité et la réutilisation du code.
