# La fonction `nl2br` en PHP

## 1. Introduction

En PHP, lorsqu'on récupère du texte provenant d'un formulaire ou d'une base de données, les sauts de ligne effectués par l'utilisateur (`Enter`) ne sont pas automatiquement visibles dans un navigateur. Le navigateur HTML ignore les caractères spéciaux de saut de ligne comme `\n` ou `\r\n`.

La fonction `nl2br` (New Line To Break) sert précisément à convertir les sauts de ligne en balises HTML `<br>` pour qu'ils soient affichés correctement dans le navigateur.

## 2. Syntaxe

```php
string nl2br(string $string, bool $is_xhtml = true)
```

### Paramètres :

1. **`$string`** : La chaîne de caractères contenant les sauts de ligne à convertir.
2. **`$is_xhtml`** (optionnel) :
   - `true` (par défaut) : génère des balises `<br />` (format XHTML).
   - `false` : génère des balises `<br>` (format HTML classique).

### Valeur retournée :

Une nouvelle chaîne où tous les sauts de ligne ont été remplacés par des balises `<br>`.

## 3. Fonctionnement

La fonction reconnaît les types de sauts de ligne suivants :

- `\n` → saut de ligne Unix/Linux
- `\r\n` → saut de ligne Windows
- `\r` → saut de ligne ancien Mac

### Exemple simple :

```php
$texte = "Bonjour,\nComment ça va ?";
echo nl2br($texte);
```

**Résultat dans le navigateur :**

```
Bonjour,
Comment ça va ?
```

Mais réellement, le HTML rendu sera :

```html
Bonjour,<br />
Comment ça va ?
```

## 4. Exemples d'utilisation

### Exemple 1 : Texte simple

```php
$texte = "Ligne 1\nLigne 2\nLigne 3";
echo nl2br($texte);
```

**Sortie HTML :**

```html
Ligne 1<br />
Ligne 2<br />
Ligne 3
```

### Exemple 2 : Désactiver le format XHTML

```php
$texte = "Bonjour\nTout le monde";
echo nl2br($texte, false);
```

**Sortie HTML :**

```html
Bonjour<br>Tout le monde
```

### Exemple 3 : Combinaison avec `htmlspecialchars`

Lorsqu'on affiche du texte provenant de l'utilisateur, il est conseillé d'utiliser `htmlspecialchars` pour éviter l'injection HTML :

```php
$texte = "Bonjour <b>Monde</b>\nComment ça va ?";
echo nl2br(htmlspecialchars($texte));
```

**Sortie HTML sûre :**

```html
Bonjour &lt;b&gt;Monde&lt;/b&gt;<br />
Comment ça va ?
```

## 5. Points importants à retenir

- `nl2br` ne modifie pas la chaîne originale si vous ne l'affectez pas à une variable.

```php
$newText = nl2br($texte);
```

- Fonction très utile pour afficher du texte multi-lignes provenant d'une base de données ou d'un formulaire.
- Combinez souvent avec `htmlspecialchars` pour sécuriser l'affichage.
- Si vous utilisez des éditeurs WYSIWYG ou Markdown, `nl2br` n'est pas toujours nécessaire car ces éditeurs génèrent déjà du HTML.

## 6. Conclusion

La fonction `nl2br` est un outil simple mais essentiel pour afficher correctement les sauts de ligne en HTML. Elle garantit que le texte saisi par un utilisateur apparaît lisible et bien formaté sur votre site.
