# Les Sockets Unix (Unix Domain Sockets)

## 1. Introduction

Une **socket Unix** (ou **Unix Domain Socket**, UDS) est un mécanisme de **communication inter-processus (IPC)** qui permet à deux processus **sur le même système** d’échanger des données.
Elle fonctionne un peu comme un **pipe**, mais avec plus de fonctionnalités et de flexibilité.

---

## 2. Différence avec les sockets réseau

| Caractéristique | Socket réseau (TCP/UDP)       | Socket Unix (UDS)                         |
| --------------- | ----------------------------- | ----------------------------------------- |
| Communication   | Entre machines (IP + port)    | Localement sur le même OS                 |
| Adresse         | IP + port                     | Chemin de fichier (ex : `/tmp/monsocket`) |
| Performance     | Moins rapide (passage réseau) | Très rapide (local)                       |
| Sécurité        | Contrôle via pare-feu, TLS    | Permissions sur le fichier                |

---

## 3. Types de sockets Unix

* **SOCK_STREAM** : flux de données bidirectionnel, fiable (comme TCP).
* **SOCK_DGRAM** : messages discrets, non orientés connexion (comme UDP).

---

## 4. Fonctionnement

1. **Création du socket** :

```c
int sockfd = socket(AF_UNIX, SOCK_STREAM, 0);
```

2. **Association à un chemin** (`bind`) :

```c
struct sockaddr_un addr;
addr.sun_family = AF_UNIX;
strcpy(addr.sun_path, "/tmp/monsocket");
bind(sockfd, (struct sockaddr*)&addr, sizeof(addr));
```

3. **Écoute et acceptation (serveur)** :

```c
listen(sockfd, 5);
int client_fd = accept(sockfd, NULL, NULL);
```

4. **Connexion (client)** :

```c
connect(sockfd, (struct sockaddr*)&addr, sizeof(addr));
```

5. **Lecture / Écriture** :

```c
write(sockfd, "Hello", 5);
read(sockfd, buffer, sizeof(buffer));
```

6. **Fermeture** :

```c
close(sockfd);
unlink("/tmp/monsocket"); // supprimer le fichier du socket
```

---

## 5. Comparaison avec un pipe

| Caractéristique   | Pipe                                  | Socket Unix                             |
| ----------------- | ------------------------------------- | --------------------------------------- |
| Communication     | Unidirectionnelle ou bidirectionnelle | Bidirectionnelle par défaut             |
| Nom dans FS       | Non (FIFO = exception)                | Oui, chemin de fichier                  |
| Multiples clients | Limité                                | Peut accepter plusieurs clients         |
| Type de données   | Flux uniquement                       | Flux ou messages                        |
| Usage             | Communication simple                  | IPC complexe, serveur/clients multiples |

---

## 6. Avantages des sockets Unix

* **Rapides** : pas de couche réseau.
* **Fiables** : support des flux ou des messages.
* **Sécurisés** : permissions de fichier peuvent restreindre l’accès.
* **Flexibles** : multi-clients, bidirectionnels, support de différents types de données.

---

## 7. Cas d’usage

* Communication entre **serveur et clients locaux** (ex : MySQL, Redis).
* Remplacement des **pipes** ou **FIFO** pour l’IPC.
* Échange de **messages ou flux de données** entre processus sur la même machine.

---

## 8. Difference entre Pipe et Unix Domain Socket

## 8.1 Pipe

Sert à communiquer entre processus (IPC).
Classiquement unidirectionnel : un processus écrit, l’autre lit.
Exemples : pipe() en C ou | en shell.
Les named pipes (FIFO) peuvent être utilisés entre processus non liés, mais restent généralement unidirectionnels par défaut.

# 8.2 Unix Domain Socket

Aussi pour la communication entre processus, mais sur le même système (comme les pipes).
Peut être bidirectionnel : les deux processus peuvent lire et écrire sur le même socket.
Plus flexible que les pipes : supporte la communication stream (type TCP) ou datagram (type UDP).
Peut aussi transmettre des descripteurs de fichiers, ce que les pipes ne peuvent pas faire.
### En résumé

| Caractéristique       | Pipe                           | Unix Domain Socket       |
|-----------------------|--------------------------------|-------------------------|
| Direction             | Unidirectionnel (FIFO peut aider) | Bidirectionnel possible |
| Type                  | Stream                          | Stream ou Datagram      |
| Transmission fichiers | ❌                               | ✅                       |
| Entre processus       | Oui                             | Oui                     |
| Même machine          | Oui                             | Oui                     |

## 9. Conclusion

Les **sockets Unix** sont un outil puissant pour la communication locale entre processus.
Elles combinent la simplicité des pipes avec la flexibilité des sockets réseau, tout en étant plus rapides et sécurisées pour les échanges sur une même machine.
