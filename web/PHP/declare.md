# PHP `declare` 

## 1. Introduction

La directive **`declare`** en PHP permet de **modifier le comportement d’exécution d’un fichier**.
Elle s’applique **uniquement au fichier courant** et doit être placée **en première ligne**, immédiatement après `<?php`.

Syntaxe générale :

```php
<?php
declare(directive = valeur);
```

---

## 2. Principales directives

### 2.1 `strict_types`

* **Objectif :** Activer le typage strict pour les arguments et les retours de fonctions.
* **Effet :** PHP n’effectue plus de conversion automatique des types.

#### Exemple :

```php
<?php
declare(strict_types=1);

function add(int $a, int $b): int {
    return $a + $b;
}

echo add(2, 3);    // ✅ 5
echo add("2", 3);  // ❌ TypeError
```

* Sans `strict_types`, "2" serait converti en entier automatiquement.
* Avec `strict_types=1`, il doit être **exactement** de type `int`.

**Bonnes pratiques :**

* Mettre `declare(strict_types=1);` **en première ligne**.
* Typage systématique des **arguments** et du **retour** de fonctions.

---

### 2.2 `ticks`

* **Objectif :** Exécuter un callback toutes les N instructions PHP.
* **Utilité :** Profiling, monitoring ou exécution périodique.

#### Exemple :

```php
<?php
declare(ticks=1);

function tick_handler() {
    echo "tick\n";
}

register_tick_function('tick_handler');

$a = 1;
$b = 2;
$c = $a + $b; // tick_handler sera appelé après chaque instruction
```

---

### 2.3 `encoding` (obsolète)

* Permettait de définir l’encodage du fichier source.
* Déprécié depuis PHP 5.6 → **ne plus utiliser**.

```php
<?php
declare(encoding='UTF-8'); // obsolète
```

---

## 3. Règles importantes

1. `declare` doit être **avant tout code** (y compris echo, include, commentaires avant `<?php` non acceptés).
2. Elle **s’applique uniquement au fichier courant**.
3. Plusieurs directives peuvent être combinées :

```php
<?php
declare(strict_types=1, ticks=10);
```

---

## 4. Résumé pratique

| Directive      | Objectif                                       | Exemple d’usage              |
| -------------- | ---------------------------------------------- | ---------------------------- |
| `strict_types` | Typage strict des arguments et retours         | `declare(strict_types=1);`   |
| `ticks`        | Exécuter un callback toutes les N instructions | `declare(ticks=1);`          |
| `encoding`     | Encodage du fichier source (obsolète)          | `declare(encoding='UTF-8');` |

---

## 5. Astuce pour projets PHP

* **Toujours utiliser `declare(strict_types=1);`** pour sécuriser le typage.
* Cela aide à **repérer les erreurs plus tôt** et à **simuler un comportement proche d’un langage compilé**.
* Utile pour tous les projets sérieux, y compris des projets comme **Camagru**.
