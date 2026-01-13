# Les Paramètres Préparés en PDO

Paramètre préparé : valeur placeholder dans une requête SQL,\
commençant par `:` pour les paramètres nommés, remplacée par la valeur réelle lors de l’exécution avec PDO.

## 1. Qu’est-ce qu’un paramètre préparé ?

Un **paramètre préparé** est une valeur “placeholder” dans une requête SQL, utilisée pour :

* Séparer le **code SQL** des **valeurs dynamiques**
* Protéger contre les **injections SQL**
* Permettre la **réutilisation** de la requête avec différentes valeurs

### Syntaxe

**Paramètre nommé** :

```sql
SELECT * FROM users WHERE username = :username
```

* `:username` est un paramètre préparé

**Paramètre anonyme (positionnel)** :

```sql
SELECT * FROM users WHERE username = ?
```

* `?` est un paramètre préparé positionnel

---

## 2. Liaison des paramètres

### a) bindParam()

* Associe une **variable PHP** à un paramètre préparé
* **La valeur est lue au moment de `execute()`**, pas lors de la liaison

```php
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
$stmt->bindParam(':username', $username, PDO::PARAM_STR);

$username = 'alice';
$stmt->execute(); // utilise 'alice'

$username = 'bob';
$stmt->execute(); // utilise 'bob'
```

### b) bindValue()

* Associe **une valeur fixe** à un paramètre
* La valeur est lue **immédiatement**

```php
$stmt->bindValue(':username', 'alice', PDO::PARAM_STR);
$stmt->execute(); // insère 'alice'
```

### c) Exécution avec tableau de valeurs

* Alternative pratique à `bindParam` / `bindValue`

```php
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
$stmt->execute([':username' => 'alice']);
```

---

## 3. Avantages des paramètres préparés

1. **Sécurité** : protège contre les injections SQL
2. **Performance** : la requête préparée peut être exécutée plusieurs fois avec différentes valeurs
3. **Clarté** : code plus lisible et maintenable

---

## 4. Récapitulatif rapide

| Méthode        | Valeur lue quand ?   | Usage                                |
| -------------- | -------------------- | ------------------------------------ |
| bindParam      | à l'exécution        | variable dynamique, réutilisable     |
| bindValue      | immédiatement        | valeur fixe                          |
| execute(array) | au moment de execute | alternative rapide, valeur immédiate |

---

### 5. Bonnes pratiques

* Toujours utiliser **paramètres préparés** pour les valeurs externes (formulaire, API, etc.)
* Préparer la requête **une seule fois** si possible et **réutiliser avec différentes valeurs**
* Utiliser `PDO::PARAM_*` pour typer correctement les paramètres (`PARAM_STR`, `PARAM_INT`, etc.)
