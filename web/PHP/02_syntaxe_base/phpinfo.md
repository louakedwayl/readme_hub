# phpinfo(), le fichier php.ini, display_errors et error_reporting

PHP offre plusieurs outils pour comprendre, configurer et diagnostiquer l'environnement dans lequel ton code s'exécute. Les trois plus importants sont :

- La fonction `phpinfo()`
- Le fichier de configuration `php.ini`
- Les directives `display_errors` et `error_reporting`

Ce cours t'explique à quoi ils servent, comment les utiliser, et pourquoi ils sont importants pour le développement.

---

## 1. 🔍 phpinfo()

### ❓ Qu'est-ce que phpinfo() ?

`phpinfo()` est une fonction PHP intégrée qui affiche toutes les informations de configuration de PHP :

- Version de PHP
- Extensions chargées
- Valeurs de configuration (ex : `upload_max_filesize`)
- Variables d'environnement
- Chemin du fichier `php.ini` utilisé
- Configuration Apache/Nginx si applicable
- Modules compilés
- Configuration du serveur

### 🧪 Comment l'utiliser ?

Crée un fichier `info.php` :

```php
<?php
phpinfo();
```

Puis ouvre-le dans ton navigateur :

```
http://localhost/info.php
```

### 📌 À quoi ça sert ?

- Vérifier si PHP est bien installé
- Savoir quel fichier `php.ini` est utilisé
- Voir les extensions actives (cURL, openssl, PDO…)
- Dépanner un problème de configuration

### 🚨 Attention : Ne laisse jamais phpinfo() en production !

Cela révèle des informations sensibles sur ton serveur.

---

## 2. ⚙️ Le fichier php.ini

### 🔧 Qu'est-ce que php.ini ?

`php.ini` est le fichier principal de configuration de PHP.

Il détermine :

- Les erreurs affichées
- Les limites de mémoire
- Les extensions activées
- Le comportement du moteur PHP
- Les uploads et sessions

### 📍 Où se trouve-t-il ?

Utilise `phpinfo()` pour savoir :

Cherche la ligne :

```
Loaded Configuration File
```

Exemple :

```
Loaded Configuration File => /etc/php/8.1/apache2/php.ini
```

Les emplacements typiques :

- **Linux** : `/etc/php/X.Y/apache2/php.ini`
- **Windows** : `C:\xampp\php\php.ini`
- **PHP serveur intégré** : `/etc/php/X.Y/cli/php.ini`

### ✏️ Modifier php.ini

Ouvre le fichier puis modifie les lignes voulues.

**Après chaque modification :**

Redémarre le serveur web (apache, nginx, ou le serveur intégré si besoin).

---

## 3. 🟥 display_errors = On

### ❓ C'est quoi ?

`display_errors` indique à PHP si les erreurs doivent s'afficher à l'écran.

Dans `php.ini` :

```ini
display_errors = On
```

Cela permet de voir les erreurs comme :

- Parse error
- Fatal error
- Warning
- Notice

### ✔️ Avantages

- Très utile en développement
- Permet de debugger plus rapidement
- Montre les erreurs directement dans le navigateur

### ❌ Inconvénients en production

⚠️ **À NE JAMAIS METTRE SUR UN SITE EN LIGNE**

Car cela peut révéler :

- Des chemins de fichiers
- Des mots de passe de connexion
- Des informations système

➡️ **En production :**

```ini
display_errors = Off
```

---

## 4. 🔥 error_reporting = E_ALL

### ❓ Qu'est-ce que error_reporting ?

C'est la directive qui définit quelles erreurs PHP doit détecter.

`E_ALL` signifie :

👉 **Toutes les erreurs, sans exception**

C'est le niveau le plus strict. Il inclut :

- `E_ERROR`
- `E_WARNING`
- `E_PARSE`
- `E_NOTICE`
- `E_DEPRECATED`
- `E_STRICT`
- etc.

### 📌 Dans php.ini

```ini
error_reporting = E_ALL
```

### 📌 En PHP (optionnel)

```php
error_reporting(E_ALL);
```

### 🚀 Pourquoi utiliser E_ALL ?

Parce que ça permet :

- De détecter les erreurs tôt
- D'attraper les mauvaises pratiques
- D'éviter des bugs cachés
- D'avoir un code propre

### ✔️ En développement

Toujours mettre :

```ini
display_errors = On
error_reporting = E_ALL
```

### ❌ En production

On garde `error_reporting = E_ALL` (pour logs), mais on coupe l'affichage :

```ini
display_errors = Off
log_errors = On
```

Ainsi :

- Les erreurs ne s'affichent pas aux visiteurs
- Mais tu les retrouves dans les logs du serveur

---

## 5. 🧪 Exemple complet pour développement local

### Dans php.ini :

```ini
display_errors = On
error_reporting = E_ALL
log_errors = On
```

### Dans ton code (optionnel) :

```php
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
```

---

## 🎯 Résumé

| Élément | Rôle | À utiliser en développement ? | En production ? |
|---------|------|-------------------------------|-----------------|
| `phpinfo()` | Voir configuration PHP | ✔️ Oui | ❌ Non |
| `php.ini` | Config globale PHP | ✔️ Oui | ✔️ Oui |
| `display_errors = On` | Affiche les erreurs à l'écran | ✔️ Oui | ❌ Jamais |
| `error_reporting = E_ALL` | Détecte toutes les erreurs | ✔️ Oui | ✔️ Oui |
