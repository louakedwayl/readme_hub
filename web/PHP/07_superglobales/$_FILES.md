# 📁 Cours Général : Comprendre `$_FILES` en PHP

## 🎯 Introduction

Lorsqu'un utilisateur envoie un fichier via un formulaire HTML, PHP le récupère automatiquement grâce à la superglobale `$_FILES`. C'est l'un des outils fondamentaux de PHP pour gérer les uploads de fichiers.

Uploader un fichier est une fonctionnalité très utilisée :

- envoi de photo de profil
- documents PDF
- images dans une galerie
- fichiers ZIP
- etc.

Mais l'upload est aussi une **source majeure de failles de sécurité**. Il est donc essentiel de comprendre comment fonctionne `$_FILES` et comment l'utiliser correctement.

## 🌐 1. Comment fonctionne l'upload de fichiers ?

Lorsqu'un fichier est envoyé par un formulaire HTML, il y a **3 conditions essentielles** :

### ✔️ 1) Le formulaire doit être en POST

```html
<form method="POST">
```

### ✔️ 2) Le formulaire doit avoir l'attribut `enctype="multipart/form-data"`

Sans cet attribut, aucun fichier ne sera transmis.

```html
<form method="POST" enctype="multipart/form-data">
```

### ✔️ 3) Le champ de fichier doit être un `<input type="file">`

```html
<input type="file" name="fichier">
```

Une fois le formulaire envoyé, PHP va automatiquement remplir la variable `$_FILES`.

## 📦 2. Qu'est-ce que `$_FILES` ?

`$_FILES` est une **superglobale PHP**, c'est-à-dire :

- accessible partout dans le code
- toujours disponible
- gérée directement par PHP

Elle contient tous les fichiers envoyés dans le formulaire.

## 🧱 3. Structure de `$_FILES`

Pour chaque fichier, `$_FILES` crée une structure comme celle-ci :

```php
$_FILES['fichier'] = [
    'name' => 'photo.jpg',
    'type' => 'image/jpeg',
    'tmp_name' => '/tmp/phpZAbcd',
    'error' => 0,
    'size' => 58214
];
```

### Description simple :

| Clé | Description |
|-----|-------------|
| `name` | Nom du fichier tel qu'il était sur l'ordinateur de l'utilisateur |
| `type` | Type MIME (déclaré par le navigateur) |
| `tmp_name` | Emplacement temporaire du fichier côté serveur |
| `error` | Code indiquant si l'upload s'est bien passé |
| `size` | Taille du fichier en octets |

## ⏳ 4. Où va le fichier quand il est uploadé ?

Le fichier n'est pas directement placé dans votre dossier "uploads".

PHP le place d'abord dans un **dossier temporaire** du serveur, généralement :

```
/tmp/
```

Ce fichier temporaire est **supprimé automatiquement** à la fin du script si vous ne vous en servez pas.

**Pour le conserver, vous devez le déplacer vous-même.**

## ❗ 5. Le rôle du code d'erreur (`error`)

Chaque upload génère un code d'erreur, qui indique ce qu'il s'est passé.

L'erreur la plus importante :

- **0** → ✔️ Aucun problème, le fichier a été reçu correctement

Les autres erreurs indiquent un problème :

- fichier trop grand
- upload interrompu
- pas de fichier envoyé
- problème de permissions

Comprendre ces erreurs est fondamental pour déboguer.

## 🔐 6. La sécurité : le point le plus important

Uploader un fichier est **extrêmement dangereux** si c'est mal géré.

Un utilisateur peut envoyer :

- un script PHP déguisé en image
- un fichier contenant un malware
- un fichier énorme pour saturer le serveur
- une image avec du code malveillant caché

C'est pour cela que les uploads sont **l'une des principales sources de failles Web**.

### Les protections fondamentales sont :

- vérifier la taille
- vérifier le type MIME
- vérifier l'extension
- renommer le fichier
- déplacer dans un dossier non accessible en exécution
- empêcher l'exécution de fichiers malveillants

## 📁 7. Déplacement du fichier

Chaque fichier uploadé par PHP est stocké temporairement. Pour le rendre permanent, vous devez le déplacer dans votre dossier :

```
uploads/
```

La fonction dédiée est :

```php
move_uploaded_file()
```

**C'est la seule méthode sécurisée pour déplacer un fichier uploadé.**

## 📚 8. Upload multiple

PHP permet d'envoyer plusieurs fichiers en même temps.

Le formulaire utilise :

```html
<input type="file" name="fichiers[]" multiple>
```

Et `$_FILES` devient une structure en tableau multidimensionnel avec :

- plusieurs `name`
- plusieurs `tmp_name`
- etc.

Cela permet :

- uploader des galeries d'images
- importer plusieurs documents

## 🗂️ 9. Limites de `$_FILES`

`$_FILES` ne :

- ❌ ne vérifie pas le type réel du fichier
- ❌ ne protège pas automatiquement contre les scripts cachés
- ❌ ne renomme pas les fichiers
- ❌ ne sauvegarde rien automatiquement
- ❌ n'empêche pas un utilisateur d'envoyer des fichiers dangereux

**Toute la sécurité doit être gérée côté PHP, après l'upload.**

## 🏁 Conclusion

`$_FILES` est la base de la gestion de fichiers en PHP. Elle fournit :

- toutes les informations essentielles
- le fichier temporaire
- les erreurs d'upload

Cependant, utiliser `$_FILES` correctement demande :

- une bonne compréhension des risques de sécurité
- des vérifications strictes
- un déplacement soigneux avec `move_uploaded_file()`

**L'upload est une fonctionnalité puissante, mais qui doit être gérée avec rigueur et prudence.**
