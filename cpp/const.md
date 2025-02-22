						const
*************************************************************************************

1/ Introduction :
-----------------

	Le mot-clé const permet de déclarer des éléments dont la valeur ne peut pas être 
modifiée après initialisation. Cela aide à protéger des données et rend le code 
plus sûr et plus lisible.

2/ Variables constantes :
-------------------------

	Déclarer une variable avec const signifie qu’elle ne pourra jamais changer de valeur.

Exemple :
---------

#include <iostream>

int main() 
{
    const int nombre = 10;  // 'nombre' est constant
    std::cout << "Nombre : " << nombre << std::endl;

    // nombre = 20;  // Erreur : impossible de modifier une constante
    return 0;
}

3/ const et les pointeurs :
---------------------------

L'utilisation de const avec des pointeurs peut se faire de plusieurs manières. 
On distingue souvent deux types de constance :

    Constance de haut niveau (top-level const) : s'applique à la variable elle-même.
    Constance de bas niveau (low-level const) : s'applique à la valeur pointée ou référencée.

3.1 Pointeur vers une valeur constante :
----------------------------------------

	Le pointeur peut changer d'adresse, mais la valeur pointée ne peut pas être modifiée 
via ce pointeur.

Exemple :
---------

int x = 5, y = 10;
const int* ptr = &x;  // 'ptr' pointe vers un int constant
// *ptr = 7;         // Erreur : on ne peut pas modifier la valeur via 'ptr'
ptr = &y;             // OK : 'ptr' peut pointer vers un autre int


3.2 Pointeur constant :
-----------------------

	Ici, l'adresse stockée dans le pointeur est fixe, mais la valeur pointée 
peut être modifiée.

int x = 5, y = 10;
int* const ptr = &x;  // 'ptr' est constant, il doit toujours pointer sur 'x'
*ptr = 7;             // OK : modification de la valeur pointée
// ptr = &y;         // Erreur : impossible de changer l'adresse contenue dans 'ptr'


3.3 Pointeur constant vers une valeur constante :
-------------------------------------------------

	Ni la valeur pointée ni l'adresse ne peuvent être modifiées.

int x = 5;
const int* const ptr = &x;  // 'ptr' est constant et pointe vers une valeur constante
// *ptr = 7;                // Erreur : modification de la valeur interdite
// ptr = &y;                // Erreur : changement d'adresse interdit

4/ const dans les fonctions :
-----------------------------

4.1 Paramètres constants :
--------------------------

	Déclarer un paramètre comme const permet de s'assurer que la fonction ne modifie 
pas la valeur passée, surtout utile pour les objets ou pour éviter de copier de grosses structures.

Exemple :
---------

void afficher(const int valeur) 
{
    // valeur = 5;  // Erreur : 'valeur' est constant
    std::cout << "Valeur : " << valeur << std::endl;
}

4.2 Méthodes constantes dans une classe :
-----------------------------------------

	En déclarant une méthode membre avec le suffixe const, tu garantis que cette méthode 
n'altère pas l'état de l'objet. Le compilateur s'assure alors qu'aucun membre non mutable 
n'est modifié.

Exemple :
---------

class Point 
{
private:
    int x, y;
public:
    Point(int x_val, int y_val) : x(x_val), y(y_val) {}

    // Méthode constante : n'autorise pas la modification des membres
    void afficher() const {
        std::cout << "Point(" << x << ", " << y << ")" << std::endl;
    }

    // Méthode non constante pouvant modifier l'objet
    void deplacer(int dx, int dy) {
        x += dx;
        y += dy;
    }
};

int main() {
    Point p(1, 2);
    p.afficher();
    // p.deplacer(3, 4); // Modifie 'p'
    return 0;
}

**************************************************************************************************

