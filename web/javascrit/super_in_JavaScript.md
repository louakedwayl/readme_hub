# Le mot-clé `super` en JavaScript

En JavaScript, `super` est un mot-clé spécial utilisé **dans les classes** pour faire référence à la **classe parente** (celle qu’on étend avec `extends`).  

Il sert principalement à deux choses :

1. **Appeler le constructeur du parent** → `super()`  
2. **Appeler les méthodes du parent** → `super.methode()`  

---

## 1. Appeler le constructeur parent

Quand tu crées une classe qui hérite d’une autre (`class Enfant extends Parent`), **le constructeur de la sous-classe doit appeler `super()` avant d’utiliser `this`**.  

### Exemple :
```js
class Animal {
    constructor(nom) {
        this.nom = nom;
    }
}

class Chien extends Animal {
    constructor(nom, race) {
        super(nom); // Appel du constructeur de Animal
        this.race = race;
    }
}

const medor = new Chien("Médor", "Berger Allemand");
console.log(medor.nom);  // "Médor"
console.log(medor.race); // "Berger Allemand"
```

### Pourquoi super() est obligatoire avant this ?

Parce que this n’existe pas tant que le constructeur parent n’a pas été initialisé.

Donc si tu essayes de faire this.xxx avant super(), tu auras une erreur.

## 2. Appeler une méthode du parent

En plus du constructeur, super permet d’appeler une méthode héritée depuis la classe parente.

### Exemple :

```js
class Animal {
    parler() {
        console.log("L'animal fait un bruit.");
    }
}

class Chien extends Animal {
    parler() {
        super.parler(); // On appelle la méthode du parent
        console.log("Le chien aboie !");
    }
}

const medor = new Chien();
medor.parler();
// Résultat :
// L'animal fait un bruit.
// Le chien aboie !
```

## 3. Schéma mental

```bash
Parent (Animal)
   |
   | extends
   v
Enfant (Chien)
   |
   | -- super() --> appelle le constructeur du parent
   | -- super.methode() --> appelle une méthode héritée
```

### À retenir

super() dans le constructeur : doit être appelé avant this.

super.methode() : permet d’accéder à une méthode du parent.

Tu ne peux utiliser super que dans une classe qui étend une autre (extends).

