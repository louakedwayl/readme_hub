# TablePlus - Guide Complet

## 1. Introduction
**TablePlus** est un client moderne et léger pour gérer des bases de données.  
Il supporte de nombreux types de bases de données comme :
- MySQL / MariaDB
- PostgreSQL
- SQLite
- SQL Server
- Redis
- MongoDB
- et bien d'autres

Il est disponible sur **macOS, Windows et Linux**.

## 2. Installation
### macOS
- Télécharger depuis [tableplus.com](https://tableplus.com/)
- Glisser l’icône dans le dossier Applications

### Windows
- Télécharger le `.exe` depuis le site officiel
- Suivre les instructions de l’installeur

### Linux
- Télécharger l’AppImage ou installer via `snap` ou `deb`
```bash
sudo snap install tableplus
```

## 3. Connexion à une base de données
1. Ouvrir TablePlus
2. Cliquer sur **“Create a new connection”**
3. Choisir le type de base de données (ex: MySQL)
4. Remplir les informations :
   - Host
   - Port
   - User
   - Password
   - Database (optionnel)
5. Tester la connexion avec **“Test”**
6. Enregistrer avec **“Connect”**

## 4. Interface principale
- **Sidebar** : liste des bases et tables
- **Tabs** : permet d’ouvrir plusieurs tables ou requêtes
- **Query Editor** : éditeur SQL intégré
- **Structure View** : visualisation des colonnes et types de données
- **Content View** : affichage et modification des données

## 5. Opérations sur les tables
### 5.1 Visualiser les données
- Double-cliquer sur une table pour voir son contenu
- Utiliser la barre de recherche pour filtrer

### 5.2 Modifier les données
- Cliquer directement dans une cellule pour éditer
- Ajouter une ligne via le bouton **+**
- Supprimer une ligne via **Delete**

### 5.3 Ajouter / Modifier une table
- **Structure** → Ajouter / supprimer des colonnes
- Définir le **type de données**, **clé primaire**, **index**, etc.

## 6. Exécuter des requêtes SQL
- Ouvrir un **Query Tab**
- Écrire la requête SQL
```sql
SELECT * FROM users WHERE age > 18;
```
- Cliquer sur **Run** ou `Cmd/Ctrl + Enter` pour exécuter
- Résultat affiché en dessous

## 7. Sauvegarde et export
- Exporter une table ou la base entière :
  - Formats disponibles : SQL, CSV, JSON, Excel
- Importer un fichier SQL ou CSV depuis **File → Import**

## 8. Raccourcis utiles
- `Cmd/Ctrl + T` → Nouvelle tab
- `Cmd/Ctrl + E` → Éditer la structure de la table
- `Cmd/Ctrl + F` → Rechercher dans la table
- `Cmd/Ctrl + Shift + R` → Rafraîchir les données

## 9. Sécurité
- Support de SSL/TLS pour les connexions distantes
- Gestion de mots de passe sécurisée

## 10. Avantages de TablePlus
- Interface intuitive et rapide
- Supporte de nombreuses bases de données
- Requêtes SQL et modifications en live
- Export / import facile

## 11. Limitations
- Version gratuite limitée à un certain nombre de connexions
- Certaines fonctionnalités avancées nécessitent la version payante

## 12. Ressources
- Site officiel : [tableplus.com](https://tableplus.com/)
- Documentation : [docs.tableplus.com](https://docs.tableplus.com/)
- Tutoriels YouTube et blogs spécialisés
