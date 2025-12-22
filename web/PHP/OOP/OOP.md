# POO en PHP

La **Programmation Orientée Objet (POO)** est une manière d'organiser
ton code autour d'**objets**.\
Elle permet d'écrire du code plus **propre**, plus **modulaire**, et
plus **facile à maintenir**.

PHP supporte totalement la POO depuis PHP 5 et elle est utilisée dans
tous les frameworks modernes (Symfony, Laravel...).

------------------------------------------------------------------------

# 1. Les concepts de base

## ➤ Classe

Une classe est un **modèle** qui décrit quelque chose : un utilisateur,
un produit, une voiture...

``` php
class User {}
```

## ➤ Objet

Un objet est une **instance** d'une classe.

``` php
$user = new User();
```

------------------------------------------------------------------------

# 2. Propriétés & Méthodes

-   **Propriétés** → données de l'objet\
-   **Méthodes** → actions de l'objet

``` php
class User {
    public $name;

    public function sayHello() {
        return "Hello !";
    }
}
```

------------------------------------------------------------------------

# 3. Le constructeur

Méthode appelée automatiquement quand on crée l'objet.

``` php
class User {
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }
}
```

------------------------------------------------------------------------

# 4. Les niveaux de visibilité

-   **public** : accessible partout\
-   **protected** : accessible dans la classe et ses enfants\
-   **private** : seulement dans la classe

Ces niveaux servent à **protéger** les données.

------------------------------------------------------------------------

# 5. L'héritage

Une classe peut hériter d'une autre pour réutiliser son code.

``` php
class Animal { }
class Dog extends Animal { }
```

------------------------------------------------------------------------

# 6. Les interfaces (idée simple)

Une interface définit ce que **doit faire** une classe, sans dire
comment.

------------------------------------------------------------------------

# 7. Les traits (idée simple)

Un **trait** est un bloc de code que tu peux réutiliser dans plusieurs
classes.

------------------------------------------------------------------------

# 8. Pourquoi utiliser la POO ?

✔ Structurer un projet\
✔ Réutiliser le code\
✔ Faciliter le travail en équipe\
✔ Faciliter la maintenance\
✔ Indispensable pour les Frameworks PHP

❌ Pas forcément utile pour de petits scripts simples

------------------------------------------------------------------------

# Résumé rapide

1.  La POO organise le code autour d'objets.\
2.  Une classe = un modèle ; un objet = un cas particulier.\
3.  Les propriétés stockent des données, les méthodes font des actions.\
4.  L'héritage, les interfaces et les traits aident à structurer du code
    complexe.\
5.  La POO est essentielle dans tous les projets PHP sérieux.
