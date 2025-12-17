# Les 3 Grandes Architectures Web Modernes

## 1. Architecture MVC (Server-Side Rendering)

### **Définition**

L'architecture **MVC** (Model-View-Controller) est une manière d'organiser une application où le **serveur** génère directement les pages HTML.

### **Rôle des composants**

* **Model** : Gestion des données, accès à la base de données.
* **View** : Gabarits HTML générés sur le serveur.
* **Controller** : Reçoit les requêtes, appelle les modèles, renvoie les vues.

### **Caractéristiques**

* Rendu effectué **côté serveur**.
* Très bon pour le **SEO**.
* Simple pour les petites ou moyennes applications.
* Le backend gère **logique + vues**.

### **Exemples**

* Laravel
* Symfony
* Django
* Ruby on Rails
* Spring MVC

---

## 2. Architecture SPA (Single Page Application)

### **Définition**

Une **SPA** est une application web où **une seule page HTML** est chargée, puis le contenu est mis à jour en JavaScript côté client.

### **Fonctionnement**

* Le navigateur télécharge une app JS (React, Vue…)
* Les pages ne sont pas rechargées entièrement
* Le rendu est fait **côté client**

### **Caractéristiques**

* Très interactive, rapide après chargement.
* Expérience "comme une app mobile".
* Souvent utilisée avec une **API REST** ou **GraphQL**.
* Moins bon SEO (sauf SSR hybride comme Next.js).

### **Exemples**

* React / Next.js
* Vue / Nuxt
* Angular

---

## 3. Architecture API (REST, GraphQL)

### **Définition**

Ce type d'architecture concerne les applications où le **backend ne renvoie pas du HTML**, mais uniquement des **données** (souvent en JSON).

### **Utilité**

* Sert d'intermédiaire entre le frontend et la base de données.
* Permet de servir plusieurs types de clients :

  * SPA
  * Application mobile
  * Application desktop

### **Caractéristiques**

* Très flexible
* Favorise la séparation **frontend/backend**
* Idéal pour architectures modernes

### **Exemples**

* API REST (Express, Fastify, Laravel API)
* GraphQL
* tRPC

---

# Résumé Comparatif

| Architecture | Qui génère l'interface ? | Avantages               | Inconvénients                |
| ------------ | ------------------------ | ----------------------- | ---------------------------- |
| **MVC**      | Serveur                  | SEO fort, simple        | Peu interactif côté client   |
| **SPA**      | Navigateur (JS)          | Très fluide, UX moderne | SEO difficile, gros JS       |
| **API**      | Aucun (données JSON)     | Flexible, multi-clients | Nécessite un frontend séparé |

---

# Schéma Global

```
         +-----------------------+
         |         MVC           |
         |  Serveur → HTML       |
         +-----------------------+

         +-----------------------+
Front →  |         SPA           |
(API)    | Client JS → Rendu     |
         +-----------------------+

         +-----------------------+
Back  →  |         API           |
(SPA)    | Renvoie JSON          |
         +-----------------------+
```

---

# Conclusion

Les trois architectures web modernes que tout développeur doit connaître sont :

* **MVC** : rendu côté serveur
* **SPA** : rendu côté client
* **API** : backend fournissant des données JSON

Elles sont souvent combinées dans les projets actuels : par exemple une **SPA React** qui consomme une **API Node.js**, alors que certains sites plus classiques utilisent encore **MVC**.
