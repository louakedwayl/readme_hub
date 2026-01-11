# La fonction `file_get_contents()` en PHP

La fonction `file_get_contents()` est une fonction native de PHP qui permet de **lire le contenu d’un fichier ou d’une ressource** dans une chaîne. Elle est très utilisée pour récupérer des fichiers locaux ou le contenu de flux distants, comme des URLs ou des flux HTTP/JSON.

---

## 1. Syntaxe

```php
string file_get_contents(string $filename, bool $use_include_path = false, resource $context = null, int $offset = 0, int $length = null)
```

* `$filename` : Le chemin vers le fichier ou la ressource à lire.
* `$use_include_path` (optionnel) : Parcourir le chemin d’inclusion (`include_path`) si `true`.
* `$context` (optionnel) : Flux de contexte pour gérer des options avancées (HTTP, SSL…).
* `$offset` (optionnel) : Début de lecture en octets.
* `$length` (optionnel) : Nombre d’octets à lire.

---

## 2. Lire un fichier local

```php
<?php
$contenu = file_get_contents('fichier.txt');
echo $contenu;
?>
```

* Lit **tout le contenu** de `fichier.txt` et le retourne dans une chaîne.

---

## 3. Lire une partie d’un fichier

```php
<?php
$contenu = file_get_contents('fichier.txt', false, null, 10, 20);
// lit 20 octets à partir de l'octet 10
echo $contenu;
?>
```

---

## 4. Lire le contenu d’une URL

```php
<?php
$url = 'https://example.com/data.json';
$contenu = file_get_contents($url);
echo $contenu;
?>
```

* PHP doit avoir **`allow_url_fopen` activé** pour lire des URLs.
* Peut renvoyer des erreurs si le fichier distant est inaccessible.

---

## 5. Lire le corps d’une requête HTTP (flux brut)

```php
<?php
$input = file_get_contents('php://input');
echo $input;
?>
```

* `php://input` : flux **brut de la requête HTTP**, utile pour les API REST.
* Souvent combiné avec `json_decode()` pour récupérer des données JSON envoyées par POST ou PUT.

---

## 6. Points importants

1. **Retourne une chaîne** contenant tout le contenu.
2. Si le fichier ou la ressource n’existe pas, **retourne `false`** et génère un avertissement.
3. Très pratique pour **récupérer du contenu distant ou le flux HTTP** dans les applications web.
4. Pour de gros fichiers, attention à la **consommation mémoire**, car tout le contenu est chargé en mémoire.

---

## 7. Exemple pratique avec JSON

```php
<?php
// Récupération d'une requête POST JSON
$input = file_get_contents('php://input');
$data = json_decode($input, true);
echo 'Username: ' . $data['username'];
?>
```

* `file_get_contents('php://input')` lit le **corps de la requête HTTP**.
* `json_decode(..., true)` transforme la chaîne JSON en tableau associatif PHP.

---

## 8. Conclusion

`file_get_contents()` est une fonction **polyvalente** pour lire du contenu depuis un fichier local, un flux HTTP ou toute ressource disponible. Associée à `json_decode()`, elle est essentielle pour récupérer et traiter des données JSON dans les API PHP.
