# `static_cast`

`static_cast` est un **opérateur de conversion de type** en C++.  
Il permet de transformer une valeur d’un type vers un autre type de manière claire, sûre et contrôlée.

---

## 1/ Syntaxe :
```cpp
TypeCible variable = static_cast<TypeCible>(valeur);
```

### Exemple simple :
```cpp
int a = 42;
float b = static_cast<float>(a);  // b = 42.0
```