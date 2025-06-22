# Cours sur `poll` en C

## Qu'est-ce que `poll` ?

`poll` est une fonction système permettant de surveiller plusieurs descripteurs de fichiers (sockets, fichiers, pipes, etc.) pour détecter s'ils sont prêts pour des opérations d'entrée/sortie (lecture, écriture, erreurs) sans bloquer inutilement.

C’est une alternative plus flexible et moderne à `select`.

---

## Prototype

```c
#include <poll.h>


int poll(struct pollfd *fds, nfds_t nfds, int timeout);
```

fds : tableau de structures pollfd décrivant les descripteurs à surveiller.

nfds : nombre d’éléments dans le tableau fds.

timeout : temps maximal d’attente en millisecondes.

0 : ne pas bloquer (polling immédiat).

-1 : bloquer indéfiniment jusqu’à un événement.

0 : bloquer ce nombre de millisecondes.

## Structure pollfd
```c
struct pollfd {
    int   fd;         // Descripteur à surveiller
    short events;     // Événements à surveiller (entrée)
    short revents;    // Événements survenus (sortie)
};
```

| Constante  | Signification                  |
|------------|-------------------------------|
| POLLIN     | Données à lire disponibles    |
| POLLOUT    | Écriture possible sans blocage|
| POLLERR    | Erreur sur le fd              |
| POLLHUP    | Hang-up (fin de connexion)    |
| POLLNVAL   | Descripteur invalide          |


Remplir un tableau pollfd avec les fd à surveiller et les events voulus.

Appeler poll().

Analyser les revents pour savoir quel fd est prêt et pour quoi.

Traiter les événements correspondants.

Exemple simple
```c
#include <stdio.h>
#include <poll.h>
#include <unistd.h>

int main() {
    struct pollfd fds[1];
    fds[0].fd = 0; // stdin
    fds[0].events = POLLIN;

    printf("Attente d'une entrée sur stdin (10 secondes max)...\n");

    int ret = poll(fds, 1, 10000);
    if (ret == -1) {
        perror("poll");
        return 1;
    }
    else if (ret == 0) {
        printf("Timeout, pas d'entrée détectée.\n");
    }
    else {
        if (fds[0].revents & POLLIN) {
            printf("Données disponibles sur stdin.\n");
        }
    }
    return 0;
}
```

## Avantages de poll

Pas de limite arbitraire sur le nombre de fd (contrairement à select).

Plus facile à utiliser avec beaucoup de sockets.

Retourne les événements par fd, évite les opérations lourdes.

## Points importants

Après poll(), il faut vérifier revents pour chaque fd.

Si poll retourne 0, c’est un timeout.

En cas d'erreur, poll retourne -1 et errno est défini.

poll peut être utilisé en mode bloquant ou non bloquant via timeout.

## Conclusion

poll est un outil puissant pour gérer plusieurs connexions ou descripteurs simultanément, essentiel pour créer des serveurs réseau réactifs et performants.
Références
