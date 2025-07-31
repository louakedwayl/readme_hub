# gettimeofday
---

```c
int gettimeofday(struct timeval *tv, struct timezone *tz);
```

Le syscall **`gettimeofday`** permet d'obtenir le temps depuis le temps Unix,  
aussi appelé **l’Epoch** (1er janvier 1970).

- **`tv`** : pointeur vers une structure `timeval` dans laquelle la fonction va stocker l’heure courante.  
- **`tz`** : pointeur vers une structure `timezone`.  

> Dans la plupart des implémentations modernes, ce paramètre est **obsolète** et doit être passé à `NULL`.

---

## La structure `timeval` :

```c
struct timeval {
    time_t      tv_sec;   /* secondes depuis le 1er janvier 1970 (Epoch) */
    suseconds_t tv_usec;  /* microsecondes */
};
```