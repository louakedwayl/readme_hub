# Opérateurs d'insertion (<<) et d'extraction (>>) en C++

---

## 1. Introduction aux flux (streams)

En C++, la gestion des entrées/sorties se fait via des **flux** (`streams`).  
Les opérateurs fondamentaux pour travailler avec ces flux sont :

---

## 2. L'opérateur d'insertion `<<`

- Permet **d’envoyer** (insérer) des données dans un flux de sortie, comme `std::cout`.

### Exemple :

```cpp
int main() 
{
    std::cout << "Bonjour, utilisateur !" << std::endl;
    return 0;
}
```
## 3. L'opérateur d'extraction >>

    Permet de lire (extraire) des données depuis un flux d'entrée, comme std::cin.

Exemple :
```cpp
int main() 
{
    int age;
    std::cout << "Entrez votre âge : ";
    std::cin >> age;
    std::cout << "Vous avez " << age << " ans." << std::endl;
    return 0;   
}
```
## 4. Remarque

Ces opérateurs peuvent être surchargés pour fonctionner avec des objets personnalisés, ce qui facilite la gestion des entrées/sorties pour tes propres classes.
