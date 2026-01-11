# L'opérateur ternaire en PHP

L'opérateur ternaire en PHP est une **sorte de raccourci pour les instructions `if/else`**. Il permet de simplifier l'écriture de conditions simples en une seule ligne.

---

## 1. Syntaxe

```php
condition ? valeur_si_vrai : valeur_si_faux;
```

* `condition` : expression qui retourne `true` ou `false`.
* `valeur_si_vrai` : valeur assignée ou exécutée si la condition est vraie.
* `valeur_si_faux` : valeur assignée ou exécutée si la condition est fausse.

---

## 2. Exemple de base

```php
<?php
$age = 20;
$message = $age >= 18 ? "Adulte" : "Mineur";
echo $message; // Adulte
?>
```

* Si `$age >= 18` est vrai → `$message = "Adulte"`
* Sinon → `$message = "Mineur"`

---

## 3. Exemple avec tableau

```php
<?php
$input = ['username' => ' Alice '];
$username = isset($input['username']) ? trim($input['username']) : '';
echo $username; // Alice
?>
```

* Vérifie si `$input['username']` existe (`isset`).
* Si oui → supprime les espaces avec `trim()`.
* Si non → valeur vide `''`.

---

## 4. Exemple imbriqué (ternaire multiple)

```php
<?php
$score = 85;
$result = $score >= 90 ? 'Excellent' : ($score >= 70 ? 'Bien' : 'Insuffisant');
echo $result; // Bien
?>
```

* On peut imbriquer plusieurs ternaires, mais il faut faire attention à la **lisibilité**.

---

## 5. Bonnes pratiques

1. Utiliser le ternaire pour les **conditions simples et lisibles**.
2. Éviter d’imbriquer trop de ternaires → préférez `if/else` pour plus de clarté.
3. Très pratique pour **initialiser des variables** rapidement selon une condition.
4. Peut être utilisé directement dans `echo` ou `return` :

```php
echo $age >= 18 ? 'Adulte' : 'Mineur';
return $score >= 70 ? true : false;
```

---

## 6. Conclusion

L'opérateur ternaire en PHP est un outil **rapide et pratique** pour simplifier les conditions simples.
Il améliore la **lisibilité** et réduit le nombre de lignes dans le code, tout en restant compréhensible pour des expressions simples.
