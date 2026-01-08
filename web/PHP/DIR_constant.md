# 📂 La constante PHP `__DIR__`

## 1. Introduction

En PHP, `__DIR__` est une **constante magique**.  
Elle permet de récupérer **le chemin absolu du dossier** dans lequel se trouve le fichier PHP en cours d’exécution.

---

## 2. Définition

- `__DIR__` → chemin complet du **dossier du fichier actuel**
- Toujours disponible, **sans déclaration**
- Utile pour inclure des fichiers, charger des ressources, ou accéder à des fichiers de configuration comme `.env`

---

## 3. Exemple simple

Structure du projet :

```
/home/user/Camagru/
│
├─ index.php
├─ config/
│  └─ config.php
└─ .env
```

**Dans `config/config.php` :**

```php
echo __DIR__;
```

💡 Résultat :

```
/home/user/Camagru/config
```

---

## 4. Utilité principale

`__DIR__` permet de :

1. **Charger des fichiers de façon sûre**, peu importe où le script est lancé.
2. Éviter les problèmes de **chemins relatifs** (`./`, `../`).
3. Simplifier la **portabilité** du code.

---

## 5. Exemple pratique avec `.env` (Camagru)

```php
// Charger le fichier .env
$env = parse_ini_file(__DIR__ . '/../.env');

// Remplir $_ENV
foreach ($env as $key => $value) {
    $_ENV[$key] = $value;
}

// Utilisation
echo $_ENV['DB_HOST'];
```

💡 Explication :
- `__DIR__` → `/home/user/Camagru/config`
- `../.env` → remonte d’un dossier → `/home/user/Camagru/.env`
- Le fichier `.env` est correctement trouvé **peu importe depuis quel dossier le script est appelé**.

---

## 6. Comparaison avec `.` et `..`

| Notation | Description |
|----------|------------|
| `.`      | Dossier courant (par rapport au script exécuté) |
| `..`     | Dossier parent |
| `__DIR__` | Dossier du **fichier qui contient ce code** |

---

## 7. Exemple complet Camagru

```php
// Charger le .env depuis n'importe où dans le projet
$env = parse_ini_file(__DIR__ . '/../.env');

foreach ($env as $key => $value) {
    $_ENV[$key] = $value;
}

// Connexion PDO
$pdo = new PDO(
    "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};charset=utf8mb4",
    $_ENV['DB_USER'],
    $_ENV['DB_PASS']
);
```

✅ Résultat :
- Le code est **portable**
- Les fichiers de configuration sont toujours accessibles
- Les variables sensibles sont **sécurisées** via `$_ENV`

---

## 8. Points importants

- `__DIR__` est **toujours absolu** (contrairement à `.` qui est relatif)
- Très utile dans les projets PHP structurés
- Combine parfaitement avec `.env` et `$_ENV` pour Camagru
- Améliore la **sécurité et la portabilité** du projet
