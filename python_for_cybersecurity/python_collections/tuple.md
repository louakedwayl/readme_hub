# Les Tuples en Python

## C'est quoi ?

Un tuple est une **collection ordonnée et immuable** de valeurs.  
Immuable = une fois créé, on ne peut pas le modifier.

```python
coordonnees = (48.8566, 2.3522)  # Paris
personne = ("Wayl", 25, "Paris")
singleton = (42,)                # virgule obligatoire pour un seul élément
vide = ()
```

---

## Les bases

```python
# Accès par index (comme une liste)
personne = ("Wayl", 25, "Paris")
print(personne[0])   # "Wayl"
print(personne[-1])  # "Paris"

# Déstructuration (unpacking)
nom, age, ville = personne
print(nom)   # "Wayl"

# Longueur
len(personne)  # 3

# Vérifier la présence
"Wayl" in personne  # True
```

---

## Tuple vs Liste

| | Tuple `()` | Liste `[]` |
|---|---|---|
| Modifiable | ❌ | ✅ |
| Performance | Plus rapide | Plus lente |
| Usage | Données fixes | Données dynamiques |

---

## Comparaison avec les autres langages

### JavaScript
JS n'a pas de tuple natif.  
L'équivalent le plus proche : un **tableau figé avec `Object.freeze()`**.

```js
const coordonnees = Object.freeze([48.8566, 2.3522]);
// coordonnees[0] = 0  → silencieusement ignoré (ou erreur en strict mode)
```

Depuis ES2023, on utilise parfois des **records** (proposition TC39) mais pas encore standard.  
En pratique, les devs JS utilisent simplement des tableaux `[]` sans se poser la question.

---

### C
En C, pas de tuple non plus.  
L'équivalent : une **struct** pour grouper des types différents.

```c
typedef struct {
    double latitude;
    double longitude;
} Coordonnees;

Coordonnees paris = {48.8566, 2.3522};
```

La struct C est l'ancêtre conceptuel du tuple : grouper des données hétérogènes sous un seul nom.  
Différence clé : la struct C est mutable par défaut (sauf `const`).

---

### PHP
PHP n'a pas de tuple natif non plus.  
Équivalent habituel : un **tableau indexé** `[]`.

```php
$coordonnees = [48.8566, 2.3522];
$personne = ["Wayl", 25, "Paris"];

// Déstructuration (PHP 7.1+)
[$nom, $age, $ville] = $personne;
```

PHP propose aussi `list()` pour l'unpacking, mais tout reste mutable.

---

## Pourquoi utiliser un tuple plutôt qu'une liste ?

1. **Intention claire** — signale que la donnée ne doit pas changer
2. **Performance** — légèrement plus rapide en lecture
3. **Hashable** — peut servir de **clé de dictionnaire** (la liste ne peut pas)

```python
# Cas d'usage typique : clé de dictionnaire
cache = {}
cache[(48.8566, 2.3522)] = "Paris"  # ✅ fonctionne

cache[[48.8566, 2.3522]] = "Paris"  # ❌ TypeError : liste non hashable
```

---

## Résumé

- Tuple = liste en lecture seule
- JS/PHP → pas d'équivalent natif, on simule avec des tableaux
- C → la struct est l'ancêtre conceptuel
- Cas d'usage principal en Python : **retour multiple de fonctions**, **clés de dict**, **données constantes**

```python
def get_dimensions():
    return (1920, 1080)  # retour multiple classique

width, height = get_dimensions()
```
