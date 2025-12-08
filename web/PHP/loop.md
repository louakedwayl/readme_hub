# 🔁 Les Boucles en PHP

Les boucles permettent d'exécuter plusieurs fois une portion de code.
Elles sont essentielles pour automatiser des tâches répétitives.

PHP propose quatre types principaux de boucles :

-   `while`
-   `do...while`
-   `for`
-   `foreach`

## 1. 🌀 La boucle **while**

La boucle `while` exécute un bloc de code **tant qu'une condition est
vraie**.

### Syntaxe

``` php
while (condition) {
    // instructions
}
```

### Exemple

``` php
$i = 1;

while ($i <= 5) {
    echo "Valeur : $i <br>";
    $i++;
}
```

## 2. 🔄 La boucle **do...while**

Similaire à `while`, mais le bloc de code est exécuté **au moins une
fois**, même si la condition est fausse.

### Syntaxe

``` php
do {
    // instructions
} while (condition);
```

### Exemple

``` php
$i = 1;

do {
    echo "Valeur : $i <br>";
    $i++;
} while ($i <= 5);
```

## 3. 🔁 La boucle **for**

Utilisée lorsque le nombre d'itérations est connu à l'avance.

### Syntaxe

``` php
for (initialisation; condition; incrément) {
    // instructions
}
```

### Exemple

``` php
for ($i = 1; $i <= 5; $i++) {
    echo "Itération : $i <br>";
}
```

## 4. 📦 La boucle **foreach**

Spécialement conçue pour parcourir les **tableaux**.

### Syntaxe

``` php
foreach ($tableau as $valeur) {
    // instructions
}
```

Ou avec clé + valeur :

``` php
foreach ($tableau as $cle => $valeur) {
    // instructions
}
```

### Exemple

``` php
$fruits = ["Pomme", "Banane", "Orange"];

foreach ($fruits as $fruit) {
    echo $fruit . "<br>";
}
```

## 5. 🧩 Instructions de contrôle dans les boucles

### `break`

Permet de **sortir immédiatement** d'une boucle.

``` php
for ($i = 1; $i <= 10; $i++) {
    if ($i == 5) break;
    echo $i;
}
```

### `continue`

Permet de **passer à l'itération suivante** sans exécuter la suite du
bloc courant.

``` php
for ($i = 1; $i <= 5; $i++) {
    if ($i == 3) continue;
    echo $i;
}
```

## 6. 🧠 Bonnes pratiques

-   Utiliser `for` pour les boucles numériques.
-   Utiliser `foreach` lorsque vous manipulez des tableaux.
-   Toujours vérifier que vos boucles ont une **condition d'arrêt** pour
    éviter les boucles infinies.
-   Préférer `foreach` à `for` pour parcourir des tableaux (plus lisible
    et plus sûr).

## 🎯 Conclusion

Les boucles en PHP sont un outil puissant pour automatiser des tâches
répétitives. Comprendre leurs particularités permet d'écrire du code
plus clair, plus efficace et plus robuste.
