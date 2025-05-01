				typename en C++
******************************************************************************************************************************

En C++, le mot-clé typename est utilisé principalement dans deux contextes :

    Déclaration de types dans des templates (spécialement avec les types dépendants de modèles).

    Pour indiquer que quelque chose est un type dans une expression de type.

1/ typename dans les Templates :
--------------------------------

	Quand tu écris des templates (modèles de classes ou de fonctions), il peut arriver que tu veuilles utiliser un type 
qui dépend d'un paramètre de modèle. Cependant, dans certains cas, le compilateur a besoin d'indication explicite pour 
savoir que tu fais référence à un type.

Prenons un exemple pour expliquer cela :

Exemple sans typename :

template <typename T>
void printFirstElement(T container) {
    // Supposons que container est un type qui a une méthode 'begin'
    auto it = container.begin();  // Cela fonctionne sans problème
    std::cout << *it << std::endl;
}

Si tu as une situation plus complexe où le type dépend d'un autre type dans un modèle, le compilateur peut ne pas être 
capable de comprendre que quelque chose est un type. Voici un exemple :

Exemple avec type dépendant d'un modèle :

template <typename T>
class Wrapper 
{
public:
    T value;
};

template <typename T>
void printValue(const Wrapper<T>& wrapper) 
{
    typename Wrapper<T>::value_type val = wrapper.value;  // Nécessite 'typename' ici
    std::cout << val << std::endl;
}

	Dans ce cas, Wrapper<T>::value_type est un type, mais le compilateur a besoin de savoir que tu fais référence à un type 
et pas à un membre de la classe. Le mot-clé typename est donc utilisé pour indiquer au compilateur que Wrapper<T>::value_type est 
un type et non un membre de l'objet.

2/ typename pour Spécifier des Types dans des Expressions de Type :
-------------------------------------------------------------------

	Parfois, lorsque tu utilises un type à l'intérieur d'un modèle de classe ou de fonction, le compilateur ne peut pas toujours
déterminer immédiatement si un membre est un type ou une valeur. Le mot-clé typename est alors nécessaire pour indiquer que c'est un type.

Exemple de type dépendant dans un modèle de classe :

template <typename T>
class MyClass {
public:
    typename T::nested_type value;  // Ici, on utilise 'typename' car T::nested_type est un type
};

	Si T est une classe qui a un type nested_type à l'intérieur, le compilateur a besoin de savoir qu'il s'agit d'un type,
donc le mot-clé typename est nécessaire.

Pourquoi utiliser typename ?

    Clarification pour le compilateur : Comme mentionné précédemment, le mot-clé typename est nécessaire pour indiquer explicitement 
qu'un nom est un type et non une variable ou un membre de la classe.

    Spécification des types dans des expressions complexes : Lorsque tu travailles avec des types complexes qui dépendent 
de modèles génériques, typename te permet d'écrire du code plus lisible et de clarifier l'intention du programmeur.

Exemple complet avec typename :
-------------------------------

Voici un exemple complet d'un modèle de fonction utilisant typename pour déclarer un type dépendant :

#include <iostream>
#include <vector>

template <typename T>
void printFirstElement(const T& container) {
    // Ici, container est une collection comme std::vector ou autre
    typename T::value_type firstElement = container[0]; // Utilisation de 'typename' pour un type dépendant
    std::cout << "First element: " << firstElement << std::endl;
}

int main() {
    std::vector<int> vec = {1, 2, 3, 4};
    printFirstElement(vec);  // Affichera "First element: 1"
}

Récapitulatif :
---------------

    Le mot-clé typename est utilisé dans les templates pour indiquer que quelque chose est un type, en particulier lorsqu'un nom dépend d'un paramètre de modèle.

    Il est nécessaire lorsque tu fais référence à un type dans un modèle qui est dépendant d'un autre type, et que le compilateur ne peut pas déduire immédiatement qu'il s'agit d'un type.

    typename aide à éviter les ambiguïtés et rend le code plus robuste.

***************************************************************************************************************************************
