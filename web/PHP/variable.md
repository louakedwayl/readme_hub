# 📘 Les variables en PHP

Les variables sont l’un des concepts les plus fondamentaux en PHP. Elles servent à **stocker et manipuler des données** : nombres, textes, tableaux, objets, etc.

---

## 🔹 1. Déclarer une variable

En PHP, **toutes les variables commencent par le symbole `$`**.

```php
$nom = "Wayl";
$age = 21;
```

---

## 🔹 2. Règles de nommage

- Commencer par `$` + une lettre ou `_`
- **Ne pas commencer par un chiffre**
- Contenir seulement lettres, chiffres, `_`
- Sensible à la casse (`$age` et `$Age` sont différentes)

✔️ Exemple correct :

```php
$compteur;
$ageUtilisateur;
$_hiddenValue;
```

❌ Exemple incorrect :

```php
$1variable;      // commence par un chiffre
$nom-utilisateur; // tiret interdit
```

---

## 🔹 3. Types de données principaux

PHP est **faiblement typé** : pas besoin de déclarer le type.

```php
$nom = "Alice";        // string
$nombre = 42;          // integer
$prix = 19.99;         // float
$actif = true;         // boolean
$couleurs = ["rouge", "bleu", "vert"]; // array
$obj = new stdClass(); // object
```

---

## 🔹 4. Variable dynamique

```php
$nom = "age";
$$nom = 25;

echo $age; // 25
```

---

## 🔹 5. Portée des variables

### Locale

```php
function test() {
    $x = 10;
}
echo $x; // Erreur
```

### Globale

```php
$x = 10;

function test() {
    global $x;
    echo $x; // 10
}
```

### `$GLOBALS`

```php
$x = 10;

function test() {
    echo $GLOBALS['x']; // 10
}
```

---

## 🔹 6. Constantes

```php
define("PI", 3.14);
const VERSION = "1.0.0";
```

---

## 🔹 7. Variables superglobales

| Variable | Description |
|---------|-------------|
| `$_GET` | Données GET |
| `$_POST` | Données POST |
| `$_SESSION` | Session |
| `$_COOKIE` | Cookies |
| `$_SERVER` | Infos serveur |
| `$_FILES` | Uploads |
| `$_REQUEST` | GET + POST + COOKIE |
| `$_ENV` | Variables d’environnement |

```php
echo $_SERVER['REQUEST_METHOD']; // GET ou POST
```

---

## 🔹 8. Vérifier l’existence

```php
isset($x);  // existe et pas null
empty($x);  // vide ou n'existe pas
```

---

## 🔹 9. Supprimer une variable

```php
unset($x);
```

---

## 🔹 10. Astuces

- PHP crée une variable à l’assignation  
- `$variable = null;` ne supprime pas la variable  
- Pour inclure une variable dans une chaîne, utiliser `"` :

```php
$nom = "Wayl";
echo "Bonjour $nom"; // Bonjour Wayl
```
