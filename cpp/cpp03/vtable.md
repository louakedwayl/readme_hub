# vtable

La **vtable** (*virtual table*) est une **structure interne** générée automatiquement par le compilateur lorsqu’une classe 
possède **au moins une méthode `virtual`**.

Elle sert à faire la **liaison dynamique** (*liaison tardive*) entre un appel de fonction via un **pointeur** 
ou une **référence** et la **version exacte** de la fonction à appeler, selon le **type réel de l’objet**.

---

## Quand est-elle utilisée ?

La vtable intervient dès que :
- Une classe contient au moins **une fonction virtuelle**.  
- Et que l’on **accède à un objet via un pointeur ou une référence à la classe de base**.

---

## Exemple :

```cpp
class Animal 
{
public:
    virtual void makeSound() const;
};

class Dog : public Animal 
{
public:
    void makeSound() const override;
};

int main() {
    Animal* a = new Dog();
    a->makeSound(); // Appelle Dog::makeSound() si makeSound() est virtual
}
```

### Comment ça marche en mémoire ?

Animal a une vtable contenant l'adresse de Animal::makeSound().

Dog hérite d’Animal, mais sa vtable remplace l’adresse par celle de Dog::makeSound().

Chaque objet instancié contient un pointeur caché vers la vtable correspondante, appelé vptr (virtual pointer).

Ainsi, lors de l’appel d’une fonction virtuelle, le programme suit le vptr pour appeler la bonne implémentation.

