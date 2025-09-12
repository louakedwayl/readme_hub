# 📘 Le mot-clé `implements` en TypeScript

En TypeScript, le mot-clé **`implements`** permet à une **classe** de **respecter un contrat défini par une interface**.  
Cela signifie que la classe doit **implémenter toutes les propriétés et méthodes** de l’interface.

---

## 1. Syntaxe de base

```ts
interface Animal {
  name: string;
  makeSound(): void;
}

class Dog implements Animal {
  name: string;

  constructor(name: string) {
    this.name = name;
  }

  makeSound() {
    console.log("Woof!");
  }
}

const dog = new Dog("Rex");
dog.makeSound(); // Woof!
```

### Explications :

Dog implements Animal → la classe Dog doit fournir toutes les propriétés et méthodes de l’interface Animal.

Si une méthode ou propriété manque, TypeScript affichera une erreur de compilation.

## 2. Plusieurs interfaces

Une classe peut implémenter plusieurs interfaces séparées par des virgules.
```ts
interface Flyer {
  fly(): void;
}

interface Swimmer {
  swim(): void;
}

class Duck implements Flyer, Swimmer {
  fly() {
    console.log("Flying!");
  }

  swim() {
    console.log("Swimming!");
  }
}

const duck = new Duck();
duck.fly();  // Flying!
duck.swim(); // Swimming!
```

## 3. Différence avec l’héritage (extends)

| Mot-clé      | Description                                                                 |
|-------------|-----------------------------------------------------------------------------|
| `extends`   | Une classe **hérite** d’une autre classe (implémentation et comportement) |
| `implements` | Une classe **s’engage à respecter une interface** (contrat de forme)      |

### Exemple :

```ts
class Animal {
  move() {
    console.log("Moving...");
  }
}

interface Swimmer {
  swim(): void;
}

class Fish extends Animal implements Swimmer {
  swim() {
    console.log("Swimming...");
  }
}

const nemo = new Fish();
nemo.move(); // Moving...
nemo.swim(); // Swimming...
```

## 4. Points importants

implements fonctionne seulement avec les interfaces (ou des type qui sont des objets).

La classe doit implémenter toutes les propriétés et méthodes définies dans l’interface.

Permet de forcer un contrat pour des classes différentes, ce qui est très utile pour la consistance et la sécurité de types.

### Résumé

implements = « je respecte ce contrat »

Sert à lier une classe à une interface

Force TypeScript à vérifier que la classe implémente toutes les méthodes et propriétés de l’interface
