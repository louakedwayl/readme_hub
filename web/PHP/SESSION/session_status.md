# PHP : `session_status()`

## 1. Introduction aux sessions PHP

Une session PHP permet de conserver des données entre plusieurs requêtes HTTP. Elle est souvent utilisée pour :

* gérer l'authentification (utilisateur connecté)
* stocker des préférences utilisateur
* conserver un panier d'achat
* partager des données temporaires

Les sessions reposent généralement sur :

* un cookie de session côté navigateur
* des données stockées côté serveur

## 2. Problème courant avec les sessions

En PHP, appeler `session_start()` plusieurs fois peut provoquer un avertissement :

```
Warning: session_start(): A session had already been started
```

Pour éviter cela, PHP fournit la fonction `session_status()`.

## 3. La fonction `session_status()`

### Définition

```php
session_status(): int
```

Cette fonction retourne l'état actuel de la gestion des sessions.

## 4. Les constantes possibles

`session_status()` peut retourner trois valeurs :

### 🔴 `PHP_SESSION_DISABLED`

* Les sessions sont désactivées sur le serveur
* Exemple : `session.auto_start` désactivé ou extension absente

```php
session_status() === PHP_SESSION_DISABLED
```

### 🟡 `PHP_SESSION_NONE`

* Les sessions sont activées
* Aucune session n'a encore été démarrée

```php
session_status() === PHP_SESSION_NONE
```

➡️ C'est le cas le plus fréquent avant `session_start()`

### 🟢 `PHP_SESSION_ACTIVE`

* Une session est déjà active

```php
session_status() === PHP_SESSION_ACTIVE
```

## 5. Utilisation recommandée

### ✅ Démarrer une session en toute sécurité

```php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
```

👉 Cette méthode :

* évite les erreurs
* est compatible avec les includes
* est recommandée dans les frameworks et bibliothèques

## 6. Exemple complet

```php
<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['user'] = 'Alice';

echo 'Utilisateur : ' . $_SESSION['user'];
```

## 7. Comparaison avec les anciennes méthodes

### ❌ Mauvaise pratique (ancienne)

```php
if (!isset($_SESSION)) {
    session_start();
}
```

**Pourquoi c'est mauvais ?**

* `$_SESSION` peut exister même sans session active
* comportement non fiable selon la configuration PHP

### ✅ Bonne pratique (moderne)

```php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
```

✔️ Fiable ✔️ Clair ✔️ Supporté officiellement

## 8. Cas particuliers

### En ligne de commande (CLI)

* Les sessions sont souvent inutiles
* `session_status()` retournera souvent `PHP_SESSION_NONE`

### Frameworks (Laravel, Symfony, etc.)

* Les sessions sont souvent déjà démarrées
* `session_status()` évite les conflits

## 9. Résumé

| Valeur | Signification |
|--------|---------------|
| `PHP_SESSION_DISABLED` | Sessions désactivées |
| `PHP_SESSION_NONE` | Pas de session active |
| `PHP_SESSION_ACTIVE` | Session en cours |

👉 **Toujours utiliser `session_status()` avant `session_start()`**
