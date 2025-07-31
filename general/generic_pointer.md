# Fork Syscall
---

## 1. Définition de `fork`

Lorsque vous appelez `fork()`, le système d’exploitation crée un **processus enfant** à partir  
du processus parent.  
Le processus enfant est une **copie quasi-identique** du parent.

---

## 2. Fonctionnement de `fork`

Lorsqu’un programme appelle `fork()`, il est exécuté **une seule fois** mais retourne **deux fois** :

- **Dans le processus parent** : `fork()` retourne le **PID du processus enfant**.  
- **Dans le processus enfant** : `fork()` retourne **0**.  
- **En cas d’échec** (par exemple, manque de ressources) : `fork()` retourne **-1** dans le parent et ne crée pas de processus enfant.
