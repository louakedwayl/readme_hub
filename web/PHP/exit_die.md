# `exit` and `die()`

## 1. Introduction
En PHP, il est souvent nécessaire d'arrêter brutalement l'exécution d'un script avant qu'il n'arrive à sa dernière ligne. C'est ici qu'interviennent les fonctions `exit` et `die()`.

---

## 2. Définition et Syntaxe
Techniquement, **`die()` est un alias de `exit()`**. Cela signifie qu'ils font exactement la même chose derrière les coulisses.

### Syntaxe
- `exit;` : Arrête le script simplement.
- `exit("Message");` : Affiche un message puis s'arrête.
- `exit(0);` : Termine avec un code d'état (0 = succès, utile pour les scripts système).

---

## 3. Pourquoi les utiliser ? (Les 3 piliers)

### A. Stopper le script après une redirection
Lorsqu'on envoie un header de redirection, le code PHP qui suit **continue de s'exécuter** sur le serveur. Pour éviter des failles de sécurité ou une consommation inutile de ressources, on force l'arrêt.

### B. Garantir l'intégrité d'une réponse JSON (AJAX)
Pour qu'un script JavaScript (via `fetch`) puisse lire une réponse JSON, le flux de données doit être pur. Si vous oubliez `exit`, du code HTML ou des espaces blancs peuvent polluer la réponse.

### C. La gestion des erreurs fatales
On utilise souvent `die()` pour stopper le script si une ressource critique n'est pas disponible (comme la base de données).

```php
$conn = mysqli_connect("localhost", "user", "pass") or die("Crash : Base inaccessible");

```

4. Tableau comparatif : `exit` vs `die()`

| Critère        | `exit`                          | `die()`                          |
|---------------|----------------------------------|----------------------------------|
| Sémantique    | Sortie propre                    | Mort du script (erreur)           |
| Usage courant | Redirections, fin de logique, API | Erreurs SQL, fichiers manquants   |
| Origine       | Issu du langage C                | Issu du langage Perl             |

