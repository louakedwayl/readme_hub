# `std::lower_bound`
---

## 1/ Qu’est-ce que `lower_bound` ? 

`lower_bound` est une fonction qui permet de **trouver la première position dans une séquence triée où une valeur peut être insérée sans casser l’ordre**.

### Il existe deux formes :
- `std::lower_bound()` dans `<algorithm>` pour les **tableaux, vecteurs**, etc.
- `map.lower_bound()` pour les **conteneurs triés** comme `std::map` ou `std::set`.

---

## 2/ `std::map::lower_bound` : utilisé dans **BitcoinExchange**

### Prototype :
```cpp
iterator map.lower_bound(const Key& key);
```

### Description :

Cherche la première clé ≥ key

Renvoie un itérateur vers cette position

### Important :

Si la clé exacte existe → il la trouve.

Si la clé n’existe pas → il renvoie la première clé plus grande.

Si toutes les clés sont plus petites → il renvoie map.end().

### Exemple :

```cpp
#include <iostream>
#include <map>
#include <string>

int main() 
{
    std::map<std::string, float> rates;
    rates["2011-01-01"] = 0.5f;
    rates["2011-01-03"] = 0.6f;
    rates["2011-01-09"] = 0.7f;

    std::string query = "2011-01-05";

    std::map<std::string, float>::iterator it = rates.lower_bound(query);

    if (it == rates.end()) 
    {
        std::cout << "Pas de date supérieure ou égale à " << query << std::endl;
    }
    else 
    {
        std::cout << "Date trouvée: " << it->first << " => " << it->second << std::endl;
    }
    return 0;
}
```

3/ std::lower_bound — Version pour tableaux et std::vector

Nécessite <algorithm>.

### Prototype :

```cpp
template< class ForwardIt, class T >
ForwardIt lower_bound(ForwardIt first, ForwardIt last, const T& value);
```

### Exemple :

```cpp
std::vector<int> v = {1, 3, 5, 7, 9};
auto it = std::lower_bound(v.begin(), v.end(), 6); // renvoie it sur 7
```
### Préconditions :

Pour que lower_bound fonctionne correctement :

Le conteneur doit être trié par ordre croissant.

Sinon, le résultat est incohérent ou faux.

## 4/ Dans quel cas utiliser lower_bound ?

### Exemple d’utilisation dans BitcoinExchange :

Pour obtenir la valeur de taux la plus proche dans le passé :

```cpp

std::map<std::string, float>::iterator it = _exchangeRates.lower_bound(input_date);

if (it != _exchangeRates.end() && it->first == input_date) 
{
    // date exacte
} 
else 
{
    if (it == _exchangeRates.begin()) 
    {
        // aucune date avant → erreur    
    } 
    else 
    {
        --it; // on recule vers la date la plus proche < input_date
    }
}
```