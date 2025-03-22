                                                Liage de fonction
***************************************************************************************************

Le liage (ou liaison, en anglais binding) désigne le moment où le programme associe 
un appel de fonction à une fonction réelle en mémoire.

C++ utilise deux types de liage :

Liage statique (static binding ou early binding)

Liage dynamique (dynamic binding ou late binding)

1/ Liaison statique (Static Binding) :
--------------------------------------

Le liage est déterminé à la compilation.
Le compilateur sait exactement quelle fonction appeler en analysant le type de la variable.

Caractéristiques :
------------------

Plus rapide (pas de calcul à l’exécution)
Utilisé pour les fonctions non virtuelles
Fonctionne même avec des pointeurs

Exemple :
---------

class Animal 
{
public:
    void parler() {
        std::cout << "Animal !" << std::endl;
    }
};

int main() 
{
    Animal* a = new Animal();
    a->parler(); // Liage statique → Appelle Animal::parler
}

Même si a est un pointeur, parler() n’est pas virtual, donc l'appel est résolu à la compilation.

2/ Liaison dynamique (Dynamic Binding) :
----------------------------------------

Le liage est déterminé à l’exécution, en fonction du type réel de l’objet.
C'est utilisé avec des méthodes virtuelles (virtual) dans un contexte d’héritage.

Caractéristiques

Plus souple (polymorphisme)
Nécessite des pointeurs ou des références
Plus lent que la liaison statique (mais négligeable dans la plupart des cas)

Exemple :
---------

class Animal 
{
public:
    virtual void parler() {
        std::cout << "Animal !" << std::endl;
    }
};

class Chien : public Animal {
public:
    void parler() override {
        std::cout << "Wouf !" << std::endl;
    }
};

int main() 
{
    Animal* a = new Chien();
    a->parler(); // Liage dynamique → Appelle Chien::parler
}

Grâce au virtual, le compilateur laisse la décision au moment de l'exécution.

3/ Importance du destructeur virtuel :
--------------------------------------

Le destructeur doit être virtual dans une classe de base si elle est conçue pour être héritée avec du polymorphisme.

class Animal 
{
public:
    virtual ~Animal() {}
};

*****************************************************************************************************************
