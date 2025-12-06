# L'interpréteur PHP

## 1️⃣ Qu’est-ce que l’interpréteur PHP ?

* L’interpréteur PHP est le **programme qui lit et exécute le code PHP**.
* Contrairement aux langages compilés (comme C), PHP n’est pas transformé en binaire avant exécution : l’interpréteur analyse et exécute le code **à la volée**.
* Il est nécessaire pour que les scripts `.php` fonctionnent, que ce soit sur un serveur ou en local.

## 2️⃣ Comment fonctionne l’interpréteur PHP ?

1. Le serveur web reçoit une requête pour un fichier `.php`.
2. Le fichier est passé à l’interpréteur PHP.
3. L’interpréteur exécute le code PHP et génère du HTML, JSON ou d’autres réponses.
4. Le serveur renvoie le résultat au navigateur.

Schéma simplifié :

```
Navigateur -> Requête HTTP -> Serveur web (Apache/Nginx)
-> Interpréteur PHP -> Exécution du code -> Résultat HTML -> Navigateur
```

## 3️⃣ Installation de l’interpréteur

* Sur Linux :

```bash
sudo apt install php
```

* Sur Windows : télécharger PHP depuis [php.net](https://www.php.net/downloads)
* Sur Docker : utiliser une image officielle comme `php:8.2-apache` qui contient déjà PHP et Apache.

## 4️⃣ Extensions et configuration

* L’interpréteur peut être **étendu avec des modules** pour ajouter des fonctionnalités :

  * `mysqli` pour MySQL
  * `pdo` pour accès aux bases de données
  * `gd` pour la manipulation d’images
* Les extensions sont activées dans le fichier `php.ini` ou via des commandes comme :

```dockerfile
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli
```

## 5️⃣ Utilisation en ligne de commande (CLI)

* PHP peut être exécuté directement depuis le terminal :

```bash
php script.php
```

* Utile pour tester du code ou exécuter des scripts en tâche de fond.

## 6️⃣ Différence avec les langages compilés

| Langage | Mode d’exécution                         |
| ------- | ---------------------------------------- |
| C       | Compilation en binaire avant exécution   |
| PHP     | Interprété par l’interpréteur à la volée |
| Python  | Interprété, similaire à PHP              |

## 7️⃣ Avantages de l’interpréteur

* Exécution rapide des scripts sans compilation préalable.
* Possibilité de modifier le code et de voir les résultats immédiatement.
* Intégration facile avec les serveurs web pour générer du contenu dynamique.

## 8️⃣ Exemple pratique

```php
<?php
// Exemple simple d'interpréteur
$heure = date("H");
if ($heure < 12) {
    echo "Bonjour !";
} else {
    echo "Bonsoir !";
}
?>
```

* L’interpréteur PHP exécute le code et renvoie "Bonjour !" ou "Bonsoir !" selon l’heure.

## 9️⃣ Conclusion

* L’interpréteur PHP est **le cœur de l’exécution des scripts PHP**.
* Il permet de transformer le code PHP en réponses exploitables par le navigateur.
* Comprendre son rôle aide à mieux gérer les extensions, la configuration et le déploiement de vos applications web.
