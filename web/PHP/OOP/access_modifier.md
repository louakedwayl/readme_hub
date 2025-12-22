# Les spécificateurs d'accès en PHP

## Introduction

En programmation orientée objet (POO) en PHP, les spécificateurs d'accès
permettent de contrôler la visibilité des propriétés et des méthodes
d'une classe.

Ils servent à : - Protéger les données - Organiser le code - Respecter
l'encapsulation

------------------------------------------------------------------------

## Les trois spécificateurs d'accès

PHP propose trois niveaux de visibilité :

| Spécificateur | Classe | Sous-classe | Extérieur |
|--------------|--------|-------------|-----------|
| public       | Oui    | Oui         | Oui       |
| protected    | Oui    | Oui         | Non       |
| private      | Oui    | Non         | Non       |

------------------------------------------------------------------------

## public

Un membre public est accessible partout.

``` php
class Voiture {
    public $marque;

    public function afficherMarque() {
        echo $this->marque;
    }
}
```

------------------------------------------------------------------------

## private

Un membre private est accessible uniquement dans la classe où il est
défini.

``` php
class CompteBancaire {
    private $solde = 1000;

    public function afficherSolde() {
        echo $this->solde;
    }
}
```

------------------------------------------------------------------------

## protected

Un membre protected est accessible dans la classe et dans ses classes
filles.

``` php
class Utilisateur {
    protected $nom;
}

class Admin extends Utilisateur {
    public function afficherNom() {
        echo $this->nom;
    }
}
```

------------------------------------------------------------------------

## Encapsulation

L'encapsulation consiste à cacher les données et à y accéder via des
méthodes publiques.

``` php
class Personne {
    private $age;

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        if ($age > 0) {
            $this->age = $age;
        }
    }
}
```

------------------------------------------------------------------------

## Bonnes pratiques

-   Utiliser `private` par défaut
-   Exposer uniquement ce qui est nécessaire
-   Utiliser des getters et setters

------------------------------------------------------------------------

## Conclusion

Les spécificateurs d'accès sont essentiels pour écrire un code PHP
propre, sécurisé et maintenable.
