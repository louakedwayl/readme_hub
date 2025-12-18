# Les tableaux associatifs

## 1. Qu'est-ce qu'un tableau associatif ?

Un **tableau associatif** est un tableau dont les clés sont **des chaînes de caractères** ou des **entiers personnalisés**, et non pas simplement des indices numériques comme dans un tableau classique.

- Permet de **stocker des données liées à un nom**.
- Idéal pour représenter des informations structurées.

---

## 2. Syntaxe

```php
$personne = [
    "nom" => "Alice",
    "prenom" => "Dupont",
    "age" => 25
];
```

- `"nom"`, `"prenom"`, `"age"` sont les **clés**.
- `"Alice"`, `"Dupont"`, `25` sont les **valeurs**.

---

## 3. Accéder aux valeurs

```php
echo $personne["nom"];      // Alice
echo $personne["prenom"];   // Dupont
echo $personne["age"];      // 25
```

- On utilise la **clé** pour accéder à la valeur correspondante.

---

## 4. Ajouter ou modifier une valeur

```php
$personne["ville"] = "Paris";      // Ajouter
$personne["age"] = 26;             // Modifier
```

---

## 5. Parcourir un tableau associatif

### Exemple avec `foreach`

```php
foreach ($personne as $cle => $valeur) {
    echo "$cle : $valeur\n";
}
```

**Résultat :**

```
nom : Alice
prenom : Dupont
age : 26
ville : Paris
```

---

## 6. Fonctions utiles avec les tableaux associatifs

| Fonction | Description |
|----------|-------------|
| `array_key_exists($key, $array)` | Vérifie si une clé existe |
| `in_array($value, $array)` | Vérifie si une valeur existe |
| `array_search($value, $array)` | Renvoie la clé correspondant à une valeur |
| `unset($array[$key])` | Supprime un élément du tableau |
| `count($array)` | Retourne le nombre d'éléments |

### Exemple

```php
if (array_key_exists("nom", $personne)) {
    echo "La clé 'nom' existe dans le tableau.\n";
}

if (in_array("Paris", $personne)) {
    echo "Paris est présent dans le tableau.\n";
}

$cle = array_search(26, $personne);
echo "La clé correspondant à 26 est : $cle\n";
```

---

## 7. Résumé

- Les tableaux associatifs utilisent des **clés personnalisées**.
- On accède aux valeurs via `$tableau["cle"]`.
- `foreach` permet de parcourir toutes les paires clé/valeur.
- Fonctions comme `array_key_exists`, `in_array`, `array_search` sont très utiles pour manipuler et vérifier les tableaux.
