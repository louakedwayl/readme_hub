# PIPE ANONYME
---

Un **pipe anonyme** est une structure de données qui s'apparente à un **buffer stocké dans la mémoire noyau**  
et qui permet de faire communiquer deux processus.  

Il est dit *anonyme* car il n’a **pas de nom visible** dans le système de fichiers (contrairement aux pipes nommés).  
Ainsi, aucune entrée n’est présente dans la table inode.

---

## Création d’un pipe anonyme

Lorsqu’un processus utilisateur crée un pipe anonyme avec `pipe()`, plusieurs choses se passent :

1. Le noyau **alloue un buffer** en mémoire noyau pour stocker les données échangées.  
2. **Deux descripteurs de fichiers** sont créés :  
   - `pipefd[0]` : pour la lecture.  
   - `pipefd[1]` : pour l’écriture.  
3. Ces descripteurs sont stockés dans la **file table** utilisateur du processus.

---

## Utilisation typique

- **Premier processus (écrivain)** :  
  - Redirige `stdout` → `pipefd[1]`.  
  - Ferme les descripteurs inutilisés.  

- **Deuxième processus (lecteur)** :  
  - Redirige `stdin` → `pipefd[0]`.  
  - Ferme les descripteurs inutilisés.  

- **Parent** :  
  - Ferme les deux extrémités du pipe après avoir `fork()` les enfants.  

---

## Pourquoi fermer rapidement les descripteurs dans le parent ?

Le processus parent **n’a pas besoin d’attendre** que les processus enfants aient terminé avant de fermer ses propres descripteurs,  
car chaque processus enfant dispose de **sa propre copie** des descripteurs après le `fork()`.

Fermer rapidement les descripteurs dans le parent permet de :  
- Libérer des ressources inutiles.  
- Éviter des **fuites de descripteurs** ou des comportements indésirables (ex : garder le pipe ouvert inutilement).  

---

## Problème si le parent garde l’extrémité d’écriture ouverte

Si le processus parent **garde l’extrémité d’écriture (`pipefd[1]`) ouverte**,  
le processus lecteur (ex. un deuxième enfant exécutant `wc -l`) **n’obtient jamais l’EOF**  
et reste bloqué en attente de données.

---

## Bonnes pratiques

Fermer le descripteur d’écriture **immédiatement dans le parent** est essentiel pour :

- **Prévenir les deadlocks.**  
- **Signaler la fin des données (EOF)** aux lecteurs.  
- **Gérer efficacement les ressources.**