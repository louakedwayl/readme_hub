# Prototypes en JavaScript vs Classes de base en C++

## 1. Qu'est-ce qu'un prototype en JavaScript ?

En JavaScript, **chaque objet** est relié à un autre objet appelé **prototype**.  
Ce prototype sert de **modèle** (ou plan) et contient des **méthodes** et **propriétés** partagées par toutes les instances qui y sont reliées.

- Si une propriété ou méthode n’existe pas dans un objet,
JavaScript la recherche dans son **prototype**.

- Ce mécanisme s'appelle la **chaîne de prototypes** (*prototype chain*).

### Exemple simple :

```js
function Person(name)
{
  this.name = name;
}

Person.prototype.sayHello = function()
{
  console.log("Bonjour, je m'appelle " + this.name);
};

const p1 = new Person("Alice");
p1.sayHello(); // "Bonjour, je m'appelle Alice"
```

### Ici :

Person.prototype contient la méthode sayHello.

p1 ne possède pas sayHello directement, mais JavaScript la trouve dans Person.prototype.

### 2. Les classes en C++ (pour comparaison)

En C++, une classe de base permet de définir des attributs et des méthodes communs que les classes dérivées héritent.

### Exemple simple :

```c++
class Person {
public:
    std::string name;
    Person(std::string n) : name(n) {}
    void sayHello() {
        std::cout << "Bonjour, je m'appelle " << name << std::endl;
    }
};

class Student : public Person {
public:
    Student(std::string n) : Person(n) {}
};

Student s("Alice");
s.sayHello(); // "Bonjour, je m'appelle Alice"
```

### Ici :

Student hérite de Person.

La méthode sayHello est définie dans Person et accessible par Student.

## 3. Similitudes : Prototype ≈ Classe de base

### Héritage :

Comme une classe de base en C++, un prototype permet à plusieurs objets de partager des méthodes.

### Réutilisation :

Les méthodes définies dans un prototype (ou classe de base) ne sont pas dupliquées pour chaque instance.

### Hiérarchie :

JavaScript utilise une chaîne de prototypes, qui ressemble à une hiérarchie de classes.

## 4. Différences importantes

# Comparaison : Prototype JavaScript vs Classe de base C++

| Aspect              | JavaScript (Prototype)                    | C++ (Classe de base)                 |
|---------------------|------------------------------------------|-------------------------------------|
| **Nature**          | Dynamique (on peut modifier un prototype à tout moment) | Statique (structure fixée à la compilation) |
| **Définition**      | Pas de vraies classes avant ES6, tout est basé sur des objets et prototypes | Vraies classes avec typage fort |
| **Chaîne d'héritage** | Chaîne d'objets (*prototype chain*)       | Hiérarchie de classes fixes |
| **Modification**    | On peut ajouter ou retirer des méthodes à la volée | Impossible de modifier une classe compilée |


## 5. Le sucre syntaxique class en JavaScript

Depuis ES6, JavaScript propose une syntaxe class, mais sous le capot, cela utilise toujours les prototypes.

### Exemple :

```js
class Person {
  constructor(name) {
    this.name = name;
  }
  sayHello() {
    console.log("Bonjour, je m'appelle " + this.name);
  }
}

const p2 = new Person("Bob");
p2.sayHello(); // "Bonjour, je m'appelle Bob"
```

## 6. Conclusion

Prototype en JavaScript : un objet servant de modèle pour d’autres objets.

Classe de base en C++ : un modèle statique permettant de partager des méthodes et attributs aux classes dérivées.

Ressemblance : Les deux permettent de partager des comportements et d’organiser le code.

Différence : JavaScript est beaucoup plus flexible (ajout/retrait dynamique), tandis que C++ est statiquement typé et compilé.
