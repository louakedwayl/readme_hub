# Comprendre les UID (User IDs) sur Unix/Linux

## 1. Qu’est-ce qu’un UID ?

Un **UID (User ID)** est un identifiant numérique unique attribué à chaque utilisateur sur un système Unix/Linux.
Le système utilise l’UID pour gérer les permissions sur les fichiers, les processus et les ressources, plutôt que de se baser sur le nom d’utilisateur.

* **Type** : entier (`uid_t`)
* **Exemple de valeurs** :

  * `0` → root (administrateur)
  * `1000`, `1001`, … → utilisateurs standards

Le nom d’utilisateur (`alice`, `bob`, …) est juste une étiquette lisible par l’humain, mais le système se réfère toujours à l’UID.

---

## 2. UID réel et UID effectif

Chaque processus a deux UID importants :

| Type d'UID          | Signification                                                     |
| ------------------- | ----------------------------------------------------------------- |
| UID réel (ruid)     | Identifie l’utilisateur qui a lancé le processus                  |
| UID effectif (euid) | Utilisé par le système pour vérifier les permissions du processus |

### Exemple

Un programme **setuid root** exécuté par l’utilisateur `alice` :

* UID réel (`ruid`) = UID d’alice (ex. 1000)
* UID effectif (`euid`) = 0 (root)

Le programme a donc temporairement les droits de root.

---

## 3. Fonctions C liées aux UID

### `getuid()`

```c
#include <unistd.h>

uid_t getuid(void);
```

* Retourne **l’UID réel** du processus.

### `geteuid()`

```c
#include <unistd.h>

uid_t geteuid(void);
```

* Retourne **l’UID effectif** du processus.

### `setreuid()`

```c
#include <unistd.h>

int setreuid(uid_t ruid, uid_t euid);
```

* Permet de changer l’UID réel et/ou effectif.
* Passer `-1` si on ne veut pas changer l’un des deux.
* Nécessite des droits appropriés (souvent root ou setuid).

#### Exemple

Échanger UID réel et effectif :

```c
setreuid(geteuid(), getuid());
```

---

## 4. Vérifier son UID sous Linux

```bash
id -u    # Affiche l'UID réel
id       # Affiche UID, GID et groupes
```

---

## 5. Résumé visuel

```
Utilisateur alice (UID 1000)
         │
         └─> Lance un programme setuid root
                 ├─ UID réel = 1000
                 └─ UID effectif = 0 (root)
```

* UID réel = qui a lancé le processus
* UID effectif = droits utilisés pour les permissions

---

## 6. Pourquoi c’est important

* Permet de gérer les **droits et la sécurité** des programmes.
* Utile pour les **programmes setuid** qui doivent temporairement augmenter ou réduire leurs droits.
* Essentiel pour comprendre la **sécurité des systèmes Unix/Linux**.
