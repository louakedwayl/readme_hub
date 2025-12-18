# Tester clés et valeurs dans les tableaux

En PHP, il existe plusieurs fonctions pour vérifier l'existence d'une clé, d'une valeur, ou retrouver la clé associée à une valeur dans un tableau. Les trois plus utilisées sont :

* `array_key_exists()`
* `in_array()`
* `array_search()`

---

## 1. 🔑 `array_key_exists()`

### 👉 Vérifie si une clé existe dans un tableau

Cette fonction répond à :  
**« Est-ce que ce tableau contient cette clé ? »**

### ✔ Exemple simple

```php
$personne = [
    "nom" => "Alice",
    "age" => 25
];

if (array_key_exists("age", $personne)) {
    echo "La clé 'age' existe.";
}
```

### ✔ Résultat

```
La clé 'age' existe.
```

### ✔ À retenir

* Vérifie les **clés**, pas les valeurs.
* Fonctionne sur les tableaux associatifs et numérotés.
* `isset()` peut sembler similaire, mais ne détecte pas les clés dont la valeur est `NULL`, contrairement à `array_key_exists()`.

---

## 2. 🎯 `in_array()`

### 👉 Vérifie si une valeur existe dans un tableau

Elle répond à :  
**« Est-ce que cette valeur est présente dans le tableau ? »**

### ✔ Exemple

```php
$fruits = ["pomme", "banane", "orange"];

if (in_array("banane", $fruits)) {
    echo "La valeur existe.";
}
```

### ✔ Résultat

```
La valeur existe.
```

### ⚙️ Mode strict (type vérifié)

```php
$numbers = ["5", 5];

var_dump(in_array(5, $numbers, true)); // true
```

En mode strict :
* `"5"` (string) ≠ `5` (int)
* donc le résultat est `true` uniquement si `5` existe tel quel.

---

## 3. 🔍 `array_search()`

### 👉 Récupère la clé correspondant à une valeur

Elle répond à :  
**« Donne-moi la clé associée à cette valeur. »**

### ✔ Exemple

```php
$capitales = [
    "France" => "Paris",
    "Italie" => "Rome",
    "Espagne" => "Madrid"
];

$cle = array_search("Rome", $capitales);

echo $cle;  // Italie
```

### ✔ Résultat

```
Italie
```

### ⚠️ Attention

Si la valeur n'existe pas, `array_search()` renvoie `false`.

---

## 4. 🧩 Résumé rapide

| Fonction | Vérifie quoi ? | Retourne quoi ? |
|----------|----------------|-----------------|
| `array_key_exists()` | l'existence d'une clé | `true` / `false` |
| `in_array()` | l'existence d'une valeur | `true` / `false` |
| `array_search()` | cherche une valeur et donne sa clé | clé ou `false` |

---

## 5. 🎓 Exemple pratique complet

```php
$utilisateur = [
    "id" => 10,
    "nom" => "Kevin",
    "role" => "admin"
];

// 1. Vérifier si la clé "role" existe
if (array_key_exists("role", $utilisateur)) {
    echo "La clé 'role' existe.\n";
}

// 2. Vérifier si l'utilisateur est admin
if (in_array("admin", $utilisateur)) {
    echo "Cet utilisateur est admin.\n";
}

// 3. Trouver la clé du nom
$cleNom = array_search("Kevin", $utilisateur);
echo "La clé du nom est : $cleNom\n";
```

### Résultat

```
La clé 'role' existe.
Cet utilisateur est admin.
La clé du nom est : nom
```
