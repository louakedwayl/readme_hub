# La balise `<pre>` et son utilisation en PHP avec `print_r()`

## 1. 📌 Qu'est-ce que la balise `<pre>` ?

La balise HTML `<pre>` signifie **preformatted text**.

Elle sert à afficher du texte tel qu'il est, en préservant :
* les espaces
* les retours à la ligne
* l'indentation

➡️ Ce que tu mets entre `<pre>...</pre>` apparaît exactement comme écrit.

### Exemple simple :

```html
<pre>
Ligne 1
    Ligne 2 indentée
Ligne 3
</pre>
```

---

## 2. 🔥 Pourquoi `<pre>` est utile avec PHP ?

Certaines fonctions PHP affichent du contenu sous forme "brute", comme :
* `print_r()`
* `var_dump()`

**Le problème :** ➡️ Sans `<pre>`, l'affichage est compressé, difficile à lire dans le navigateur.

### Exemple SANS `<pre>` :

```php
$array = ["nom" => "Wayl", "age" => 20];
print_r($array);
```

Dans le navigateur, cela peut donner :

```
Array ( [nom] => Wayl [age] => 20 )
```

Tout est sur une seule ligne → pas lisible.

---

## 3. ✔️ Exemple AVEC la balise `<pre>`

La technique classique :

```php
$array = ["nom" => "Wayl", "age" => 20];

echo "<pre>";
print_r($array);
echo "</pre>";
```

### Résultat lisible :

```
Array
(
    [nom] => Wayl
    [age] => 20
)
```

➡️ Beaucoup plus propre pour déboguer.

---

## 4. 💡 Alternative : utiliser `print_r($var, true)`

`print_r()` peut retourner une string au lieu d'afficher :

```php
$array = ["nom" => "Wayl", "age" => 20];

echo "<pre>" . print_r($array, true) . "</pre>";
```

C'est utile quand tu veux construire un texte avant de l'afficher.

---

## 5. 🎯 À quoi sert vraiment `<pre>` en PHP ?

✔️ **Déboguer des tableaux et objets**  
`print_r()` + `<pre>` = meilleure lisibilité.

✔️ **Afficher du code source**  
(HTML, SQL, JSON, etc.)

✔️ **Afficher des logs formatés**  
Exemple : affichage de traces, messages système…

---

## 6. 🆚 `print_r()` vs `var_dump()` ?

* `print_r()` → lisible, léger
* `var_dump()` → plus détaillé (types, tailles)

### Avec `<pre>` :

```php
echo "<pre>";
var_dump($array);
echo "</pre>";
```

---

## 7. 💎 Astuce pro (très utilisée par les devs)

Créer une fonction "debug" :

```php
function debug($var) {
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}
```

### Utilisation :

```php
debug($_POST);
debug($userData);
```

---

## 🎉 Conclusion

La balise `<pre>` est essentielle dès que tu veux afficher du texte formaté en HTML. En PHP, elle est surtout utilisée avec `print_r()`, `var_dump()`, etc., pour obtenir un affichage propre et lisible lors du débogage.
