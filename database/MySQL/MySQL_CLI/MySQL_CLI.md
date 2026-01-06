# Cours : MySQL CLI (Command Line Interface)

## 1. Introduction au MySQL CLI

Le **MySQL CLI** est le client en ligne de commande officiel de MySQL. Il permet de se connecter à un serveur MySQL et d'exécuter des commandes SQL directement depuis le terminal, sans interface graphique.

Avantages du CLI :

* Léger et rapide
* Utilisable sur tout système avec un terminal
* Permet d'exécuter des scripts SQL automatiquement
* Pratique pour l'administration et les scripts automatisés

---

## 2. Lancer MySQL CLI

Pour ouvrir le client MySQL dans le terminal :

```bash
mysql -u utilisateur -p
```

Explications :

* `-u utilisateur` : nom d’utilisateur MySQL
* `-p` : demande du mot de passe
* Après validation, vous êtes connecté et pouvez taper vos commandes SQL

💡 Optionnel : se connecter directement à une base spécifique :

```bash
mysql -u utilisateur -p nom_base
```

---

## 3. Commandes de base dans MySQL CLI

### 3.1 Navigation et informations

| Commande              | Description                                            |
| --------------------- | ------------------------------------------------------ |
| `SHOW DATABASES;`     | Liste toutes les bases de données                      |
| `USE nom_base;`       | Sélectionne la base de données sur laquelle travailler |
| `SHOW TABLES;`        | Liste toutes les tables de la base sélectionnée        |
| `DESCRIBE nom_table;` | Affiche la structure d’une table                       |
| `EXIT;` ou `QUIT;`    | Quitte MySQL CLI                                       |

---

### 3.2 Exécution de commandes SQL

Exemples dans le CLI :

```sql
-- Création d'une table
CREATE TABLE etudiants (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50),
    prenom VARCHAR(50)
);

-- Insertion de données
INSERT INTO etudiants (nom, prenom) VALUES ('Dupont', 'Marie');

-- Sélection de données
SELECT * FROM etudiants;
```

💡 Important : toutes les commandes SQL doivent se terminer par un **point-virgule `;`**.

---

## 4. Exécuter un script SQL dans MySQL CLI

Si vous avez un fichier `script.sql` :

```bash
mysql -u utilisateur -p nom_base < script.sql
```

* `<` : redirige le contenu du fichier vers le client MySQL
* Toutes les commandes du fichier sont exécutées automatiquement
* Très pratique pour automatiser la création de tables ou l’insertion de données

---

## 5. Commandes pratiques du CLI

| Commande                | Description                                                    |
| ----------------------- | -------------------------------------------------------------- |
| `\. chemin/fichier.sql` | Exécute un script SQL depuis le CLI (alternative à `<`)        |
| `\c`                    | Annule la commande en cours si elle n’est pas terminée         |
| `\P`                    | Change le séparateur de sortie (utile pour exporter)           |
| `\G`                    | Affiche les résultats en mode vertical pour plus de lisibilité |

---

## 6. Trucs et astuces

1. **Historique des commandes** : utilisez les flèches ↑ ↓ pour naviguer dans vos anciennes commandes.
2. **Autocomplétion** : tapez une partie d’un nom de table ou colonne puis appuyez sur `Tab`.
3. **Sortie dans un fichier** :

```bash
mysql -u utilisateur -p nom_base -e "SELECT * FROM etudiants;" > resultat.txt
```

4. **Exécution multiple de scripts** :

```bash
mysql -u utilisateur -p nom_base < script1.sql
mysql -u utilisateur -p nom_base < script2.sql
```

---

## 7. Exemple complet d’une session MySQL CLI

```bash
mysql -u root -p
```

```sql
-- Sélection de la base
USE ecole;

-- Création d'une table
CREATE TABLE etudiants (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    age INT
);

-- Insertion de données
INSERT INTO etudiants (nom, prenom, age) VALUES ('Dupont', 'Marie', 22);

-- Sélection de données
SELECT * FROM etudiants;

-- Quitter le CLI
EXIT;
```

---

Ce cours couvre l’essentiel pour débuter avec **MySQL CLI** et exécuter à la fois des commandes interactives et des scripts SQL automatiquement.
