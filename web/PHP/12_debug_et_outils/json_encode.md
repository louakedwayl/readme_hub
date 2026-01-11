# La fonction `json_encode()` en PHP

La fonction `json_encode()` permet de **convertir des données PHP en format JSON**, ce qui est très utile pour les échanges entre serveur et client (API, JavaScript, AJAX, etc.).

---

## 1. Syntaxe

```php
string json_encode(mixed $value, int $flags = 0, int $depth = 512)
```

* `$value` : La donnée PHP à convertir (tableau, objet, etc.).
* `$flags` (optionnel) : Options supplémentaires pour contrôler le formatage.
* `$depth` (optionnel) : Profondeur maximale d’encodage pour les structures imbriquées (par défaut 512).

---

## 2. Types de données supportés

| Type PHP             | Résultat JSON             |
| -------------------- | ------------------------- |
| `array` (numérique)  | Tableau JSON `[1, 2, 3]`  |
| `array` (associatif) | Objet JSON `{"key":"value |
