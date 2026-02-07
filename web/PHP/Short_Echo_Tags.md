# Short Echo Tags en PHP

## C'est quoi ?

Les **short echo tags** (`<?=`) sont une syntaxe raccourcie en PHP pour afficher du contenu. C'est une alternative plus concise à `<?php echo`.

## Syntaxe de base

**Syntaxe complète :**
```php
<?php echo $variable; ?>
```

**Short echo tag :**
```php
<?= $variable ?>
```

Les deux font exactement la même chose : afficher le contenu de `$variable`.

## Utilisation courante

Les short echo tags sont particulièrement utiles dans les templates HTML où on a besoin d'afficher beaucoup de variables :

```php
<div class="user-card">
    <h2><?= $user['name'] ?></h2>
    <p><?= $user['email'] ?></p>
    <img src="<?= $user['avatar'] ?>" alt="Avatar">
</div>
```

Sans short tags, ce serait beaucoup plus verbeux :

```php
<div class="user-card">
    <h2><?php echo $user['name']; ?></h2>
    <p><?php echo $user['email']; ?></p>
    <img src="<?php echo $user['avatar']; ?>" alt="Avatar">
</div>
```

## Limitations

- **Uniquement pour afficher** : Tu ne peux pas faire de logique complexe avec `<?=`
- **Une seule expression** : Tu ne peux mettre qu'une seule expression à afficher

```php
<!-- ✅ OK -->
<?= $name ?>
<?= strtoupper($name) ?>
<?= $user['email'] ?? 'N/A' ?>

<!-- ❌ PAS OK -->
<?= $name; $email; ?> 
<?= if ($active) echo "Yes"; ?>
```

## Bonnes pratiques

### Toujours échapper les données utilisateur

```php
<!-- ✅ BON -->
<?= htmlspecialchars($user_input) ?>

<!-- ❌ DANGEREUX (XSS vulnerability) -->
<?= $user_input ?>
```

### Utiliser pour les templates, pas pour la logique

```php
<!-- ✅ BON USAGE -->
<h1><?= $pageTitle ?></h1>

<!-- ❌ MAUVAIS USAGE -->
<?= $count++; processData($count); ?>
```

## Différence avec d'autres short tags

⚠️ **Attention** : Il existe aussi `<?` (sans le `=`) mais c'est **deprecated** et il faut l'éviter :

```php
<!-- ⚠️ DEPRECATED - ne pas utiliser -->
<? echo $variable ?>

<!-- ✅ Utilise plutôt -->
<?= $variable ?>
<!-- ou -->
<?php echo $variable; ?>
```

## Compatibilité

`<?=` est supporté par défaut depuis PHP 5.4+ et ne nécessite aucune configuration particulière dans `php.ini`. C'est considéré comme une syntaxe standard et recommandée.

## Résumé

| Syntaxe | Usage | Status |
|---------|-------|--------|
| `<?php echo $var; ?>` | Syntaxe complète | ✅ Toujours OK |
| `<?= $var ?>` | Short echo tag | ✅ Recommandé pour templates |
| `<? echo $var ?>` | Ancien short tag | ❌ Deprecated |

**En bref** : `<?=` = version courte de `<?php echo`, parfait pour afficher des variables dans du HTML.
