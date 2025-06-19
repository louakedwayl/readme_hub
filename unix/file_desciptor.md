# 📚 Cours : Les File Descriptors (fd) sous Unix/Linux

---

## 1. Qu’est-ce qu’un file descriptor ?

- Un **file descriptor** (fd) est un **entier non négatif** qui identifie une ressource d’entrée/sortie ouverte par un processus.
- C’est un **index** interne utilisé par le noyau pour gérer fichiers, sockets, pipes, terminaux, etc.
- Tous les appels système d’E/S (`read`, `write`, `close`, `fcntl`…) utilisent des fd.

---

## 2. À quoi sert un fd ?

- Permet à un programme de manipuler plusieurs fichiers et ressources en même temps, sans confusion.
- Simplifie l’abstraction : peu importe que la ressource soit un fichier, un terminal, une socket, un pipe, ou un device.
- Permet la redirection des flux standard (`stdin`, `stdout`, `stderr`) et bien plus.

---

## 3. Les fd standards

| fd  | Nom      | Description                    |
|------|-----------|-------------------------------|
| 0    | `stdin`   | Entrée standard (clavier)       |
| 1    | `stdout`  | Sortie standard (écran)         |
| 2    | `stderr`  | Sortie d’erreur standard (console) |

---

## 4. Comment obtenir un fd ?

- Via des appels système comme `open()`, `socket()`, `pipe()`, etc.
- Le fd retourné est le plus petit entier libre (≥ 3).
- Ex :

```c
int fd = open("fichier.txt", O_RDONLY);
if (fd == -1) {
    perror("open");
    return 1;
}
```

// Utilise fd pour lire, écrire...

## 5. Manipuler les fd

    Lire : read(fd, buffer, taille)

    Écrire : write(fd, buffer, taille)

    Fermer : close(fd)

    Modifier le comportement : fcntl(fd, commande, arg)

## 6. Redirection des fd

    En shell, on peut rediriger les fd facilement :

./monprog > sortie.txt     # stdout (fd 1) redirigé vers fichier
./monprog 2> erreur.log    # stderr (fd 2) redirigé vers fichier
./monprog < entree.txt     # stdin (fd 0) redirigé depuis fichier

    Cette flexibilité est possible grâce aux fd.

## 7. fd et multitâche

    Les fd permettent de gérer plusieurs fichiers ouverts simultanément.

    Les processus peuvent aussi dupliquer des fd (dup, dup2) pour partager des ressources.

## 8. fd et sockets

    Les sockets réseau sont manipulées comme des fichiers via des fd.

    Cela unifie la gestion des E/S réseau et fichiers.

## 9. Vérifier les fd ouverts

    Sous Linux, regarde /proc/<pid>/fd pour voir les fd ouverts par un processus.
```bash
ls -l /proc/$$/fd
```
