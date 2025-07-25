# Standard Template Library (STL) en C++

## 1/ Introduction :

La **Standard Template Library (STL)** est une **bibliothèque C++ standardisée** qui fournit :

- **Conteneurs** : structures de données génériques.  
- **Algorithmes** : recherche, tri, manipulation.  
- **Itérateurs** : pour parcourir les conteneurs.  
- **Foncteurs** : objets fonctions pour personnaliser les comportements.  

La STL est **générique** (basée sur `template<typename T>`), ce qui la rend **flexible** et **performante**.

---

## 2/ Les Conteneurs (Containers) :

Les **conteneurs** stockent et organisent les données.

- **`vector`** : tableau dynamique (accès rapide par index).  
- **`list`** : liste doublement chaînée.  
- **`deque`** : double-ended queue (ajout/suppression aux deux extrémités).  
- **`set`** : ensemble de valeurs **uniques** (triées).  
- **`map`** : table **clé-valeur** (triée).  

---

## 3/ Les Algorithmes :

La STL propose de nombreux **algorithmes génériques** :

- **Recherche** : `find`, `binary_search`, `count`.  
- **Tri** : `sort`, `stable_sort`.  
- **Modification** : `copy`, `swap`, `reverse`.  
- **Tests** : `all_of`, `any_of`, `none_of`.  
- **Autres** : `accumulate` (somme), `transform`, `fill`.  

Ils sont **souvent utilisés avec des itérateurs**.

---

## 4/ Les Itérateurs :

Les **itérateurs** permettent de parcourir les conteneurs.  

### Types d'itérateurs :
- **InputIterator** : lecture (ex : `istream_iterator`).  
- **OutputIterator** : écriture (ex : `ostream_iterator`).  
- **ForwardIterator** : avance uniquement.  
- **BidirectionalIterator** : avance et recule (ex : `list`).  
- **RandomAccessIterator** : accès direct (ex : `vector`).  

**Exemple :**

```cpp
std::vector<int> v = {1, 2, 3, 4};
for (std::vector<int>::iterator it = v.begin(); it != v.end(); ++it)
    std::cout << *it << std::endl;
```

## 5/ Les Foncteurs (Function Objects) :

Un foncteur est un objet qui se comporte comme une fonction.

### Exemple simple :

```cpp
struct MultiplyByTwo 
{
    int operator()(int x) const { return x * 2; }
};

MultiplyByTwo m;

std::cout << m(10); // affiche 20
```

Utilisés souvent dans les algorithmes (ex : sort avec comparateur personnalisé).

## 6/ Avantages de la STL :

Gain de temps : structures prêtes à l’emploi.

Efficacité : implémentations hautement optimisées.

Sécurité : réduit les erreurs de gestion mémoire.

Flexibilité : grâce aux templates.

