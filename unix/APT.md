# APT (Advanced Package Tool)

---

## 1. Qu’est-ce qu’APT ?

APT est un ensemble d’outils en ligne de commande permettant de gérer les paquets logiciels sur les systèmes basés sur Debian.

- **APT** = Advanced Package Tool  
- Utilisé pour installer, mettre à jour, supprimer et chercher des logiciels.  
- Travaille avec des paquets `.deb`.  

### Commandes de base

#### Rechercher un paquet

```bash
apt search <nom_du_paquet>
```

### Exemple :

```bash
apt search firefox
```

### Installer un paquet

```bash
sudo apt install <nom_du_paquet>
```

### Exemple :

```bash
sudo apt install vim
```

### Supprimer un paquet

```bash
sudo apt remove <nom_du_paquet>
```
Supprime le paquet mais garde les fichiers de configuration.

```bash
sudo apt purge <nom_du_paquet>
```
Supprime le paquet et ses fichiers de configuration.

Mettre à jour les dépôts

```bash
sudo apt update
```

Met à jour la liste des paquets disponibles depuis les dépôts.

Mettre à jour les paquets installés

```bash
sudo apt upgrade
```

Installe les nouvelles versions des paquets déjà installés.

```bash
sudo apt full-upgrade
```

Met à jour tous les paquets et peut supprimer ceux devenus inutiles pour résoudre les conflits.

Nettoyer le système
```bash
sudo apt autoremove
```

Supprime les dépendances devenues inutiles.

```bash
sudo apt clean
```

Supprime les fichiers de cache téléchargés (.deb) pour gagner de l’espace disque.

### Fichiers importants

/etc/apt/sources.list : liste des dépôts utilisés.

/var/lib/apt/lists/ : informations téléchargées depuis les dépôts.

/etc/apt/preferences : configuration de la priorité des paquets.

### Astuces utiles

Voir les informations sur un paquet :

```bash
apt show <nom_du_paquet>
```

### Vérifier si un paquet est installé :

```bash
dpkg -l | grep <nom_du_paquet>
```

Forcer la réinstallation d’un paquet :

```bash
sudo apt install --reinstall <nom_du_paquet>
```

### Sécurité 🔒

APT vérifie automatiquement les signatures GPG pour s’assurer que les paquets sont authentiques.

Les dépôts officiels de Debian/Ubuntu sont signés et sécurisés.

### À éviter 🛑

Ne jamais utiliser apt avec sudo sans vérifier la commande.

Ne pas éditer manuellement les fichiers de sources sans comprendre leur format.

## 2. Le cache dans APT

APT utilise un cache pour stocker deux types de données.

## 2.1 Cache des métadonnées

Stocké dans : /var/lib/apt/lists/

Contient : liste des paquets disponibles, versions, descriptions, dépendances.

### Mise à jour :

```bash
sudo apt update
```

Sert à savoir quels paquets sont disponibles sans interroger le serveur à chaque fois.

## 2.2 Cache des paquets téléchargés

Stocké dans : /var/cache/apt/archives/

Contient : fichiers .deb des paquets téléchargés.

Utilisé pour : installer les paquets sans retélécharger ou réinstaller hors ligne.

### Nettoyage :

```bash
sudo apt clean
```

## 3. Gestion du cache

Pourquoi nettoyer le cache ?

Pour libérer de l’espace disque.

Pour éviter les conflits avec des paquets obsolètes.

### Commandes utiles

| Commande                          | Effet                                           |
|----------------------------------|------------------------------------------------|
| `sudo apt clean`                  | Supprime tous les paquets téléchargés du cache |
| `sudo apt autoclean`              | Supprime les paquets obsolètes                 |
| `sudo rm -rf /var/lib/apt/lists/*` | Supprime les métadonnées et force `apt update` |
