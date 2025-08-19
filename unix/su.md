# Commande `su` (substitute/switch user)

## Qu’est-ce que `su` ?
- Permet de changer d’utilisateur dans un terminal Linux/Unix.
- Souvent utilisé pour passer à l’utilisateur `root` (administrateur).
- Fournit une **session shell complète** avec les privilèges de l’utilisateur cible.

## Pourquoi l’utiliser ?
- Exécuter des commandes avec les droits d’un autre utilisateur.
- Rester connecté en root ou un autre utilisateur pendant un certain temps.
- Obtenir un environnement complet de l’utilisateur cible (avec `su -`).

## Syntaxe
```bash
su [utilisateur]
```
Sans argument : passe à root.

Avec un nom d’utilisateur : passe à cet utilisateur (ex : su alice).

### Fonctionnement

Demande le mot de passe de l’utilisateur cible.

Ouvre un nouveau shell avec les droits de cet utilisateur.

Pour revenir à l’utilisateur initial : exit ou Ctrl+D.

### Variantes

su : change d’utilisateur sans charger l’environnement complet.

su - : change d’utilisateur et charge son environnement (comme une connexion directe).

## Comparaison `su` vs `sudo`

| **su**                              | **sudo**                                   |
|------------------------------------|--------------------------------------------|
| Change d’utilisateur complètement  | Exécute une seule commande avec droits élevés |
| Demande le mot de passe de l’utilisateur cible | Demande ton mot de passe utilisateur       |
| Utile pour avoir une session root complète | Utile pour exécuter une commande ponctuelle |
| Session continue jusqu’à `exit`    | Commande unique, retour au shell normal    |

