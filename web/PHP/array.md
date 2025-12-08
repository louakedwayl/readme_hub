# Les tableaux en PHP

## Introduction

Les tableaux (arrays) sont l'une des structures de données les plus utilisées en PHP. Ils permettent de stocker plusieurs valeurs dans une seule variable et offrent de nombreuses possibilités : tableaux indexés, associatifs, multidimensionnels, manipulation, parcours, fonctions utilitaires, etc.

Ce cours présente tout ce qu'il faut savoir pour maîtriser les tableaux en PHP.

---

## 1. Création d'un tableau

### 1.1. Tableau indexé

Un tableau indexé utilise des indices numériques (0, 1, 2...).

```php
$fruits = ["pomme", "banane", "orange"];
// ou
$fruits = array("pomme", "banane", "orange");
```

### 1.2. Tableau associatif

Les tableaux associatifs utilisent des clés personnalisées.

```php
$personne = [
    "nom" => "Dupont",
    "age" => 30,
    "profession" => "Développeur"
];
```

### 1.3. Tableau multidimensionnel

Des tableaux contenant d'autres tableaux.

```php
$classes = [
    "classe1" => ["Paul", "Julie", "Mehdi"],
    "classe2" => ["Luc", "Nina"]
];
```

---

## 2. Accéder aux éléments

### 2.1. Indexés

```php
echo $fruits[0]; // pomme
```

### 2.2. Associatifs

```php
echo $personne["nom"]; // Dupont
```

### 2.3. Multidimensionnels

```php
echo $classes["classe1"][1]; // Julie
```

---

## 3. Modifier et ajouter des éléments

### 3.1. Ajouter

```php
$fruits[] = "kiwi"; // Ajout automatique en fin de tableau
$personne["ville"] = "Paris";
```

### 3.2. Modifier

```php
$fruits[1] = "pastèque";
```

### 3.3. Supprimer

```php
unset($fruits[2]);
unset($personne["profession"]);
```

---

## 4. Parcourir un tableau

### 4.1. `foreach`

```php
foreach ($fruits as $fruit) {
    echo $fruit;
}
```

### 4.2. `foreach` avec clés

```php
foreach ($personne as $cle => $valeur) {
    echo "$cle : $valeur";
}
```

### 4.3. `for` (pour tableaux indexés)

```php
for ($i = 0; $i < count($fruits); $i++) {
    echo $fruits[$i];
}
```

---

## 5. Fonctions utiles pour les tableaux

### 5.1. Compter les éléments

```php
count($fruits);
```

### 5.2. Trier les tableaux

```php
sort($fruits); // Tri croissant
rsort($fruits); // Tri décroissant
```

### 5.3. Trier les tableaux associatifs

```php
asort($personne); // Tri par valeurs
ksort($personne); // Tri par clés
```

### 5.4. Rechercher

```php
in_array("pomme", $fruits); // true
array_search("pomme", $fruits); // renvoie l'indice
```

### 5.5. Fusionner des tableaux

```php
$tab1 = [1, 2];
$tab2 = [3, 4];
$merge = array_merge($tab1, $tab2);
```

---

## 6. Tableaux et fonctions avancées

### 6.1. `array_map`

Appliquer une fonction à chaque élément.

```php
$majuscules = array_map('strtoupper', $fruits);
```

### 6.2. `array_filter`

Filtrer les éléments selon une condition.

```php
$longs = array_filter($fruits, function($fruit) {
    return strlen($fruit) > 5;
});
```

### 6.3. `array_reduce`

Réduire un tableau à une seule valeur.

```php
$total = array_reduce([1,2,3], fn($carry, $item) => $carry + $item);
```

---

## 7. Tableaux et JSON

```php
$json = json_encode($personne);
$tableau = json_decode($json, true);
```

---

## Conclusion

Les tableaux sont indispensables en PHP. Ils offrent une flexibilité énorme et s'adaptent à de nombreux usages : stockage de données, traitement, manipulation, communication avec des APIs, etc. Avec les fonctions avancées, ils deviennent de puissants outils pour écrire du code clair et efficace.
