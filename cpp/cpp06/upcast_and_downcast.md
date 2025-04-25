					Upcast and downcast 
************************************************************************************************************

En C++, les casts entre types dans une hiérarchie de classes peuvent se faire de différentes manières.
Deux des concepts les plus importants sont l'upcast et le downcast.
Ces deux types de conversions sont fréquemment utilisés lorsque l'on travaille avec des classes 
de base et dérivées dans un contexte polymorphique.

1/ Définitions :
----------------

    Upcast : Il s'agit de la conversion d'un type dérivé vers un type de base. Cela est possible car un objet dérivé est toujours un objet de sa classe de base (en raison de l'héritage). L'upcast est toujours sûr et ne nécessite aucune vérification à l'exécution.

    Downcast : Il s'agit de la conversion d'un type de base vers un type dérivé. Cela est plus risqué, car un objet de type base peut ne pas être un objet du type dérivé, et donc cette conversion peut échouer. Le downcast nécessite une vérification dynamique, souvent effectuée à l'aide de dynamic_cast pour garantir sa validité.

2/ Upcast :
-----------

L'upcast se produit lorsque vous convertissez un objet d'une classe dérivée en un pointeur ou une référence à une classe de base. Puisque chaque objet dérivé est aussi un objet de la classe de base, cela est toujours valide. L'upcast est généralement automatique en C++, donc le compilateur s'en charge pour vous.
Exemple d'Upcast

#include <iostream>

class Animal 
{
public:
    virtual void parler() { std::cout << "L'animal fait un bruit." << std::endl; }
    virtual ~Animal() {}
};

class Chien : public Animal 
{
public:
    void parler() override { std::cout << "Le chien aboie." << std::endl; }
};

int main() 
{
    Chien chien;           // Un objet Chien
    Animal* animal = &chien;  // Upcast automatique vers Animal*
    
    animal->parler();  // Affiche "Le chien aboie."
    
    return 0;
}

Dans cet exemple, l'objet chien de type Chien est automatiquement upcasté en un pointeur vers la classe de base Animal.
Comme la classe Chien dérive de Animal, ce cast est totalement valide et n'a pas besoin d'être explicitement spécifié.

3/ Qu'est-ce qu'un Downcast ?
-----------------------------

Un downcast désigne la conversion d'un type de base en un type dérivé. Cela est potentiellement dangereux car un objet de type base 
peut ne pas être un objet du type dérivé, ce qui pourrait entraîner des erreurs d'exécution. 
Le downcast doit donc être effectué avec prudence, et il est conseillé d'utiliser dynamic_cast pour garantir la sécurité.

Caractéristiques du downcast :
------------------------------

    Peut échouer : Contrairement à l'upcast, le downcast peut échouer si l'objet de base n'est pas réellement un objet du type dérivé.

    Vérification dynamique : Pour assurer la sécurité de la conversion, il est recommandé d'utiliser dynamic_cast 
(pour les pointeurs et les références) qui vérifie à l'exécution si la conversion est valide.

    Utilisation avec les hiérarchies polymorphiques : Le downcast est souvent utilisé dans des hiérarchies de classes où des classes 
dérivées partagent une classe de base commune, et vous souhaitez accéder à des fonctionnalités spécifiques aux classes dérivées.

Exemple de Downcast avec dynamic_cast :
---------------------------------------

#include <iostream>

class Animal 
{
public:
    virtual void parler() { std::cout << "L'animal fait un bruit." << std::endl; }
    virtual ~Animal() {}
};

class Chien : public Animal 
{
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
    Animal* animal = new Chien();  // Animal pointe vers un objet Chien

    // Downcast valide
    Chien* chien = dynamic_cast<Chien*>(animal);  // Fonctionne car animal pointe vers un Chien
    if (chien) {
        chien->parler();  // Affiche "Le chien aboie."
    } else {
        std::cout << "Le cast vers Chien a échoué." << std::endl;
    }

    // Downcast invalide
    Chat* chat = dynamic_cast<Chat*>(animal);  // Echec car animal ne pointe pas vers un Chat
    if (chat) {
        chat->parler();
    } else {
        std::cout << "Le cast vers Chat a échoué." << std::endl;  // Affiche ceci
    }

    delete animal;
    return 0;
}

Dans cet exemple :

    Nous effectuons un downcast sur le pointeur animal (qui pointe vers un objet de type Chien).

    Le first downcast réussit car animal pointe vers un objet Chien.

    Le second downcast échoue car animal pointe vers un objet Chien et non un objet Chat. dynamic_cast<Chat*> renvoie nullptr dans ce cas.

*****************************************************************************************************************************************
