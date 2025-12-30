# La fonction `phpinfo()`

## 1. Qu’est-ce que `phpinfo()` ?

`phpinfo()` est une **fonction intégrée de PHP** qui affiche une **page complète d’informations sur la configuration de PHP et de son environnement**.

Elle est très utilisée pour :

* Vérifier que PHP fonctionne correctement
* Connaître la version de PHP
* Vérifier les extensions installées
* Inspecter les variables de configuration (`php.ini`)
* Déboguer la configuration serveur

---

## 2. Syntaxe

```php
<?php
phpinfo();
```

* La fonction **n’a pas d’argument obligatoire**.
* Elle retourne directement le résultat à l’écran (HTML).
* Elle peut prendre un argument optionnel pour afficher **une partie spécifique des informations**.

```php
phpinfo(INFO_GENERAL);      // Informations générales
phpinfo(INFO_MODULES);      // Modules et extensions
phpinfo(INFO_CONFIGURATION);// Fichiers de configuration
```

---

## 3. Exemple simple

Créer un fichier `info.php` dans le dossier racine du serveur web :

```php
<?php
phpinfo();
```

Ensuite, accéder à ce fichier via le navigateur :

```
http://localhost/info.php
```

La page affichera :

* Version de PHP
* Chemin du fichier php.ini utilisé
* Extensions activées (MySQL, cURL, GD, etc.)
* Variables superglobales et environnementales
* Paramètres de configuration (`upload_max_filesize`, `memory_limit`, etc.)

---

## 4. Utilisations pratiques

1️⃣ **Vérifier que PHP fonctionne avec Apache / Nginx**

* Si la page s’affiche, le serveur web interprète correctement les fichiers PHP.

2️⃣ **Vérifier la version de PHP**

* Utile pour savoir si ton code est compatible.

3️⃣ **Voir les extensions activées**

* Par exemple `mysqli`, `pdo_mysql`, `curl`, `gd`, etc.

4️⃣ **Déboguer la configuration**

* Vérifier les paramètres comme `max_execution_time`, `post_max_size`, `display_errors`, etc.

---

## 5. Sécurité

⚠️ **Ne laissez pas `phpinfo()` accessible sur un serveur public** :

* Elle révèle beaucoup d’informations sensibles sur le serveur
* Les pirates peuvent exploiter ces informations pour trouver des vulnérabilités

✅ Bonnes pratiques :

* Supprimer ou renommer le fichier après utilisation
* Ne l’utiliser que sur un serveur local ou en environnement de test

---

## 6. Filtrer les informations affichées

`phpinfo()` peut prendre des constantes pour afficher **uniquement certaines sections** :

| Constante            | Description                                 |
| -------------------- | ------------------------------------------- |
| `INFO_GENERAL`       | Informations générales (version, OS, etc.)  |
| `INFO_CREDITS`       | Crédits PHP                                 |
| `INFO_CONFIGURATION` | Fichiers de configuration php.ini           |
| `INFO_MODULES`       | Extensions et modules activés               |
| `INFO_ENVIRONMENT`   | Variables d’environnement                   |
| `INFO_VARIABLES`     | Variables PHP pré-définies                  |
| `INFO_LICENSE`       | Informations sur la licence PHP             |
| `INFO_ALL`           | Toutes les informations (valeur par défaut) |

Exemple :

```php
<?php
phpinfo(INFO_MODULES);
```

---

## 7. Conclusion

* `phpinfo()` est **un outil essentiel pour vérifier et déboguer la configuration PHP**.
* Il doit **être utilisé avec précaution** et jamais laissé accessible sur un serveur en production.
* Utile pour les débutants comme pour les développeurs confirmés afin de **comprendre l’environnement PHP** dans lequel ils travaillent.

---

📌 Astuce : Après avoir utilisé `phpinfo()`, supprime le fichier `info.php` pour éviter tout risque de sécurité.
