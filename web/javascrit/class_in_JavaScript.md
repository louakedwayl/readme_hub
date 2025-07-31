# Les Classes en JavaScript

## Introduction

En JavaScript, les **classes** offrent une syntaxe plus simple et plus lisible pour créer des objets et gérer l’héritage.  
Introduites avec **ES6 (ECMAScript 2015)**, elles reposent sur le concept de prototypes mais apportent une approche plus proche des langages orientés objet comme Java ou C#.

---

## Définir une Classe

La syntaxe de base pour déclarer une classe utilise le mot-clé `class` :

```javascript
class Person {
  constructor(name, age) {
    this.name = name;
    this.age = age;
  }

  greet() {
    console.log(`Bonjour, je m'appelle ${this.name} et j'ai ${this.age} ans.`);
  }
}

const p1 = new Person("Alice", 25);
p1.greet();
```

### Explications :

constructor : méthode spéciale appelée automatiquement lors de l’instanciation.

this : fait référence à l’instance de la classe.

Les méthodes sont définies directement dans le corps de la classe.

### Expression de Classe

On peut aussi définir une classe comme une expression et la stocker dans une variable :

```js
const Animal = class {
  constructor(type) {
    this.type = type;
  }
  makeSound() {
    console.log(`${this.type} fait un bruit.`);
  }
};

const a1 = new Animal("Chien");
a1.makeSound();
```

### L’Héritage avec extends

Les classes peuvent hériter d’autres classes grâce au mot-clé extends :

```js
class Animal {
  constructor(name) {
    this.name = name;
  }
  speak() {
    console.log(`${this.name} fait un bruit.`);
  }
}

class Dog extends Animal {
  speak() {
    console.log(`${this.name} aboie.`);
  }
}

const d1 = new Dog("Rex");
d1.speak();
```

### Points importants :

extends permet de créer une sous-classe.

super() doit être appelé dans le constructeur de la sous-classe avant d’utiliser this.

### Méthodes Statiques

Les méthodes statiques sont appelées sur la classe elle-même, pas sur ses instances :

```js
class MathUtils {
  static add(a, b) {
    return a + b;
  }
}

console.log(MathUtils.add(5, 3)); // 8
```

### Propriétés Privées

Depuis ES2022, JavaScript supporte les champs privés avec # :

```js
class CompteBancaire {
  #solde = 0;

  deposer(montant) {
    this.#solde += montant;
  }

  consulterSolde() {
    return this.#solde;
  }
}

const compte = new CompteBancaire();
compte.deposer(100);
console.log(compte.consulterSolde()); // 100
```

### Getters et Setters

Les getters et setters permettent de contrôler l’accès aux propriétés :

```js
class Person 
{
  constructor(name) {
    this._name = name;
  }

  get name() {
    return this._name;
  }

  set name(newName) {
    if (newName.length > 0) {
      this._name = newName;
    }
  }
}

const p = new Person("Alice");
console.log(p.name); // Alice
p.name = "Bob";
console.log(p.name); // Bob
```

### Conclusion

Les classes en JavaScript permettent :

Une meilleure lisibilité du code.

Une gestion plus simple de l’héritage.

L’ajout de méthodes statiques, privées et de getters/setters.

Elles restent cependant une surcouche syntaxique aux prototypes, ce qui signifie que JavaScript conserve son fonctionnement orienté prototype sous-jacent.