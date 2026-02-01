# Syntaxe Alternative en PHP

## Pourquoi cette syntaxe existe ?

La syntaxe alternative a été créée pour **améliorer la lisibilité** dans les fichiers de vue (HTML + PHP mélangés). Elle rend le code plus clair quand on mélange PHP et HTML.

## Le principe

Au lieu d'utiliser des accolades `{}`, on utilise :
- `:` pour ouvrir
- Un mot-clé spécial pour fermer (`endif;`, `endforeach;`, etc.)

## Exemples pratiques

### if / else

**Syntaxe classique :**
```php
<?php if ($user_logged_in) { ?>
    <p>Bienvenue !</p>
<?php } else { ?>
    <p>Veuillez vous connecter</p>
<?php } ?>
```

**Syntaxe alternative :**
```php
<?php if ($user_logged_in): ?>
    <p>Bienvenue !</p>
<?php else: ?>
    <p>Veuillez vous connecter</p>
<?php endif; ?>
```

### foreach

**Syntaxe classique :**
```php
<?php foreach ($products as $product) { ?>
    <li><?php echo $product; ?></li>
<?php } ?>
```

**Syntaxe alternative :**
```php
<?php foreach ($products as $product): ?>
    <li><?php echo $product; ?></li>
<?php endforeach; ?>
```

### while

**Syntaxe classique :**
```php
<?php while ($count < 10) { ?>
    <p>Compteur : <?php echo $count; ?></p>
<?php } ?>
```

**Syntaxe alternative :**
```php
<?php while ($count < 10): ?>
    <p>Compteur : <?php echo $count; ?></p>
<?php endwhile; ?>
```

### for

**Syntaxe classique :**
```php
<?php for ($i = 0; $i < 5; $i++) { ?>
    <p>Item <?php echo $i; ?></p>
<?php } ?>
```

**Syntaxe alternative :**
```php
<?php for ($i = 0; $i < 5; $i++): ?>
    <p>Item <?php echo $i; ?></p>
<?php endfor; ?>
```

## Tableau récapitulatif

| Structure | Ouverture | Fermeture |
|-----------|-----------|-----------|
| **if** | `if (...):` | `endif;` |
| **else** | `else:` | (se ferme avec `endif;`) |
| **elseif** | `elseif (...):` | (se ferme avec `endif;`) |
| **foreach** | `foreach (...):` | `endforeach;` |
| **while** | `while (...):` | `endwhile;` |
| **for** | `for (...):` | `endfor;` |

## Quand l'utiliser ?

✅ **À utiliser dans :**
- Les fichiers de vue (templates HTML)
- Quand vous mélangez beaucoup de HTML et PHP

❌ **À éviter dans :**
- Les fichiers PHP pur (classes, fonctions)
- La logique métier

## En résumé

La syntaxe alternative rend le code **plus lisible** dans les vues en remplaçant `{}` par `:` et des mots-clés explicites comme `endif;`, `endforeach;`, etc.
