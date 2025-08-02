# Méthodes et Propriétés Statiques en JavaScript

## 1. Introduction

En JavaScript, les **propriétés et méthodes statiques** appartiennent **à la classe elle-même** et non aux instances créées à partir de cette classe.  
Cela veut dire que vous **ne pouvez pas y accéder via un objet instancié**, mais uniquement via la classe.

---

## 2. Définition

### Propriété statique

Une **propriété statique** est une variable définie directement sur la classe.

```js
class Exemple {
    static maPropriete = "Je suis statique";
}

console.log(Exemple.maPropriete); // "Je suis statique"
```

### Méthode statique

Une méthode statique est une fonction que l’on peut appeler directement sur la classe, sans créer d’instance.

```js
class Exemple {
    static direBonjour() {
        return "Bonjour depuis la classe !";
    }
}

console.log(Exemple.direBonjour()); // "Bonjour depuis la classe !"
```

## 3. Caractéristiques

Pas accessible depuis une instance

```js
class Exemple {
    static maPropriete = "statique";
}
const obj = new Exemple();
console.log(obj.maPropriete); // ❌ undefined

// Accessible uniquement via la classe

console.log(Exemple.maPropriete); // "statique"
```

### Utilisation fréquente :

Créer des méthodes utilitaires (ex. : fonctions d’aide, calculs).

Stocker des valeurs globales propres à la classe (ex. : version, config).

## 4. Exemple complet

```js
class Calculatrice {
    static PI = 3.14159; // Propriété statique

    static addition(a, b) { // Méthode statique
        return a + b;
    }

    static cercleSurface(rayon) { // Utilise une propriété statique
        return this.PI * rayon * rayon;
    }
}

// Utilisation
console.log(Calculatrice.addition(5, 3)); // 8
console.log(Calculatrice.cercleSurface(2)); // 12.56636
console.log(Calculatrice.PI); // 3.14159

// Depuis une instance : impossible
const calc = new Calculatrice();
console.log(calc.addition); // ❌ undefined
```

## 5. Comparaison avec méthodes normales

Méthodes normales → accessibles via les instances (new MaClasse()).

Méthodes statiques → accessibles uniquement via la classe.

```js
class Personne {
    constructor(nom) {
        this.nom = nom;
    }

    // Méthode normale
    direNom() {
        return this.nom;
    }

    // Méthode statique
    static presentation() {
        return "Je suis une personne.";
    }
}

const p = new Personne("Alice");
console.log(p.direNom());       // "Alice"
console.log(Personne.presentation()); // "Je suis une personne."
```

## 6. Quand utiliser les méthodes et propriétés statiques ?

Utilitaires indépendants (ex. : méthodes de calcul, helpers).

Constantes de classe (ex. : valeurs fixes).

Méthodes d’usine (factory methods qui créent des objets).