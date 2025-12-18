# Cours PHP : La fonction `move_uploaded_file()`

## 1. Introduction

En PHP, la fonction `move_uploaded_file()` est utilisée pour **déplacer un fichier uploadé** depuis le répertoire temporaire vers un emplacement définitif sur le serveur. C'est une étape essentielle pour gérer les fichiers téléchargés par un utilisateur.

---

## 2. Syntaxe

```php
bool move_uploaded_file(string $filename, string $destination)
```

* **$filename** : chemin temporaire du fichier uploadé (`$_FILES['nom_du_champ']['tmp_name']`).
* **$destination** : chemin complet où le fichier doit être déplacé sur le serveur.
* Retourne **true** si le déplacement a réussi, sinon **false**.

---

## 3. Exemple simple

```php
if (isset($_FILES['screenshot'])) {
    $tmpName = $_FILES['screenshot']['tmp_name'];
    $nomFichier = $_FILES['screenshot']['name'];
    $dossier = 'uploads/';
    
    // Créer le dossier si nécessaire
    if (!is_dir($dossier)) {
        mkdir($dossier, 0755);
    }

    $destination = $dossier . $nomFichier;

    if (move_uploaded_file($tmpName, $destination)) {
        echo "Fichier uploadé avec succès : $destination";
    } else {
        echo "Erreur lors de l'upload du fichier.";
    }
}
```

---

## 4. Points importants

* Le fichier source **doit provenir d'un upload HTTP** ; sinon la fonction retourne `false`.
* Vérifier **l'existence du dossier de destination** avant de déplacer le fichier.
* Il est recommandé de **renommer le fichier** pour éviter les collisions ou problèmes de sécurité :

```php
$destination = $dossier . uniqid() . '-' . basename($nomFichier);
```

* Toujours vérifier la **taille et l'extension du fichier** avant de le déplacer pour la sécurité.

---

## 5. Utilisations courantes

* Stocker des fichiers uploadés par les utilisateurs (images, documents, etc.).
* Déplacer les fichiers temporaires vers un dossier sécurisé sur le serveur.
* Préparer les fichiers pour traitement ultérieur (lecture, conversion, etc.).

---

## 6. Conclusion

La fonction `move_uploaded_file()` est essentielle pour gérer les fichiers téléchargés en PHP.

* Elle garantit que le fichier est un **upload valide**.
* Elle permet de le **déplacer en toute sécurité** vers le dossier voulu.
* À combiner avec les fonctions **`is_dir()`**, **`file_exists()`** et les vérifications d’extension/taille pour sécuriser les uploads.

**Astuce :** Toujours valider et renommer les fichiers uploadés pour éviter les problèmes de sécurité et de collisions de noms.
