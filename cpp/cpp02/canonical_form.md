			Forme canonique
************************************************************

1/ Introduction :
-----------------

En C++, la forme canonique est un ensemble minimal de méthodes qu’une classe 
doit implémenter pour gérer correctement ses ressources, en particulier 
lorsqu’elle possède des allocations dynamiques. 

Ce concept a été introduit par James Coplien dans son livre 
"Advanced C++: Programming Styles and Idioms" (1992).

2/ La Forme Canonique de Coplien :
----------------------------------

La forme canonique repose sur quatre méthodes essentielles :

1/ Le constructeur par défaut : Permet d'initialiser l'objet.

2/ Le destructeur : Libère les ressources lorsque l'objet est détruit.

3/ Le constructeur de copie : Permet de créer un nouvel objet en copiant un autre.

4/ L’opérateur d’affectation (=) : Permet d'affecter un objet à un autre après leur création.

Ces méthodes garantissent que la classe gère correctement ses ressources, en évitant notamment les fuites mémoire et les double suppressions.

Exemple de classe respectant la Forme Canonique :
-------------------------------------------------

class Warrior 
{
private:
    char* name;  // Nom du guerrier (allocation dynamique)
    int strength; // Force du guerrier
public:
    // 1/ Constructeur par défaut
    Warrior() : name(nullptr), strength(0) {}

    // 2/ Constructeur avec paramètres
    Warrior(const char* warriorName, int warriorStrength) : strength(warriorStrength) {
        name = new char[strlen(warriorName) + 1];  // Allocation dynamique
        strcpy(name, warriorName);
    }

    // 3/ Constructeur de copie (deep copy)
    Warrior(const Warrior& other) : strength(other.strength) {
        name = new char[strlen(other.name) + 1];  // Nouvelle allocation mémoire
        strcpy(name, other.name);
    }

    // 4/ Opérateur d'affectation (deep copy)
    Warrior& operator=(const Warrior& other) 
    { 
        if (this != &other) 
	{  // Éviter l’auto-affectation
            delete[] name;  // Libérer l’ancienne mémoire
            name = new char[strlen(other.name) + 1];  // Nouvelle allocation mémoire
            strcpy(name, other.name);
            strength = other.strength;
        }
        return *this;
    }

    // 5/Destructeur
    ~Warrior() 
    {
        delete[] name;  // Libération de la mémoire allouée
    }

    // Méthode d'affichage
    void display() const 
    {
        std::cout << "Warrior: " << (name ? name : "Unknown") << ",
		Strength: " << strength << std::endl;
    }
};

int main() 
{
    Warrior w1("Conan", 100);  // Création d’un guerrier
    Warrior w2 = w1;  // Copie avec le constructeur de copie
    Warrior w3("Thor", 120);
    
    w3 = w1;  // Affectation avec l’opérateur d’affectation

    // Affichage des guerriers
    w1.display();
    w2.display();
    w3.display();

    return 0;
}

********************************************************************************************
