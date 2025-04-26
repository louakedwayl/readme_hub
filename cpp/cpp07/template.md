					Template 
************************************************************************************************

1/ Qu’est-ce qu’un template ?
-----------------------------

Un template (ou modèle) permet d’écrire du code générique :
Le même code peut s’appliquer à plusieurs types (int, float, string, etc.).

C++ offre deux grands types de templates :

    template <typename T> pour les fonctions génériques

    template <typename T> pour les classes génériques

Cela évite la duplication du code avec différents types.

    typename sert à créer un type générique (T) qui sera remplacé automatiquement par le vrai type que tu passes 
    quand tu appelles la fonction.

Le compilateur fait tout le boulot pour toi, il déduit le bon type en fonction des paramètres que tu lui donnes.

2/ Templates de fonctions :
-----------------------------

Syntaxe :
---------

template <typename T>
T fonction(T a, T b) 
{
    // traitement générique
}

Exemple :
---------

template <typename T>
T max(T a, T b) 
{
    return (a > b) ? a : b;
}

int main() 
{
    std::cout << max(3, 7) << std::endl;      // max<int>
    std::cout << max(3.2, 1.1) << std::endl;  // max<double>
    std::cout << max('a', 'z') << std::endl;  // max<char>
}

📝 Le compilateur génère une version spécifique de la fonction selon le type utilisé.

3/ Templates de classes :
-------------------------

Syntaxe :
---------

template <typename T>
class Boite 
{
	private:
    		T valeur;
	public:
    		Boite(T v) : valeur(v) {}
    		T getValeur() const { return valeur; }
};

Utilisation :
-------------

Boite<int> b1(42);
Boite<std::string> b2("Coucou");

std::cout << b1.getValeur();    // 42
std::cout << b2.getValeur();    // Coucou

📦 Ici, Boite<T> est une classe générique. T peut être n'importe quel type.

4/ Typename vs class :
-------------------------

template <typename T>

// ou bien

template <class T>

Les deux sont identiques. Par convention, on utilise typename pour les fonctions modernes, et class est un héritage historique.

5/ Templates avec plusieurs types :
--------------------------------------

Tu peux utiliser plusieurs types génériques :

template <typename T, typename U>
void printPair(T a, U b) 
{
    std::cout << a << " et " << b << std::endl;
}

printPair(42, "hello");  // int et const char*

6/ ⚠️ Limites et erreurs fréquentes :
------------------------------------

    Ne pas mélanger des types incompatibles (ex: max(3, 4.2)) → Le compilateur ne saura pas quel type choisir.

    Trop de spécialisation rend le code plus dur à maintenir.

    Les templates sont générés au moment de la compilation → s’il y a une erreur, elle est parfois compliquée à lire .

***********************************************************************************************************************************
