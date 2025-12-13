# La fonction `pathinfo()` et le champ `extension`

## 1. Introduction

En PHP, la fonction `pathinfo()` permet d'extraire des informations sur un chemin de fichier. Elle est particulièrement utile pour gérer les fichiers uploadés ou pour manipuler des chemins.

## 2. Syntaxe

```php
array pathinfo(string $path, int $options = PATHINFO_ALL)
```

* **$path** : le chemin du fichier ou du dossier.
* **$options** : champ spécifique à retourner. Par défaut, retourne toutes les informations (`PATHINFO_ALL`).

## 3. Valeurs retournées

`pathinfo()` retourne un **tableau associatif** contenant les informations suivantes :

| Clé         | Description                               |
| ----------- | ----------------------------------------- |
| `dirname`   | Le chemin du dossier contenant le fichier |
| `basename`  | Le nom du fichier avec son extension      |
| `extension` | L'extension du fichier (sans le point)    |
| `filename`  | Le nom du fichier sans l'extension        |

## 4. Exemple simple

```php
$chemin = "dossier/mon_fichier.txt";

$infos = pathinfo($chemin);
print_r($infos);
```

**Résultat :**

```
Array
(
    [dirname] => dossier
    [basename] => mon_fichier.txt
    [extension] => txt
    [filename] => mon_fichier
)
```

## 5. Focus sur le champ `extension`

* Permet de connaître l'**extension du fichier** sans le nom.
* Utile pour vérifier le type d'un fichier, par exemple lors d'un upload.

### Exemple :

```php
$chemin = "image/photo.jpeg";

$extension = pathinfo($chemin, PATHINFO_EXTENSION);
echo $extension; // Affiche : jpeg
```

* Attention : les extensions peuvent être en majuscules ou minuscules. Il est souvent conseillé d’utiliser `strtolower()` pour standardiser :

```php
$ext = strtolower(pathinfo($chemin, PATHINFO_EXTENSION));
```

## 6. Vérification de l'extension d'un fichier uploadé

```php
$data = $_FILES['fichier'];
$ext = strtolower(pathinfo($data['name'], PATHINFO_EXTENSION));

if ($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "gif") {
    echo "Fichier valide";
} else {
    echo "Extension non autorisée";
}
```

## 7. Conclusion

La fonction `pathinfo()` est très pratique pour :

* Extraire le nom, l'extension et le dossier d'un fichier.
* Vérifier l'extension des fichiers uploadés.
* Manipuler les chemins de fichiers facilement.

**Astuce :** Toujours utiliser `strtolower()` sur l'extension pour éviter les problèmes de casse lors des vérifications.
