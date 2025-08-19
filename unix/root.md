# L’utilisateur root

## Qu’est-ce que root ?

- `root` est le super-utilisateur par défaut sur les systèmes Unix/Linux.
- Il possède tous les droits : lire, écrire, modifier, supprimer n’importe quel fichier ou configuration.
- C’est l’administrateur système par excellence.

## Pourquoi ne pas utiliser root tout le temps ?

- Une erreur peut endommager gravement le système.
- Si root est compromis, tout le système l’est également.
- Les distributions Linux recommandent d’utiliser des comptes standards avec `sudo` pour limiter les risques.

## Mot de passe root et Debian (exemple pratique)

- Sur Debian moderne :
  - Tu définis un mot de passe utilisateur, pas forcément celui de root.
  - Le compte root est souvent désactivé (pas de mot de passe défini).
  - Les opérations administratives passent par `sudo`.
- Si tu fais `su` sans mot de passe root défini, cela ne fonctionnera pas.

### Définir ou changer le mot de passe root

```bash
sudo passwd root
```

Active ou modifie le mot de passe root.

Après définition, su peut être utilisé pour passer en root.

## Différence entre root, sudo et su

| Commande | Description | Usage principal | Mot de passe demandé |
|----------|-------------|----------------|--------------------|
| root     | Super-utilisateur avec tous les droits | Compte système complet | Mot de passe root (parfois désactivé) |
| sudo     | Exécute une commande en root sans changer de session | Élévation temporaire de privilèges | Mot de passe de l’utilisateur courant |
| su       | Change d’utilisateur avec session shell complète | Ouvre une session shell sous un autre utilisateur | Mot de passe de l’utilisateur ciblé |

### Pourquoi Debian désactive root ?

Pour plus de sécurité.

Encourage l’usage de sudo afin de limiter les risques d’erreurs et d’accès non surveillés.

### Résumé

root = super-utilisateur, tous les droits.

Sur Debian, root est souvent désactivé par défaut.

Utilise ton compte utilisateur + sudo pour les commandes administratives.

Tu peux activer root avec sudo passwd root.

su permet de changer d’utilisateur si tu connais le mot de passe (ex. root).