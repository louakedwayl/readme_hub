# 🛡️ `strip_tags()`

## 📘 Introduction

Lorsqu'une application web reçoit du texte d'un utilisateur, il peut contenir des balises HTML ou même du JavaScript malveillant. La fonction PHP `strip_tags()` permet de supprimer les balises HTML et PHP d'une chaîne tout en permettant éventuellement d'en autoriser certaines.

## 🔎 1. Qu'est-ce que `strip_tags()` ?

`strip_tags()` est une fonction native de PHP utilisée pour nettoyer du contenu HTML. Elle supprime toutes les balises HTML sauf celles explicitement autorisées.

### ✔️ Syntaxe

```php
strip_tags(string $str, array|string|null $allowable_tags = null): string
```

### ✔️ Paramètres

- **$str** → La chaîne à nettoyer
- **$allowable_tags** → Liste des balises autorisées, sous forme de chaîne ou tableau

## 🔥 2. Pourquoi utiliser `strip_tags()` ?

- Empêcher un utilisateur d'injecter du code HTML ou des balises non désirées
- Nettoyer des champs texte (commentaires, messages, descriptions…)
- Permettre uniquement certaines balises simples (ex. `<b>`, `<i>`, `<p>`)

> ⚠️ **Attention** : `strip_tags()` n'est pas une protection XSS complète. Il supprime les balises, mais pas les attributs potentiellement dangereux.

## 🛠️ 3. Exemples d'utilisation

### 3.1 Supprimer toutes les balises

```php
$text = "<b>Bonjour</b> <script>alert('XSS')</script>";
echo strip_tags($text);
// Résultat : Bonjour alert('XSS')
```

### 3.2 Conserver certaines balises

```php
$text = "<b>Bonjour</b> <i>le monde</i>";
echo strip_tags($text, "<b>");
// Résultat : <b>Bonjour</b> le monde
```

### 3.3 Conserver plusieurs balises

```php
echo strip_tags($text, "<b><i><p>");
```

### 3.4 Utiliser un tableau (PHP 8+)

```php
echo strip_tags($text, ["<b>", "<i>"]);
```

## ⚠️ 4. Les limites importantes de `strip_tags()`

### ❌ 4.1 Ne retire pas les attributs dangereux

Exemple d'injection :

```php
$text = '<a href="#" onclick="alert(\'XSS\')">Lien</a>';
echo strip_tags($text, "<a>");
// Résultat : <a href="#" onclick="alert('XSS')">Lien</a>
```

➡️ **Le JavaScript reste actif !**

### ❌ 4.2 Ne protège pas contre les XSS complexes

- Balises `<img>`
- Balises mal formées
- Caractères encodés (`<script>`, `&#60;script&#62;`, etc.)

### ❌ 4.3 Ne corrige pas le HTML invalide

Il supprime juste les balises sans vérifier la structure.

## 🔐 5. Bonnes pratiques

### ✔️ Combiner `strip_tags()` + `htmlspecialchars()`

```php
$text = strip_tags($_POST['message'], "<b><i>");
echo htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
```

### ✔️ Utiliser un validateur HTML si du HTML doit être autorisé

Exemples :
- **HTML Purifier**
- **DOMPurify** (côté client)

### ✔️ Définir précisément les balises autorisées

Seulement celles indispensables.

### ✔️ Ne jamais afficher une donnée utilisateur sans filtrage ou échappement

## 📝 6. Tableau récapitulatif

| Fonction | Rôle | Protège contre XSS ? | Notes |
|----------|------|---------------------|-------|
| `strip_tags()` | Supprime les balises HTML | ⚠️ Partiellement | N'enlève pas les attributs dangereux |
| `htmlspecialchars()` | Échappe les caractères HTML | ✅ Oui | Recommandé pour l'affichage |
| `htmlentities()` | Échappe plus de caractères | ⭐ Oui | Alternative à htmlspecialchars |
| HTML Purifier | Nettoie complètement du HTML | ⭐⭐⭐⭐⭐ Oui | Très sécurisé |

## 🏁 Conclusion

`strip_tags()` est une fonction utile pour nettoyer le contenu HTML, mais elle ne doit pas être utilisée seule pour se protéger des failles XSS. Pour une sécurité optimale, combinez-la avec `htmlspecialchars()` ou utilisez un nettoyeur HTML spécialisé.
