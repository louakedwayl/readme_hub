# Les extensions en PHP

## 1. Qu’est-ce qu’une extension en PHP ?

Une **extension PHP** est un module qui ajoute des fonctionnalités au langage PHP.

👉 Les extensions sont généralement **écrites en C** et chargées directement par l’interpréteur PHP.

Elles permettent à PHP de :

* communiquer avec le système d’exploitation
* accéder aux bases de données
* manipuler des formats spécifiques (JSON, XML…)
* améliorer les performances

---

## 2. Extension vs Librairie

### Extension

* Écrite en **C**
* Chargée par PHP (`php.ini`)
* Fournit des fonctions et/ou classes **natives**
* Accès bas niveau (système, DB, réseau)

### Librairie

* Écrite en **PHP**
* Chargée avec `require`, `include` ou Composer
* Dépend entièrement du langage PHP
* Accès haut niveau

### Tableau comparatif

| Extension        | Librairie                  |
| ---------------- | -------------------------- |
| Écrite en C      | Écrite en PHP              |
| Chargée par PHP  | Chargée par le développeur |
| Native           | Code utilisateur           |
| Plus performante | Moins performante          |

---

## 3. Pourquoi PHP utilise des extensions ?

Certaines fonctionnalités ne peuvent pas être implémentées efficacement en PHP pur :

* accès aux bases de données
* manipulation mémoire
* cryptographie
* communication réseau bas niveau

➡️ Les extensions permettent à PHP d’interagir directement avec ces ressources.

---

## 4. Exemples d’extensions PHP courantes

### Extensions très utilisées

* **PDO** : accès aux bases de données
* **mysqli** : accès MySQL
* **curl** : requêtes HTTP
* **json** : manipulation JSON
* **mbstring** : gestion des chaînes multibytes
* **openssl** : chiffrement

### Exemple avec PDO

```php
$pdo = new PDO("mysql:host=localhost;dbname=test", "user", "password");
```

➡️ La classe `PDO` est disponible sans `include` car elle vient d’une extension.

---

## 5. Activer ou désactiver une extension

Les extensions sont configurées dans le fichier `php.ini`.

### Exemple :

```ini
extension=pdo_mysql
extension=curl
```

Après modification :

* redémarrer le serveur web (Apach
