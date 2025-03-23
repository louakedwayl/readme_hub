                                            vtable
****************************************************************************************************

La vtable est une structure interne générée automatiquement par le compilateur lorsqu’une classe 
possède au moins une méthode virtual.

Elle sert à faire la liaison dynamique (ou "liaison tardive") entre un appel de fonction via un pointeur 
ou une référence et la version exacte de la fonction à appeler, selon le type réel de l’objet.

Quand est-elle utilisée ?
-------------------------

Dès que :

Une classe contient au moins une fonction virtuelle.

et t0u accèdes à un objet via un pointeur ou une référence à la classe de base.

Exemple :
---------

Animal* a = new Dog();
a->makeSound(); // Appelle Dog::makeSound() si makeSound() est virtual

Comment ça marche en mémoire ?

Imaginons :

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

En mémoire :
-------------

Animal a une vtable contenant l'adresse de Animal::makeSound().
Dog hérite d’Animal, mais sa vtable remplace l’adresse par celle de Dog::makeSound().
Chaque objet instancié contient un pointeur caché vers la vtable correspondante. 
On appelle ça le vptr (virtual pointer).

********************************************************************************************************
