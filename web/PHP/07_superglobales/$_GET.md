# Cours PHP : $_GET

## 1. Qu’est-ce que $_GET ?

`$_GET` est une **superglobale** en PHP :  

- C’est un **tableau associatif**.  
- Il contient toutes les données **envoyées via l’URL** (requêtes GET).  
- Accessible depuis **n’importe quel fichier PHP**, sans déclaration préalable.

---

## 2. Comment ça fonctionne ?

Quand on envoie des données via :

1. **Un formulaire GET** :

```html
<form action="submit.php" method="GET">
    <input type="text" name="nom" placeholder="Votre nom">
    <button type="submit">Envoyer</button>
</form>
```

2. **Un lien avec paramètres** :

```html
<a href="bonjour.php?nom=Dupont&prenom=Jean">Dis-moi bonjour !</a>
```

PHP reçoit ces informations dans `$_GET` :

```php
$nom = $_GET["nom"];       // Dupont
$prenom = $_GET["prenom"]; // Jean
```

---

## 3. Exemple complet

**fichier : bonjour.php**

```php
<?php
if (isset($_GET["nom"]) && isset($_GET["prenom"])) {
    $nom = $_GET["nom"];
    $prenom = $_GET["prenom"];
    echo "Bonjour $prenom $nom !";
} else {
    echo "Bonjour visiteur !";
}
?>
```

- Si l’URL est `bonjour.php?nom=Dupont&prenom=Jean`, le résultat sera :  
```
Bonjour Jean Dupont !
```
- Si aucun paramètre n’est fourni, on affiche “Bonjour visiteur !”.

---

## 4. Vérification et sécurité

### ✔ Toujours vérifier si la donnée existe

```php
if (isset($_GET["email"])) {
    $email = $_GET["email"];
}
```

### ✔ Filtrer et sécuriser les données

```php
$email = filter_input(INPUT_GET, "email", FILTER_SANITIZE_EMAIL);
```

- Évite les injections et XSS.
- Toujours **ne jamais faire confiance aux données envoyées par l’utilisateur**.

---

## 5. Résumé

| Concept | Détails |
|---------|---------|
| Superglobale | Accessible partout, sans déclaration |
| Tableau associatif | `$_GET["clé"]` pour récupérer la valeur |
| Source | Formulaire GET ou URL avec paramètres |
| Sécurité | Vérifier l’existence avec `isset()` et filtrer les données |
