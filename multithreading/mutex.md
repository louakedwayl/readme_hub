# Mutex
---

Un **mutex** (abréviation de *mutual exclusion*) est un mécanisme de **synchronisation** utilisé 
dans un environnement **multithread**.  
Il permet d'assurer qu'**un seul thread à la fois** peut accéder à une **ressource critique** ou exécuter une **section critique** du code.

---

## Fonctionnement général

L'utilisation d'un mutex repose sur deux actions principales :

1. **Acquérir la propriété du mutex** :  

Un thread peut **verrouiller** le mutex à l'aide de la fonction :  

```c
pthread_mutex_lock(&mutex);
```

2. **Relâcher la propriété du mutex** :

Le thread libère le mutex via :

```c
pthread_mutex_unlock(&mutex);
```

Ces mécanismes garantissent l'exclusion mutuelle :

Tant qu'un thread détient le mutex, aucun autre thread ne peut y accéder.