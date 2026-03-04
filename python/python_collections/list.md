# Python Lists

Une **liste** en Python est une collection **ordonnée** et **modifiable** d'éléments.

## Syntaxe

```python
# Créer une liste
ma_liste = [1, 2, 3, "Python"]

# Ajouter un élément
ma_liste.append(4)

# Accéder à un élément
print(ma_liste[0])  # 1

# Modifier un élément
ma_liste[1] = 10

# Supprimer un élément
del ma_liste[2]
```

## Caractéristiques

- **Ordonnée** → les éléments gardent leur ordre
- **Modifiable** → on peut ajouter, supprimer, changer des éléments
- **Autorise les doublons** → `[1,1,2]` est valide
- **Peut contenir des types différents** → `[1, "texte", True]` est valide

## Méthodes utiles

| Méthode     | Description                     |
|------------|---------------------------------|
| `append(x)` | Ajouter un élément à la fin     |
| `insert(i, x)` | Ajouter un élément à l'index `i` |
| `remove(x)` | Supprimer le premier élément `x` |
| `pop([i])` | Retirer et retourner l'élément à `i` |
| `sort()`   | Trier la liste                  |
| `reverse()` | Inverser la liste              |

## Comparaison des listes/arrays

Une **list** en Python se comporte très similairement à un **array** en JavaScript ou en C, mais il y a quelques différences importantes selon le langage.

## Comparaison

| Langage     | Structure équivalente | Notes importantes |
|------------|----------------------|-----------------|
| Python     | `list`               | Ordonnée, modifiable, peut contenir des types différents (`[1, "texte", True]`) |
| JavaScript | `Array`              | Ordonné, modifiable, peut contenir des types différents (`[1, "texte", true]`) |
| C          | tableau (`int arr[5];`) | Ordonné, taille fixe, un seul type par tableau (ex: `int`), pas de méthode intégrée comme `.append()` |

## Exemples

### Python

```python
lst = [1, 2, 3, "Python"]
lst.append(4)
print(lst)  # [1, 2, 3, "Python", 4]
```

### JavaScript

```javascript
let arr = [1, 2, 3, "JS"];
arr.push(4);
console.log(arr); // [1, 2, 3, "JS", 4]
```
### C

```c
#include <stdio.h>

int main() {
    int arr[5] = {1, 2, 3, 4, 5};
    printf("%d\n", arr[0]); // 1
    // Impossible d'ajouter un élément comme append()
}
```
## 💡 Résumé rapide

- **Python `list` = JS `Array`** → flexible, peut contenir différents types, taille dynamique  
- **C `array`** → statique, type unique, pas de méthode intégrée

