# sudo

## Introduction

Sous Linux, l’utilisateur root est le super-utilisateur qui possède tous les droits sur le système.  
Cependant, travailler constamment en tant que root est risqué et dangereux. C’est pourquoi l’outil **sudo** a été créé pour permettre aux utilisateurs standards d’exécuter certaines commandes avec les privilèges de root, sans ouvrir une session root complète.

## Qu’est-ce que sudo ?

- `sudo` signifie **superuser do**, c’est-à-dire "faire en tant que super-utilisateur".
- Il permet d’exécuter une commande en tant que root (ou un autre utilisateur) de manière temporaire.
- L’utilisateur doit être autorisé à utiliser sudo, généralement en étant membre du groupe `sudo`.

## Pourquoi utiliser sudo ?

### Sécurité
- Ne pas utiliser directement le compte root évite les erreurs graves (suppression de fichiers système, mauvaises configurations).
- Limite le risque de compromission complète du système en cas de faille.

### Traçabilité
- Toutes les commandes lancées avec `sudo` sont enregistrées dans un fichier journal (souvent `/var/log/auth.log`), ce qui permet de retracer les actions.

### Gestion des droits
- On peut configurer `sudo` pour autoriser certains utilisateurs à exécuter seulement certaines commandes spécifiques en root, limitant ainsi leurs pouvoirs.

## Utilisation de sudo

Pour exécuter une commande avec `sudo` :

```bash
sudo commande
```
Lors de la première utilisation dans une session, sudo demande le mot de passe de l’utilisateur (pas celui de root).

### Exemple :
```bash
sudo apt update
```
Configuration de sudo

Le fichier de configuration est /etc/sudoers, mais il ne doit pas être modifié directement avec un éditeur normal.

Utiliser la commande visudo pour éditer ce fichier en toute sécurité.

Exemple pour ajouter un utilisateur au groupe sudo :
```bash
sudo usermod -aG sudo nom_utilisateur
```

Il ne faut jamais modifier le fichier /etc/sudoers avec un éditeur normal (nano, vim, gedit) car une erreur de syntaxe peut bloquer totalement l'accès à sudo même pour root.

### Pourquoi utiliser visudo

visudo est un éditeur sécurisé pour /etc/sudoers.

Il vérifie automatiquement la syntaxe du fichier avant d’enregistrer.

Si une erreur est détectée, il empêche la sauvegarde.

Il verrouille le fichier temporairement pour éviter des conflits lors de modifications simultanées.

### Vérifier les groupes d’un utilisateur

```bash
groups nom_utilisateur
```

### Remarques importantes

Il est déconseillé d’utiliser su pour passer en root si sudo est disponible, car sudo offre plus de contrôle et de sécurité.

Dans certains systèmes (comme Debian), root est désactivé par défaut et sudo est le moyen principal d’avoir les droits administrateurs.

### Conclusion

sudo est un outil clé pour la sécurité et la gestion des droits sous Linux.
Il permet de travailler efficacement tout en minimisant les risques liés à l’utilisation du compte root.