# `typename` en C++

En C++, le mot-clé **`typename`** est utilisé principalement dans **deux contextes** :

1. **Dans les templates** : pour indiquer qu’un élément dépendant d’un template est un **type**.  
2. **Dans des expressions de type** : pour lever les ambiguïtés entre types et membres/valeurs.

---

## 1/ `typename` dans les Templates :

Lorsqu’on écrit des templates (fonctions ou classes), on manipule souvent des types **dépendants d’un paramètre de modèle**.  
Le compilateur peut **ne pas savoir** si un nom fait référence à un type ou à un membre.  
`typename` clarifie que c’est un **type**.

### Exemple simple (pas besoin de `typename`) :
```cpp
template <typename T>
void printFirstElement(T container) {
    auto it = container.begin();  // OK, pas besoin de typename ici
    std::cout << *it << std::endl;
}
```

### Exemple où typename est nécessaire :

```cpp
template <typename T>
class Wrapper {
public:
    typedef T value_type;
    value_type value;
};

template <typename T>
void printValue(const Wrapper<T>& wrapper) {
    typename Wrapper<T>::value_type val = wrapper.value;  // 'typename' obligatoire
    std::cout << val << std::endl;
}
```

Ici, Wrapper<T>::value_type est un type dépendant.
Le compilateur a besoin de typename pour savoir qu'il s'agit d’un type et non d’un membre.

## 2/ typename dans des Expressions de Type :

Quand on accède à un type imbriqué dans un modèle, il faut utiliser typename pour lever l’ambiguïté.

### Exemple :

```cpp
template <typename T>
class MyClass {
public:
    typename T::nested_type value;  // 'typename' car T::nested_type est un type
};
```

Sans typename, le compilateur peut croire que nested_type est une valeur statique, pas un type.
Pourquoi utiliser typename ?

Clarifie l’intention : indique explicitement qu’un élément est un type.

Évite les ambiguïtés dans les expressions complexes avec des modèles.

Rend le code plus robuste et lisible.

### Exemple complet :

```cpp
#include <iostream>
#include <vector>

template <typename T>
void printFirstElement(const T& container) {
    typename T::value_type firstElement = container[0];  // 'typename' requis
    std::cout << "First element: " << firstElement << std::endl;
}

int main() {
    std::vector<int> vec = {1, 2, 3, 4};
    printFirstElement(vec);  // Affiche : First element: 1
}
```

### Récapitulatif :

typename : utilisé dans les templates pour signaler qu’un identifiant dépendant est un type.

Obligatoire pour les types dépendants d’un paramètre de modèle (ex: T::value_type).

But : lever les ambiguïtés et clarifier le code pour le compilateur.

