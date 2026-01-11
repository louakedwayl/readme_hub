# La fonction `json_decode()` en PHP

La fonction `json_decode()` permet de **convertir des chaînes JSON en données PHP**, comme des tableaux ou des objets. Elle est souvent utilisée pour traiter les réponses d’API ou les données JSON reçues du client.

---

## 1. Syntaxe

```php
mixed json_decode(string $json, bool $assoc = false, int $depth = 512, int $flags = 0)
```

* `$json` : La chaîne JSON à décoder.
* `$assoc` (optionnel) :

  * `true` : convertit les objets JSON en **tableaux associatifs** PHP.
  * `false` (par défaut) : convertit les objets JSON en **objets PHP**.
* `$depth` (optionnel) : profondeur maximale de décodage (par défaut 512).
* `$flags` (optionnel) : options pour contrôler le décodage (ex. `JSON_BIGINT_AS_STRING`).

---

## 2. Exemples d’utilisation

### a) Décoder un objet JSON en objet PHP

```php
<?php
$json = '{"nom":"Alice
```
