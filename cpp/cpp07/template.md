# Template 
************************************************************************************************

## 1. Qu’est-ce qu’un template ?

Un **template** (ou modèle) permet d’écrire du **code générique** :  
Le même code peut s’appliquer à plusieurs types (`int`, `float`, `string`, etc.).

En C++, il existe deux grands types de templates :
- `template <typename T>` pour les **fonctions génériques**  
- `template <typename T>` pour les **classes génériques**

Cela évite de dupliquer le code pour chaque type.  

> **`typename`** sert à créer un type générique (`T`) qui sera remplacé automatiquement par le vrai type que tu passes lors de l’appel.  
> Le compilateur **déduit le type** en fonction des paramètres fournis.

---

## 2. Templates de fonctions :

### Syntaxe :
```cpp
template <typename T>
T fonction(T a, T b) 
{
    // traitement générique
}
```

### Exemple :

```cpp
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
```

📝 Note : Le compilateur génère une version spécifique de la fonction selon le type utilisé.

## 3. Templates de classes :

### Syntaxe :

```cpp
template <typename T>
class Boite 
{
private:
    T valeur;
public:
    Boite(T v) : valeur(v) {}
    T getValeur() const { return valeur; }
};
```

### Utilisation :

```cpp
Boite<int> b1(42);
Boite<std::string> b2("Coucou");

std::cout << b1.getValeur();    // 42
std::cout << b2.getValeur();    // Coucou
```

Ici, Boite<T> est une classe générique : T peut être n’importe quel type.

## 4. Typename vs class :

```cpp
template <typename T>
// ou bien
template <class T>
```

Les deux sont identiques.
Par convention, typename est utilisé pour les fonctions modernes.
class est un héritage historique.

## 5. Templates avec plusieurs types :

Tu peux utiliser plusieurs types génériques :

```cpp
template <typename T, typename U>
void printPair(T a, U b) 
{
    std::cout << a << " et " << b << std::endl;
}

printPair(42, "hello");  // int et const char*
```

## 6. Limites et erreurs fréquentes :

Ne pas mélanger des types incompatibles (ex : max(3, 4.2)) → le compilateur ne saura pas quel type choisir.

Trop de spécialisation rend le code plus difficile à maintenir.

Les templates sont générés à la compilation → les erreurs peuvent être complexes à lire.