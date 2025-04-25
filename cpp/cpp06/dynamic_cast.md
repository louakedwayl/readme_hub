				Dynamic Cast
******************************************************************************************************

Cours sur dynamic_cast en C++ :
-------------------------------

En C++, dynamic_cast est un opérateur utilisé pour effectuer un cast dynamique, principalement dans les situations où vous 
travaillez avec des hiérarchies de classes polymorphiques (c’est-à-dire, des classes qui contiennent au moins une fonction virtuelle).

Il permet de faire une conversion sécurisée entre types dérivés et types de base. Cela permet d'éviter les erreurs lors de la conversion de types et d'assurer que le type auquel vous essayez de cast est bien le type attendu.

1/ Contexte et but de dynamic_cast :
------------------------------------

Le polymorphisme permet à une fonction ou à un objet de se comporter de différentes manières en fonction du type réel de l'objet. 
Cependant, lorsque vous travaillez avec des types dérivés et des pointeurs ou références vers des types de base, vous pouvez rencontrer des problèmes lorsque vous essayez de convertir un pointeur de type de base en un pointeur vers un type dérivé.

C'est ici qu'intervient dynamic_cast, qui permet de vérifier dynamiquement (au moment de l'exécution) si la conversion est valide.

2/ Syntaxe de dynamic_cast :
----------------------------

dynamic_cast<new_type>(expression)

    new_type : le type vers lequel vous souhaitez effectuer la conversion.

    expression : l'expression qui est un pointeur ou une référence à un objet du type d'origine.

Il peut être utilisé de deux façons :

    Avec des pointeurs : dynamic_cast<Type*>(ptr)

    Avec des références : dynamic_cast<Type&>(ref)

3/ Fonctionnement :
-------------------

Cas 1 : Cast entre pointeurs

Lorsque vous utilisez dynamic_cast sur un pointeur, il renverra :

    Un pointeur vers le type demandé si la conversion est valide.

    nullptr si la conversion échoue.

Cas 2 : Cast entre références

Lorsqu’il est utilisé sur une référence, si la conversion échoue, une exception de type std::bad_cast est levée.

4/ Conditions pour utiliser dynamic_cast :
------------------------------------------

    Polymorphisme : Vous devez travailler avec une hiérarchie de classes polymorphiques. 
Cela signifie que la classe de base doit avoir au moins une fonction virtuelle (même si c’est un destructeur virtuel).

    Sécurité à l'exécution : Contrairement à static_cast, dynamic_cast fait un contrôle à l'exécution pour 
s'assurer que le cast est valide. Il permet de prévenir des erreurs à l’exécution.

5/ Exemple de dynamic_cast :
----------------------------

Prenons un exemple simple avec une hiérarchie de classes :

#include <iostream>

class Animal 
{
public:
    virtual void parler() { std::cout << "L'animal fait un bruit." << std::endl; }
    virtual ~Animal() {}  // Destructeur virtuel
};

class Chien : public Animal {
public:
    void parler() override { std::cout << "Le chien aboie." << std::endl; }
};

class Chat : public Animal 
{
public:
    void parler() override { std::cout << "Le chat miaule." << std::endl; }
};

int main() 
{
    Animal* animal = new Chien();  // Un objet de type Chien

    Chien* chien = dynamic_cast<Chien*>(animal);  // Cast valide
    if (chien) 
    {
        chien->parler();  // Affiche "Le chien aboie."
    } 
    else 
    {
        std::cout << "Le cast a échoué." << std::endl;
    }

    Chat* chat = dynamic_cast<Chat*>(animal);  // Cast invalide
    if (chat) 
    {
        chat->parler();
    } else 
    {
        std::cout << "Le cast a échoué." << std::endl;  // Affiche "Le cast a échoué."
    }

    delete animal;
    return 0;
}

*****************************************************************************************************************************
