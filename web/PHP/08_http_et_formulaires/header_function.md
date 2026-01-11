# La fonction `header()` en PHP

La fonction `header()` en PHP permet **d’envoyer des en-têtes HTTP** au navigateur. Ces en-têtes doivent être envoyés **avant tout contenu HTML**.

---

## 1. À quoi sert `header()` ?

`header()` permet de :

* Rediriger l’utilisateur vers une autre page.
* Spécifier le type de contenu envoyé.
* Contrôler la mise en cache.
* Définir des cookies (`Set-Cookie`).

> ⚠️ Important : Les headers doivent être envoyés **avant tout affichage**. Sinon, PHP renvoie une erreur :
>
> ```
> Warning: Cannot modify header information – headers already sent
> ```

---

## 2. Syntaxe

```php
header(string $header, bool $replace = true, int $response_code = 0): void
```

* `$header` : La chaîne de l’en-tête HTTP.
* `$replace` : Remplacer un header du même type (`true` par défaut).
* `$response_code` : Code HTTP (ex. 301, 302, 404).

---

## 3. Exemples courants

### a) Redirection

```php
<?php
header("Location: https://example.com");
exit; // Toujours mettre exit après une redirection
?>
```

### b) Définir le type de contenu

```php
<?php
header("Content-Type: application/json");
echo json_encode(["message" => "Hello World"]);
?>
```

### c) Contrôler le cache

```php
<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Date passée pour invalider le cache
?>
```

### d) Forcer le téléchargement d’un fichier

```php
<?php
header("Content-Disposition: attachment; filename=\"fichier.txt\"");
header("Content-Type: text/plain");
echo "Contenu du fichier...";
?>
```

---

## 4. Points importants

1. **Pas d’affichage avant `header()`** :

```php
<?php
// ❌ Mauvais
echo "Bonjour";
header("Location: page2.php");

// ✅ Correct
header("Location: page2.php");
exit;
?>
```

2. Toujours utiliser `exit` après une redirection.
3. Respecter la norme HTTP pour les en-têtes.

---

## 5. Conclusion

`header()` est très puissant pour contrôler la communication entre PHP et le navigateur, mais il doit être utilisé **avant tout affichage** et avec précaution pour éviter les erreurs.
