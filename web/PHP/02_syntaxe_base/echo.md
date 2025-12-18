# 📘 Le mot-clé `echo` en PHP

En PHP, `echo` est utilisé pour **afficher du texte ou des valeurs** dans le navigateur ou la sortie standard. C’est l’une des instructions les plus courantes.

---

## 🔹 1. Syntaxe de base

```php
echo "Bonjour le monde!";
```

- Affiche le texte `"Bonjour le monde!"`.
- Pas besoin de parenthèses, mais tu peux les utiliser :  

```php
echo("Bonjour le monde!");
```

---

## 🔹 2. Afficher plusieurs éléments

`echo` peut afficher **plusieurs chaînes ou variables séparées par des virgules** :

```php
$nom = "Alice";
$age = 21;

echo "Nom : ", $nom, ", Age : ", $age;
```

- Attention : **tu ne peux pas utiliser `+` pour concaténer des chaînes en PHP**, il faut utiliser `.`

```php
echo "Nom : " . $nom . ", Age : " . $age;
```

---

## 🔹 3. Différence avec `print`

| Caractéristique | `echo` | `print` |
|-----------------|---------|---------|
| Retourne une valeur | Non | Oui (toujours 1) |
| Peut afficher plusieurs valeurs | Oui | Non |
| Performance | Un peu plus rapide | Légèrement plus lent |

---

## 🔹 4. Afficher des variables

```php
$prenom = "Wayl";
echo "Bonjour $prenom";   // Bonjour Wayl
echo 'Bonjour $prenom';   // Bonjour $prenom (pas interprété)
```

- Avec **guillemets doubles `" "`**, les variables sont interprétées.  
- Avec **guillemets simples `' '`**, elles ne le sont pas.

---

## 🔹 5. Utilisation avec HTML

```php
echo "<h1>Bienvenue sur mon site</h1>";
echo "<p>Bonjour $prenom, bienvenue!</p>";
```

- `echo` peut afficher **du HTML** directement.

---

## 🔹 6. Afficher des caractères spéciaux

- Pour les **guillemets** :  

```php
echo "Il a dit : "Bonjour"";
```

- Pour **les sauts de ligne** dans HTML :

```php
echo "Ligne 1<br>Ligne 2<br>";
```

- Pour **les sauts de ligne dans la console** (CLI) :

```php
echo "Ligne 1
Ligne 2
";
```

---

## 🔹 7. Astuces

- `echo` est une **instruction, pas une fonction**, donc pas de `;` après chaque élément séparé.  
- Toujours terminer l’instruction par un **point-virgule `;`**.  
- Tu peux utiliser `echo` pour **déboguer** rapidement :  

```php
$val = 42;
echo "La valeur de val est $val";
```
