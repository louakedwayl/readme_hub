# Les Spécialisations de Templates

Parfois, on veut **modifier le comportement d’un template** pour un **type particulier**.  

Exemple classique :
- Un `int` se traite normalement.  
- Un `bool` s'affiche en **"true"/"false"** au lieu de **1/0**.  

La **spécialisation** permet d’adapter un template pour un type précis.

---

## Spécialisation complète d'une fonction template :
Définir un **comportement spécifique** pour un type donné.

### Exemple :
```cpp
#include <iostream>
#include <string>

// Template général
template<typename T>
void afficher(T valeur) 
{
    std::cout << "Valeur générique : " << valeur << std::endl;
}

// Spécialisation pour bool
template<>
void afficher<bool>(bool valeur) 
{
    std::cout << (valeur ? "true" : "false") << std::endl;
}

int main() 
{
    afficher(42);      // Utilise la version générique
    afficher(true);    // Utilise la spécialisation
}
```

### Sortie :

```bash
Valeur générique : 42
true
```

### Spécialisation complète d'une classe template :

Changer complètement le comportement d’une classe pour un type donné.

### Exemple :

```cpp
#include <iostream>

// Template général
template<typename T>
class Boite 
{
public:
    void afficher() 
    {
        std::cout << "Boîte générique" << std::endl;
    }
};

// Spécialisation pour int
template<>
class Boite<int> 
{
public:
    void afficher() 
    {
        std::cout << "Boîte pour int" << std::endl;
    }
};

int main() 
{
    Boite<double> b1;
    b1.afficher();  // Générique

    Boite<int> b2;
    b2.afficher();  // Spécialisé
}
```

### Sortie :

```bash
Boîte générique
Boîte pour int
```

### Spécialisation partielle :

Modifier seulement une partie du comportement sans tout refaire.

### Exemple :

```cpp
#include <iostream>

template<typename T, typename U>
class Paire 
{
public:
    void afficher() {
        std::cout << "Paire générique" << std::endl;
    }
};

// Spécialisation partielle : si U est int
template<typename T>
class Paire<T, int> 
{
public:
    void afficher() 
    {
        std::cout << "Paire avec int" << std::endl;
    }
};

int main() 
{
    Paire<double, char> p1;
    p1.afficher();    // Générique

    Paire<float, int> p2;
    p2.afficher();    // Spécialisé
}
```

### Sortie :

```bash
Paire générique
Paire avec int
```

### Attention aux règles :

Une spécialisation complète doit reprendre exactement le même nombre de paramètres.

Dans une spécialisation complète, on écrit template<> sans typename.

Une spécialisation partielle garde template<typename...> avec les paramètres restants.

Toujours placer la spécialisation après la déclaration générale.

### Résumé rapide :

| Type                      | Exemple                              | Remarque                    |
|---------------------------|--------------------------------------|----------------------------|
| **Générique**            | `template<typename T> class X {};`   | Fonctionne pour tous les types |
| **Spécialisation complète** | `template<> class X<int> {};`         | Cas totalement différent      |
| **Spécialisation partielle** | `template<typename T> class X<T, int> {};` | Adapter pour certains cas     |


